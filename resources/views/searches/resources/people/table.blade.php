<!-- Own style -->
<link href="{{ asset('css/lightgallery.css') }}" rel="stylesheet" type="text/css" />

<!-- Table - OPEN -->
<table class="table dt-responsive table-hover text-center" id="invovled">
    <!-- Table header - OPEN -->
    <thead>
    <tr>
        <th scope="col"> {{ __('main.involved_name') }} </th>
        <th scope="col"> {{ __('main.involved_total_people') }} </th>
        <th scope="col"> {{ __('main.involved_vehicle') }} </th>
        <th scope="col"> {{ __('main.involved_phone') }} </th>
        <th scope="col"> {{ __('main.involved_people') }} </th>
        <th scope="col"> {{ __('actions.actions') }} </th>
    </tr>
    </thead>
    <!-- Table header - CLOSE -->

    <!-- Table content - OPEN -->
    <tbody>
        @foreach ($involved as $entry)
            <tr>
                <td class="align-middle"> {{ $entry->name }} </td>
                <td class="align-middle"> {{ $entry->total_people }}</td>
                <td class="align-middle"> {{ $entry->vehicle }} </td>
                <td class="align-middle"> {{ $entry->phone_number }} </td>
                <td class="align-middle"> {{ $entry->people }} </td>
                <td class="align-middle" style="width:15%">

                @if( Auth::user()->is_admin() or (Auth::user()->id == $entry->user_creation->id ) )
                    <!-- Edit invovled - OPEN -->
                    @include('searches.resources.people.buttons.edit_people', ['item' => $entry])
                    <!-- Edit invovled - CLOSE -->
                    <!-- Delete invovled - OPEN -->
                    @include('searches.resources.people.buttons.delete_people', ['item' => $entry])
                    <!-- Delete invovled - CLOSE -->
                @endif

                </td>
            </tr>
        @endforeach
    </tbody>
    <!-- Table content - CLOSE -->
</table>

<script src="{{ asset('js/fresco.min.js') }}"></script>
<link href="{{ asset('css/fresco.css') }}" rel="stylesheet" type="text/css" />

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

        $(document).ready(function() {
            $('#invovled').DataTable();
        } );

        // initialize tables
        var involved_table = $('#involved').removeAttr('width').DataTable();

        // resize tables after tab
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });
    });

</script>
