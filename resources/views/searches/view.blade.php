@extends('layouts.app_secondary')

@section('title', $search->search_id)

@section('content')

    <!-- Alerts - OPEN -->
    @include('parts.alerts')
    <!-- Alerts - CLOSE -->

    <!-- Language for dates - OPEN -->
    @php
        \Date::setLocale(Session::get('locale'));
    @endphp
    <!-- Language for dates - CLOSE -->

    <!-- Content - OPEN -->
    <div class="container mb-5 mt-3 my-md-3">

        <!-- Tabs nav - OPEN -->
        <nav class="project-tab">

            <!-- Tabs - OPEN -->
            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">

                <!-- Data tab - OPEN -->
                <a class="nav-item nav-link active" id="nav-data-tab" data-toggle="tab"
                href="#nav-data" role="tab" aria-controls="nav-data" aria-selected="true">
                    {{ __('main.data') }}
                </a>
                <!-- Data tab - CLOSE -->

                <!-- Action Plan tab - OPEN -->
                <a class="nav-item nav-link" id="nav-ap-tab" data-toggle="tab"
                   href="#nav-ap" role="tab" aria-controls="nav-ap" aria-selected="true">
                    {{ __('main.ap') }}
                </a>
                <!-- Action Plan - CLOSE -->

                <!-- Incidents - OPEN -->
                <a class="nav-item nav-link" id="nav-incidents-tab" data-toggle="tab"
                   href="#nav-incidents" role="tab" aria-controls="nav-incidents" aria-selected="true">
                    {{ __('main.incidents') }}
                </a>
                <!-- Incidents - CLOSE -->

                <!-- Resources - OPEN -->
                <a class="nav-item nav-link" id="nav-resources-tab" data-toggle="tab"
                   href="#nav-resources" role="tab" aria-controls="nav-resources" aria-selected="true">
                    {{ __('main.resources') }}
                </a>
                <!-- Resources - CLOSE -->

                <!-- Tasks - OPEN -->
                <a class="nav-item nav-link" id="nav-tasks-tab" data-toggle="tab"
                   href="#nav-tasks" role="tab" aria-controls="nav-tasks" aria-selected="true">
                    {{ __('main.tasks') }}
                </a>
                <!-- Tasks - CLOSE -->

                <!-- Closing tab - OPEN -->
                <a class="nav-item nav-link" id="nav-closing-tab" data-toggle="tab"
                href="#nav-closing" role="tab" aria-controls="nav-closing" aria-selected="false">
                    @if( $search->status == "0")
                        {{ __('main.finish') }}
                    @else
                        {{ __('actions.reopen') }}
                    @endif
                </a>
                <!-- Closing tab - CLOSE -->

            </div>
            <!-- Tabs - CLOSE -->

        </nav>
        <!-- Tabs nav - CLOSE -->

        <!-- Tabs content - OPEN -->
        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">

            <!-- Data tab content - OPEN -->
            <div class="tab-pane fade show active margin-top-sm" id="nav-data"
            role="tabpanel" aria-labelledby="nav-data-tab">
                @include('searches.data')
            </div>
            <!-- Data tab content - CLOSE -->

            <!-- Action Plan content - OPEN -->
            <div class="tab-pane fade margin-top-sm" id="nav-ap"
            role="tabpanel" aria-labelledby="nav-ap-tab">
                @include('searches.action_plan.ap')
            </div>
            <!-- Action Plan content - CLOSE -->

            <!-- Incidents content - OPEN -->
            <div class="tab-pane fade margin-top-sm" id="nav-incidents"
            role="tabpanel" aria-labelledby="nav-incidents-tab">
                @include('searches.incidents.index')
            </div>
            <!-- Incidents content - CLOSE -->

            <!-- Resources content - OPEN -->
            <div class="tab-pane fade margin-top-sm" id="nav-resources"
            role="tabpanel" aria-labelledby="nav-resources-tab">
                @include('searches.resources.index')
            </div>
            <!-- Resources content - CLOSE -->

            <!-- Tasks content - OPEN -->
            <div class="tab-pane fade margin-top-sm" id="nav-tasks"
            role="tabpanel" aria-labelledby="nav-tasks-tab">
                @include('searches.tasks.index')
            </div>
            <!-- Tasks content - CLOSE -->

            <!-- Closing tab content - OPEN -->
            <div class="tab-pane fade margin-top-sm" id="nav-closing"
            role="tabpanel" aria-labelledby="nav-closing-tab">
                @include('searches.finalization.view')
            </div>
            <!-- Closing tab content - CLOSE -->

        </div>
        <!-- Tabs content - OPEN -->

    </div>
    <!-- Content - CLOSE -->

@endsection

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
