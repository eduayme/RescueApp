<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Session;
use Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAssignRole($id)
    {
        $user = User::find($id);
        $permissions = Permission::all();
        $roles = Role::all();
        $user_roles = $user->roles;
        $user_permissions = $user->permissions;
        $data = [];
        $data['user'] = $user;
        $data['permissions'] = $permissions;
        $data['roles'] = $roles;
        if ($user_roles->count() == 0) {
            $data['user_roles'] = [];
        } else {
            $userRoles = [];
            foreach ($user_roles as $user_role) {
                array_push($userRoles, $user_role->id);
                $data['user_roles'] = $userRoles;
            }
        }
        if ($user_permissions->count() == 0) {
            $data['user_permissions'] = [];
        } else {
            $userPermissions = [];
            foreach ($user_permissions as $user_permission) {
                array_push($userPermissions, $user_permission->id);
                $data['user_permissions'] = $userPermissions;
            }
        }
        // return $data;
        return view('users_manage.user_role', compact('data'));
    }

    public function storeAssignRole(Request $request, $id)
    {
        $user = User::findOrFail($id);
        // $newroles = implode(",", $request->roles);
        // $user->syncRoles(explode(',', $newroles));
        $user->roles()->sync($request->roles);
        Session::flash('success', 'User roles have been edited.');

        return redirect()->back();
    }

    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('roles.index')->withRoles($roles)->withPermissions($permissions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'              => ['required', 'string', 'min:2', 'alphadash', 'max:255', 'unique:permissions'],
            'display_name'      => ['required', 'regex:/^[\pL\s\-]+$/u', 'min:2', 'max:255'],
            'description'       => ['sometimes', 'min:2', 'max:255'],
        ], [
            'name.required'              => __('messages.required'),
            'name.min'                   => __('messages.min'),
            'name.max'                   => __('messages.max'),
            'name.unique'                => __('messages.unique'),
            'display_name.required'      => __('messages.required'),
            'display_name.min'           => __('messages.min'),
            'display_name.max'           => __('messages.max'),
            'display_name.alpha'         => 'only strings are allowed in this field',
            'description.required'       => __('messages.required'),
            'description.min'            => __('messages.min'),
            'description.max'            => __('messages.max'),
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator)
            ->with('error', __('messages.error_form'));
        }

        $role = new Role();
        $role->name = strtolower($request->name);
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        if ($role->save()) {
            Session::flash('success', 'Role has been successfully added');

            return redirect()->route('roles.index');
        } else {
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);

        return view('roles.show')->withRole($role);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::where('id', $id)->first();
        // return $role;
        $permissions = Permission::all();

        $role_permission = $role->permissions;
        // return $role_permission->count(3);
        if ($role_permission->count($id) != 0) {
            $rolePermission = [];
            foreach ($role_permission as $newrole) {
                array_push($rolePermission, $newrole->id);
            }
        } else {
            $rolePermission = [];
        }

        return view('roles.edit')->withRole($role)->withPermissions($permissions)->withRolePermission($rolePermission);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'display_name'      => ['required', 'regex:/^[\pL\s\-]+$/u', 'min:2', 'max:255'],
            'description'       => ['sometimes', 'min:2', 'max:255'],
        ], [
            'display_name.required'      => __('messages.required'),
            'display_name.min'           => __('messages.min'),
            'display_name.max'           => __('messages.max'),
            'display_name.alpha'         => 'only strings are allowed in this field',
            'description.required'       => __('messages.required'),
            'description.min'            => __('messages.min'),
            'description.max'            => __('messages.max'),
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator)
            ->with('error', __('messages.error_form'));
        }
        $role = Role::findOrFail($id);
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        if ($role->save()) {
            if ($request->permissions) {
                $newpermissions = implode(',', $request->permissions);
                $role->syncPermissions(explode(',', $newpermissions));
                Session::flash('success', 'Successfully updated the role '.$role->display_name.' and added permissions');
            } else {
                if ($role->permissions->count() > 0) {
                    foreach ($role->permissions as $rp) {
                        $role->detachPermission($rp->id);
                    }
                    Session::flash('success', 'Successfully updated the role '.$role->display_name.'and removed its permissions.');
                } else {
                    Session::flash('success', 'Successfully updated the role '.$role->display_name.'with no permissions');
                }
            }
        } else {
            Session::flash('warning', 'Role could not be edited for some unknown reasons.');
        }

        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id); // Pull back a given role

        // Force Delete
        $role->users()->sync([]); // Delete relationship data
        $role->permissions()->sync([]); // Delete relationship data

        // Regular Delete
        $role->delete(); // This will work no matter what

        return redirect()->route('roles.index');
    }
}
