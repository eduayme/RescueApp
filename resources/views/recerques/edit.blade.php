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
  <div class="container margin-top-bg">

    <!-- Form - OPEN -->
    {{ Form::model($recerca, array('route' => array('recerques.update', $recerca->id), 'method' => 'PUT')) }}

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
              {{ Form::radio('es_practica', 0, true, array('class' => 'form-control','id'=>'is_search')) }}
              {{ Form::label('is_search', __('main.search')) }}
            </div>
            <!-- Search option - CLOSE -->

          </div>
          <!-- Search type activity - CLOSE -->

          <!-- Practice type activity - OPEN -->
          <div class="form-group funkyradio col-md-2">

            <!-- Practice option - OPEN -->
            <div class="funkyradio-primary">
              {{ Form::radio('es_practica', 1, false, array('class' => 'form-control','id'=>'is_practice')) }}
              {{ Form::label('is_practice', __('main.search')) }}
            </div>
            <!-- Practice option - CLOSE -->

          </div>
          <!-- Practice type activity - CLOSE -->

          <!-- Empty space - OPEN -->
          <div class="form-group col-md-1"> </div>
          <!-- Empty space - CLOSE -->

          <!-- Begin datetime - OPEN -->
          <div class="form-group col-md-3">
            {{ Form::label('data_inici', __('forms.begin_date')) }}
            {{ Form::text('data_inici', null, array('class' => 'form-control')) }}
          </div>
          <!-- Begin datetime - CLOSE -->

          <!-- Search ID - OPEN  -->
          <div class="form-group col-md-2">

            <label for="num_actuacio"> {{ __('forms.num_actuacio') }} </label>
            <input type="text" name="num_actuacio" value="{{ $recerca->num_actuacio }}"
            class="form-control {{ $errors->has('num_actuacio') ? ' is-invalid' : '' }}" />

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
                <option value="" {{ ($recerca->regio === '') ? 'selected' : '' }}>
                  {{ __('forms.chose_option') }}
                </option>
                <option value="01" {{ ($recerca->regio === '01') ? 'selected' : '' }}>
                  01 - Centre
                </option>
                <option value="02" {{ ($recerca->regio === '02') ? 'selected' : '' }}>
                  02 - Girona
                </option>
                <option value="03" {{ ($recerca->regio === '03') ? 'selected' : '' }}>
                  03 - Lleida
                </option>
                <option value="04" {{ ($recerca->regio === '04') ? 'selected' : '' }}>
                   04 - Metropolitana Nord
                 </option>
                <option value="05" {{ ($recerca->regio === '05') ? 'selected' : '' }}>
                  05 - Metropolitana Sud
                </option>
                <option value="06" {{ ($recerca->regio === '06') ? 'selected' : '' }}>
                  06 - Tarragona
                </option>
                <option value="07" {{ ($recerca->regio === '07') ? 'selected' : '' }}>
                  07 - Terres Ebre
                </option>
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
              <option value="" {{ ($recerca->es_desaparegut === '') ? 'selected' : '' }}>
                {{ __('forms.chose_option') }}
              </option>
              <option value="0" {{ ($recerca->es_desaparegut === 0) ? 'selected' : '' }}>
                No
              </option>
              <option value="1" {{ ($recerca->es_desaparegut === 1) ? 'selected' : '' }}>
                Si
              </option>
          </select>
        </div>
        <!-- Is the lost person - CLOSE  -->

        <!-- Is the contact person - OPEN  -->
        <div class="form-group col-md-3">
          <label for="es_contacte"> {{ __('forms.is_the_contact_person') }} </label>
          <select id="es_contacte" class="form-control" name="es_contacte">
              <option value="" {{ ($recerca->es_contacte === '') ? 'selected' : '' }}>
                {{ __('forms.chose_option') }}
              </option>
              <option value="0" {{ ($recerca->es_contacte === 0) ? 'selected' : '' }}>
                No
              </option>
              <option value="1" {{ ($recerca->es_contacte === 1) ? 'selected' : '' }}>
                Si
              </option>
          </select>
        </div>
        <!-- Is the contact person - CLOSE  -->

        <!-- Alertant name - OPEN  -->
        <div class="form-group col-md-6">
          {{ Form::label('nom_alertant', __('register.name')) }}
          {{ Form::text('nom_alertant', null, array('class' => 'form-control')) }}
        </div>
        <!-- Alertant name - CLOSE  -->

        <!-- Alertant age - OPEN  -->
        <div class="form-group col-md-2">
          {{ Form::label('edat_alertant', __('forms.age')) }}
          {{ Form::number('edat_alertant', null, array('class' => 'form-control')) }}
        </div>
        <!-- Alertant age - CLOSE  -->

        <!-- Alertant phone - OPEN  -->
        <div class="form-group col-md-4">
          {{ Form::label('telefon_alertant', __('forms.phone')) }}
          {{ Form::text('telefon_alertant', null, array('class' => 'form-control')) }}
        </div>
        <!-- Alertant phone - CLOSE  -->

        <!-- Alertant address - OPEN  -->
        <div class="form-group col-md-6">
          {{ Form::label('adreca_alertant', __('forms.address')) }}
          {{ Form::text('adreca_alertant', null, array('class' => 'form-control')) }}
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
          {{ Form::text('municipi_upa', null, array('class' => 'form-control')) }}
        </div>
        <!-- Incident village UPA - CLOSE  -->

        <!-- Incident date UPA - OPEN  -->
        <div class="form-group col-md-6">
          <label for="data_upa">
            {{ __('forms.date_upa') }}
            <span class="octicon octicon-info" data-toggle="tooltip"
            data-placement="top" title="{{ __('forms.upa') }}">
            </span>
          </label>
          {{ Form::text('data_upa', null, array('class' => 'form-control')) }}
        </div>
        <!-- Incident date UPA - CLOSE  -->

        <!-- Incident zone - OPEN  -->
        <div class="form-group col-md-6">
          {{ Form::label('zona_incident', __('forms.incident_zone')) }}
          {{ Form::textarea('zona_incident', null, array('class' => 'form-control', 'rows' => 2)) }}
        </div>
        <!-- Incident zone - CLOSE  -->

        <!-- Incident route - OPEN  -->
        <div class="form-group col-md-6">
          {{ Form::label('possible_ruta', __('forms.possible_route')) }}
          {{ Form::textarea('possible_ruta', null, array('class' => 'form-control', 'rows' => 2)) }}
        </div>
        <!-- Incident route - CLOSE  -->

        <!-- Incident description - OPEN  -->
        <div class="form-group col-md-12">
          {{ Form::label('descripcio_incident', __('forms.description')) }}
          {{ Form::textarea('descripcio_incident', null, array('class' => 'form-control', 'rows' => 2)) }}
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
          {{ Form::label('numero_desapareguts', __('forms.n_lost_people')) }}
          {{ Form::number('numero_desapareguts', null, array('class' => 'form-control')) }}
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
          {{ Form::label('estat_desapareguts', __('forms.description')) }}
          {{ Form::textarea('estat_desapareguts', null, array('class' => 'form-control', 'rows' => 2)) }}
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
              <option value="" {{ ($recerca->coneix_zona === '') ? 'selected' : '' }}>
                {{ __('forms.chose_option') }}
              </option>
              <option value="0" {{ ($recerca->coneix_zona === 0) ? 'selected' : '' }}>
                No
              </option>
              <option value="1" {{ ($recerca->coneix_zona === 1) ? 'selected' : '' }}>
                Si
              </option>
          </select>
        </div>
        <!-- Is the lost person - CLOSE  -->

        <!-- Experience with the activity - OPEN  -->
        <div class="form-group col-md-3">
          <label for="experiencia_activitat"> {{ __('forms.experience_with_activity') }}? </label>
          <select id="experiencia_activitat" class="form-control" name="experiencia_activitat">
              <option value="" {{ ($recerca->experiencia_activitat === '') ? 'selected' : '' }}>
                {{ __('forms.chose_option') }}
              </option>
              <option value="0" {{ ($recerca->experiencia_activitat === 0) ? 'selected' : '' }}>
                No
              </option>
              <option value="1" {{ ($recerca->experiencia_activitat === 1) ? 'selected' : '' }}>
                Si
              </option>
          </select>
        </div>
        <!-- Experience with the activity - CLOSE  -->

        <!-- Brings water - OPEN  -->
        <div class="form-group col-md-3">
          <label for="porta_aigua"> {{ __('forms.brings_water') }}? </label>
          <select id="porta_aigua" class="form-control" name="porta_aigua">
              <option value="" {{ ($recerca->porta_aigua === '') ? 'selected' : '' }}>
                {{ __('forms.chose_option') }}
              </option>
              <option value="0" {{ ($recerca->porta_aigua === 0) ? 'selected' : '' }}>
                No
              </option>
              <option value="1" {{ ($recerca->porta_aigua === 1) ? 'selected' : '' }}>
                Si
              </option>
          </select>
        </div>
        <!-- Brings water - CLOSE  -->

        <!-- Brings food - OPEN  -->
        <div class="form-group col-md-3">
          <label for="porta_menjar"> {{ __('forms.brings_food') }}? </label>
          <select id="porta_menjar" class="form-control" name="porta_menjar">
              <option value="" {{ ($recerca->porta_menjar === '') ? 'selected' : '' }}>
                {{ __('forms.chose_option') }}
              </option>
              <option value="0" {{ ($recerca->porta_menjar === 0) ? 'selected' : '' }}>
                No
              </option>
              <option value="1" {{ ($recerca->porta_menjar === 1) ? 'selected' : '' }}>
                Si
              </option>
          </select>
        </div>
        <!-- Brings food - CLOSE  -->

        <!-- Brings medication - OPEN  -->
        <div class="form-group col-md-3">
          <label for="medicament_necessari"> {{ __('forms.brings_medication') }}? </label>
          <select id="medicament_necessari" class="form-control" name="medicament_necessari">
              <option value="" {{ ($recerca->medicament_necessari === '') ? 'selected' : '' }}>
                {{ __('forms.chose_option') }}
              </option>
              <option value="0" {{ ($recerca->medicament_necessari === 0) ? 'selected' : '' }}>
                No
              </option>
              <option value="1" {{ ($recerca->medicament_necessari === 1) ? 'selected' : '' }}>
                Si
              </option>
          </select>
        </div>
        <!-- Brings medication - CLOSE  -->

        <!-- Brings light - OPEN  -->
        <div class="form-group col-md-3">
          <label for="porta_llum"> {{ __('forms.brings_light') }}? </label>
          <select id="porta_llum" class="form-control" name="porta_llum">
              <option value="" {{ ($recerca->porta_llum === '') ? 'selected' : '' }}>
                {{ __('forms.chose_option') }}
              </option>
              <option value="0" {{ ($recerca->porta_llum === 0) ? 'selected' : '' }}>
                No
              </option>
              <option value="1" {{ ($recerca->porta_llum === 1) ? 'selected' : '' }}>
                Si
              </option>
          </select>
        </div>
        <!-- Brings light - CLOSE  -->

        <!-- Brings cold clothes - OPEN  -->
        <div class="form-group col-md-3">
          <label for="roba_abric"> {{ __('forms.brings_cold_clothes') }}? </label>
          <select id="roba_abric" class="form-control" name="roba_abric">
              <option value="" {{ ($recerca->roba_abric === '') ? 'selected' : '' }}>
                {{ __('forms.chose_option') }}
              </option>
              <option value="0" {{ ($recerca->roba_abric === 0) ? 'selected' : '' }}>
                No
              </option>
              <option value="1" {{ ($recerca->roba_abric === 1) ? 'selected' : '' }}>
                Si
              </option>
          </select>
        </div>
        <!-- Brings cold clothes - CLOSE  -->

        <!-- Brings waterproof clothes - OPEN  -->
        <div class="form-group col-md-3">
          <label for="roba_impermeable"> {{ __('forms.brings_waterproof_clothes') }}? </label>
          <select id="roba_impermeable" class="form-control" name="roba_impermeable">
              <option value="" {{ ($recerca->roba_impermeable === '') ? 'selected' : '' }}>
                {{ __('forms.chose_option') }}
              </option>
              <option value="0" {{ ($recerca->roba_impermeable === 0) ? 'selected' : '' }}>
                No
              </option>
              <option value="1" {{ ($recerca->roba_impermeable === 1) ? 'selected' : '' }}>
                Si
              </option>
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
          {{ Form::label('nom_persona_contacte', __('register.name')) }}
          {{ Form::text('nom_persona_contacte', null, array('class' => 'form-control')) }}
        </div>
        <!-- Contact person name - CLOSE  -->

        <!-- Contact person phone - OPEN  -->
        <div class="form-group col-md-2">
          {{ Form::label('telefon_persona_contacte', __('forms.phone')) }}
          {{ Form::text('telefon_persona_contacte', null, array('class' => 'form-control')) }}
        </div>
        <!-- Contact person phone - CLOSE  -->

        <!-- Contact person affinity - OPEN  -->
        <div class="form-group col-md-4">
          {{ Form::label('afinitat_persona_contacte', __('forms.affinity')) }}
          {{ Form::text('afinitat_persona_contacte', null, array('class' => 'form-control')) }}
        </div>
        <!-- Contact person affinity - CLOSE  -->

      </div>
      <!-- Contact person - CLOSE -->

      <!-- State HIDDEN - OPEN -->
      {{ Form::hidden('estat', $recerca->estat, array('class' => 'form-control')) }}
      <!-- State HIDDEN - CLOSE -->

      <!-- Date creates HIDDEN - OPEN -->
      {{ Form::hidden('data_creacio', $recerca->data_creacio, array('class' => 'form-control')) }}
      <!-- Date creates HIDDEN - CLOSE -->

      <!-- Id user creates HIDDEN - OPEN -->
      {{ Form::hidden('id_usuari_creacio', $recerca->id_usuari_creacio, array('class' => 'form-control')) }}
      <!-- Id user creates HIDDEN - CLOSE -->

      <!-- Date modifies HIDDEN - OPEN -->
      <input type="hidden" class="form-control" name="data_ultima_modificacio" value="<?php echo date("Y-m-d H:i:s"); ?>">
      <!-- Date modifies HIDDEN - CLOSE -->

      <!-- Id user last modification HIDDEN - OPEN -->
      <input type="hidden" class="form-control" name="id_usuari_ultima_modificacio" value={{ Auth::user()->id }}>
      <!-- Id user last modification HIDDEN - CLOSE -->

      <!-- Submit button - OPEN -->
      <div class="text-center margin-top">
        {{ Form::submit( __('actions.save'), array('class' => 'btn btn-primary') ) }}
      </div>
      <!-- Submit button - OPEN -->

    {{ Form::close() }}
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

    $('input[name="data_upa"],input[name="data_inici"]').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
    });

  });

</script>
