<!-- Form - OPEN -->
{{ Form::model($recerca, array('route' => array('recerques.update', $recerca->id), 'method' => 'PUT')) }}

  <!-- Form content - OPEN -->
  <div class="form-row margin-top">

    <!-- Group - OPEN  -->
    <div class="form-group col-md-4">
      {{ Form::label('grup_treball_utilitzat', __('forms.group')) }}
      <input type="text" name="grup_treball_utilitzat" value="{{ $recerca->grup_treball_utilitzat }}"
      class="form-control {{ $errors->has('grup_treball_utilitzat') ? ' is-invalid' : '' }}" />
      <!-- Show errors input - OPEN -->
      @if( $errors->has('grup_treball_utilitzat') )
        <div class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('grup_treball_utilitzat') }}</strong>
        </div>
      @endif
      <!-- Show errors input - CLOSE -->
    </div>
    <!-- Group - CLOSE  -->

    <!-- Derivation name - OPEN  -->
    <div class="form-group col-md-4">
      {{ Form::label('derivacio_cossos_lliurades', __('forms.derivation_name')) }}
      <input type="text" name="derivacio_cossos_lliurades" value="{{ $recerca->derivacio_cossos_lliurades }}"
      class="form-control {{ $errors->has('derivacio_cossos_lliurades') ? ' is-invalid' : '' }}" />
      <!-- Show errors input - OPEN -->
      @if( $errors->has('derivacio_cossos_lliurades') )
        <div class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('derivacio_cossos_lliurades') }}</strong>
        </div>
      @endif
      <!-- Show errors input - CLOSE -->
    </div>
    <!-- Derivation name - CLOSE  -->

    <!-- Derivation ID receptor - OPEN  -->
    <div class="form-group col-md-4">
      {{ Form::label('derivacio_cossos_codi_receptor', __('forms.derivation_id_receptor')) }}
      <input type="text" name="derivacio_cossos_codi_receptor" value="{{ $recerca->derivacio_cossos_codi_receptor }}"
      class="form-control {{ $errors->has('derivacio_cossos_codi_receptor') ? ' is-invalid' : '' }}" />
      <!-- Show errors input - OPEN -->
      @if( $errors->has('derivacio_cossos_codi_receptor') )
        <div class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('derivacio_cossos_codi_receptor') }}</strong>
        </div>
      @endif
      <!-- Show errors input - CLOSE -->
    </div>
    <!-- Derivation ID receptor - CLOSE  -->

    <!-- First commander - OPEN  -->
    <div class="form-group col-md-3">
      {{ Form::label('comandament_inicial', __('forms.first_commander')) }}
      <textarea rows="2" name="comandament_inicial" class="form-control
       {{ $errors->has('comandament_inicial') ? ' is-invalid' : '' }}"
      > {{ $recerca->comandament_inicial }} </textarea>
      <!-- Show errors input - OPEN -->
      @if( $errors->has('comandament_inicial') )
        <div class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('comandament_inicial') }}</strong>
        </div>
      @endif
      <!-- Show errors input - CLOSE -->
    </div>
    <!-- First commander - CLOSE  -->

    <!-- Intermediate commander - OPEN  -->
    <div class="form-group col-md-6">
      {{ Form::label('comandament_relleus', __('forms.intermediate_commander')) }}
      <textarea rows="2" name="comandament_relleus" class="form-control
       {{ $errors->has('comandament_relleus') ? ' is-invalid' : '' }}"
      > {{ $recerca->comandament_relleus }} </textarea>
      <!-- Show errors input - OPEN -->
      @if( $errors->has('comandament_relleus') )
        <div class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('comandament_relleus') }}</strong>
        </div>
      @endif
      <!-- Show errors input - CLOSE -->
    </div>
    <!-- Intermediate commander - CLOSE  -->

    <!-- Last commander - OPEN  -->
    <div class="form-group col-md-3">
      {{ Form::label('comandament_final', __('forms.last_commander')) }}
      <textarea rows="2" name="comandament_final" class="form-control
       {{ $errors->has('comandament_final') ? ' is-invalid' : '' }}"
      > {{ $recerca->comandament_final }} </textarea>
      <!-- Show errors input - OPEN -->
      @if( $errors->has('comandament_final') )
        <div class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('comandament_final') }}</strong>
        </div>
      @endif
      <!-- Show errors input - CLOSE -->
    </div>
    <!-- Last commander - CLOSE  -->

    <!-- Tipology - OPEN  -->
    <div class="form-group col-md-4">
      {{ Form::label('tipologia', __('forms.tipology')) }}
      <input type="text" name="tipologia" value="{{ $recerca->tipologia }}"
      class="form-control {{ $errors->has('tipologia') ? ' is-invalid' : '' }}" />
      <!-- Show errors input - OPEN -->
      @if( $errors->has('tipologia') )
        <div class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('tipologia') }}</strong>
        </div>
      @endif
      <!-- Show errors input - CLOSE -->
    </div>
    <!-- Tipology - CLOSE  -->

    <!-- Resources - OPEN  -->
    <div class="form-group col-md-4">
      {{ Form::label('recursos', __('forms.resources')) }}
      <input type="text" name="recursos" value="{{ $recerca->recursos }}"
      class="form-control {{ $errors->has('recursos') ? ' is-invalid' : '' }}" />
      <!-- Show errors input - OPEN -->
      @if( $errors->has('recursos') )
        <div class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('recursos') }}</strong>
        </div>
      @endif
      <!-- Show errors input - CLOSE -->
    </div>
    <!-- Resources - CLOSE  -->

    <!-- Localization datetime - OPEN -->
    <div class="form-group col-md-4">
      {{ Form::label('data_localitzacio', __('forms.localization_date')) }}
      <input type="text" name="data_localitzacio" value="{{ $recerca->data_localitzacio }}"
      class="form-control {{ $errors->has('data_localitzacio') ? ' is-invalid' : '' }}" />
      <!-- Show errors input - OPEN -->
      @if( $errors->has('data_localitzacio') )
        <div class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('data_localitzacio') }}</strong>
        </div>
      @endif
      <!-- Show errors input - CLOSE -->
    </div>
    <!-- Localization datetime - CLOSE -->

    <!-- Localization toponim - OPEN  -->
    <div class="form-group col-md-4">
      {{ Form::label('toponim_localitzacio', __('forms.localization_toponim')) }}
      <input type="text" name="toponim_localitzacio" value="{{ $recerca->toponim_localitzacio }}"
      class="form-control {{ $errors->has('toponim_localitzacio') ? ' is-invalid' : '' }}" />
      <!-- Show errors input - OPEN -->
      @if( $errors->has('toponim_localitzacio') )
        <div class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('toponim_localitzacio') }}</strong>
        </div>
      @endif
      <!-- Show errors input - CLOSE -->
    </div>
    <!-- Localization toponim - CLOSE  -->

    <!-- Localization indret - OPEN  -->
    <div class="form-group col-md-4">
      {{ Form::label('indret_localitzacio', __('forms.localization_indret')) }}
      <input type="text" name="indret_localitzacio" value="{{ $recerca->indret_localitzacio }}"
      class="form-control {{ $errors->has('indret_localitzacio') ? ' is-invalid' : '' }}" />
      <!-- Show errors input - OPEN -->
      @if( $errors->has('indret_localitzacio') )
        <div class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('indret_localitzacio') }}</strong>
        </div>
      @endif
      <!-- Show errors input - CLOSE -->
    </div>
    <!-- Localization indret - CLOSE  -->

    <!-- Localization municipal term - OPEN  -->
    <div class="form-group col-md-4">
      {{ Form::label('terme_municipal_localitzacio', __('forms.localization_municipal_term')) }}
      <input type="text" name="terme_municipal_localitzacio" value="{{ $recerca->terme_municipal_localitzacio }}"
      class="form-control {{ $errors->has('terme_municipal_localitzacio') ? ' is-invalid' : '' }}" />
      <!-- Show errors input - OPEN -->
      @if( $errors->has('terme_municipal_localitzacio') )
        <div class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('terme_municipal_localitzacio') }}</strong>
        </div>
      @endif
      <!-- Show errors input - CLOSE -->
    </div>
    <!-- Localization municipal term - CLOSE  -->

    <!-- Localization COE - OPEN  -->
    <div class="form-group col-md-4">
      {{ Form::label('tall_coe_localitzacio', __('forms.coe')) }}
      <input type="text" name="tall_coe_localitzacio" value="{{ $recerca->tall_coe_localitzacio }}"
      class="form-control {{ $errors->has('tall_coe_localitzacio') ? ' is-invalid' : '' }}" />
      <!-- Show errors input - OPEN -->
      @if( $errors->has('tall_coe_localitzacio') )
        <div class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('tall_coe_localitzacio') }}</strong>
        </div>
      @endif
      <!-- Show errors input - CLOSE -->
    </div>
    <!-- Localization COE - CLOSE  -->

    <!-- Localization SOC - OPEN  -->
    <div class="form-group col-md-4">
      {{ Form::label('soc_localitzacio', __('forms.soc')) }}
      <input type="text" name="soc_localitzacio" value="{{ $recerca->soc_localitzacio }}"
      class="form-control {{ $errors->has('soc_localitzacio') ? ' is-invalid' : '' }}" />
      <!-- Show errors input - OPEN -->
      @if( $errors->has('soc_localitzacio') )
        <div class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('soc_localitzacio') }}</strong>
        </div>
      @endif
      <!-- Show errors input - CLOSE -->
    </div>
    <!-- Localization SOC - CLOSE  -->

    <!-- Localization section - OPEN  -->
    <div class="form-group col-md-4">
      {{ Form::label('seccio_localitzacio', __('forms.section')) }}
      <input type="text" name="seccio_localitzacio" value="{{ $recerca->seccio_localitzacio }}"
      class="form-control {{ $errors->has('seccio_localitzacio') ? ' is-invalid' : '' }}" />
      <!-- Show errors input - OPEN -->
      @if( $errors->has('seccio_localitzacio') )
        <div class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('seccio_localitzacio') }}</strong>
        </div>
      @endif
      <!-- Show errors input - CLOSE -->
    </div>
    <!-- Localization section - CLOSE  -->

    <!-- Localization UTM X - OPEN  -->
    <div class="form-group col-md-2">
      {{ Form::label('utm_x_localitzacio', __('forms.utm_x')) }}
      <input type="number" name="utm_x_localitzacio" value="{{ $recerca->utm_x_localitzacio }}"
      class="form-control {{ $errors->has('utm_x_localitzacio') ? ' is-invalid' : '' }}" />
      <!-- Show errors input - OPEN -->
      @if( $errors->has('utm_x_localitzacio') )
        <div class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('utm_x_localitzacio') }}</strong>
        </div>
      @endif
      <!-- Show errors input - CLOSE -->
    </div>
    <!-- Localization UTM X - CLOSE  -->

    <!-- Localization UTM Y - OPEN  -->
    <div class="form-group col-md-2">
      {{ Form::label('utm_y_localitzacio', __('forms.utm_y')) }}
      <input type="number" name="utm_y_localitzacio" value="{{ $recerca->utm_y_localitzacio }}"
      class="form-control {{ $errors->has('utm_y_localitzacio') ? ' is-invalid' : '' }}" />
      <!-- Show errors input - OPEN -->
      @if( $errors->has('utm_y_localitzacio') )
        <div class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('utm_y_localitzacio') }}</strong>
        </div>
      @endif
      <!-- Show errors input - CLOSE -->
    </div>
    <!-- Localization UTM Y - CLOSE  -->

    <!-- Localization distance from UPA - OPEN  -->
    <div class="form-group col-md-4">
      {{ Form::label('distancia_upa_localitzacio', __('forms.distance_upa')) }}
      <input type="number" name="distancia_upa_localitzacio" value="{{ $recerca->distancia_upa_localitzacio }}"
      class="form-control {{ $errors->has('distancia_upa_localitzacio') ? ' is-invalid' : '' }}" />
      <!-- Show errors input - OPEN -->
      @if( $errors->has('distancia_upa_localitzacio') )
        <div class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('distancia_upa_localitzacio') }}</strong>
        </div>
      @endif
      <!-- Show errors input - CLOSE -->
    </div>
    <!-- Localization distance from UPA - CLOSE  -->

    <!-- Localization who does it - OPEN  -->
    <div class="form-group col-md-4">
      {{ Form::label('qui_fa_localitzacio', __('forms.who_localizate')) }}
      <input type="text" name="qui_fa_localitzacio" value="{{ $recerca->qui_fa_localitzacio }}"
      class="form-control {{ $errors->has('qui_fa_localitzacio') ? ' is-invalid' : '' }}" />
      <!-- Show errors input - OPEN -->
      @if( $errors->has('qui_fa_localitzacio') )
        <div class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('qui_fa_localitzacio') }}</strong>
        </div>
      @endif
      <!-- Show errors input - CLOSE -->
    </div>
    <!-- Localization who does it - CLOSE  -->

    <!-- State lost people - OPEN  -->
    <div class="form-group col-md-6">
      {{ Form::label('estat_troben', __('forms.lost_people_state')) }}
      <textarea rows="2" name="estat_troben" class="form-control
       {{ $errors->has('estat_troben') ? ' is-invalid' : '' }}"
      > {{ $recerca->estat_troben }} </textarea>
      <!-- Show errors input - OPEN -->
      @if( $errors->has('estat_troben') )
        <div class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('estat_troben') }}</strong>
        </div>
      @endif
      <!-- Show errors input - CLOSE -->
    </div>
    <!-- State lost people - CLOSE  -->

    <!-- Motive closing - OPEN  -->
    <div class="form-group col-md-6">
      {{ Form::label('motiu_finalitzacio', __('forms.motive_closing')) }}
      <textarea rows="2" name="motiu_finalitzacio" class="form-control
       {{ $errors->has('motiu_finalitzacio') ? ' is-invalid' : '' }}"
      > {{ $recerca->motiu_finalitzacio }} </textarea>
      <!-- Show errors input - OPEN -->
      @if( $errors->has('motiu_finalitzacio') )
        <div class="invalid-feedback" role="alert">
          <strong>{{ $errors->first('motiu_finalitzacio') }}</strong>
        </div>
      @endif
      <!-- Show errors input - CLOSE -->
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
    array('class' => 'btn btn-dark margin-right', 'name' => 'savebutton') ) }}
    <!-- Save close - OPEN -->

    <!-- Submit data - OPEN -->
    @if( $recerca->es_practica == 0 )
      {{ Form::submit( __('actions.close_search'),
      array('class' => 'btn btn-primary margin-left', 'name' => 'closebutton') ) }}
    @else
      {{ Form::submit( __('actions.close_practice'),
      array('class' => 'btn btn-primary margin-left', 'name' => 'closebutton') ) }}
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
      autoUpdateInput: false,
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

    $('input[name="data_localitzacio"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('YYYY-MM-DD HH:mm:ss'));
    });

    $('input[name="data_localitzacio"]').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
    });

  });

</script>
