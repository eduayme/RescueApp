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

        <!-- Edit search button - OPEN -->
        <a href="{{ URL::to('recerques/' . $recerca->id . '/edit') }}"
        class="btn btn-outline-secondary margin-right" role="button"
        data-toggle="tooltip" data-placement="top" title="{{ __('actions.edit') }}">
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
        <form action="{{ route('recerques.destroy', $recerca->id) }}" method="post" style="display: inline;">
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

  </div>
  <!-- Content - CLOSE -->

@endsection
