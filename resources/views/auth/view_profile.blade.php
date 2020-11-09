@extends('layouts.app')

@section('title', $profile_user->name)

@section('content')

    <!-- Alerts - OPEN -->
    @include('parts.alerts')
    <!-- Alerts - CLOSE -->

    <!-- Content - OPEN -->
    <div class="container mb-5 mt-3 my-md-3">

        <!-- Go back button - OPEN -->
        @include('buttons.go_back')
        <!-- Go back button - CLOSE -->

        <!-- Profile user avatar - OPEN -->
        <div class="container pad-sm">
            <div class="row justify-content-md-center">
                <img src="/uploads/avatars/{{ $profile_user->avatar }}" class="rounded-circle" height="150" width="150">
            </div>
        </div>
        <!-- Profile user avatar - CLOSE -->

        <!-- Basic info user - OPEN -->
        <div class="container pad-sm">
            <div class="row justify-content-md-center">
                <div class="row margin-top-sm">
                    <div class="col-md-auto">
                        <div class="text-left">
                            {{ __('register.name') }}:
                        </div>
                        <h5>
                            {{ $profile_user->name }}
                        </h5>
                    </div>
                    <div class="col-md-auto">
                        <div class="text-left">
                            {{ __('login.email') }}:
                        </div>
                        <h5>
                            {{ $profile_user->email }}
                        </h5>
                    </div>
                    <div class="col-md-auto">
                        <div class="text-left">
                            {{ __('register.profile') }}:
                        </div>
                        <h5>
                            {{ __('register.' . $profile_user->profile) }}
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        <!-- Basic info user - CLOSE -->

        <!-- Advanced info user - CLOSE -->
        @if( Auth::user()->is_admin() )
            <div class="container pad-sm">
                <div class="row justify-content-md-center">
                    <div class="row margin-top-sm">
                        <div class="col-md-auto">
                            <div class="text-left">
                                {{ __('register.id') }}:
                            </div>
                            <h5>
                                {{ $profile_user->dni }}
                            </h5>
                        </div>
                        <div class="col-md-auto">
                            <div class="text-left">
                                {{ __('main.created_at') }}:
                            </div>
                            <h5>
                                @php
                                    $date = new Date($profile_user->created_at);
                                    echo $date->format('d M. Y | H:i');
                                @endphp
                            </h5>
                        </div>
                        <div class="col-md-auto">
                            <div class="text-left">
                                {{ __('main.updated_at') }}:
                            </div>
                            <h5>
                                @php
                                    $date = new Date($profile_user->updated_at);
                                    echo $date->format('d M. Y | H:i');
                                @endphp
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="row margin-top-sm">
                        <div class="col-md-auto">
                            <div class="text-left">
                                {{ __('main.last_login_at') }}:
                            </div>
                            <h5>
                                @php
                                    $date = new Date($profile_user->last_login_at);
                                    echo $date->format('d M. Y | H:i');
                                @endphp
                            </h5>
                        </div>
                        <div class="col-md-auto">
                            <div class="text-left">
                                {{ __('main.last_login_ip') }}:
                            </div>
                            <h5>
                                {{ $profile_user->last_login_ip }}
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>
    <!-- Content - CLOSE -->

@endsection
