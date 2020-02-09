@extends('layouts.app')

@section('title', __('main.profile'))

@section('content')

    <!-- Alerts - OPEN -->
    @include('parts.alerts')
    <!-- Alerts - CLOSE -->

    <!-- Content - OPEN -->
    <div class="container margin-top padding-bottom">

        <!-- Top buttons - OPEN -->
        @include('buttons.go_back')
        <!-- Top buttons - CLOSE -->

        <!-- Form - OPEN -->
        {{ Form::model($user, array('route' => array('users.update', $user->id), 'files'=> true)) }}

            <!-- User name and ID - OPEN -->
            <div class="row justify-content-center">

                <h2>
                    <!-- User name - OPEN -->
                    {{ $user->name }}
                    <!-- User name - CLOSE -->
                </h2>

            </div>
            <!-- User name and ID - CLOSE -->

            <!-- User avatar - OPEN -->
            <div class="row justify-content-center image-upload">
                <label for="avatar">
                    <div class="img-container">
                        <img src="/uploads/avatars/{{ $user->avatar }}" class="profile" id="avatar_img">
                        <div class="overlay">
                            <span class="octicon octicon-cloud-upload" style="font-size: 2rem"> </span>
                        </div>
                    </div>
                </label>
                <input id="avatar" onchange="readURL(this);" name="avatar" type="file" class="form-control" style="display: none"/>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
            <!-- User avatar - CLOSE -->

            <div class="form-group margin-top row justify-content-center">

                <!-- Name - OPEN  -->
                <div class="col-md-4">
                    {{ Form::label('name', __('register.name')) }}
                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                </div>
                <!-- Name - CLOSE  -->

                <!-- Email - OPEN  -->
                <div class="col-md-4">
                    {{ Form::label('email', __('login.email')) }}
                    {{ Form::text('email', null, array('class' => 'form-control')) }}
                </div>
                <!-- Email - CLOSE  -->

                <!-- Profile - OPEN  -->
                <div class="col-md-4">
                    {{ Form::label('profile', __('register.profile')) }}
                    {{ Form::text('profile', null, array('class' => 'form-control', 'readonly' => 'true')) }}
                </div>
                <!-- Profile - CLOSE  -->

            </div>

            @if (Auth::user()->profile != 'guest')
            <!-- Submit button - OPEN -->
            <div class="text-center margin-top">
                {{ Form::submit( __('actions.save'), array('class' => 'btn btn-primary') ) }}
            </div>
            <!-- Submit button - OPEN -->
            @endif

        {{ Form::close() }}
        <!-- Form - CLOSE -->

    </div>
    <!-- Content - CLOSE -->

@endsection

<!-- JS scripts -->
<script>

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#avatar_img')
            .attr('src', e.target.result)
            .width(150)
            .height(150);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

</script>
