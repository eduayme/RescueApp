@extends('layouts.app')

@section('title', __('main.users'))

@section('content')

    <!-- Alerts - OPEN -->
    @include('parts.alerts')
    <!-- Alerts - CLOSE -->

    <!-- Language for dates - OPEN -->
    @php
        \Date::setLocale(Session::get('locale'));
    @endphp
    <!-- Language for dates - CLOSE -->

    <!-- Content - OPEN -->
    <div class="container margin-top padding-bottom">

        <div class="row">
            <div class="col-sm"></div>
            <div class="col-sm">
                <h3 class="margin-bottom-sm text-center">
                    {{ __('main.users') }}
                </h3>
            </div>
            <div class="col-sm text-right">
                <!-- Add user button - OPEN -->
                @include('auth.buttons.add_user')
                <!-- Add user button - CLOSE -->
            </div>
        </div>

                <!-- Content - OPEN -->
               
                <div class="row">
                    <div class="col-md-5">
                        <div {{-- class="container margin-top padding-bottom" --}}>

                            <!-- Profile user avatar - OPEN -->
                            <div class="container pad-sm">
                                <div class="row justify-content-md-center">
                                    <img src="/uploads/avatars/{{ $data['user']->avatar }}" class="rounded-circle" height="150" width="150">
                                </div>
                            </div>
                            <!-- Profile user avatar - CLOSE -->

                            <!-- Basic info user - OPEN -->
                            <div class="container pad-sm">
                                <div class="row justify-content-md-center">
                                    <div class="row margin-top-sm">
                                        <div class="col-md-auto">
                                            <div class="text-left">
                                                {{ __('register.name') }}:
                                            </div>
                                            <h5>
                                                {{ $data['user']->name }}
                                            </h5>
                                        </div>
                                        <div class="col-md-auto">
                                            <div class="text-left">
                                                {{ __('login.email') }}:
                                            </div>
                                            <h5>
                                                {{ $data['user']->email }}
                                            </h5>
                                        </div>
                                        <div class="col-md-auto">
                                            <div class="text-left">
                                                {{ __('register.profile') }}:
                                            </div>
                                            <h5>
                                                {{ __('register.' . $data['user']->profile) }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Basic info user - CLOSE -->

                            <!-- Advanced info user - CLOSE -->
                            @if( Auth::user()->is_admin() )
                                <div class="container pad-sm">
                                    <div class="row justify-content-md-center">
                                        <div class="row margin-top-sm">
                                            <div class="col-md-auto">
                                                <div class="text-left">
                                                    {{ __('register.id') }}:
                                                </div>
                                                <h5>
                                                    {{ $data['user']->dni }}
                                                </h5>
                                            </div>
                                            <div class="col-md-auto">
                                                <div class="text-left">
                                                    {{ __('main.created_at') }}:
                                                </div>
                                                <h5>
                                                    @php
                                                        $date = new Date($data['user']->created_at);
                                                        echo $date->format('Y M. d | H:i');
                                                    @endphp
                                                </h5>
                                            </div>
                                            <div class="col-md-auto">
                                                <div class="text-left">
                                                    {{ __('main.updated_at') }}:
                                                </div>
                                                <h5>
                                                    @php
                                                        $date = new Date($data['user']->updated_at);
                                                        echo $date->format('Y M. d | H:i');
                                                    @endphp
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-md-center">
                                        <div class="row margin-top-sm">
                                            <div class="col-md-auto">
                                                <div class="text-left">
                                                    {{ __('main.last_login_at') }}:
                                                </div>
                                                <h5>
                                                    @php
                                                        $date = new Date($data['user']->last_login_at);
                                                        echo $date->format('Y M. d | H:i');
                                                    @endphp
                                                </h5>
                                            </div>
                                            <div class="col-md-auto">
                                                <div class="text-left">
                                                    {{ __('main.last_login_ip') }}:
                                                </div>
                                                <h5>
                                                    {{ $data['user']->last_login_ip }}
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-7">
                                    <h1>{{ __('actions.edit') ." ". __('permissions_roles.roles') }} </h1>
                                    <form method="post" action="{{ route('store_user_role', $data['user']->id) }}">
                                        @csrf
                                <div class="row margin-top-sm">
                                        @foreach($data['roles'] as $role)
                                            <div class="col-4">
                                                <label for="{{$role->id}}">
                                                    {{$role->display_name}}
                                                </label>
                                                <input type="radio" name="roles" value={{$role->id}} {{ in_array($role->id, $data['user_roles']) ? 'checked' : '' }}>
                                                
                                            </div>       
                                        @endforeach
                                </div>
                                    <button type="submit" class="btn btn-primary">Assign Role</button>
                                    </form>
                                    <div class="row margin-top-sm"> 
                                        {{-- Empty div  --}}
                                        <p>&nbsp;</p>
                                    </div>
                                    <h1>{{ __('actions.edit') ." ". __('permissions_roles.permissions') }} </h1>
                                    <form method="post" action="{{ route('store_user_permission', $data['user']->id) }}">
                                        @csrf
                                <div class="row margin-top-sm">
                                        @foreach($data['permissions'] as $permission)
                                            <div class="col-4">
                                                <label for="{{$permission->id}}">
                                                    {{$permission->display_name}}
                                                </label>
                                                <input type="checkbox" name="permissions[]" value={{$permission->id}} {{ in_array($permission->id, $data['user_permissions']) ? 'checked' : '' }}>
                                                
                                            </div>       
                                        @endforeach
                                </div>
                                    <button type="submit" class="btn btn-primary">Assign Permission</button>
                                    </form>
                    </div>
                </div>
                <!-- Content - CLOSE -->
    </div>
    <!-- Content - CLOSE -->

@endsection


