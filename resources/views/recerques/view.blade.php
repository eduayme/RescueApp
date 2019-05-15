@extends('layouts.app_secondary')

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

    <!-- Top buttons - OPEN -->
    <div class="row">

      <!-- Align left - OPEN -->
      <div class="col justify-content-start">

        <!-- Add lost person - OPEN -->
        <button class="btn btn-outline-primary" type="button" name="add">
          {{ __('actions.add_lost_person') }}
        </button>
        <!-- Add lost person - CLOSE -->

      </div>
      <!-- Align left - CLOSE -->

      <!-- Align right - OPEN -->
      <div class="col text-right">

        <!-- Edit search - OPEN -->
        <a href="{{ URL::to('recerques/' . $recerca->id . '/edit') }}"
        class="btn btn-outline-secondary margin-right" role="button"
        data-toggle="tooltip" data-placement="top" title="{{ __('actions.edit') }}">
          <span class="octicon octicon-pencil"></span>
        </a>
        <!-- Edit search - CLOSE -->

        <!-- Delete search - OPEN -->
        <form action="{{ route('recerques.destroy', $recerca->id) }}" method="post" style="display: inline;">
        @csrf
        @method('DELETE')
          <button class="btn btn-outline-danger margin-left" type="submit"
          data-toggle="tooltip" data-placement="top" title="{{ __('actions.delete') }}">
            <span class="octicon octicon-trashcan"></span>
          </button>
        </form>
        <!-- Delete search - CLOSE -->

      </div>
      <!-- Align right - CLOSE -->

    </div>
    <!-- Top buttons - CLOSE -->

  </div>
  <!-- Content - CLOSE -->

@endsection
