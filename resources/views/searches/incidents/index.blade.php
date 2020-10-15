<div class="row">

    <!-- Content - OPEN -->
    <div class="container padding-bottom">
    @if (count($incidents) > 0)

        <div class="text-right">
            <!-- Add Incident - OPEN -->
            <a href="{{ route('incidents.create', ['search_id' => $search->id]) }}" class="btn btn-outline-primary margin-left align-right btn-sm margin-bottom" role="button"
            <?php if ($search->status == 1 || Auth::user()->profile == 'guest'){ ?> style="display: none" <?php } ?> >
                <span class="octicon octicon-plus"></span>
                {{ __('actions.add') . ' ' . __('main.incident') }}
            </a>
            <!-- Add Incident - CLOSE -->
        </div>

        <!-- Incidents - OPEN -->
        @include('searches.incidents.table_incidents', ['items' => $incidents])
        <!-- Incidents - OPEN -->

    @else
        <div class="text-center">
            <img src="/img/add_incident.png" width="400">

            <h4 class="card-title margin-bottom text-secondary">
                {{ __('main.no_incident') }}
            </h4>

            <a href="{{ route('incidents.create', ['search_id' => $search->id]) }}" class="btn btn-primary margin-top-bottom" role="button"
            <?php if ($search->status == 1 || Auth::user()->profile == 'guest'){ ?> style="display: none" <?php } ?> >
                <span class="octicon octicon-plus"></span>
                {{ __('actions.add') . ' ' . __('main.incident') }}
            </a>
        </div>

    @endif
    </div>
    <!-- Content - CLOSE -->

</div>
