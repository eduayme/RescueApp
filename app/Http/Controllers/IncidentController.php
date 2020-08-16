<?php

namespace App\Http\Controllers;

use App\Incident;
use App\IncidentImage;
use Auth;
use File;
use Illuminate\Http\Request;
use Image;

class IncidentController extends Controller
{
    public function index()
    {
        $incidents = Incident::all();

        return view('searches.incidents.index', compact('incidents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            $currentUser = \Auth::user()->profile;

            if ($currentUser != 'guest') {
                return view('searches.incidents.create');
            } else {
                return redirect('searches/'.$incident->search_id)
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
            'description' => 'required',
            'date'        => 'required',
            'photo'       => 'mimes:jpg,png,jpeg,gif,svg',
        ], [
            'description.required' => __('messages.required'),
            'date.required'        => __('messages.required'),
            'photo.image'          => __('messages.image'),
            'photo.mimes'          => __('messages.mimes'),
            'photo.max'            => __('messages.photo_max'),
        ]);

        $incident = new Incident([
            'search_id'            => $request->get('search_id'),
            'user_creation_id'     => $request->get('user_creation_id'),
            'user_modification_id' => $request->get('user_modification_id'),
            'date'                 => $request->get('date'),
            'description'          => $request->get('description'),
        ]);
        $incident->save();

        if ($request->hasfile('images')) {
            $id = 1;
            foreach ($request->file('images') as $image) {
                $filename = 'Image_'.$id.'.'.$image->getClientOriginalExtension();
                $path = public_path('/uploads/search_'.$incident->search_id.'/incidents/incident_'.$incident->id.'/');
                File::exists($path) or File::makeDirectory($path, 0777, true, true);
                Image::make($image)->save($path.$filename);

                $incident_image = new IncidentImage([
                    'photo'       => $filename,
                    'incident_id' => $incident->id,
                ]);
                $incident_image->save();
                $id++;
            }
        }

        return redirect('searches/'.$incident->search_id.'#nav-incidents')
        ->with('success', __('main.incident').' '.$incident->id.__('messages.added'));
    }

    public function update(Request $request, $id)
    {
        $incident = Incident::find($id);

        $incident->user_modification_id = $request->get('user_modification_id') ? $request->get('user_modification_id') : $incident->user_modification_id;
        $incident->date = $request->get('date') ? $request->get('date') : $incident->date;
        $incident->description = $request->get('description') ? $request->get('description') : $incident->description;

        $incident->save();

        if ($request->get('images_delete')) {
            foreach ($request->get('images_delete') as $image_id) {
                $image = IncidentImage::find($image_id);
                $file = public_path('/uploads/search_'.$incident->search_id.'/incidents/incident_'.$incident->id.'/'.$image->photo);

                if (File::exists($file)) {
                    unlink($file);
                }
                $image->delete();
            }
        }

        if ($request->hasfile('images_new')) {
            $count = $incident->images()->count();
            if ($count == 0) {
                $id = 1;
            } else {
                $id = IncidentImage::orderBy('id', 'desc')->where('incident_id', '=', $incident->id)->first()->id + 1;
            }

            foreach ($request->file('images_new') as $image) {
                $filename = 'Image_'.$id.'.'.$image->getClientOriginalExtension();
                $path = public_path('/uploads/search_'.$incident->search_id.'/incidents/incident_'.$incident->id.'/');
                File::exists($path) or File::makeDirectory($path, 0777, true, true);
                Image::make($image)->save($path.$filename);

                $incident_image = new IncidentImage([
                    'photo'       => $filename,
                    'incident_id' => $incident->id,
                ]);
                $incident_image->save();
                $id++;
            }
        }

        return redirect('searches/'.$incident->search_id.'#nav-incidents')
        ->with('success', __('main.incident').' '.$incident->id.__('messages.updated'));
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
        $incident = Incident::find($id);
        $currentUser = \Auth::user()->profile;

        if ($currentUser == 'admin') {
            $incident->delete();

            return redirect('searches/'.$incident->search_id.'#nav-incidents')
            ->with('success', __('main.incident').' '.$incident->id.__('messages.deleted'));
        } else {
            return back()
            ->with('error', __('messages.not_allowed'));
        }
    }
}
