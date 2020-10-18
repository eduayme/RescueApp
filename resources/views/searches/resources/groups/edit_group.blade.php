
<!-- Edit group modal - OPEN -->
<div id="editGroupModal" class="modal fade">
    <div class="modal-dialog modal-confirm">

        <!-- Modal content - OPEN -->
        <div class="modal-content">

            <!-- Form edit group - OPEN -->
            <form method="POST">
                @csrf
                {{ Form::hidden('editGroupRoute', route('groups.update',['group' => 'group_id'])) }}
                {{ Form::hidden('group_id', null) }}
                <!-- Modal header - OPEN -->
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold ml-3">
                    {{ __('actions.edit') . ' ' . __('group.group') }}
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
                                <div class="text-left">
                                    {{ __('group.status') }}:
                                </div>
                                <select name="edit_status" class="form-control" name="profile" required>
                                    <option value="1"> {{ __('group.status_active') }} </option>
                                    <option value="0"> {{ __('group.status_closed') }} </option>
                                </select>
                            </div>
                            <div class="col-6">
                                <div class="text-left">
                                    {{ __('group.vehicle') }}:
                                </div>
                                {{ Form::text('edit_vehicle', null , array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="row margin-top-sm">
                            <div class="col-6">
                                <div class="text-left">
                                    {{ __('group.broadcast') }}:
                                </div>
                                {{ Form::text('edit_broadcast', null, array('class' => 'form-control')) }}
                            </div>
                            <div class="col-6">
                                <div class="text-left">
                                    {{ __('group.gps') }}:
                                </div>
                                {{ Form::text('edit_gps', null, array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="row margin-top-sm">
                            <div class="col-12">
                                <div class="text-left">
                                    {{ __('group.people_involved') }}:
                                </div>
                                {{ Form::textarea('edit_people_involved', null, array('class' => 'form-control','rows'=> 3, 'resize' => 'none')) }}
                            </div>
                        </div>
                    </div>   <!-- col-12 - CLOSE -->
                </div> <!-- Modal body - CLOSE -->
                <div id="edit_error_message_container" class="alert alert-danger alert-dismissible fade show" role="alert" style="display:none">
                    <div class="container text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <p id="edit_error_message">Error goes here !</p>
                    </div>
                </div>
                <!-- Modal footer - OPEN -->
                <div class="modal-footer">
                    <a class="btn btn-light" data-dismiss="modal">
                        {{ __('actions.cancel') }}
                    </a>
                    <!-- Edit button - OPEN -->
                    <button type="button" class="btn btn-primary" id="btn_edit_group">
                        {{ __('actions.edit') }}
                    </button>
                    <!-- Edit button - CLOSE -->
                </div>
                <!-- Modal footer - CLOSE -->
            </form>
            <!-- Form edit group - CLOSE -->
        </div>
        <!-- Modal content - CLOSE -->
    </div>
    <!-- Modal dialog - CLOSE -->
</div>
<!-- Edit group modal - CLOSE -->
