<!-- Language for dates - OPEN -->
@php
\Date::setLocale(Session::get('locale'));
@endphp
<!-- Language for dates - CLOSE -->

<!-- Content - OPEN -->
<div class="form-row margin-top text-left">

    <!-- First commander - OPEN  -->
    <div class="form-group margin_top_bottom col-md-3">
        <p>
            {{ __('forms.first_command') }}
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $search->first_command )
                    {{ $search->first_command }}
                @else
                    --
                @endif
            </b>
        </h5>
    </div>
    <!-- First commander - CLOSE  -->

    <!-- Intermediate commander - OPEN  -->
    <div class="form-group margin_top_bottom col-md-6">
        <p>
            {{ __('forms.intermediate_commands') }}
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $search->intermediate_commands )
                    {{ $search->intermediate_commands }}
                @else
                    --
                @endif
            </b>
        </h5>
    </div>
    <!-- Intermediate commander - CLOSE  -->

    <!-- Last commander - OPEN  -->
    <div class="form-group margin_top_bottom col-md-3">
        <p>
            {{ __('forms.last_command') }}
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $search->last_command )
                    {{ $search->last_command }}
                @else
                    --
                @endif
            </b>
        </h5>
    </div>
    <!-- Last commander - CLOSE  -->

    <!-- Group - OPEN  -->
    <div class="form-group margin_top_bottom col-md-4">
        <p>
            {{ __('forms.group') }}
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $search->work_groups_used )
                    {{ $search->work_groups_used }}
                @else
                    --
                @endif
            </b>
        </h5>
    </div>
    <!-- Group - CLOSE  -->

    <!-- Derivation name - OPEN  -->
    <div class="form-group margin_top_bottom col-md-4">
        <p>
            {{ __('forms.derivation_name') }}
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $search->derivation_emergency_service )
                    {{ $search->derivation_emergency_service }}
                @else
                    --
                @endif
            </b>
        </h5>
    </div>
    <!-- Derivation name - CLOSE  -->

    <!-- Derivation ID receptor - OPEN  -->
    <div class="form-group margin_top_bottom col-md-4">
        <p>
            {{ __('forms.derivation_id_receptor') }}
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $search->emergency_service_receiver_id )
                    {{ $search->emergency_service_receiver_id }}
                @else
                    --
                @endif
            </b>
        </h5>
    </div>
    <!-- Derivation ID receptor - CLOSE  -->

    <!-- Tipology - OPEN  -->
    <div class="form-group margin_top_bottom col-md-4">
        <p>
            {{ __('forms.tipology') }}
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $search->tipology )
                    {{ $search->tipology }}
                @else
                    --
                @endif
            </b>
        </h5>
    </div>
    <!-- Tipology - CLOSE  -->

    <!-- Resources - OPEN  -->
    <div class="form-group margin_top_bottom col-md-4">
        <p>
            {{ __('forms.resources') }}
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $search->resources )
                    {{ $search->resources }}
                @else
                    --
                @endif
            </b>
        </h5>
    </div>
    <!-- Resources - CLOSE  -->

    <!-- Localization datetime - OPEN -->
    <div class="form-group margin_top_bottom col-md-4">
        <p>
            {{ __('forms.localization_date') }}
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $search->date_localization )
                    @php
                        $date = new Date($search->date_localization);
                        echo $date->format('Y M. d | H:i');
                    @endphp
                @else
                    --
                @endif
            </b>
        </h5>
    </div>
    <!-- Localization datetime - CLOSE -->

    <!-- Localization place name - OPEN  -->
    <div class="form-group margin_top_bottom col-md-4">
        <p>
            {{ __('forms.localization_toponim') }}
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $search->place_name_localization )
                    {{ $search->place_name_localization }}
                @else
                    --
                @endif
            </b>
        </h5>
    </div>
    <!-- Localization place name - CLOSE  -->

    <!-- Localization indret - OPEN  -->
    <div class="form-group margin_top_bottom col-md-4">
        <p>
            {{ __('forms.localization_location') }}
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $search->location )
                    {{ $search->location }}
                @else
                    --
                @endif
            </b>
        </h5>
    </div>
    <!-- Localization indret - CLOSE  -->

    <!-- Localization municipal term - OPEN  -->
    <div class="form-group margin_top_bottom col-md-4">
        <p>
            {{ __('forms.localization_municipal_term') }}
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $search->localization_municipal_term )
                    {{ $search->localization_municipal_term }}
                @else
                    --
                @endif
            </b>
        </h5>
    </div>
    <!-- Localization municipal term - CLOSE  -->

    <!-- Localization COE - OPEN  -->
    <div class="form-group margin_top_bottom col-md-4">
        <p>
            {{ __('forms.coe') }}
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $search->coe_cut_localization )
                    {{ $search->coe_cut_localization }}
                @else
                    --
                @endif
            </b>
        </h5>
    </div>
    <!-- Localization COE - CLOSE  -->

    <!-- Localization SOC - OPEN  -->
    <div class="form-group margin_top_bottom col-md-4">
        <p>
            {{ __('forms.soc') }}
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $search->soc_localization )
                    {{ $search->soc_localization }}
                @else
                    --
                @endif
            </b>
        </h5>
    </div>
    <!-- Localization SOC - CLOSE  -->

    <!-- Localization section - OPEN  -->
    <div class="form-group margin_top_bottom col-md-4">
        <p>
            {{ __('forms.section') }}
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $search->section_localization )
                    {{ $search->section_localization }}
                @else
                    --
                @endif
            </b>
        </h5>
    </div>
    <!-- Localization section - CLOSE  -->

    <!-- Localization UTM X - OPEN  -->
    <div class="form-group margin_top_bottom col-md-2">
        <p>
            {{ __('forms.utm_x') }}
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $search->utm_x_localization )
                    {{ $search->utm_x_localization }}
                @else
                    --
                @endif
            </b>
        </h5>
    </div>
    <!-- Localization UTM X - CLOSE  -->

    <!-- Localization UTM Y - OPEN  -->
    <div class="form-group margin_top_bottom col-md-2">
        <p>
            {{ __('forms.utm_y') }}
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $search->utm_y_localization )
                    {{ $search->utm_y_localization }}
                @else
                    --
                @endif
            </b>
        </h5>
    </div>
    <!-- Localization UTM Y - CLOSE  -->

    <!-- Localization distance from UPA - OPEN  -->
    <div class="form-group margin_top_bottom col-md-4">
        <p>
            {{ __('forms.distance_last_place_seen') }}
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $search->distance_from_last_place_seen_to_location )
                    {{ $search->distance_from_last_place_seen_to_location }}
                @else
                    --
                @endif
            </b>
        </h5>
    </div>
    <!-- Localization distance from UPA - CLOSE  -->

    <!-- Localization who does it - OPEN  -->
    <div class="form-group margin_top_bottom col-md-4">
        <p>
            {{ __('forms.who_localizate') }}
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $search->who_does_the_localization )
                    {{ $search->who_does_the_localization }}
                @else
                    --
                @endif
            </b>
        </h5>
    </div>
    <!-- Localization who does it - CLOSE  -->

    <!-- State lost people - OPEN  -->
    <div class="form-group margin_top_bottom col-md-6">
        <p>
            {{ __('forms.lost_people_state') }}
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $search->physical_condition_people_when_find )
                    {{ $search->physical_condition_people_when_find }}
                @else
                    --
                @endif
            </b>
        </h5>
    </div>
    <!-- State lost people - CLOSE  -->

    <!-- Motive closing - OPEN  -->
    <div class="form-group margin_top_bottom col-md-6">
        <p>
            {{ __('forms.motive_closing') }}
        </p>
        <h5 class="margin-top-sm-min">
            <b>
                @if( $search->reason_finalization )
                    {{ $search->reason_finalization }}
                @else
                    --
                @endif
            </b>
        </h5>
    </div>
    <!-- Motive closing - CLOSE  -->

</div>
<!-- Content - CLOSE -->
