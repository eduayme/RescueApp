@extends('layouts.app')

@section('title', __('main.terms_of_service'))

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
            {{ __('main.terms_of_service') }}
        </h1>

        <h3 class="margin-top">
            Security measures
        </h3>
        <p>
            Our website ensures the security of your data in accordance with the security levels of protection as per
            Royal Decree 1720, dated December 21, 2007. This decree approves the Regulation for the development of the
            Organic Law 15, dated December 13, 1999 on the protection of personal data. Furthermore, all reasonable technical
            means shall be utilized to prevent loss, misuse, alteration, unauthorized use and theft of the data you provide,
            without prejudice to informing you of the security measures on the Internet they are not impregnable.
        </p>

        <h3 class="margin-top">
            Modifications and updates
        </h3>
        <p>
            Due to the nature of this web portal, we reserve the rights to make modifications
            and updates on the information contained, as well as the configuration, design and availability
            of the portal itself, at any time and without the need for prior notice.
        </p>

        <h3 class="margin-top">
            Applicable law and jurisdiction
        </h3>
        <p>
            Any and all disputes or questions related to this website or of any part therein, or the parties, shall be subject
            to the Spanish laws and legislation. Any/all resolutions or related conflicts with regard to this websites use
            shall reamin within the jurisdiction of the Courts of Girona.
        </p>

    </div>
    <!-- Content - CLOSE -->

@endsection('content')
