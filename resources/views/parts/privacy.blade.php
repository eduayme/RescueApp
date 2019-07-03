@extends('layouts.app')

@section('title', __('main.privacy_policy'))

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
            {{ __('main.privacy_policy') }}
        </h1>

        <p class="margin-top">
            La present política de privacitat estableix els termes en què aquesta aplicació fa servir
            i protegeix la informació proporcionada pels seus usuaris en el moment d'utilitzar el seu
            lloc web. Aquesta fundació està compromesa amb la seguretat de les dades dels seus usuaris.
            Quan s'omple un camp d'informació personal, assegurem que aquesta només es farà servir
            d'acord amb els termes d'aquest document. No obstant això, aquesta política de privacitat
            pot canviar amb el temps o ser actualitzada, pel que recomanem i emfatitzem a revisar
            contínuament aquesta pàgina per assegurar que s'està d'acord amb aquests canvis.
        </p>

        <h3 class="margin-top">
            Informació recollida
        </h3>
        <p>
            El nostre lloc web podrà recollir informació de caràcter personal.
        </p>

        <h3 class="margin-top">
            Ús de la informació recollida
        </h3>
        <p>
            El nostre lloc web empra la informació recollida amb el seu consentiment explícit per gestionar
            una base de dades destinada a l’enregistrament d’informació relacionada amb recerques o altra
            informació rellevant relacionada.
        </p>

        <h3 class="margin-top">
            Control de la informació
        </h3>
        <p>
            No es vendrà, cedirà ni distribuirà la informació personal recopilada sense el consentiment de
            l'usuari, llevat que sigui requerit per un jutge amb un ordre judicial.
        </p>

    </div>
    <!-- Content - CLOSE -->

@endsection('content')
