<!-- Add group modal - OPEN -->
<div id="addGroupModal" class="modal fade">
    <div class="modal-dialog modal-confirm">

        <!-- Modal content - OPEN -->
        <div class="modal-content">
            <!-- Form register - OPEN -->
            <form id="addGroupForm" method="POST">
            @csrf
                {{ Form::hidden('addGroupRoute', route('groups.store')) }}
                {{ Form::hidden('search_id', $search_id) }}

                <!-- Modal header - OPEN -->
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold ml-3">
                        {{ __('actions.add') . ' ' . __('group.group') }}
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
                                <select id="status" name="status" class="form-control" name="profile" required>
                                    <option value="1"> {{ __('group.status_active') }} </option>
                                    <option value="0"> {{ __('group.status_closed') }} </option>
                                </select>
                            </div>
                            <div class="col-6">
                                <div class="text-left">
                                    {{ __('group.vehicle') }}:
                                </div>
                                {{ Form::text('vehicle', null, array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="row margin-top-sm">
                            <div class="col-6">
                                <div class="text-left">
                                    {{ __('group.broadcast') }}:
                                </div>
                                {{ Form::text('broadcast', null, array('class' => 'form-control')) }}
                            </div>
                            <div class="col-6">
                                <div class="text-left">
                                    {{ __('group.gps') }}:
                                </div>
                                {{ Form::text('gps', null, array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="row margin-top-sm">
                            <div class="col-12">
                                <div class="text-left">
                                    {{ __('group.people_involved') }}:
                                </div>
                                {{ Form::textarea('people_involved', null, array('class' => 'form-control','rows'=> 3, 'resize' => 'none')) }}
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
                    <button type="button" class="btn btn-primary" id="btn_add_group">
                        {{ __('actions.add') }}
                    </button>
                    <!-- Register button - CLOSE -->
                </div>
                <!-- Modal footer - CLOSE -->
            </form>
            <!-- Form register - CLOSE -->
        </div>
        <!-- Modal content - CLOSE -->
    </div>
    <!-- Modal dialog - CLOSE -->
</div>
<!-- Add group modal - CLOSE -->

<!-- JS -->
<script src="{{ asset('js/functions/groups.js') }}"></script>
