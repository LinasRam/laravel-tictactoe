var BASE_URL = 'http://tictactoe.local';
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

$(document).ready(function () {
    $('#button-1').click(function () {
        $(this).text('X');

        $.ajax({
            type: 'POST',
            url: BASE_URL + '/test',
            dataType: 'json',
            data: {_token: CSRF_TOKEN, param: 'val'},
            success: function (data) {
                console.log(data);
            }
        });
    });

    lookForInvitation();

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
});
