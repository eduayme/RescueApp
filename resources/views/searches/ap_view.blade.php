
<!-- Align right - OPEN -->
<div class="col text-right">

    @if (count($action_plans) < 3)
        <!-- Add lost person - OPEN -->
        <form action="{{ route('actionplan.create') }}/{{ $search->id }}" method="post" style="display: inline">
            @csrf
            <button type="submit" class="btn btn-outline-primary margin-left margin_top_bottom btn-sm"
                    <?php if ($search->status == 1 || Auth::user()->profile == 'guest'){ ?> style="display: none" <?php } ?> >
                <span class="octicon octicon-plus"></span>
                {{ __('actions.add_version') }}
            </button>
        </form>
        <!-- Add lost person - CLOSE -->
    @endif
    <!-- Edit search button - OPEN -->
        <a href="#" data-ap="{{$ap->version}}"
           role="button" class="edit btn btn-outline-secondary margin-left margin_top_bottom btn-sm"
           <?php if ($search->status == 1 || Auth::user()->profile == 'guest'){ ?> style="display: none" <?php } ?> >
            <span class="octicon octicon-pencil"></span>
        </a>
        <!-- Edit search button - CLOSE -->

        <!-- Delete search button- OPEN -->
        <span data-toggle="modal" href="#deleteModalV{{$ap->version}}"
              <?php if (Auth::user()->profile == 'guest'){ ?> style="display: none" <?php } ?> >
                <button class="btn btn-outline-danger margin-left margin_top_bottom btn-sm">
                    <span class="octicon octicon-trashcan"></span>
                </button>
            </span>
        <!-- Delete search button- CLOSE -->
<!-- Delete search modal - OPEN -->
    <form action="{{ route('actionplan.destroy', $search->id) }}" method="post" style="display: inline">
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


    <div class="container container-fluid border border-secondary rounded margin_top_bottom margin-top box text-center">
        <div class="row">
            <div class="col-md-8 margin-top-sm-sm">
                <div class="col-md-12" style="margin-top:30px;"><h3 style="text-align: left;">{{ __('main.description') }}</h3></div>
                <div class="col-md-12"> <p class="description{{$ap->version}} description">{{$ap->description}}
                    </p></div>
                <form class="descform form{{$ap->version}}"  data-searchid="{{$ap->search_id}}"  style="display:none;">
                    @csrf
                    <textarea class="input{{$ap->version}}"></textarea>

                    <input type="submit"  value="{{ __('actions.save') }}"  class="btn btn-default">
                </form>
            </div>
            <div class="col-md-6 margin-top-sm-sm">
                <div class="col-md-12">
                </div>
                <div class="col-md-12 invest version_{{$ap->version}}">
                    <h3 style="text-align:left;">{{ __('main.investigation') }}</h3>
                    <br>
                    @include("searches.form", ["task"=>$ap->task1, "taskid"=>1])
                    @include("searches.form", ["task"=>$ap->task2, "taskid"=>2])
                    @include("searches.form", ["task"=>$ap->task3, "taskid"=>3])
                    @include("searches.form", ["task"=>$ap->task4, "taskid"=>4])
                    @include("searches.form", ["task"=>$ap->task5, "taskid"=>5])
                    @include("searches.form", ["task"=>$ap->task6, "taskid"=>6])
                </div>
            </div>
            <div class="col-md-6">
               <div class="mapembed version{{$ap->version}} mapembed">
                   {!! $ap->mapembed !!}
               </div>
                <form class="form_embed_{{$ap->version}} embedform" data-searchid="{{$ap->search_id}}"  data-ap="{{$ap->version}}"  data-taskid="6" style="display:none;">
                    @csrf
                    <input class="embed" placeholder="{{ __('main.pastemap') }}" ></input>

                    <button type="submit"  class="btn btn-default"><span class="octicon octicon-check"></span></button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Align right - CLOSE -->
