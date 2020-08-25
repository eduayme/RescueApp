<!-- Own style -->
<link href="{{ asset('css/lightgallery.css') }}" rel="stylesheet" type="text/css" />

<!-- Table - OPEN -->
<table class="table dt-responsive table-hover text-center" id="incidents">

    <!-- Table header - OPEN -->
    <thead>
        <tr>
            <th scope="col"> # </th>
            <th scope="col"> {{ __('forms.date_time') }} </th>
            <th scope="col"> {{ __('forms.creator') }} </th>
            <th scope="col"> {{ __('forms.description') }} </th>
            <th scope="col"> {{ __('forms.images') }} </th>
            <th scope="col"> {{ __('actions.actions') }} </th>
        </tr>
    </thead>
    <!-- Table header - CLOSE -->

    <!-- Table content - OPEN -->
    <tbody>
    @foreach ($incidents as $incident)
        <tr>

            <td class="align-middle" style="width:5%">
                {{ $incident->id }}
            </td>

            <td class="align-middle" style="width:15%">
                @if ($incident->date == NULL)
                    --
                @else
                    @php
                        $date = new Date($incident->date);
                        echo $date->format('M. d | H:i');
                    @endphp
                @endif
            </td>

            <td class="align-middle" style="width:15%">
                <a href="{{ route('view_profile', $incident->user_creation->id) }}">
                    {{ $incident->user_creation->name }}
                </a>
            </td>

            <td class="align-middle" style="width:40%">
                @if ($incident->description == NULL)
                    --
                @else
                    <p class="ellipsis line-breaks"> {{ $incident->description }} </p>
                @endif
            </td>

            <td class="align-middle" style="width:15%">
                @if (count($incident->images) > 0)
                    <?php foreach ($incident->images as $key => $image): ?>
                        <a <?php if($key!=0) :?>style="display:none"<?php endif; ?>
                        href="/uploads/search_{{$incident->search_id}}/incidents/incident_{{$incident->id}}/{{$image->photo}}" class="fresco"
                        data-fresco-group="{{$incident->id}}">
                            <img src="/uploads/search_{{$incident->search_id}}/incidents/incident_{{$incident->id}}/{{$image->photo}}" class="incident_image cursor">
                        </a>
                    <?php endforeach; ?>
                @else
                    --
                @endif
            </td>

            <td class="align-middle" style="width:10%">
                <!-- View incident - OPEN -->
                @include('searches.incidents.buttons.view_incident', ['item' => $incident])
                <!-- View incident - CLOSE -->

                <!-- If user admin or incident creator - OPEN -->
                @if( Auth::user()->is_admin() or (Auth::user()->id == $incident->user_creation->id ) )
                    <!-- Edit incident - OPEN -->
                    @include('searches.incidents.buttons.edit_incident', ['item' => $incident])
                    <!-- Edit incident - OPEN -->
                    <!-- Delete incident - OPEN -->
                    @include('searches.incidents.buttons.delete_incident', ['item' => $incident])
                    <!-- Delete incident - OPEN -->
                @endif
                <!-- If user admin or incident creator - CLOSE -->
            </td>

        </tr>
    @endforeach
    </tbody>
    <!-- Table content - CLOSE -->

</table>
<!-- Table - CLOSE -->

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
            "columns": [
                { "width": "5%" },
                { "width": "15%" },
                { "width": "15%" },
                { "width": "40%" },
                { "width": "15%" },
                { "width": "10%" },
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
        var incidents_table = $('#incidents').removeAttr('width').DataTable();

        // resize tables after tab
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });
    });

</script>
