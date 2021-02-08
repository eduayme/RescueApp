<!-- Edit user button - OPEN -->
<span data-toggle="modal" href="#editModal-{{ $incident->id }}">
    <button type="button" class="btn btn-sm btn-outline-dark btn-margin">
        <span class="octicon octicon-pencil"></span>
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
                                {{ Form::label('description', __('actions.add') . ' ' . __('forms.images')) }}

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
                                <div class="form-group col-md-12 no-margin" id="images">
                                    {{ __('forms.images') }}
                                </div>

                                <?php foreach ($incident->images as $key => $image): ?>
                                    <div class="col-md-4 margin-bottom container-img">
                                        <div class="img-container" id="div-image-{{$image->id}}">
                                            <img src="/uploads/search_{{$incident->search_id}}/incidents/incident_{{$incident->id}}/{{$image->photo}}" class="incident_image" id="image-{{$image->id}}">
                                            <div class="overlay-image" id="overlay-{{$image->id}}">
                                                <button type="button" class="btn btn-sm btn-outline-danger btn-margin" onclick="addToDelete({{$image->id}})" id="add-image-{{$image->id}}">
                                                    <span class="octicon octicon-trashcan"></span>
                                                    {{ __('actions.delete') }}
                                                </button>
                                            </div>
                                        </div>
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

    // add image to delete
    function addToDelete(id) {
        var overlay_id_img = "overlay-" + id;
        var overlay_div_image = document.getElementById(overlay_id_img);
        overlay_div_image.style.opacity = 1;

        var add_img_button_id = "add-image-" + id;
        var add_img_button = document.getElementById(add_img_button_id);
        add_img_button.remove();

        overlay_div_image.innerHTML = '<button type="button" class="btn btn-sm btn-outline-danger btn-margin" onclick="cancelToDelete(' + id + ')" id="cancel-image-' + id + '"><span class="octicon octicon-x"></span> {{ __("actions.cancel") }}</button>';

        var div_parent = document.getElementById("images");
        div_parent.innerHTML += "<input id='input-image-" + id + "' type='text' value='" + id + "' name='images_delete[]' style='display: none' />";
    }

    // cancel image to delete
    function cancelToDelete(id) {
        var image_id = document.getElementById("input-image-" + id);
        image_id.remove();

        var overlay_id_img = "overlay-" + id;
        var overlay_div_image = document.getElementById(overlay_id_img);
        overlay_div_image.style.opacity = null;

        var cancel_img_button_id = "cancel-image-" + id;
        var cancel_img_button = document.getElementById(cancel_img_button_id);
        cancel_img_button.remove();

        overlay_div_image.innerHTML = '<button type="button" class="btn btn-sm btn-outline-danger btn-margin" onclick="addToDelete(' + id + ')" id="add-image-' + id + '"><span class="octicon octicon-trashcan"></span> {{ __("actions.delete") }}</button>';

        var delete_image = document.getElementById("input-image-" + id);
        delete_image.remove();
    }

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
