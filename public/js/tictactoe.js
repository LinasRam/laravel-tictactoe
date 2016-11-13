var BASE_URL = 'http://tictactoe.local/game/';
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

$(document).ready(function () {
    checkGameStatus();

    $('#button-1').click(function () {
        gameButtonHandler(1);
    });
    $('#button-2').click(function () {
        gameButtonHandler(2)
    });
    $('#button-3').click(function () {
        gameButtonHandler(3)
    });
    $('#button-4').click(function () {
        gameButtonHandler(4)
    });
    $('#button-5').click(function () {
        gameButtonHandler(5)
    });
    $('#button-6').click(function () {
        gameButtonHandler(6)
    });
    $('#button-7').click(function () {
        gameButtonHandler(7)
    });
    $('#button-8').click(function () {
        gameButtonHandler(8)
    });
    $('#button-9').click(function () {
        gameButtonHandler(9)
    });

    $('#draw-modal').on('hidden.bs.modal', function () {
        window.location.href = BASE_URL.replace("game", "");
    });
    $('#winner-modal').on('hidden.bs.modal', function () {
        window.location.href = BASE_URL.replace("game", "");
    });
    $('#loser-modal').on('hidden.bs.modal', function () {
        window.location.href = BASE_URL.replace("game", "");
    });

});

function getGameId() {
    var href = window.location.href;
    var id = href.replace(BASE_URL, "");

    return id;
}

function repaint(data) {
    $('#button-1').html(data.button1);
    $('#button-2').html(data.button2);
    $('#button-3').html(data.button3);
    $('#button-4').html(data.button4);
    $('#button-5').html(data.button5);
    $('#button-6').html(data.button6);
    $('#button-7').html(data.button7);
    $('#button-8').html(data.button8);
    $('#button-9').html(data.button9);
}

function gameButtonHandler(button) {
    $.ajax({
        type: 'GET',
        url: BASE_URL + 'move/' + getGameId() + '/' + button,
        dataType: 'json',
        success: function (data) {
            repaint(data);
            if (data.over == true) {
                showModal(data);
            }
        }
    });
}

function checkGameStatus() {
    $.ajax({
        type: 'GET',
        url: BASE_URL + getGameId() + '/status',
        dataType: 'json',
        success: function (data) {
            repaint(data);
            if (data.over == true) {
                showModal(data);
            }
        }
    });
    setTimeout(checkGameStatus, 1000);
}

function showModal(data) {
    if (data.winner_id == null) {
        $('#draw-modal').modal('show');
    }
    else if (data.winner_id == data.current_user_id) {
        $('#winner-modal').modal('show');
    }
    else if (data.winner_id != data.current_user_id) {
        $('#loser-modal').modal('show');
    }
}
