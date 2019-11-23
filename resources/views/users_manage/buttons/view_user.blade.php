<!-- View user button - OPEN -->
<span data-toggle="modal" href="#viewModal-{{ $user->id }}">
    <button type="button" class="btn btn-sm btn-outline-dark">
        <span class="octicon octicon-eye"></span>
        {{ __('actions.view') }}
    </button>
</span>
<!-- View user button - CLOSE -->
<!-- View user modal - OPEN -->
<div id="viewModal-{{ $user->id }}" class="modal fade">
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
                @include('users_manage.info_user')
            </div>
            <!-- Modal body - CLOSE -->

        </div>
    </div>
</div>
<!-- View user modal - OPEN -->
