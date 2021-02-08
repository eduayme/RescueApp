<!-- Edit user button - OPEN -->
<span data-toggle="modal" href="#editGroupModal-{{ $group->id }}">
    <button type="button" class="btn btn-sm btn-outline-dark btn-margin">
        <span class="octicon octicon-pencil"></span>
    </button>
</span>
<!-- Edit user button - CLOSE -->
<!-- Edit user modal - OPEN -->
<div id="editGroupModal-{{ $group->id }}" class="modal fade">
    <div class="modal-dialog modal-confirm">

        <!-- Modal content - OPEN -->
        <div class="modal-content">

            <!-- Form edit group - OPEN -->
            {{ Form::model($group, array('route' => array('groups.update', $group->id))) }}
                @csrf
                @method('PUT')

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
                                    {{ __('group.status') }}
                                </div>
                                <select name="is_active" class="form-control" required>
                                    <option value="1" {{ ($group->is_active == '1') ? 'selected' : '' }}>
                                        {{ __('group.is_active') }}
                                    </option>
                                    <option value="0" {{ ($group->is_active == '0') ? 'selected' : '' }}>
                                        {{ __('group.is_closed') }}
                                    </option>
                                </select>
                            </div>
                            <div class="col-6">
                                <div class="text-left">
                                    {{ __('group.vehicle') }}
                                </div>
                                <input type="text" name="vehicle" value="{{ $group->vehicle }}"
                                class="form-control {{ $errors->has('vehicle') ? ' is-invalid' : '' }}">
                            </div>
                        </div>
                        <div class="row margin-top-sm">
                            <div class="col-6">
                                <div class="text-left">
                                    {{ __('group.broadcast') }}
                                </div>
                                <input type="text" name="broadcast" value="{{ $group->broadcast }}"
                                class="form-control {{ $errors->has('broadcast') ? ' is-invalid' : '' }}">
                            </div>
                            <div class="col-6">
                                <div class="text-left">
                                    {{ __('group.gps') }}
                                </div>
                                <input type="text" name="gps" value="{{ $group->gps }}"
                                class="form-control {{ $errors->has('gps') ? ' is-invalid' : '' }}">
                            </div>
                        </div>
                        <div class="row margin-top-sm">
                            <div class="col-12">
                                <div class="text-left">
                                    {{ __('group.people_involved') }}
                                </div>
                                <textarea name="people_involved" class="form-control">{{ $group->people_involved }}</textarea>
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
                    <!-- Edit button - OPEN -->
                    <button type="submit" class="btn btn-primary">
                        {{ __('actions.edit') }}
                    </button>
                    <!-- Edit button - CLOSE -->
                </div>
                <!-- Modal footer - CLOSE -->

            {{ Form::close() }}
            <!-- Form edit group - CLOSE -->
        </div>
        <!-- Modal content - CLOSE -->
    </div>
    <!-- Modal dialog - CLOSE -->
</div>
<!-- Edit group modal - CLOSE -->
