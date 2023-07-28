$(document).ready(function(){

  $("#submitSignup").click(function(){

    var username = $("#newuser").val();
    var password = $("#password1").val();
    var password2 = $("#password2").val();
    var email = $("#email").val();
    
    if((username === "") || (password === "") || (password2 === "")) {
      $("#messageSignup").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Please enter a username and a password</div>");
    } else if(email === ""){
	  $("#messageSignup").html("<div class=\"alert alert-danger alert-dismissable\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>Please enter a valid email address</div>");
    } else {
      $.ajax({
        type: "POST",
        url: "../login/createuser.php",
        data: "newuser="+username+"&password1="+password+"&password2="+password2+"&email="+email,
        success: function(html){
			var text = $(html).text();
			//Pulls hidden div that includes "true" in the success response
			var response = text.substr(text.length - 4);
          if(response == 'true'){
			$("#messageSignup").html(html);
            $('#submitSignup').hide();
			}
		else {
			$("#messageSignup").html(html);
			$('#submitSignup').show();
			}
        },
        beforeSend: function()
        {
          $("#messageSignup").html("<p class='text-center'><img src='images/ajax-loader.gif'></p>");
        }
      });
    }
    return false;
  });
});
