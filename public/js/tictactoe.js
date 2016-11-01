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

    hello();

    function hello() {
        console.log("hello");
        setTimeout(hello, 1000);
    }
});
