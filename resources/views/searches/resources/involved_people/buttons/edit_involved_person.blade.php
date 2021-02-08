<!-- Edit user button - OPEN -->
<span data-toggle="modal" href="#editInvolvedModal-{{ $involved_person->id }}">
    <button type="button" class="btn btn-sm btn-outline-dark btn-margin">
        <span class="octicon octicon-pencil"></span>
    </button>
</span>
<!-- Edit user button - CLOSE -->
<!-- Edit user modal - OPEN -->
<div id="editInvolvedModal-{{ $involved_person->id }}" class="modal fade">
    <div class="modal-dialog modal-confirm">

        <!-- Modal content - OPEN -->
        <div class="modal-content">

            {{ Form::model($involved_person, array('route' => array('involved_people.update', $involved_person->id))) }}
            @csrf
            @method('PUT')

            <!-- Modal header - OPEN -->
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold ml-3">
                    {{ __('actions.edit') . ' ' . __('involved_people.involved_person') }}
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
                                {{ __('involved_people.name') }}
                            </div>
                            <input type="text" name="name" value="{{ $involved_person->name }}"
                            class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}">
                        </div>
                        <div class="col-6">
                            <div class="text-left">
                                {{ __('involved_people.total') }}
                            </div>
                            <input type="number" name="total_people" value="{{ $involved_person->total_people }}"
                            class="form-control {{ $errors->has('total_people') ? ' is-invalid' : '' }}">
                        </div>
                    </div>

                    <div class="row margin-top-sm">
                        <div class="col-6">
                            <div class="text-left">
                                {{ __('involved_people.vehicle') }}
                            </div>
                            <input type="text" name="vehicle" value="{{ $involved_person->vehicle }}"
                            class="form-control {{ $errors->has('vehicle') ? ' is-invalid' : '' }}">
                        </div>
                        <div class="col-6">
                            <div class="text-left">
                                {{ __('involved_people.phone') }}
                            </div>
                            <input type="text" name="phone_number" value="{{ $involved_person->phone_number }}"
                            class="form-control {{ $errors->has('phone_number') ? ' is-invalid' : '' }}">
                        </div>
                    </div>
                    <div class="row margin-top-sm">
                        <div class="col-12">
                            <div class="text-left">
                                {{ __('involved_people.people') }}
                            </div>
                            <textarea name="people" class="form-control">{{ $involved_person->people }}</textarea>
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

        {{ Form::close() }}
        <!-- Form - CLOSE -->

        </div>
        <!-- Modal content - CLOSE -->

    </div>
</div>
<!-- Edit user modal - CLOSE -->
