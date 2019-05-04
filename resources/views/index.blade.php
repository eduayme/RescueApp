@extends('layouts.app')

@section('title', 'Inici')

@section('content')

    <!-- Alerts -->
    @if( session()->get('success') )
        <div class="alert alert-success" role="alert">
            <div class="container text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session()->get('success') }}
            </div>
        </div>

    @elseif( session()->get('error') )
        <div class="alert alert-error alert-dismissible fade show" role="alert">
            <div class="container text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  {{ session()->get('error') }}
            </div>
        </div>
    @endif

    <!-- Content -->
    <div class="text-center">
      <p> Nom: {{ Auth::user()->name }} </p>
      <p> Email: {{ Auth::user()->email }} </p>
      <p> DNI: {{ Auth::user()->dni }} </p>
      <p> Perfil: {{ Auth::user()->perfil }} </p>
    </div>

@endsection
