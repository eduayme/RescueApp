@extends('layouts.app_secondary')

@section('title', __('main.searches'))

@section('content')

    <!-- Alerts - OPEN -->

        <!-- Success - OPEN -->
        @if( session()->get('success') )
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <div class="container text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session()->get('success') }}
            </div>
        </div>
        <!-- Success - CLOSE -->

        <!-- Error - OPEN -->
        @elseif( session()->get('error') )
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <div class="container text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session()->get('error') }}
            </div>
        </div>
        @endif
        <!-- Error - CLOSE -->

    <!-- Alerts - CLOSE -->

    <!-- Language for dates - OPEN -->
    @php
        \Date::setLocale('ca');
    @endphp
    <!-- Language for dates - CLOSE -->

    <!-- Content - OPEN -->
    <div class="container margin-top">

        <!-- Top buttons - OPEN -->
        <div class="row">

            <!-- Align left - OPEN -->
            <div class="col justify-content-start">

                <!-- Go back - OPEN -->
                <a href="{{ URL::previous() }}" role="button" class="btn btn-outline-secondary margin-right
                <?php if ($search->status == 1){ ?> disabled <?php   } ?>"
                data-toggle="tooltip" data-placement="top" title="{{ __('actions.go_back') }}">
                    <span class="octicon octicon-arrow-left"></span>
                </a>
                <!-- Go back - CLOSE -->

            </div>
            <!-- Align left - CLOSE -->

        </div>
        <!-- Top buttons - CLOSE -->

        <!-- Form - OPEN -->
        <form class="margin-top" method="post" action="{{ route('lost-people.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Stype service title - OPEN -->
            <h3>
                {{ __('main.lost_person') }}
            </h3>
            <!-- Stype service title - CLOSE -->

            <div class="form-row">

                <div class="form-group col-md-6">

                    <!-- User photo - OPEN -->
                    <div class="row justify-content-md-center image-upload justify-content-center">

                        <label for="photo">
                            <div class="img-container">
                                <img src="/uploads/lost_people_photos/default.jpg" class="photo mx-auto d-block rounded" id="photo_person">
                                <div class="overlay rounded photo" style="width: 300px; height: 300px; border-radius: 0; margin-top: 15px">
                                    <span class="octicon octicon-cloud-upload" style="font-size: 2rem"> </span>
                                </div>
                            </div>
                        </label>

                        <input id="photo" onchange="readURL(this);" name="photo" type="file"
                        class="form-control" style="display: none"/>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    </div>
                    <!-- User photo - CLOSE -->
                </div>

                <div class="form-group col-md-6">

                    <!-- Type activity, code and region - OPEN -->
                    <div class="form-row">

                        <!-- Name - OPEN  -->
                        <div class="form-group col-md-12">

                            <label for="name"> {{ __('register.name') }} </label>

                            <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"/>

                            <!-- Show errors input - OPEN -->
                            @if( $errors->has('name') )
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </div>
                            @endif
                            <!-- Show errors input - CLOSE -->

                        </div>
                        <!-- Name - CLOSE  -->

                    </div>

                    <div class="form-row">

                        <!-- Name respond - OPEN  -->
                        <div class="form-group col-md-6">

                            <label for="name_respond"> {{ __('forms.name_respond') }} </label>

                            <input type="text" class="form-control {{ $errors->has('name_respond') ? ' is-invalid' : '' }}" name="name_respond"/>

                            <!-- Show errors input - OPEN -->
                            @if( $errors->has('name_respond') )
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name_respond') }}</strong>
                                </div>
                            @endif
                            <!-- Show errors input - CLOSE -->

                        </div>
                        <!-- Name respond - CLOSE  -->

                        <!-- Age - OPEN  -->
                        <div class="form-group col-md-6">

                            <label for="age"> {{ __('forms.age') }} </label>

                            <input type="number" class="form-control {{ $errors->has('age') ? ' is-invalid' : '' }}" name="age"/>

                            <!-- Show errors input - OPEN -->
                            @if( $errors->has('age') )
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('age') }}</strong>
                                </div>
                            @endif
                            <!-- Show errors input - CLOSE -->

                        </div>
                        <!-- Age - CLOSE  -->

                        <!-- Phone - OPEN  -->
                        <div class="form-group col-md-6">

                            <label for="phone_number"> {{ __('forms.phone') }} </label>

                            <input type="text" class="form-control {{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number"/>

                            <!-- Show errors input - OPEN -->
                            @if( $errors->has('phone_number') )
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone_number') }}</strong>
                                </div>
                            @endif
                            <!-- Show errors input - CLOSE -->

                        </div>
                        <!-- Phone - CLOSE  -->

                        <!-- Has whatsapp or gps - OPEN  -->
                        <div class="form-group col-md-6">

                            <label for="whatsapp_or_gps"> {{ __('forms.whatsapp_or_gps') }} </label>

                            <select id="whatsapp_or_gps" class="form-control" name="whatsapp_or_gps">
                                <option value=""> {{ __('forms.chose_option') }} </option>
                                <option value="0"> {{ __('actions.no') }} </option>
                                <option value="1"> {{ __('actions.yes') }} </option>
                            </select>

                        </div>
                        <!-- Has whatsapp or gps - CLOSE  -->

                        <!-- Profile - OPEN  -->
                        <div class="form-group col-md-12">

                            <label for="profile"> {{ __('register.profile') }} </label>

                            <select id="profile" class="form-control" name="profile">
                                <option value=""> {{ __('forms.chose_option') }} </option>
                                <option value="Trastorn del desenvolupament"> Trastorn del desenvolupament </option>
                                <option value="Alzheimer o altres demencies"> Alzheimer o altres demencies </option>
                                <option value="Malaltia mental o psicològica"> Malaltia mental o psicològica </option>
                                <option value="Conductes autolítiques"> Conductes autolítiques </option>
                                <option value="Excursionista o senderista"> Excursionista o senderista </option>
                                <option value="Recol·lector en general"> Recol·lector en general </option>
                                <option value="Boletaire"> Boletaire </option>
                                <option value="Cap de les anteriors"> Cap de les anteriors </option>
                            </select>

                        </div>
                        <!-- Profile - CLOSE  -->

                    </div>

                </div>

            </div>

            <div class="form-row">

                <!-- Aspect description - OPEN  -->
                <div class="form-group col-md-6">

                    <label for="physical_appearance"> {{ __('forms.aspect_description') }} </label>

                    <textarea type="text" class="form-control" name="physical_appearance" rows="2"></textarea>

                    <!-- Show errors input - OPEN -->
                    @if( $errors->has('physical_appearance') )
                        <div class="invalid-feedback" role="alert">
                            <strong> {{ $errors->first('physical_appearance') }} </strong>
                        </div>
                    @endif
                    <!-- Show errors input - CLOSE -->

                </div>
                <!--  Aspect description - CLOSE  -->

                <!-- Clothes - OPEN  -->
                <div class="form-group col-md-6">

                    <label for="roba"> {{ __('forms.clothes') }} </label>

                    <textarea type="text" class="form-control" name="roba" rows="2"></textarea>

                    <!-- Show errors input - OPEN -->
                    @if( $errors->has('clothes') )
                        <div class="invalid-feedback" role="alert">
                            <strong> {{ $errors->first('clothes') }} </strong>
                        </div>
                    @endif
                    <!-- Show errors input - CLOSE -->

                </div>
                <!-- Clothes - CLOSE  -->

                <!-- Phisic form - OPEN  -->
                <div class="form-group col-md-6">

                    <label for="physical_condition"> {{ __('forms.phisic_form') }} </label>

                    <textarea type="text" class="form-control" name="physical_condition" rows="2"></textarea>

                    <!-- Show errors input - OPEN -->
                    @if( $errors->has('physical_condition') )
                        <div class="invalid-feedback" role="alert">
                            <strong> {{ $errors->first('physical_condition') }} </strong>
                        </div>
                    @endif
                    <!-- Show errors input - CLOSE -->

                </div>
                <!-- Phisic form - CLOSE  -->

                <!-- Diseases or injuries - OPEN  -->
                <div class="form-group col-md-6">

                    <label for="diseases_or_injuries"> {{ __('forms.diseases_or_injuries') }} </label>

                    <textarea type="text" class="form-control" name="diseases_or_injuries" rows="2"></textarea>

                    <!-- Show errors input - OPEN -->
                    @if( $errors->has('diseases_or_injuries') )
                        <div class="invalid-feedback" role="alert">
                            <strong> {{ $errors->first('diseases_or_injuries') }} </strong>
                        </div>
                    @endif
                    <!-- Show errors input - CLOSE -->

                </div>
                <!-- Diseases or injuries - CLOSE  -->

                <!-- Medication - OPEN  -->
                <div class="form-group col-md-6">

                    <label for="medication"> {{ __('forms.medication') }} </label>

                    <textarea type="text" class="form-control" name="medication" rows="2"></textarea>

                    <!-- Show errors input - OPEN -->
                    @if( $errors->has('medication') )
                        <div class="invalid-feedback" role="alert">
                            <strong> {{ $errors->first('medication') }} </strong>
                        </div>
                    @endif
                    <!-- Show errors input - CLOSE -->

                </div>
                <!-- Medication - CLOSE  -->

                <!-- Limitations or discapacities - OPEN  -->
                <div class="form-group col-md-6">

                    <label for="discapacities_or_limitations"> {{ __('forms.limitations_or_discapacities') }} </label>

                    <textarea type="text" class="form-control" name="discapacities_or_limitations" rows="2"></textarea>

                    <!-- Show errors input - OPEN -->
                    @if( $errors->has('discapacities_or_limitations') )
                        <div class="invalid-feedback" role="alert">
                            <strong> {{ $errors->first('discapacities_or_limitations') }} </strong>
                        </div>
                    @endif
                    <!-- Show errors input - CLOSE -->

                </div>
                <!-- Limitations or discapacities - CLOSE  -->

                <!-- Others - OPEN  -->
                <div class="form-group col-md-12">

                    <label for="altres"> {{ __('forms.other') }} </label>

                    <textarea type="text" class="form-control" name="altres" rows="2"></textarea>

                    <!-- Show errors input - OPEN -->
                    @if( $errors->has('other') )
                        <div class="invalid-feedback" role="alert">
                            <strong> {{ $errors->first('other') }} </strong>
                        </div>
                    @endif
                    <!-- Show errors input - CLOSE -->

                </div>
                <!-- Others - CLOSE  -->

                <!-- Vehicle title - OPEN -->
                <div class="form-group col-md-12">
                    <h5 class="margin-top-sm">
                        {{ __('forms.vehicle') }}
                    </h5>
                </div>
                <!-- Vehicle title - CLOSE -->

                <!-- Vehicle model and brand - OPEN  -->
                <div class="form-group col-md-6">

                    <label for="model_vehicle"> {{ __('forms.model_and_brand') }} </label>

                    <input type="text" class="form-control {{ $errors->has('model_vehicle') ? ' is-invalid' : '' }}" name="model_vehicle"/>

                    <!-- Show errors input - OPEN -->
                    @if( $errors->has('model_vehicle') )
                        <div class="invalid-feedback" role="alert">
                            <strong> {{ $errors->first('model_vehicle') }} </strong>
                        </div>
                    @endif
                    <!-- Show errors input - CLOSE -->

                </div>
                <!-- Vehicle model and brand - CLOSE  -->

                <!-- Vehicle color - OPEN  -->
                <div class="form-group col-md-3">

                    <label for="color_vehicle"> {{ __('forms.color') }} </label>

                    <input type="text" class="form-control {{ $errors->has('color_vehicle') ? ' is-invalid' : '' }}" name="color_vehicle"/>

                    <!-- Show errors input - OPEN -->
                    @if( $errors->has('color_vehicle') )
                        <div class="invalid-feedback" role="alert">
                            <strong> {{ $errors->first('color_vehicle') }} </strong>
                        </div>
                    @endif
                    <!-- Show errors input - CLOSE -->

                </div>
                <!-- Vehicle color - CLOSE  -->

                <!-- Vehicle license plate - OPEN  -->
                <div class="form-group col-md-3">

                    <label for="car_plate_number"> {{ __('forms.license_plate') }} </label>

                    <input type="text" class="form-control {{ $errors->has('car_plate_number') ? ' is-invalid' : '' }}" name="car_plate_number"/>

                    <!-- Show errors input - OPEN -->
                    @if( $errors->has('car_plate_number') )
                        <div class="invalid-feedback" role="alert">
                            <strong> {{ $errors->first('car_plate_number') }} </strong>
                        </div>
                    @endif
                    <!-- Show errors input - CLOSE -->

                </div>
                <!-- Vehicle license plate - CLOSE  -->

            </div>
            <!-- Type activity, code and region - OPEN -->

            <!-- Finded HIDDEN - OPEN -->
            <input type="hidden" class="form-control" name="found" value="0">
            <!-- Finded HIDDEN - CLOSE -->

            <!-- State HIDDEN - OPEN -->
            <input type="hidden" class="form-control" name="id_search" value="{{ $search->id }}">
            <!-- State HIDDEN - CLOSE -->

            <!-- Submit button - OPEN -->
            <div class="text-center margin-top">
                <button type="submit" class="btn btn-primary">
                    {{ __('actions.add') . ' ' . __('main.lost_person') }}
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

<!-- JS scripts -->
<script>

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#photo_person')
                .attr('src', e.target.result)
                .width(300)
                .height(300);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

</script>
