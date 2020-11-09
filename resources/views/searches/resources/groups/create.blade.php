@extends('layouts.app')

@section('title', __('actions.add') . ' ' . __('group.group'))

@section('content')

<!-- Alerts - OPEN -->
@include('parts.alerts')
<!-- Alerts - CLOSE -->

<!-- Content - OPEN -->
<div class="container mb-5 mt-3 my-md-3">

    <!-- Top buttons - OPEN -->
    @include('buttons.go_back')
    <!-- Top buttons - CLOSE -->

    <!-- Form - OPEN -->
    <form method="post" action="{{ route('groups.store') }}">
    {{ csrf_field() }}

        <!-- Stype service title - OPEN -->
        <h3 class="margin-top">
            {{ __('actions.add') . ' ' . __('group.group') }}
        </h3>
        <!-- Stype service title - CLOSE -->

        <!-- Group - OPEN -->
        <div class="form-row">
            @csrf

            <!-- Status - OPEN  -->
            <div class="form-group col-md-6">
                <label for="is_active"> {{ __('group.status') }} </label>
                <select id="is_active" class="form-control" name="is_active">
                    <option value="1" @if (old('is_active') == "0") {{ 'selected' }} @endif>
                        {{ __('group.is_active') }}
                    </option>
                    <option value="0" @if (old('is_active') == "1") {{ 'selected' }} @endif>
                        {{ __('group.is_closed') }}
                    </option>
                </select>
            </div>
            <!-- Status - CLOSE  -->

            <!-- Vehicle - OPEN -->
            <div class="form-group col-md-6">
                <label for="vehicle"> {{ __('group.vehicle') }} </label>
                {{ Form::text('vehicle', null, array('class' => 'form-control')) }}

                <!-- Show errors input - OPEN -->
                @if( $errors->has('vehicle') )
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('vehicle') }}</strong>
                    </div>
                @endif
                <!-- Show errors input - CLOSE -->
            </div>
            <!-- Vehicle - CLOSE -->

            <!-- Broadcast - OPEN  -->
            <div class="form-group col-md-6">

                <!-- Broadcast - OPEN  -->
                <div class="form-group col-md-12 p-0">
                    <label for="broadcast"> {{ __('group.broadcast') }} </label>
                    {{ Form::text('broadcast', null, array('class' => 'form-control')) }}

                    <!-- Show errors input - OPEN -->
                    @if( $errors->has('broadcast') )
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('broadcast') }}</strong>
                        </div>
                    @endif
                    <!-- Show errors input - CLOSE -->
                </div>
                <!-- Broadcast - CLOSE  -->

                <!-- GPS - OPEN  -->
                <div class="form-group col-md-12 p-0">
                    <label for="gps"> {{ __('group.gps') }} </label>
                    {{ Form::text('gps', null, array('class' => 'form-control')) }}
                    <!-- Show errors input - OPEN -->
                    @if( $errors->has('gps') )
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('gps') }}</strong>
                        </div>
                    @endif
                    <!-- Show errors input - CLOSE -->
                </div>
                <!-- GPS - CLOSE  -->

            </div>
            <!-- Broadcast - CLOSE  -->

            <!-- People involved - OPEN  -->
            <div class="form-group col-md-6">
                <label for="people_involved"> {{ __('group.people_involved') }} </label>
                {{ Form::textarea('people_involved', null, array('class' => 'form-control','rows'=> 5, 'resize' => 'none')) }}
                <!-- Show errors input - OPEN -->
                @if( $errors->has('people_involved') )
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('people_involved') }}</strong>
                    </div>
                @endif
                <!-- Show errors input - CLOSE -->
            </div>
            <!-- People involved - CLOSE  -->

        </div>
        <!-- Group - CLOSE -->

        <!-- Id search HIDDEN - OPEN -->
        {{ Form::hidden('search_id', $search_id) }}
        <!-- Id search HIDDEN - CLOSE -->

        <!-- Submit button - OPEN -->
        <div class="text-center margin-top">
            <button type="submit" class="btn btn-primary">
                <span class="octicon octicon-plus"></span>
                {{ __('actions.add') . ' ' . __('group.group') }}
            </button>
        </div>
        <!-- Submit button - OPEN -->

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
        $('input[name="start"]').daterangepicker({
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

        $('input[name="start"]').on('cancel.daterangepicker', function(ev, picker) {
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
