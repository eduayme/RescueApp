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
            <a href="{{ URL::previous() }}"
                role="button" class="btn btn-outline-secondary margin-right
                <?php if ($recerca->estat == 'Tancada'){ ?> disabled <?php   } ?>"
                data-toggle="tooltip" data-placement="top" title="{{ __('actions.go_back') }}"
                >
                <span class="octicon octicon-arrow-left"></span>
            </a>
            <!-- Go back - CLOSE -->

        </div>
        <!-- Align left - CLOSE -->

    </div>
    <!-- Top buttons - CLOSE -->

    <!-- Form - OPEN -->
    <form class="margin-top" method="post" action="{{ route('desapareguts.store') }}">

        <!-- Stype service title - OPEN -->
        <h3>
            {{ __('main.lost_person') }}
        </h3>
        <!-- Stype service title - CLOSE -->

        <!-- Type activity, code and region - OPEN -->
        <div class="form-row">
            @csrf

            <!-- Name - OPEN  -->
            <div class="form-group col-md-6">
                <label for="nom"> {{ __('register.name') }} </label>
                <input type="text" class="form-control {{ $errors->has('nom') ? ' is-invalid' : '' }}" name="nom"/>

                <!-- Show errors input - OPEN -->
                @if( $errors->has('nom') )
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('nom') }}</strong>
                </div>
                @endif
                <!-- Show errors input - CLOSE -->
            </div>
            <!-- Name - CLOSE  -->

            <!-- Name respond - OPEN  -->
            <div class="form-group col-md-3">
                <label for="nom_respon"> {{ __('forms.name_respond') }} </label>
                <input type="text" class="form-control {{ $errors->has('nom_respon') ? ' is-invalid' : '' }}" name="nom_respon"/>

                <!-- Show errors input - OPEN -->
                @if( $errors->has('nom_respon') )
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('nom_respon') }}</strong>
                </div>
                @endif
                <!-- Show errors input - CLOSE -->
            </div>
            <!-- Name respond - CLOSE  -->

            <!-- Age - OPEN  -->
            <div class="form-group col-md-3">
                <label for="edat"> {{ __('forms.age') }} </label>
                <input type="number" class="form-control {{ $errors->has('edat') ? ' is-invalid' : '' }}" name="edat"/>

                <!-- Show errors input - OPEN -->
                @if( $errors->has('edat') )
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('edat') }}</strong>
                </div>
                @endif
                <!-- Show errors input - CLOSE -->
            </div>
            <!-- Age - CLOSE  -->

            <!-- Phone - OPEN  -->
            <div class="form-group col-md-3">
                <label for="telefon"> {{ __('forms.phone') }} </label>
                <input type="text" class="form-control {{ $errors->has('telefon') ? ' is-invalid' : '' }}" name="telefon"/>

                <!-- Show errors input - OPEN -->
                @if( $errors->has('telefon') )
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('telefon') }}</strong>
                </div>
                @endif
                <!-- Show errors input - CLOSE -->
            </div>
            <!-- Phone - CLOSE  -->

            <!-- Has whatsapp or gps - OPEN  -->
            <div class="form-group col-md-3">
              <label for="whatsapp_o_gps"> {{ __('forms.whatsapp_or_gps') }} </label>
              <select id="whatsapp_o_gps" class="form-control" name="whatsapp_o_gps">
                  <option value=""> {{ __('forms.chose_option') }} </option>
                  <option value="0"> No </option>
                  <option value="1"> Si </option>
              </select>
            </div>
            <!-- Has whatsapp or gps - CLOSE  -->

            <!-- Profile - OPEN  -->
            <div class="form-group col-md-6">
                <label for="perfil"> {{ __('register.profile') }} </label>
                <select id="perfil" class="form-control" name="perfil">
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
            <!-- Search region - CLOSE  -->

            <!-- Aspect description - OPEN  -->
            <div class="form-group col-md-6">
                <label for="descripcio_fisica"> {{ __('forms.aspect_description') }} </label>
                <textarea type="text" class="form-control" name="descripcio_fisica" rows="2"></textarea>

                <!-- Show errors input - OPEN -->
                @if( $errors->has('descripcio_fisica') )
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('descripcio_fisica') }}</strong>
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
                @if( $errors->has('roba') )
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('roba') }}</strong>
                </div>
                @endif
                <!-- Show errors input - CLOSE -->
            </div>
            <!-- Clothes - CLOSE  -->

            <!-- Phisic form - OPEN  -->
            <div class="form-group col-md-6">
                <label for="forma_fisica"> {{ __('forms.phisic_form') }} </label>
                <textarea type="text" class="form-control" name="forma_fisica" rows="2"></textarea>

                <!-- Show errors input - OPEN -->
                @if( $errors->has('forma_fisica') )
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('forma_fisica') }}</strong>
                </div>
                @endif
                <!-- Show errors input - CLOSE -->
            </div>
            <!-- Phisic form - CLOSE  -->

            <!-- Diseases or injuries - OPEN  -->
            <div class="form-group col-md-6">
                <label for="malalties_o_lesions"> {{ __('forms.diseases_or_injuries') }} </label>
                <textarea type="text" class="form-control" name="malalties_o_lesions" rows="2"></textarea>

                <!-- Show errors input - OPEN -->
                @if( $errors->has('malalties_o_lesions') )
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('malalties_o_lesions') }}</strong>
                </div>
                @endif
                <!-- Show errors input - CLOSE -->
            </div>
            <!-- Diseases or injuries - CLOSE  -->

            <!-- Medication - OPEN  -->
            <div class="form-group col-md-6">
                <label for="medicacio"> {{ __('forms.medication') }} </label>
                <textarea type="text" class="form-control" name="medicacio" rows="2"></textarea>

                <!-- Show errors input - OPEN -->
                @if( $errors->has('medicacio') )
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('medicacio') }}</strong>
                </div>
                @endif
                <!-- Show errors input - CLOSE -->
            </div>
            <!-- Medication - CLOSE  -->

            <!-- Limitations or discapacities - OPEN  -->
            <div class="form-group col-md-6">
                <label for="limitacio_o_discapacitat"> {{ __('forms.limitations_or_discapacities') }} </label>
                <textarea type="text" class="form-control" name="limitacio_o_discapacitat" rows="2"></textarea>

                <!-- Show errors input - OPEN -->
                @if( $errors->has('limitacio_o_discapacitat') )
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('limitacio_o_discapacitat') }}</strong>
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
                @if( $errors->has('altres') )
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('altres') }}</strong>
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
                <label for="marca_model_vehicle"> {{ __('forms.model_and_brand') }} </label>
                <input type="text" class="form-control {{ $errors->has('marca_model_vehicle') ? ' is-invalid' : '' }}" name="marca_model_vehicle"/>

                <!-- Show errors input - OPEN -->
                @if( $errors->has('marca_model_vehicle') )
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('marca_model_vehicle') }}</strong>
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
                    <strong>{{ $errors->first('color_vehicle') }}</strong>
                </div>
                @endif
                <!-- Show errors input - CLOSE -->
            </div>
            <!-- Vehicle color - CLOSE  -->

            <!-- Vehicle license plate - OPEN  -->
            <div class="form-group col-md-3">
                <label for="matricula_vehicle"> {{ __('forms.license_plate') }} </label>
                <input type="text" class="form-control {{ $errors->has('matricula_vehicle') ? ' is-invalid' : '' }}" name="matricula_vehicle"/>

                <!-- Show errors input - OPEN -->
                @if( $errors->has('matricula_vehicle') )
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('matricula_vehicle') }}</strong>
                </div>
                @endif
                <!-- Show errors input - CLOSE -->
            </div>
            <!-- Vehicle license plate - CLOSE  -->

        </div>
        <!-- Type activity, code and region - OPEN -->

        <!-- Finded HIDDEN - OPEN -->
        <input type="hidden" class="form-control" name="trobat" value="0">
        <!-- Finded HIDDEN - CLOSE -->

        <!-- State HIDDEN - OPEN -->
        <input type="hidden" class="form-control" name="id_recerca" value="{{ $recerca->id }}">
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
