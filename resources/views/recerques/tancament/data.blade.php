<!-- Language for dates - OPEN -->
@php
    \Date::setLocale('ca');
@endphp
<!-- Language for dates - CLOSE -->

<!-- Content - OPEN -->
<div class="form-row margin-top">

  <!-- Group - OPEN  -->
  <div class="form-group col-md-4">
    {{ Form::label('grup_treball_utilitzat', __('forms.group')) }}
    <p> {{ $recerca->grup_treball_utilitzat }} </p>
  </div>
  <!-- Group - CLOSE  -->

  <!-- Derivation name - OPEN  -->
  <div class="form-group col-md-4">
    {{ Form::label('derivacio_cossos_lliurades', __('forms.derivation_name')) }}
    <p> {{ $recerca->derivacio_cossos_lliurades }} </p>
  </div>
  <!-- Derivation name - CLOSE  -->

  <!-- Derivation ID receptor - OPEN  -->
  <div class="form-group col-md-4">
    {{ Form::label('derivacio_cossos_codi_receptor', __('forms.derivation_id_receptor')) }}
    <p> {{ $recerca->derivacio_cossos_codi_receptor }} </p>
  </div>
  <!-- Derivation ID receptor - CLOSE  -->

  <!-- First commander - OPEN  -->
  <div class="form-group col-md-3">
    {{ Form::label('comandament_inicial', __('forms.first_commander')) }}
    <p> {{ $recerca->comandament_inicial }} </p>
  </div>
  <!-- First commander - CLOSE  -->

  <!-- Intermediate commander - OPEN  -->
  <div class="form-group col-md-6">
    {{ Form::label('comandament_relleus', __('forms.intermediate_commander')) }}
    <p> {{ $recerca->comandament_relleus }} </p>
  </div>
  <!-- Intermediate commander - CLOSE  -->

  <!-- Last commander - OPEN  -->
  <div class="form-group col-md-3">
    {{ Form::label('comandament_final', __('forms.last_commander')) }}
    <p> {{ $recerca->comandament_final }} </p>
  </div>
  <!-- Last commander - CLOSE  -->

  <!-- Tipology - OPEN  -->
  <div class="form-group col-md-4">
    {{ Form::label('tipologia', __('forms.tipology')) }}
    <p> {{ $recerca->tipologia }} </p>
  </div>
  <!-- Tipology - CLOSE  -->

  <!-- Resources - OPEN  -->
  <div class="form-group col-md-4">
    {{ Form::label('recursos', __('forms.resources')) }}
    <p> {{ $recerca->recursos }} </p>
  </div>
  <!-- Resources - CLOSE  -->

  <!-- Localization datetime - OPEN -->
  <div class="form-group col-md-4">
    {{ Form::label('data_localitzacio', __('forms.localization_date')) }}
    <p>
      @php
      $date = new Date($recerca->data_localitzacio);
      echo $date->format('H:i | d F Y');
      @endphp
    </p>
  </div>
  <!-- Localization datetime - CLOSE -->

  <!-- Localization toponim - OPEN  -->
  <div class="form-group col-md-4">
    {{ Form::label('toponim_localitzacio', __('forms.localization_toponim')) }}
    <p> {{ $recerca->toponim_localitzacio }} </p>
  </div>
  <!-- Localization toponim - CLOSE  -->

  <!-- Localization indret - OPEN  -->
  <div class="form-group col-md-4">
    {{ Form::label('indret_localitzacio', __('forms.localization_indret')) }}
    <p> {{ $recerca->indret_localitzacio }} </p>
  </div>
  <!-- Localization indret - CLOSE  -->

  <!-- Localization municipal term - OPEN  -->
  <div class="form-group col-md-4">
    {{ Form::label('terme_municipal_localitzacio', __('forms.localization_municipal_term')) }}
    <p> {{ $recerca->terme_municipal_localitzacio }} </p>
  </div>
  <!-- Localization municipal term - CLOSE  -->

  <!-- Localization COE - OPEN  -->
  <div class="form-group col-md-4">
    {{ Form::label('tall_coe_localitzacio', __('forms.coe')) }}
    <p> {{ $recerca->tall_coe_localitzacio }} </p>
  </div>
  <!-- Localization COE - CLOSE  -->

  <!-- Localization SOC - OPEN  -->
  <div class="form-group col-md-4">
    {{ Form::label('soc_localitzacio', __('forms.soc')) }}
    <p> {{ $recerca->soc_localitzacio }} </p>
  </div>
  <!-- Localization SOC - CLOSE  -->

  <!-- Localization section - OPEN  -->
  <div class="form-group col-md-4">
    {{ Form::label('seccio_localitzacio', __('forms.section')) }}
    <p> {{ $recerca->seccio_localitzacio }} </p>
  </div>
  <!-- Localization section - CLOSE  -->

  <!-- Localization UTM X - OPEN  -->
  <div class="form-group col-md-2">
    {{ Form::label('utm_x_localitzacio', __('forms.utm_x')) }}
    <p> {{ $recerca->utm_x_localitzacio }} </p>
  </div>
  <!-- Localization UTM X - CLOSE  -->

  <!-- Localization UTM Y - OPEN  -->
  <div class="form-group col-md-2">
    {{ Form::label('utm_y_localitzacio', __('forms.utm_y')) }}
    <p> {{ $recerca->utm_y_localitzacio }} </p>
  </div>
  <!-- Localization UTM Y - CLOSE  -->

  <!-- Localization distance from UPA - OPEN  -->
  <div class="form-group col-md-4">
    {{ Form::label('distancia_upa_localitzacio', __('forms.distance_upa')) }}
    <p> {{ $recerca->distancia_upa_localitzacio }} </p>
  </div>
  <!-- Localization distance from UPA - CLOSE  -->

  <!-- Localization who does it - OPEN  -->
  <div class="form-group col-md-4">
    {{ Form::label('qui_fa_localitzacio', __('forms.who_localizate')) }}
    <p> {{ $recerca->qui_fa_localitzacio }} </p>
  </div>
  <!-- Localization who does it - CLOSE  -->

  <!-- State lost people - OPEN  -->
  <div class="form-group col-md-6">
    {{ Form::label('estat_troben', __('forms.lost_people_state')) }}
    <p> {{ $recerca->estat_troben }} </p>
  </div>
  <!-- State lost people - CLOSE  -->

  <!-- Motive closing - OPEN  -->
  <div class="form-group col-md-6">
    {{ Form::label('motiu_finalitzacio', __('forms.motive_closing')) }}
    <p> {{ $recerca->motiu_finalitzacio }} </p>
  </div>
  <!-- Motive closing - CLOSE  -->

  

</div>
<!-- Content - CLOSE -->
