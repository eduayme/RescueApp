@extends('layouts.app')

@section('title', __('main.searches'))

@section('content')

  <!-- Alerts - OPEN -->

  <!-- Success - OPEN -->
  @if( session('status') )
    <div class="alert alert-success" role="alert">
      <div class="container text-center">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          {{ session('status') }}
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

      <!-- Type activity, code and region - OPEN -->
      <div class="form-row">
          @csrf

          <!-- Search type activity - OPEN -->
          <div class="form-group funkyradio col-md-2">

            <h3 style="margin-bottom: -20px; margin-top: -10px;">
              {{ __('forms.type_service') }}
            </h3>

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
          <div class="form-group col-md-2"> </div>
          <!-- Empty space - CLOSE -->

          <!-- Activity number - OPEN  -->
          <div class="form-group col-md-6">
            <label for="num_actuacio"> {{ __('forms.num_actuacio') }} </label>
            <input type="text" class="form-control" name="num_actuacio"/>
          </div>
          <!-- Activity number - CLOSE  -->

      </div>
      <!-- Type activity, code and region - OPEN -->

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
      <div class="text-center">
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
