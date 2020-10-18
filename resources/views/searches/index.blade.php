@extends('layouts.app')

@section('title', __('main.searches'))

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

                            <img src="/img/add_search.png" width="300">

                            <h4 class="card-title margin-bottom text-secondary">
                                {{ __('messages.no_searches') }}
                            </h4>

                            <a href="{{ route('searches.create') }}" class="btn btn-primary" role="button"
                            <?php if (Auth::user()->profile == 'guest') { ?> style="display: none" <?php } ?> >
                                {{ __('actions.add') . ' ' . __('main.search') }}
                            </a>

                        </div>
                    </div>
                <!-- If NO searches - CLOSE -->

                <!-- If exists searches - OPEN -->
                @else

                    <!-- Filters - OPEN -->
                    <div class="row text-center margin-top-bottom">

                        <!-- Status filter - OPEN -->
                        <div class="col-sm-2">
                            <select class="form-control" id="status-searches-filter">
                                <option value=""> {{ __('actions.filter_by_status') }} </option>
                                <option value="{{ __('main.status_open') }}"> {{ __('main.status_open') }} </option>
                                <option value="{{ __('main.status_closed') }}"> {{ __('main.status_closed') }} </option>
                            </select>
                        </div>
                        <!-- Status filter - CLOSE -->

                        <!-- Dates range filter - OPEN -->
                        <div class="col-sm-4">
                            <input class="form-control" type="text" name="dates-searches-filter" value=""
                            placeholder="{{ __('actions.filter_by_dates') }}"/>
                        </div>
                        <!-- Dates range filter - CLOSE -->

                        <!-- Region filter - OPEN -->
                        <div class="col-sm-3">
                            <select class="form-control" id="region-searches-filter">
                                <option value=""> {{ __('actions.filter_by_region') }} </option>
                                @foreach( $regions_s as $region )
                                    <option value="{{ $region['region'] }}"> {{ $region['region'] }} </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Region filter - CLOSE -->

                        <!-- Villages filter - OPEN -->
                        <div class="col-sm-3">
                            <select class="form-control" id="village-searches-filter">
                                <option value=""> {{ __('actions.filter_by_village') }} </option>
                                @foreach( $villages_s as $village )
                                    <option value="{{ $village['municipality_last_place_seen'] }}"> {{ $village['municipality_last_place_seen'] }} </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Villages filter - CLOSE -->

                    </div>
                    <!-- Filters - CLOSE -->

                    <!-- Searches table - OPEN -->
                    <table class="table dt-responsive nowrap table-hover text-center"
                    id="searches" style="width: 100%">
                        @include('searches.table_search', ['items' => $searches])
                    </table>
                    <!-- Searches table - CLOSE -->

                @endif
                <!-- If exists searches - CLOSE -->

            </div>
            <!-- Searches tab content - CLOSE -->

            <!-- Practices tab content - OPEN -->
            <div class="tab-pane fade margin-top-sm" id="nav-practices" role="tabpanel" aria-labelledby="nav-practices-tab">

                <!-- If NO practices - OPEN -->
                @if (count($practices) == 0)
                    <div class="card text-center">
                        <div class="card-body">

                            <img src="/img/add_search.png" width="300">

                            <h4 class="card-title margin-bottom text-secondary">
                                {{ __('messages.no_practices') }}
                            </h4>

                            <a href="{{ route('searches.create', ['is_a_practice'=>true]) }}" class="btn btn-primary" role="button"
                            <?php if (Auth::user()->profile == 'guest') { ?> style="display: none" <?php } ?> >
                                {{ __('actions.add') . ' ' . __('main.practice') }}
                            </a>

                        </div>
                    </div>
                <!-- If NO practices - CLOSE -->

                <!-- If exists practices - OPEN -->
                @else

                    <!-- Filters - OPEN -->
                    <div class="row text-center margin-top-bottom">

                        <!-- Status filter - OPEN -->
                        <div class="col-sm-2">
                            <select class="form-control" id="status-practices-filter">
                                <option value=""> {{ __('actions.filter_by_status') }} </option>
                                <option value="{{ __('main.status_open') }}"> {{ __('main.status_open') }} </option>
                                <option value="{{ __('main.status_closed') }}"> {{ __('main.status_closed') }} </option>
                            </select>
                        </div>
                        <!-- Status filter - CLOSE -->

                        <!-- Dates range filter - OPEN -->
                        <div class="col-sm-4">
                            <input class="form-control" type="text" name="dates-practices-filter" value=""
                            placeholder="{{ __('actions.filter_by_dates') }}"/>
                        </div>
                        <!-- Dates range filter - CLOSE -->

                        <!-- Region filter - OPEN -->
                        <div class="col-sm-3">
                            <select class="form-control" id="region-practices-filter">
                                <option value=""> {{ __('actions.filter_by_region') }} </option>
                                @foreach( $regions_p as $region )
                                    <option value="{{ $region['region'] }}"> {{ $region['region'] }} </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Region filter - CLOSE -->

                        <!-- Villages filter - OPEN -->
                        <div class="col-sm-3">
                            <select class="form-control" id="village-practices-filter">
                                <option value=""> {{ __('actions.filter_by_village') }} </option>
                                @foreach( $villages_p as $village )
                                    <option value="{{ $village['municipality_last_place_seen'] }}"> {{ $village['municipality_last_place_seen'] }} </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Villages filter - CLOSE -->

                    </div>
                    <!-- Filters - CLOSE -->

                    <!-- Practices table - OPEN -->
                    <table class="table dt-responsive nowrap table-hover text-center" id="practices" style="width: 100%">
                        @include('searches.table_search', ['items' => $practices])
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
            "scrollX": true,
            "scrollY": true,
            "pagingType": "full_numbers",
            "responsive": true,
            "order": [ [ 1, "asc" ], [ 2, "desc" ] ],
            "columnDefs": [
                {
                    "targets": [ 6 ],
                    "visible": false,
                },
                {
                    "targets": [ 7 ],
                    "visible": false
                }
            ],
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
        var searches_table  = $('#searches').DataTable();
        var practices_table = $('#practices').DataTable();

        // resize tables after tab
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
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

        //----------------------------------------------------------------
        // Searches filters - OPEN
        // status filter
        $('#status-searches-filter').on('change', function () {
            searches_table.columns(1).search( this.value ).draw();
        } );

        // dates range filter
        $('input[name="dates-searches-filter"]').daterangepicker({
            timePicker: true,
            timePicker24Hour: true,
            timePickerIncrement: 5,
            startDate: moment().startOf('hour'),
            autoUpdateInput: true,
            autoApply: true,
            showDropdowns: true,
            opens: 'center',
            drops: 'down',
            alwaysShowCalendars: true,
            ranges: {
                "{{ __('daterangepicker.last_7_days') }}": [moment().subtract(6, 'days'), moment()],
                "{{ __('daterangepicker.last_15_days') }}": [moment().subtract(14, 'days'), moment()],
                "{{ __('daterangepicker.last_30_days') }}": [moment().subtract(29, 'days'), moment()],
                "{{ __('daterangepicker.this_month') }}": [moment().startOf('month'), moment().endOf('month')],
                "{{ __('daterangepicker.last_month') }}": [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                "{{ __('daterangepicker.this_year') }}": [moment().startOf('year'), moment().endOf('year')],
                "{{ __('daterangepicker.last_year') }}": [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')],
            },
            locale: {
                format: 'YYYY-MM-DD HH:mm:ss',
                separator: ' | ',
                customRangeLabel: "{{ __('daterangepicker.personalized') }}",
                firstDay: 1,
                applyLabel: "{{ __('actions.save') }}",
                cancelLabel: "{{ __('actions.cancel') }}",
                daysOfWeek: [
                    "{{ __('daterangepicker.sunday') }}",
                    "{{ __('daterangepicker.monday') }}",
                    "{{ __('daterangepicker.tuesday') }}",
                    "{{ __('daterangepicker.wednesday') }}",
                    "{{ __('daterangepicker.thursday') }}",
                    "{{ __('daterangepicker.friday') }}",
                    "{{ __('daterangepicker.saturday') }}"
                ],
                monthNames: [
                    "{{ __('daterangepicker.january') }}",
                    "{{ __('daterangepicker.february') }}",
                    "{{ __('daterangepicker.march') }}",
                    "{{ __('daterangepicker.april') }}",
                    "{{ __('daterangepicker.may') }}",
                    "{{ __('daterangepicker.june') }}",
                    "{{ __('daterangepicker.july') }}",
                    "{{ __('daterangepicker.august') }}",
                    "{{ __('daterangepicker.september') }}",
                    "{{ __('daterangepicker.october') }}",
                    "{{ __('daterangepicker.november') }}",
                    "{{ __('daterangepicker.december') }}",
                ],
            }
        });
        // apply button dates range filter
        $('input[name="dates-searches-filter"]').on('apply.daterangepicker', function(ev, picker) {
            $(this).val( picker.startDate.format('YYYY-MM-DD HH:mm:ss') + ' | ' + picker.endDate.format('YYYY-MM-DD HH:mm:ss') );
            searches_table.draw();
        });

        // cancel button dates range filter
        $('input[name="dates-searches-filter"]').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val( '' );
            searches_table.draw();
        });

        $('input[name="dates-searches-filter"]').val( '' );

        $.fn.dataTable.ext.search.push(
            function (settings, data, dataIndex) {
                <?php if( count($searches) == 0 ) : ?>
                    var min = null;
                    var max = null;
                    console.log("searches");
                <?php else : ?>
                    var min = $('input[name="dates-searches-filter"]').data('daterangepicker').startDate._d;
                    var max = $('input[name="dates-searches-filter"]').data('daterangepicker').endDate._d;
                <?php endif; ?>

                var startDate = 'invalid';
                if( data[6] != '' ) {
                    startDate = new Date(data[6]);
                }

                var endDate = 'invalid';
                if( data[7] != '' ) {
                    endDate = new Date(data[7]);
                }

                if( min == null && max == null ) { console.log(1); return true; }
                if( $('input[name="dates-searches-filter"]').val() == '' ) { console.log(2); return true; }
                if( min == null && endDate <= max ) { console.log(3); return true; }
                if( max == null && startDate >= min ) { console.log(4); return true; }
                if( endDate <= max && startDate >= min ) { console.log(5); return true; }
                if( startDate >= min && startDate <= max && endDate == 'invalid' ) { console.log(6); return true; }
                console.log(7); return false;
            }
        );

        // regions filter
        $('#region-searches-filter').on('change', function () {
            searches_table.columns(4).search( this.value ).draw();

            $("#village-searches-filter").empty();
            $("#village-searches-filter").append('<option value=""> {{ __("actions.filter_by_village") }} </option>');

            var region = $(this).val();
            if (region) {
                $.ajax({
                   type: "GET",
                   url: "{{url('get-villages-searches-list')}}?region=" + region,
                   success:function(res) {
                    if(res) {
                        $.each(res,function(key, value) {
                            $("#village-searches-filter").append('<option value="'+ value.municipality_last_place_seen +'">'+ value.municipality_last_place_seen +'</option>');
                        });
                    }
                    else {
                        @foreach( $villages_s as $village )
                            $("#village-searches-filter").append('<option value="{{ $village["municipality_last_place_seen"] }}"> {{ $village["municipality_last_place_seen"] }} </option>');
                        @endforeach
                    }
                   }
                });
            }
            else {
                @foreach( $villages_s as $village )
                    $("#village-searches-filter").append('<option value="{{ $village["municipality_last_place_seen"] }}"> {{ $village["municipality_last_place_seen"] }} </option>');
                @endforeach
            }

            searches_table.columns(5).search( '' ).draw();
        });

        // municipality last place seen filter
        $('#village-searches-filter').on('change', function () {
            searches_table.columns(5).search( this.value ).draw();
        });

        // Searches filters - CLOSE
        //----------------------------------------------------------------

        //----------------------------------------------------------------
        // Practices filters - OPEN
        // status filter
        $('#status-practices-filter').on('change', function () {
            practices_table.columns(1).search( this.value ).draw();
        } );

        // dates range filter
        $('input[name="dates-practices-filter"]').daterangepicker({
            timePicker: true,
            timePicker24Hour: true,
            timePickerIncrement: 5,
            startDate: moment().startOf('hour'),
            autoUpdateInput: true,
            autoApply: true,
            showDropdowns: true,
            opens: 'center',
            drops: 'up',
            alwaysShowCalendars: true,
            ranges: {
                "{{ __('daterangepicker.last_7_days') }}": [moment().subtract(6, 'days'), moment()],
                "{{ __('daterangepicker.last_15_days') }}": [moment().subtract(14, 'days'), moment()],
                "{{ __('daterangepicker.last_30_days') }}": [moment().subtract(29, 'days'), moment()],
                "{{ __('daterangepicker.this_month') }}": [moment().startOf('month'), moment().endOf('month')],
                "{{ __('daterangepicker.last_month') }}": [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                "{{ __('daterangepicker.this_year') }}": [moment().startOf('year'), moment().endOf('year')],
                "{{ __('daterangepicker.last_year') }}": [moment().subtract(1, 'year').startOf('year'), moment().subtract(1, 'year').endOf('year')],
            },
            locale: {
                format: 'YYYY-MM-DD HH:mm:ss',
                separator: ' | ',
                customRangeLabel: "{{ __('daterangepicker.personalized') }}",
                firstDay: 1,
                applyLabel: "{{ __('actions.save') }}",
                cancelLabel: "{{ __('actions.cancel') }}",
                daysOfWeek: [
                    "{{ __('daterangepicker.sunday') }}",
                    "{{ __('daterangepicker.monday') }}",
                    "{{ __('daterangepicker.tuesday') }}",
                    "{{ __('daterangepicker.wednesday') }}",
                    "{{ __('daterangepicker.thursday') }}",
                    "{{ __('daterangepicker.friday') }}",
                    "{{ __('daterangepicker.saturday') }}"
                ],
                monthNames: [
                    "{{ __('daterangepicker.january') }}",
                    "{{ __('daterangepicker.february') }}",
                    "{{ __('daterangepicker.march') }}",
                    "{{ __('daterangepicker.april') }}",
                    "{{ __('daterangepicker.may') }}",
                    "{{ __('daterangepicker.june') }}",
                    "{{ __('daterangepicker.july') }}",
                    "{{ __('daterangepicker.august') }}",
                    "{{ __('daterangepicker.september') }}",
                    "{{ __('daterangepicker.october') }}",
                    "{{ __('daterangepicker.november') }}",
                    "{{ __('daterangepicker.december') }}",
                ],
            }
        });
        // apply button dates range filter
        $('input[name="dates-practices-filter"]').on('apply.daterangepicker', function(ev, picker) {
            $(this).val( picker.startDate.format('YYYY-MM-DD HH:mm:ss') + ' | ' + picker.endDate.format('YYYY-MM-DD HH:mm:ss') );
            practices_table.draw();
        });

        // cancel button dates range filter
        $('input[name="dates-practices-filter"]').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val( '' );
            practices_table.draw();
        });

        $('input[name="dates-practices-filter"]').val( '' );

        $.fn.dataTable.ext.search.push(
            function (settings, data, dataIndex) {
                <?php if( count($practices) == 0 ) : ?>
                    var min = null;
                    var max = null;
                <?php else : ?>
                    var min = $('input[name="dates-practices-filter"]').data('daterangepicker').startDate._d;
                    var max = $('input[name="dates-practices-filter"]').data('daterangepicker').endDate._d;
                <?php endif ; ?>

                var startDate = 'invalid';
                if( data[6] != '' ) {
                    startDate = new Date(data[6]);
                }

                var endDate = 'invalid';
                if( data[7] != '' ) {
                    endDate = new Date(data[7]);
                }

                if( min == null && max == null ) { console.log(1); return true; }
                if( $('input[name="dates-practices-filter"]').val() == '' ) { console.log(2); return true; }
                if( min == null && endDate <= max ) { console.log(3); return true; }
                if( max == null && startDate >= min ) { console.log(4); return true; }
                if( endDate <= max && startDate >= min ) { console.log(5); return true; }
                if( startDate >= min && startDate <= max && endDate == 'invalid' ) { console.log(6); return true; }
                console.log(7); return false;
            }
        );

        // regions filter
        $('#region-practices-filter').on('change', function () {
            practices_table.columns(4).search( this.value ).draw();

            $("#village-practices-filter").empty();
            $("#village-practices-filter").append('<option value=""> {{ __("actions.filter_by_village") }} </option>');

            var region = $(this).val();
            if (region) {
                $.ajax({
                   type: "GET",
                   url: "{{url('get-villages-practices-list')}}?region=" + region,
                   success:function(res) {
                    if(res) {
                        $.each(res,function(key, value) {
                            $("#village-practices-filter").append('<option value="'+ value.municipality_last_place_seen +'">'+ value.municipality_last_place_seen +'</option>');
                        });
                    }
                    else {
                        @foreach( $villages_p as $village )
                            $("#village-practices-filter").append('<option value="{{ $village["municipality_last_place_seen"] }}"> {{ $village["municipality_last_place_seen"] }} </option>');
                        @endforeach
                    }
                   }
                });
            }
            else {
                @foreach( $villages_p as $village )
                    $("#village-practices-filter").append('<option value="{{ $village["municipality_last_place_seen"] }}"> {{ $village["municipality_last_place_seen"] }} </option>');
                @endforeach
            }

            practices_table.columns(5).search( '' ).draw();
        });

        // municipality last place seen filter
        $('#village-practices-filter').on('change', function () {
            practices_table.columns(5).search( this.value ).draw();
        });

        // Searches filters - CLOSE
        //----------------------------------------------------------------

    });

</script>
