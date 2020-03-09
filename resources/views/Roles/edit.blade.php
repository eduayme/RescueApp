@extends('layouts.app')

@section('title', __('actions.edit') . __('permissions_roles.role'))

@section('content')

    <!-- Alerts - OPEN -->
    @include('parts.alerts')
    <!-- Alerts - CLOSE -->

    <!-- Content - OPEN -->
    <div class="container margin-top padding-bottom">

        <!-- Go back button - OPEN -->
        @include('buttons.go_back')
        <!-- Go back button - CLOSE -->

        <!-- Form - OPEN -->
        <form method="POST" action="{{route('roles.update', $role->id)}}">
          {{csrf_field()}}
          {{method_field('PUT')}}
        <form>

            <div class="form-row">


                <div class="form-group col-md-12">

                    <div class="form-row">

                        <!-- Display Name respond - OPEN  -->
                        <div class="form-group col-md-6">

                            <label for="display_name"> {{ __('permissions_roles.display_name') }} </label>

                            <input type="text" class="form-control {{ $errors->has('display_name') ? ' is-invalid' : '' }}"
                            name="display_name" value="{{$role->display_name}}"/>

                            <!-- Show errors input - OPEN -->
                            @if( $errors->has('display_name') )
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('display_name') }}</strong>
                                </div>
                            @endif
                            <!-- Show errors input - CLOSE -->
                        </div>
                        <!-- Name respond - CLOSE  -->

                        <!-- Age - OPEN  -->
                        <div class="form-group col-md-6">

                            <label for="name"> {{ __('permissions_roles.slug') }} </label>

                            <input type="text" class="form-control" name="age" value="{{$role->name}}" readonly />

                        </div>
                        <!-- Age - CLOSE  -->

                        <!-- Phone - OPEN  -->
                        <div class="form-group col-md-6">

                            <label for="desciption"> {{ __('forms.description') }} </label>

                            <input type="text" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}"
                            name="description" value="{{$role->description}}" />

                            <!-- Show errors input - OPEN -->
                            @if( $errors->has('description') )
                                <div class="invalid-feedback" role="alert">
                                    <strong> {{ $errors->first('description') }} </strong>
                                </div>
                            @endif
                            <!-- Show errors input - CLOSE -->

                        </div>
                        <!-- Phone - CLOSE  -->

                        <!-- Profile - OPEN  -->
                        <div class="form-group col-md-12">

                            <label for="profile"> {{__('permissions_roles.assign')." ".__('permissions_roles.permissions')}} </label>
                                                    
                              @foreach ($permissions as $permission)
                              <div class="form-group col-md-10">
                                <label for="{{ $permission->name }}">{{$permission->description}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$permission->display_name}}</label>
                                <input type="checkbox" name="permissions['{{ $permission->id }}']" id="{{ $permission->name }}" value="{{ $permission->id }}" {{in_array($permission->id, $rolePermission) ? 'checked' : ''}}>
                              </div>
                              @endforeach

                        </div>
                        <!-- Profile - CLOSE  -->

                    </div>

                </div>

            </div>

            <!-- Submit button - OPEN -->
            <div class="text-center margin-top">
                <button type="submit" class="btn btn-primary">
                    {{ __('actions.save') . ' ' . __('permissions_roles.role') }}
                </button>
            </div>
            <!-- Submit button - OPEN -->

        {{ Form::close() }}
        <!-- Form - CLOSE -->

    </div>
    <!-- Content - CLOSE -->

@endsection