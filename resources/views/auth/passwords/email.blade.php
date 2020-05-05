@extends('layouts.app')

@section('content')

    <!-- Alerts - OPEN -->
    @include('parts.alerts')
    <!-- Alerts - CLOSE -->

    <!-- Content -->
    <div class="container margin-top padding-bottom">
        <div class="row justify-content-center margin-bottom-lg">
            <div class="col-md-6">

                <!-- Card - OPEN -->
                <div class="card shadow">

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
                            <div class="form-group">

                                <!-- Email label - OPEN -->
                                <label for="email" class="col-form-label">
                                    {{ __('login.email') }}
                                </label>
                                <!-- Email label - CLOSE -->

                                <!-- Email input - OPEN -->
                                <input id="email" type="email" name="email" value="{{ old('email') }}"
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autofocus>
                                <!-- Email input - CLOSE -->

                                <!-- Show errors input - OPEN -->
                                @if( $errors->has('email') )
                                    <span class="invalid-feedback" role="alert">
                                        <strong> {{ $errors->first('email') }} </strong>
                                    </span>
                                @endif
                                <!-- Show errors input - CLOSE -->

                            </div>
                            <!-- Email - CLOSE -->

                            <!-- Send link button - OPEN -->
                            <div class="form-group margin-top">
                                <!-- Button - OPEN -->
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('notifications.send_link') }}
                                </button>
                                <!-- Button - CLOSE -->
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
