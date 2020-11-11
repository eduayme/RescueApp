@if ($search->involved_people->count())
<!-- Content - OPEN -->
<div class="container mb-5 mt-3 my-md-3">
    <div class="row text-center margin-top-bottom">
        <div class="col-sm-12 text-right">
            <!-- Add person button - OPEN -->
            <a href="{{ route('involved_people.create', ['search_id' => $search->id]) }}" class="btn btn-outline-primary margin-left align-right btn-sm margin-bottom" role="button"
            <?php if ($search->status == 1 || Auth::user()->profile == 'guest'){ ?> style="display: none" <?php } ?> >
                <span class="octicon octicon-plus"></span>
                {{ __('actions.add') . ' ' . __('involved_people.involved_person') }}
            </a>
            <!-- Add person button - CLOSE -->
        </div>
    </div>

    <div class="row text-center margin-top-bottom">
        <div class="col-sm-12">
            <table class="table dt-responsive nowrap table-hover text-center" id="involved_people" style="width: 100%">
                @include('searches.resources.involved_people.table', ['items' => $search->involved_people])
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
            {{ __('messages.no_involved_people') }}
        </h4>

        <a href="{{ route('involved_people.create', ['search_id' => $search->id]) }}" class="btn btn-primary margin-top-bottom" role="button"
        <?php if ($search->status == 1 || Auth::user()->profile == 'guest'){ ?> style="display: none" <?php } ?> >
            <span class="octicon octicon-plus"></span>
            {{ __('actions.add') . ' ' . __('involved_people.involved_person') }}
        </a>
    </div>
</div>
<!-- If NO leader - CLOSE -->
@endif

<!-- JS -->
<script>

    $(document).ready(function() {
        // Leaders Data Table
        leadersTable = $( "#involved_people" ).DataTable({
            "scrollX": true,
            "pagingType": "full_numbers",
            "responsive": true,
            "order": [ [ 0, "desc" ]],
            "lengthMenu": [ 5, 10, 15],
            "language": {
                "decimal":        "",
                "emptyTable":     "{{ __('tables.emptyTable') }}",
                "info":           "{{ __('tables.info') }}",
                "infoEmpty":      "{{ __('tables.infoEmpty') }}",
                "infoFiltered":   "{{ __('tables.infoFiltered') }}",
                "infoPostFix":    "",
                "thousands":      ",",
                "lengthMenu":     "{{ __('involved_people.lengthMenu') }}",
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
