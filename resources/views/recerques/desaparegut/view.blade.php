@extends('layouts.app_secondary')

@section('title', $desaparegut->nom)

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
                <a href="{{ URL::to('recerques/' . $recerca->id) }}"
                    role="button" class="btn btn-outline-secondary margin-right"
                    data-toggle="tooltip" data-placement="top" title="{{ __('actions.go_back') }}"
                    >
                    <span class="octicon octicon-arrow-left"></span>
                </a>
                <!-- Go back - CLOSE -->

            </div>
            <!-- Align left - CLOSE -->

            <!-- Align right - OPEN -->
            <div class="col text-right">

                <!-- Edit search button - OPEN -->
                <a href="{{ URL::to(Request::path().'/edit') }}"
                    role="button" class="btn btn-outline-secondary margin-right"
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
                <form action="{{ route('desapareguts.destroy', $desaparegut->id) }}" method="post">
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

        <!-- Name title - OPEN -->
        <h1 class="margin-top">
            {{ $desaparegut->nom }}
            @if( $desaparegut->trobat == 0 )
                <span style="font-size: 20px" class="badge badge-danger">
                    {{ __('main.lost') }}
            @elseif( $desaparegut->trobat == 1 )
                <span style="font-size: 20px" class="badge badge-success">
                    {{ __('main.found') }}
            @endif
            </span>
        </h1>
        <!-- Name title - CLOSE -->

        <!-- Lost person info - OPEN -->
        <div class="form-row">

            <div class="form-group col-md-6">

                <!-- User photo - OPEN -->
                <div class="row justify-content-md-center image-upload justify-content-center">
                    <img src="/uploads/lost_people_photos/{{ $desaparegut->photo }}" class="photo mx-auto d-block rounded">
                </div>
                <!-- User photo - CLOSE -->

            </div>

            <div class="form-group col-md-6">

                <div class="form-row margin-top">

                    <!-- Name - OPEN  -->
                    <div class="form-group col-md-12">
                        <p>
                            {{ __('register.name') }}
                        </p>
                        <h5 class="margin-top-sm-min">
                            <b> {{ $desaparegut->nom }} </b>
                        </h5>
                    </div>
                    <!-- Name - CLOSE  -->

                    <!-- Name respond - OPEN  -->
                    <div class="form-group col-md-6">
                        <p>
                          {{ __('forms.name_respond') }}
                        </p>
                        <h5 class="margin-top-sm-min">
                          <b>
                            @if( $desaparegut->nom_respon )
                              {{ $desaparegut->nom_respon }}
                            @else
                              --
                            @endif
                          </b>
                        </h5>
                    </div>
                    <!-- Name respond - CLOSE  -->

                    <!-- Age - OPEN  -->
                    <div class="form-group col-md-6">
                        <p>
                          {{ __('forms.age') }}
                        </p>
                        <h5 class="margin-top-sm-min">
                          <b>
                            @if( $desaparegut->edat )
                              {{ $desaparegut->edat }}
                            @else
                              --
                            @endif
                          </b>
                        </h5>
                    </div>
                    <!-- Age - CLOSE  -->

                    <!-- Phone - OPEN  -->
                    <div class="form-group col-md-6">
                        <p>
                          {{ __('forms.phone') }}
                        </p>
                        <h5 class="margin-top-sm-min">
                          <b>
                            @if( $desaparegut->telefon )
                              {{ $desaparegut->telefon }}
                            @else
                              --
                            @endif
                          </b>
                        </h5>
                    </div>
                    <!-- Phone - CLOSE  -->

                    <!-- Has whatsapp or gps - OPEN  -->
                    <div class="form-group col-md-6">
                      <p>
                        {{ __('forms.whatsapp_or_gps') }}
                      </p>
                      <h5 class="margin-top-sm-min">
                        <b>
                          @if( $desaparegut->whatsapp_o_gps !== NULL )
                            @if( $desaparegut->whatsapp_o_gps == 1 )
                                Si
                            @else
                                No
                            @endif
                          @else
                            --
                          @endif
                        </b>
                      </h5>
                    </div>
                    <!-- Has whatsapp or gps - CLOSE  -->

                    <!-- Profile - OPEN  -->
                    <div class="form-group col-md-12">
                        <p>
                          {{ __('register.profile') }}
                        </p>
                        <h5 class="margin-top-sm-min">
                          <b>
                            @if( $desaparegut->profile )
                              {{ $desaparegut->profile }}
                            @else
                              --
                            @endif
                          </b>
                        </h5>
                    </div>
                    <!-- Profile - CLOSE  -->

                </div>

                </div>

                </div>

                <div class="form-row">

            <!-- Aspect description - OPEN  -->
            <div class="form-group col-md-6">
                <p>
                  {{ __('forms.aspect_description') }}
                </p>
                <h5 class="margin-top-sm-min">
                  <b>
                    @if( $desaparegut->descripcio_fisica )
                      {{ $desaparegut->descripcio_fisica }}
                    @else
                      --
                    @endif
                  </b>
                </h5>
            </div>
            <!--  Aspect description - CLOSE  -->

            <!-- Clothes - OPEN  -->
            <div class="form-group col-md-6">
                <p>
                  {{ __('forms.clothes') }}
                </p>
                <h5 class="margin-top-sm-min">
                  <b>
                    @if( $desaparegut->roba )
                      {{ $desaparegut->roba }}
                    @else
                      --
                    @endif
                  </b>
                </h5>
            </div>
            <!-- Clothes - CLOSE  -->

            <!-- Phisic form - OPEN  -->
            <div class="form-group col-md-6">
                <p>
                  {{ __('forms.phisic_form') }}
                </p>
                <h5 class="margin-top-sm-min">
                  <b>
                    @if( $desaparegut->forma_fisica )
                      {{ $desaparegut->forma_fisica }}
                    @else
                      --
                    @endif
                  </b>
                </h5>
            </div>
            <!-- Phisic form - CLOSE  -->

            <!-- Diseases or injuries - OPEN  -->
            <div class="form-group col-md-6">
                <p>
                  {{ __('forms.diseases_or_injuries') }}
                </p>
                <h5 class="margin-top-sm-min">
                  <b>
                    @if( $desaparegut->malalties_o_lesions )
                      {{ $desaparegut->malalties_o_lesions }}
                    @else
                      --
                    @endif
                  </b>
                </h5>
            </div>
            <!-- Diseases or injuries - CLOSE  -->

            <!-- Medication - OPEN  -->
            <div class="form-group col-md-6">
                <p>
                  {{ __('forms.medication') }}
                </p>
                <h5 class="margin-top-sm-min">
                  <b>
                    @if( $desaparegut->medicacio )
                      {{ $desaparegut->medicacio }}
                    @else
                      --
                    @endif
                  </b>
                </h5>
            </div>
            <!-- Medication - CLOSE  -->

            <!-- Limitations or discapacities - OPEN  -->
            <div class="form-group col-md-6">
                <p>
                  {{ __('forms.limitations_or_discapacities') }}
                </p>
                <h5 class="margin-top-sm-min">
                  <b>
                    @if( $desaparegut->limitacio_o_discapacitat )
                      {{ $desaparegut->limitacio_o_discapacitat }}
                    @else
                      --
                    @endif
                  </b>
                </h5>
            </div>
            <!-- Limitations or discapacities - CLOSE  -->

            <!-- Others - OPEN  -->
            <div class="form-group col-md-12">
                <p>
                  {{ __('forms.other') }}
                </p>
                <h5 class="margin-top-sm-min">
                  <b>
                    @if( $desaparegut->altres )
                      {{ $desaparegut->altres }}
                    @else
                      --
                    @endif
                  </b>
                </h5>
            </div>
            <!-- Others - CLOSE  -->

            <!-- Vehicle title - OPEN -->
            <div class="form-group col-md-12" style="margin-bottom: 0">
                <h4 class="margin-top-sm">
                    {{ __('forms.vehicle') }}
                </h4>
            </div>
            <!-- Vehicle title - CLOSE -->

            <!-- Vehicle model and brand - OPEN  -->
            <div class="form-group col-md-6">
                <p>
                  {{ __('forms.model_and_brand') }}
                </p>
                <h5 class="margin-top-sm-min">
                  <b>
                    @if( $desaparegut->marca_model_vehicle )
                      {{ $desaparegut->marca_model_vehicle }}
                    @else
                      --
                    @endif
                  </b>
                </h5>
            </div>
            <!-- Vehicle model and brand - CLOSE  -->

            <!-- Vehicle color - OPEN  -->
            <div class="form-group col-md-3">
                <p>
                  {{ __('forms.color') }}
                </p>
                <h5 class="margin-top-sm-min">
                  <b>
                    @if( $desaparegut->color_vehicle )
                      {{ $desaparegut->color_vehicle }}
                    @else
                      --
                    @endif
                  </b>
                </h5>
            </div>
            <!-- Vehicle color - CLOSE  -->

            <!-- Vehicle license plate - OPEN  -->
            <div class="form-group col-md-3">
                <p>
                  {{ __('forms.license_plate') }}
                </p>
                <h5 class="margin-top-sm-min">
                  <b>
                    @if( $desaparegut->matricula_vehicle )
                      {{ $desaparegut->matricula_vehicle }}
                    @else
                      --
                    @endif
                  </b>
                </h5>
            </div>
            <!-- Vehicle license plate - CLOSE  -->

        </div>
        <!-- Lost person info - CLOSE -->

    </div>
    <!-- Content - CLOSE -->

@endsection
