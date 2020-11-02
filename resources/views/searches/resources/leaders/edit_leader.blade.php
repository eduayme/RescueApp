
<!-- Edit leader modal - OPEN -->
<div id="editLeaderModal" class="modal fade">
    <div class="modal-dialog modal-confirm">

        <!-- Modal content - OPEN -->
        <div class="modal-content">

            <!-- Form edit leader - OPEN -->
            <form method="POST">
                @csrf
                {{ Form::hidden('editLeaderRoute', route('leaders.update',['leader' => 'leader_id'])) }}       
                {{ Form::hidden('leader_id', null) }}
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
                                <div class="text-left">
                                    {{ __('leader.id') }}:
                                </div>
                                {{ Form::text('edit_leaderCode', null, array('class' => 'form-control')) }}
                            </div>
                            <div class="col-6">
                                <div class="text-left">
                                    {{ __('leader.phone') }}:
                                </div>
                                {{ Form::text('edit_phone', null, array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="row margin-top-sm">
                            <div class="col-12">
                                <div class="text-left">
                                    {{ __('leader.name') }}:
                                </div>
                                {{ Form::text('edit_name', null, array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="row margin-top-sm">
                            <div class="col-6">
                                <div class="text-left">
                                    {{ __('leader.start') }}:
                                </div>
                                {{ Form::text('edit_start', null, array('class' => 'form-control')) }}
                            </div>
                            <div class="col-6">
                                <div class="text-left">
                                    {{ __('leader.end') }}:
                                </div>
                                {{ Form::text('edit_end', null, array('class' => 'form-control')) }}
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
                    <button type="button" class="btn btn-primary" id="btn_edit_leader">
                        {{ __('actions.save') }}
                    </button>
                    <!-- Edit button - CLOSE -->
                </div>
                <!-- Modal footer - CLOSE -->            
            </form>
            <!-- Form edit leader - CLOSE -->
        </div>
        <!-- Modal content - CLOSE -->     
    </div>
    <!-- Modal dialog - CLOSE -->   
</div>
<!-- Edit leader modal - CLOSE -->
