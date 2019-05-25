@extends('layouts.app')

@section('title', __('login.login'))

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

  <!-- Content -->
  <div class="container margin-top">
      <div class="row justify-content-center">
          <div class="col-md-8">

              <!-- Card - OPEN -->
              <div class="card">

                  <!-- Card header - OPEN -->
                  <div class="card-header">
                    {{ __('notifications.reset_pas') }}
                  </div>
                  <!-- Card header - CLOSE -->

                  <!-- Card body - OPEN -->
                  <div class="card-body">

                      <!-- Form login - OPEN -->
                      <form method="POST" action="{{ route('password.update') }}">
                          @csrf

                          <input type="hidden" name="token" value="{{ $token }}">

                          <!-- Email - OPEN -->
                          <div class="form-group row">

                              <!-- Email label - OPEN -->
                              <label for="email" class="col-md-4 col-form-label text-md-right">
                                {{ __('login.email') }}
                              </label>
                              <!-- Email label - CLOSE -->

                              <!-- Email input - OPEN -->
                              <div class="col-md-6">

                                  <!-- Input - OPEN -->
                                  <input id="email" type="email" name="email" value="{{ old('email') }}"
                                  class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autofocus>
                                  <!-- Input - CLOSE -->

                                  <!-- Show errors input - OPEN -->
                                  @if( $errors->has('email') )
                                      <span class="invalid-feedback" role="alert">
                                          <strong> {{ $errors->first('email') }} </strong>
                                      </span>
                                  @endif
                                  <!-- Show errors input - CLOSE -->

                              </div>
                              <!-- Email input - CLOSE -->

                          </div>
                          <!-- Email - CLOSE -->

                          <!-- Password - OPEN -->
                          <div class="form-group row">

                              <!-- Password label - OPEN -->
                              <label for="password" class="col-md-4 col-form-label text-md-right">
                                {{ __('login.password') }}
                              </label>
                              <!-- Password label - CLOSE -->

                              <!-- Password input - OPEN -->
                              <div class="col-md-6">

                                  <!-- Input - OPEN -->
                                  <input id="password" type="password" name="password"
                                  class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required>
                                  <!-- Input - CLOSE -->

                                  <!-- Show errors input - OPEN -->
                                  @if( $errors->has('password') )
                                      <span class="invalid-feedback" role="alert">
                                          <strong> {{ $errors->first('password') }} </strong>
                                      </span>
                                  @endif
                                  <!-- Show errors input - CLOSE -->

                              </div>
                              <!-- Password input - CLOSE -->

                          </div>
                          <!-- Password - CLOSE -->

                          <!-- Confirm password - OPEN -->
                          <div class="form-group row">

                              <!-- Password label - OPEN -->
                              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">
                                {{ __('register.conf_pass') }}
                              </label>
                              <!-- Password label - CLOSE -->

                              <!-- Password input - OPEN -->
                              <div class="col-md-6">

                                  <!-- Input - OPEN -->
                                  <input id="password-confirm" type="password" name="password"
                                  class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required>
                                  <!-- Input - CLOSE -->

                                  <!-- Show errors input - OPEN -->
                                  @if( $errors->has('password-confirm') )
                                      <span class="invalid-feedback" role="alert">
                                          <strong> {{ $errors->first('password-confirm') }} </strong>
                                      </span>
                                  @endif
                                  <!-- Show errors input - CLOSE -->

                              </div>
                              <!-- Password input - CLOSE -->

                          </div>
                          <!-- Password - CLOSE -->

                          <!-- Login button - OPEN -->
                          <div class="form-group row mb-0">
                              <div class="col-md-8 offset-md-4">

                                  <!-- Button - OPEN -->
                                  <button type="submit" class="btn btn-primary">
                                      {{ __('notifications.reset_pas') }}
                                  </button>
                                  <!-- Button - CLOSE -->

                              </div>
                          </div>
                          <!-- Login button - CLOSE -->

                      </form>
                      <!-- Form login - CLOSE -->

                  </div>
                  <!-- Card body - CLOSE -->

              </div>
              <!-- Card - CLOSE -->

          </div>
      </div>
  </div>
  <!-- Content - CLOSE -->

@endsection
