@extends('layouts.app')

@section('title', __('main.searches'))

@section('content')

  <!-- Alerts - OPEN -->

  <!-- Success - OPEN -->
  @if( session()->get('success') )
    <div class="alert alert-success" role="alert">
      <div class="container text-center">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          {{ session()->get('success') }}
      </div>
    </div>
  <!-- Success - CLOSE -->

  <!-- Error - OPEN -->
  @elseif( session()->get('error') )
    <div class="alert alert-error alert-dismissible fade show" role="alert">
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
    <form method="post" action="{{ route('recerques.store') }}">

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
              <input type="radio" name="es_practica" id="is_search" value="0" checked/>
              <label for="is_search"> {{ __('main.search') }} </label>
            </div>
            <!-- Search option - CLOSE -->

          </div>
          <!-- Search type activity - CLOSE -->

          <!-- Practice type activity - OPEN -->
          <div class="form-group funkyradio col-md-2">

            <!-- Practice option - OPEN -->
            <div class="funkyradio-primary">
              <input type="radio" name="es_practica" id="is_practice" value="1" />
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
            <label for="data_inici"> {{ __('forms.begin_date') }} </label>
            <input type="text" class="form-control" name="data_inici" value=""/>
          </div>
          <!-- Begin datetime - CLOSE -->

          <!-- Search ID - OPEN  -->
          <div class="form-group col-md-2">
            <label for="num_actuacio"> {{ __('forms.num_actuacio') }} </label>
            <input type="text" class="form-control {{ $errors->has('num_actuacio') ? ' is-invalid' : '' }}" name="num_actuacio"/>

            <!-- Show errors input - OPEN -->
            @if( $errors->has('num_actuacio') )
              <div class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('num_actuacio') }}</strong>
              </div>
            @endif
            <!-- Show errors input - CLOSE -->

          </div>

          <!-- Search ID - CLOSE  -->

          <!-- Search region - OPEN  -->
          <div class="form-group col-md-2">
            <label for="regio"> {{ __('forms.region') }} </label>
            <select id="regio" class="form-control" name="regio">
                <option value=""> {{ __('forms.chose_option') }} </option>
                <option value="01"> 01 - Centre </option>
                <option value="02"> 02 - Girona </option>
                <option value="03"> 03 - Lleida </option>
                <option value="04"> 04 - Metropolitana Nord </option>
                <option value="05"> 05 - Metropolitana Sud </option>
                <option value="06"> 06 - Tarragona </option>
                <option value="07"> 07 - Terres Ebre </option>
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
          <label for="es_desaparegut"> {{ __('forms.is_the_lost_person') }} </label>
          <select id="es_desaparegut" class="form-control" name="es_desaparegut">
              <option value=""> {{ __('forms.chose_option') }} </option>
              <option value="0"> No </option>
              <option value="1"> Si </option>
          </select>
        </div>
        <!-- Is the lost person - CLOSE  -->

        <!-- Is the contact person - OPEN  -->
        <div class="form-group col-md-3">
          <label for="es_contacte"> {{ __('forms.is_the_contact_person') }} </label>
          <select id="es_contacte" class="form-control" name="es_contacte">
              <option value=""> {{ __('forms.chose_option') }} </option>
              <option value="0"> No </option>
              <option value="1"> Si </option>
          </select>
        </div>
        <!-- Is the contact person - CLOSE  -->

        <!-- Alertant name - OPEN  -->
        <div class="form-group col-md-6">
          <label for="nom_alertant"> {{ __('register.name') }} </label>
          <input type="text" class="form-control" name="nom_alertant"/>
        </div>
        <!-- Alertant name - CLOSE  -->

        <!-- Alertant age - OPEN  -->
        <div class="form-group col-md-2">
          <label for="edat_alertant"> {{ __('forms.age') }} </label>
          <input type="number" class="form-control" name="edat_alertant"/>
        </div>
        <!-- Alertant age - CLOSE  -->

        <!-- Alertant phone - OPEN  -->
        <div class="form-group col-md-4">
          <label for="telefon_alertant"> {{ __('forms.phone') }} </label>
          <input type="text" class="form-control" name="telefon_alertant"/>
        </div>
        <!-- Alertant phone - CLOSE  -->

        <!-- Alertant address - OPEN  -->
        <div class="form-group col-md-6">
          <label for="adreca_alertant"> {{ __('forms.address') }} </label>
          <input type="text" class="form-control" name="adreca_alertant"/>
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
          <label for="muncipi_upa">
            {{ __('forms.village_upa') }}
            <span class="octicon octicon-info" data-toggle="tooltip"
            data-placement="top" title="{{ __('forms.upa') }}">
            </span>
          </label>
          <input type="text" class="form-control" name="municipi_upa"/>
        </div>
        <!-- Incident village UPA - CLOSE  -->

        <!-- Incident village UPA - OPEN  -->
        <div class="form-group col-md-6">
          <label for="data_upa">
            {{ __('forms.date_upa') }}
            <span class="octicon octicon-info" data-toggle="tooltip"
            data-placement="top" title="{{ __('forms.upa') }}">
            </span>
          </label>
          <input type="text" class="form-control" name="data_upa" value="" />
        </div>
        <!-- Incident village UPA - CLOSE  -->

        <!-- Incident zone - OPEN  -->
        <div class="form-group col-md-6">
          <label for="zona_incident"> {{ __('forms.incident_zone') }} </label>
          <textarea type="text" class="form-control" name="zona_incident" rows="2"></textarea>
        </div>
        <!-- Incident zone - CLOSE  -->

        <!-- Incident route - OPEN  -->
        <div class="form-group col-md-6">
          <label for="possible_ruta"> {{ __('forms.possible_route') }} </label>
          <textarea type="text" class="form-control" name="possible_ruta" rows="2"></textarea>
        </div>
        <!-- Incident route - CLOSE  -->

        <!-- Incident description - OPEN  -->
        <div class="form-group col-md-12">
          <label for="descripcio_incident"> {{ __('forms.description') }} </label>
          <textarea type="text" class="form-control" name="descripcio_incident" rows="2"></textarea>
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
          <label for="numero_desapareguts"> {{ __('forms.n_lost_people') }} </label>
          <input type="number" class="form-control" name="numero_desapareguts"/>
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
          <label for="estat_desapareguts"> {{ __('forms.description') }} </label>
          <textarea type="number" class="form-control" name="estat_desapareguts" rows="2"></textarea>
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
          <label for="coneix_zona"> {{ __('forms.knows_the_zone') }}? </label>
          <select id="coneix_zona" class="form-control" name="coneix_zona">
              <option value=""> {{ __('forms.chose_option') }} </option>
              <option value="0"> No </option>
              <option value="1"> Si </option>
          </select>
        </div>
        <!-- Is the lost person - CLOSE  -->

        <!-- Experience with the activity - OPEN  -->
        <div class="form-group col-md-3">
          <label for="experiencia_activitat"> {{ __('forms.experience_with_activity') }}? </label>
          <select id="experiencia_activitat" class="form-control" name="experiencia_activitat">
              <option value=""> {{ __('forms.chose_option') }} </option>
              <option value="0"> No </option>
              <option value="1"> Si </option>
          </select>
        </div>
        <!-- Experience with the activity - CLOSE  -->

        <!-- Brings water - OPEN  -->
        <div class="form-group col-md-3">
          <label for="porta_aigua"> {{ __('forms.brings_water') }}? </label>
          <select id="porta_aigua" class="form-control" name="porta_aigua">
              <option value=""> {{ __('forms.chose_option') }} </option>
              <option value="0"> No </option>
              <option value="1"> Si </option>
          </select>
        </div>
        <!-- Brings water - CLOSE  -->

        <!-- Brings food - OPEN  -->
        <div class="form-group col-md-3">
          <label for="porta_menjar"> {{ __('forms.brings_food') }}? </label>
          <select id="porta_menjar" class="form-control" name="porta_menjar">
              <option value=""> {{ __('forms.chose_option') }} </option>
              <option value="0"> No </option>
              <option value="1"> Si </option>
          </select>
        </div>
        <!-- Brings food - CLOSE  -->

        <!-- Brings medication - OPEN  -->
        <div class="form-group col-md-3">
          <label for="medicament_necessari"> {{ __('forms.brings_medication') }}? </label>
          <select id="medicament_necessari" class="form-control" name="medicament_necessari">
              <option value=""> {{ __('forms.chose_option') }} </option>
              <option value="0"> No </option>
              <option value="1"> Si </option>
          </select>
        </div>
        <!-- Brings medication - CLOSE  -->

        <!-- Brings light - OPEN  -->
        <div class="form-group col-md-3">
          <label for="porta_llum"> {{ __('forms.brings_light') }}? </label>
          <select id="porta_llum" class="form-control" name="porta_llum">
              <option value=""> {{ __('forms.chose_option') }} </option>
              <option value="0"> No </option>
              <option value="1"> Si </option>
          </select>
        </div>
        <!-- Brings light - CLOSE  -->

        <!-- Brings cold clothes - OPEN  -->
        <div class="form-group col-md-3">
          <label for="roba_abric"> {{ __('forms.brings_cold_clothes') }}? </label>
          <select id="roba_abric" class="form-control" name="roba_abric">
              <option value=""> {{ __('forms.chose_option') }} </option>
              <option value="0"> No </option>
              <option value="1"> Si </option>
          </select>
        </div>
        <!-- Brings cold clothes - CLOSE  -->

        <!-- Brings waterproof clothes - OPEN  -->
        <div class="form-group col-md-3">
          <label for="roba_impermeable"> {{ __('forms.brings_waterproof_clothes') }}? </label>
          <select id="roba_impermeable" class="form-control" name="roba_impermeable">
              <option value=""> {{ __('forms.chose_option') }} </option>
              <option value="0"> No </option>
              <option value="1"> Si </option>
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
          <label for="nom_persona_contacte"> {{ __('register.name') }} </label>
          <input type="text" class="form-control" name="nom_persona_contacte"/>
        </div>
        <!-- Contact person name - CLOSE  -->

        <!-- Contact person phone - OPEN  -->
        <div class="form-group col-md-2">
          <label for="telefon_persona_contacte"> {{ __('forms.phone') }} </label>
          <input type="text" class="form-control" name="telefon_persona_contacte"/>
        </div>
        <!-- Contact person phone - CLOSE  -->

        <!-- Contact person affinity - OPEN  -->
        <div class="form-group col-md-4">
          <label for="afinitat_persona_contacte"> {{ __('forms.affinity') }} </label>
          <input type="text" class="form-control" name="afinitat_persona_contacte"/>
        </div>
        <!-- Contact person affinity - CLOSE  -->

      </div>
      <!-- Contact person - CLOSE -->

      <!-- State HIDDEN - OPEN -->
      <input type="hidden" class="form-control" name="estat" value="Oberta">
      <!-- State HIDDEN - CLOSE -->

      <!-- Date creates HIDDEN - OPEN -->
      <input type="hidden" class="form-control" name="data_creacio" value="<?php echo date("Y-m-d H:i:s"); ?>">
      <!-- Date creates HIDDEN - CLOSE -->

      <!-- Date modifies HIDDEN - OPEN -->
      <input type="hidden" class="form-control" name="data_ultima_modificacio" value="<?php echo date("Y-m-d H:i:s"); ?>">
      <!-- Date modifies HIDDEN - CLOSE -->

      <!-- Id user creates HIDDEN - OPEN -->
      <input type="hidden" class="form-control" name="id_usuari_creacio" value={{ Auth::user()->id }}>
      <!-- Id user creates HIDDEN - CLOSE -->

      <!-- Id user last modification HIDDEN - OPEN -->
      <input type="hidden" class="form-control" name="id_usuari_ultima_modificacio" value={{ Auth::user()->id }}>
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
    $('input[name="data_upa"],input[name="data_inici"]').daterangepicker({
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
    $('input[name="data_upa"').val( '' );
    $('input[name="data_inici"').val( '' );

    $('input[name="data_upa"],input[name="data_inici"]').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
    });

  });

</script>
