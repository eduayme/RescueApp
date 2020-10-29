$(document).ready(function() {
    // Leaders Tab toggle display    
    $('#nav-resources-tab').unbind("click").on('click', function() {
        $("#nav-leaders-tab").trigger("click");
    });

    $('#nav-leaders-tab').unbind("click").on('click', function() {
        var leader_count = $('[name="leader_count"]').val();
        if (leader_count == 0) {
            $('#no_leader').show();
            $('#with_leader').hide();
        } else {
            $('#no_leader').hide();
            $('#with_leader').show();
        }
    });

    // Leader status filter
    $('#status-leaders-filter').on('change', function() {
        leadersTable.columns(1).search(this.value).draw();
        leadersTable.columns.adjust();
    });

    // Click Event handler for Add Leader Button
    $("#btn_add_leader").unbind("click").on('click', function(e) {
        $("body").css("cursor", "progress");
        e.preventDefault();

        var route = $('[name="addLeaderRoute"]').val();
        var token = $('[name="_token"]').val();

        var form_data = JSON.stringify({
            "search_id": $('[name="search_id"]').val(),
            "leaderCode": $('[name="leaderCode"]').val(),
            "phone": $('[name="phone"]').val(),
            "name": $('[name="name"]').val(),
            "start": $('[name="start"]').val()
        });
        console.log(form_data);
        $.ajax({
            method: "POST",
            url: route + '/?api=' + token,
            data: form_data,
            dataType: 'json',
            contentType: 'application/json',
            processData: false,
            statusCode: {
                200: function(response) {
                    $('#addLeaderModal').modal('hide');
                    $("#leaders").DataTable().ajax.reload();

                    // handle display messages
                    $("#leaders_add_success").show();
                    $("#leaders_edit_success").hide();
                    $("#leaders_delete_success").hide();
                    $("#leaders_success_message_container").show();

                    // reset the form fields
                    $('[name="leaderCode"]').val('');
                    $('[name="phone"]').val('');
                    $('[name="name"]').val('');
                    $('[name="start"]').val('');

                    var leader_count = parseInt($('[name="leader_count"]').val());
                    $('[name="leader_count"]').val(leader_count + 1);
                    $("#nav-leaders-tab").trigger("click");
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

    // Click Event handler for Edit Leader Button
    $("#btn_edit_leader").unbind("click").on('click', function(e) {
        $("body").css("cursor", "progress");
        e.preventDefault();

        var route = $('[name="editLeaderRoute"]').val();
        var token = $('[name="_token"]').val();

        var form_data = JSON.stringify({
            "leaderCode": $('[name="edit_leaderCode"]').val(),
            "phone": $('[name="edit_phone"]').val(),
            "name": $('[name="edit_name"]').val(),
            "start": $('[name="edit_start"]').val(),
            "end": $('[name="edit_end"]').val()
        });

        $.ajax({
            method: "POST",
            url: route.replace('leader_id', $('[name="leader_id"]').val()) + '/?api=' + token,
            data: form_data,
            dataType: 'json',
            contentType: 'application/json',
            processData: false,
            statusCode: {
                200: function(response) {
                    $('#editLeaderModal').modal('hide');
                    $("#leaders").DataTable().ajax.reload();

                    $("#leaders_add_success").hide();
                    $("#leaders_edit_success").show();
                    $("#leaders_delete_success").hide();
                    $("#leaders_success_message_container").show();
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

    // Click Event handler for Delete Leader Button
    $("#btn_delete_leader").on('click', function(e) {
        $("body").css("cursor", "progress");
        e.preventDefault();

        var route = $('[name="deleteLeaderRoute"]').val();
        var token = $('[name="_token"]').val();

        $.ajax({
            method: "DELETE",
            url: route.replace('leader_id', $('[name="leader_id"]').val()) + '/?api=' + token,
            statusCode: {
                200: function(response) {
                    $('#deleteLeaderModal').modal('hide');
                    $("#leaders").DataTable().ajax.reload();

                    // handle display messages
                    $("#leaders_add_success").hide();
                    $("#leaders_edit_success").hide();
                    $("#leaders_delete_success").show();
                    $("#leaders_success_message_container").show();


                    // Set to No_Leader display if new leader count is 0
                    var leader_count = parseInt($('[name="leader_count"]').val()) - 1;
                    $('[name="leader_count"]').val(leader_count);
                    if (leader_count < 1) {
                        $("#nav-leaders-tab").trigger("click");
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
function setLeaderEditValues(rowId) {
    var leader_data = $('#leader-' + rowId).data("leader").split(',');
    $('[name="leader_id"]').val(leader_data[0]);
    $('[name="edit_leaderCode"]').val(leader_data[1]);
    $('[name="edit_phone"]').val(leader_data[2]);
    $('[name="edit_name"]').val(leader_data[3]);
    $('[name="edit_start"]').val(leader_data[4]);
    if (leader_data[5] != 'null') {
        $('[name="edit_end"]').val(leader_data[5]);
    }
}

// Pass Leader Id to Delete confirmation Modal Pop-up
function setLeaderDeleteValue(rowId) {
    var leader_data = $('#leader-' + rowId).data("leader").split(',');
    $('[name="leader_id"]').val(leader_data[0]);
}

$("#nav-leaders-tab").trigger("click");