<!-- show desctiption button - OPEN -->
<span data-toggle="modal" href="#viewDescriptionModal-{{ $task->id }}">
    <button type="button" class="btn btn-sm btn-outline-secondary btn-margin">
         <span class="octicon octicon-plus"></span>
 		<!-- <span data-icon="octicon bi-plus-square"></span> -->
 <span class="iconify" data-icon="plus-box-outline"></span>
</button>
</span>
<!-- show description button - CLOSE -->

<!-- View description modal - OPEN -->
<div id="viewDescriptionModal-{{ $task->id }}" class="modal fade">
	<div class="modal-dialog modal-dialog-centered">
	    <div class="modal-content">
	    	<div class="modal-header">
	    		<h5 class="modal-title font-weight-bold ml-3"> {{ __('forms.description') }}:</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
	    	</div>
		    <div class="modal-body">
		        <div class="container padding-bottom">
                    <h5>
                        @if ($task->description == NULL)
                            --
                        @else
                            <p class="line-breaks">
                            	{{ $task->description }}
                           	</p>
                        @endif
                    </h5>
				</div>
			</div>
			<div class="modal-footer">
		        <button type="button" class="btn btn-light" data-dismiss="modal">
		        	{{ __('actions.cancel') }}
		        </button>
			</div>
        </div>
    </div>
</div>

<!-- View description modal - OPEN -->
