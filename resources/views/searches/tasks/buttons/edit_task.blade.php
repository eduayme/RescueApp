<!-- Edit user button - OPEN -->
<span data-toggle="modal" href="#editTask-{{ $task->id }}">
    <button type="button" class="btn btn-sm btn-outline-dark btn-margin">
        <span class="octicon octicon-pencil"></span>
    </button>
</span>
<!-- Edit user button - CLOSE -->

<!-- Edit user modal - OPEN -->
<div id="editTask-{{ $task->id }}" class="modal fade">
    <div class="modal-dialog modal-lg modal-confirm">

        <!-- Modal content - OPEN -->
        <div class="modal-content">

            <!-- Form edit user - OPEN -->
            <form action="{{ Route('editTask', $task->id) }}" method="POST"
            enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <!-- Modal header - OPEN -->
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bold ml-3">
                        {{ __('forms.edit_task') }}:
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                </div>
                <!-- Modal header - CLOSE -->

                <!-- Modal body - OPEN -->
                <div class="modal-body text-center">
                    <div class="row">
                        <div class="col text-left">
                            <label for="inputSector">
                                {{ __('forms.sector') }}
                            </label>
                            <input type="text" name="sector" class="form-control" value="{{ $task->sector }}">
                            @error('sector')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col text-left">
                            <label for="inputGroup">
                                {{ __('forms.task_group') }}
                            </label>
                            <input type="text" name="group" class="form-control" value="{{ $task->group }}">
                            @error('group')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col text-left">
                            <label for="inputStart">
                                {{ __('forms.task_start') }}
                            </label>
                            <input type="text" name="start" class="datepicker form-control"
                            value="{{ $task->start }}">
                            @error('start')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col text-left">
                            <label for="inputEnd">
                                {{ __('forms.task_end') }}
                            </label>
                            <input type="text" name="end" class="datepicker form-control"
                            value="{{ $task->end }}">
                            @error('end')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col text-left">
                            <label for="inputType">
                                {{ __('forms.task_type') }}
                            </label>
                            <input type="text" name="type" class="form-control" value="{{ $task->type }}">
                            @error('type')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col text-left">
                            <label for="inputState">
                                {{ __('forms.status') }}
                            </label>
                            <select type="text" name="status" class="form-control">
                                <option value="to_do" {{ ($task->status == 'to_do') ? 'selected' : '' }}>{{ __('activity.to_do') }}</option>
                                <option value="in_progress" {{ ($task->status == 'in_progress') ? 'selected' : '' }}>{{ __('activity.in_progress') }}</option>
                                <option value="done" {{ ($task->status == 'done') ? 'selected' : '' }}>{{ __('activity.done') }}</option>
                            </select>
                            @error('status')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col text-left">
                            <label for="inputDevice">
                                {{ __('forms.tracking_device') }}
                            </label>
                            <input type="text" name="trackingDevice" class="form-control" value="{{ $task->trackingDevice }}">
                            @error('trackingDevice')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col text-left">
                            <label for="inputGpxFileName">
                                {{ __('forms.file_name') }}
                            </label>
                            <input type="text" name="gpxFileName" class="form-control" value="{{ $task->gpxFileName }}">
                            @error('gpxFileName')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col text-left">
                            <div class="form-group">
                                <label for="attachFile">
                                    {{ __('actions.attach'). ' ' . __('forms.gpx') }}
                                </label>
                                <input type="file" name="gpxFile" class="form-control-file"
                                accept=".gpx">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3 justify-content-center">
                        <div class="form-group col-md-12 text-left">
                            <label class="align-baseline" for="inputDescription">
                                {{ __('forms.description') }}
                            </label>
                            <textarea name="description" class="form-control">{{ $task->description }}</textarea>
                            @error('description')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
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
                    <button type="submit" class="btn btn-primary">{{ __('actions.save') }}</button>
                    <!-- Register button - CLOSE -->
                </div>
                <!-- Modal footer - CLOSE -->

            </form>
            <!-- Form - CLOSE -->

        </div>
        <!-- Modal content - CLOSE -->

    </div>
</div>
<!-- Edit user modal - CLOSE -->

<!-- JS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.28.0/moment.min.js">
<script type="text/javascript">

    $(document).ready(function() {
        // today date
        var today = new Date();

        // begin date input
        $('.datepicker').daterangepicker({
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

        $('input[name="start"], input[name="end"]').on('apply.daterangepicker', function(ev, picker) {
          $(this).val(picker.startDate.format('YYYY-MM-DD HH:mm:ss'));
        });

        $('input[name="start"], input[name="end"]').on('cancel.daterangepicker', function(ev, picker) {
          $(this).val('');
        });

        $('input[name="start"]').on('apply.daterangepicker', function(ev, picker) {
            var min = $('input[name="start"]').data('daterangepicker').startDate;
            var end_curr_date = $('input[name="end"]').data('daterangepicker').startDate;

            if( min > end_curr_date ) {
                $('input[name="end"]').data('daterangepicker').startDate = min;
            }

            $('input[name="end"]').data('daterangepicker').minDate = min;
        });

    });

</script>
