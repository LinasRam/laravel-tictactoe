var BASE_URL = 'http://tictactoe.local/game/';
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

$(document).ready(function () {
    console.log(getGameId());
    $('#button-1').click(function () {
        $.ajax({
            type: 'GET',
            url: BASE_URL + 'move/' + getGameId() + '/' + 1,
            dataType: 'json',
            success: function (data) {
                console.log(data);
            }
        });
    });
});

function getGameId() {
    var href = window.location.href;
    var id = href.replace(BASE_URL, "");

    return id;
}
