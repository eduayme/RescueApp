<div class="row">

    <!-- Content - OPEN -->
    <div class="container padding-bottom">
    @if (count($incidents) > 0)

        <div class="text-right">
            <!-- Add Incident - OPEN -->
            <a href="{{ route('incidents.create', $search->id) }}" class="btn btn-outline-primary margin-left align-right btn-sm margin-bottom" role="button"
            <?php if ($search->status == 1 || Auth::user()->profile == 'guest'){ ?> style="display: none" <?php } ?> >
                <span class="octicon octicon-plus"></span>
                {{ __('actions.add') . ' ' . __('main.incident') }}
            </a>
            <!-- Add Incident - CLOSE -->
        </div>

        <!-- Incidents - OPEN -->
        <table class="table dt-responsive table-hover text-center"
        id="incidents" style="width: 100%">
            @include('searches.incidents.table_incidents', ['items' => $incidents])
        </table>
        <!-- Incidents - OPEN -->

    @else
        <div class="text-center">
            <img src="/img/add_incident.png" width="400">

            <h4 class="card-title margin-bottom text-secondary">
                {{ __('main.no_incident') }}
            </h4>

            <a href="{{ route('incidents.create', $search->id) }}" class="btn btn-primary margin-top-bottom" role="button"
            <?php if ($search->status == 1 || Auth::user()->profile == 'guest'){ ?> style="display: none" <?php } ?> >
                <span class="octicon octicon-plus"></span>
                {{ __('actions.add') . ' ' . __('main.incident') }}
            </a>
        </div>

    @endif
    </div>
    <!-- Content - CLOSE -->

</div>

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
            "order": [ 0, "desc" ],
            "columns": [
                { "width": "15%" },
                { "width": "15%" },
                { "width": "40%" },
                { "width": "15%" },
                { "width": "15%" },
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
        var incidents_table  = $('#incidents').removeAttr('width').DataTable();

        // resize tables after tab
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust()
                .responsive.recalc();
        });
    });

</script>
