<div class="container pad-sm">
    <div class="row">
        <div class="col-12">
            <img src="/uploads/avatars/{{ $user->avatar }}" class="rounded mx-auto d-block"
            height="200" width="200" id="avatar_img">
        </div>
        <div class="col-12">
            <div class="row margin-top-sm">
                <div class="col-6">
                    <div class="text-left">
                        {{ __('register.name') }}:
                    </div>
                    <h5>
                        {{ $user->name }}
                    </h5>
                </div>
                <div class="col-6">
                    <div class="text-left">
                        {{ __('login.email') }}:
                    </div>
                    <h5>
                        {{ $user->email }}
                    </h5>
                </div>
            </div>
            <div class="row margin-top-sm">
                <div class="col-6">
                    <div class="text-left">
                        {{ __('register.id') }}:
                    </div>
                    <h5>
                        {{ $user->dni }}
                    </h5>
                </div>
                <div class="col-6">
                    <div class="text-left">
                        {{ __('register.profile') }}:
                    </div>
                    <h5>
                        {{ $user->profile }}
                    </h5>
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
                            echo $date->format('H:i | d M. Y');
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
                            echo $date->format('H:i | d M. Y');
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
                            echo $date->format('H:i | d M. Y');
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
