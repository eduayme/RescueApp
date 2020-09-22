<!-- Content - OPEN -->
<div class="container margin-top padding-bottom">
	@include('searches.tasks.task_table')

	<div class="container padding-top">
        <div class="row align-items-start">
            <div class="col">
        		<div class="text-left">
                    <!-- Add Task - OPEN -->
                    <a href="{{ Route('createTask', $search->id) }}" class="btn btn-lg btn-outline-primary margin-left align-right btn-sm margin-bottom" role="button"
                    <?php if ($search->status == 1 || Auth::user()->profile == 'guest'){ ?> style="display: none" <?php } ?> >
                        <span class="octicon octicon-plus"></span>
                        {{ __('actions.create') . ' ' . __('main.task') }}
                    </a>
                    <!-- Add Task - CLOSE -->
        		</div>
            </div>
        <!-- Select filter -->
        <div class="col">
            <div class="text-right">
                <!-- Status -->
                <div class="row">
                    <div class="col">
                <select id="statusFilter" class="form-control">
                    <option value="">
                        {{ __('activity.every_status') }}
                    </option>
                    <option>{{ __('activity.done') }}</option>
                    <option>{{ __('activity.in_progress') }}</option>
                    <option>{{ __('activity.to_do') }}</option>
                </select>
                    </div>
                <!-- Group -->
                <div class="col">
                <select id="groupFilter" class="form-control">
                    <option value="">
                        {{ __('activity.all_groups') }}
                    </option>
                    @foreach($taskGroups as $taskG)
                        <option>{{ $taskG }}</option>
                    @endforeach
                </select>
                </div>
                <!-- Type -->
                <div class="col">
                <select id="typeFilter" class="form-control">
                    <option value="">
                        {{ __('activity.all_types') }}
                    </option>
                    @foreach($taskTypes as $taskT)
                        <option>{{ $taskT }}</option>
                    @endforeach
                </select>
                </div>
                </div>
            </div>
        </div>
	</div>
</div>
</div>
<!-- Content - CLOSE -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>