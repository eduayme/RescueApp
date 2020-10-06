<div class="modal" id="add_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="padding-left: 25px;">Modal to add involved person</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="alert alert-danger add-alert d-none col-12" role="alert">

                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">{{ __('main.involved_name') }}</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="number">{{ __('main.involved_total_people') }}</label>
                            <input type="text" class="form-control" id="number">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="vehicle">{{ __('main.involved_vehicle') }}</label>
                            <input type="text" class="form-control" id="vehicle">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone">{{ __('main.involved_phone') }}</label>
                            <input type="text" class="form-control" id="phone">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="people">{{ __('main.involved_people') }}</label>
                            <textarea class="form-control" id="people"></textarea>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <input type="hidden" name="search_id" id="search_id" value="{{ $search->id }}">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary cancel-button" data-dismiss="modal">{{ __('actions.cancel') }}</button>
                <button type="button" class="btn btn-primary add-button">{{ __('actions.add') }}</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $('#add_involved_person').on('click', function() {
            $('.add-alert').addClass('d-none');
        });
        $('.add-button').on('click', function () {
            let formData = {
                'search_id': $('#search_id').val(),
                'name': $('#name').val(),
                'total_people': $('#number').val(),
                'vehicle': $('#vehicle').val(),
                'phone': $('#phone').val(),
                'people': $('#people').val(),
                '_token': $('#token').val()
            };

            $.ajax(
                {
                    method: "POST",
                    url: "/resoruces/involed",
                    data: formData,
                    statusCode: {
                        200: function () {
                            location.reload();
                        },
                        422: function (response) {
                            let errorMessage = '';
                            for (const [key, value] of Object.entries(response.responseJSON.errors)) {
                                console.log(`${key}: ${value}`);

                                $('#'+key).addClass('is--error');
                                errorMessage += $('label[for="'+key+'"]').html() + ': ' + value + '</br>';
                            }

                            $('.add-alert').html(errorMessage);
                            $('.add-alert').removeClass('d-none');
                        }
                    }
                }
            )
        });
    });
</script>
