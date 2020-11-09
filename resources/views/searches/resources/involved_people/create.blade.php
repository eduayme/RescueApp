@extends('layouts.app')

@section('title', __('actions.add') . ' ' . __('involved_people.involved_person'))

@section('content')

<!-- Alerts - OPEN -->
@include('parts.alerts')
<!-- Alerts - CLOSE -->

<!-- Content - OPEN -->
<div class="container mb-5 mt-3 my-md-3">

    <!-- Top buttons - OPEN -->
    @include('buttons.go_back')
    <!-- Top buttons - CLOSE -->

    <!-- Form - OPEN -->
    <form method="post" action="{{ route('involved_people.store') }}">
    {{ csrf_field() }}

        <!-- Stype service title - OPEN -->
        <h3 class="margin-top">
            {{ __('actions.add') . ' ' . __('involved_people.involved_person') }}
        </h3>
        <!-- Stype service title - CLOSE -->

        <!-- Type activity, code and region - OPEN -->
        <div class="form-row">
            @csrf

            <!-- Name - OPEN  -->
            <div class="form-group col-md-6">
                <label for="name"> {{ __('involved_people.name') }} </label>
                {{ Form::text('name', null, array('class' => 'form-control', 'required' => 'required')) }}
                <!-- Show errors input - OPEN -->
                @if( $errors->has('name') )
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </div>
                @endif
                <!-- Show errors input - CLOSE -->
            </div>
            <!-- Name - CLOSE  -->

            <!-- Total - OPEN -->
            <div class="form-group col-md-6">
                <label for="total_people"> {{ __('involved_people.total') }} </label>
                {{ Form::input('number', 'total_people', null, array('class' => 'form-control')) }}
                <!-- Show errors input - OPEN -->
                @if( $errors->has('total_people') )
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('total_people') }}</strong>
                    </div>
                @endif
                <!-- Show errors input - CLOSE -->
            </div>
            <!-- Total - CLOSE -->

            <!-- Vehicle - OPEN  -->
            <div class="form-group col-md-6">
                <label for="vehicle"> {{ __('involved_people.vehicle') }} </label>
                {{ Form::text('vehicle', null, array('class' => 'form-control')) }}
                <!-- Show errors input - OPEN -->
                @if( $errors->has('vehicle') )
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('vehicle') }}</strong>
                    </div>
                @endif
                <!-- Show errors input - CLOSE -->
            </div>
            <!-- Vehicle - CLOSE  -->

            <!-- Phone - OPEN  -->
            <div class="form-group col-md-6">
                <label for="phone_number"> {{ __('involved_people.phone') }} </label>
                {{ Form::text('phone_number', null, array('class' => 'form-control')) }}
                <!-- Show errors input - OPEN -->
                @if( $errors->has('phone_number') )
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('phone_number') }}</strong>
                    </div>
                @endif
                <!-- Show errors input - CLOSE -->
            </div>
            <!-- Phone - CLOSE  -->

            <!-- People involved - OPEN  -->
            <div class="form-group col-md-12">
                <label for="people"> {{ __('involved_people.people') }} </label>
                {{ Form::textarea('people', null, array('class' => 'form-control','rows'=> 3, 'resize' => 'none')) }}
                <!-- Show errors input - OPEN -->
                @if( $errors->has('people') )
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('people') }}</strong>
                    </div>
                @endif
                <!-- Show errors input - CLOSE -->
            </div>
            <!-- People involved - CLOSE  -->

        </div>
        <!-- Type activity, code and region - OPEN -->

        <!-- Id search HIDDEN - OPEN -->
        {{ Form::hidden('search_id', $search_id) }}
        <!-- Id search HIDDEN - CLOSE -->

        <!-- Submit button - OPEN -->
        <div class="text-center margin-top">
            <button type="submit" class="btn btn-primary">
                <span class="octicon octicon-plus"></span>
                {{ __('actions.add') . ' ' . __('involved_people.involved_person') }}
            </button>
        </div>
        <!-- Submit button - OPEN -->

    </form>
    <!-- Form - CLOSE -->

</div>
<!-- Content - CLOSE -->

@endsection
