@extends('layouts.app_secondary')

@section('title', __('actions.edit') . ' ' . $search->search_id)

@section('content')

    <!-- Alerts - OPEN -->
    @include('parts.alerts')
    <!-- Alerts - CLOSE -->

    <!-- Content - OPEN -->
    <div class="container margin-top padding-bottom">

        <!-- Go back button - OPEN -->
        @include('buttons.go_back')
        <!-- Go back button - CLOSE -->

        <!-- Form - OPEN -->
        {{ Form::model($search, array('route' => array('searches.update', $search->id), 'method' => 'PUT')) }}

            <!-- Stype service title - OPEN -->
            <h3 style="margin-bottom: -20px">
                {{ __('forms.type_service') }}
            </h3>
            <!-- Stype service title - CLOSE -->

            <!-- Type activity, code and region - OPEN -->
            <div class="form-row">
                @csrf

                @if( $search->is_a_practice == 0 )
                    <style>
                        #es_prac {
                            visibility: hidden;
                        }
                    </style>
                @else
                    <style>
                        #es_rece {
                            visibility: hidden;
                        }
                    </style>
                @endif

                <!-- Search type activity - OPEN -->
                <div class="form-group funkyradio col-md-2" id="es_rece">

                    <!-- Search option - OPEN -->
                    <div class="funkyradio-primary">
                        {{ Form::radio('is_a_practice', 0, true, array('class' => 'form-control','id'=>'is_search')) }}
                        {{ Form::label('is_a_practice', __('main.search')) }}
                    </div>
                    <!-- Search option - CLOSE -->

                </div>
                <!-- Search type activity - CLOSE -->

                <!-- Practice type activity - OPEN -->
                <div class="form-group funkyradio col-md-2" id="es_prac">

                    <!-- Practice option - OPEN -->
                    <div class="funkyradio-primary">
                        {{ Form::radio('is_a_practice', 1, false, array('class' => 'form-control','id'=>'is_practice')) }}
                        {{ Form::label('is_a_practice', __('main.practice')) }}
                    </div>
                    <!-- Practice option - CLOSE -->

                </div>
                <!-- Practice type activity - CLOSE -->

                <!-- Empty space - OPEN -->
                <div class="form-group col-md-1"> </div>
                <!-- Empty space - CLOSE -->

                <!-- Begin datetime - OPEN -->
                <div class="form-group col-md-3">

                    {{ Form::label('date_start', __('forms.begin_date')) }}
                    <input type="text" name="date_start" value="{{ $search->date_start }}"
                    class="form-control {{ $errors->has('date_start') ? ' is-invalid' : '' }}" />

                    <!-- Show errors input - OPEN -->
                    @if( $errors->has('date_start') )
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('date_start') }}</strong>
                        </div>
                    @endif
                    <!-- Show errors input - CLOSE -->

                </div>
                <!-- Begin datetime - CLOSE -->

                <!-- Search ID - OPEN  -->
                <div class="form-group col-md-2">

                    <label for="search_id"> {{ __('forms.search_id') }} </label>
                    <input type="text" name="search_id" value="{{ $search->search_id }}"
                    class="form-control {{ $errors->has('search_id') ? ' is-invalid' : '' }}" />

                    <!-- Show errors input - OPEN -->
                    @if( $errors->has('search_id') )
                      <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('search_id') }}</strong>
                      </div>
                    @endif
                    <!-- Show errors input - CLOSE -->

                </div>
               <!-- Search ID - CLOSE  -->

                <!-- Search region - OPEN  -->
                <div class="form-group col-md-2">

                    <label for="region"> {{ __('forms.region') }} </label>

                    <select id="region" class="form-control" name="region">
                        <option value="" {{ ($search->region === '') ? 'selected' : '' }}>
                          {{ __('forms.chose_option') }}
                        </option>
                        <option value="01 - Centre" {{ ($search->region == '01 - Centre') ? 'selected' : '' }}>
                          01 - Centre
                        </option>
                        <option value="02 - Girona" {{ ($search->regin == '02 - Girona') ? 'selected' : '' }}>
                          02 - Girona
                        </option>
                        <option value="03 - Lleida" {{ ($search->region == '03 - Lleida') ? 'selected' : '' }}>
                          03 - Lleida
                        </option>
                        <option value="04 - Metropolitana Nord" {{ ($search->region == '04 - Metropolitana Nord') ? 'selected' : '' }}>
                           04 - Metropolitana Nord
                         </option>
                        <option value="05 - Metropolitana Sud" {{ ($search->region == '05 - Metropolitana Sud') ? 'selected' : '' }}>
                          05 - Metropolitana Sud
                        </option>
                        <option value="06 - Tarragona" {{ ($search->region == '06 - Tarragona') ? 'selected' : '' }}>
                          06 - Tarragona
                        </option>
                        <option value="07 - Terres Ebre" {{ ($search->region == '07 - Terres Ebre') ? 'selected' : '' }}>
                          07 - Terres Ebre
                        </option>
                    </select>

                </div>
                <!-- Search region - CLOSE  -->

            </div>
            <!-- Type activity, code and region - OPEN -->

            <!-- Alertant title - OPEN -->
            <h3 class="margin-top-sm accordion-title collapsed" data-toggle="collapse" href="#collapseAlertant" role="button" aria-expanded="false" aria-controls="collapseAlertant">
                {{ __('forms.alertant') }}
            </h3>
            <!-- Stype service title - CLOSE -->

            <!-- Alertant - OPEN -->
            <div class="form-row collapse" id="collapseAlertant">

                <!-- Is the lost person - OPEN  -->
                <div class="form-group col-md-3">
                    <label for="is_lost_person"> {{ __('forms.is_the_lost_person') }} </label>
                    <select id="is_lost_person" class="form-control" name="is_lost_person">
                        <option value="" {{ ($search->is_lost_person === '') ? 'selected' : '' }}>
                            {{ __('forms.chose_option') }}
                        </option>
                        <option value="0" {{ ($search->is_lost_person === 0) ? 'selected' : '' }}>
                            {{ __('actions.no') }}
                        </option>
                        <option value="1" {{ ($search->is_lost_person === 1) ? 'selected' : '' }}>
                            {{ __('actions.yes') }}
                        </option>
                  </select>
                </div>
                <!-- Is the lost person - CLOSE  -->

                <!-- Is the contact person - OPEN  -->
                <div class="form-group col-md-3">
                    <label for="is_contact_person"> {{ __('forms.is_the_contact_person') }} </label>
                    <select id="is_contact_person" class="form-control" name="is_contact_person">
                        <option value="" {{ ($search->is_contact_person === '') ? 'selected' : '' }}>
                            {{ __('forms.chose_option') }}
                        </option>
                        <option value="0" {{ ($search->is_contact_person === 0) ? 'selected' : '' }}>
                            {{ __('actions.no') }}
                        </option>
                        <option value="1" {{ ($search->is_contact_person === 1) ? 'selected' : '' }}>
                            {{ __('actions.yes') }}
                        </option>
                    </select>
                </div>
                <!-- Is the contact person - CLOSE  -->

                <!-- Alertant name - OPEN  -->
                <div class="form-group col-md-6">
                    {{ Form::label('name_person_alerts', __('register.name')) }}
                    {{ Form::text('name_person_alerts', null, array('class' => 'form-control')) }}
                </div>
                <!-- Alertant name - CLOSE  -->

                <!-- Alertant age - OPEN  -->
                <div class="form-group col-md-2">
                    {{ Form::label('age_person_alerts', __('forms.age')) }}
                    {{ Form::number('age_person_alerts', null, array('class' => 'form-control')) }}
                </div>
                <!-- Alertant age - CLOSE  -->

                <!-- Alertant phone - OPEN  -->
                <div class="form-group col-md-4">
                    {{ Form::label('phone_number_person_alerts', __('forms.phone')) }}
                    {{ Form::text('phone_number_person_alerts', null, array('class' => 'form-control')) }}
                </div>
                <!-- Alertant phone - CLOSE  -->

                <!-- Alertant address - OPEN  -->
                <div class="form-group col-md-6">
                    {{ Form::label('address_person_alerts', __('forms.address')) }}
                    {{ Form::text('address_person_alerts', null, array('class' => 'form-control')) }}
                </div>
                <!-- Alertant address - CLOSE  -->

            </div>
            <!-- Alertant - CLOSE -->
            <hr/>

            <!-- Incident title - OPEN -->
            <h3 class="margin-top accordion-title collapsed" data-toggle="collapse" href="#collapseIncident" role="button" aria-expanded="false" aria-controls="collapseIncident">
                {{ __('forms.incident') }}
            </h3>
            <!-- Incident title - CLOSE -->

            <!-- Incident - OPEN -->
            <div class="form-row collapse" id="collapseIncident">

                <!-- Incident village UPA - OPEN  -->
                <div class="form-group col-md-6">

                    <label for="municipality_last_place_seen">
                        {{ __('forms.village_last_place_seen') }}
                        <span class="octicon octicon-info" data-toggle="tooltip"
                        data-placement="top" title="{{ __('forms.upa') }}"></span>
                    </label>

                    {{ Form::text('municipality_last_place_seen', null, array('class' => 'form-control')) }}

                </div>
                <!-- Incident village UPA - CLOSE  -->

                <!-- Incident date UPA - OPEN  -->
                <div class="form-group col-md-6">

                    <label for="date_last_place_seen">
                        {{ __('forms.date_last_place_seen') }}
                        <span class="octicon octicon-info" data-toggle="tooltip"
                        data-placement="top" title="{{ __('forms.upa') }}"></span>
                    </label>

                    <input type="text" name="date_last_place_seen" value="{{ $search->date_last_place_seen }}"
                    class="form-control {{ $errors->has('date_last_place_seen') ? ' is-invalid' : '' }}" />

                    <!-- Show errors input - OPEN -->
                    @if( $errors->has('date_last_place_seen') )
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('date_last_place_seen') }}</strong>
                        </div>
                    @endif
                    <!-- Show errors input - CLOSE -->

                </div>
                <!-- Incident date UPA - CLOSE  -->

                <!-- Incident zone - OPEN  -->
                <div class="form-group col-md-6">
                    {{ Form::label('zone_incident', __('forms.incident_zone')) }}
                    {{ Form::textarea('zone_incident', null, array('class' => 'form-control', 'rows' => 2)) }}
                </div>
                <!-- Incident zone - CLOSE  -->

                <!-- Incident route - OPEN  -->
                <div class="form-group col-md-6">
                    {{ Form::label('potential_route', __('forms.possible_route')) }}
                    {{ Form::textarea('potential_route', null, array('class' => 'form-control', 'rows' => 2)) }}
                </div>
                <!-- Incident route - CLOSE  -->

                <!-- Incident description - OPEN  -->
                <div class="form-group col-md-12">
                    {{ Form::label('description_incident', __('forms.description')) }}
                    {{ Form::textarea('description_incident', null, array('class' => 'form-control', 'rows' => 2)) }}
                </div>
                <!-- Incident description - CLOSE  -->

            </div>
            <!-- Incident - CLOSE -->
            <hr/>

            <!-- Lost people count title - OPEN -->
            <h3 class="margin-top accordion-title collapsed" data-toggle="collapse" href="#collapseLostPeopleCount" role="button" aria-expanded="false" aria-controls="collapseLostPeopleCount">
                {{ __('forms.lost_people') }}
            </h3>
            <!-- Lost people count title - CLOSE -->

            <!-- Lost people count - OPEN -->
            <div class="form-row collapse" id="collapseLostPeopleCount">

                <!-- Count input - OPEN  -->
                <div class="form-group col-md-4">
                    {{ Form::label('number_lost_people', __('forms.n_lost_people')) }}
                    {{ Form::number('number_lost_people', null, array('class' => 'form-control')) }}
                </div>
                <!-- Count input - CLOSE  -->

            </div>
            <!-- Lost people count - CLOSE -->
            <hr/>

            <!-- Lost people state title - OPEN -->
            <h3 class="margin-top accordion-title collapsed" data-toggle="collapse" href="#collapseLostPeopleState" role="button" aria-expanded="false" aria-controls="collapseLostPeopleState">
                {{ __('forms.status_people') }}
            </h3>
            <!-- Lost people state title - CLOSE -->

            <!-- Lost people state - OPEN -->
            <div class="form-row collapse" id="collapseLostPeopleState">

                <!-- Lost people count - OPEN  -->
                <div class="form-group col-md-12">
                    {{ Form::label('physical_condition_lost_people', __('forms.description')) }}
                    {{ Form::textarea('physical_condition_lost_people', null, array('class' => 'form-control', 'rows' => 2)) }}
                </div>
                <!-- Lost people count - CLOSE  -->

            </div>
            <!-- Lost people state - CLOSE -->
            <hr/>

            <!-- Equipment and experience title - OPEN -->
            <h3 class="margin-top accordion-title collapsed" data-toggle="collapse" href="#collapseEquipment" role="button" aria-expanded="false" aria-controls="collapseEquipment">
                {{ __('forms.equipment_and_experience') }}
            </h3>
            <!-- Equipment and experience title - CLOSE -->

            <!-- Equipment and experience - OPEN -->
            <div class="form-row collapse" id="collapseEquipment">

                <!-- Knows the zone - OPEN  -->
                <div class="form-group col-md-3">

                    <label for="knowledge_of_the_zone"> {{ __('forms.knows_the_zone') }}? </label>

                    <select id="knowledge_of_the_zone" class="form-control" name="knowledge_of_the_zone">
                        <option value="" {{ ($search->knowledge_of_the_zone === '') ? 'selected' : '' }}>
                            {{ __('forms.chose_option') }}
                        </option>
                        <option value="0" {{ ($search->knowledge_of_the_zone === 0) ? 'selected' : '' }}>
                            {{ __('actions.no') }}
                        </option>
                        <option value="1" {{ ($search->knowledge_of_the_zone === 1) ? 'selected' : '' }}>
                            {{ __('actions.yes') }}
                        </option>
                    </select>
                </div>
                <!-- Knows the zone - CLOSE  -->

                <!-- Experience with the activity - OPEN  -->
                <div class="form-group col-md-3">

                    <label for="experience_with_activity"> {{ __('forms.experience_with_activity') }}? </label>

                    <select id="experience_with_activity" class="form-control" name="experience_with_activity">
                        <option value="" {{ ($search->experience_with_activity === '') ? 'selected' : '' }}>
                            {{ __('forms.chose_option') }}
                        </option>
                        <option value="0" {{ ($search->experience_with_activity === 0) ? 'selected' : '' }}>
                            {{ __('actions.no') }}
                        </option>
                        <option value="1" {{ ($search->experience_with_activity === 1) ? 'selected' : '' }}>
                            {{ __('actions.yes') }}
                        </option>
                    </select>

                </div>
                <!-- Experience with the activity - CLOSE  -->

                <!-- Brings water - OPEN  -->
                <div class="form-group col-md-3">

                    <label for="bring_water"> {{ __('forms.bring_water') }}? </label>

                    <select id="bring_water" class="form-control" name="bring_water">
                        <option value="" {{ ($search->bring_water === '') ? 'selected' : '' }}>
                            {{ __('forms.chose_option') }}
                        </option>
                        <option value="0" {{ ($search->bring_water === 0) ? 'selected' : '' }}>
                            {{ __('actions.no') }}
                        </option>
                        <option value="1" {{ ($search->bring_water === 1) ? 'selected' : '' }}>
                            {{ __('actions.yes') }}
                        </option>
                    </select>
                </div>
                <!-- Brings water - CLOSE  -->

                <!-- Brings food - OPEN  -->
                <div class="form-group col-md-3">

                    <label for="bring_food"> {{ __('forms.bring_food') }}? </label>
                    <select id="bring_food" class="form-control" name="bring_food">
                        <option value="" {{ ($search->bring_food === '') ? 'selected' : '' }}>
                            {{ __('forms.chose_option') }}
                        </option>
                        <option value="0" {{ ($search->bring_food === 0) ? 'selected' : '' }}>
                            {{ __('actions.no') }}
                        </option>
                        <option value="1" {{ ($search->bring_food === 1) ? 'selected' : '' }}>
                            {{ __('actions.yes') }}
                        </option>
                    </select>

                </div>
                <!-- Brings food - CLOSE  -->

                <!-- Brings medication - OPEN  -->
                <div class="form-group col-md-3">

                    <label for="bring_medication"> {{ __('forms.bring_medication') }}? </label>

                    <select id="bring_medication" class="form-control" name="bring_medication">
                        <option value="" {{ ($search->bring_medication === '') ? 'selected' : '' }}>
                            {{ __('forms.chose_option') }}
                        </option>
                        <option value="0" {{ ($search->bring_medication === 0) ? 'selected' : '' }}>
                            {{ __('actions.no') }}
                        </option>
                        <option value="1" {{ ($search->bring_medication === 1) ? 'selected' : '' }}>
                            {{ __('actions.yes') }}
                        </option>
                    </select>

                </div>
                <!-- Brings medication - CLOSE  -->

                <!-- Brings light - OPEN  -->
                <div class="form-group col-md-3">

                    <label for="bring_flashlight"> {{ __('forms.bring_light') }}? </label>

                    <select id="bring_flashlight" class="form-control" name="bring_flashlight">
                        <option value="" {{ ($search->bring_flashlight === '') ? 'selected' : '' }}>
                            {{ __('forms.chose_option') }}
                        </option>
                        <option value="0" {{ ($search->bring_flashlight === 0) ? 'selected' : '' }}>
                            {{ __('actions.no') }}
                        </option>
                        <option value="1" {{ ($search->bring_flashlight === 1) ? 'selected' : '' }}>
                            {{ __('actions.yes') }}
                        </option>
                    </select>

                </div>
                <!-- Brings light - CLOSE  -->

                <!-- Brings cold clothes - OPEN  -->
                <div class="form-group col-md-3">

                    <label for="bring_cold_clothes"> {{ __('forms.bring_cold_clothes') }}? </label>

                    <select id="bring_cold_clothes" class="form-control" name="bring_cold_clothes">
                        <option value="" {{ ($search->bring_cold_clothes === '') ? 'selected' : '' }}>
                            {{ __('forms.chose_option') }}
                        </option>
                        <option value="0" {{ ($search->bring_cold_clothes === 0) ? 'selected' : '' }}>
                            {{ __('actions.no') }}
                        </option>
                        <option value="1" {{ ($search->bring_cold_clothes === 1) ? 'selected' : '' }}>
                            {{ __('actions.yes') }}
                        </option>
                    </select>

                </div>
                <!-- Brings cold clothes - CLOSE  -->

                <!-- Brings waterproof clothes - OPEN  -->
                <div class="form-group col-md-3">

                    <label for="bring_waterproof_clothes"> {{ __('forms.bring_waterproof_clothes') }}? </label>

                    <select id="bring_waterproof_clothes" class="form-control" name="bring_waterproof_clothes">
                        <option value="" {{ ($search->bring_waterproof_clothes === '') ? 'selected' : '' }}>
                            {{ __('forms.chose_option') }}
                        </option>
                        <option value="0" {{ ($search->bring_waterproof_clothes === 0) ? 'selected' : '' }}>
                            {{ __('actions.no') }}
                        </option>
                        <option value="1" {{ ($search->bring_waterproof_clothes === 1) ? 'selected' : '' }}>
                            {{ __('actions.yes') }}
                        </option>
                    </select>

                </div>
                <!-- Brings waterproof clothes - CLOSE  -->

            </div>
            <!-- Equipment and experience - CLOSE -->
            <hr/>

            <!-- Contact person title - OPEN -->
            <h3 class="margin-top accordion-title collapsed" data-toggle="collapse" href="#collapseContactPerson" role="button" aria-expanded="false" aria-controls="collapseContactPerson">
                {{ __('forms.contact_person') }}
            </h3>
            <!-- Contact person title - CLOSE -->

            <!-- Contact person - OPEN -->
            <div class="form-row collapse" id="collapseContactPerson">

                <!-- Contact person name - OPEN  -->
                <div class="form-group col-md-6">
                    {{ Form::label('name_contact_person', __('register.name')) }}
                    {{ Form::text('name_contact_person', null, array('class' => 'form-control')) }}
                </div>
                <!-- Contact person name - CLOSE  -->

                <!-- Contact person phone - OPEN  -->
                <div class="form-group col-md-2">
                    {{ Form::label('phone_number_contact_person', __('forms.phone')) }}
                    {{ Form::text('phone_number_contact_person', null, array('class' => 'form-control')) }}
                </div>
                <!-- Contact person phone - CLOSE  -->

                <!-- Contact person affinity - OPEN  -->
                <div class="form-group col-md-4">
                    {{ Form::label('affinity_contact_person', __('forms.affinity')) }}
                    {{ Form::text('affinity_contact_person', null, array('class' => 'form-control')) }}
                </div>
                <!-- Contact person affinity - CLOSE  -->

            </div>
            <!-- Contact person - CLOSE -->
            <hr/>

            <!-- State HIDDEN - OPEN -->
            {{ Form::hidden('status', $search->status, array('class' => 'form-control')) }}
            <!-- State HIDDEN - CLOSE -->

            <!-- Id user creates HIDDEN - OPEN -->
            {{ Form::hidden('user_creation_id', $search->user_creation_id, array('class' => 'form-control')) }}
            <!-- Id user creates HIDDEN - CLOSE -->

            <!-- Date modifies HIDDEN - OPEN -->
            <input type="hidden" class="form-control" name="date_last_modification" value="<?php echo date("Y-m-d H:i:s"); ?>">
            <!-- Date modifies HIDDEN - CLOSE -->

            <!-- Id user last modification HIDDEN - OPEN -->
            <input type="hidden" class="form-control" name="user_last_modification_id" value={{ Auth::user()->id }}>
            <!-- Id user last modification HIDDEN - CLOSE -->

            <!-- Submit button - OPEN -->
            <div class="text-center margin-top">
                {{ Form::submit( __('actions.save'), array('class' => 'btn btn-primary') ) }}
            </div>
            <!-- Submit button - OPEN -->

        {{ Form::close() }}
        <!-- Form - CLOSE -->

    </div>
    <!-- Content - CLOSE -->

    <!-- Form lost people - OPEn -->
    <form id="desaparegut" action="/desapareguts/create" method="put">
    @csrf
        <input type="hidden" class="form-control" name="search_id" value={{ $search->id }}>
    </form>
    <!-- Form lost people - CLOSE -->

@endsection

<!-- JQuery 3.3.1 -->
<script src="{{ asset('js/jquery-3.3.1.js') }}"></script>

<!-- JS -->
<script type="text/javascript">

  $(document).ready(function() {
    // today date
    var today = new Date();

    // begin date input
    $('input[name="date_last_place_seen"],input[name="date_start"]').daterangepicker({
      singleDatePicker: true,
      timePicker: true,
      timePicker24Hour: true,
      timePickerIncrement: 5,
      autoUpdateInput: false,
      autoApply: true,
      drops: 'down',
      currentDate: today,
      locale: {
        format: 'YYYY-MM-DD HH:mm:ss',
        firstDay: 1,
        applyLabel: "{{ __('actions.save') }}",
        cancelLabel: "{{ __('actions.cancel') }}",
        daysOfWeek: [
            "{{ __('daterangepicker.sunday') }}",
            "{{ __('daterangepicker.monday') }}",
            "{{ __('daterangepicker.tuesday') }}",
            "{{ __('daterangepicker.wednesday') }}",
            "{{ __('daterangepicker.thursday') }}",
            "{{ __('daterangepicker.friday') }}",
            "{{ __('daterangepicker.saturday') }}"
        ],
        monthNames: [
            "{{ __('daterangepicker.january') }}",
            "{{ __('daterangepicker.february') }}",
            "{{ __('daterangepicker.march') }}",
            "{{ __('daterangepicker.april') }}",
            "{{ __('daterangepicker.may') }}",
            "{{ __('daterangepicker.june') }}",
            "{{ __('daterangepicker.july') }}",
            "{{ __('daterangepicker.august') }}",
            "{{ __('daterangepicker.september') }}",
            "{{ __('daterangepicker.october') }}",
            "{{ __('daterangepicker.november') }}",
            "{{ __('daterangepicker.december') }}",
        ],
      }
    });

    $('input[name="date_start"],input[name="date_last_place_seen"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('YYYY-MM-DD HH:mm:ss'));
    });

    $('input[name="date_start"],input[name="date_last_place_seen"]').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
    });

  });

</script>
