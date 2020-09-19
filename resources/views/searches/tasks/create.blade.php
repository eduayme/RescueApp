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
    <form method="post" action="{{ route('postTask') }}">
    @csrf
    <div class="form-group">
        <!-- Stype service title - OPEN -->
        <h3 class="margin-top">
            {{ __('main.task') }}
        </h3>
        <!-- Stype service title - CLOSE -->

        <!-- Sector, Group, Start, End, Type, Status, Tacking Device, Description OPEN -->
            <div class="row">
                <div class="col text-left">
                    <label for="sector">
                        {{ __('forms.sector') }}
                    </label>
                    <input type="text" name="Sector" class="form-control" id="sector" required>
                    @error('Sector')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col text-left">
                    <label for="inputGroup">
                        {{ __('forms.task_group') }}
                    </label>
                    <select type="text" name="Group" class="form-control" id="inputGroup" required>
                        <option disabled selected>Choose an active group</option>
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                    </select>
                    @error('Group')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="row mt-3">
                <div class="col text-left">
                    <label for="inputStart">
                        {{ __('forms.task_start') }}
                    </label>
                    <input type="datetime-local" name="Start" class="form-control" 
                    id="inputStart" required>
                    @error('Start')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col text-left">
                    <label for="inputEnd">
                        {{ __('forms.task_end') }}
                    </label>
                    <input type="datetime-local" name="End" class="form-control"
                    id="inputEnd" required>
                    @error('End')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="row mt-3">
                <div class="col text-left">
                    <label for="inputType">
                        {{ __('forms.task_type') }}
                    </label>
                    <input type="text" name="Type" class="form-control" 
                    id="inputType" required>
                    @error('Type')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col text-left">
                    <label for="inputState">
                        {{ __('forms.status') }}
                    </label>
                    <Select type="text" name="Status" class="form-control" required> 
                        <option value="to_do">To do</option>
                        <option value="in_progress">In progress</option>
                        <option value="done">Done</option>
                    </Select>
                    @error('Status')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="row mt-3">
                <div class="col text-left">
                    <label for="inputDevice">
                        {{ __('forms.tracking_device') }}
                    </label>
                    <input type="text" name="trackingDevice1" class="form-control">
                    @error('trackingDevice1')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col text-left">
                    <label>-</label>
                    <input type="text" name="trackingDevice2" class="form-control">
                    @error('trackingDevice2')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

                <div class="row mt-3 justify-content-center">
                    <div class="form-group col-md-12 text-left">
                        <label class="align-baseline" for="inputDescription">
                            {{ __('forms.description') }}
                        </label>
                        <textarea name="Description" class="form-control" required></textarea>
                        @error('Description')
                            <p class="alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
        <!-- Type activity, code and region - OPEN -->

        <!-- Id search HIDDEN - OPEN -->
        <input type="hidden" class="form-control" name="search_id" 
        value={{ $search_id }}>
        <!-- Id search HIDDEN - CLOSE -->

        <!-- Submit button - OPEN -->
        <div class="text-center margin-top">
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
        $('input[name="date"]').daterangepicker({
            singleDatePicker: true,
            timePicker: true,
            timePicker24Hour: true,
            timePickerIncrement: 5,
            startDate: moment().startOf('hour'),
            autoUpdateInput: true,
            autoApply: true,
            drops: 'down',
            currentDate: today,
            maxDate: today,
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

        $('input[name="date"]').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });

        $(".btn-success").click(function(){
            var html = $(".clone").html();
            $(".increment").after(html);
        });
        $("body").on("click",".btn-danger",function(){
            $(this).parents(".control-group").remove();
        });
    });

</script>
