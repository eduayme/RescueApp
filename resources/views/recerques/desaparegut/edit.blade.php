@extends('layouts.app')

@section('title', __('actions.edit') . ' ' . $desaparegut->nom)

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

    <!-- Content - OPEN -->
    <div class="container margin-top">

    <!-- Form - OPEN -->
    {{ Form::model($desaparegut, array('action' => array('DesaparegutsController@update', $desaparegut, 'files'=> true), 'files'=> true)) }}

        <!-- Stype service title - OPEN -->
        <div class="form-row">
            <div class="form-group col-md-auto">
                <h3>
                    {{ $desaparegut->nom }}
                </h3>
            </div>
            <div class="form-group col-md-auto">
                <select id="trobat" class="form-control" name="trobat">
                    <option value="0" {{ ($desaparegut->trobat === 0) ? 'selected' : '' }}>
                        Desaparegut
                    </option>
                    <option value="1" {{ ($desaparegut->trobat === 1) ? 'selected' : '' }}>
                        Trobat
                    </option>
                </select>
            </div>
        </div>
        <!-- Stype service title - CLOSE -->

        <div class="form-row">

            <div class="form-group col-md-6">

                <!-- User photo - OPEN -->
                <div class="row justify-content-md-center image-upload justify-content-center">
                    <label for="photo">
                        <div class="img-container">
                        <img src="/uploads/lost_people_photos/{{ $desaparegut->photo }}" class="photo mx-auto d-block rounded" id="photo_person">
                        <div class="overlay rounded" style="width: 300px; height: 300px; border-radius: 0; margin-top: 15px">
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

                <div class="form-row">

                    <!-- Name - OPEN  -->
                    <div class="form-group col-md-12">
                        <label for="nom"> {{ __('register.name') }} </label>
                        <input type="text" class="form-control {{ $errors->has('nom') ? ' is-invalid' : '' }}"
                        name="nom" value="{{ $desaparegut->nom }}"/>

                        <!-- Show errors input - OPEN -->
                        @if( $errors->has('nom') )
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('nom') }}</strong>
                        </div>
                        @endif
                        <!-- Show errors input - CLOSE -->
                    </div>
                    <!-- Name - CLOSE  -->

                </div>

                <div class="form-row">

                <!-- Name respond - OPEN  -->
                <div class="form-group col-md-6">
                    <label for="nom_respon"> {{ __('forms.name_respond') }} </label>
                    <input type="text" class="form-control {{ $errors->has('nom_respon') ? ' is-invalid' : '' }}"
                    name="nom_respon" value="{{ $desaparegut->nom_respon }}"/>

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
                <div class="form-group col-md-6">
                    <label for="edat"> {{ __('forms.age') }} </label>
                    <input type="number" class="form-control {{ $errors->has('edat') ? ' is-invalid' : '' }}"
                    name="edat" value="{{ $desaparegut->edat }}" />

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
        <div class="form-group col-md-6">
            <label for="telefon"> {{ __('forms.phone') }} </label>
            <input type="text" class="form-control {{ $errors->has('telefon') ? ' is-invalid' : '' }}"
            name="telefon" value="{{ $desaparegut->telefon }}" />

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
        <div class="form-group col-md-6">
          <label for="whatsapp_o_gps"> {{ __('forms.whatsapp_or_gps') }} </label>
          <select id="whatsapp_o_gps" class="form-control" name="whatsapp_o_gps">
              <option value="" {{ ($desaparegut->whatsapp_o_gps === '') ? 'selected' : '' }}>
                  {{ __('forms.chose_option') }}
              </option>
              <option value="0" {{ ($desaparegut->whatsapp_o_gps === 0) ? 'selected' : '' }}>
                  No
              </option>
              <option value="1" {{ ($desaparegut->whatsapp_o_gps === 1) ? 'selected' : '' }}>
                  Si
              </option>
          </select>
        </div>
        <!-- Has whatsapp or gps - CLOSE  -->

<!-- Profile - OPEN  -->
<div class="form-group col-md-12">

    <label for="perfil"> {{ __('register.profile') }} </label>

    <select id="perfil" class="form-control" name="perfil">
        <option value="" {{ ($desaparegut->perfil === '') ? 'selected' : '' }}>
            {{ __('forms.chose_option') }}
        </option>
        <option value="Trastorn del desenvolupament"
        {{ ($desaparegut->perfil === 'Trastorn del desenvolupament') ? 'selected' : '' }}>
            Trastorn del desenvolupament
        </option>
        <option value="Alzheimer o altres demencies"
        {{ ($desaparegut->perfil === 'Alzheimer o altres demencies') ? 'selected' : '' }}>
            Alzheimer o altres demencies
        </option>
        <option value="Malaltia mental o psicològica"
        {{ ($desaparegut->perfil === 'Malaltia mental o psicològica') ? 'selected' : '' }}>
            Malaltia mental o psicològica
        </option>
        <option value="Conductes autolítiques"
        {{ ($desaparegut->perfil === 'Conductes autolítiques') ? 'selected' : '' }}>
            Conductes autolítiques
        </option>
        <option value="Excursionista o senderista"
        {{ ($desaparegut->perfil === 'Excursionista o senderista') ? 'selected' : '' }}>
            Excursionista o senderista
        </option>
        <option value="Recol·lector en general"
        {{ ($desaparegut->perfil === 'Recol·lector en general') ? 'selected' : '' }}>
            Recol·lector en general
        </option>
        <option value="Boletaire"
        {{ ($desaparegut->perfil === 'Boletaire') ? 'selected' : '' }}>
            Boletaire
        </option>
        <option value="Cap de les anteriors"
        {{ ($desaparegut->perfil === 'Cap de les anteriors') ? 'selected' : '' }}>
            Cap de les anteriors
        </option>
    </select>

</div>
<!-- Search region - CLOSE  -->

</div>

</div>

</div>

<div class="form-row">

<!-- Aspect description - OPEN  -->
<div class="form-group col-md-6">
    <label for="descripcio_fisica"> {{ __('forms.aspect_description') }} </label>
    {{ Form::textarea('descripcio_fisica', null, array('class' => 'form-control', 'rows' => 2)) }}
</div>
<!--  Aspect description - CLOSE  -->

<!-- Clothes - OPEN  -->
<div class="form-group col-md-6">
    <label for="roba"> {{ __('forms.clothes') }} </label>
    {{ Form::textarea('roba', null, array('class' => 'form-control', 'rows' => 2)) }}
</div>
<!-- Clothes - CLOSE  -->

<!-- Phisic form - OPEN  -->
<div class="form-group col-md-6">
    <label for="forma_fisica"> {{ __('forms.phisic_form') }} </label>
    {{ Form::textarea('forma_fisica', null, array('class' => 'form-control', 'rows' => 2)) }}
</div>
<!-- Phisic form - CLOSE  -->

<!-- Diseases or injuries - OPEN  -->
<div class="form-group col-md-6">
    <label for="malalties_o_lesions"> {{ __('forms.diseases_or_injuries') }} </label>
    {{ Form::textarea('malalties_o_lesions', null, array('class' => 'form-control', 'rows' => 2)) }}
</div>
<!-- Diseases or injuries - CLOSE  -->

<!-- Medication - OPEN  -->
<div class="form-group col-md-6">
    <label for="medicacio"> {{ __('forms.medication') }} </label>
    {{ Form::textarea('medicacio', null, array('class' => 'form-control', 'rows' => 2)) }}
</div>
<!-- Medication - CLOSE  -->

<!-- Limitations or discapacities - OPEN  -->
<div class="form-group col-md-6">
    <label for="limitacio_o_discapacitat"> {{ __('forms.limitations_or_discapacities') }} </label>
    {{ Form::textarea('limitacio_o_discapacitat', null, array('class' => 'form-control', 'rows' => 2)) }}
</div>
<!-- Limitations or discapacities - CLOSE  -->

<!-- Others - OPEN  -->
<div class="form-group col-md-12">
    <label for="altres"> {{ __('forms.other') }} </label>
    {{ Form::textarea('altres', null, array('class' => 'form-control', 'rows' => 2)) }}
</div>
<!-- Others - CLOSE  -->

<!-- Vehicle title - OPEN -->
<div class="form-group col-md-12">
    <h4 class="margin-top-sm" style="margin-bottom: 0">
        {{ __('forms.vehicle') }}
    </h4>
</div>
<!-- Vehicle title - CLOSE -->

<!-- Vehicle model and brand - OPEN  -->
<div class="form-group col-md-6">
    <label for="marca_model_vehicle"> {{ __('forms.model_and_brand') }} </label>
    <input type="text" class="form-control {{ $errors->has('marca_model_vehicle') ? ' is-invalid' : '' }}"
    name="marca_model_vehicle" value="{{ $desaparegut->marca_model_vehicle }}" />

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
    <input type="text" class="form-control {{ $errors->has('color_vehicle') ? ' is-invalid' : '' }}"
    name="color_vehicle" value="{{ $desaparegut->color_vehicle }}" />

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
    <input type="text" class="form-control {{ $errors->has('matricula_vehicle') ? ' is-invalid' : '' }}"
    name="matricula_vehicle" value="{{ $desaparegut->matricula_vehicle }}" />

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

<!-- ID HIDDEN - OPEN -->
<input type="hidden" class="form-control" name="id" value="{{ $desaparegut->id }}">
<!-- ID HIDDEN - CLOSE -->

<!-- State HIDDEN - OPEN -->
<input type="hidden" class="form-control" name="id_recerca" value="{{ $desaparegut->id_recerca }}">
<!-- State HIDDEN - CLOSE -->

<!-- Submit button - OPEN -->
<div class="text-center margin-top">
<button type="submit" class="btn btn-primary">
    {{ __('actions.save') . ' ' . __('main.lost_person') }}
</button>
</div>
<!-- Submit button - OPEN -->

{{ Form::close() }}
<!-- Form - CLOSE -->

</div>
<!-- Content - CLOSE -->

@endsection

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
