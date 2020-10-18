<!-- Alerts - OPEN -->
@include('parts.alerts')
<!-- Alerts - CLOSE -->

<!-- If NO group - OPEN -->
@if (count($search->groups) == 0)
    <div class="card text-center">
        <div class="card-body">

            <img src="/img/add_group.png" width="300">

            <h4 class="card-title margin-bottom text-secondary">
                {{ __('messages.no_groups') }}
            </h4>

            <a href="#addGroupModal" class="btn btn-primary" role="button" data-toggle="modal"
                <?php if (Auth::user()->profile == 'guest') { ?> style="display:none" <?php } ?> >
                {{ __('actions.add') . ' ' . __('group.group') }}
            </a>
        </div>
    </div>
<!-- If NO group - CLOSE -->

<!-- If exists groups - OPEN -->
@else
    <div class="container margin-top padding-bottom">
        <div class="row text-center margin-top-bottom">
            <div class="col-sm-3">
                <select class="form-control" id="status-groups-filter">
                    <option value=""> {{ __('actions.filter_by_status') }} </option>
                    <option value="{{ __('group.is_active') }}"> {{ __('group.is_active') }} </option>
                    <option value="{{ __('group.is_closed') }}"> {{ __('group.is_closed') }} </option>
                </select>
            </div>
            <div class="col-sm-9 text-right">
                <!-- Add group button - OPEN -->
                @if (Auth::user()->profile != 'guest')
                    <span data-toggle="modal" href="#addGroupModal">
                        <button type="button" class="btn btn-sm btn-outline-primary">
                            <span class="octicon octicon-plus"></span>
                            {{ __('actions.add') . ' ' . __('group.group') }}
                        </button>
                    </span>
                @endif
                <!-- Add group button - CLOSE -->
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

@endif
<!-- If exists groups - OPEN -->

<!-- Add group modal - OPEN -->
@include('searches.resources.groups.add_group',['search_id' => $search->id])
<!-- Add group modal - CLOSE -->

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

</script>
