var BASE_URL = 'http://tictactoe.local';
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

$(document).ready(function () {
    lookForInvitation();

    $('#invitation-modal').on('hidden.bs.modal', function () {
        $.ajax({
            type: 'GET',
            url: BASE_URL + '/invitation/decline',
            dataType: 'json',
            success: function (data) {
                console.log(data);
            }
        });
    });

    $('#accept-button').click(function () {
        $.ajax({
            type: 'GET',
            url: BASE_URL + '/invitation/accept',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                window.location.href = BASE_URL + "/game/" + data.game_id;
            }
        });
    });

    $('.invitation-link').click(function (e) {
        e.preventDefault();
        var href = $(this).attr('href');

        $.ajax({
            type: 'GET',
            url: href,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#waiting-modal').modal('show');
                lookForInvitationResponse();
            }
        });
    });

    $('#waiting-modal').on('hidden.bs.modal', function () {
        $.ajax({
            type: 'GET',
            url: BASE_URL + '/invitation/cancel',
            dataType: 'json',
            success: function (data) {
                console.log(data);
            }
        });
    });
});

function lookForInvitation() {
    $.ajax({
        type: 'GET',
        url: BASE_URL + '/invitation/look',
        dataType: 'json',
        success: function (data) {
            console.log(data);
            if (data.invitation == true) {
                $('#invitation-modal').modal('show');
            }
        }
    });
    setTimeout(lookForInvitation, 1000);
}

function lookForInvitationResponse() {
    $.ajax({
        type: 'GET',
        url: BASE_URL + '/invitation/response',
        dataType: 'json',
        success: function (data) {
            console.log(data);
            if (data.accepted == true) {
                window.location.href = BASE_URL + '/game/' + data.game_id;
            }
            else {
                setTimeout(lookForInvitationResponse, 1000);
            }
        }
    });
}

