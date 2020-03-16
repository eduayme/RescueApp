<!-- Edit user button - OPEN -->
<span data-toggle="modal" href="#editModal-{{-- {{ $user->id }} --}}">
    <button type="button" class="btn btn-sm btn-outline-dark">
        <span class="octicon octicon-pencil"></span>
        {{ __('actions.edit') . " Roles" }}
    </button>
</span>
<!-- Edit user button - CLOSE -->
<!-- Edit user modal - OPEN -->
<div id="editModal-{{-- {{ $user->id }} --}}" class="modal fade">
    <div class="modal-dialog modal-confirm">

        <!-- Modal content - OPEN -->
        <div class="modal-content">

            <!-- Form edit user - OPEN -->
            {{-- {{ Form::model($data['role'], array('route' => array('roles.update', $data['role']->id) )) }} --}}
                @csrf
                {{method_field('PUT')}}

                <!-- Modal header - OPEN -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                </div>
                <!-- Modal header - CLOSE -->

                <!-- Modal body - OPEN -->
                <div class="modal-body text-center">

                    <div class="container pad-sm">
                        <div class="row justify-content-center">
                                <div class="row margin-top-sm">
                                    <div class="text-left">
                                        roles:
                                    </div>
                                    <div class="col-12" style="overflow-x: scroll;">
                                        @foreach($data['roles'] as $data['role'])

                                            <input type="checkbox" name="roles['{{ $data['role']->id }}']" id="{{ $data['role']->name }}" value="{{ $data['role']->id }}">&nbsp;&nbsp;
                                            <label for="{{ $data['role']->name }}">{{$data['role']->description}}&nbsp;&nbsp;{{$data['role']->display_name}}</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        @endforeach
                                        {{-- {{ Form::text('description', null, array('class' => 'form-control')) }} --}}
                                    </div>
                                </div>
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
