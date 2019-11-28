@extends('layouts.app_secondary')

@section('title', __('main.searches'))

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

        <!-- Go back button - OPEN -->
        @include('buttons.go_back')
        <!-- Go back button - CLOSE -->

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
                                <div class="overlay photo mx-auto d-block rounded overlay-photo">
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

                            <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"/>

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

                            <input type="text" class="form-control {{ $errors->has('name_respond') ? ' is-invalid' : '' }}" name="name_respond" value="{{ old('name_respond') }}"/>

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

                            <input type="number" class="form-control {{ $errors->has('age') ? ' is-invalid' : '' }}" name="age"  value="{{ old('age') }}"/>

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

                            <input type="text" class="form-control {{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ old('phone_number') }}"/>

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
                                <option value="">
                                    {{ __('forms.chose_option') }}
                                </option>
                                <option value="0" @if (old('whatsapp_or_gps') == "0") {{ 'selected' }} @endif>
                                    {{ __('actions.no') }}
                                </option>
                                <option value="1" @if (old('whatsapp_or_gps') == "1") {{ 'selected' }} @endif>
                                    {{ __('actions.yes') }}
                                </option>
                            </select>

                        </div>
                        <!-- Has whatsapp or gps - CLOSE  -->

                        <!-- Profile - OPEN  -->
                        <div class="form-group col-md-12">

                            <label for="profile"> {{ __('register.profile') }} </label>

                            <select id="profile" class="form-control" name="profile">
                                <option value="">
                                    {{ __('forms.chose_option') }}
                                </option>
                                <option value="development_disorder">
                                    {{ __('profile_lost_person.development_disorder') }}
                                </option>
                                <option value="alzheimer_or_other_dementias">
                                    {{ __('profile_lost_person.alzheimer_or_other_dementias') }}
                                </option>
                                <option value="mental_or_psychological_illness">
                                    {{ __('profile_lost_person.mental_or_psychological_illness') }}
                                </option>
                                <option value="autolithic_behaviors">
                                    {{ __('profile_lost_person.autolithic_behaviors') }}
                                </option>
                                <option value="hiker">
                                    {{ __('profile_lost_person.hiker') }}
                                </option>
                                <option value="collector">
                                    {{ __('profile_lost_person.collector') }}
                                </option>
                                <option value="mushroom_finder">
                                    {{ __('profile_lost_person.mushroom_finder') }}
                                </option>
                                <option value="none_of_the_above">
                                    {{ __('profile_lost_person.none_of_the_above') }}
                                </option>
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

                    <textarea type="text" class="form-control" name="physical_appearance" rows="2">
                        {{ old('physical_appearance') }}
                    </textarea>

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

                    <label for="clothes"> {{ __('forms.clothes') }} </label>

                    <textarea type="text" class="form-control" name="clothes" rows="2">
                        {{ old('clothes') }}
                    </textarea>

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

                    <textarea type="text" class="form-control" name="physical_condition" rows="2">
                        {{ old('physical_condition') }}
                    </textarea>

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

                    <textarea type="text" class="form-control" name="diseases_or_injuries" rows="2">
                        {{ old('diseases_or_injuries') }}
                    </textarea>

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

                    <textarea type="text" class="form-control" name="medication" rows="2">
                        {{ old('medication') }}
                    </textarea>

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

                    <textarea type="text" class="form-control" name="discapacities_or_limitations" rows="2">
                        {{ old('discapacities_or_limitations') }}
                    </textarea>

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

                    <label for="other"> {{ __('forms.other') }} </label>

                    <textarea type="text" class="form-control" name="other" rows="2">
                        {{ old('other') }}
                    </textarea>

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

                    <input type="text" class="form-control {{ $errors->has('model_vehicle') ? ' is-invalid' : '' }}" name="model_vehicle" value="{{ old('model_vehicle') }}"/>

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

                    <input type="text" class="form-control {{ $errors->has('color_vehicle') ? ' is-invalid' : '' }}" name="color_vehicle" value="{{ old('color_vehicle') }}"/>

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

                    <input type="text" class="form-control {{ $errors->has('car_plate_number') ? ' is-invalid' : '' }}" name="car_plate_number" value="{{ old('car_plate_number') }}"/>

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
