@extends('layouts.app')

@section('title', __('main.searches'))

@section('content')

    <!-- Alerts - OPEN -->

        <!-- Success - OPEN -->
        @if (session()->get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <div class="container text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session()->get('success') }}
                </div>
            </div>
        <!-- Success - CLOSE -->

        <!-- Error - OPEN -->
        @elseif (session()->get('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <div class="container text-center">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session()->get('error') }}
                </div>
            </div>
        @endif
        <!-- Error - CLOSE -->

    <!-- Alerts - CLOSE -->

    <!-- Language for dates - OPEN -->
    @php
        \Date::setLocale(Session::get('locale'));
    @endphp
    <!-- Language for dates - CLOSE -->

    <!-- Content - OPEN -->
    <div class="container margin-top padding-bottom">

        <!-- Tabs nav - OPEN -->
        <nav class="project-tab">

            <!-- Tabs - OPEN -->
            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">

                <!-- Searches tab - OPEN -->
                <a class="nav-item nav-link active" id="nav-searches-tab" data-toggle="tab"
                href="#nav-searches" role="tab" aria-controls="nav-searches" aria-selected="true">
                    {{ __('main.searches') }}
                </a>
                <!-- Searches tab - CLOSE -->

                <!-- Practices tab - OPEN -->
                <a class="nav-item nav-link" id="nav-practices-tab" data-toggle="tab"
                href="#nav-practices" role="tab" aria-controls="nav-practices" aria-selected="false">
                    {{ __('main.practices') }}
                </a>
                <!-- Practices tab - CLOSE -->

            </div>
            <!-- Tabs - CLOSE -->

        </nav>
        <!-- Tabs nav - CLOSE -->

        <!-- Tabs content - OPEN -->
        <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">

            <!-- Searches tab content - OPEN -->
            <div class="tab-pane fade show active margin-top-sm" id="nav-searches"
                 role="tabpanel" aria-labelledby="nav-searches-tab">

                <!-- If NO searches - OPEN -->
                @if (count($searches) == 0)
                    <div class="card text-center">
                        <div class="card-body">

                            <h1 class="card-title">
                                {{ __('messages.no_searches') }}
                            </h1>

                            <a href="{{ route('searches.create') }}" class="btn btn-primary" role="button">
                                {{ __('actions.add') . ' ' . __('main.search') }}
                            </a>

                        </div>
                    </div>
                <!-- If NO searches - CLOSE -->

                <!-- If exists searches - OPEN -->
                @else

                    <!-- Searches table - OPEN -->
                    <table class="table dt-responsive nowrap table-hover text-center"
                    id="searches" style="width: 100%">

                        <!-- Table header - OPEN -->
                        <thead>
                            <tr>
                                <th scope="col"> {{ __('forms.id_search') }} </th>
                                <th scope="col"> {{ __('forms.status') }} </th>
                                <th scope="col"> {{ __('forms.begin') }} </th>
                                <th scope="col"> {{ __('forms.end') }} </th>
                                <th scope="col"> {{ __('forms.village') }} </th>
                                <th scope="col"> {{ __('forms.region') }} </th>
                            </tr>
                        </thead>
                        <!-- Table header - CLOSE -->

                        <!-- Table content - OPEN -->
                        <tbody>
                        @foreach ($searches as $search)
                            <tr>

                                <td>
                                    <a href="{{ url('searches/' . $search->id) }}">
                                        {{ $search->id_search }}
                                    </a>
                                </td>

                                <td>
                                    <h5>
                                        @if ($search->status == 0)
                                            <span class="badge badge-danger">
                                                {{ __('main.status_open') }}
                                            </span>
                                        @elseif ($search->status == 1)
                                            <span class="badge badge-success">
                                                {{ __('main.status_close') }}
                                            </span>
                                        @endif
                                    </h5>
                                </td>

                                <td>
                                    @if ($search->date_start == NULL)
                                        --
                                    @else
                                        @php
                                            $date = new Date($search->date_start);
                                            echo $date->format('H:i | d F Y');
                                        @endphp
                                    @endif
                                </td>

                                <td>
                                    @if ($search->date_finalization == NULL)
                                        --
                                    @else
                                        @php
                                            $date = new Date($search->date_finalization);
                                            echo $date->format('H:i | d F Y');
                                        @endphp
                                    @endif
                                </td>

                                <td>
                                    @if ($search->municipality_last_place_seen == NULL)
                                        --
                                    @else
                                        {{ $search->municipality_last_place_seen }}
                                    @endif
                                </td>

                                <td>
                                    @if ($search->region == '01')
                                        <p data-toggle="tooltip" data-placement="left" title="Centre" style="display:inline">
                                            01
                                        </p>
                                    @elseif ($search->region == '02')
                                        <p data-toggle="tooltip" data-placement="left" title="Girona" style="display:inline">
                                            02
                                        </p>
                                    @elseif ($search->region == '03')
                                        <p data-toggle="tooltip" data-placement="left" title="Lleida" style="display:inline">
                                            03
                                        </p>
                                    @elseif ($search->region == '04')
                                        <p data-toggle="tooltip" data-placement="left" title="Metropolitana Nord" style="display:inline">
                                            04
                                        </p>
                                    @elseif ($search->region == '05')
                                        <p data-toggle="tooltip" data-placement="left" title="Metropolitana Sud" style="display:inline">
                                            05
                                        </p>
                                    @elseif ($search->region == '06')
                                        <p data-toggle="tooltip" data-placement="left" title="Tarragona" style="display:inline">
                                            06
                                        </p>
                                    @elseif ($search->regio == '07')
                                        <p data-toggle="tooltip" data-placement="left" title="Terres Ebre"style="display:inline">
                                            07
                                        </p>
                                    @else
                                        <p style="display:inline">
                                            --
                                        </p>
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                        <!-- Table content - CLOSE -->

                    </table>
                    <!-- Searches table - CLOSE -->

            @endif
            <!-- If exists searches - CLOSE -->

            </div>
            <!-- Searches tab content - CLOSE -->

            <!-- Practices tab content - OPEN -->
            <div class="tab-pane fade margin-top-sm" id="nav-practices"
                 role="tabpanel" aria-labelledby="nav-practices-tab">

                <!-- If NO practices - OPEN -->
                @if (count($practices) == 0)
                    <div class="card text-center">
                        <div class="card-body">

                            <h1 class="card-title">
                                {{ __('messages.no_practices') }}
                            </h1>

                            <a href="{{ route('searches.create') }}" class="btn btn-primary" role="button">
                                {{ __('actions.add') . ' ' . __('main.practice') }}
                            </a>

                        </div>
                    </div>
                <!-- If NO practices - CLOSE -->

                <!-- If exists practices - OPEN -->
                @else

                    <!-- Practices table - OPEN -->
                    <table class="table dt-responsive nowrap table-hover text-center" id="practices" style="width: 100%">

                        <!-- Table header - OPEN -->
                        <thead>
                            <tr>
                                <th scope="col"> {{ __('forms.id_search') }} </th>
                                <th scope="col"> {{ __('forms.status') }} </th>
                                <th scope="col"> {{ __('forms.begin') }} </th>
                                <th scope="col"> {{ __('forms.end') }} </th>
                                <th scope="col"> {{ __('forms.village') }} </th>
                                <th scope="col"> {{ __('forms.region') }} </th>
                            </tr>
                        </thead>
                        <!-- Table header - CLOSE -->

                        <!-- Table content - OPEN -->
                        <tbody>
                        @foreach ($practices as $practice)
                            <tr>

                                <td>
                                    <a href="{{ url('searches/' . $practice->id) }}">
                                        {{ $practice->id_search }}
                                    </a>
                                </td>

                                <td>
                                    <h5>
                                        @if ($practice->status == 0)
                                            <span class="badge badge-danger">
                                                {{ __('main.status_open') }}
                                            </span>
                                        @elseif ($practice->status == 1)
                                            <span class="badge badge-success">
                                                {{ __('main.status_close') }}
                                            </span>
                                        @endif
                                    </h5>
                                </td>

                                <td>
                                    @if ($practice->date_start == NULL)
                                        --
                                    @else
                                        @php
                                            $date = new Date($practice->date_start);
                                            echo $date->format('H:i | d F Y');
                                        @endphp
                                    @endif
                                </td>

                                <td>
                                    @if ($practice->date_finalization == NULL)
                                        --
                                    @else
                                        @php
                                            $date = new Date($practice->date_finalization);
                                            echo $date->format('H:i | d F Y');
                                        @endphp
                                    @endif
                                </td>

                                <td>
                                    @if ($practice->municipality_last_place_seen == NULL)
                                        --
                                    @else
                                        {{ $practice->municipality_last_place_seen }}
                                    @endif
                                </td>

                                <td>
                                    @if ($practice->region == '01')
                                        <p data-toggle="tooltip" data-placement="left" title="Centre" style="display:inline">
                                            01
                                        </p>
                                    @elseif ($practice->region == '02')
                                        <p data-toggle="tooltip" data-placement="left" title="Girona" style="display:inline">
                                            02
                                        </p>
                                    @elseif ($practice->region == '03')
                                        <p data-toggle="tooltip" data-placement="left" title="Lleida" style="display:inline">
                                            03
                                        </p>
                                    @elseif ($practice->region == '04')
                                        <p data-toggle="tooltip" data-placement="left" title="Metropolitana Nord" style="display:inline">
                                            04
                                        </p>
                                    @elseif ($practice->region == '05')
                                        <p data-toggle="tooltip" data-placement="left" title="Metropolitana Sud" style="display:inline">
                                            05
                                        </p>
                                    @elseif ($practice->region == '06')
                                        <p data-toggle="tooltip" data-placement="left" title="Tarragona" style="display:inline">
                                            06
                                        </p>
                                    @elseif ($practice->regio == '07')
                                        <p data-toggle="tooltip" data-placement="left" title="Terres Ebre"style="display:inline">
                                            07
                                        </p>
                                    @else
                                        <p style="display:inline">
                                            --
                                        </p>
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                        <!-- Table content - CLOSE -->

                    </table>
                    <!-- Practices table - CLOSE -->

            @endif
            <!-- If exists practices - CLOSE -->

            </div>
            <!-- Practices tab content - CLOSE -->

        </div>
        <!-- Tabs content - CLOSE -->

    </div>
    <!-- Content - CLOSE -->

@endsection

<!-- JQuery 3.3.1 -->
<script src="{{ asset('js/jquery-3.3.1.js') }}"></script>

<!-- JS -->
<script>

    $(document).ready(function() {

        // settings tables
        $.extend( $.fn.dataTable.defaults, {
            "order": [ [ 1, "asc" ], [ 2, "desc" ] ],
            "scrollX": true,
            "pagingType": "full_numbers",
            "responsive": true,
            "language": {
                "decimal":        "",
                "emptyTable":     "{{ __('tables.emptyTable') }}",
                "info":           "{{ __('tables.info') }}",
                "infoEmpty":      "{{ __('tables.infoEmpty') }}",
                "infoFiltered":   "{{ __('tables.infoFiltered') }}",
                "infoPostFix":    "",
                "thousands":      ",",
                "lengthMenu":     "{{ __('tables.lengthMenu') }}",
                "loadingRecords": "{{ __('tables.loadingRecords') }}",
                "processing":     "{{ __('tables.processing') }}",
                "search":         "{{ __('tables.search') }}",
                "zeroRecords":    "{{ __('tables.zeroRecords') }}",
                "paginate": {
                    "first":      "{{ __('tables.first') }}",
                    "last":       "{{ __('tables.last') }}",
                    "next":       "{{ __('tables.next') }}",
                    "previous":   "{{ __('tables.previous') }}",
                },
                "aria": {
                    "sortAscending":  "{{ __('tables.sortAscending') }}",
                    "sortDescending": "{{ __('tables.sortDescending') }}",
                }
            }
        });

        // initialize tables
        $('#searches').DataTable();
        $('#practices').DataTable();

        // resize tables after tab
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust()
                .responsive.recalc();
        });

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
