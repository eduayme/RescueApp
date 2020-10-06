<!-- Content - OPEN -->
<div class="container margin-top padding-bottom">
    <div class="text-right">
        <!-- Add Involved People - OPEN -->
        <button id="add_involved_person" data-toggle="modal" data-target="#add_modal" class="btn btn-outline-primary margin-left align-right btn-sm margin-bottom" role="button"
           <?php if ($search->status == 1 || Auth::user()->profile == 'guest'){ ?> style="display: none" <?php } ?> >
            <span class="octicon octicon-plus"></span>
            {{ __('actions.add') . ' ' . __('main.people_involved') }}
        </button>
        <!-- Add Involved People - CLOSE -->
        @if(Session::has('sucecss'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        @include('searches.resources.people.table')
    </div>
</div>
<!-- Content - CLOSE -->

<!-- Add Modal - OPEN -->
    @include('searches.resources.people.add')
<!-- Add Modal - Close -->
