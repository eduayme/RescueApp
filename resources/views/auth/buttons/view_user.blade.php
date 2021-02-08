<!-- View user button - OPEN -->
<span data-toggle="modal" href="#viewModal-{{ $user->id }}">
    <button type="button" class="btn btn-sm btn-outline-dark">
        <span class="octicon octicon-eye"></span>
    </button>
</span>
<!-- View user button - CLOSE -->
<!-- View user modal - OPEN -->
<div id="viewModal-{{ $user->id }}" class="modal fade">
    <div class="modal-dialog modal-confirm">

        <!-- Modal content - OPEN -->
        <div class="modal-content">

            <!-- Modal header - OPEN -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
            </div>
            <!-- Modal header - CLOSE -->

            <!-- Modal body - OPEN -->
            <div class="modal-body">

                <!-- Content - OPEN -->
                <div class="container mb-5 mt-3 my-md-3">

                    <!-- Profile user avatar - OPEN -->
                    <div class="container pad-sm">
                        <div class="row justify-content-md-center">
                            <img src="/uploads/avatars/{{ $user->avatar }}" class="rounded-circle" height="150" width="150">
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
                                        {{ $user->name }}
                                    </h5>
                                </div>
                                <div class="col-md-auto">
                                    <div class="text-left">
                                        {{ __('login.email') }}:
                                    </div>
                                    <h5>
                                        {{ $user->email }}
                                    </h5>
                                </div>
                                <div class="col-md-auto">
                                    <div class="text-left">
                                        {{ __('register.profile') }}:
                                    </div>
                                    <h5>
                                        {{ __('register.' . $user->profile) }}
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
                                            {{ $user->dni }}
                                        </h5>
                                    </div>
                                    <div class="col-md-auto">
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
                                    <div class="col-md-auto">
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
                            </div>
                            <div class="row justify-content-md-center">
                                <div class="row margin-top-sm">
                                    <div class="col-md-auto">
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
                                    <div class="col-md-auto">
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
                    @endif

                </div>
                <!-- Content - CLOSE -->

            </div>
            <!-- Modal body - CLOSE -->

        </div>
    </div>
</div>
<!-- View user modal - OPEN -->
