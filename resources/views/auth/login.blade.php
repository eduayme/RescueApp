@extends('layouts.app')

@section('title', __('login.login'))

@section('content')

    <!-- Alerts - OPEN -->
    @include('parts.alerts')
    <!-- Alerts - CLOSE -->

    <!-- Content - OPEN -->
    <div class="container margin-top padding-bottom">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <!-- Card - OPEN -->
                <div class="card shadow">

                    <!-- Card header - OPEN -->
                    <div class="card-header">
                        {{ __('login.login') }}
                    </div>
                    <!-- Card header - CLOSE -->

                    <!-- Card body - OPEN -->
                    <div class="card-body">

                        <!-- Form login - OPEN -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email - OPEN -->
                            <div class="form-group">

                                <!-- Email label - OPEN -->
                                <label for="email" class="col-form-label text-md-right">
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

                            <!-- Password - OPEN -->
                            <div class="form-group">

                                <!-- Password label - OPEN -->
                                <label for="password" class="col-form-label text-md-right">
                                    {{ __('login.password') }}
                                </label>
                                <!-- Password label - CLOSE -->

                                <!-- Password input - OPEN -->
                                <input id="password" type="password" name="password"
                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required>
                                <!-- Password input - CLOSE -->

                                <!-- Show errors input - OPEN -->
                                @if( $errors->has('password') )
                                    <span class="invalid-feedback" role="alert">
                                        <strong> {{ $errors->first('password') }} </strong>
                                    </span>
                                @endif
                                <!-- Show errors input - CLOSE -->

                            </div>
                            <!-- Password - CLOSE -->

                            <!-- Remember me - OPEN -->
                            <div class="form-group form-check margin-top">

                                <!-- Remember me checkbox - OPEN -->
                                <input class="form-check-input" id="remember" type="checkbox"
                                name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <!-- Remember me checkbox - CLOSE -->

                                <!-- Remember me label - OPEN -->
                                <label class="form-check-label" for="remember">
                                    {{ __('login.remember') }}
                                </label>
                                <!-- Remember me label - CLOSE -->

                            </div>
                            <!-- Remember me - CLOSE -->

                            <!-- Login button - OPEN -->
                            <div class="form-group">
                                <!-- Button - OPEN -->
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('login.login') }}
                                </button>
                                <!-- Button - CLOSE -->
                            </div>
                            <!-- Login button - CLOSE -->

                            <!-- Recover password - OPEN -->
                            @if( Route::has('password.request') )
                                <div class="col text-center" style="margin-top: 20px">
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('login.forgot') }}
                                    </a>
                                </div>
                            @endif
                            <!-- Recover password - CLOSE -->

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
