<!-- Add user button - OPEN -->
<span data-toggle="modal" href="#addModal">
    <button type="button" class="btn btn-sm btn-outline-primary">
        <span class="octicon octicon-plus"></span>
        {{ __('actions.add') . ' ' . __('main.user') }}
    </button>
</span>
<!-- Add user button - CLOSE -->
<!-- Add user modal - OPEN -->
<div id="addModal" class="modal fade">
    <div class="modal-dialog modal-confirm">

        <!-- Modal content - OPEN -->
        <div class="modal-content">

            <!-- Form register - OPEN -->
            <form method="POST" action="{{ route('add_user') }}">
                @csrf

                <!-- Modal header - OPEN -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                </div>
                <!-- Modal header - CLOSE -->

                <!-- Modal body - OPEN -->
                <div class="modal-body text-left">

                    <!-- Name - OPEN -->
                    <div class="form-group row">

                        <!-- Name label - OPEN -->
                        <label for="name" class="col-md-4 col-form-label text-md-right">
                            {{ __('register.name') }}
                        </label>
                        <!-- Name label - CLOSE -->

                        <!-- Name input - OPEN -->
                        <div class="col-md-6">

                            <!-- Input - OPEN -->
                            <input id="name" type="text" name="name" value="{{ old('name') }}"
                            class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                            required autofocus>
                            <!-- Input - CLOSE -->

                            <!-- Show errors input - OPEN -->
                            @if( $errors->has('name') )
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                            <!-- Show errors input - CLOSE -->

                        </div>
                        <!-- Name input - CLOSE -->

                    </div>
                    <!-- Name - CLOSE -->

                    <!-- Email - OPEN -->
                    <div class="form-group row">

                        <!-- Email label - OPEN -->
                        <label for="email" class="col-md-4 col-form-label text-md-right">
                            {{ __('login.email') }}
                        </label>
                        <!-- Email label - CLOSE -->

                        <!-- Email input - OPEN -->
                        <div class="col-md-6">

                            <!-- Input - OPEN -->
                            <input id="email" type="email" name="email" value="{{ old('email') }}"
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                            required autofocus>
                            <!-- Input - CLOSE -->

                            <!-- Show errors input - OPEN -->
                            @if( $errors->has('email') )
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                            <!-- Show errors input - CLOSE -->

                        </div>
                        <!-- Email input - CLOSE -->

                    </div>
                    <!-- Email - CLOSE -->

                    <!-- ID - OPEN-->
                    <div class="form-group row">

                        <!-- ID label - OPEN -->
                        <label for="dni" class="col-md-4 col-form-label text-md-right">
                            {{ __('register.id') }}
                        </label>
                        <!-- ID label - CLOSE -->

                        <!-- ID input - OPEN -->
                        <div class="col-md-6">

                            <!-- Input - OPEN -->
                            <input id="dni" type="text" name="dni" value="{{ old('dni') }}"
                            class="form-control{{ $errors->has('dni') ? ' is-invalid' : '' }}"
                            required autofocus>
                            <!-- Input - CLOSE -->

                            <!-- Show errors input - OPEN -->
                            @if( $errors->has('dni') )
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('dni') }}</strong>
                                </span>
                            @endif
                            <!-- Show errors input - CLOSE -->

                        </div>
                        <!-- ID input - CLOSE -->

                    </div>
                    <!-- ID - CLOSE -->

                    <!-- Profile - OPEN -->
                    <div class="form-group row">

                        <!-- Profile label - OPEN -->
                        <label for="profile" class="col-md-4 col-form-label text-md-right">
                            {{ __('register.profile') }}
                        </label>
                        <!-- Profile label - CLOSE -->

                        <!-- Profile Input - OPEN -->
                        <div class="col-md-6">

                            <!-- Dropdown selector - OPEN -->
                            <select id="profile" class="form-control" name="profile" value="{{ old('profile') }}" required>
                                <option value="">
                                    {{ __('register.chose_profile') }}
                                </option>
                                <option value="firefighter" @if (old('profile') == "firefighter") {{ 'selected' }} @endif>
                                    {{ __('register.firefighter') }}
                                </option>
                                <option value="operator" @if (old('profile') == "operator") {{ 'selected' }} @endif>
                                    {{ __('register.control_room_operator') }}
                                </option>
                                <option value="commander" @if (old('commander') == "firefighter") {{ 'selected' }} @endif>
                                    {{ __('register.commander') }}
                                </option>
                                <option value="guest" @if (old('guest') == "firefighter") {{ 'selected' }} @endif>
                                    {{ __('register.guest') }}
                                </option>
                            </select>
                            <!-- Dropdown selector - CLOSE -->

                            <!-- Show errors input - OPEN -->
                            @if( $errors->has('profile') )
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('profile') }}</strong>
                                </span>
                            @endif
                            <!-- Show errors input - CLOSE -->

                        </div>
                        <!-- Profile Input - CLOSE -->

                    </div>
                    <!-- Profile - CLOSE -->

                    <!-- Password - OPEN -->
                    <div class="form-group row">

                        <!-- Password label - OPEN -->
                        <label for="password" class="col-md-4 col-form-label text-md-right">
                            {{ __('login.password') }}
                        </label>
                        <!-- Password label - CLOSE -->

                        <!-- Password input - OPEN -->
                        <div class="col-md-6">

                            <!-- Input - OPEN -->
                            <input id="password" type="password" name="password" value="{{ old('password') }}"
                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required>
                            <!-- Input - CLOSE -->

                            <!-- Show errors input - OPEN -->
                            @if( $errors->has('password') )
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            <!-- Show errors input - CLOSE -->

                        </div>
                        <!-- Password - CLOSE -->

                    </div>
                    <!-- Password Input - CLOSE -->

                    <!-- Confirm password - OPEN -->
                    <div class="form-group row">

                        <!-- Confirm password label - OPEN -->
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">
                            {{ __('register.conf_pass') }}
                        </label>
                        <!-- Confirm password label - CLOSE -->

                        <!-- Confirm password input - OPEN -->
                        <div class="col-md-6">

                            <!-- Input - OPEN -->
                            <input id="password-confirm" type="password" class="form-control"
                            name="password_confirmation" required>
                            <!-- Input - CLOSE -->

                            <!-- Show errors input - OPEN -->
                            @if( $errors->has('password-confirm') )
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password-confirm') }}</strong>
                                </span>
                            @endif
                            <!-- Show errors input - CLOSE -->

                        </div>
                        <!-- Confirm password input - CLOSE -->

                    </div>
                    <!-- Confirm password - CLOSE -->

                </div>
                <!-- Modal body - CLOSE -->

                <!-- Modal footer - OPEN -->
                <div class="modal-footer">
                    <a class="btn btn-light" data-dismiss="modal">
                        {{ __('actions.cancel') }}
                    </a>
                    <!-- Register button - OPEN -->
                    <button type="submit" class="btn btn-primary">
                        {{ __('actions.add') }}
                    </button>
                    <!-- Register button - CLOSE -->
                </div>
                <!-- Modal footer - CLOSE -->

            </div>
            <!-- Modal content - CLOSE -->

        </form>
        <!-- Form register - CLOSE -->

    </div>
</div>
<!-- Add user modal - CLOSE -->
