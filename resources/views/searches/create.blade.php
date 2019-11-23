@extends('layouts.app')

@section('title', __('actions.add') . ' ' . __('main.search'))

@section('content')

    <!-- Alerts - OPEN -->
    @include('parts.alerts')
    <!-- Alerts - CLOSE -->

    <!-- Content - OPEN -->
    <div class="container margin-top padding-bottom">

        <!-- Form - OPEN -->
        <form method="post" action="{{ route('searches.store') }}">

            <!-- Stype service title - OPEN -->
            <h3 style="margin-bottom: -20px">
                {{ __('forms.type_service') }}
            </h3>
            <!-- Stype service title - CLOSE -->

            <!-- Type activity, code and region - OPEN -->
            <div class="form-row">
                @csrf

                <!-- Search type activity - OPEN -->
                <div class="form-group funkyradio col-md-2">

                    <!-- Search option - OPEN -->
                    <div class="funkyradio-primary">
                        <input type="radio" name="is_a_practice" id="is_search" value="0" checked/>
                        <label for="is_search"> {{ __('main.search') }} </label>
                    </div>
                    <!-- Search option - CLOSE -->

                </div>
                <!-- Search type activity - CLOSE -->

                <!-- Practice type activity - OPEN -->
                <div class="form-group funkyradio col-md-2">

                    <!-- Practice option - OPEN -->
                    <div class="funkyradio-primary">
                        <input type="radio" name="is_a_practice" id="is_practice" value="1" />
                        <label for="is_practice"> {{ __('main.practice') }} </label>
                    </div>
                    <!-- Practice option - CLOSE -->

                </div>
                <!-- Practice type activity - CLOSE -->

                <!-- Empty space - OPEN -->
                <div class="form-group col-md-1"> </div>
                <!-- Empty space - CLOSE -->

                <!-- Begin datetime - OPEN -->
                <div class="form-group col-md-3">
                    <label for="date_start"> {{ __('forms.begin_date') }} </label>
                    <input type="text" class="form-control" name="date_start" value=""/>
                </div>
                <!-- Begin datetime - CLOSE -->

                <!-- Search ID - OPEN  -->
                <div class="form-group col-md-2">

                    <label for="id_search"> {{ __('forms.id_search') }} </label>

                    <input type="text" class="form-control {{ $errors->has('id_search') ? ' is-invalid' : '' }}" name="id_search"/>

                    <!-- Show errors input - OPEN -->
                    @if( $errors->has('id_search') )
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('id_search') }}</strong>
                    </div>
                    @endif
                    <!-- Show errors input - CLOSE -->

                </div>

                <!-- Search ID - CLOSE  -->

                <!-- Search region - OPEN  -->
                <div class="form-group col-md-2">

                    <label for="region"> {{ __('forms.region') }} </label>

                    <select id="region" class="form-control" name="region">
                        <option value=""> {{ __('forms.chose_option') }} </option>
                        <option value="01 - Centre"> 01 - Centre </option>
                        <option value="02 - Girona"> 02 - Girona </option>
                        <option value="03 - Lleida"> 03 - Lleida </option>
                        <option value="04 - Metropolitana Nord"> 04 - Metropolitana Nord </option>
                        <option value="05 - Metropolitana Sud"> 05 - Metropolitana Sud </option>
                        <option value="06 - Tarragona"> 06 - Tarragona </option>
                        <option value="07 - Terres Ebre"> 07 - Terres Ebre </option>
                    </select>

                </div>
                <!-- Search region - CLOSE  -->

            </div>
            <!-- Type activity, code and region - OPEN -->

            <!-- Alertant title - OPEN -->
            <h3 class="margin-top">
                {{ __('forms.alertant') }}
            </h3>
            <!-- Stype service title - CLOSE -->

            <!-- Alertant - OPEN -->
            <div class="form-row">

                <!-- Is the lost person - OPEN  -->
                <div class="form-group col-md-3">

                    <label for="is_lost_person"> {{ __('forms.is_the_lost_person') }} </label>

                    <select id="is_lost_person" class="form-control" name="is_lost_person">
                        <option value=""> {{ __('forms.chose_option') }} </option>
                        <option value="0"> {{ __('actions.no') }} </option>
                        <option value="1"> {{ __('actions.yes') }} </option>
                    </select>

                </div>
                <!-- Is the lost person - CLOSE  -->

                <!-- Is the contact person - OPEN  -->
                <div class="form-group col-md-3">
                    <label for="is_contact_person"> {{ __('forms.is_the_contact_person') }} </label>
                    <select id="is_contact_person" class="form-control" name="is_contact_person">
                        <option value=""> {{ __('forms.chose_option') }} </option>
                        <option value="0"> No </option>
                        <option value="1"> Si </option>
                    </select>
                </div>
                <!-- Is the contact person - CLOSE  -->

                <!-- Alertant name - OPEN  -->
                <div class="form-group col-md-6">
                    <label for="name_person_alerts"> {{ __('register.name') }} </label>
                    <input type="text" class="form-control" name="name_person_alerts"/>
                </div>
                <!-- Alertant name - CLOSE  -->

                <!-- Alertant age - OPEN  -->
                <div class="form-group col-md-2">
                    <label for="age_person_alerts"> {{ __('forms.age') }} </label>
                    <input type="number" class="form-control" name="age_person_alerts"/>
                </div>
                <!-- Alertant age - CLOSE  -->

                <!-- Alertant phone - OPEN  -->
                <div class="form-group col-md-4">
                    <label for="phone_number_person_alerts"> {{ __('forms.phone') }} </label>
                    <input type="text" class="form-control" name="phone_number_person_alerts"/>
                </div>
                <!-- Alertant phone - CLOSE  -->

                <!-- Alertant address - OPEN  -->
                <div class="form-group col-md-6">
                    <label for="address_person_alerts"> {{ __('forms.address') }} </label>
                    <input type="text" class="form-control" name="address_person_alerts"/>
                </div>
                <!-- Alertant address - CLOSE  -->

            </div>
            <!-- Alertant - CLOSE -->

            <!-- Incident title - OPEN -->
            <h3 class="margin-top">
                {{ __('forms.incident') }}
            </h3>
            <!-- Incident title - CLOSE -->

            <!-- Incident - OPEN -->
            <div class="form-row">

                <!-- Incident village UPA - OPEN  -->
                <div class="form-group col-md-6">

                    <label for="municipality_last_place_seen">
                        {{ __('forms.village_last_place_seen') }}
                        <span class="octicon octicon-info" data-toggle="tooltip"
                        data-placement="top" title="{{ __('forms.upa') }}"></span>
                    </label>

                    <input type="text" class="form-control" name="municipality_last_place_seen"/>

            </div>
            <!-- Incident village UPA - CLOSE  -->

            <!-- Incident village UPA - OPEN  -->
            <div class="form-group col-md-6">
                <label for="date_last_place_seen">
                    {{ __('forms.date_last_place_seen') }}
                    <span class="octicon octicon-info" data-toggle="tooltip"
                    data-placement="top" title="{{ __('forms.upa') }}">
                </span>
            </label>
            <input type="text" class="form-control" name="date_last_place_seen" value="" />
        </div>
        <!-- Incident village UPA - CLOSE  -->

        <!-- Incident zone - OPEN  -->
        <div class="form-group col-md-6">
            <label for="zone_incident"> {{ __('forms.incident_zone') }} </label>
            <textarea type="text" class="form-control" name="zone_incident" rows="2"></textarea>
        </div>
        <!-- Incident zone - CLOSE  -->

        <!-- Incident route - OPEN  -->
        <div class="form-group col-md-6">
            <label for="potential_route"> {{ __('forms.possible_route') }} </label>
            <textarea type="text" class="form-control" name="potential_route" rows="2"></textarea>
        </div>
        <!-- Incident route - CLOSE  -->

        <!-- Incident description - OPEN  -->
        <div class="form-group col-md-12">
            <label for="description_incident"> {{ __('forms.description') }} </label>
            <textarea type="text" class="form-control" name="description_incident" rows="2"></textarea>
        </div>
        <!-- Incident description - CLOSE  -->

    </div>
    <!-- Incident - CLOSE -->

    <!-- Lost people title - OPEN -->
    <h3 class="margin-top">
        {{ __('forms.lost_people') }}
    </h3>
    <!-- Lost people title - CLOSE -->

    <!-- Lost people - OPEN -->
    <div class="form-row">

        <!-- Lost people count - OPEN  -->
        <div class="form-group col-md-4">
            <label for="number_lost_people"> {{ __('forms.n_lost_people') }} </label>
            <input type="number" class="form-control" name="number_lost_people"/>
        </div>
        <!-- Lost people count - CLOSE  -->

    </div>
    <!-- Lost people - CLOSE -->

    <!-- Lost people title - OPEN -->
    <h3 class="margin-top">
        {{ __('forms.status_people') }}
    </h3>
    <!-- Lost people title - CLOSE -->

    <!-- Lost people - OPEN -->
    <div class="form-row">

        <!-- Lost people count - OPEN  -->
        <div class="form-group col-md-12">
            <label for="physical_condition_lost_people"> {{ __('forms.description') }} </label>
            <textarea type="number" class="form-control" name="physical_condition_lost_people" rows="2"></textarea>
        </div>
        <!-- Lost people count - CLOSE  -->

    </div>
    <!-- Lost people - CLOSE -->

    <!-- Equipment and experience title - OPEN -->
    <h3 class="margin-top">
        {{ __('forms.equipment_and_experience') }}
    </h3>
    <!-- Equipment and experience title - CLOSE -->

    <!-- Equipment and experience - OPEN -->
    <div class="form-row">

        <!-- Knows the zone - OPEN  -->
        <div class="form-group col-md-3">
            <label for="knowledge_of_the_zone"> {{ __('forms.knows_the_zone') }}? </label>
            <select id="knowledge_of_the_zone" class="form-control" name="knowledge_of_the_zone">
                <option value=""> {{ __('forms.chose_option') }} </option>
                <option value="0"> {{ __('actions.no') }} </option>
                <option value="1"> {{ __('actions.yes') }} </option>
            </select>
        </div>
        <!-- Is the lost person - CLOSE  -->

        <!-- Experience with the activity - OPEN  -->
        <div class="form-group col-md-3">
            <label for="experience_with_activity"> {{ __('forms.experience_with_activity') }}? </label>
            <select id="experience_with_activity" class="form-control" name="experience_with_activity">
                <option value=""> {{ __('forms.chose_option') }} </option>
                <option value="0"> {{ __('actions.no') }} </option>
                <option value="1"> {{ __('actions.yes') }} </option>
            </select>
        </div>
        <!-- Experience with the activity - CLOSE  -->

        <!-- Brings water - OPEN  -->
        <div class="form-group col-md-3">
            <label for="bring_water"> {{ __('forms.bring_water') }}? </label>
            <select id="bring_water" class="form-control" name="bring_water">
                <option value=""> {{ __('forms.chose_option') }} </option>
                <option value="0"> {{ __('actions.no') }} </option>
                <option value="1"> {{ __('actions.yes') }} </option>
            </select>
        </div>
        <!-- Brings water - CLOSE  -->

        <!-- Brings food - OPEN  -->
        <div class="form-group col-md-3">
            <label for="bring_food"> {{ __('forms.bring_food') }}? </label>
            <select id="bring_food" class="form-control" name="bring_food">
                <option value=""> {{ __('forms.chose_option') }} </option>
                <option value="0"> {{ __('actions.no') }} </option>
                <option value="1"> {{ __('actions.yes') }} </option>
            </select>
        </div>
        <!-- Brings food - CLOSE  -->

        <!-- Brings medication - OPEN  -->
        <div class="form-group col-md-3">
            <label for="bring_medication"> {{ __('forms.bring_medication') }}? </label>
            <select id="bring_medication" class="form-control" name="bring_medication">
                <option value=""> {{ __('forms.chose_option') }} </option>
                <option value="0"> {{ __('actions.no') }} </option>
                <option value="1"> {{ __('actions.yes') }} </option>
            </select>
        </div>
        <!-- Brings medication - CLOSE  -->

        <!-- Brings light - OPEN  -->
        <div class="form-group col-md-3">
            <label for="bring_flashlight"> {{ __('forms.bring_light') }}? </label>
            <select id="bring_flashlight" class="form-control" name="bring_flashlight">
                <option value=""> {{ __('forms.chose_option') }} </option>
                <option value="0"> {{ __('actions.no') }} </option>
                <option value="1"> {{ __('actions.yes') }} </option>
            </select>
        </div>
        <!-- Brings light - CLOSE  -->

        <!-- Brings cold clothes - OPEN  -->
        <div class="form-group col-md-3">
            <label for="bring_cold_clothes"> {{ __('forms.bring_cold_clothes') }}? </label>
            <select id="bring_cold_clothes" class="form-control" name="bring_cold_clothes">
                <option value=""> {{ __('forms.chose_option') }} </option>
                <option value="0"> {{ __('actions.no') }} </option>
                <option value="1"> {{ __('actions.yes') }} </option>
            </select>
        </div>
        <!-- Brings cold clothes - CLOSE  -->

        <!-- Brings waterproof clothes - OPEN  -->
        <div class="form-group col-md-3">
            <label for="bring_waterproof_clothes"> {{ __('forms.bring_waterproof_clothes') }}? </label>
            <select id="bring_waterproof_clothes" class="form-control" name="bring_waterproof_clothes">
                <option value=""> {{ __('forms.chose_option') }} </option>
                <option value="0"> {{ __('actions.no') }} </option>
                <option value="1"> {{ __('actions.yes') }} </option>
            </select>
        </div>
        <!-- Brings waterproof clothes - CLOSE  -->

    </div>
    <!-- Equipment and experience - CLOSE -->

    <!-- Contact person title - OPEN -->
    <h3 class="margin-top">
        {{ __('forms.contact_person') }}
    </h3>
    <!-- Contact person title - CLOSE -->

    <!-- Contact person - OPEN -->
    <div class="form-row">

        <!-- Contact person name - OPEN  -->
        <div class="form-group col-md-6">
            <label for="name_contact_person"> {{ __('register.name') }} </label>
            <input type="text" class="form-control" name="name_contact_person"/>
        </div>
        <!-- Contact person name - CLOSE  -->

        <!-- Contact person phone - OPEN  -->
        <div class="form-group col-md-2">
            <label for="phone_number_contact_person"> {{ __('forms.phone') }} </label>
            <input type="text" class="form-control" name="phone_number_contact_person"/>
        </div>
        <!-- Contact person phone - CLOSE  -->

        <!-- Contact person affinity - OPEN  -->
        <div class="form-group col-md-4">
            <label for="affinity_contact_person"> {{ __('forms.affinity') }} </label>
            <input type="text" class="form-control" name="affinity_contact_person"/>
        </div>
        <!-- Contact person affinity - CLOSE  -->

    </div>
    <!-- Contact person - CLOSE -->

    <!-- State HIDDEN - OPEN -->
    <input type="hidden" class="form-control" name="status" value="0">
    <!-- State HIDDEN - CLOSE -->

    <!-- Date creates HIDDEN - OPEN -->
    <input type="hidden" class="form-control" name="date_creation" value="<?php echo date("Y-m-d H:i:s"); ?>">
    <!-- Date creates HIDDEN - CLOSE -->

    <!-- Date modifies HIDDEN - OPEN -->
    <input type="hidden" class="form-control" name="date_last_modification" value="<?php echo date("Y-m-d H:i:s"); ?>">
    <!-- Date modifies HIDDEN - CLOSE -->

    <!-- Id user creates HIDDEN - OPEN -->
    <input type="hidden" class="form-control" name="id_user_creation" value={{ Auth::user()->id }}>
    <!-- Id user creates HIDDEN - CLOSE -->

    <!-- Id user last modification HIDDEN - OPEN -->
    <input type="hidden" class="form-control" name="id_user_last_modification" value={{ Auth::user()->id }}>
    <!-- Id user last modification HIDDEN - CLOSE -->

    <!-- Submit button - OPEN -->
    <div class="text-center margin-top">
        <button type="submit" class="btn btn-primary">
            {{ __('actions.add') . ' ' . __('main.search') }}
        </button>
    </div>
    <!-- Submit button - OPEN -->

    </form>
    <!-- Form - CLOSE -->

    </div>
    <!-- Content - CLOSE -->

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
        startDate: moment().startOf('hour'),
        autoUpdateInput: true,
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
    $('input[name="date_last_place_seen"').val( '' );
    $('input[name="date_start"').val( '' );

    $('input[name="date_last_place_seen"],input[name="date_start"]').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });

});

</script>
