@extends('layouts.app')

@section('title', __('footer.privacy_policy'))

@section('content')

    <!-- Alerts - OPEN -->
    @include('parts.alerts')
    <!-- Alerts - CLOSE -->

    <!-- Content - OPEN -->
    <div class="container mb-5 mt-3 my-md-3">

        <!-- Go back button - OPEN -->
        @include('buttons.go_back')
        <!-- Go back button - CLOSE -->

        <h1 class="margin-top">
            {{ __('footer.privacy_policy') }}
        </h1>
        <p class="margin-top-sm text-justify">{{ __('privacy.privacy_policy_detail') }}</p>

        <h3 class="margin-top">
            {{ __('privacy.information_collected') }}
        </h3>
        <p class="text-justify">{{ __('privacy.information_collected_detail') }}</p>

        <h3 class="margin-top">
            {{ __('privacy.information_purpose') }}
        </h3>
        <p class="text-justify">{{ __('privacy.information_purpose_detail') }}</p>

        <h3 class="margin-top">
            {{ __('privacy.information_control') }}
        </h3>
        <p class="text-justify">{{ __('privacy.information_control_detail') }}</p>

    </div>
    <!-- Content - CLOSE -->

@endsection('content')
