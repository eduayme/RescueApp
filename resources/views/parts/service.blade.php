@extends('layouts.app')

@section('title', __('footer.terms_of_service'))

@section('content')

    <!-- Alerts - OPEN -->
    @include('parts.alerts')
    <!-- Alerts - CLOSE -->

    <!-- Content - OPEN -->
    <div class="container margin-top padding-bottom">

        <!-- Go back button - OPEN -->
        @include('buttons.go_back')
        <!-- Go back button - CLOSE -->

        <h1 class="margin-top margin-bottom">
            {{ __('footer.terms_of_service') }}
        </h1>

        <h3 class="margin-top-sm">
            {{ __('terms.security_measures') }}
        </h3>
        <p class="text-justify">{{ __('terms.security_measures_detail') }}</p>

        <h3 class="margin-top">
            {{ __('terms.terms_modifications') }}
        </h3>
        <p class="text-justify">{{ __('terms.terms_modifications_detail') }}</p>

        <h3 class="margin-top">
            {{ __('terms.terms_jurisdiction') }}
        </h3>
        <p class="text-justify">{{ __('terms.terms_jurisdiction_detail') }}</p>

    </div>
    <!-- Content - CLOSE -->

@endsection('content')
