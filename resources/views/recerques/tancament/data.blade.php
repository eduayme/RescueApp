<!-- Language for dates - OPEN -->
@php
    \Date::setLocale('ca');
@endphp
<!-- Language for dates - CLOSE -->

<!-- Content - OPEN -->
<div class="form-row margin-top text-center">

    <!-- First commander - OPEN  -->
    <div class="form-group col-md-3">
      <p>
        {{ __('forms.first_commander') }}
      </p>
      <h5 class="margin-top-sm-min">
        <b>
          @if( $recerca->comandament_inicial )
            {{ $recerca->comandament_inicial }}
          @else
            --
          @endif
        </b>
      </h5>
    </div>
    <!-- First commander - CLOSE  -->

    <!-- Intermediate commander - OPEN  -->
    <div class="form-group col-md-6">
      <p>
        {{ __('forms.intermediate_commander') }}
      </p>
      <h5 class="margin-top-sm-min">
        <b>
          @if( $recerca->comandament_relleus )
            {{ $recerca->comandament_relleus }}
          @else
            --
          @endif
        </b>
      </h5>
    </div>
    <!-- Intermediate commander - CLOSE  -->

    <!-- Last commander - OPEN  -->
    <div class="form-group col-md-3">
      <p>
        {{ __('forms.last_commander') }}
      </p>
      <h5 class="margin-top-sm-min">
        <b>
          @if( $recerca->comandament_final )
            {{ $recerca->comandament_final }}
          @else
            --
          @endif
        </b>
      </h5>
    </div>
    <!-- Last commander - CLOSE  -->

  <!-- Group - OPEN  -->
  <div class="form-group col-md-4">
    <p>
      {{ __('forms.group') }}
    </p>
    <h5 class="margin-top-sm-min">
      <b>
        @if( $recerca->grup_treball_utilitzat )
          {{ $recerca->grup_treball_utilitzat }}
        @else
          --
        @endif
      </b>
    </h5>
  </div>
  <!-- Group - CLOSE  -->

  <!-- Derivation name - OPEN  -->
  <div class="form-group col-md-4">
    <p>
      {{ __('forms.derivation_name') }}
    </p>
    <h5 class="margin-top-sm-min">
      <b>
        @if( $recerca->derivacio_cossos_lliurades )
          {{ $recerca->derivacio_cossos_lliurades }}
        @else
          --
        @endif
      </b>
    </h5>
  </div>
  <!-- Derivation name - CLOSE  -->

  <!-- Derivation ID receptor - OPEN  -->
  <div class="form-group col-md-4">
    <p>
      {{ __('forms.derivation_id_receptor') }}
    </p>
    <h5 class="margin-top-sm-min">
      <b>
        @if( $recerca->derivacio_cossos_codi_receptor )
          {{ $recerca->derivacio_cossos_codi_receptor }}
        @else
          --
        @endif
      </b>
    </h5>
  </div>
  <!-- Derivation ID receptor - CLOSE  -->

  <!-- Tipology - OPEN  -->
  <div class="form-group col-md-4">
    <p>
      {{ __('forms.tipology') }}
    </p>
    <h5 class="margin-top-sm-min">
      <b>
        @if( $recerca->tipologia )
          {{ $recerca->tipologia }}
        @else
          --
        @endif
      </b>
    </h5>
  </div>
  <!-- Tipology - CLOSE  -->

  <!-- Resources - OPEN  -->
  <div class="form-group col-md-4">
    <p>
      {{ __('forms.resources') }}
    </p>
    <h5 class="margin-top-sm-min">
      <b>
        @if( $recerca->recursos )
          {{ $recerca->recursos }}
        @else
          --
        @endif
      </b>
    </h5>
  </div>
  <!-- Resources - CLOSE  -->

  <!-- Localization datetime - OPEN -->
  <div class="form-group col-md-4">
    <p>
      {{ __('forms.localization_date') }}
    </p>
    <h5 class="margin-top-sm-min">
      <b>
        @if( $recerca->data_localitzacio )
          @php
          $date = new Date($recerca->data_localitzacio);
          echo $date->format('H:i | d F Y');
          @endphp
        @else
          --
        @endif
      </b>
    </h5>
  </div>
  <!-- Localization datetime - CLOSE -->

  <!-- Localization toponim - OPEN  -->
  <div class="form-group col-md-4">
    <p>
      {{ __('forms.localization_toponim') }}
    </p>
    <h5 class="margin-top-sm-min">
      <b>
        @if( $recerca->toponim_localitzacio )
          {{ $recerca->toponim_localitzacio }}
        @else
          --
        @endif
      </b>
    </h5>
  </div>
  <!-- Localization toponim - CLOSE  -->

  <!-- Localization indret - OPEN  -->
  <div class="form-group col-md-4">
    <p>
      {{ __('forms.localization_indret') }}
    </p>
    <h5 class="margin-top-sm-min">
      <b>
        @if( $recerca->indret_localitzacio )
          {{ $recerca->indret_localitzacio }}
        @else
          --
        @endif
      </b>
    </h5>
  </div>
  <!-- Localization indret - CLOSE  -->

  <!-- Localization municipal term - OPEN  -->
  <div class="form-group col-md-4">
    <p>
      {{ __('forms.localization_municipal_term') }}
    </p>
    <h5 class="margin-top-sm-min">
      <b>
        @if( $recerca->terme_municipal_localitzacio )
          {{ $recerca->terme_municipal_localitzacio }}
        @else
          --
        @endif
      </b>
    </h5>
  </div>
  <!-- Localization municipal term - CLOSE  -->

  <!-- Localization COE - OPEN  -->
  <div class="form-group col-md-4">
    <p>
      {{ __('forms.coe') }}
    </p>
    <h5 class="margin-top-sm-min">
      <b>
        @if( $recerca->tall_coe_localitzacio )
          {{ $recerca->tall_coe_localitzacio }}
        @else
          --
        @endif
      </b>
    </h5>
  </div>
  <!-- Localization COE - CLOSE  -->

  <!-- Localization SOC - OPEN  -->
  <div class="form-group col-md-4">
    <p>
      {{ __('forms.soc') }}
    </p>
    <h5 class="margin-top-sm-min">
      <b>
        @if( $recerca->soc_localitzacio )
          {{ $recerca->soc_localitzacio }}
        @else
          --
        @endif
      </b>
    </h5>
  </div>
  <!-- Localization SOC - CLOSE  -->

  <!-- Localization section - OPEN  -->
  <div class="form-group col-md-4">
    <p>
      {{ __('forms.section') }}
    </p>
    <h5 class="margin-top-sm-min">
      <b>
        @if( $recerca->seccio_localitzacio )
          {{ $recerca->seccio_localitzacio }}
        @else
          --
        @endif
      </b>
    </h5>
  </div>
  <!-- Localization section - CLOSE  -->

  <!-- Localization UTM X - OPEN  -->
  <div class="form-group col-md-2">
    <p>
      {{ __('forms.utm_x') }}
    </p>
    <h5 class="margin-top-sm-min">
      <b>
        @if( $recerca->utm_x_localitzacio )
          {{ $recerca->utm_x_localitzacio }}
        @else
          --
        @endif
      </b>
    </h5>
  </div>
  <!-- Localization UTM X - CLOSE  -->

  <!-- Localization UTM Y - OPEN  -->
  <div class="form-group col-md-2">
    <p>
      {{ __('forms.utm_y') }}
    </p>
    <h5 class="margin-top-sm-min">
      <b>
        @if( $recerca->utm_y_localitzacio )
          {{ $recerca->utm_y_localitzacio }}
        @else
          --
        @endif
      </b>
    </h5>
  </div>
  <!-- Localization UTM Y - CLOSE  -->

  <!-- Localization distance from UPA - OPEN  -->
  <div class="form-group col-md-4">
    <p>
      {{ __('forms.distance_upa') }}
    </p>
    <h5 class="margin-top-sm-min">
      <b>
        @if( $recerca->distancia_upa_localitzacio )
          {{ $recerca->distancia_upa_localitzacio }}
        @else
          --
        @endif
      </b>
    </h5>
  </div>
  <!-- Localization distance from UPA - CLOSE  -->

  <!-- Localization who does it - OPEN  -->
  <div class="form-group col-md-4">
    <p>
      {{ __('forms.who_localizate') }}
    </p>
    <h5 class="margin-top-sm-min">
      <b>
        @if( $recerca->qui_fa_localitzacio )
          {{ $recerca->qui_fa_localitzacio }}
        @else
          --
        @endif
      </b>
    </h5>
  </div>
  <!-- Localization who does it - CLOSE  -->

  <!-- State lost people - OPEN  -->
  <div class="form-group col-md-6">
    <p>
      {{ __('forms.lost_people_state') }}
    </p>
    <h5 class="margin-top-sm-min">
      <b>
        @if( $recerca->estat_troben )
          {{ $recerca->estat_troben }}
        @else
          --
        @endif
      </b>
    </h5>
  </div>
  <!-- State lost people - CLOSE  -->

  <!-- Motive closing - OPEN  -->
  <div class="form-group col-md-6">
    <p>
      {{ __('forms.motive_closing') }}
    </p>
    <h5 class="margin-top-sm-min">
      <b>
        @if( $recerca->motiu_finalitzacio )
          {{ $recerca->motiu_finalitzacio }}
        @else
          --
        @endif
      </b>
    </h5>
  </div>
  <!-- Motive closing - CLOSE  -->

</div>
<!-- Content - CLOSE -->
