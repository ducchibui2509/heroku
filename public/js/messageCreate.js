$(document).ready(function () {
    var CSRF_TOKEN = $('input[name="_token"]').val();

    $('#btnSearchUser').click(function (event) {

        var name = $('#receiver_search').val();

        if (name) {
            //ajax post the form
            $.ajax({
                /* the route pointing to the post function */
                // url: '/messages.getName',
                url: '/messagesuserajax',
                type: 'POST',
                /* send the csrf-token and the input to the controller */
                data: {_token: CSRF_TOKEN, name: name},
                dataType: 'JSON',
                /* remind that 'data' is the response of the AjaxController */
                success: function (data) {
                    console.log(data.data);
                    var curUserId = $('#current_userID').val();
                    var html = data.data.reduce(function (result, obj) {
                        if (obj.id == curUserId) {
                            return result;
                        }
                        result += '<option value="' + obj.id + '">';
                        result += obj.name + ' (' + obj.email+')';
                        result += '</option>';
                        return result;
                    }, '');
                    $("#ddlUsers").html(html);
                }
            });

            // $.post("todo/add", {title: title}).done(function(data) {
            //     $('#task_title').val('') ;
            //     $('#add_task').hide("slow");
            //     $("#task_list").append(data);
            //
            //
            // });

        } else {
            alert("Please enter a characters or more to search");
        }
        return false;

    });

    $('#ddlUsers').change(function (event) {

        var newuserid=$(event.target).val();
        $('#recipient_id').val(newuserid);
        return false;
    });

});

