<?php

namespace App\Http\Controllers;

use App\Http\Requests\Incident\StoreRequest;
use App\Http\Requests\Incident\UpdateRequest;
use App\Http\Traits\ImageUploadTrait;
use App\Incident;
use App\IncidentImage;
use File;
use Illuminate\Http\Request;

class IncidentController extends Controller
{
    use ImageUploadTrait;

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
    public function create(Request $request)
    {
        if (auth()->user()->profile != 'guest') {
            return view('searches.incidents.create', ['search_id' => $request->search_id]);
        }

        return redirect('searches/'.$request->search_id)->with('error', __('messages.not_allowed'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $incident = Incident::create([
            'search_id'            => $request->get('search_id'),
            'user_creation_id'     => $request->get('user_creation_id'),
            'user_modification_id' => $request->get('user_modification_id'),
            'date'                 => $request->get('date'),
            'description'          => $request->get('description'),
        ]);

        if ($request->hasfile('images')) {
            $path = public_path('/uploads/search_'.$incident->search_id.'/incidents/incident_'.$incident->id.'/');
            $this->serialIncidentUpload($request->images, $path, $incident);
        }

        return redirect('searches/'.$incident->search_id.'#nav-incidents')
        ->with('success', __('main.incident').' '.$incident->id.__('messages.added'));
    }

    public function update(UpdateRequest $request, Incident $incident)
    {
        $incident->user_modification_id = $request->has('name') ? $request->user_modification_id : $incident->user_modification_id;
        $incident->date = $request->date;
        $incident->description = $request->description;

        $incident->update();

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
            $path = public_path('/uploads/search_'.$incident->search_id.'/incidents/incident_'.$incident->id.'/');
            $this->serialIncidentUpload($request->file('images_new'), $path, $incident);
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
    public function destroy(Incident $incident)
    {
        if (auth()->user()->profile == 'admin') {
            $incident->delete();

            return redirect('searches/'.$incident->search_id.'#nav-incidents')
            ->with('success', __('main.incident').' '.$incident->id.__('messages.deleted'));
            
        } 

        return back()->with('error', __('messages.not_allowed'));
    }
}
