<!-- Edit user button - OPEN -->
<span data-toggle="modal" href="#editLeaderModal-{{ $leader->id }}">
    <button type="button" class="btn btn-sm btn-outline-dark btn-margin">
        <span class="octicon octicon-pencil"></span>
    </button>
</span>
<!-- Edit user button - CLOSE -->
<!-- Edit user modal - OPEN -->
<div id="editLeaderModal-{{ $leader->id }}" class="modal fade">
    <div class="modal-dialog modal-confirm">

        <!-- Modal content - OPEN -->
        <div class="modal-content">

            <!-- Form edit leader - OPEN -->
            {{ Form::model($leader, array('route' => array('leaders.update', $leader->id))) }}
                @csrf
                @method('PUT')

                <!-- Modal header - OPEN -->
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold ml-3">
                    {{ __('actions.edit') . ' ' . __('leader.leader') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                </div>
                <!-- Modal header - CLOSE -->

                <!-- Modal body - OPEN -->
                <div class="modal-body text-left">
                <div class="col-12">
                        <div class="row margin-top-sm">
                            <div class="col-6">
                                {{ Form::label('leader_code', __('leader.id')) }}
                                <input type="text" name="leader_code" value="{{ $leader->leader_code }}"
                                class="form-control {{ $errors->has('leader_code') ? ' is-invalid' : '' }}">
                            </div>
                            <div class="col-6">
                                {{ Form::label('phone', __('leader.phone')) }}
                                <input type="text" name="phone" value="{{ $leader->phone }}"
                                class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}">
                            </div>
                        </div>
                        <div class="row margin-top-sm">
                            <div class="col-12">
                                {{ Form::label('name', __('leader.name')) }}
                                <input type="text" name="name" value="{{ $leader->name }}"
                                class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}">
                            </div>
                        </div>
                        <div class="row margin-top-sm">
                            <div class="col-6">
                                {{ Form::label('start', __('leader.start')) }}
                                <input type="text" name="start" value="{{ $leader->start }}"
                                class="form-control {{ $errors->has('start') ? ' is-invalid' : '' }}">
                            </div>
                            <div class="col-6">
                                {{ Form::label('end', __('leader.end')) }}
                                <input type="text" name="end" value="{{ $leader->end }}"
                                class="form-control {{ $errors->has('end') ? ' is-invalid' : '' }}">
                            </div>
                        </div>
                    </div>
                    <!-- col-12 - CLOSE -->
                </div>
                <!-- Modal body - CLOSE -->

                <!-- Modal footer - OPEN -->
                <div class="modal-footer">
                    <a class="btn btn-light" data-dismiss="modal">
                        {{ __('actions.cancel') }}
                    </a>
                    <!-- Edit button - OPEN -->
                    {{ Form::submit( __('actions.save'), array('class' => 'btn btn-primary') ) }}
                    <!-- Edit button - CLOSE -->
                </div>
                <!-- Modal footer - CLOSE -->

            {{ Form::close() }}
            <!-- Form edit leader - CLOSE -->
        </div>
        <!-- Modal content - CLOSE -->
    </div>
    <!-- Modal dialog - CLOSE -->
</div>
<!-- Edit leader modal - CLOSE -->
