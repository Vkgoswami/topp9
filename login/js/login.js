$(document).ready(function () {
    "use strict";
    $("#submitLogin").click(function () {

        var email = $("#myemail").val(), password = $("#mypassword").val(), username = $("#myusername").val();

        if ((email === "") || (password === "")) {
            $("#messageLogin").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Please enter a email and a password</div>");
        } else {
            $.ajax({
                type: "POST",
                url: "checklogin.php",
                data: "myemail=" + email + "&mypassword=" + password + "&myusername=" + username,
                dataType: 'JSON',
                success: function (html) {
                    //console.log(html.response + ' ' + html.username);
                    if (html.response === 'true') {
                        location.assign("../admin/index.php");
                        return html.email;
                    } else {
                        $("#messageLogin").html(html.response);
                    }
                },
                error: function (textStatus, errorThrown) {
                    console.log(textStatus);
                    console.log(errorThrown);
                },
                beforeSend: function () {
                    $("#messageLogin").html("<p class='text-center'><img src='images/ajax-loader.gif'></p>");
                }
            });
        }
        return false;
    });
});
