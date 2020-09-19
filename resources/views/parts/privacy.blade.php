@extends('layouts.app')

@section('title', __('main.privacy_policy'))

@section('content')

    <!-- Alerts - OPEN -->
    @include('parts.alerts')
    <!-- Alerts - CLOSE -->

    <!-- Content - OPEN -->
    <div class="container margin-top padding-bottom">

        <!-- Go back button - OPEN -->
        @include('buttons.go_back')
        <!-- Go back button - CLOSE -->

        <h1 class="margin-top">
            {{ __('main.privacy_policy') }}
        </h1>
        <p class="margin-top-sm text-justify">{{ __('main.privacy_policy_detail') }}</p>

        <h3 class="margin-top">
            {{ __('main.information_collected') }}
        </h3>
        <p class="text-justify">{{ __('main.information_collected_detail') }}</p>

        <h3 class="margin-top">
            {{ __('main.information_purpose') }}
        </h3>
        <p class="text-justify">{{ __('main.information_purpose_detail') }}</p>

        <h3 class="margin-top">
            {{ __('main.information_control') }}
        </h3>
        <p class="text-justify">{{ __('main.information_control_detail') }}</p>

    </div>
    <!-- Content - CLOSE -->

@endsection('content')
