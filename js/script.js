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
            url: 'model/login_process.php',
            data: data,
            beforeSend: function ()
            {
                $("#error").fadeOut();
                $("#btn-login").html('sending ...');
            },
            success: function (response)
            {
                if (response == "ok") {

                    $("#btn-login").html('<img src="./images/btn-ajax-loader.gif"/>Signing In ...');
                    setTimeout(' window.location.href = "user_controller.php?action=user_account"; ', 2000);
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

    /* admin validation */
    $("#ADlogin-form").validate({
        rules:
                {
                    password: {
                        required: true,
                    },
                    ID: {
                        required: true,
                    },
                },
        messages:
                {
                    password: {
                        required: "please enter your password"
                    },
                    ID: "please enter your ID",
                },
        submitHandler: submitADForm
    });
    /* validation */

    /* login submit */
    function submitADForm()
    {
        var data = $("#ADlogin-form").serialize();

        $.ajax({

            type: 'POST',
            url: 'model/login_process.php',
            data: data,
            beforeSend: function ()
            {
                $("#ADerror").fadeOut();
                $("#btn-ADlogin").html('sending ...');
            },
            success: function (response)
            {
                if (response == "ok") {

                    $("#btn-ADlogin").html('<img src="./images/btn-ajax-loader.gif"/>Signing In ...');
                    setTimeout(' window.location.href = "admin_controller.php?action=list_currencies"; ', 2000);
                } else {

                    $("#ADerror").fadeIn(1000, function () {
                        $("#ADerror").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; ' + response + ' !</div>');
                        $("#btn-ADlogin").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
                    });
                }
            }
        });
        return false;
    }
    /* login submit */
});