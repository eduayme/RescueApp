
<!-- Align right - OPEN -->
<div class="text-right">

    <!-- Edit search button - OPEN -->
    <span data-toggle="modal" href="#editModalV{{$ap->version}}">
        <button class="edit btn btn-outline-secondary margin-left margin-top-bottom btn-sm"
        <?php if ($search->status == 1 || Auth::user()->profile == 'guest'){ ?> style="display: none" <?php } ?> >
            <span class="octicon octicon-pencil"></span>
            {{ __('actions.edit') }}
        </button>
    </span>
    <!-- Edit search button - CLOSE -->

    <!-- Edit search modal - OPEN -->
    <!-- Modal - OPEN -->
    <div id="editModalV{{$ap->version}}" class="modal fade">
        <div class="modal-dialog modal-lg modal-dialog-centered">

            <!-- Modal content - OPEN -->
            <div class="container modal-content">
                <div class="modal-header" style="border: no">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="row">
                    <div class="col-md-12 margin-top-sm">
                        {{ Form::model($ap, array('route' => array('actionplan.update', $ap->id), 'method' => 'POST')) }}
                            <h3 class="text-left"> {{ __('main.description') }} </h3>
                            {{ Form::textarea('description', null, array('class' => 'form-control', 'rows' => 10)) }}
                            <!-- Submit button - OPEN -->
                            <div class="text-center margin-top-bottom">
                                {{ Form::submit( __('actions.save'), array('class' => 'btn btn-primary') ) }}
                            </div>
                            <!-- Submit button - OPEN -->
                        {{ Form::close() }}
                    </div>

                    <div class="col-md-12 margin-top-sm margin-bottom">
                        <div class="invest version_{{$ap->version}} text-left">
                            <h3> {{ __('main.investigation') }} </h3>

                            @php
                                $size = sizeof($ap->to_do_tasks);
                                $count = 1;
                            @endphp
                            @foreach( $ap->to_do_tasks as $task )
                                {{ Form::model($task, array('class' => 'task-form', 'route' => array('todotask.update', $task->id), 'method' => 'POST')) }}
                                    @php
                                        if( $count < $size )
                                        {
                                            echo "<div class='row to_do_task'>";
                                            $count++;
                                        }
                                        else
                                            echo "<div class='row'>";
                                    @endphp
                                        <div class="col-md-9 margin-top-sm-sm margin-bottom-sm-sm">
                                            <p> {{ $task->getName() }} </p>
                                        </div>
                                        <div class="col-md-3 margin-top-sm-sm margin-bottom-sm-sm">
                                            <select id="state" class="form-control task-select" name="state" onchange="this.form.submit()">
                                                <option value="to_do" {{ ($task->state == 'to_do') ? 'selected' : '' }}>
                                                    {{ __('activity.to_do') }}
                                                </option>
                                                <option value="in_progress" {{ ($task->state == 'in_progress') ? 'selected' : '' }}>
                                                    {{ __('activity.in_progress') }}
                                                </option>
                                                <option value="done" {{ ($task->state == 'done') ? 'selected' : '' }}>
                                                    {{ __('activity.done') }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                {{ Form::close() }}
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal - CLOSE -->

    <!-- Delete search button - OPEN -->
    <span data-toggle="modal" href="#deleteModalV{{$ap->version}}"
    <?php if (Auth::user()->profile == 'guest'){ ?> style="display: none" <?php } ?> >
        <button class="btn btn-outline-danger margin-left margin-top-bottom btn-sm">
            <span class="octicon octicon-trashcan"></span>
            {{ __('actions.delete') }}
        </button>
    </span>
    <!-- Delete search button- CLOSE -->

    <!-- Delete search modal - OPEN -->
    <form action="{{ route('actionplan.destroy', $ap->id) }}" method="post" style="display: inline">
    @csrf
    @method('DELETE')
        <!-- Modal - OPEN -->
        <div id="deleteModalV{{$ap->version}}" class="modal fade">
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
    <!-- Delete search modal - CLOSE -->

</div>
<!-- Align right - CLOSE -->

<!-- Action Plan content - OPEN -->
<div class="container container-fluid border border-secondary rounded margin-top-bottom margin-top box text-center">
    <div class="row">

        <div class="col-md-6 margin-top-sm">
            <h3 class="text-left"> {{ __('main.description') }} </h3>
            <p class="description{{$ap->version}} description">
                {{ $ap->description }}
            </p>
        </div>

        <div class="col-md-6 margin-top-sm">
            <div class="invest version_{{$ap->version}}">
                <h3 class="text-left"> {{ __('main.investigation') }} </h3>
                <div class="margin-top-bottom text-left">

                    @foreach( $ap->to_do_tasks as $task )
                        <div class='row to_do_task'>
                            <div class="col-10">
                                <p> {{ $task->getName() }} </p>
                            </div>
                            <div class="col-2">
                                @if( $task->state == "to_do" )
                                    <span class="badge badge-danger margin-top-sm margin-left-30">
                                        {{ __('activity.to_do') }}
                                    </span>
                                @elseif( $task->state == "in_progress" )
                                    <span class="badge badge-warning margin-top-sm margin-left-30">
                                        {{ __('activity.in_progress') }}
                                    </span>
                                @elseif( $task->state == "done" )
                                    <span class="badge badge-success margin-top-sm margin-left-30">
                                        {{ __('activity.done') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Action Plan content - CLOSE -->

<!-- JS -->
<script>

    $(document).ready(function() {
        // change to do tasks selectors style
        var tasks = document.getElementsByClassName('task-select');
        for( var i = 0; i < tasks.length; i++ ) {
            if( tasks[i].value == "to_do" ) {
                tasks[i].style.backgroundColor = '#FFE0E0';
                tasks[i].style.color = '#6F2323';
            }
            else if( tasks[i].value == "in_progress" ) {
                tasks[i].style.backgroundColor = '#F9EDC7';
                tasks[i].style.color = '#794C35';
            }
            else if( tasks[i].value == "done" ) {
                tasks[i].style.backgroundColor = '#D2F0CD';
                tasks[i].style.color = '#153311';
            }
        }
    });

</script>
