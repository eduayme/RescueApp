<!-- If exists groups - OPEN -->
@if ($search->groups->count())
    <div class="container mb-5 mt-3 my-md-3">
        <div class="row text-center margin-top-bottom">
            <div class="col-md-3">
                <select class="form-control" id="status-groups-filter">
                    <option value=""> {{ __('actions.filter_by_status') }} </option>
                    <option value="{{ __('group.is_active') }}"> {{ __('group.is_active') }} </option>
                    <option value="{{ __('group.is_closed') }}"> {{ __('group.is_closed') }} </option>
                </select>
            </div>
            <div class="col-md-9 text-right">
                <!-- Add leader button - OPEN -->
                <a href="{{ route('groups.create', ['search_id' => $search->id]) }}" class="btn btn-outline-primary margin-left align-right btn-sm margin-bottom" role="button"
                <?php if ($search->status == 1 || Auth::user()->profile == 'guest'){ ?> style="display: none" <?php } ?> >
                    <span class="octicon octicon-plus"></span>
                    {{ __('actions.add') . ' ' . __('group.group') }}
                </a>
                <!-- Add leader button - CLOSE -->
            </div>
        </div>

        <div class="row text-center margin-top-bottom">
            <div class="col-sm-12">
                <table class="table dt-responsive nowrap table-hover text-center" id="groups" style="width: 100%">
                    @include('searches.resources.groups.table', ['items' => $search->groups])
                </table>
            </div>
        </div>
    </div>
<!-- If exists groups - OPEN -->

<!-- If NO group - OPEN -->
@else
    <div class="card text-center">
        <div class="card-body">

            <img src="/img/add_group.png" width="300">

            <h4 class="card-title margin-bottom text-secondary">
                {{ __('messages.no_groups') }}
            </h4>

            <a href="{{ route('groups.create', ['search_id' => $search->id]) }}" class="btn btn-primary margin-left align-right btn-sm margin-bottom" role="button"
            <?php if ($search->status == 1 || Auth::user()->profile == 'guest'){ ?> style="display: none" <?php } ?> >
                <span class="octicon octicon-plus"></span>
                {{ __('actions.add') . ' ' . __('group.group') }}
            </a>
        </div>
    </div>
<!-- If NO group - CLOSE -->
@endif

<!-- JS -->
<script>

    $(document).ready(function() {

        // Groups Data Table
        groupsTable = $( "#groups" ).DataTable({
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
                "lengthMenu":     "{{ __('group.lengthMenu') }}",
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
    });

    // resize tables after tab
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        $($.fn.dataTable.tables(true)).DataTable()
        .columns.adjust();
    });

    // filter status is_active
    $('#status-groups-filter').on('change', function () {
        console.log("|"+this.value+"|");
        groupsTable.columns(1).search( this.value ).draw();
    } );

</script>
