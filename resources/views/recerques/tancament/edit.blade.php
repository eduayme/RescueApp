<!-- Form - OPEN -->
{{ Form::model($recerca, array('route' => array('recerques.update', $recerca->id), 'method' => 'PUT')) }}

  <!-- Form content - OPEN -->
  <div class="form-row margin-top">

    <!-- Group - OPEN  -->
    <div class="form-group col-md-4">
      {{ Form::label('grup_treball_utilitzat', __('forms.group')) }}
      {{ Form::text('grup_treball_utilitzat', null, array('class' => 'form-control')) }}
    </div>
    <!-- Group - CLOSE  -->

    <!-- Derivation name - OPEN  -->
    <div class="form-group col-md-4">
      {{ Form::label('derivacio_cossos_lliurades', __('forms.derivation_name')) }}
      {{ Form::text('derivacio_cossos_lliurades', null, array('class' => 'form-control')) }}
    </div>
    <!-- Derivation name - CLOSE  -->

    <!-- Derivation ID receptor - OPEN  -->
    <div class="form-group col-md-4">
      {{ Form::label('derivacio_cossos_codi_receptor', __('forms.derivation_id_receptor')) }}
      {{ Form::text('derivacio_cossos_codi_receptor', null, array('class' => 'form-control')) }}
    </div>
    <!-- Derivation ID receptor - CLOSE  -->

    <!-- First commander - OPEN  -->
    <div class="form-group col-md-3">
      {{ Form::label('comandament_inicial', __('forms.first_commander')) }}
      {{ Form::textarea('comandament_inicial', null, array('class' => 'form-control', 'rows' => 2)) }}
    </div>
    <!-- First commander - CLOSE  -->

    <!-- Intermediate commander - OPEN  -->
    <div class="form-group col-md-6">
      {{ Form::label('comandament_relleus', __('forms.intermediate_commander')) }}
      {{ Form::textarea('comandament_relleus', null, array('class' => 'form-control', 'rows' => 2)) }}
    </div>
    <!-- Intermediate commander - CLOSE  -->

    <!-- Last commander - OPEN  -->
    <div class="form-group col-md-3">
      {{ Form::label('comandament_final', __('forms.last_commander')) }}
      {{ Form::textarea('comandament_final', null, array('class' => 'form-control', 'rows' => 2)) }}
    </div>
    <!-- Last commander - CLOSE  -->

    <!-- Tipology - OPEN  -->
    <div class="form-group col-md-4">
      {{ Form::label('tipologia', __('forms.tipology')) }}
      {{ Form::text('tipologia', null, array('class' => 'form-control')) }}
    </div>
    <!-- Tipology - CLOSE  -->

    <!-- Resources - OPEN  -->
    <div class="form-group col-md-4">
      {{ Form::label('recursos', __('forms.resources')) }}
      {{ Form::text('recursos', null, array('class' => 'form-control')) }}
    </div>
    <!-- Resources - CLOSE  -->

    <!-- Localization datetime - OPEN -->
    <div class="form-group col-md-4">
      {{ Form::label('data_localitzacio', __('forms.localization_date')) }}
      {{ Form::text('data_localitzacio', null, array('class' => 'form-control')) }}
    </div>
    <!-- Localization datetime - CLOSE -->

    <!-- Localization toponim - OPEN  -->
    <div class="form-group col-md-4">
      {{ Form::label('toponim_localitzacio', __('forms.localization_toponim')) }}
      {{ Form::text('toponim_localitzacio', null, array('class' => 'form-control')) }}
    </div>
    <!-- Localization toponim - CLOSE  -->

    <!-- Localization indret - OPEN  -->
    <div class="form-group col-md-4">
      {{ Form::label('indret_localitzacio', __('forms.localization_indret')) }}
      {{ Form::text('indret_localitzacio', null, array('class' => 'form-control')) }}
    </div>
    <!-- Localization indret - CLOSE  -->

    <!-- Localization municipal term - OPEN  -->
    <div class="form-group col-md-4">
      {{ Form::label('terme_municipal_localitzacio', __('forms.localization_municipal_term')) }}
      {{ Form::text('terme_municipal_localitzacio', null, array('class' => 'form-control')) }}
    </div>
    <!-- Localization municipal term - CLOSE  -->

    <!-- Localization COE - OPEN  -->
    <div class="form-group col-md-4">
      {{ Form::label('tall_coe_localitzacio', __('forms.coe')) }}
      {{ Form::text('tall_coe_localitzacio', null, array('class' => 'form-control')) }}
    </div>
    <!-- Localization COE - CLOSE  -->

    <!-- Localization SOC - OPEN  -->
    <div class="form-group col-md-4">
      {{ Form::label('soc_localitzacio', __('forms.soc')) }}
      {{ Form::text('soc_localitzacio', null, array('class' => 'form-control')) }}
    </div>
    <!-- Localization SOC - CLOSE  -->

    <!-- Localization section - OPEN  -->
    <div class="form-group col-md-4">
      {{ Form::label('seccio_localitzacio', __('forms.section')) }}
      {{ Form::text('seccio_localitzacio', null, array('class' => 'form-control')) }}
    </div>
    <!-- Localization section - CLOSE  -->

    <!-- Localization UTM X - OPEN  -->
    <div class="form-group col-md-2">
      {{ Form::label('utm_x_localitzacio', __('forms.utm_x')) }}
      {{ Form::number('utm_x_localitzacio', null, array('class' => 'form-control')) }}
    </div>
    <!-- Localization UTM X - CLOSE  -->

    <!-- Localization UTM Y - OPEN  -->
    <div class="form-group col-md-2">
      {{ Form::label('utm_y_localitzacio', __('forms.utm_y')) }}
      {{ Form::number('utm_y_localitzacio', null, array('class' => 'form-control')) }}
    </div>
    <!-- Localization UTM Y - CLOSE  -->

    <!-- Localization distance from UPA - OPEN  -->
    <div class="form-group col-md-4">
      {{ Form::label('distancia_upa_localitzacio', __('forms.distance_upa')) }}
      {{ Form::number('distancia_upa_localitzacio', null, array('class' => 'form-control')) }}
    </div>
    <!-- Localization distance from UPA - CLOSE  -->

    <!-- Localization who does it - OPEN  -->
    <div class="form-group col-md-4">
      {{ Form::label('qui_fa_localitzacio', __('forms.who_localizate')) }}
      {{ Form::text('qui_fa_localitzacio', null, array('class' => 'form-control')) }}
    </div>
    <!-- Localization who does it - CLOSE  -->

    <!-- State lost people - OPEN  -->
    <div class="form-group col-md-6">
      {{ Form::label('estat_troben', __('forms.lost_people_state')) }}
      {{ Form::textarea('estat_troben', null, array('class' => 'form-control', 'rows' => 2)) }}
    </div>
    <!-- State lost people - CLOSE  -->

    <!-- Motive closing - OPEN  -->
    <div class="form-group col-md-6">
      {{ Form::label('motiu_finalitzacio', __('forms.motive_closing')) }}
      {{ Form::textarea('motiu_finalitzacio', null, array('class' => 'form-control', 'rows' => 2)) }}
    </div>
    <!-- Motive closing - CLOSE  -->

  </div>
  <!-- Form content - CLOSE -->

  <!-- ID HIDDEN - OPEN -->
  {{ Form::hidden('num_actuacio', $recerca->num_actuacio, array('class' => 'form-control')) }}
  <!-- ID HIDDEN - CLOSE -->

  <!-- Is a practice HIDDEN - OPEN -->
  {{ Form::hidden('es_practica', $recerca->es_practica, array('class' => 'form-control')) }}
  <!-- Is a practice - CLOSE -->

  <!-- State HIDDEN - OPEN -->
  {{ Form::hidden('estat', $recerca->estat, array('class' => 'form-control')) }}
  <!-- State HIDDEN - CLOSE -->

  <!-- Region HIDDEN - OPEN -->
  {{ Form::hidden('regio', $recerca->regio, array('class' => 'form-control')) }}
  <!-- Region HIDDEN - CLOSE -->

  <!-- Creation date HIDDEN - OPEN -->
  {{ Form::hidden('data_creacio', $recerca->data_creacio, array('class' => 'form-control')) }}
  <!-- Creation date - CLOSE -->

  <!-- Creation user - OPEN -->
  {{ Form::hidden('id_usuari_creacio', $recerca->id_usuari_creacio, array('class' => 'form-control')) }}
  <!-- Creation user - CLOSE -->

  <!-- Date modifies HIDDEN - OPEN -->
  <input type="hidden" class="form-control" name="data_ultima_modificacio" value="<?php echo date("Y-m-d H:i:s"); ?>">
  <!-- Date modifies HIDDEN - CLOSE -->

  <!-- Id user last modification HIDDEN - OPEN -->
  <input type="hidden" class="form-control" name="id_usuari_ultima_modificacio" value={{ Auth::user()->id }}>
  <!-- Id user last modification HIDDEN - CLOSE -->

  <!-- Buttons - OPEN -->
  <div class="text-center margin-top">

    <!-- Save data - OPEN -->
    {{ Form::submit( __('actions.save'),
    array('class' => 'btn btn-dark margin-right', 'name' => 'submitbutton', 'value' => 'save') ) }}
    <!-- Save close - OPEN -->

    <!-- Submit data - OPEN -->
    @if( $recerca->es_practica == 0 )
      {{ Form::submit( __('actions.close_search'),
      array('class' => 'btn btn-primary margin-left', 'name' => 'submitbutton', 'value' => 'close') ) }}
    @else
      {{ Form::submit( __('actions.close_practice'),
      array('class' => 'btn btn-primary margin-left', 'name' => 'submitbutton', 'value' => 'close') ) }}
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
    $('input[name="data_localitzacio"]').daterangepicker({
      singleDatePicker: true,
      timePicker: true,
      timePicker24Hour: true,
      timePickerIncrement: 5,
      autoUpdateInput: true,
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
    $('input[name="data_localitzacio"]').val('');

    $('input[name="data_localitzacio"]').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
    });

  });

</script>
