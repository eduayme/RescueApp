@if ($search->leaders->count())
<!-- Content - OPEN -->
<div class="container margin-top padding-bottom">
    <div class="row text-center margin-top-bottom">
        <div class="col-sm-12 text-right">
            <!-- Add leader button - OPEN -->
            @if (Auth::user()->profile != 'guest')
                <a href="{{ route('leaders.create', ['search_id' => $search->id]) }}" class="btn btn-outline-primary margin-left align-right btn-sm margin-bottom" role="button"
                <?php if ($search->status == 1 || Auth::user()->profile == 'guest'){ ?> style="display: none" <?php } ?> >
                    <span class="octicon octicon-plus"></span>
                    {{ __('actions.add') . ' ' . __('leader.leader') }}
                </a>
            @endif
            <!-- Add leader button - CLOSE -->
        </div>
    </div>

    <div class="row text-center margin-top-bottom">
        <div class="col-sm-12">
            <table class="table dt-responsive nowrap table-hover text-center" id="leaders"style="width: 100%">
                @include('searches.resources.leaders.table', ['items' => $search->leaders])
            </table>
        </div>
    </div>
</div>
<!-- Content - CLOSE -->
@else
<!-- If NO leader - OPEN -->
<div class="card text-center">
    <div class="card-body">

        <img src="/img/add_search.png" width="300">

        <h4 class="card-title margin-bottom text-secondary">
            {{ __('messages.no_leaders') }}
        </h4>

        <a href="{{ route('leaders.create', ['search_id' => $search->id]) }}" class="btn btn-primary margin-top-bottom" role="button"
        <?php if ($search->status == 1 || Auth::user()->profile == 'guest'){ ?> style="display: none" <?php } ?> >
            <span class="octicon octicon-plus"></span>
            {{ __('actions.add') . ' ' . __('leader.leader') }}
        </a>
    </div>
</div>
<!-- If NO leader - CLOSE -->
@endif

<!-- JS -->
<script>

    $(document).ready(function() {
        // Leaders Data Table
        leadersTable = $( "#leaders" ).DataTable({
            "scrollX": true,
            "pagingType": "full_numbers",
            "responsive": true,
            "order": [ [ 0, "asc" ]],
            "lengthMenu": [ 5, 10, 15],
            "language": {
                "decimal":        "",
                "emptyTable":     "{{ __('tables.emptyTable') }}",
                "info":           "{{ __('tables.info') }}",
                "infoEmpty":      "{{ __('tables.infoEmpty') }}",
                "infoFiltered":   "{{ __('tables.infoFiltered') }}",
                "infoPostFix":    "",
                "thousands":      ",",
                "lengthMenu":     "{{ __('leader.lengthMenu') }}",
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

        // date inputs
        var today = new Date();
        $('input[name="start"],input[name="end"]').daterangepicker({
            singleDatePicker: true,
            timePicker: true,
            timePicker24Hour: true,
            timePickerIncrement: 5,
            autoUpdateInput: true,
            autoApply: true,
            drops: 'down',
            currentDate: today,
            locale: {
                format: 'YYYY-MM-DD HH:mm:ss',
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

        $('input[name="start"],input[name="end"]').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });
    });

    // resize tables after tab
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        $($.fn.dataTable.tables(true)).DataTable()
        .columns.adjust();
    });

</script>
