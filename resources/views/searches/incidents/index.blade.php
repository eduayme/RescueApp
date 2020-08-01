<div class="row">

    <!-- Content - OPEN -->
    <div class="container padding-bottom text-right">
    @if (count($incidents) > 0)

        <!-- Add Incident - OPEN -->
        <button type="submit" class="btn btn-outline-primary margin-left align-right btn-sm"
        <?php if ($search->status == 1 || Auth::user()->profile == 'guest'){ ?> style="display: none" <?php } ?> >
            <span class="octicon octicon-plus"></span>
            {{ __('actions.add') + ' ' + __('actions.incidents') }}
        </button>
        <!-- Add Incident - CLOSE -->

        <!-- Incidents - OPEN -->
        <p> Incidents </p>
        <!-- Incidents - OPEN -->

    @else
        <div class="text-center">
            <img src="/img/add_incident.png" width="400">

            <h4 class="card-title margin-bottom text-secondary">
                {{ __('main.no_incident') }}
            </h4>

            <button type="submit" class="btn btn-primary margin-top-bottom"
            <?php if ($search->status == 1 || Auth::user()->profile == 'guest'){ ?> style="display: none" <?php } ?> >
                <span class="octicon octicon-plus"></span>
                {{ __('actions.add') . ' ' . __('main.incident') }}
            </button>
        </div>

    @endif
    </div>
    <!-- Content - CLOSE -->

</div>

<!-- JS -->
<script>

    $(document).ready(function() {

    });

</script>
