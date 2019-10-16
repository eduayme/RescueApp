@extends('layouts.app')

@section('title', __('main.privacy_policy'))

@section('content')

    <!-- Alerts - OPEN -->

        <!-- Success - OPEN -->
        @if (session()->get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <div class="container text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session()->get('success') }}
                </div>
            </div>
        <!-- Success - CLOSE -->

        <!-- Error - OPEN -->
        @elseif (session()->get('error'))
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
    <div class="container margin-top padding-bottom">

        <h1>
            {{ __('main.privacy_policy') }}
        </h1>

        <p class="margin-top">
            {{ __('main.privacy_policy_detail') }}
        </p>

        <h3 class="margin-top">
            {{ __('main.information_collected') }}
        </h3>
        <p>
            {{ __('main.information_collected_detail') }}
        </p>

        <h3 class="margin-top">
            {{ __('main.information_purpose') }}
        </h3>
        <p>
            {{ __('main.information_purpose_detail') }}
        </p>

        <h3 class="margin-top">
            {{ __('main.information_control') }}
        </h3>
        <p>
            {{ __('main.information_control_detail') }}        
        </p>

    </div>
    <!-- Content - CLOSE -->

@endsection('content')
