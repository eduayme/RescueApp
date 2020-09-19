<!-- Edit user button - OPEN -->
<span data-toggle="modal" href="#editTask-{{ $task->id }}">
    <button type="button" class="btn btn-sm btn-outline-dark btn-margin"
    data-toggle="tooltip" data-placement="top" title="{{ __('actions.edit') }}">
        <span class="octicon octicon-pencil"></span>
    </button>
</span>
<!-- Edit user button - CLOSE -->
<!-- Edit user modal - OPEN -->
<div id="editTask-{{ $task->id }}" class="modal fade">
    <div class="modal-dialog modal-confirm">

        <!-- Modal content - OPEN -->
        <div class="modal-content">

            <!-- Form edit user - OPEN -->
            <form action="{{ Route('editTask', $task->id) }}" method="POST">
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
                            <input type="text" name="Sector" class="form-control" value="{{ $task->Sector }}">
                            @error('Sector')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col text-left">
                            <label for="inputGroup">
                                {{ __('forms.task_group') }}
                            </label>
                            <select type="text" name="Group" class="form-control">
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
                            <input type="datetime-local" name="Start" class="form-control">
                            @error('Start')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col text-left">
                            <label for="inputEnd">
                                {{ __('forms.task_end') }}
                            </label>
                            <input type="datetime-local" name="End" class="form-control">
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
                            <input type="text" name="Type" class="form-control" value="{{ $task->Type }}">
                            @error('Type')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col text-left">
                            <label for="inputState">
                                {{ __('forms.status') }}
                            </label>
                            <Select type="text" name="Status" class="form-control" value="
                            {{$task->State}}"> 
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
                                <textarea name="Description" class="form-control">{{ $task->Description }}</textarea>
                                @error('Description')
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
        $('input[name="Start"]').daterangepicker({
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

        $('input[name="Start"]').on('apply.daterangepicker', function(ev, picker) {
          $(this).val(picker.startDate.format('YYYY-MM-DD HH:mm:ss'));
        });

        $('input[name="Start"]').on('cancel.daterangepicker', function(ev, picker) {
          $(this).val('');
        });

    });

</script>
