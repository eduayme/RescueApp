<!-- Content - OPEN -->
<div class="margin-top padding-bottom">

    <!-- Filters and add button - OPEn -->
    <div class="row align-items-start">

        <!-- Select filter - OPEN -->
        <div class="form-group col-md-9 text-right">

            <!-- Filters - OPEN -->
            <div class="row">

                <!-- Status filter - OPEN -->
                <div class="col">
                    <select id="statusFilter" class="form-control">
                        <option value="">
                            {{ __('actions.filter_by_status') }}
                        </option>
                        <option>{{ __('activity.done') }}</option>
                        <option>{{ __('activity.in_progress') }}</option>
                        <option>{{ __('activity.to_do') }}</option>
                    </select>
                </div>
                <!-- Status filter - CLOSE -->

                <!-- Group filter - OPEN -->
                <div class="col">
                    <select id="groupFilter" class="form-control">
                        <option value=""> {{ __('actions.filter_by_groups') }} </option>
                        @foreach($taskGroups as $taskG)
                            <option>{{ $taskG }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Group filter - CLOSE -->

                <!-- Type filter - OPEN -->
                <div class="col">
                    <select id="typeFilter" class="form-control">
                        <option value=""> {{ __('actions.filter_by_types') }} </option>
                        @foreach($taskTypes as $taskT)
                            <option>{{ $taskT }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Type filter - CLOSE -->

            </div>
            <!-- Filters - CLOSE -->

        </div>
        <!-- Select filter - CLOSE -->

        <!-- Add Task - OPEN -->
        <div class="form-group col-md-3 text-right">
            <a href="{{ Route('createTask', $search->id) }}" class="btn btn-lg btn-outline-primary margin-left align-right btn-sm margin-bottom" role="button"
            <?php if ($search->status == 1 || Auth::user()->profile == 'guest'){ ?> style="display: none" <?php } ?> >
                <span class="octicon octicon-plus"></span>
                {{ __('actions.create') . ' ' . __('main.task') }}
            </a>
        </div>
        <!-- Add Task - CLOSE -->

    </div>
    <!-- Filters and add button - CLOSE -->

    @include('searches.tasks.task_table')
</div>
<!-- Content - CLOSE -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
</div>
<!-- Content - CLOSE -->
