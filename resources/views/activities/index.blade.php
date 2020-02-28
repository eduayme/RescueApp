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
                    {{ __('main.activity_log') }}
                </h3>
            </div>
            <!-- Container for delete button - OPEN -->
            <div class="col-sm text-right">
                <a href="{{ route('activities_delete_all') }}">
                    <button type="button" class="btn btn-danger">
                        <span style="padding-right:0.5em;" class="octicon octicon-trashcan"></span> Clear Log
                    </button>
                </a>
            </div>
            <!-- Container for delete button - CLOSE -->

        <!-- Users table - OPEN -->
        <div class="table-responsive">
        <table class=" table table-hover table-light">
            <thead>
              <tr>
                <th><i class="octicon octicon-database" aria-hidden="true"></i> ID</th>
                <th><i class="octicon octicon-clock" aria-hidden="true"></i> {{ __('activity.time') }}</th>
                <th><i class="octicon octicon-book" aria-hidden="true"></i> {{ __('activity.description') }}</th>
                <th><i class="octicon octicon-person" aria-hidden="true"></i> {{ __('activity.user') }}</th>
                <th><i class="octicon octicon-terminal" aria-hidden="true"></i> {{ __('activity.method') }}</th>
                <th><i class="octicon octicon-milestone" aria-hidden="true"></i> {{ __('activity.route') }}</th>
                <th><i class="octicon octicon-location" aria-hidden="true"></i> {{ __('activity.ip_address') }}</th>
                <th><i class="octicon octicon-dashboard" aria-hidden="true"></i> {{ __('activity.browser') }}</th>
                <th><i class="octicon octicon-device-desktop" aria-hidden="true"></i> {{ __('activity.os') }}</th>

              </tr>
            </thead>
            <tbody>
                @foreach ($activities as $activity)
                    <tr>
                        <td>
                            {{ $activity->id }}
                        </td>
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
                            <button type="button" class="btn btn-info">GET</button>
                            @else
                            <button type="button" class="btn btn-dark">POST</button>
                            @endif

                        </td>
                        <td>
                            {{ $activity->route }}
                        </td>
                        <td>
                            {{ $activity->ip_address }}
                        </td>
                        <td>
                            {{ $activity->browser }}
                        </td>
                        <td>
                            {{ $activity->os }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <!-- Users table - CLOSE -->
        <div class="col-sm"></div>
        <div class="col-sm">
        <?php echo $activities->links('vendor.pagination.bootstrap-4'); ?>
        </div>
        <div class="col-sm"></div>
    </div>

</div>
 <!-- Content - CLOSE -->
@endsection

<!-- JQuery 3.3.1 -->
<script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
