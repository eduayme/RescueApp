<!-- Edit user button - OPEN -->
<span data-toggle="modal" href="#viewModal-{{ $role->id }}">
    <button type="button" class="btn btn-sm btn-outline-dark">
        <span class="octicon octicon-eye"></span>
        {{ __('actions.view') }}
    </button>
</span>
<!-- Edit user button - CLOSE -->
<!-- Edit user modal - OPEN -->
<div id="viewModal-{{ $role->id }}" class="modal fade">
    <div class="modal-dialog modal-confirm">

        <!-- Modal content - OPEN -->
        <div class="modal-content">

            <!-- Form edit user - OPEN -->
            {{ Form::model($role) }}
                @csrf
                {{method_field('PUT')}}

                <!-- Modal header - OPEN -->
                <div class="modal-header">
                    Role Details
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                </div>
                <!-- Modal header - CLOSE -->

                <!-- Modal body - OPEN -->
                <div class="modal-body text-center">

                    <div class="container pad-sm">
                        <div class="row justify-content-center">

                            <div class="col-12">
                                <div class="row margin-top-sm">
                                    <div class="col-6">
                                        <div class="text-left">
                                            Display Name:
                                        </div>
                                        {{ Form::text('display_name', null, array('class' => 'form-control')) }}
                                    </div>
                                    <div class="col-6">
                                        <div class="text-left">
                                            Slug:
                                        </div>
                                        {{ Form::text('name', null, array('class' => 'form-control')) }}
                                    </div>
                                </div>
                                <div class="row margin-top-sm">
                                    <div class="col-12">
                                        <div class="text-left">
                                            Description:
                                        </div>
                                        {{ Form::text('description', null, array('class' => 'form-control')) }}
                                    </div>
                                </div>
                                <div class="row margin-top-sm">
                                    <div class="text-left">
                                        Permissions: 

                                    </div>
                                    <div class="col-12">
{{--                                             {{$role->permission->pluck('name')}} --}}
                                            @foreach ($role->permissions as $r)
                                                <li>{{ $r->display_name }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;({{$r->description}})</li>
                                            @endforeach
                                    </div>
                                </div>
                                <div class="row margin-top-sm">
                                    <div class="col-6">
                                        <div class="text-left">
                                            {{ __('main.created_at') }}:
                                        </div>
                                        <h5>
                                            @php
                                                $date = new Date($role->created_at);
                                                echo $date->format('Y M. d | H:i');
                                            @endphp
                                        </h5>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-left">
                                            {{ __('main.updated_at') }}:
                                        </div>
                                        <h5>
                                            @php
                                                $date = new Date($role->updated_at);
                                                echo $date->format('Y M. d | H:i');
                                            @endphp
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
                </div>
                <!-- Modal footer - CLOSE -->

            {{ Form::close() }}
            <!-- Form - CLOSE -->

        </div>
        <!-- Modal content - CLOSE -->

    </div>
</div>
<!-- Edit user modal - CLOSE -->
