@extends('layouts.app')

@section('title', __('actions.add') . ' ' . __('leader.leader'))

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
    <form method="post" action="{{ route('leaders.store') }}">
    {{ csrf_field() }}

        <!-- Stype service title - OPEN -->
        <h3 class="margin-top">
            {{ __('actions.add') . ' ' . __('leader.leader') }}
        </h3>
        <!-- Stype service title - CLOSE -->

        <!-- Type activity, code and region - OPEN -->
        <div class="form-row">
            @csrf

            <!-- Leader code - OPEN  -->
            <div class="form-group col-md-6">
                <label for="leaderCode"> {{ __('leader.id') }} </label>
                {{ Form::text('leader_code', null, array('class' => 'form-control', 'required' => 'required')) }}
                <!-- Show errors input - OPEN -->
                @if( $errors->has('leader_code') )
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('leader_code') }}</strong>
                    </div>
                @endif
                <!-- Show errors input - CLOSE -->
            </div>
            <!-- Leader code - CLOSE  -->

            <!-- Phone - OPEN -->
            <div class="form-group col-md-6">
                <label for="phone"> {{ __('leader.phone') }} </label>
                {{ Form::text('phone', null, array('class' => 'form-control')) }}
                <!-- Show errors input - OPEN -->
                @if( $errors->has('phone') )
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </div>
                @endif
                <!-- Show errors input - CLOSE -->
            </div>
            <!-- Phone - CLOSE -->

            <!-- Leader name - OPEN  -->
            <div class="form-group col-md-6">
                <label for="name"> {{ __('leader.name') }} </label>
                {{ Form::text('name', null, array('class' => 'form-control')) }}
                <!-- Show errors input - OPEN -->
                @if( $errors->has('name') )
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </div>
                @endif
                <!-- Show errors input - CLOSE -->
            </div>
            <!-- Leader name - CLOSE  -->

            <!-- Leader code - OPEN  -->
            <div class="form-group col-md-6">
                <label for="start"> {{ __('leader.start') }} </label>
                {{ Form::text('start', null, array('class' => 'form-control')) }}
                <!-- Show errors input - OPEN -->
                @if( $errors->has('start') )
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('start') }}</strong>
                    </div>
                @endif
                <!-- Show errors input - CLOSE -->
            </div>
            <!-- Leader code - CLOSE  -->

        </div>
        <!-- Type activity, code and region - OPEN -->

        <!-- Id search HIDDEN - OPEN -->
        {{ Form::hidden('search_id', $search_id) }}
        <!-- Id search HIDDEN - CLOSE -->

        <!-- Submit button - OPEN -->
        <div class="text-center margin-top">
            <button type="submit" class="btn btn-primary">
                <span class="octicon octicon-plus"></span>
                {{ __('actions.add') . ' ' . __('leader.leader') }}
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
