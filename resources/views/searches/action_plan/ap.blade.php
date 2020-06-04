<!-- Top buttons - OPEN -->
<div class="row">

    <!-- Content - OPEN -->
    <div class="container margin-top padding-bottom text-right">
    @if (count($action_plans) > 0)

        <!-- Add action plan - OPEN -->
        <form action="{{ route('actionplan.create') }}/{{ $search->id }}" method="post">
            @csrf
            <button type="submit" class="btn btn-outline-primary margin-left align-right btn-sm"
                    <?php if ($search->status == 1 || Auth::user()->profile == 'guest'){ ?> style="display: none" <?php } ?> >
                <span class="octicon octicon-plus"></span>
                {{ __('actions.add_version') }}
            </button>
        </form>
        <!-- Add action plan - CLOSE -->

        <!-- Tabs nav - OPEN -->
        <nav class="project-tab">

            <!-- Tabs - OPEN -->
            <div class="nav nav-tabs nav-fill" id="nav-tab-version" role="tablist">
                @foreach ($action_plans as $actionp)
                    <!-- Data tab -OPEN -->
                    <a class="nav-item nav-link @if ($loop->first) active @endif" id="nav-{{$actionp->version}}-tab" data-toggle="tab"
                       href="#nav-{{$actionp->version}}" role="tab" aria-controls="nav-{{$actionp->version}}" aria-selected="true">
                        {{ __('main.version') }} {{ $actionp->version }}
                    </a>
                    <!-- Data tab - CLOSE -->
                @endforeach

            </div>
            <!-- Tabs - CLOSE -->

        </nav>
        <!-- Tabs nav - CLOSE -->

        <!-- Tabs content - OPEN -->
        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent-version">
            @foreach ($action_plans as $ap)
                <!-- Data tab content - OPEN -->
                <div class="tab-pane fade show  @if ($loop->first) active @endif margin-top-sm" id="nav-{{$ap->version}}"
                role="tabpanel" aria-labelledby="nav-{{$ap->version}}-tab">
                    @include('searches.action_plan.ap_view')
                </div>
            @endforeach
        </div>
        <!-- Tabs content - OPEN -->


    @else
        <div class="text-center">
            <img src="/img/add_action_plan.png" width="300">

            <h4 class="card-title margin-bottom text-secondary">
                {{ __('main.no_action') }}
            </h4>

            <form action="{{ route('actionplan.create') }}/{{ $search->id }}" method="post">
                @csrf
                <button type="submit" class="btn btn-primary margin-left margin_top_bottom"
                        <?php if ($search->status == 1 || Auth::user()->profile == 'guest'){ ?> style="display: none" <?php } ?> >
                    <span class="octicon octicon-plus"></span>
                    {{ __('actions.add_version') }}
                </button>
            </form>
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
