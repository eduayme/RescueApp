$(document).ready(function() {
    // Groups Tab toggle display    
    $('#nav-resources-tab').unbind("click").on('click', function() {
        $("#nav-groups-tab").trigger("click");
    });

    $('#nav-groups-tab').unbind("click").on('click', function() {
        var group_count = $('[name="group_count"]').val();
        if (group_count == 0) {
            $('#no_group').show();
            $('#with_group').hide();
        } else {
            $('#no_group').hide();
            $('#with_group').show();
        }
    });

    // Group status filter
    $('#status-groups-filter').on('change', function() {
        groupsTable.columns(1).search(this.value).draw();
        groupsTable.columns.adjust();
    });

    // Click Event handler for Add Group Button
    $("#btn_add_group").unbind("click").on('click', function(e) {
        $("body").css("cursor", "progress");
        e.preventDefault();

        var route = $('[name="addGroupRoute"]').val();
        var token = $('[name="_token"]').val();


        var form_data = JSON.stringify({
            "search_id": $('[name="search_id"]').val(),
            "status": $('[name="status"]').val(),
            "vehicle": $('[name="vehicle"]').val(),
            "broadcast": $('[name="broadcast"]').val(),
            "gps": $('[name="gps"]').val(),
            "people_involved": $('[name="people_involved"]').val()
        });

        $.ajax({
            method: "POST",
            url: route + '/?api=' + token,
            data: form_data,
            dataType: 'json',
            contentType: 'application/json',
            processData: false,
            statusCode: {
                200: function(response) {
                    $('#addGroupModal').modal('hide');
                    $("#groups").DataTable().ajax.reload();

                    // handle display messages
                    $("#add_success").show();
                    $("#edit_success").hide();
                    $("#delete_success").hide();
                    $("#success_message_container").show();

                    // reset the form fields
                    $('[name="status"]').val(0);
                    $('[name="vehicle"]').val('');
                    $('[name="broadcast"]').val('');
                    $('[name="gps"]').val('');
                    $('[name="people_involved"]').val('');

                    var group_count = parseInt($('[name="group_count"]').val());
                    $('[name="group_count"]').val(group_count + 1);
                    $("#nav-groups-tab").trigger("click");
                },
                422: function(response) {
                    var errors = processErrors(response.responseJSON.errors);

                    $("#error_message").html(errors);
                    $("#error_message_container").show();
                }
            }
        });
        $("body").css("cursor", "default");
    });

    // Click Event handler for Edit Group Button
    $("#btn_edit_group").unbind("click").on('click', function(e) {
        $("body").css("cursor", "progress");
        e.preventDefault();

        var route = $('[name="editGroupRoute"]').val();
        var token = $('[name="_token"]').val();

        var form_data = JSON.stringify({
            "status": $('[name="edit_status"]').val(),
            "vehicle": $('[name="edit_vehicle"]').val(),
            "broadcast": $('[name="edit_broadcast"]').val(),
            "gps": $('[name="edit_gps"]').val(),
            "people_involved": $('[name="edit_people_involved"]').val()
        });

        $.ajax({
            method: "POST",
            url: route.replace('group_id', $('[name="group_id"]').val()) + '/?api=' + token,
            data: form_data,
            dataType: 'json',
            contentType: 'application/json',
            processData: false,
            statusCode: {
                200: function(response) {
                    $('#editGroupModal').modal('hide');
                    $("#groups").DataTable().ajax.reload();

                    $("#add_success").hide();
                    $("#edit_success").show();
                    $("#delete_success").hide();
                    $("#success_message_container").show();
                },
                422: function(response) {
                    var errors = processErrors(response.responseJSON.errors);

                    $("#edit_error_message").html(errors);
                    $("#edit_error_message_container").show();
                }
            }
        });
        $("body").css("cursor", "default");
    });

    // Click Event handler for Delete Group Button
    $("#btn_delete_group").on('click', function(e) {
        $("body").css("cursor", "progress");
        e.preventDefault();

        var route = $('[name="deleteGroupRoute"]').val();
        var token = $('[name="_token"]').val();

        $.ajax({
            method: "DELETE",
            url: route.replace('group_id', $('[name="group_id"]').val()) + '/?api=' + token,
            statusCode: {
                200: function(response) {
                    $('#deleteGroupModal').modal('hide');
                    $("#groups").DataTable().ajax.reload();

                    // handle display messages
                    $("#add_success").hide();
                    $("#edit_success").hide();
                    $("#delete_success").show();
                    $("#success_message_container").show();


                    // Set to No_Group display if new group count is 0
                    var group_count = parseInt($('[name="group_count"]').val()) - 1;
                    $('[name="group_count"]').val(group_count);
                    if (group_count < 1) {
                        $("#nav-groups-tab").trigger("click");
                    }
                },
                422: function(response) {
                    console.log(response);

                    $("#delete_error_message").html(response.responseJSON.message);
                    $("#delete_error_message_container").show();
                }
            }
        });
        $("body").css("cursor", "default");
    });
});




function processErrors(errors) {
    var output = '';
    for (var field in errors) {
        for (var i = 0; i < errors[field].length; i++) {
            output += field.toUpperCase() + ' - ' + errors[field][i] + '<br>';
        }
    }
    return output;
}

// Transfers the values from DataTable Row to Modal Form
function setEditValues(rowId) {
    var group_data = $('#group-' + rowId).data("group").split(',');
    $('[name="group_id"]').val(group_data[0]);
    $('[name="edit_status"]').val(group_data[1]);
    $('[name="edit_vehicle"]').val(group_data[2]);
    $('[name="edit_broadcast"]').val(group_data[3]);
    $('[name="edit_gps"]').val(group_data[4]);
    $('[name="edit_people_involved"]').val(group_data[5]);
}

// Pass Group Id to Delete confirmation Modal Pop-up
function setDeleteValue(rowId) {
    var group_data = $('#group-' + rowId).data("group").split(',');
    $('[name="group_id"]').val(group_data[0]);
}

$("#nav-groups-tab").trigger("click");