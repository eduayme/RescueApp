@extends('layouts.app')

@section('title', __('main.profile'))

@section('content')

    <!-- Alerts - OPEN -->
    @include('parts.alerts')
    <!-- Alerts - CLOSE -->

    <!-- Content - OPEN -->
    <div class="container margin-top padding-bottom">

        <!-- Form - OPEN -->
        {{ Form::model($user, array('action' => 'UserController@update_user', 'files'=> true)) }}

        <!-- User name and ID - OPEN -->
        <div class="row justify-content-center">

            <h2>
                <!-- User name - OPEN -->
                {{ $user->name }}
                <!-- User name - CLOSE -->

                <!-- ID - OPEN -->
                @if ($user->dni)
                    <small>
                        ({{ $user->dni }})
                    </small>
                @endif
                <!-- ID - CLOSE -->
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

        <div class="form-group row margin-top">

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
            <div class="form-group col-md-4">

                <label for="profile"> {{ __('register.profile') }} </label>

                @if ( $user->profile == 'admin' )
                    <select id="profile" class="form-control" name="profile" required>
                        <option value="admin" {{ ($user->profile === '') ? 'selected' : '' }}>
                            {{ __('register.admin') }}
                        </option>
                    </select>
                @else
                    <select id="profile" class="form-control" name="profile" required>
                        <option value="" {{ ($user->profile === '') ? 'selected' : '' }}>
                            {{ __('register.chose_profile') }}
                        </option>
                        <option value="firefighter" {{ ($user->profile === 'firefighter') ? 'selected' : '' }}>
                            {{ __('register.firefighter') }}
                        </option>
                        <option value="operator" {{ ($user->profile === 'operator') ? 'selected' : '' }}>
                            {{ __('register.control_room_operator') }}
                        </option>
                        <option value="commander" {{ ($user->profile === 'commander') ? 'selected' : '' }}>
                            {{ __('register.commander') }}
                        </option>
                        <option value="guest" {{ ($user->profile === 'guest') ? 'selected' : '' }}>
                            {{ __('register.guest') }}
                        </option>
                    </select>
                @endif

            </div>
            <!-- Profile - CLOSE  -->

        </div>

        <!-- Submit button - OPEN -->
        <div class="text-center margin-top">
            {{ Form::submit( __('actions.save'), array('class' => 'btn btn-primary') ) }}
        </div>
        <!-- Submit button - OPEN -->

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
