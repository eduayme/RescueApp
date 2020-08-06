<?php

namespace App\Http\Controllers;

use App\LostPerson;
use App\Search;
use Auth;
use File;
use Illuminate\Http\Request;
use Image;

class LostPersonController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (Auth::check()) {
            $current_user_profile = \Auth::user()->profile;
            $search = Search::find($request->search_id);

            if ($current_user_profile != 'guest') {
                return view('searches.lost_people.create', compact('search'));
            } else {
                return back()
                ->with('error', __('messages.not_allowed'));
            }
        } else {
            return redirect()->action('HomeController@login');
        }
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
        $request->validate([
            'name'  => 'required|string|min:2|max:50',
            'photo' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
        ], [
            'name.required' => __('messages.required'),
            'name.min'      => __('messages.min'),
            'name.max'      => __('messages.max'),
            'photo.image'   => __('messages.image'),
            'photo.mimes'   => __('messages.mimes'),
            'photo.max'     => __('messages.photo_max'),
        ]);

        $lost_person = new LostPerson([
            'search_id'                     => $request->get('search_id'),
            'name'                          => $request->get('name'),
            'name_respond'                  => $request->get('name_respond'),
            'age'                           => $request->get('age'),
            'phone_number'                  => $request->get('phone_number'),
            'whatsapp_or_gps'               => $request->get('whatsapp_or_gps'),
            'profile'                       => $request->get('profile'),
            'physical_appearance'           => $request->get('physical_appearance'),
            'clothes'                       => $request->get('clothes'),
            'other'                         => $request->get('other'),

            // person status
            'physical_condition'             => $request->get('physical_condition'),
            'diseases_or_injuries'           => $request->get('diseases_or_injuries'),
            'medication'                     => $request->get('medication'),
            'discapacities_or_limitations'   => $request->get('discapacities_or_limitations'),

            // vehicle
            'model_vehicle'            => $request->get('model_vehicle'),
            'color_vehicle'            => $request->get('color_vehicle'),
            'car_plate_number'         => $request->get('car_plate_number'),
        ]);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time().'.'.$photo->getClientOriginalExtension();
            $path = public_path('/uploads/lost_people_photos/');
            File::exists($path) or File::makeDirectory($path, 0777, true, true);
            Image::make($photo)->resize(300, 300)->save($path.$filename);

            $lost_person->photo = $filename;
        }

        $lost_person->save();

        return redirect('searches/'.$lost_person->search_id)
        ->with('success', $lost_person->name.__('messages.added'));
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
        $lost_person = LostPerson::find($id);
        $search = Search::find($lost_person->search_id);

        return view('searches.lost_people.view', compact('lost_person', 'search'));
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
        $lost_person = LostPerson::find($id);
        $current_user_profile = \Auth::user()->profile;

        if ($current_user_profile != 'guest') {
            $lost_person->delete();

            return redirect('searches/'.$lost_person->search_id)
            ->with('success', $lost_person->name.__('messages.deleted'));
        } else {
            return redirect('lost-people/'.$lost_person->id)
            ->with('error', __('messages.not_allowed'));
        }
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
        $lost_person = LostPerson::find($id);
        $current_user_profile = \Auth::user()->profile;

        if ($current_user_profile != 'guest') {
            return view('searches.lost_people.edit', compact('lost_person'));
        } else {
            return redirect('lost-people/'.$lost_person->id)
            ->with('error', __('messages.not_allowed'));
        }
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
        $lost_person = LostPerson::find($id);

        $request->validate([
            'name' => 'required|string|min:2|max:50',
        ], [
            'name.required' => __('messages.required'),
            'name.min'      => __('messages.min'),
            'name.max'      => __('messages.max'),
        ]);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time().'.'.$photo->getClientOriginalExtension();

            // delete current image before uploading new image
            if ($lost_person->photo !== 'default.jpg') {
                $file = public_path('/uploads/lost_people_photos/'.$lost_person->photo);

                if (File::exists($file)) {
                    unlink($file);
                }
            }

            Image::make($photo)->resize(300, 300)->save(public_path('/uploads/lost_people_photos/'.$filename));

            $lost_person->photo = $filename;
        }

        // information of the lost person
        $lost_person->id = $request->get('id');
        $lost_person->search_id = $request->get('search_id');
        $lost_person->found = $request->get('found');
        $lost_person->name = $request->get('name');
        $lost_person->name_respond = $request->get('name_respond');
        $lost_person->age = $request->get('age');
        $lost_person->phone_number = $request->get('phone_number');
        $lost_person->whatsapp_or_gps = $request->get('whatsapp_or_gps');
        $lost_person->profile = $request->get('profile');
        $lost_person->physical_appearance = $request->get('physical_appearance');
        $lost_person->clothes = $request->get('clothes');
        $lost_person->other = $request->get('other');

        // person status
        $lost_person->physical_condition = $request->get('physical_condition');
        $lost_person->diseases_or_injuries = $request->get('diseases_or_injuries');
        $lost_person->medication = $request->get('medication');
        $lost_person->discapacities_or_limitations = $request->get('discapacities_or_limitations');

        // vehicle
        $lost_person->model_vehicle = $request->get('model_vehicle');
        $lost_person->color_vehicle = $request->get('color_vehicle');
        $lost_person->car_plate_number = $request->get('car_plate_number');

        $lost_person->save();

        return redirect('lost-people/'.$lost_person->id)
        ->with('success', $lost_person->name.__('messages.updated'));
    }
}
