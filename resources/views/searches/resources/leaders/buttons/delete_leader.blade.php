<!-- Delete leader button - OPEN -->
<span data-toggle="modal" href="#deleteLeaderModal-{{ $leader->id }}">
    <button type="button" class="btn btn-sm btn-outline-danger btn-margin">
        <span class="octicon octicon-trashcan"></span>
    </button>
</span>
<!-- Delete leader button - CLOSE -->
<!-- Delete leader modal - OPEN -->
<form action="{{ route('leaders.destroy', $leader->id) }}" method="post">
    @csrf
    @method('DELETE')

    <!-- Modal - OPEN -->
    <div id="deleteLeaderModal-{{ $leader->id }}" class="modal fade">
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
                    <button type="submit" class="btn btn-danger">
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
