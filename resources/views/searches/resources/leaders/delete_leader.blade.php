<!-- Delete leader modal - OPEN -->
<form action="" method="post">
    @csrf
    
    <!-- Modal - OPEN -->
    <div id="deleteLeaderModal" class="modal fade">
        <div class="modal-dialog modal-confirm">

            <!-- Modal content - OPEN -->
            <div class="modal-content">
                {{ Form::hidden('deleteLeaderRoute', route('leaders.destroy',['leader' => 'leader_id'])) }}       
                {{ Form::hidden('leader_id', null) }}
                <!-- Modal header - OPEN -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                </div>
                <!-- Modal header - CLOSE -->

                <!-- Modal body - OPEN -->
                <div class="modal-body text-center">
                    <h4>
                        {{ __('messages.are_you_sure') }}
                    </h4>
                </div>
                <!-- Modal body - CLOSE -->
                <div id="delete_error_message_container" class="alert alert-danger alert-dismissible fade show" role="alert" style="display:none">
                    <div class="container text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <p id="delete_error_message">Error goes here !</p>
                    </div>
                </div>
                <!-- Modal footer - OPEN -->
                <div class="modal-footer">
                    <a class="btn btn-light" data-dismiss="modal">
                        {{ __('actions.cancel') }}
                    </a>
                    <button type="button" class="btn btn-danger" id="btn_delete_leader">
                        {{ __('actions.delete') }}
                    </button>
                </div>
                <!-- Modal footer - CLOSE -->

            </div>
            <!-- Modal content - CLOSE -->

        </div>
    </div>
    <!-- Modal - CLOSE -->

</form>
<!-- Delete leader modal - CLOSE -->
