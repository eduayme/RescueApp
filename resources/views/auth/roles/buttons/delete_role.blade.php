<!-- Delete Permission button - OPEN -->
<span data-toggle="modal" href="#deleteModal-{{ $role->id }}">
    <button type="button" class="btn btn-sm btn-outline-danger">
        <span class="octicon octicon-trashcan"></span>
        {{ __('actions.delete') }}
    </button>
</span>
<!-- Delete Permission button - CLOSE -->
<!-- Delete Permission modal - OPEN -->
<form action="{{ route('roles.destroy', $role->id) }}" method="post" style="display: inline">
    @csrf
    @method('DELETE')

    <!-- Modal - OPEN -->
    <div id="deleteModal-{{ $role->id }}" class="modal fade">
        <div class="modal-dialog modal-confirm">

            <!-- Modal content - OPEN -->
            <div class="modal-content">

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
<!-- Delete Permission modal - CLOSE -->
