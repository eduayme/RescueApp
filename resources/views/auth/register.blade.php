@extends('layouts.app')

@section('title', __('register.register'))

@section('content')

  <!-- Alerts - OPEN -->

  <!-- Success - OPEN -->
  @if( session('success') )
    <div class="alert alert-success" role="alert">
      <div class="container text-center">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          {{ session('success') }}
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
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">

            <!-- Card - OPEN -->
            <div class="card">

                <!-- Card header - OPEN -->
                <div class="card-header">
                  {{ __('register.register') }}
                </div>
                <!-- Card header - CLOSE -->

                <!-- Card body - OPEN -->
                <div class="card-body">

                    <!-- Form register - OPEN -->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name - OPEN -->
                        <div class="form-group row">

                            <!-- Name label - OPEN -->
                            <label for="name" class="col-md-4 col-form-label text-md-right">
                              {{ __('register.name') }}
                            </label>
                            <!-- Name label - CLOSE -->

                            <!-- Name input - OPEN -->
                            <div class="col-md-6">

                              <!-- Input - OPEN -->
                              <input id="name" type="text" name="name"
                              class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                              required autofocus>
                              <!-- Input - CLOSE -->

                              <!-- Show errors input - OPEN -->
                              @if( $errors->has('name') )
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('name') }}</strong>
                                </span>
                              @endif
                              <!-- Show errors input - CLOSE -->

                            </div>
                            <!-- Name input - CLOSE -->

                        </div>
                        <!-- Name - CLOSE -->

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
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                required autofocus>
                                <!-- Input - CLOSE -->

                                <!-- Show errors input - OPEN -->
                                @if( $errors->has('name') )
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                                @endif
                                <!-- Show errors input - CLOSE -->

                            </div>
                            <!-- Email input - CLOSE -->

                        </div>
                        <!-- Email - CLOSE -->

                        <!-- ID - OPEN-->
                        <div class="form-group row">

                          <!-- ID label - OPEN -->
                          <label for="DNI" class="col-md-4 col-form-label text-md-right">
                            {{ __('register.id') }}
                          </label>
                          <!-- ID label - CLOSE -->

                          <!-- ID input - OPEN -->
                          <div class="col-md-6">

                            <!-- Input - OPEN -->
                            <input id="dni" type="text" class="form-control" name="dni" required>
                            <!-- Input - CLOSE -->

                            <!-- Show errors input - OPEN -->
                            @if( $errors->has('dni') )
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('dni') }}</strong>
                              </span>
                            @endif
                            <!-- Show errors input - CLOSE -->

                          </div>
                          <!-- ID input - CLOSE -->

                        </div>
                        <!-- ID - CLOSE -->

                        <!-- Profile - OPEN -->
                        <div class="form-group row">

                            <!-- Profile label - OPEN -->
                            <label for="perfil" class="col-md-4 col-form-label text-md-right">
                              {{ __('register.profile') }}
                            </label>
                            <!-- Profile label - CLOSE -->

                            <!-- Profile Input - OPEN -->
                            <div class="col-md-6">

                                <!-- Dropdown selector - OPEN -->
                                <select id="perfil" class="form-control" name="perfil" required>
                                    <option value=""> {{ __('register.chose_profile') }} </option>
                                    <option value="bomber"> {{ __('register.firefighter') }} </option>
                                    <option value="operador"> {{ __('register.control_room_operator') }} </option>
                                    <option value="comandament"> {{ __('register.commander') }} </option>
                                    <option value="convidat"> {{ __('register.guest') }} </option>
                                </select>
                                <!-- Dropdown selector - CLOSE -->

                                <!-- Show errors input - OPEN -->
                                @if( $errors->has('perfil') )
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('perfil') }}</strong>
                                  </span>
                                @endif
                                <!-- Show errors input - CLOSE -->

                            </div>
                            <!-- Profile Input - CLOSE -->

                        </div>
                        <!-- Profile - CLOSE -->

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
                                    <strong>{{ $errors->first('password') }}</strong>
                                  </span>
                                @endif
                                <!-- Show errors input - CLOSE -->

                            </div>
                            <!-- Password - CLOSE -->

                        </div>
                        <!-- Password Input - CLOSE -->

                        <!-- Confirm password - OPEN -->
                        <div class="form-group row">

                            <!-- Confirm password label - OPEN -->
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">
                              {{ __('register.conf_pass') }}
                            </label>
                            <!-- Confirm password label - CLOSE -->

                            <!-- Confirm password input - OPEN -->
                            <div class="col-md-6">

                                <!-- Input - OPEN -->
                                <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required>
                                <!-- Input - CLOSE -->

                                <!-- Show errors input - OPEN -->
                                @if( $errors->has('password-confirm') )
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password-confirm') }}</strong>
                                  </span>
                                @endif
                                <!-- Show errors input - CLOSE -->

                            </div>
                            <!-- Confirm password input - CLOSE -->

                        </div>
                        <!-- Confirm password - CLOSE -->

                        <!-- Register button - OPEN -->
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">

                                <!-- Submit button - OPEN -->
                                <button type="submit" class="btn btn-primary">
                                    {{ __('register.register') }}
                                </button>
                                <!-- Submit button - CLOSE -->

                            </div>
                        </div>
                        <!-- Register button - CLOSE -->

                    </form>
                    <!-- Form register - CLOSE -->

                </div>
                <!-- Card body - CLOSE -->

            </div>
            <!-- Card - CLOSE -->

          </div>
      </div>
  </div>
  <!-- Content - CLOSE -->

@endsection
