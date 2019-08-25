@extends('layouts.app')

@section('title', __('main.profile'))

@section('content')

  <!-- Alerts - OPEN -->

  <!-- Success - OPEN -->
  @if( session('success') )
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <div class="container text-center">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          {{ session('success') }}
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

    <!-- Form - OPEN -->
    {{ Form::model($user, array('action' => 'UserController@update_user', 'files'=> true)) }}

        <!-- User name and ID - OPEN -->
        <div class="row justify-content-md-center">

            <h2>
                <!-- User name - OPEN -->
                {{ $user->name }}
                <!-- User name - CLOSE -->

                <!-- ID - OPEN -->
                <small>
                    ({{ $user->dni }})
                </small>
                <!-- ID - CLOSE -->
            </h2>

        </div>
        <!-- User name and ID - CLOSE -->

        <!-- User avatar - OPEN -->
        <div class="row justify-content-md-center image-upload">
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

                <label for="perfil"> {{ __('register.profile') }} </label>

                <select id="perfil" class="form-control" name="perfil" required>
                    <option value="" {{ ($user->perfil === '') ? 'selected' : '' }}>
                        {{ __('register.chose_profile') }}
                    </option>
                    <option value="bomber" {{ ($user->perfil === 'bomber') ? 'selected' : '' }}>
                        {{ __('register.firefighter') }}
                    </option>
                    <option value="operador" {{ ($user->perfil === 'operador') ? 'selected' : '' }}>
                        {{ __('register.control_room_operator') }}
                    </option>
                    <option value="comandament" {{ ($user->perfil === 'comandament') ? 'selected' : '' }}>
                        {{ __('register.commander') }}
                    </option>
                    <option value="convidat" {{ ($user->perfil === 'convidat') ? 'selected' : '' }}>
                        {{ __('register.guest') }}
                    </option>
                </select>

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
