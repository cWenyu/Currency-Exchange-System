/*
 Author: Pradeep Khodke
 URL: http://www.codingcage.com/
 */

$('document').ready(function ()
{
    /* validation */
    $("#login-form").validate({
        rules:
                {
                    password: {
                        required: true,
                    },
                    register_numebr: {
                        required: true,
                    },
                },
        messages:
                {
                    password: {
                        required: "please enter your password"
                    },
                    register_numebr: "please enter your register number",
                },
        submitHandler: submitForm
    });
    /* validation */

    /* login submit */
    function submitForm()
    {
        var data = $("#login-form").serialize();

        $.ajax({

            type: 'POST',
            url: 'view/user_view/login_process.php',
            data: data,
            beforeSend: function ()
            {
                $("#error").fadeOut();
                $("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
            },
            success: function (response)
            {
                if (response == "ok") {

                    $("#btn-login").html('<img src="./images/btn-ajax-loader.gif" /> &nbsp; Signing In ...');
                    setTimeout(' window.location.href = "user_controller.php?action=user_account"; ', 4000);
                } else {

                    $("#error").fadeIn(1000, function () {
                        $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; ' + response + ' !</div>');
                        $("#btn-login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
                    });
                }
            }
        });
        return false;
    }
    /* login submit */
});

$('document').ready(function ()
{
    /* validation */
    $("#accountCancle-form").validate({
        rules:
                {
                    password: {
                        required: true,
                    },
                    register_numebr: {
                        required: true,
                    },
                },
        messages:
                {
                    password: {
                        required: "please enter your password"
                    },
                    register_numebr: "please enter your register number",
                },
        submitHandler: submitCancleForm
    });
    /* validation */

    /* CancleForm submit */
    function submitCancleForm()
    {
        var data = $("#accountCancle-form").serialize();

        $.ajax({
            type: 'POST',
            url: 'view/user_view/cancle_check.php',
            data: data,
            beforeSend: function ()
            {
                $("#dialog").fadeOut();
            },
            success: function (response)
            {
                if (response == "ok") {
                    $("#btn-cancle").html('Checking ...');
                    setTimeout(' window.location.href = "include/messages.php";', 4000);
                } else {
                    $("#dialog").fadeIn(1000, function () {
                        $("#dialog").html(
                                '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">' +
                                '<div class="modal-dialog" role="document">' +
                                '<div class="modal-content">' +
                                '<div class="modal-header">' +
                                '<h5 class="modal-title" id="exampleModalLabel">Account </h5>' +
                                '<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
                                '<span aria-hidden="true">&times;</span>' +
                                '</button>' +
                                '</div>' +
                                '<div class="modal-body">' +
                                response +
                                '</div>' +
                                '<div class="modal-footer">' +
                                '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>' +
                                '<button type="submit" class="btn btn-primary">Confirm</button>' +
                                '</div>' +
                                '</div>' +
                                '</div>' +
                                '</div>'
                                );
                        $("#btn-cancle").html('Confirm');
                    });
                }
            }
        });
        return false;
    }
    /* login submit */
});