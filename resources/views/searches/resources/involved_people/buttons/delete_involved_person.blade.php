<!-- Delete user button - OPEN -->
<span data-toggle="modal" href="#deleteInvolvedModal-{{ $involved_person->id }}">
    <button type="button" class="btn btn-sm btn-outline-danger btn-margin">
        <span class="octicon octicon-trashcan"></span>
    </button>
</span>
<!-- Delete user button - CLOSE -->
<!-- Delete user modal - OPEN -->
<form action="{{ route('involved_people.destroy', $involved_person->id) }}" method="post">
@csrf
@method('DELETE')

<!-- Modal - OPEN -->
    <div id="deleteInvolvedModal-{{ $involved_person->id }}" class="modal fade">
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
<!-- Delete user modal - CLOSE -->
