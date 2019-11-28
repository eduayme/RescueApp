@extends('layouts.app_secondary')

@section('title', $lost_person->name)

@section('content')

    <!-- Alerts - OPEN -->
    @include('parts.alerts')
    <!-- Alerts - CLOSE -->

    <!-- Language for dates - OPEN -->
    @php
        \Date::setLocale(Session::get('locale'));
    @endphp
    <!-- Language for dates - CLOSE -->

    <!-- Content - OPEN -->
    <div class="container margin-top padding-bottom">

        <!-- Top buttons - OPEN -->
        <div class="row margin_top_bottom">

            <!-- Align left - OPEN -->
            <div class="col justify-content-start">

                <!-- Go back - OPEN -->
                <a href="{{ URL::to('searches/' . $search->id) }}"
                role="button" class="btn btn-outline-secondary margin-right btn-sm">
                    <span class="octicon octicon-arrow-left"></span>
                    {{ __('actions.go_back') }}
                </a>
                <!-- Go back - CLOSE -->

            </div>
            <!-- Align left - CLOSE -->

            @if( Auth::user()->profile != 'guest' )
                <!-- Align right - OPEN -->
                <div class="col text-right">

                    <!-- Edit search button - OPEN -->
                    <a href="{{ URL::to(Request::path().'/edit') }}"
                        role="button" class="btn btn-outline-secondary margin-left btn-sm">
                        <span class="octicon octicon-pencil"></span>
                        {{ __('actions.edit') }}
                    </a>
                    <!-- Edit search button - CLOSE -->

                    <!-- Delete search button- OPEN -->
                    <span data-toggle="modal" href="#deleteModal">
                        <button class="btn btn-outline-danger margin-left btn-sm" href="#deleteModal">
                            <span class="octicon octicon-trashcan"></span>
                            {{ __('actions.delete') }}
                        </button>
                    </span>
                    <!-- Delete search button- CLOSE -->

                    <!-- Delete search modal - OPEN -->
                    <form action="{{ route('lost-people.destroy', $lost_person->id) }}" method="post">
                        @csrf
                        @method('DELETE')

                        <!-- Modal - OPEN -->
                        <div id="deleteModal" class="modal fade">
                            <div class="modal-dialog modal-confirm">

                                <!-- Modal content - OPEN -->
                                <div class="modal-content">

                                    <!-- Modal header - OPEN -->
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                            &times;
                                        </button>
                                    </div>
                                    <!-- Modal header - CLOSE -->

                                    <!-- Modal body - OPEN -->
                                    <div class="modal-body text-center">
                                        <h4>
                                            {{ __('messages.are_you_sure') }}
                                        </h4>
                                    </div>
                                    <!-- Modal body - CLOSE -->

                                    <!-- Modal footer - OPEN -->
                                    <div class="modal-footer">
                                        <a class="btn btn-light" data-dismiss="modal">
                                            {{ __('actions.cancel') }}
                                        </a>
                                        <button type="submit" class="btn btn-danger">
                                            {{ __('actions.delete') }}
                                        </button>
                                    </div>
                                    <!-- Modal footer - CLOSE -->

                                </div>
                                <!-- Modal content - CLOSE -->

                            </div>
                        </div>
                        <!-- Modal - CLOSE -->

                    </form>
                    <!-- Delete search - CLOSE -->

                </div>
                <!-- Align right - CLOSE -->
            @endif

        </div>
        <!-- Top buttons - CLOSE -->

        <!-- Name title - OPEN -->
        <h1 class="margin-top">
            {{ $lost_person->name }}
            @if( $lost_person->found == 0 )
                <span style="font-size: 20px" class="badge badge-danger">
                    {{ __('main.lost') }}
            @elseif( $lost_person->found == 1 )
                <span style="font-size: 20px" class="badge badge-success">
                    {{ __('main.found') }}
            @endif
            </span>
        </h1>
        <!-- Name title - CLOSE -->

        <!-- Lost person info - OPEN -->
        <div class="form-row">

            <div class="form-group col-md-6">

                <!-- User photo - OPEN -->
                <div class="row justify-content-md-center image-upload justify-content-center">
                    <img src="/uploads/lost_people_photos/{{ $lost_person->photo }}" class="photo mx-auto d-block rounded">
                </div>
                <!-- User photo - CLOSE -->

            </div>

            <div class="form-group col-md-6">

                <div class="form-row margin-top">

                    <!-- Name - OPEN  -->
                    <div class="form-group col-md-12">
                        <p>
                            {{ __('register.name') }}
                        </p>
                        <h5 class="margin-top-sm-min">
                            <b> {{ $lost_person->name }} </b>
                        </h5>
                    </div>
                    <!-- Name - CLOSE  -->

                    <!-- Name respond - OPEN  -->
                    <div class="form-group col-md-6">
                        <p>
                          {{ __('forms.name_respond') }}
                        </p>
                        <h5 class="margin-top-sm-min">
                          <b>
                            @if( $lost_person->name_respond )
                                {{ $lost_person->name_respond }}
                            @else
                                --
                            @endif
                          </b>
                        </h5>
                    </div>
                    <!-- Name respond - CLOSE  -->

                    <!-- Age - OPEN  -->
                    <div class="form-group col-md-6">
                        <p>
                            {{ __('forms.age') }}
                        </p>
                        <h5 class="margin-top-sm-min">
                            <b>
                                @if( $lost_person->age )
                                    {{ $lost_person->age }}
                                @else
                                    --
                                @endif
                            </b>
                        </h5>
                    </div>
                    <!-- Age - CLOSE  -->

                    <!-- Phone - OPEN  -->
                    <div class="form-group col-md-6">
                        <p>
                            {{ __('forms.phone') }}
                        </p>
                        <h5 class="margin-top-sm-min">
                            <b>
                                @if( $lost_person->phone_number )
                                    {{ $lost_person->phone_number }}
                                @else
                                    --
                                @endif
                            </b>
                        </h5>
                    </div>
                    <!-- Phone - CLOSE  -->

                    <!-- Has whatsapp or gps - OPEN  -->
                    <div class="form-group col-md-6">
                        <p>
                            {{ __('forms.whatsapp_or_gps') }}
                        </p>
                        <h5 class="margin-top-sm-min">
                            <b>
                                @if( $lost_person->whatsapp_or_gps !== NULL )
                                    @if( $lost_person->whatsapp_or_gps == 1 )
                                        {{ __('actions.yes') }}
                                    @else
                                        {{ __('actions.no') }}
                                    @endif
                                @else
                                    --
                                @endif
                            </b>
                        </h5>
                    </div>
                    <!-- Has whatsapp or gps - CLOSE  -->

                    <!-- Profile - OPEN  -->
                    <div class="form-group col-md-12">
                        <p>
                            {{ __('register.profile') }}
                        </p>
                        <h5 class="margin-top-sm-min">
                            <b>
                                @if( $lost_person->profile )
                                    {{ __('profile_lost_person.'.$lost_person->profile) }}
                                @else
                                    --
                                @endif
                            </b>
                        </h5>
                    </div>
                    <!-- Profile - CLOSE  -->

                </div>

            </div>

        </div>

        <div class="form-row">

            <!-- Aspect description - OPEN  -->
            <div class="form-group col-md-6">
                <p>
                  {{ __('forms.aspect_description') }}
                </p>
                <h5 class="margin-top-sm-min">
                    <b>
                        @if( $lost_person->physical_appearance )
                            {{ $lost_person->physical_appearance }}
                        @else
                            --
                        @endif
                    </b>
                </h5>
            </div>
            <!--  Aspect description - CLOSE  -->

            <!-- Clothes - OPEN  -->
            <div class="form-group col-md-6">
                <p>
                    {{ __('forms.clothes') }}
                </p>
                <h5 class="margin-top-sm-min">
                    <b>
                        @if( $lost_person->clothes )
                            {{ $lost_person->clothes }}
                        @else
                            --
                        @endif
                    </b>
                </h5>
            </div>
            <!-- Clothes - CLOSE  -->

            <!-- Phisic form - OPEN  -->
            <div class="form-group col-md-6">
                <p>
                    {{ __('forms.phisic_form') }}
                </p>
                <h5 class="margin-top-sm-min">
                    <b>
                        @if( $lost_person->physical_condition )
                            {{ $lost_person->physical_condition }}
                        @else
                            --
                        @endif
                    </b>
                </h5>
            </div>
            <!-- Phisic form - CLOSE  -->

            <!-- Diseases or injuries - OPEN  -->
            <div class="form-group col-md-6">
                <p>
                    {{ __('forms.diseases_or_injuries') }}
                </p>
                <h5 class="margin-top-sm-min">
                    <b>
                        @if( $lost_person->diseases_or_injuries )
                            {{ $lost_person->diseases_or_injuries }}
                        @else
                            --
                        @endif
                    </b>
                </h5>
            </div>
            <!-- Diseases or injuries - CLOSE  -->

            <!-- Medication - OPEN  -->
            <div class="form-group col-md-6">
                <p>
                    {{ __('forms.medication') }}
                </p>
                <h5 class="margin-top-sm-min">
                    <b>
                        @if( $lost_person->medication )
                            {{ $lost_person->medication }}
                        @else
                            --
                        @endif
                    </b>
                </h5>
            </div>
            <!-- Medication - CLOSE  -->

            <!-- Limitations or discapacities - OPEN  -->
            <div class="form-group col-md-6">
                <p>
                    {{ __('forms.limitations_or_discapacities') }}
                </p>
                <h5 class="margin-top-sm-min">
                    <b>
                        @if( $lost_person->discapacities_or_limitations )
                            {{ $lost_person->discapacities_or_limitations }}
                        @else
                            --
                        @endif
                    </b>
                </h5>
            </div>
            <!-- Limitations or discapacities - CLOSE  -->

            <!-- Others - OPEN  -->
            <div class="form-group col-md-12">
                <p>
                    {{ __('forms.other') }}
                </p>
                <h5 class="margin-top-sm-min">
                    <b>
                        @if( $lost_person->other )
                            {{ $lost_person->other }}
                        @else
                            --
                        @endif
                    </b>
                </h5>
            </div>
            <!-- Others - CLOSE  -->

            <!-- Vehicle title - OPEN -->
            <div class="form-group col-md-12" style="margin-bottom: 0">
                <h4 class="margin-top-sm">
                    {{ __('forms.vehicle') }}
                </h4>
            </div>
            <!-- Vehicle title - CLOSE -->

            <!-- Vehicle model and brand - OPEN  -->
            <div class="form-group col-md-6">
                <p>
                    {{ __('forms.model_and_brand') }}
                </p>
                <h5 class="margin-top-sm-min">
                    <b>
                        @if( $lost_person->model_vehicle )
                            {{ $lost_person->model_vehicle }}
                        @else
                            --
                        @endif
                    </b>
                </h5>
            </div>
            <!-- Vehicle model and brand - CLOSE  -->

            <!-- Vehicle color - OPEN  -->
            <div class="form-group col-md-3">
                <p>
                    {{ __('forms.color') }}
                </p>
                <h5 class="margin-top-sm-min">
                    <b>
                        @if( $lost_person->color_vehicle )
                            {{ $lost_person->color_vehicle }}
                        @else
                            --
                        @endif
                    </b>
                </h5>
            </div>
            <!-- Vehicle color - CLOSE  -->

            <!-- Vehicle license plate - OPEN  -->
            <div class="form-group col-md-3">
                <p>
                    {{ __('forms.license_plate') }}
                </p>
                <h5 class="margin-top-sm-min">
                    <b>
                        @if( $lost_person->car_plate_number )
                            {{ $lost_person->car_plate_number }}
                        @else
                            --
                        @endif
                    </b>
                </h5>
            </div>
            <!-- Vehicle license plate - CLOSE  -->

        </div>
        <!-- Lost person info - CLOSE -->

    </div>
    <!-- Content - CLOSE -->

@endsection
