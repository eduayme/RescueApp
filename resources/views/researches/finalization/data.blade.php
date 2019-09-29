<!-- Language for dates - OPEN -->
@php
\Date::setLocale('ca');
@endphp
<!-- Language for dates - CLOSE -->

<!-- Content - OPEN -->
<div class="form-row margin-top text-center">

    <!-- First commander - OPEN  -->
    <div class="form-group col-md-3">
        <p>
            {{ __('forms.first_command') }}
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $research->first_command )
                    {{ $research->first_command }}
                @else
                    --
                @endif
            </b>
        </h5>
    </div>
    <!-- First commander - CLOSE  -->

    <!-- Intermediate commander - OPEN  -->
    <div class="form-group col-md-6">
        <p>
            {{ __('forms.intermediate_commands') }}
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $research->intermediate_commands )
                    {{ $research->intermediate_commands }}
                @else
                    --
                @endif
            </b>
        </h5>
    </div>
    <!-- Intermediate commander - CLOSE  -->

    <!-- Last commander - OPEN  -->
    <div class="form-group col-md-3">
        <p>
            {{ __('forms.last_command') }}
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $research->last_command )
                    {{ $research->last_command }}
                @else
                    --
                @endif
            </b>
        </h5>
    </div>
    <!-- Last commander - CLOSE  -->

    <!-- Group - OPEN  -->
    <div class="form-group col-md-4">
        <p>
            {{ __('forms.group') }}
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $research->work_groups_used )
                    {{ $research->work_groups_used }}
                @else
                    --
                @endif
            </b>
        </h5>
    </div>
    <!-- Group - CLOSE  -->

    <!-- Derivation name - OPEN  -->
    <div class="form-group col-md-4">
        <p>
            {{ __('forms.derivation_name') }}
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $research->derivation_emergency_service )
                    {{ $research->derivation_emergency_service }}
                @else
                    --
                @endif
            </b>
        </h5>
    </div>
    <!-- Derivation name - CLOSE  -->

    <!-- Derivation ID receptor - OPEN  -->
    <div class="form-group col-md-4">
        <p>
            {{ __('forms.derivation_id_receptor') }}
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $research->emergency_service_receiver_id )
                    {{ $research->emergency_service_receiver_id }}
                @else
                    --
                @endif
            </b>
        </h5>
    </div>
    <!-- Derivation ID receptor - CLOSE  -->

    <!-- Tipology - OPEN  -->
    <div class="form-group col-md-4">
        <p>
            {{ __('forms.tipology') }}
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $research->tipology )
                    {{ $research->tipology }}
                @else
                    --
                @endif
            </b>
        </h5>
    </div>
    <!-- Tipology - CLOSE  -->

    <!-- Resources - OPEN  -->
    <div class="form-group col-md-4">
        <p>
            {{ __('forms.resources') }}
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $research->resources )
                    {{ $research->resources }}
                @else
                    --
                @endif
            </b>
        </h5>
    </div>
    <!-- Resources - CLOSE  -->

    <!-- Localization datetime - OPEN -->
    <div class="form-group col-md-4">
        <p>
            {{ __('forms.localization_date') }}
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $research->date_localization )
                    @php
                        $date = new Date($research->date_localization);
                        echo $date->format('H:i | d F Y');
                    @endphp
                @else
                    --
                @endif
            </b>
        </h5>
    </div>
    <!-- Localization datetime - CLOSE -->

    <!-- Localization place name - OPEN  -->
    <div class="form-group col-md-4">
        <p>
            {{ __('forms.localization_toponim') }}
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $research->place_name_localization )
                    {{ $research->place_name_localization }}
                @else
                    --
                @endif
            </b>
        </h5>
    </div>
    <!-- Localization place name - CLOSE  -->

    <!-- Localization indret - OPEN  -->
    <div class="form-group col-md-4">
        <p>
            {{ __('forms.localization_location') }}
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $research->location )
                    {{ $research->location }}
                @else
                    --
                @endif
            </b>
        </h5>
    </div>
    <!-- Localization indret - CLOSE  -->

    <!-- Localization municipal term - OPEN  -->
    <div class="form-group col-md-4">
        <p>
            {{ __('forms.localization_municipal_term') }}
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $research->localization_municipal_term )
                    {{ $research->localization_municipal_term }}
                @else
                    --
                @endif
            </b>
        </h5>
    </div>
    <!-- Localization municipal term - CLOSE  -->

    <!-- Localization COE - OPEN  -->
    <div class="form-group col-md-4">
        <p>
            {{ __('forms.coe') }}
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $research->coe_cut_localization )
                    {{ $research->coe_cut_localization }}
                @else
                    --
                @endif
            </b>
        </h5>
    </div>
    <!-- Localization COE - CLOSE  -->

    <!-- Localization SOC - OPEN  -->
    <div class="form-group col-md-4">
        <p>
            {{ __('forms.soc') }}
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $research->soc_localization )
                    {{ $research->soc_localization }}
                @else
                    --
                @endif
            </b>
        </h5>
    </div>
    <!-- Localization SOC - CLOSE  -->

    <!-- Localization section - OPEN  -->
    <div class="form-group col-md-4">
        <p>
            {{ __('forms.section') }}
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $research->section_localization )
                    {{ $research->section_localization }}
                @else
                    --
                @endif
            </b>
        </h5>
    </div>
    <!-- Localization section - CLOSE  -->

    <!-- Localization UTM X - OPEN  -->
    <div class="form-group col-md-2">
        <p>
            {{ __('forms.utm_x') }}
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $research->utm_x_localization )
                    {{ $research->utm_x_localization }}
                @else
                    --
                @endif
            </b>
        </h5>
    </div>
    <!-- Localization UTM X - CLOSE  -->

    <!-- Localization UTM Y - OPEN  -->
    <div class="form-group col-md-2">
        <p>
            {{ __('forms.utm_y') }}
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $research->utm_y_localization )
                    {{ $research->utm_y_localization }}
                @else
                    --
                @endif
            </b>
        </h5>
    </div>
    <!-- Localization UTM Y - CLOSE  -->

    <!-- Localization distance from UPA - OPEN  -->
    <div class="form-group col-md-4">
        <p>
            {{ __('forms.distance_last_place_seen') }}
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $research->distance_from_last_place_seen_to_location )
                    {{ $research->distance_from_last_place_seen_to_location }}
                @else
                    --
                @endif
            </b>
        </h5>
    </div>
    <!-- Localization distance from UPA - CLOSE  -->

    <!-- Localization who does it - OPEN  -->
    <div class="form-group col-md-4">
        <p>
            {{ __('forms.who_localizate') }}
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $research->who_does_the_localization )
                    {{ $research->who_does_the_localization }}
                @else
                    --
                @endif
            </b>
        </h5>
    </div>
    <!-- Localization who does it - CLOSE  -->

    <!-- State lost people - OPEN  -->
    <div class="form-group col-md-6">
        <p>
            {{ __('forms.lost_people_state') }}
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $research->physical_condition_people_when_find )
                    {{ $research->physical_condition_people_when_find }}
                @else
                    --
                @endif
            </b>
        </h5>
    </div>
    <!-- State lost people - CLOSE  -->

    <!-- Motive closing - OPEN  -->
    <div class="form-group col-md-6">
        <p>
            {{ __('forms.motive_closing') }}
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $research->reason_finalization )
                    {{ $research->reason_finalization }}
                @else
                    --
                @endif
            </b>
        </h5>
    </div>
    <!-- Motive closing - CLOSE  -->

</div>
<!-- Content - CLOSE -->
