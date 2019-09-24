@extends('layouts.app')

@section('title', __('main.terms_of_service'))

@section('content')

    <!-- Alerts - OPEN -->

        <!-- Success - OPEN -->
        @if( session()->get('success') )
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <div class="container text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session()->get('success') }}
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

        <h1>
            {{ __('main.terms_of_service') }}
        </h1>

        <h3 class="margin-top">
            Mesures de seguretat
        </h3>
        <p>
            El nostre lloc web manté els nivells de seguretat de protecció de les seves dades conforme el
            Reial decret 1720/2007, de 21 de desembre, pel qual s'aprova el Reglament de desplegament de la
            Llei Orgànica 15/1999, de 13 de desembre, de protecció de dades de caràcter personal i posa tots
            els mitjans tècnics al seu abast per evitar la pèrdua, mal ús, alteració, ús no autoritzat i
            robatori de les dades que vostè faciliti, sense perjudici d'informar que les mesures de seguretat
            a Internet no són inexpugnables.
        </p>

        <h3 class="margin-top">
            Modificacions i actualitzacions
        </h3>
        <p>
            A causa de la pròpia naturalesa d'aquest portal web, es reserva la potestat de realitzar modificacions
            i actualitzacions sobre la informació continguda, així com la configuració, disseny i disponibilitat
            del propi portal en qualsevol moment i sense necessitat de previ avís.
        </p>

        <h3 class="margin-top">
            Llei aplicable i jurisdicció
        </h3>
        <p>
            Per a la resolució de totes les controvèrsies o qüestions relacionades amb el present lloc web o de les
            activitats en ell desenvolupades, serà d'aplicació la legislació espanyola, a la qual se sotmeten
            expressament les parts, sent competents per a la resolució de tots els conflictes derivats o relacionats
            amb el seu ús dels Jutjats i Tribunals de Girona.
        </p>

    </div>
    <!-- Content - CLOSE -->

@endsection('content')
