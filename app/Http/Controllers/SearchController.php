<?php

namespace App\Http\Controllers;

use App\ActionPlan;
use App\Incident;
use App\LostPerson;
use App\Search;
use App\Task;
use Auth;
use Illuminate\Http\Request;
use Validator;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $searches = Search::all()->where('is_a_practice', '=', 0);
        $practices = Search::all()->where('is_a_practice', '=', 1);

        $regions_s = Search::select('region')
            ->whereNotNull('region')
            ->where('is_a_practice', '=', 0)
            ->groupBy('region')
            ->get();
        $regions_p = Search::select('region')
            ->whereNotNull('region')
            ->where('is_a_practice', '=', 1)
            ->groupBy('region')
            ->get();

        $villages_s = Search::select('municipality_last_place_seen')
            ->whereNotNull('municipality_last_place_seen')
            ->where('is_a_practice', '=', 0)
            ->groupBy('municipality_last_place_seen')
            ->get();
        $villages_p = Search::select('municipality_last_place_seen')
            ->whereNotNull('municipality_last_place_seen')
            ->where('is_a_practice', '=', 1)
            ->groupBy('municipality_last_place_seen')
            ->get();

        return view('searches.index', compact('searches', 'practices', 'regions_s', 'regions_p', 'villages_s', 'villages_p'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            $currentUser = \Auth::user()->profile;

            if ($currentUser != 'guest') {
                return view('searches.create');
            } else {
                return redirect('/')
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
            'search_id' => 'required|string|min:2|max:50|unique:searches',
        ], [
            'search_id.required' => __('messages.required'),
            'search_id.min'      => __('messages.min'),
            'search_id.max'      => __('messages.max'),
            'search_id.unique'   => __('messages.unique'),
        ]);

        $search = new Search([
            'is_a_practice'                  => $request->get('is_a_practice'),
            'search_id'                      => $request->get('search_id'),
            'region'                         => $request->get('region'),
            'status'                         => $request->get('status'),

            'date_start'                     => $request->get('date_start'),
            'date_finalization'              => $request->get('date_finalization'),

            'user_creation_id'               => $request->get('user_creation_id'),
            'user_last_modification_id'      => $request->get('user_last_modification_id'),
            'user_finalization_id'           => $request->get('user_finalization_id'),

            // person alerts
            'is_lost_person'                 => $request->get('is_lost_person'),
            'is_contact_person'              => $request->get('is_contact_person'),
            'name_person_alerts'             => $request->get('name_person_alerts'),
            'affinity_person_alerts'         => $request->get('affinity_person_alerts'),
            'phone_number_person_alerts'     => $request->get('phone_number_person_alerts'),
            'address_person_alerts'          => $request->get('address_person_alerts'),

            // incident
            'municipality_last_place_seen'   => $request->get('municipality_last_place_seen'),
            'date_last_place_seen'           => $request->get('date_last_place_seen'),
            'zone_incident'                  => $request->get('zone_incident'),
            'potential_route'                => $request->get('potential_route'),
            'description_incident'           => $request->get('description_incident'),

            // lost people
            'number_lost_people'             => $request->get('number_lost_people'),
            'physical_condition_lost_people' => $request->get('physical_condition_lost_people'),

            // equipment and experience
            'knowledge_of_the_zone'          => $request->get('knowledge_of_the_zone'),
            'experience_with_activity'       => $request->get('experience_with_activity'),
            'bring_water'                    => $request->get('bring_water'),
            'bring_food'                     => $request->get('bring_food'),
            'bring_medication'               => $request->get('bring_medication'),
            'bring_flashlight'               => $request->get('bring_flashlight'),
            'bring_cold_clothes'             => $request->get('bring_cold_clothes'),
            'bring_waterproof_clothes'       => $request->get('bring_waterproof_clothes'),

            // contact person
            'name_contact_person'            => $request->get('name_contact_person'),
            'phone_number_contact_person'    => $request->get('phone_number_contact_person'),
            'affinity_contact_person'        => $request->get('affinity_contact_person'),
        ]);
        $search->save();

        // add lost people list
        foreach ($request->input('lost_person_name') as $key => $value) {
            if ($value != '') {
                $lost_person = new LostPerson([
                    'search_id'                    => $search->id,
                    'name'                         => $value,
                    'name_respond'                 => $request->input('lost_person_name_respond')[$key],
                    'age'                          => $request->input('lost_person_age')[$key],
                    'phone_number'                 => $request->input('lost_person_phone_number')[$key],
                    'whatsapp_or_gps'              => $request->input('whatsapp_or_gps')[$key],
                    'profile'                      => $request->input('profile')[$key],
                    'physical_appearance'          => $request->input('physical_appearance')[$key],
                    'clothes'                      => $request->input('clothes')[$key],
                    'physical_condition'           => $request->input('physical_condition')[$key],
                    'diseases_or_injuries'         => $request->input('diseases_or_injuries')[$key],
                    'medication'                   => $request->input('medication')[$key],
                    'discapacities_or_limitations' => $request->input('discapacities_or_limitations')[$key],
                    'other'                        => $request->input('other')[$key],
                    'model_vehicle'                => $request->input('model_vehicle')[$key],
                    'color_vehicle'                => $request->input('color_vehicle')[$key],
                    'car_plate_number'             => $request->input('car_plate_number')[$key],
                ]);
                $lost_person->save();
            }
        }

        return redirect('searches/'.$search->id)
        ->with('success', $search->search_id.__('messages.added'));
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
        $search = Search::find($id);
        $action_plans = ActionPlan::where('search_id', $id)->get();
        $incidents = Incident::where('search_id', $id)->get();
        $tasks = Task::where('search_id', $id)->get();
        $taskGroups = $tasks->pluck('group')->filter()->unique()->sort();
        $taskTypes = $tasks->pluck('type')->filter()->unique();

        return view('searches.view', compact(
            'search',
            'action_plans',
            'incidents',
            'tasks',
            'taskGroups',
            'taskTypes'
        ));
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
        $search = Search::find($id);

        $currentUser = \Auth::user()->profile;

        if ($currentUser != 'guest') {
            $search->delete();

            return redirect('/')
            ->with('success', $search->search_id.__('messages.deleted'));
        } else {
            return redirect('searches/'.$search->id)
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
        $search = Search::find($id);

        $currentUser = \Auth::user()->profile;

        if ($currentUser != 'guest') {
            return view('searches.edit', compact('search'));
        } else {
            return redirect('searches/'.$search->id)
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
        $search = Search::find($id);

        $request->validate([
            'search_id' => 'required|string|min:2|max:50|unique:searches,search_id,'.$id,
        ], [
            'search_id.required' => __('messages.required'),
            'search_id.min'      => __('messages.min'),
            'search_id.max'      => __('messages.max'),
            'search_id.unique'   => __('messages.unique'),
        ]);

        // data from the search
        $search->is_a_practice = $request->has('is_a_practice') ? $request->get('is_a_practice') : $search->is_a_practice;
        $search->search_id = $request->has('search_id') ? $request->get('search_id') : $search->search_id;
        $search->region = $request->has('region') ? $request->get('region') : $search->region;
        $search->status = $request->has('status') ? $request->get('status') : $search->status;

        $search->date_start = $request->has('date_start') ? $request->get('date_start') : $search->date_start;
        $search->date_finalization = $request->has('date_finalization') ? $request->get('date_finalization') : $search->date_finalization;

        $search->user_creation_id = $request->has('user_creation_id') ? $request->get('user_creation_id') : $search->user_creation_id;
        $search->user_last_modification_id = $request->has('user_last_modification_id') ? $request->get('user_last_modification_id') : $search->user_last_modification_id;
        $search->user_finalization_id = $request->has('user_finalization_id') ? $request->get('user_finalization_id') : $search->user_finalization_id;

        // person alerts
        $search->is_lost_person = $request->has('is_lost_person') ? $request->get('is_lost_person') : $search->is_lost_person;
        $search->is_contact_person = $request->has('is_contact_person') ? $request->get('is_contact_person') : $search->is_contact_person;
        $search->name_person_alerts = $request->has('name_person_alerts') ? $request->get('name_person_alerts') : $search->name_person_alerts;
        $search->affinity_person_alerts = $request->has('affinity_person_alerts') ? $request->get('affinity_person_alerts') : $search->affinity_person_alerts;
        $search->phone_number_person_alerts = $request->has('phone_number_person_alerts') ? $request->get('phone_number_person_alerts') : $search->phone_number_person_alerts;
        $search->address_person_alerts = $request->has('address_person_alerts') ? $request->get('address_person_alerts') : $search->address_person_alerts;

        // incident
        $search->municipality_last_place_seen = $request->has('municipality_last_place_seen') ? $request->get('municipality_last_place_seen') : $search->municipality_last_place_seen;
        $search->date_last_place_seen = $request->has('date_last_place_seen') ? $request->get('date_last_place_seen') : $search->date_last_place_seen;
        $search->zone_incident = $request->has('zone_incident') ? $request->get('zone_incident') : $search->zone_incident;
        $search->potential_route = $request->has('potential_route') ? $request->get('potential_route') : $search->potential_route;
        $search->description_incident = $request->has('description_incident') ? $request->get('description_incident') : $search->description_incident;

        // lost people
        $search->number_lost_people = $request->has('number_lost_people') ? $request->get('number_lost_people') : $search->number_lost_people;
        $search->physical_condition_lost_people = $request->has('physical_condition_lost_people') ? $request->get('physical_condition_lost_people') : $search->physical_condition_lost_people;

        // equipment and experience
        $search->knowledge_of_the_zone = $request->has('knowledge_of_the_zone') ? $request->get('knowledge_of_the_zone') : $search->knowledge_of_the_zone;
        $search->experience_with_activity = $request->has('experience_with_activity') ? $request->get('experience_with_activity') : $search->experience_with_activity;
        $search->bring_water = $request->has('bring_water') ? $request->get('bring_water') : $search->bring_water;
        $search->bring_food = $request->has('bring_food') ? $request->get('bring_food') : $search->bring_food;
        $search->bring_medication = $request->has('bring_medication') ? $request->get('bring_medication') : $search->bring_medication;
        $search->bring_flashlight = $request->has('bring_flashlight') ? $request->get('bring_flashlight') : $search->bring_flashlight;
        $search->bring_cold_clothes = $request->has('bring_cold_clothes') ? $request->get('bring_cold_clothes') : $search->bring_cold_clothes;
        $search->bring_waterproof_clothes = $request->has('bring_waterproof_clothes') ? $request->get('bring_waterproof_clothes') : $search->bring_waterproof_clothes;

        // contact person
        $search->name_contact_person = $request->has('name_contact_person') ? $request->get('name_contact_person') : $search->name_contact_person;
        $search->phone_number_contact_person = $request->has('phone_number_contact_person') ? $request->get('phone_number_contact_person') : $search->phone_number_contact_person;
        $search->affinity_contact_person = $request->has('affinity_contact_person') ? $request->get('affinity_contact_person') : $search->affinity_contact_person;

        // information to close the search
        $search->work_groups_used = $request->has('work_groups_used') ? $request->get('work_groups_used') : $search->work_groups_used;
        $search->derivation_emergency_service = $request->has('derivation_emergency_service') ? $request->get('derivation_emergency_service') : $search->derivation_emergency_service;
        $search->emergency_service_receiver_id = $request->has('emergency_service_receiver_id') ? $request->get('emergency_service_receiver_id') : $search->emergency_service_receiver_id;
        $search->first_command = $request->has('first_command') ? $request->get('first_command') : $search->first_command;
        $search->intermediate_commands = $request->has('intermediate_commands') ? $request->get('intermediate_commands') : $search->intermediate_commands;
        $search->last_command = $request->has('last_command') ? $request->get('last_command') : $search->last_command;
        $search->tipology = $request->has('tipology') ? $request->get('tipology') : $search->tipology;
        $search->resources = $request->has('resources') ? $request->get('resources') : $search->resources;
        $search->date_localization = $request->has('date_localization') ? $request->get('date_localization') : $search->date_localization;
        $search->place_name_localization = $request->has('place_name_localization') ? $request->get('place_name_localization') : $search->place_name_localization;
        $search->location_localization = $request->has('location_localization') ? $request->get('location_localization') : $search->location_localization;
        $search->municipality_term_localization = $request->has('municipality_term_localization') ? $request->get('municipality_term_localization') : $search->municipality_term_localization;
        $search->distance_from_last_place_seen_to_location = $request->has('distance_from_last_place_seen_to_location') ? $request->get('distance_from_last_place_seen_to_location') : $search->distance_from_last_place_seen_to_location;
        $search->who_does_the_localization = $request->has('who_does_the_localization') ? $request->get('who_does_the_localization') : $search->who_does_the_localization;
        $search->physical_condition_people_when_find = $request->has('physical_condition_people_when_find') ? $request->get('physical_condition_people_when_find') : $search->physical_condition_people_when_find;
        $search->reason_finalization = $request->has('reason_finalization') ? $request->get('reason_finalization') : $search->reason_finalization;

        // catalonia firefighters system coordinates
        $search->coe_cut_localization = $request->has('coe_cut_localization') ? $request->get('coe_cut_localization') : $search->coe_cut_localization;
        $search->soc_localization = $request->has('soc_localization') ? $request->get('soc_localization') : $search->soc_localization;
        $search->section_localization = $request->has('section_localization') ? $request->get('section_localization') : $search->section_localization;
        $search->utm_x_localization = $request->has('utm_x_localization') ? $request->get('utm_x_localization') : $search->utm_x_localization;
        $search->utm_y_localization = $request->has('utm_y_localization') ? $request->get('utm_y_localization') : $search->utm_y_localization;

        // If search open and we want to close it
        if ($request->has('closebutton')) {
            /*
            $validator = Validator::make($request->all(), [
                'work_groups_used'                          => 'required',
                'derivation_emergency_service'              => 'required',
                'emergency_service_receiver_id'             => 'required',
                'first_command'                             => 'required',
                'intermediate_commands'                     => 'required',
                'last_command'                              => 'required',
                'tipology'                                  => 'required',
                'resources'                                 => 'required',
                'date_localization'                         => 'required',
                'place_name_localization'                   => 'required',
                'location_localization'                     => 'required',
                'municipality_term_localization'            => 'required',
                'distance_from_last_place_seen_to_location' => 'required',
                'who_does_the_localization'                 => 'required',
                'physical_condition_people_when_find'       => 'required',
                'reason_finalization'                       => 'required',
                'coe_cut_localization'                      => 'required',
                'soc_localization'                          => 'required',
                'section_localization'                      => 'required',
                'utm_x_localization'                        => 'required',
                'utm_y_localization'                        => 'required',
            ], [
                'work_groups_used.required'                               => __('messages.required'),
                'derivation_emergency_service.required'                   => __('messages.required'),
                'emergency_service_receiver_id.required'                  => __('messages.required'),
                'first_command.required'                                  => __('messages.required'),
                'intermediate_commands.required'                          => __('messages.required'),
                'last_command.required'                                   => __('messages.required'),
                'tipology.required'                                       => __('messages.required'),
                'resources.required'                                      => __('messages.required'),
                'date_localization.required'                              => __('messages.required'),
                'place_name_localization.required'                        => __('messages.required'),
                'location_localization.required'                          => __('messages.required'),
                'municipality_term_localization.required'                 => __('messages.required'),
                'distance_from_last_place_seen_to_location.required'      => __('messages.required'),
                'who_does_the_localization.required'                      => __('messages.required'),
                'physical_condition_people_when_find.required'            => __('messages.required'),
                'reason_finalization.required'                            => __('messages.required'),
                'coe_cut_localization.required'                           => __('messages.required'),
                'soc_localization.required'                               => __('messages.required'),
                'section_localization.required'                           => __('messages.required'),
                'utm_x_localization.required'                             => __('messages.required'),
                'utm_y_localization.required'                             => __('messages.required'),
            ]);
            if ($validator->fails()) {
                $search->save();

                return redirect('searches/'.$search->id.'#nav-closing')
                ->withErrors($validator)->withInput();
            }
            */

            $search->user_finalization_id = \Auth::user()->id;
            $search->date_finalization = date('Y-m-d H:i:s');
            $search->status = 1; // close
        }

        // If search close and we want to open it
        elseif ($request->has('openbutton')) {
            $search->user_finalization_id = null;
            $search->date_finalization = null;
            $search->status = 0; // open
        }

        $search->save();

        return redirect('searches/'.$search->id)
        ->with('success', $search->search_id.__('messages.updated'));
    }

    public function getVillagesSearchesList(Request $request)
    {
        if (empty($request)) {
            $villages_s = Search::select('municipality_last_place_seen')->whereNotNull('municipality_last_place_seen')->where('is_a_practice', '=', 0)->groupBy('municipality_last_place_seen')->get();
        } else {
            $villages_s = Search::select('municipality_last_place_seen')->whereNotNull('municipality_last_place_seen')->where('region', $request->region)->where('is_a_practice', '=', 0)->groupBy('municipality_last_place_seen')->get();
        }

        return response()->json($villages_s);
    }

    public function getVillagesPracticesList(Request $request)
    {
        if (empty($request)) {
            $villages_p = Search::select('municipality_last_place_seen')->whereNotNull('municipality_last_place_seen')->where('is_a_practice', '=', 1)->groupBy('municipality_last_place_seen')->get();
        } else {
            $villages_p = Search::select('municipality_last_place_seen')->whereNotNull('municipality_last_place_seen')->where('region', $request->region)->where('is_a_practice', '=', 1)->groupBy('municipality_last_place_seen')->get();
        }

        return response()->json($villages_p);
    }
}
