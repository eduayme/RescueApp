@extends('layouts.app')

@section('title', __('main.profile'))

@section('content')

  <!-- Alerts - OPEN -->

  <!-- Success - OPEN -->
  @if( session('success') )
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <div class="container text-center">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          {{ session('success') }}
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

  <!-- Content - OPEN -->
  <div class="container margin-top">

        <img src="/uploads/avatars/{{ $user->avatar }}" class="profile">
        <h2> {{ $user->name }} </h2>
        <form enctype="multipart/form-data" actione="/profile" method="POST">
            <input type="file" name="avatar"> <br>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-primary margin-top">
              {{ __('actions.save') . ' ' . __('main.photo') }}
            </button>
        </form>
    </div>

  </div>
  <!-- Content - CLOSE -->

@endsection
