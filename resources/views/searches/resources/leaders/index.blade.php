{{ Form::hidden('leader_count', $search->leaders->count()) }}
<!-- If NO leader - OPEN -->
<div id="no_leader"class="card text-center">
    <div class="card-body">

        <img src="/img/add_search.png" width="300">

        <h4 class="card-title margin-bottom text-secondary">
            {{ __('messages.no_leaders') }}
        </h4>

        <a href="#addLeaderModal" class="btn btn-primary" role="button" data-toggle="modal"
        <?php if (Auth::user()->profile == 'guest') { ?> style="display:none" <?php } ?> >
            {{ __('actions.add') . ' ' . __('leader.leader') }}
        </a>
    </div>
</div>
<!-- If NO leader - CLOSE -->

<!-- Content - OPEN -->
<div id="with_leader" class="container margin-top padding-bottom">
    <div class="row text-center margin-top-bottom">
        <div class="col-sm-12 text-right">
            <!-- Add leader button - OPEN -->
            @if (Auth::user()->profile != 'guest')
            <span data-toggle="modal" href="#addLeaderModal">
                <button type="button" class="btn btn-sm btn-outline-primary">
                    <span class="octicon octicon-plus"></span>
                    {{ __('actions.add') . ' ' . __('leader.leader') }}
                </button>
            </span>
            @endif
            <!-- Add leader button - CLOSE -->
        </div>
    </div>

    <div class="row text-center margin-top-bottom">
        <div class="col-sm-12">
            <table class="table dt-responsive nowrap table-hover text-center" id="leaders">
                <thead>
                    <tr>
                        <th scope="col"> {{ __('leader.id') }} </th>
                        <th scope="col"> {{ __('leader.name') }} </th>
                        <th scope="col"> {{ __('leader.phone') }} </th>
                        <th scope="col"> {{ __('leader.start') }} </th>
                        <th scope="col"> {{ __('leader.end') }} </th>
                        <th scope="col"> {{ __('forms.actions') }} </th>
                    </tr>
                </thead>
                <tbody>
                    @include('searches.resources.leaders.edit_leader')
                    @include('searches.resources.leaders.delete_leader')
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Content - CLOSE -->

<!-- Add leader modal - OPEN -->
@include('searches.resources.leaders.add_leader',['search_id' => $search->id])
<!-- Add leader modal - CLOSE -->

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
        $('input[name="start"],input[name="edit_start"],input[name="edit_end"]').daterangepicker({
            singleDatePicker: true,
            timePicker: true,
            timePicker24Hour: true,
            timePickerIncrement: 5,
            startDate: moment().startOf('hour'),
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

        $('input[name="start"],input[name="edit_start"],input[name="edit_end"]').val('');

        $('input[name="start"],input[name="edit_start"],input[name="edit_end"]').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });
    });

    // resize tables after tab
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        $($.fn.dataTable.tables(true)).DataTable()
        .columns.adjust();
    });

</script>
