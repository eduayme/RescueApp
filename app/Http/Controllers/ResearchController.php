<?php

namespace App\Http\Controllers;

use App\Research;
use Auth;
use Illuminate\Http\Request;
use Validator;

class ResearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $researches = Research::all()->where('is_a_practice', '=', 0);
        $practices = Research::all()->where('is_a_practice', '=', 1);

        return view('researches.index', compact('researches', 'practices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check())
        {
            $currentUser = \Auth::user()->profile;

            if ($currentUser != 'guest') {
                return view('researches.create');
            }
            else
            {
                return redirect('/')
                ->with('error', __('messages.not_allowed'));
            }
        }
        else {
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
            'id_research' => 'required|string|min:3|max:50|unique:researches',
        ], [
            'id_research.required' => __('messages.required'),
            'id_research.min'      => __('messages.min'),
            'id_research.max'      => __('messages.max'),
            'id_research.unique'   => __('messages.unique'),
        ]);

        $research = new Research([
            'is_a_practice'                  => $request->get('is_a_practice'),
            'id_research'                 => $request->get('id_research'),
            'region'                        => $request->get('region'),
            'status'                        => $request->get('status'),

            'date_start'                   => $request->get('date_start'),
            'date_creation'                 => $request->get('date_creation'),
            'date_last_modification'      => $request->get('date_last_modification'),
            'date_finalization'               => $request->get('date_finalization'),

            'id_user_creation'            => $request->get('id_user_creation'),
            'id_user_last_modification' => $request->get('id_user_last_modification'),
            'id_user_finalization'          => $request->get('id_user_finalization'),

            // person alerts
            'is_lost_person'               => $request->get('is_lost_person'),
            'is_contact_person'                  => $request->get('is_contact_person'),
            'name_person_alerts'                 => $request->get('name_person_alerts'),
            'age_person_alerts'                => $request->get('age_person_alerts'),
            'phone_number_person_alerts'             => $request->get('phone_number_person_alerts'),
            'address_person_alerts'              => $request->get('address_person_alerts'),

            // incident
            'municipality_last_place_seen'       => $request->get('municipality_last_place_seen'),
            'date_last_place_seen'                     => $request->get('date_last_place_seen'),
            'zone_incident'                => $request->get('zone_incident'),
            'potential_route'                => $request->get('potential_route'),
            'description_incident'          => $request->get('description_incident'),

            // lost people
            'number_lost_people'          => $request->get('number_lost_people'),
            'physical_condition_lost_people' => $request->get('physical_condition_lost_people'),

            // equipment and experience
            'knowledge_of_the_zone'                  => $request->get('knowledge_of_the_zone'),
            'experience_with_activity'        => $request->get('experience_with_activity'),
            'bring_water'                  => $request->get('bring_water'),
            'bring_food'                 => $request->get('bring_food'),
            'bring_medication'         => $request->get('bring_medication'),
            'bring_flashlight'                   => $request->get('bring_flashlight'),
            'bring_cold_clothes'                   => $request->get('bring_cold_clothes'),
            'bring_waterproof_clothes'             => $request->get('bring_waterproof_clothes'),

            // contact person
            'name_contact_person'         => $request->get('name_contact_person'),
            'phone_number_contact_person'     => $request->get('phone_number_contact_person'),
            'affinity_contact_person'    => $request->get('affinity_contact_person'),
        ]);

        $research->save();

        return redirect('researches/' . $research->id)
        ->with('success', $research->id_research . __('messages.added'));
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
        $research = Research::find($id);

        return view('researches.view', compact('research'));
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
        $research = Research::find($id);

        $currentUser = \Auth::user()->profile;

        if ($currentUser != 'guest') {
            $research->delete();

            return redirect('/')
            ->with('success', $research->id_research . __('messages.deleted'));
        } else {
            return redirect('researches/' . $research->id)
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
        $research = Research::find($id);

        $currentUser = \Auth::user()->profile;

        if ($currentUser != 'guest') {
            return view('researches.edit', compact('research'));
        } else {
            return redirect('researches/' . $research->id)
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
        $research = Research::find($id);

        $request->validate([
            'id_research' => 'required|string|min:3|max:50|unique:researches,id_research,' . $id,
        ], [
            'id_research.required' => __('messages.required'),
            'id_research.min'      => __('messages.min'),
            'id_research.max'      => __('messages.max'),
            'id_research.unique'   => __('messages.unique'),
        ]);

        // data from the research
        $research->is_a_practice = $request->has('is_a_practice') ? $request->get('is_a_practice') : $research->is_a_practice;
        $research->id_research = $request->has('id_research') ? $request->get('id_research') : $research->id_research;
        $research->region = $request->has('region') ? $request->get('region') : $research->region;
        $research->status = $request->has('status') ? $request->get('status') : $research->status;

        $research->date_start = $request->has('date_start') ? $request->get('date_start') : $research->date_start;
        $research->date_creation = $request->has('date_creation') ? $request->get('date_creation') : $research->date_creation;
        $research->date_last_modification = $request->has('date_last_modification') ? $request->get('date_last_modification') : $research->date_last_modification;
        $research->date_finalization = $request->has('date_finalization') ? $request->get('date_finalization') : $research->date_finalization;

        $research->id_user_creation = $request->has('id_user_creation') ? $request->get('id_user_creation') : $research->id_user_creation;
        $research->id_user_last_modification = $request->has('id_user_last_modification') ? $request->get('id_user_last_modification') : $research->id_user_last_modification;
        $research->id_user_finalization = $request->has('id_user_finalization') ? $request->get('id_user_finalization') : $research->id_user_finalization;

        // person alerts
        $research->is_lost_person = $request->has('is_lost_person') ? $request->get('is_lost_person') : $research->is_lost_person;
        $research->is_contact_person = $request->has('is_contact_person') ? $request->get('is_contact_person') : $research->is_contact_person;
        $research->name_person_alerts = $request->has('name_person_alerts') ? $request->get('name_person_alerts') : $research->name_person_alerts;
        $research->age_person_alerts = $request->has('age_person_alerts') ? $request->get('age_person_alerts') : $research->age_person_alerts;
        $research->phone_number_person_alerts = $request->has('phone_number_person_alerts') ? $request->get('phone_number_person_alerts') : $research->phone_number_person_alerts;
        $research->address_person_alerts = $request->has('address_person_alerts') ? $request->get('address_person_alerts') : $research->address_person_alerts;

        // incident
        $research->municipality_last_place_seen = $request->has('municipality_last_place_seen') ? $request->get('municipality_last_place_seen') : $research->municipality_last_place_seen;
        $research->date_last_place_seen = $request->has('date_last_place_seen') ? $request->get('date_last_place_seen') : $research->date_last_place_seen;
        $research->zone_incident = $request->has('zone_incident') ? $request->get('zone_incident') : $research->zone_incident;
        $research->potential_route = $request->has('potential_route') ? $request->get('potential_route') : $research->potential_route;
        $research->description_incident = $request->has('description_incident') ? $request->get('description_incident') : $research->description_incident;

        // lost people
        $research->number_lost_people = $request->has('number_lost_people') ? $request->get('number_lost_people') : $research->number_lost_people;
        $research->physical_condition_lost_people = $request->has('physical_condition_lost_people') ? $request->get('physical_condition_lost_people') : $research->physical_condition_lost_people;

        // equipment and experience
        $research->knowledge_of_the_zone = $request->has('knowledge_of_the_zone') ? $request->get('knowledge_of_the_zone') : $research->knowledge_of_the_zone;
        $research->experience_with_activity = $request->has('experience_with_activity') ? $request->get('experience_with_activity') : $research->experience_with_activity;
        $research->bring_water = $request->has('bring_water') ? $request->get('bring_water') : $research->bring_water;
        $research->bring_food = $request->has('bring_food') ? $request->get('bring_food') : $research->bring_food;
        $research->bring_medication = $request->has('bring_medication') ? $request->get('bring_medication') : $research->bring_medication;
        $research->bring_flashlight = $request->has('bring_flashlight') ? $request->get('bring_flashlight') : $research->bring_flashlight;
        $research->bring_cold_clothes = $request->has('bring_cold_clothes') ? $request->get('bring_cold_clothes') : $research->bring_cold_clothes;
        $research->bring_waterproof_clothes = $request->has('bring_waterproof_clothes') ? $request->get('bring_waterproof_clothes') : $research->bring_waterproof_clothes;

        // contact person
        $research->name_contact_person = $request->has('name_contact_person') ? $request->get('name_contact_person') : $research->name_contact_person;
        $research->phone_number_contact_person = $request->has('phone_number_contact_person') ? $request->get('phone_number_contact_person') : $research->phone_number_contact_person;
        $research->affinity_contact_person = $request->has('affinity_contact_person') ? $request->get('affinity_contact_person') : $research->affinity_contact_person;

        // information to close the research
        $research->work_groups_used = $request->has('work_groups_used') ? $request->get('work_groups_used') : $research->work_groups_used;
        $research->derivation_emergency_service = $request->has('derivation_emergency_service') ? $request->get('derivation_emergency_service') : $research->derivation_emergency_service;
        $research->emergency_service_receiver_id = $request->has('emergency_service_receiver_id') ? $request->get('emergency_service_receiver_id') : $research->emergency_service_receiver_id;
        $research->first_command = $request->has('first_command') ? $request->get('first_command') : $research->first_command;
        $research->intermediate_commands = $request->has('intermediate_commands') ? $request->get('intermediate_commands') : $research->intermediate_commands;
        $research->last_command = $request->has('last_command') ? $request->get('last_command') : $research->last_command;
        $research->tipology = $request->has('tipology') ? $request->get('tipology') : $research->tipology;
        $research->resources = $request->has('resources') ? $request->get('resources') : $research->resources;
        $research->date_localization = $request->has('date_localization') ? $request->get('date_localization') : $research->date_localization;
        $research->place_name_localization = $request->has('place_name_localization') ? $request->get('place_name_localization') : $research->place_name_localization;
        $research->location_localization = $request->has('location_localization') ? $request->get('location_localization') : $research->location_localization;
        $research->municipality_term_localization = $request->has('municipality_term_localization') ? $request->get('municipality_term_localization') : $research->municipality_term_localization;
        $research->distance_from_last_place_seen_to_location = $request->has('distance_from_last_place_seen_to_location') ? $request->get('distance_from_last_place_seen_to_location') : $research->distance_from_last_place_seen_to_location;
        $research->who_does_the_localization = $request->has('who_does_the_localization') ? $request->get('who_does_the_localization') : $research->who_does_the_localization;
        $research->physical_condition_people_when_find = $request->has('physical_condition_people_when_find') ? $request->get('physical_condition_people_when_find') : $research->physical_condition_people_when_find;
        $research->reason_finalization = $request->has('reason_finalization') ? $request->get('reason_finalization') : $research->reason_finalization;

        // catalonia firefighters system coordinates
        $research->coe_cut_localization = $request->has('coe_cut_localization') ? $request->get('coe_cut_localization') : $research->coe_cut_localization;
        $research->soc_localization = $request->has('soc_localization') ? $request->get('soc_localization') : $research->soc_localization;
        $research->section_localization = $request->has('section_localization') ? $request->get('section_localization') : $research->section_localization;
        $research->utm_x_localization = $request->has('utm_x_localization') ? $request->get('utm_x_localization') : $research->utm_x_localization;
        $research->utm_y_localization = $request->has('utm_y_localization') ? $request->get('utm_y_localization') : $research->utm_y_localization;

        // If search open and we want to close it
        if ($request->has('closebutton'))
        {
            $validator = Validator::make($request->all(), [
                'work_groups_used' => 'required',
                'derivation_emergency_service' => 'required',
                'emergency_service_receiver_id' => 'required',
                'first_command' => 'required',
                'intermediate_commands' => 'required',
                'last_command' => 'required',
                'tipology' => 'required',
                'resources' => 'required',
                'date_localization' => 'required',
                'place_name_localization' => 'required',
                'location_localization' => 'required',
                'municipality_term_localization' => 'required',
                'distance_from_last_place_seen_to_location' => 'required',
                'who_does_the_localization' => 'required',
                'physical_condition_people_when_find' => 'required',
                'reason_finalization' => 'required',
                'coe_cut_localization' => 'required',
                'soc_localization' => 'required',
                'section_localization' => 'required',
                'utm_x_localization' => 'required',
                'utm_y_localization' => 'required',
            ], [
                'work_groups_used.required'         => __('messages.required'),
                'derivation_emergency_service.required'     => __('messages.required'),
                'emergency_service_receiver_id.required'     => __('messages.required'),
                'first_command.required'            => __('messages.required'),
                'intermediate_commands.required'            => __('messages.required'),
                'last_command.required'              => __('messages.required'),
                'tipology.required'                      => __('messages.required'),
                'resources.required'                       => __('messages.required'),
                'date_localization.required'              => __('messages.required'),
                'place_name_localization.required'           => __('messages.required'),
                'location_localization.required'            => __('messages.required'),
                'municipality_term_localization.required'   => __('messages.required'),
                'distance_from_last_place_seen_to_location.required'  => __('messages.required'),
                'who_does_the_localization.required'               => __('messages.required'),
                'physical_condition_people_when_find.required'            => __('messages.required'),
                'reason_finalization.required'             => __('messages.required'),
                'coe_cut_localization.required'             => __('messages.required'),
                'soc_localization.required'     => __('messages.required'),
                'section_localization.required'            => __('messages.required'),
                'utm_x_localization.required'                   => __('messages.required'),
                'utm_y_localization.required'             => __('messages.required'),
            ]);
            if ($validator->fails())
            {
                $research->save();

                return redirect('researches/' . $research->id . '#nav-closing')
                ->withErrors($validator)->withInput();
            }

            $research->id_user_finalization = \Auth::user()->id;
            $research->date_finalization = date('Y-m-d H:i:s');
            $research->status = 1; // close
        }

        // If search close and we want to open it
        elseif ($request->has('openbutton')) {
            $research->id_user_finalization = null;
            $research->date_finalization = null;
            $research->status = 0; // open
        }

        $research->save();

        return redirect('researches/' . $research->id)
        ->with('success', $research->id_research . __('messages.updated'));
    }
}
