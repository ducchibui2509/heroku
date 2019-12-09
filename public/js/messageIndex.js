$(document).ready(function () {
    var CSRF_TOKEN = $('input[name="_token"]').val();

    $('.btnRead').click(function (event) {
        var btn = $(this);
        var card = btn[0].closest('.card');
        var header = $(card).children('.card-header')[0];
        var msgid = btn.attr('msgid');
        console.log(msgid);
        // return false;
        if (msgid) {
            //ajax post the form
            $.ajax({
                /* the route pointing to the post function */
                // url: '/messages.getName',
                url: '/messagesread',
                type: 'POST',
                /* send the csrf-token and the input to the controller */
                data: {_token: CSRF_TOKEN, id: msgid},
                dataType: 'JSON',
                /* remind that 'data' is the response of the AjaxController */
                success: function (data) {
                    console.log(data.status);
                    console.log(header);
                    if (data.data === 'success') {
                        btn.addClass('disabled').attr("disabled", true);
                        $(header).removeClass('unread').addClass('readed');
                    }
                    // var curUserId = $('#current_userID').val();
                    //
                    // $("#ddlUsers").html(html);
                }
            });
        } else {
            alert("Something is wrong. Please contact your administration");
        }
        return false;
    });
    $('.btnDelete').click(function (event) {
        var btn = $(this);
        var card = btn[0].closest('.card');
        var msgid = btn.attr('msgid');
        console.log(msgid);
        // return false;
        if (msgid) {
            //ajax post the form
            $.ajax({
                /* the route pointing to the post function */
                // url: '/messages.getName',
                url: '/messagesdeleteajax',
                type: 'POST',
                /* send the csrf-token and the input to the controller */
                data: {_token: CSRF_TOKEN, id: msgid},
                dataType: 'JSON',
                /* remind that 'data' is the response of the AjaxController */
                success: function (data) {
                    console.log(data.status);
                    if (data.data === 'success') {
                        $(card).remove();
                    }
                    // var curUserId = $('#current_userID').val();
                    //
                    // $("#ddlUsers").html(html);
                }
            });
        } else {
            alert("Something is wrong. Please contact your administration");
        }
        return false;
    });

});

