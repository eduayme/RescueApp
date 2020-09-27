@extends('layouts.app')

@section('title', __('actions.add') . ' ' . __('main.incident'))

@section('content')

<!-- Alerts - OPEN -->
@include('parts.alerts')
<!-- Alerts - CLOSE -->

<!-- Content - OPEN -->
<div class="container margin-top padding-bottom">

    <!-- Top buttons - OPEN -->
    @include('buttons.go_back')
    <!-- Top buttons - CLOSE -->

    <!-- Form - OPEN -->
    <form method="post" action="{{ route('postTask') }}" enctype="multipart/form-data">
    @csrf

        <!-- Stype service title - OPEN -->
        <h3 class="margin-top">
            {{ __('main.task') }}
        </h3>
        <!-- Stype service title - CLOSE -->

        <div class="form-row">

            <!-- Sector - OPEN -->
            <div class="form-group col-md-6">
                <label for="sector">
                    {{ __('forms.sector') }}
                </label>
                <input type="text" name="sector" class="form-control" id="sector" required>
                @error('sector')
                    <p class="alert alert-danger">{{ $message }}</p>
                @enderror
            </div>
            <!-- Sector - CLOSE -->

            <!-- Group - OPEN -->
            <div class="form-group col-md-6">
                <label for="inputGroup">
                    {{ __('forms.task_group') }}
                </label>
                <input type="text" name="group" class="form-control" id="group">
                @error('group')
                    <p class="alert alert-danger">{{ $message }}</p>
                @enderror
            </div>
            <!-- Group - CLOSE -->

            <!-- Start - OPEN -->
            <div class="form-group col-md-6">
                <label for="inputStart">
                    {{ __('forms.task_start') }}
                </label>
                <input type="text" name="start" class="datapicker form-control" id="start">
                @error('start')
                    <p class="alert alert-danger">{{ $message }}</p>
                @enderror
            </div>
            <!-- Start - End -->

            <!-- End - OPEN -->
            <div class="form-group col-md-6">
                <label for="inputEnd">
                    {{ __('forms.task_end') }}
                </label>
                <input type="text" name="end" class="datapicker form-control" id="end">
                @error('end')
                    <p class="alert alert-danger">{{ $message }}</p>
                @enderror
            </div>
            <!-- End - CLOSE -->

            <!-- Type - OPEn -->
            <div class="form-group col-md-6">
                <label for="inputType">
                    {{ __('forms.task_type') }}
                </label>
                <input type="text" name="type" class="form-control" id="inputType">
                @error('type')
                    <p class="alert alert-danger">{{ $message }}</p>
                @enderror
            </div>
            <!-- Type - CLOSE -->

            <!-- Status - OPEN -->
            <div class="form-group col-md-6">
                <label for="inputState">
                    {{ __('forms.status') }}
                </label>
                <Select type="text" name="status" class="form-control">
                    <option value="to_do">{{ __('activity.to_do') }}</option>
                    <option value="in_progress">{{ __('activity.in_progress') }}</option>
                    <option value="done">{{ __('activity.done') }}</option>
                </Select>
                @error('status')
                    <p class="alert alert-danger">{{ $message }}</p>
                @enderror
            </div>
            <!-- Status - CLOSE -->

            <!-- Tracking Device - OPEN -->
            <div class="form-group col-md-4">
                <label for="inputTrackingDevice">
                    {{ __('forms.tracking_device') }}
                </label>
                <input type="text" name="trackingDevice" class="form-control">
                @error('trackingDevice')
                    <p class="alert alert-danger">{{ $message }}</p>
                @enderror
            </div>
            <!-- Tracking Device - CLOSE -->

            <!-- GPX File name - OPEN -->
            <div class="form-group col-md-4">
                <label for="inputGpxFileName">
                    {{ __('forms.tracking_device') }}
                </label>
                <input type="text" name="gpxFileName" class="form-control">
                @error('gpxFileName')
                    <p class="alert alert-danger">{{ $message }}</p>
                @enderror
            </div>
            <!-- GPX File name - CLOSE -->

            <!-- GPX File - OPEN -->
            <div class="form-group col-md-4">
                <label for="exampleFormControlFile1">
                {{ __('actions.attach') }}</label>
                <input type="file" name="gpxFile" class="form-control-file"
                accept=".gpx">
                @error('gpxFile')
                    <p class="alert alert-danger">{{ $message }}</p>
                @enderror
            </div>
            <!-- GPX File - CLOSE -->

            <!-- Description - OPEN -->
            <div class="form-group col-md-12">
                <label class="align-baseline" for="inputDescription">
                    {{ __('forms.description') }}
                </label>
                <textarea name="description" class="form-control"></textarea>
                @error('description')
                    <p class="alert alert-danger">{{ $message }}</p>
                @enderror
            </div>
            <!-- Description - CLOSE-->

            <!-- Id search HIDDEN - OPEN -->
            <input type="hidden" class="form-control" name="search_id"
            value={{ $search_id }}>
            <!-- Id search HIDDEN - CLOSE -->

            <!-- Submit button - OPEN -->
            <div class="form-group col-md-12 text-center margin-top justify-content-center">
                <button type="submit" class="btn btn-primary">
                    <span class="octicon octicon-plus"></span>
                    {{ __('actions.add') . ' ' . __('main.task') }}
                </button>
            </div>
            <!-- Submit button - OPEN -->
        </div>

    </form>
    <!-- Form - CLOSE -->

</div>
<!-- Content - CLOSE -->

@endsection

<!-- JQuery 3.3.1 -->
<script src="{{ asset('js/jquery-3.3.1.js') }}"></script>

<!-- JS -->
<script type="text/javascript">

    $(document).ready(function() {
        // today date
        var today = new Date();

        // Datetime happens input
        $('.datapicker').daterangepicker({
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

        $('#start').val( '' );
        $('#end').val( '' );

        $('#start, #end').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });

        $('#start').on('apply.daterangepicker', function(ev, picker) {
            var min = $('#start').data('daterangepicker').startDate;
            var end_curr_date = $('#end').data('daterangepicker').startDate;

            if( min > end_curr_date ) {
                $('#end').data('daterangepicker').startDate = min;
            }

            $('#end').data('daterangepicker').minDate = min;
        });
    });

</script>
