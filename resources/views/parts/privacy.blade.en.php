@extends('layouts.app')

@section('title', __('main.privacy_policy'))

@section('content')

    <!-- Alerts - OPEN -->
    @include('parts.alerts')
    <!-- Alerts - CLOSE -->

    <!-- Content - OPEN -->
    <div class="container margin-top padding-bottom">

        <h1>
            {{ __('main.privacy_policy') }}
        </h1>

        <p class="margin-top">
            This privacy policy establishes the terms in which this application is used and protects
            the information provided by its users. This foundation is committed to the security of the
            data of its users. We ensure that our users personal information will only be used in
            accordance with the terms of this document. This privacy policy is subject to change. We
            recommend our users periodically review this privacy policy to ensure that you agree with
            any future revisions.
        </p>

        <h3 class="margin-top">
            Information collected
        </h3>
        <p>
            Our website may collect information of a personal nature.
        </p>

        <h3 class="margin-top">
            Use of collected information.
        </h3>
        <p>
            Our website uses the information collected with your explicit consent to manage
            a database for the recording of information related to searches or other
            relevant related information.
        </p>

        <h3 class="margin-top">
            Control of information
        </h3>
        <p>

            Collected personal information will not be sold, ceded nor distributed without the consent of
            the user, unless it is required by a judge with a court order.
        </p>

    </div>
    <!-- Content - CLOSE -->

@endsection('content')
