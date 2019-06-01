<!-- Top buttons - OPEN -->
<div class="row">

  <!-- Align left - OPEN -->
  <div class="col justify-content-start">

    <!-- Add lost person - OPEN -->
    <form action="/desapareguts/create" method="put" style="display: inline">
    @csrf
        <input type="hidden" class="form-control" name="id_recerca" value={{ $recerca->id }}>
        <button type="submit" class="btn btn-outline-primary margin-right
        <?php if ($recerca->estat == 'Tancada'){ ?> disabled <?php   } ?>"
        >
          {{ __('actions.add_lost_person') }}
        </button>
    </form>
    <!-- Add lost person - CLOSE -->

  </div>
  <!-- Align left - CLOSE -->

  <!-- Align right - OPEN -->
  <div class="col text-right">

    <!-- Edit search button - OPEN -->
    <a href="{{ URL::to('recerques/' . $recerca->id . '/edit') }}"
    role="button" class="btn btn-outline-secondary margin-right
    <?php if ($recerca->estat == 'Tancada'){ ?> disabled <?php   } ?>"
    data-toggle="tooltip" data-placement="top" title="{{ __('actions.edit') }}"
    >
      <span class="octicon octicon-pencil"></span>
    </a>
    <!-- Edit search button - CLOSE -->

    <!-- Delete search button- OPEN -->
    <span data-toggle="modal" href="#myModal">
      <button class="btn btn-outline-danger margin-left" href="#myModal"
      data-toggle="tooltip" data-placement="top" title="{{ __('actions.delete') }}">
        <span class="octicon octicon-trashcan"></span>
      </button>
    </span>
    <!-- Delete search button- CLOSE -->

    <!-- Delete search modal - OPEN -->
    <form action="{{ route('recerques.destroy', $recerca->id) }}" method="post" style="display: inline">
    @csrf
    @method('DELETE')

      <!-- Modal - OPEN -->
      <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-confirm">

          <!-- Modal content - OPEN -->
          <div class="modal-content">

            <!-- Modal header - OPEN -->
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                &times;
              </button>
            </div>
            <!-- Modal header - CLOSE -->

            <!-- Modal body - OPEN -->
            <div class="modal-body text-center">
              <h4>
                {{ __('messages.are_you_sure') }}
              </h4>
            </div>
            <!-- Modal body - CLOSE -->

            <!-- Modal footer - OPEN -->
            <div class="modal-footer">
              <a class="btn btn-light" data-dismiss="modal">
                {{ __('actions.cancel') }}
              </a>
              <button type="submit" class="btn btn-danger">
                {{ __('actions.delete') }}
              </button>
            </div>
            <!-- Modal footer - CLOSE -->

          </div>
          <!-- Modal content - CLOSE -->

        </div>
      </div>
      <!-- Modal - CLOSE -->

    </form>
    <!-- Delete search - CLOSE -->

  </div>
  <!-- Align right - CLOSE -->

</div>
<!-- Top buttons - CLOSE -->

<!-- Type service title - OPEN -->
<h3 class="margin-top">
@if( $recerca->es_practica == 0 )
    {{ __('main.search') }}
@else
    {{ __('main.practice') }}
@endif
</h3>
<!-- Type service title - CLOSE -->

<!-- Info search - OPEN -->
<div class="row margin-top-sm">

  <!-- First column - OPEN -->
  <div class="col-sm-2">

    <!-- ID search - OPEN -->
    <p>
      {{ __('forms.num_actuacio') }}:
    </p>
    <h5 class="margin-top-sm-min">
      <b> {{ $recerca->num_actuacio }} </b>
    </h5>
    <!-- ID search - CLOSE -->

    <!-- State search - OPEN -->
    <p class="margin-top-sm">
      {{ __('forms.estat') }}:
    </p>
    <h4 class="margin-top-sm-min">
      @if( $recerca->estat == 'Oberta' )
          <span class="badge badge-danger">
      @elseif( $recerca->estat == 'Tancada' )
          <span class="badge badge-success">
      @endif
              {{ $recerca->estat }}
          </span>
    </h4>
    <!-- State search - CLOSE -->

  </div>
  <!-- First column - OPEN -->

  <!-- Second column - OPEN -->
  <div class="col-sm-5">

    <!-- Creator search - OPEN -->
    <p>
      {{ __('forms.creator') }}:
    </p>
    <div class="margin-top-sm-min">
      <h5 style="display: inline">
        <b> {{ $recerca->user_creator->name }} </b>
      </h5>
      <h6 style="display: inline">
        <b> ({{ $recerca->user_creator->dni }}),
          @php
            $date = new Date($recerca->data_creacio);
            echo $date->format('H:i | d F Y');
          @endphp
        </b>
      </h6>
    </div>
    <!-- Creator search - CLOSE -->

    <!-- Date begin search - OPEN -->
    <p class="margin-top-sm">
      {{ __('forms.begin') }}:
    </p>
    <h5 class="margin-top-sm-min">
      <b>
        @if( $recerca->data_inici == NULL )
          --
        @else
          @php
            $date = new Date($recerca->data_inici);
            echo $date->format('H:i | d F Y');
          @endphp
        @endif
      </b>
    </h5>
    <!-- Date begin search - CLOSE -->

  </div>
  <!-- Second column - OPEN -->

  <!-- Third column - OPEN -->
  <div class="col-sm-5">

    <!-- Last modificator search - OPEN -->
    <p>
      {{ __('forms.last_modification') }}:
    </p>
    <div class="margin-top-sm-min">
      <h5 style="display: inline">
        <b> {{ $recerca->user_last_modification->name }} </b>
      </h5>
      <h6 style="display: inline">
        <b> ({{ $recerca->user_last_modification->dni }}),
          @php
            $date = new Date($recerca->data_ultima_modificacio);
            echo $date->format('H:i | d F Y');
          @endphp
        </b>
      </h6>
    </div>
    <!-- Last modificator search - OPEN -->

    <!-- Date begin search - OPEN -->
    <p class="margin-top-sm">
      {{ __('forms.end') }}:
    </p>
    <h5 class="margin-top-sm-min">
      <b>
        @if( $recerca->data_tancament == NULL )
          --
        @else
          @php
            $date = new Date($recerca->data_tancament);
            echo $date->format('H:i | d F Y');
          @endphp
        @endif
      </b>
    </h5>
    <!-- Date begin search - CLOSE -->

  </div>
  <!-- Third column - OPEN -->

</div>
<!-- Info search - CLOSE -->

<!-- Description container - OPEN -->
<div class="container container-fluid border border-secondary rounded margin_top_bottom margin-top box text-center">
  <div class="row">

     <!-- Description title - OPEN -->
     <div class="col-md-3 abs-center border-right border-secondary pad">
         <h3> <b> {{ __('forms.incident') }} </b> </h3>
     </div>
     <!-- Description title - CLOSE -->

     <!-- Description content - OPEN -->
     <div class="col-md-9 abs-center block pad">

        <div class="row">

            <div class="col-md-12 margin-top-sm-sm">

                <!-- Incident - OPEN -->
                @if( $recerca->descripcio_incident )

                  <p> {{ $recerca->descripcio_incident }} </p>

                @endif
                <!-- Incident - CLOSE -->

            </div>

            <div class="col-md-4 margin-top-sm-sm">

                <!-- Village UPA - OPEN -->
                @if( $recerca->municipi_upa )

                  <p data-toggle="tooltip" data-placement="top" title="{{ __('forms.village_upa') }}">
                    <span class="octicon octicon-location"></span>
                    {{ $recerca->municipi_upa }}
                  </p>

                @endif
                <!-- Village UPA - CLOSE -->

            </div>

            <div class="col-md-8 margin-top-sm-sm">

                <!-- Incident zone - OPEN -->
                @if( $recerca->zona_incident )

                  <p data-toggle="tooltip" data-placement="top" title="{{ __('forms.incident_zone') }}">
                    <span class="octicon octicon-stop"></span>
                    {{ $recerca->zona_incident }}
                  </p>

                @endif
                <!-- Incident zone - CLOSE -->

            </div>

            <div class="col-md-4 margin-top-sm-sm">

                <!-- Date UPA - OPEN -->
                @if( $recerca->data_upa )

                  <p data-toggle="tooltip" data-placement="top" title="{{ __('forms.date_upa') }}">
                    <span class="octicon octicon-clock"></span>
                    @php
                      $date = new Date($recerca->data_upa);
                      echo $date->format('H:i | d F Y');
                    @endphp
                  </p>

                @endif
                <!-- Date UPA - CLOSE -->

            </div>

            <div class="col-md-8 margin-top-sm-sm">

                <!-- Possible route - OPEN -->
                @if( $recerca->possible_ruta )

                  <p data-toggle="tooltip" data-placement="top" title="{{ __('forms.possible_route') }}">
                    <span class="octicon octicon-info"></span>
                    {{ $recerca->possible_ruta }}
                  </p>

                @endif
                <!-- Possible route - CLOSE -->

            </div>

        </div>

     </div>
     <!-- Description content - CLOSE -->

  </div>
</div>
<!-- Description container - CLOSE -->

<!-- Lost people container - OPEN -->
<div class="container border border-secondary rounded margin_top_bottom margin-top-sm box text-center">
  <div class="row">

     <!-- Description title - OPEN -->
     <div class="col-md-3 abs-center border-right border-secondary pad">
         <h3>
           <b>
             {{ __('forms.lost_people') }}
             @if( $recerca->numero_desapareguts )
             ({{ $recerca->numero_desapareguts }})
             @endif
           </b>
         </h3>
     </div>
     <!-- Description title - CLOSE -->

     <!-- Description content - OPEN -->
     <div class="col-md-9 abs-center pad margin-auto">

     </div>
     <!-- Description content - CLOSE -->

  </div>
</div>
<!-- Lost people container - CLOSE -->

<!-- State container - OPEN -->
@if( $recerca->estat_desapareguts )
<div class="container border border-secondary rounded margin_top_bottom margin-top-sm box text-center">
  <div class="row">

     <!-- Description title - OPEN -->
     <div class="col-md-3 abs-center border-right border-secondary pad">
         <h3> <b> {{ __('forms.estat') }} </b> </h3>
     </div>
     <!-- Description title - CLOSE -->

     <!-- Description content - OPEN -->
     <div class="col-md-9 abs-center pad margin-auto">
       {{ $recerca->estat_desapareguts }}
     </div>
     <!-- Description content - CLOSE -->

  </div>
</div>
@endif
<!-- State container - CLOSE -->

<!-- Equipment and experience container - OPEN -->
@if( $recerca->coneix_zona !== NULL || $recerca->experiencia_activitat !== NULL ||
     $recerca->porta_aigua !== NULL || $recerca->porta_menjar !== NULL ||
     $recerca->medicament_necessari !== NULL || $recerca->porta_llum !== NULL ||
     $recerca->roba_abric !== NULL || $recerca->porta_impermeable !== NULL )
<div class="container border border-secondary rounded margin_top_bottom margin-top-sm box text-center">
  <div class="row">

     <!-- Description title - OPEN -->
     <div class="col-md-3 abs-center border-right border-secondary pad">
         <h3> <b> {{ __('forms.equipment_and_experience') }} </b> </h3>
     </div>
     <!-- Description title - CLOSE -->

     <!-- Description content - OPEN -->
     <div class="col-md-9 pad margin-auto">

        <div class="row">

           <!-- Knows the zone - OPEN -->
           @if( $recerca->coneix_zona !== NULL )

             <div class="col-md-3 margin-top-sm-sm">

               @if( $recerca->coneix_zona == 1 )
                 <p> {{ __('forms.knows_the_zone') }} </p>

               @else
                 <p> {{ __('forms.not_knows_the_zone') }} </p>

               @endif

           </div>

           @endif
           <!-- Knows the zone - CLOSE -->

           <!-- Experience with the activity - OPEN -->
           @if( $recerca->experiencia_activitat !== NULL )

              <div class="col-md-3 margin-top-sm-sm">

                @if( $recerca->experiencia_activitat == 1 )
                 <p> {{ __('forms.experience_with_activity') }} </p>

                @else
                 <p> {{ __('forms.not_experience_with_activity') }} </p>

                @endif

              </div>

           @endif
           <!-- Experience with the activity - CLOSE -->

           <!-- Brings water - OPEN -->
           @if( $recerca->porta_aigua !== NULL )

              <div class="col-md-3 margin-top-sm-sm">

                 @if( $recerca->porta_aigua == 1 )
                   <p> {{ __('forms.brings_water') }} </p>

                 @else
                   <p> {{ __('forms.not_brings_water') }} </p>

                 @endif

              </div>

           @endif
           <!-- Brings water - CLOSE -->

           <!-- Brings food - OPEN -->
           @if( $recerca->porta_menjar !== NULL )

              <div class="col-md-3 margin-top-sm-sm">

                 @if( $recerca->porta_menjar == 1 )
                   <p> {{ __('forms.brings_food') }} </p>

                 @else
                   <p> {{ __('forms.not_brings_food') }} </p>

                 @endif

              </div>

           @endif
           <!-- Brings food - CLOSE -->

           <!-- Brings medication - OPEN -->
           @if( $recerca->medicament_necessari !== NULL )

              <div class="col-md-3 margin-top-sm-sm">

                 @if( $recerca->medicament_necessari == 1 )
                   <p> {{ __('forms.brings_medication') }} </p>

                 @else
                   <p> {{ __('forms.not_brings_medication') }} </p>

                 @endif

              </div>

           @endif
           <!-- Brings medication - CLOSE -->

           <!-- Brings light - OPEN -->
           @if( $recerca->porta_llum !== NULL )

              <div class="col-md-3 margin-top-sm-sm">

                 @if( $recerca->porta_llum == 1 )
                   <p> {{ __('forms.brings_light') }} </p>

                 @else
                   <p> {{ __('forms.not_brings_light') }} </p>

                 @endif

              </div>

           @endif
           <!-- Brings light - CLOSE -->

           <!-- Brings cold clothes - OPEN -->
           @if( $recerca->roba_abric !== NULL )

              <div class="col-md-3 margin-top-sm-sm">

                 @if( $recerca->roba_abric == 1 )
                   <p> {{ __('forms.brings_cold_clothes') }} </p>

                 @else
                   <p> {{ __('forms.not_brings_cold_clothes') }} </p>

                 @endif

              </div>

           @endif
           <!-- Brings cold clothes - CLOSE -->

           <!-- Brings waterproof clothes - OPEN -->
           @if( $recerca->roba_impermeable !== NULL )

              <div class="col-md-3 margin-top-sm-sm">

                 @if( $recerca->roba_impermeable == 1 )
                   <p> {{ __('forms.brings_waterproof_clothes') }} </p>

                 @else
                   <p> {{ __('forms.not_brings_waterproof_clothes') }} </p>

                 @endif

              </div>

           @endif
           <!-- Brings waterproof clothes - CLOSE -->

       </div>

     </div>
     <!-- Description content - CLOSE -->

  </div>
</div>
@endif
<!-- Equipment and experience container - CLOSE -->

<!-- Contact person container - OPEN -->
@if( $recerca->nom_persona_contacte || $recerca->telefon_persona_contacte || $recerca->afinitat_persona_contacte )
<div class="container border border-secondary rounded margin_top_bottom margin-top-sm box text-center">
  <div class="row">

     <!-- Description title - OPEN -->
     <div class="col-md-3 abs-center border-right border-secondary pad">
         <h3> <b> {{ __('forms.contact_person') }} </b> </h3>
     </div>
     <!-- Description title - CLOSE -->

     <!-- Description content - OPEN -->
     <div class="col-md-9 pad margin-auto">

        <div class="row">

          <!-- Name - OPEN -->
          @if( $recerca->nom_persona_contacte )

             <div class="col-md-4 margin-top-sm-sm">
                <p data-toggle="tooltip" data-placement="top" title="{{ __('register.name') }}">
                  {{ $recerca->nom_persona_contacte }}
                </p>
             </div>

          @endif
          <!-- Name - CLOSE -->

          <!-- Phone number - OPEN -->
          @if( $recerca->telefon_persona_contacte )

             <div class="col-md-4 margin-top-sm-sm">
                <p data-toggle="tooltip" data-placement="top" title="{{ __('forms.phone') }}">
                  <span class="octicon octicon-device-mobile"></span>
                  {{ $recerca->telefon_persona_contacte }}
                </p>
             </div>

          @endif
          <!-- Phone number - CLOSE -->

          <!-- Affinity - OPEN -->
          @if( $recerca->afinitat_persona_contacte )

             <div class="col-md-4 margin-top-sm-sm">
                <p data-toggle="tooltip" data-placement="top" title="{{ __('forms.affinity') }}">
                  <span class="octicon octicon-organization"></span>
                  {{ $recerca->afinitat_persona_contacte }}
                </p>
             </div>

          @endif
          <!-- Affinity - CLOSE -->

        </div>

     </div>
     <!-- Description content - CLOSE -->

  </div>
</div>
@endif
<!-- Contact person container - CLOSE -->

<!-- Alertant person container - OPEN -->
@if( $recerca->es_desaparegut || $recerca->es_contacte || $recerca->nom_alertant ||
     $recerca->edat_alertant || $recerca->telefon_alertant || $recerca->adreca_alertant )
<div class="container border border-secondary rounded margin_top_bottom margin-top-sm box text-center">
  <div class="row">

     <!-- Description title - OPEN -->
     <div class="col-md-3 abs-center border-right border-secondary pad">
         <h3> <b> {{ __('forms.alertant') }} </b> </h3>
     </div>
     <!-- Description title - CLOSE -->

     <!-- Description content - OPEN -->
     <div class="col-md-9 pad margin-auto">

        <div class="row">

          <!-- Name - OPEN -->
          @if( $recerca->nom_alertant )

             <div class="col-md-4 margin-top-sm-sm">
                <p data-toggle="tooltip" data-placement="top" title="{{ __('register.name') }}">
                  {{ $recerca->nom_alertant }}
                </p>
             </div>

          @endif
          <!-- Name - CLOSE -->

          <!-- Is the lost person - OPEN -->
          @if( $recerca->es_desaparegut !== NULL )

             <div class="col-md-3 margin-top-sm-sm">

                @if( $recerca->es_desaparegut == 1 )
                  <p> {{ __('forms.is_the_lost_person') }} </p>

                @else
                  <p> {{ __('forms.not_is_the_lost_person') }} </p>

                @endif

             </div>

          @endif
          <!-- Is the lost person - CLOSE -->

          <!-- Is the contact person - OPEN -->
          @if( $recerca->es_contacte !== NULL )

             <div class="col-md-3 margin-top-sm-sm">

                @if( $recerca->es_contacte == 1 )
                  <p> {{ __('forms.is_the_contact_person') }} </p>

                @else
                  <p> {{ __('forms.not_is_the_contact_person') }} </p>

                @endif

             </div>

          @endif
          <!-- Is the contact person - CLOSE -->

          <!-- Age - OPEN -->
          @if( $recerca->edat_alertant )

             <div class="col-md-4 margin-top-sm-sm">
                <p data-toggle="tooltip" data-placement="top" title="{{ __('register.age') }}">
                  {{ $recerca->edat_alertant }} anys
                </p>
             </div>

          @endif
          <!-- Age - CLOSE -->

          <!-- Phone number - OPEN -->
          @if( $recerca->telefon_alertant )

             <div class="col-md-4 margin-top-sm-sm">
                <p data-toggle="tooltip" data-placement="top" title="{{ __('forms.phone') }}">
                  <span class="octicon octicon-device-mobile"></span>
                  {{ $recerca->telefon_alertant }}
                </p>
             </div>

          @endif
          <!-- Phone number - CLOSE -->

          <!-- Address - OPEN -->
          @if( $recerca->address )

             <div class="col-md-4 margin-top-sm-sm">
                <p data-toggle="tooltip" data-placement="top" title="{{ __('forms.address') }}">
                  {{ $recerca->address }}
                </p>
             </div>

          @endif
          <!-- Address - CLOSE -->

        </div>

     </div>
     <!-- Description content - CLOSE -->

  </div>
</div>
@endif
<!-- Alertant person container - CLOSE -->
