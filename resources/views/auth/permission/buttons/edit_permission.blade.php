<!-- Edit user button - OPEN -->
<span data-toggle="modal" href="#editModal-{{ $permission->id }}">
    <button type="button" class="btn btn-sm btn-outline-dark">
        <span class="octicon octicon-pencil"></span>
        {{ __('actions.edit') }}
    </button>
</span>
<!-- Edit user button - CLOSE -->
<!-- Edit user modal - OPEN -->
<div id="editModal-{{ $permission->id }}" class="modal fade">
    <div class="modal-dialog modal-confirm">

        <!-- Modal content - OPEN -->
        <div class="modal-content">

            <!-- Form edit user - OPEN -->
            {{ Form::model($permission, array('route' => array('permissions.update', $permission->id) )) }}
                @csrf
                {{method_field('PUT')}}

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

                            <div class="col-12">
                                <div class="row margin-top-sm">
                                    <div class="col-6">
                                        <div class="text-left">
                                            {{ __('permissions_roles.display_name') }}
                                        </div>
                                        {{ Form::text('display_name', null, array('class' => 'form-control')) }}
                                    </div>
                                    <div class="col-6">
                                        <div class="text-left">
                                            {{ __('permissions_roles.name') }}
                                        </div>
                                        {{ Form::text('name', null, array('class' => 'form-control')) }}
                                    </div>
                                </div>
                                <div class="row margin-top-sm">
                                    <div class="col-12">
                                        <div class="text-left">
                                            {{ __('forms.description') }}
                                        </div>
                                        {{ Form::text('description', null, array('class' => 'form-control')) }}
                                    </div>
                                </div>
                                <div class="row margin-top-sm">
                                    <div class="col-6">
                                        <div class="text-left">
                                            {{ __('main.created_at') }}:
                                        </div>
                                        <h5>
                                            @php
                                                $date = new Date($permission->created_at);
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
                                                $date = new Date($permission->updated_at);
                                                echo $date->format('d M. Y | H:i');
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
