<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Session;
use Validator;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeAssignPermission(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user_role = $user->roles;
        foreach ($user_role as $role) {
            $role_id = $role->id;
        }

        $role = Role::find($role_id);
        $role_permission = $role->permissions;

        if ($role_permission->count() != 0) {
            $newroleper = [];
            foreach ($role_permission as $rp) {
                array_push($newroleper, $rp->id);
                $result = array_intersect($newroleper, $request->permissions);
                if (count($result) != 0) {
                    return redirect()->back()->with('error', 'This user has a role that has the permission you want to assign it.');
                }
            }
        }

        if ($request->permissions) {
            $newPermissions = implode(',', $request->permissions);
            $newPermission = explode(',', $newPermissions);

            $user->syncPermissions($newPermission);
            // $user->permissions()->sync($request->roles);
            Session::flash('success', 'User Permissions have been edited.');
        } else {
            if ($user->permissions->count() > 0) {
                foreach ($user->permissions as $rp) {
                    $user->detachPermission($rp->id);
                }
                Session::flash('success', 'User Permissions have been edited.');
            }
        }

        return redirect()->back();
    }

    public function index()
    {
        $permissions = Permission::orderBy('id', 'desc')->get();

        return view('permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->permission_type == 'basic') {
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

            $permission = new Permission();
            $permission->name = $request->name;
            $permission->display_name = $request->display_name;
            $permission->description = $request->description;

            if ($permission->save()) {
                Session::flash('success', 'Permission has been successfully added');

                return redirect()->route('permissions.index');
            }
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
        $permission = Permission::findOrFail($id);

        return view('permission.show')->withPermission($permission);
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
        $permission = Permission::findOrFail($id);

        return view('permission.edit')->withPermission($permission);
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

        $permission = Permission::findOrFail($id);
        $permission->display_name = $request->display_name;
        $permission->description = $request->description;
        $permission->save();

        Session::flash('success', 'Updated the '.$permission->display_name.' permission.');

        return redirect()->route('permissions.show', $id);
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
        $permission = Permission::findOrFail($id); // Pull back a given role

        // Force Delete
        $permission->users()->sync([]); // Delete relationship data
        $permission->roles()->sync([]); // Delete relationship data

        // Regular Delete
        $permission->delete(); // This will work no matter what

        return redirect()->route('permissions.index');
    }
}
