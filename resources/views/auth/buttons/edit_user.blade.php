<!-- Edit user button - OPEN -->
<span data-toggle="modal" href="#editModal-{{ $user->id }}">
    <button type="button" class="btn btn-sm btn-outline-dark">
        <span class="octicon octicon-pencil"></span>
    </button>
</span>
<!-- Edit user button - CLOSE -->
<!-- Edit user modal - OPEN -->
<div id="editModal-{{ $user->id }}" class="modal fade">
    <div class="modal-dialog modal-confirm">

        <!-- Modal content - OPEN -->
        <div class="modal-content">

            <!-- Form edit user - OPEN -->
            {{ Form::model($user, array('route' => array('users.update', $user->id), 'files'=> true)) }}
                @csrf

                <!-- Modal header - OPEN -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                </div>
                <!-- Modal header - CLOSE -->

                <!-- Modal body - OPEN -->
                <div class="modal-body text-center">

                    <div class="container pad-sm">
                        <div class="row justify-content-center">

                            <!-- User avatar - OPEN -->
                            <div class="col-12">
                                <img src="/uploads/avatars/{{ $user->avatar }}" class="rounded-circle"
                                height="150" width="150">
                            </div>
                            <!-- User avatar - CLOSE -->

                            <div class="col-12">
                                <div class="row margin-top-sm">
                                    <div class="col-6">
                                        <div class="text-left">
                                            {{ __('register.name') }}:
                                        </div>
                                        {{ Form::text('name', null, array('class' => 'form-control')) }}
                                    </div>
                                    <div class="col-6">
                                        <div class="text-left">
                                            {{ __('login.email') }}:
                                        </div>
                                        {{ Form::text('email', null, array('class' => 'form-control')) }}
                                    </div>
                                </div>
                                <div class="row margin-top-sm">
                                    <div class="col-6">
                                        <div class="text-left">
                                            {{ __('register.id') }}:
                                        </div>
                                        {{ Form::text('dni', null, array('class' => 'form-control', 'readonly' => 'true')) }}
                                    </div>
                                    <div class="col-6">
                                        <div class="text-left">
                                            {{ __('register.profile') }}:
                                        </div>
                                        <!-- Dropdown selector - OPEN -->
                                        <select id="profile-{{ $user->id }}" class="form-control" name="profile" required>
                                            <option value="admin" @if ($user->profile == "admin") {{ 'selected' }} @endif>
                                                {{ __('register.admin') }}
                                            </option>
                                            <option value="firefighter" @if ($user->profile == "firefighter") {{ 'selected' }} @endif>
                                                {{ __('register.firefighter') }}
                                            </option>
                                            <option value="operator" @if ($user->profile == "operator") {{ 'selected' }} @endif>
                                                {{ __('register.control_room_operator') }}
                                            </option>
                                            <option value="commander" @if ($user->profile == "commander") {{ 'selected' }} @endif>
                                                {{ __('register.commander') }}
                                            </option>
                                            <option value="guest" @if ($user->profile == "guest") {{ 'selected' }} @endif>
                                                {{ __('register.guest') }}
                                            </option>
                                        </select>
                                        <!-- Dropdown selector - CLOSE -->
                                    </div>
                                </div>
                                <div class="row margin-top-sm">
                                    <div class="col-6">
                                        <div class="text-left">
                                            {{ __('main.created_at') }}:
                                        </div>
                                        <h5>
                                            @php
                                                $date = new Date($user->created_at);
                                                echo $date->format('d M. Y | H:i');
                                            @endphp
                                        </h5>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-left">
                                            {{ __('main.updated_at') }}:
                                        </div>
                                        <h5>
                                            @php
                                                $date = new Date($user->updated_at);
                                                echo $date->format('d M. Y | H:i');
                                            @endphp
                                        </h5>
                                    </div>
                                </div>
                                <div class="row margin-top-sm">
                                    <div class="col-6">
                                        <div class="text-left">
                                            {{ __('main.last_login_at') }}:
                                        </div>
                                        <h5>
                                            @php
                                                $date = new Date($user->last_login_at);
                                                echo $date->format('d M. Y | H:i');
                                            @endphp
                                        </h5>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-left">
                                            {{ __('main.last_login_ip') }}:
                                        </div>
                                        <h5>
                                            {{ $user->last_login_ip }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Modal body - CLOSE -->

                <!-- Modal footer - OPEN -->
                <div class="modal-footer">
                    <a class="btn btn-light" data-dismiss="modal">
                        {{ __('actions.cancel') }}
                    </a>
                    <!-- Register button - OPEN -->
                    {{ Form::submit( __('actions.save'), array('class' => 'btn btn-primary') ) }}
                    <!-- Register button - CLOSE -->
                </div>
                <!-- Modal footer - CLOSE -->

            {{ Form::close() }}
            <!-- Form - CLOSE -->

        </div>
        <!-- Modal content - CLOSE -->

    </div>
</div>
<!-- Edit user modal - CLOSE -->
