<!-- Content - OPEN -->
<div class="container margin-top padding-bottom">

    <!-- Tabs nav - OPEN -->
    <nav class="project-tab">

        <!-- Tabs - OPEN -->
        <div class="nav nav-tabs nav-fill" id="nav-tab-resources" role="tablist">

            <!-- People Involved - OPEN -->
            <a class="nav-item nav-link active" id="nav-people-involved-tab" data-toggle="tab"
            href="#nav-people-involved" role="tab" aria-controls="nav-people-involved" aria-selected="true">
                {{ __('main.people_involved') }}
            </a>
            <!-- People Involved - CLOSE -->

            <!-- Groups - OPEN -->
            <a class="nav-item nav-link" id="nav-groups-tab" data-toggle="tab"
            href="#nav-groups" role="tab" aria-controls="nav-groups" aria-selected="true">
                {{ __('main.groups') }}
            </a>
            <!-- Groups - CLOSE -->

            <!-- Leaders - OPEN -->
            <a class="nav-item nav-link" id="nav-leaders-tab" data-toggle="tab"
            href="#nav-leaders" role="tab" aria-controls="nav-leaders" aria-selected="true">
                {{ __('main.leaders') }}
            </a>
            <!-- Leaders - CLOSE -->

        </div>
        <!-- Tabs - CLOSE -->

    </nav>
    <!-- Tabs nav - CLOSE -->

    <!-- Tabs content - OPEN -->
    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent-resources">

        <!-- People involved tab content - OPEN -->
        <div class="tab-pane fade show active margin-top-sm" id="nav-people-involved"
        role="tabpanel" aria-labelledby="nav-people-involved-tab">
            @include('searches.resources.people.index')
        </div>
        <!-- People involved tab content - CLOSE -->

        <!-- Groups tab content - OPEN -->
        <div class="tab-pane fade margin-top-sm" id="nav-groups"
        role="tabpanel" aria-labelledby="nav-groups-tab">
            @include('searches.resources.groups.index')
        </div>
        <!-- Groups tab content - CLOSE -->

        <!-- Leaders tab content - OPEN -->
        <div class="tab-pane fade margin-top-sm" id="nav-leaders"
        role="tabpanel" aria-labelledby="nav-leaders-tab">
            {{ __('main.leaders') }}
        </div>
        <!-- Leaders tab content - CLOSE -->

    </div>
    <!-- Tabs content - OPEN -->

</div>
<!-- Content - CLOSE -->

<!-- JQuery 3.3.1 -->
<script src="{{ asset('js/jquery-3.3.1.js') }}"></script>

<!-- JS -->
<script>

    $(document).ready(function() {
        // tabs
        var hash = window.location.hash;
        hash && $('nav a[href="' + hash + '"]').tab('show');

        $('.nav-tabs a').click(function (e) {
            $(this).tab('show');
            var scrollmem = $('body').scrollTop();
            window.location.hash = this.hash;
            $('html,body').scrollTop(scrollmem);
        });

    });

</script>
