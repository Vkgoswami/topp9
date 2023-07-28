<?php
session_start();
if (isset($_SESSION['username'])) {
    header("location:../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="css/main.css" rel="stylesheet" media="screen">
  </head>

  <body>
    <div class="container">
      <img style="display: block; margin-left: auto; margin-right: auto;" src="images/login.png">
      <form class="form-signin" name="form1" method="post" action="checklogin.php">
        <h2 class="form-signin-heading text-center">Sign in</h2>
        <input name="myemail" id="myemail" type="text" class="form-control" placeholder="Email" onblur="getname()" autofocus>
        <input name="mypassword" id="mypassword" type="password" class="form-control" placeholder="Password">
		<input name="myusername" id="myusername" type="hidden" class="form-control" placeholder="Email">
        <button name="Submit" id="submitLogin" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		<h6 class="text-center">not registered? <b><a href="signup.php">Sign up</a></b></h6> 
        <div id="messageLogin"></div>
      </form>

    </div> <!-- /container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-2.2.4.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <!-- The AJAX login script -->
    <script src="js/login.js"></script>
	<script>
	function getname()
	{ 
	var email=$("#myemail").val();    
	// get the id from textbox
	$.ajax({
			type:"post",
			dataType:"text",
			data:"email="+email,
			url:"/common/getUsername.php",   // url of php page where you are writing the query
			success:function(response)
			{ 
				$("#myusername").val(response);  // setting the result from page as value of name field
			}
		});
	}
</script>
  </body>
</html>
