<!-- Edit user button - OPEN -->
<span data-toggle="modal" href="#editModal-{{ $incident->id }}">
    <button type="button" class="btn btn-sm btn-outline-dark btn-margin">
        <span class="octicon octicon-pencil"></span>
        {{ __('actions.edit') }}
    </button>
</span>
<!-- Edit user button - CLOSE -->
<!-- Edit user modal - OPEN -->
<div id="editModal-{{ $incident->id }}" class="modal fade">
    <div class="modal-dialog modal-confirm">

        <!-- Modal content - OPEN -->
        <div class="modal-content">

            <!-- Form edit user - OPEN -->
            {{ Form::model($incident, array('route' => array('incidents.update', $incident->id), 'files'=> true)) }}
                @csrf
                @method('PUT')

                <!-- Modal header - OPEN -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                </div>
                <!-- Modal header - CLOSE -->

                <!-- Modal body - OPEN -->
                <div class="modal-body text-center">

                    <!-- Incident ID - OPEN -->
                    <h3 class="text-center">
                        {{ __('main.incident') }} {{ $incident->id }}
                    </h3>
                    <!-- Incident ID - CLOSE -->

                    <div class="container pad-sm">
                        <div class="row justify-content-center">

                            <!-- Date - OPEN -->
                            <div class="form-group col-md-6">
                                {{ Form::label('date', __('forms.date_time')) }}
                                <input type="text" name="date" value="{{ $incident->date }}"
                                class="form-control text-center {{ $errors->has('date') ? ' is-invalid' : '' }}" />
                            </div>
                            <!-- Date - CLOSE -->

                            <!-- Description - OPEN -->
                            <div class="form-group col-md-12">
                                {{ Form::label('description', __('forms.description')) }}
                                {{ Form::textarea('description', null, array('class' => 'form-control', 'rows' => 2)) }}
                            </div>
                            <!-- Description - CLOSE  -->

                            <!-- Images - OPEN -->
                            <div class="form-group col-md-12 no-margin">
                                {{ Form::label('description', __('forms.images')) }}

                                <input type="file" class="form-control margin-bottom {{ $errors->has('images') ? ' is-invalid' : '' }}" name="images_new[]" multiple />
                                <!-- Show errors input - OPEN -->
                                @if( $errors->has('images') )
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('images') }}</strong>
                                </div>
                                @endif
                                <!-- Show errors input - CLOSE -->
                            </div>

                            @if (count($incident->images) > 0)
                                <?php foreach ($incident->images as $key => $image): ?>
                                    <div class="col-md-4 margin-bottom">
                                        <img src="/uploads/search_{{$incident->search_id}}/incidents/incident_{{$incident->id}}/{{$image->photo}}" class="incident_image">
                                        <btn> delete </btn>
                                    </div>
                                <?php endforeach; ?>
                            @endif
                            <!-- Images - CLOSE  -->
                        </div>
                    </div>

                </div>
                <!-- Modal body - CLOSE -->

                <!-- Modal footer - OPEN -->
                <div class="modal-footer">
                    <a class="btn btn-light" data-dismiss="modal">
                        {{ __('actions.cancel') }}
                    </a>
                    <!-- Register button - OPEN -->
                    {{ Form::submit( __('actions.save'), array('class' => 'btn btn-primary') ) }}
                    <!-- Register button - CLOSE -->
                </div>
                <!-- Modal footer - CLOSE -->

            {{ Form::close() }}
            <!-- Form - CLOSE -->

        </div>
        <!-- Modal content - CLOSE -->

    </div>
</div>
<!-- Edit user modal - CLOSE -->

<!-- JS -->
<script type="text/javascript">

    $(document).ready(function() {
        // today date
        var today = new Date();

        // begin date input
        $('input[name="date"]').daterangepicker({
          singleDatePicker: true,
          timePicker: true,
          timePicker24Hour: true,
          timePickerIncrement: 5,
          autoUpdateInput: false,
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

        $('input[name="date"]').on('apply.daterangepicker', function(ev, picker) {
          $(this).val(picker.startDate.format('YYYY-MM-DD HH:mm:ss'));
        });

        $('input[name="date"]').on('cancel.daterangepicker', function(ev, picker) {
          $(this).val('');
        });
    });

</script>
