@extends('layouts.app')

@section('title', __('actions.add') . ' ' . __('main.incident'))

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
    <form method="post" action="{{ route('incidents.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}

        <!-- Stype service title - OPEN -->
        <h3 class="margin-top">
            {{ __('main.incident') }}
        </h3>
        <!-- Stype service title - CLOSE -->

        <!-- Type activity, code and region - OPEN -->
        <div class="form-row">
            @csrf

            <!-- Incident route - OPEN  -->
            <div class="form-group col-md-12">
                <label for="description"> {{ __('forms.description') }} </label>
                <textarea type="text" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="2">{{ old('description') }}</textarea>

                <!-- Show errors input - OPEN -->
                @if( $errors->has('description') )
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('description') }}</strong>
                </div>
                @endif
                <!-- Show errors input - CLOSE -->
            </div>
            <!-- Incident route - CLOSE  -->

            <!-- Datetime happens - OPEN -->
            <div class="form-group col-md-6">
                <label for="date"> {{ __('forms.day') }} </label>
                <input type="text" class="form-control {{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" value="{{ old('date') }}"/>

                <!-- Show errors input - OPEN -->
                @if( $errors->has('date') )
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('date') }}</strong>
                </div>
                @endif
                <!-- Show errors input - CLOSE -->
            </div>
            <!-- Datetime happens - CLOSE -->

            <!-- Images - OPEN -->
            <div class="form-group col-md-6">
                <label for="date"> {{ __('forms.images') }} </label>

                <input type="file" class="form-control {{ $errors->has('images') ? ' is-invalid' : '' }}" name="images[]" multiple />
                <!-- Show errors input - OPEN -->
                @if( $errors->has('images') )
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('images') }}</strong>
                </div>
                @endif
                <!-- Show errors input - CLOSE -->
            </div>
            <!-- Images - CLOSE -->

        </div>
        <!-- Type activity, code and region - OPEN -->

        <!-- Id search HIDDEN - OPEN -->
        <input type="hidden" class="form-control" name="search_id" value={{ $search_id }}>
        <!-- Id search HIDDEN - CLOSE -->

        <!-- Id user creates HIDDEN - OPEN -->
        <input type="hidden" class="form-control" name="user_creation_id" value={{ Auth::user()->id }}>
        <!-- Id user creates HIDDEN - CLOSE -->

        <!-- Id user last modification HIDDEN - OPEN -->
        <input type="hidden" class="form-control" name="user_modification_id" value={{ Auth::user()->id }}>
        <!-- Id user last modification HIDDEN - CLOSE -->

        <!-- Submit button - OPEN -->
        <div class="text-center margin-top">
            <button type="submit" class="btn btn-primary">
                <span class="octicon octicon-plus"></span>
                {{ __('actions.add') . ' ' . __('main.incident') }}
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
