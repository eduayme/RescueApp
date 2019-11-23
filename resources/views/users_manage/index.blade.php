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
    <div class="container margin-top padding-bottom">

        <div class="row">
            <div class="col-sm"></div>
            <div class="col-sm">
                <h3 class="margin-bottom-sm text-center">
                    {{ __('main.users') }}
                </h3>
            </div>
            <div class="col-sm text-right">
                <button type="button" class="btn btn-sm btn-outline-primary">
                    <span class="octicon octicon-plus"></span>
                    {{ __('actions.add') . ' ' . __('main.user') }}
                </button>
            </div>
        </div>

        <!-- Users table - OPEN -->
        <table class="table dt-responsive nowrap table-hover text-center"
        id="users" style="width: 100%">

            <!-- Table header - OPEN -->
            <thead>
                <tr>
                    <th scope="col"> ID </th>
                    <th scope="col"> {{ __('register.name') }} </th>
                    <th scope="col"> {{ __('login.email') }} </th>
                    <th scope="col"> {{ __('register.profile') }} </th>
                    <th scope="col"> {{ __('main.last_login_at') }} </th>
                    <th scope="col"> {{ __('actions.actions') }} </th>
                </tr>
            </thead>
            <!-- Table header - CLOSE -->

            <!-- Table content - OPEN -->
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>
                            {{ $user->id }}
                        </td>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            {{ $user->profile }}
                        </td>
                        <td>
                            @php
                                $date = new Date($user->last_login_at);
                                echo $date->format('H:i | d M. Y');
                            @endphp
                        </td>
                        <td>
                            <!-- View user button - OPEN -->
                            @include('buttons.view_user')
                            <!-- View user button - CLOSE -->
                            <!-- Edit user button - OPEN -->
                            @include('buttons.edit_user')
                            <!-- Edit user button - CLOSE -->
                            <!-- Delete user button - OPEN -->
                            @include('buttons.delete_user')
                            <!-- Delete user modal - CLOSE -->
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
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
            "order": [ 0, "asc" ],
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
        var users_table  = $('#users').DataTable();

    });

</script>
