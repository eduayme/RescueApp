<!-- Edit user button - OPEN -->
<span data-toggle="modal" href="#editModal-{{ $entry->id }}">
    <button type="button" class="btn btn-sm btn-outline-dark btn-margin"
            data-toggle="tooltip" data-placement="left" title="{{ __('actions.edit') }}">
        <span class="octicon octicon-pencil"></span>
    </button>
</span>
<!-- Edit user button - CLOSE -->
<!-- Edit user modal - OPEN -->
<div id="editModal-{{ $entry->id }}" class="modal fade">
    <div class="modal-dialog modal-confirm">

        <!-- Modal content - OPEN -->
        <form class="modal-content" action="{{ route('update_involved_people', $entry->id) }}" method="post">
        @csrf
        @method('PUT')

        <!-- Modal header - OPEN -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
            </div>
            <!-- Modal header - CLOSE -->

            <!-- Modal body - OPEN -->
            <div class="modal-body text-center">

                <!-- Incident ID - OPEN -->
                <h3 class="text-center">
                    {{ __('main.people_involved') }} {{ $entry->id }}
                </h3>
                <!-- Incident ID - CLOSE -->

                <div class="container pad-sm">
                    <div class="row justify-content-center">
                        <div class="form-group col-md-6">
                            {{ Form::label('name', __('main.involved_name')) }}
                            <input type="text" name="name" value="{{ $entry->name }}"
                                   class="form-control text-center {{ $errors->has('name') ? ' is-invalid' : '' }}" />
                        </div>
                        <div class="form-group col-md-6">
                            {{ Form::label('number', __('main.involved_total_people')) }}
                            <input type="text" name="number" value="{{ $entry->total_people }}"
                                   class="form-control text-center {{ $errors->has('total_people') ? ' is-invalid' : '' }}" />
                        </div>
                        <div class="form-group col-md-6">
                            {{ Form::label('vehicle', __('main.involved_vehicle')) }}
                            <input type="text" name="vehicle" value="{{ $entry->vehicle }}"
                                   class="form-control text-center {{ $errors->has('vehicle') ? ' is-invalid' : '' }}" />
                        </div>
                        <div class="form-group col-md-6">
                            {{ Form::label('phone', __('main.involved_phone')) }}
                            <input type="text" name="phone" value="{{ $entry->phone_number }}"
                                   class="form-control text-center {{ $errors->has('phone_number') ? ' is-invalid' : '' }}" />
                        </div>
                        <div class="form-group col-md-12">
                            {{ Form::label('people', __('main.involved_people')) }}
                            {{ Form::textarea('people', $entry->people, array('class' => 'form-control', 'rows' => 2)) }}
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
            {{ Form::submit( __('actions.save'), array('class' => 'btn btn-primary') ) }}
            <!-- Register button - CLOSE -->
            </div>
            <!-- Modal footer - CLOSE -->

        </form>
        <!-- Form - CLOSE -->

        </div>
        <!-- Modal content - CLOSE -->

    </div>
</div>
<!-- Edit user modal - CLOSE -->
