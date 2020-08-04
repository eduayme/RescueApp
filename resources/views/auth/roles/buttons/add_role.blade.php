<!-- Add user button - OPEN -->
<span data-toggle="modal" href="#addModal">
    <button type="button" class="btn btn-sm btn-outline-primary">
        <span class="octicon octicon-plus"></span>
        {{ __('actions.add') . ' ' . __('permissions_roles.role') }}
    </button>
</span>
<!-- Add user button - CLOSE -->
<!-- Add user modal - OPEN -->
<div id="addModal" class="modal fade">
    <div class="modal-dialog modal-confirm">

        <!-- Modal content - OPEN -->
        <div class="modal-content">

            <!-- Form register - OPEN -->
            <form method="POST" action="{{route('roles.store')}}">
                {{-- {{ route('add_user') }} --}}
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

                        <!-- Display Name label - OPEN -->
                        <label for="display_name" class="col-md-4 col-form-label text-md-right">
                            {{ __('permissions_roles.display_name') }}
                        </label>
                        <!-- Display Name label - CLOSE -->

                        <!-- Display Name input - OPEN -->
                        <div class="col-md-6">

                            <!-- Input - OPEN -->
                            <input id="display_name" type="text" name="display_name" value="{{ old('display_name') }}" class="form-control{{ $errors->has('display_name') ? ' is-invalid' : '' }}"
                            required autofocus>
                            <!-- Input - CLOSE -->

                            <!-- Show errors input - OPEN -->
                            @if( $errors->has('display_name') )
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('display_name') }}</strong>
                            </span>
                            @endif
                            <!-- Show errors input - CLOSE -->

                        </div>
                        <!-- Display Name input - CLOSE -->

                    </div>
                    <!-- Display Name - CLOSE -->

                    <!-- Slug - OPEN -->
                    <div class="form-group row">

                        <!-- Email label - OPEN -->
                        <label for="name" class="col-md-4 col-form-label text-md-right">
                            {{ __('permissions_roles.name') }}
                        </label>
                        <!-- Slug label - CLOSE -->

                        <!-- Slug input - OPEN -->
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
                        <!-- Slug input - CLOSE -->

                    </div>
                    <!-- Slug - CLOSE -->

                    <!-- ID - OPEN-->
                    <div class="form-group row">

                        <!-- Description label - OPEN -->
                        <label for="description" class="col-md-4 col-form-label text-md-right">
                            {{ __('forms.description') }}
                        </label>
                        <!-- Description label - CLOSE -->

                        <!-- Description input - OPEN -->
                        <div class="col-md-6">

                            <!-- Input - OPEN -->
                            <input id="description" type="text" name="description" value="{{ old('description') }}"
                            class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                            required autofocus>
                            <!-- Input - CLOSE -->

                            <!-- Show errors input - OPEN -->
                            @if( $errors->has('description') )
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                            <!-- Show errors input - CLOSE -->

                        </div>
                        <!-- Description input - CLOSE -->

                    </div>
                    <!-- Description - CLOSE -->

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
