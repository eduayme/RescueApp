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

<!-- Content - OPEN -->
<div class="container margin-top">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- Card - OPEN -->
            <div class="card">

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

                        <!-- Remember me - OPEN -->
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">

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
                            </div>
                        </div>
                        <!-- Remember me - CLOSE -->

                        <!-- Login button - OPEN -->
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">

                                <!-- Button - OPEN -->
                                <button type="submit" class="btn btn-primary">
                                    {{ __('login.login') }}
                                </button>
                                <!-- Button - CLOSE -->

                            </div>
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
