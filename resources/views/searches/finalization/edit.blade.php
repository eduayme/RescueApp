<!-- Form - OPEN -->
{{ Form::model($search, array('route' => array('searches.update', $search->id), 'method' => 'PUT')) }}

    <!-- Form content - OPEN -->
    <div class="form-row margin-top">

        <!-- Group - OPEN  -->
        <div class="form-group col-md-4">

            {{ Form::label('work_groups_used', __('forms.group')) }}

            <input type="text" name="work_groups_used" value="{{ $search->work_groups_used }}"
            class="form-control {{ $errors->has('work_groups_used') ? ' is-invalid' : '' }}" />

            <!-- Show errors input - OPEN -->
            @if( $errors->has('work_groups_used') )
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('work_groups_used') }}</strong>
                </div>
            @endif
            <!-- Show errors input - CLOSE -->

        </div>
        <!-- Group - CLOSE  -->

        <!-- Derivation name - OPEN  -->
        <div class="form-group col-md-4">

            {{ Form::label('derivation_emergency_service', __('forms.derivation_name')) }}

            <input type="text" name="derivation_emergency_service" value="{{ $search->derivation_emergency_service }}"
            class="form-control {{ $errors->has('derivation_emergency_service') ? ' is-invalid' : '' }}" />

            <!-- Show errors input - OPEN -->
            @if( $errors->has('derivation_emergency_service') )
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('derivation_emergency_service') }}</strong>
                </div>
            @endif
            <!-- Show errors input - CLOSE -->

        </div>
        <!-- Derivation name - CLOSE  -->

        <!-- Derivation ID receptor - OPEN  -->
        <div class="form-group col-md-4">

            {{ Form::label('emergency_service_receiver_id', __('forms.derivation_id_receptor')) }}

            <input type="text" name="emergency_service_receiver_id" value="{{ $search->emergency_service_receiver_id }}"
            class="form-control {{ $errors->has('emergency_service_receiver_id') ? ' is-invalid' : '' }}" />

            <!-- Show errors input - OPEN -->
            @if( $errors->has('emergency_service_receiver_id') )
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('emergency_service_receiver_id') }}</strong>
                </div>
            @endif
            <!-- Show errors input - CLOSE -->

        </div>
        <!-- Derivation ID receptor - CLOSE  -->

        <!-- First commander - OPEN  -->
        <div class="form-group col-md-3">

            {{ Form::label('first_command', __('forms.first_command')) }}

            <textarea rows="2" name="first_command" class="form-control
            {{ $errors->has('first_command') ? ' is-invalid' : '' }}"
            > {{ $search->first_command }} </textarea>

            <!-- Show errors input - OPEN -->
            @if( $errors->has('first_command') )
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('first_command') }}</strong>
                </div>
            @endif
            <!-- Show errors input - CLOSE -->

        </div>
        <!-- First commander - CLOSE  -->

        <!-- Intermediate commander - OPEN  -->
        <div class="form-group col-md-6">

            {{ Form::label('intermediate_commands', __('forms.intermediate_commands')) }}

            <textarea rows="2" name="intermediate_commands" class="form-control
            {{ $errors->has('intermediate_commands') ? ' is-invalid' : '' }}"
            > {{ $search->intermediate_commands }} </textarea>

            <!-- Show errors input - OPEN -->
            @if( $errors->has('intermediate_commands') )
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('intermediate_commands') }}</strong>
                </div>
            @endif
            <!-- Show errors input - CLOSE -->

        </div>
        <!-- Intermediate commander - CLOSE  -->

        <!-- Last commander - OPEN  -->
        <div class="form-group col-md-3">

            {{ Form::label('last_command', __('forms.last_command')) }}

            <textarea rows="2" name="last_command" class="form-control
            {{ $errors->has('last_command') ? ' is-invalid' : '' }}"
            > {{ $search->last_command }} </textarea>

            <!-- Show errors input - OPEN -->
            @if( $errors->has('last_command') )
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('last_command') }}</strong>
                </div>
            @endif
            <!-- Show errors input - CLOSE -->

        </div>
        <!-- Last commander - CLOSE  -->

        <!-- Tipology - OPEN  -->
        <div class="form-group col-md-4">

            {{ Form::label('tipology', __('forms.tipology')) }}

            <input type="text" name="tipology" value="{{ $search->tipology }}"
            class="form-control {{ $errors->has('tipology') ? ' is-invalid' : '' }}" />

            <!-- Show errors input - OPEN -->
            @if( $errors->has('tipology') )
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('tipology') }}</strong>
                </div>
            @endif
            <!-- Show errors input - CLOSE -->

        </div>
        <!-- Tipology - CLOSE  -->

        <!-- Resources - OPEN  -->
        <div class="form-group col-md-4">

            {{ Form::label('resources', __('forms.resources')) }}

            <input type="text" name="resources" value="{{ $search->resources }}"
            class="form-control {{ $errors->has('resources') ? ' is-invalid' : '' }}" />

            <!-- Show errors input - OPEN -->
            @if( $errors->has('resources') )
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('resources') }}</strong>
                </div>
            @endif
            <!-- Show errors input - CLOSE -->

        </div>
        <!-- Resources - CLOSE  -->

        <!-- Localization datetime - OPEN -->
        <div class="form-group col-md-4">

            {{ Form::label('date_localization', __('forms.localization_date')) }}

            <input type="text" name="date_localization" value="{{ $search->date_localization }}"
            class="form-control {{ $errors->has('date_localization') ? ' is-invalid' : '' }}" />

            <!-- Show errors input - OPEN -->
            @if( $errors->has('date_localization') )
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('date_localization') }}</strong>
                </div>
            @endif
            <!-- Show errors input - CLOSE -->

        </div>
        <!-- Localization datetime - CLOSE -->

        <!-- Localization toponim - OPEN  -->
        <div class="form-group col-md-4">

            {{ Form::label('place_name_localization', __('forms.localization_toponim')) }}

            <input type="text" name="place_name_localization" value="{{ $search->place_name_localization }}"
            class="form-control {{ $errors->has('place_name_localization') ? ' is-invalid' : '' }}" />

            <!-- Show errors input - OPEN -->
            @if( $errors->has('place_name_localization') )
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('place_name_localization') }}</strong>
                </div>
            @endif
            <!-- Show errors input - CLOSE -->

        </div>
        <!-- Localization toponim - CLOSE  -->

        <!-- Localization indret - OPEN  -->
        <div class="form-group col-md-4">

            {{ Form::label('location_localization', __('forms.localization_location')) }}

            <input type="text" name="location_localization" value="{{ $search->location_localization }}"
            class="form-control {{ $errors->has('location_localization') ? ' is-invalid' : '' }}" />

            <!-- Show errors input - OPEN -->
            @if( $errors->has('location_localization') )
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('location_localization') }}</strong>
                </div>
            @endif
            <!-- Show errors input - CLOSE -->

        </div>
        <!-- Localization indret - CLOSE  -->

        <!-- Localization municipal term - OPEN  -->
        <div class="form-group col-md-4">

            {{ Form::label('municipality_term_localization', __('forms.localization_municipal_term')) }}

            <input type="text" name="municipality_term_localization" value="{{ $search->municipality_term_localization }}"
            class="form-control {{ $errors->has('municipality_term_localization') ? ' is-invalid' : '' }}" />

            <!-- Show errors input - OPEN -->
            @if( $errors->has('municipality_term_localization') )
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('municipality_term_localization') }}</strong>
                </div>
            @endif
            <!-- Show errors input - CLOSE -->

        </div>
        <!-- Localization municipal term - CLOSE  -->

        <!-- Localization COE - OPEN  -->
        <div class="form-group col-md-4">

            {{ Form::label('coe_cut_localization', __('forms.coe')) }}

            <input type="text" name="coe_cut_localization" value="{{ $search->coe_cut_localization }}"
            class="form-control {{ $errors->has('coe_cut_localization') ? ' is-invalid' : '' }}" />

            <!-- Show errors input - OPEN -->
            @if( $errors->has('coe_cut_localization') )
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('coe_cut_localization') }}</strong>
                </div>
            @endif
            <!-- Show errors input - CLOSE -->

        </div>
        <!-- Localization COE - CLOSE  -->

        <!-- Localization SOC - OPEN  -->
        <div class="form-group col-md-4">

            {{ Form::label('soc_localization', __('forms.soc')) }}

            <input type="text" name="soc_localization" value="{{ $search->soc_localization }}"
            class="form-control {{ $errors->has('soc_localization') ? ' is-invalid' : '' }}" />

            <!-- Show errors input - OPEN -->
            @if( $errors->has('soc_localization') )
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('soc_localization') }}</strong>
                </div>
            @endif
            <!-- Show errors input - CLOSE -->

        </div>
        <!-- Localization SOC - CLOSE  -->

        <!-- Localization section - OPEN  -->
        <div class="form-group col-md-4">

            {{ Form::label('section_localization', __('forms.section')) }}

            <input type="text" name="section_localization" value="{{ $search->section_localization }}"
            class="form-control {{ $errors->has('section_localization') ? ' is-invalid' : '' }}" />

            <!-- Show errors input - OPEN -->
            @if( $errors->has('section_localization') )
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('section_localization') }}</strong>
                </div>
            @endif
            <!-- Show errors input - CLOSE -->

        </div>
        <!-- Localization section - CLOSE  -->

        <!-- Localization UTM X - OPEN  -->
        <div class="form-group col-md-2">

            {{ Form::label('utm_x_localization', __('forms.utm_x')) }}

            <input type="number" name="utm_x_localization" value="{{ $search->utm_x_localization }}"
            class="form-control {{ $errors->has('utm_x_localization') ? ' is-invalid' : '' }}" />

            <!-- Show errors input - OPEN -->
            @if( $errors->has('utm_x_localization') )
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('utm_x_localization') }}</strong>
                </div>
            @endif
            <!-- Show errors input - CLOSE -->

        </div>
        <!-- Localization UTM X - CLOSE  -->

        <!-- Localization UTM Y - OPEN  -->
        <div class="form-group col-md-2">

            {{ Form::label('utm_y_localization', __('forms.utm_y')) }}

            <input type="number" name="utm_y_localization" value="{{ $search->utm_y_localization }}"
            class="form-control {{ $errors->has('utm_y_localization') ? ' is-invalid' : '' }}" />

            <!-- Show errors input - OPEN -->
            @if( $errors->has('utm_y_localization') )
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('utm_y_localization') }}</strong>
                </div>
            @endif
            <!-- Show errors input - CLOSE -->

        </div>
        <!-- Localization UTM Y - CLOSE  -->

        <!-- Localization distance from UPA - OPEN  -->
        <div class="form-group col-md-4">

            {{ Form::label('distance_from_last_place_seen_to_location', __('forms.distance_last_place_seen')) }}

            <input type="number" name="distance_from_last_place_seen_to_location" value="{{ $search->distance_from_last_place_seen_to_location }}"
            class="form-control {{ $errors->has('distance_from_last_place_seen_to_location') ? ' is-invalid' : '' }}" />

            <!-- Show errors input - OPEN -->
            @if( $errors->has('distance_from_last_place_seen_to_location') )
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('distance_from_last_place_seen_to_location') }}</strong>
                </div>
            @endif
            <!-- Show errors input - CLOSE -->
        </div>
        <!-- Localization distance from UPA - CLOSE  -->

        <!-- Localization who does it - OPEN  -->
        <div class="form-group col-md-4">

            {{ Form::label('who_does_the_localization', __('forms.who_localizate')) }}

            <input type="text" name="who_does_the_localization" value="{{ $search->who_does_the_localization }}"
            class="form-control {{ $errors->has('who_does_the_localization') ? ' is-invalid' : '' }}" />

            <!-- Show errors input - OPEN -->
            @if( $errors->has('who_does_the_localization') )
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('who_does_the_localization') }}</strong>
                </div>
            @endif
            <!-- Show errors input - CLOSE -->

        </div>
        <!-- Localization who does it - CLOSE  -->

        <!-- State lost people - OPEN  -->
        <div class="form-group col-md-6">

            {{ Form::label('physical_condition_people_when_find', __('forms.lost_people_state')) }}

            <textarea rows="2" name="physical_condition_people_when_find" class="form-control
            {{ $errors->has('physical_condition_people_when_find') ? ' is-invalid' : '' }}"
            > {{ $search->physical_condition_people_when_find }} </textarea>

            <!-- Show errors input - OPEN -->
            @if( $errors->has('physical_condition_people_when_find') )
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('physical_condition_people_when_find') }}</strong>
                </div>
            @endif
            <!-- Show errors input - CLOSE -->

        </div>
        <!-- State lost people - CLOSE  -->

        <!-- Motive closing - OPEN  -->
        <div class="form-group col-md-6">

            {{ Form::label('reason_finalization', __('forms.motive_closing')) }}

            <textarea rows="2" name="reason_finalization" class="form-control
            {{ $errors->has('reason_finalization') ? ' is-invalid' : '' }}"
            > {{ $search->reason_finalization }} </textarea>

            <!-- Show errors input - OPEN -->
            @if( $errors->has('reason_finalization') )
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('reason_finalization') }}</strong>
                </div>
            @endif
            <!-- Show errors input - CLOSE -->

        </div>
        <!-- Motive closing - CLOSE  -->

    </div>
    <!-- Form content - CLOSE -->

    <!-- ID HIDDEN - OPEN -->
    {{ Form::hidden('id_search', $search->id_search, array('class' => 'form-control')) }}
    <!-- ID HIDDEN - CLOSE -->

    <!-- Is a practice HIDDEN - OPEN -->
    {{ Form::hidden('is_a_practice', $search->is_a_practice, array('class' => 'form-control')) }}
    <!-- Is a practice - CLOSE -->

    <!-- State HIDDEN - OPEN -->
    {{ Form::hidden('status', $search->status, array('class' => 'form-control')) }}
    <!-- State HIDDEN - CLOSE -->

    <!-- Region HIDDEN - OPEN -->
    {{ Form::hidden('regio', $search->regio, array('class' => 'form-control')) }}
    <!-- Region HIDDEN - CLOSE -->

    <!-- Creation date HIDDEN - OPEN -->
    {{ Form::hidden('date_start', $search->date_start, array('class' => 'form-control')) }}
    <!-- Creation date - CLOSE -->

    <!-- Creation user - OPEN -->
    {{ Form::hidden('id_user_creation', $search->id_user_creation, array('class' => 'form-control')) }}
    <!-- Creation user - CLOSE -->

    <!-- Date modifies HIDDEN - OPEN -->
    <input type="hidden" class="form-control" name="date_last_modification" value="<?php echo date("Y-m-d H:i:s"); ?>">
    <!-- Date modifies HIDDEN - CLOSE -->

    <!-- Id user last modification HIDDEN - OPEN -->
    <input type="hidden" class="form-control" name="id_user_last_modification" value={{ Auth::user()->id }}>
    <!-- Id user last modification HIDDEN - CLOSE -->

    <!-- Buttons - OPEN -->
    <div class="text-center margin-top-sm">

        <!-- Save data - OPEN -->
        {{ Form::submit( __('actions.save'),
        array('class' => 'btn btn-dark margin-right margin-left margin-top-sm', 'name' => 'savebutton') ) }}
        <!-- Save close - OPEN -->

        <!-- Submit data - OPEN -->
        @if( $search->is_a_practice == 0 )
        {{ Form::submit( __('actions.close_search'),
        array('class' => 'btn btn-primary margin-right margin-left margin-top-sm', 'name' => 'closebutton') ) }}
        @else
        {{ Form::submit( __('actions.close_practice'),
        array('class' => 'btn btn-primary margin-right margin-left margin-top-sm', 'name' => 'closebutton') ) }}
        @endif
        <!-- Submit data - OPEN -->

    </div>
    <!-- Buttons button - OPEN -->

{{ Form::close() }}
<!-- Form - CLOSE -->


<!-- JQuery 3.3.1 -->
<script src="{{ asset('js/jquery-3.3.1.js') }}"></script>

<!-- JS -->
<script type="text/javascript">

$(document).ready(function() {
    // today date
    var today = new Date();

    // begin date input
    $('input[name="date_localization"]').daterangepicker({
        singleDatePicker: true,
        timePicker: true,
        timePicker24Hour: true,
        timePickerIncrement: 5,
        autoUpdateInput: false,
        drops: 'down',
        currentDate: today,
        locale: {
            format: 'YYYY-MM-DD HH:mm:ss',
            firstDay: 1,
            applyLabel: "Acceptar",
            cancelLabel: "Cancelar",
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

    $('input[name="date_localization"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('YYYY-MM-DD HH:mm:ss'));
    });

    $('input[name="date_localization"]').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });

});

</script>
