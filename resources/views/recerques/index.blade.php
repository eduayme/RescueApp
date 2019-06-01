@extends('layouts.app')

@section('title', __('main.searches'))

@section('content')

    <!-- Alerts - OPEN -->

    <!-- Success - OPEN -->
    @if( session()->get('success') )
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <div class="container text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session()->get('success') }}
            </div>
        </div>
        <!-- Success - CLOSE -->

        <!-- Error - OPEN -->
    @elseif( session()->get('error') )
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
        \Date::setLocale('ca');
    @endphp
    <!-- Language for dates - CLOSE -->

    <!-- Content - OPEN -->
    <div class="container margin-top">

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
                @if( count($recerques) == 0 )
                    <div class="card text-center">
                        <div class="card-body">

                            <h1 class="card-title">
                                {{ __('messages.no_searches') }}
                            </h1>

                            <a href="{{ route('recerques.create') }}" class="btn btn-primary" role="button">
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
                            <th scope="col"> {{ __('forms.num_actuacio') }} </th>
                            <th scope="col"> {{ __('forms.estat') }} </th>
                            <th scope="col"> {{ __('forms.begin') }} </th>
                            <th scope="col"> {{ __('forms.end') }} </th>
                            <th scope="col"> {{ __('forms.village') }} </th>
                            <th scope="col"> {{ __('forms.region') }} </th>
                        </tr>
                        </thead>
                        <!-- Table header - CLOSE -->

                        <!-- Table content - OPEN -->
                        <tbody>
                        @foreach( $recerques as $recerca )
                            <tr>

                                <td>
                                    <a href="{{ url('recerques/'.$recerca->id) }}">
                                        {{ $recerca->num_actuacio }}
                                    </a>
                                </td>

                                <td>
                                    <h5>
                                        @if( $recerca->estat == 'Oberta' )
                                            <span class="badge badge-danger">
                          @elseif( $recerca->estat == 'Tancada' )
                                                    <span class="badge badge-success">
                          @endif
                                                        {{ $recerca->estat }}
                              </span>
                                    </h5>
                                </td>

                                <td>
                                    @if( $recerca->data_inici == NULL )
                                        --
                                    @else
                                        @php
                                            $date = new Date($recerca->data_inici);
                                            echo $date->format('H:i | d F Y');
                                        @endphp
                                    @endif
                                </td>

                                <td>
                                    @if( $recerca->data_tancament == NULL )
                                        --
                                    @else
                                        @php
                                            $date = new Date($recerca->data_tancament);
                                            echo $date->format('H:i | d F Y');
                                        @endphp
                                    @endif
                                </td>

                                <td>
                                    @if( $recerca->municipi_upa == NULL )
                                        --
                                    @else
                                        {{ $recerca->municipi_upa }}
                                    @endif
                                </td>

                                <td>
                                    @if( $recerca->regio == '01' )
                                        <p style="display:inline" data-toggle="tooltip" data-placement="top" title="Centre">
                                            01
                                        </p>
                                    @elseif( $recerca->regio == '02' )
                                        <p style="display:inline" data-toggle="tooltip" data-placement="top" title="Girona">
                                            02
                                        </p>
                                    @elseif( $recerca->regio == '03' )
                                        <p style="display:inline" data-toggle="tooltip" data-placement="top" title="Lleida">
                                            03
                                        </p>
                                    @elseif( $recerca->regio == '04' )
                                        <p style="display:inline" data-toggle="tooltip" data-placement="top" title="Metropolitana Nord">
                                            04
                                        </p>
                                    @elseif( $recerca->regio == '05' )
                                        <p style="display:inline" data-toggle="tooltip" data-placement="top" title="Metropolitana Sud">
                                            05
                                        </p>
                                    @elseif( $recerca->regio == '06' )
                                        <p style="display:inline" data-toggle="tooltip" data-placement="top" title="Tarragona">
                                            06
                                        </p>
                                    @elseif( $recerca->regio == '07' )
                                        <p style="display:inline" data-toggle="tooltip" data-placement="top" title="Terres Ebre">
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
                @if( count($practiques) == 0 )
                    <div class="card text-center">
                        <div class="card-body">

                            <h1 class="card-title">
                                {{ __('messages.no_practices') }}
                            </h1>

                            <a href="{{ route('recerques.create') }}" class="btn btn-primary" role="button">
                                {{ __('actions.add') . ' ' . __('main.practice') }}
                            </a>

                        </div>
                    </div>
                    <!-- If NO practices - CLOSE -->

                    <!-- If exists practices - OPEN -->
            @else

                <!-- Practices table - OPEN -->
                    <table class="table dt-responsive nowrap table-hover text-center"
                           id="practices" style="width: 100%">

                        <!-- Table header - OPEN -->
                        <thead>
                        <tr>
                            <th scope="col"> {{ __('forms.num_actuacio') }} </th>
                            <th scope="col"> {{ __('forms.estat') }} </th>
                            <th scope="col"> {{ __('forms.begin') }} </th>
                            <th scope="col"> {{ __('forms.end') }} </th>
                            <th scope="col"> {{ __('forms.village') }} </th>
                            <th scope="col"> {{ __('forms.region') }} </th>
                        </tr>
                        </thead>
                        <!-- Table header - CLOSE -->

                        <!-- Table content - OPEN -->
                        <tbody>
                        @foreach( $practiques as $practica )
                            <tr>

                                <td>
                                    <a href="{{ url('recerques/'.$practica->id) }}">
                                        {{ $practica->num_actuacio }}
                                    </a>
                                </td>

                                <td>
                                    <h5>
                                        @if( $practica->estat == 'Oberta' )
                                            <span class="badge badge-danger">
                            @elseif( $practica->estat == 'Tancada' )
                                                    <span class="badge badge-success">
                            @endif
                                                        {{ $practica->estat }}
                                </span>
                                    </h5>
                                </td>

                                <td>
                                    @if( $practica->data_inici == NULL )
                                        --
                                    @else
                                        @php
                                            $date = new Date($practica->data_inici);
                                            echo $date->format('H:i | d F Y');
                                        @endphp
                                    @endif
                                </td>

                                <td>
                                    @if( $practica->data_tancament == NULL )
                                        --
                                    @else
                                        @php
                                            $date = new Date($practica->data_tancament);
                                            echo $date->format('H:i | d F Y');
                                        @endphp
                                    @endif
                                </td>

                                <td>
                                    @if( $practica->municipi_upa == NULL )
                                        --
                                    @else
                                        {{ $practica->municipi_upa }}
                                    @endif
                                </td>

                                <td>
                                    @if( $practica->regio == '01' )
                                        <p style="display:inline" data-toggle="tooltip" data-placement="top" title="Centre">
                                            01
                                        </p>
                                    @elseif( $practica->regio == '02' )
                                        <p style="display:inline" data-toggle="tooltip" data-placement="top" title="Girona">
                                            02
                                        </p>
                                    @elseif( $practica->regio == '03' )
                                        <p style="display:inline" data-toggle="tooltip" data-placement="top" title="Lleida">
                                            03
                                        </p>
                                    @elseif( $practica->regio == '04' )
                                        <p style="display:inline" data-toggle="tooltip" data-placement="top" title="Metropolitana Nord">
                                            04
                                        </p>
                                    @elseif( $practica->regio == '05' )
                                        <p style="display:inline" data-toggle="tooltip" data-placement="top" title="Metropolitana Sud">
                                            05
                                        </p>
                                    @elseif( $practica->regio == '06' )
                                        <p style="display:inline" data-toggle="tooltip" data-placement="top" title="Tarragona">
                                            06
                                        </p>
                                    @elseif( $practica->regio == '07' )
                                        <p style="display:inline" data-toggle="tooltip" data-placement="top" title="Terres Ebre">
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
