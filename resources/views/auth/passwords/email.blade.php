@extends('layouts.app')

@section('content')

    <!-- Alerts - OPEN -->
    @include('parts.alerts')
    <!-- Alerts - CLOSE -->

    <!-- Content -->
    <div class="container margin-top padding-bottom">
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
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

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

                            <!-- Send link button - OPEN -->
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">

                                    <!-- Button - OPEN -->
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('notifications.send_link') }}
                                    </button>
                                    <!-- Button - CLOSE -->

                              </div>
                            </div>
                            <!-- Send link button - CLOSE -->

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
