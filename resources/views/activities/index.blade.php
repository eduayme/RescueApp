@extends('layouts.app')

@section('title', __('main.users'))

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
    <div class="container mb-5 mt-3 my-md-3">

        <div class="row justify-content-end no-margin">
            <div class="col-4 text-center">
                <h3 class="margin-bottom-sm">
                    {{ __('main.logs') }}
                </h3>
            </div>
            <div class="col-4 text-right no-pad">
                <a href="{{ route('activities_delete_all') }}" class="btn btn-danger">
                    <span style="padding-right:0.5em;" class="octicon octicon-trashcan"></span>
                    {{ __('activity.clear_logs') }}
                </a>
            </div>
        </div>

        <!-- Users table - OPEN -->
        <div class="table-responsive margin-top-bottom">
            <table class="table dt-responsive nowrap table-hover table-striped"
            id="activity" style="width: 100%">

                <thead class="thead-dark">
                  <tr>
                    <th><i class="octicon octicon-clock" aria-hidden="true"></i> {{ __('activity.time') }}</th>
                    <th><i class="octicon octicon-book" aria-hidden="true"></i> {{ __('activity.description') }}</th>
                    <th><i class="octicon octicon-person" aria-hidden="true"></i> {{ __('activity.user') }}</th>
                    <th><i class="octicon octicon-terminal" aria-hidden="true"></i> {{ __('activity.method') }}</th>
                    <th><i class="octicon octicon-milestone" aria-hidden="true"></i> {{ __('activity.route') }}</th>
                    <th><i class="octicon octicon-location" aria-hidden="true"></i> {{ __('activity.ip_address') }}</th>
                  </tr>
                </thead>

                <tbody>
                    @foreach ($activities as $activity)
                        <tr>
                            <td>
                                {{ $activity->created_at->diffForHumans() }}
                            </td>
                            <td>
                                {{ __('activity.' . $activity->description) }}
                            </td>
                            <td>
                              <a href="{{route('view_profile', $activity->user->id)}}" >  {{ $activity->user->name }}</a>
                            </td>
                            <td>
                                @if ($activity->method == "GET")
                                    <h5> <span class="badge badge-dark"> GET </span> </h5>
                                @else
                                    <h5> <span class="badge badge-info"> POST </span> </h5>
                                @endif

                            </td>
                            <td>
                                {{ $activity->route }}
                            </td>
                            <td>
                                {{ $activity->ip_address }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Users table - CLOSE -->

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
            "bSort" : false,
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
        var activity_table  = $('#activity').DataTable();

    });

</script>
