<?php
	 $dbhost = 'localhost';
	 $dbuser = 'root';
	 $dbpass = '';
	 $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
	 
	 if(! $conn ) {
		die('Could not connect: ' . mysql_error());
	 }
	 
	 mysqli_select_db($conn, 'topp9' );
	 
	  $url = $_SERVER['HTTP_HOST'];
	  $subdomain = explode('.', $url, 2)[0];
	  $domain = explode('.', $url, 2)[1];
	  $checkdomain = mysqli_query($conn, "select COUNT(*) from categories WHERE cat_slug LIKE '".$subdomain."'");
	  $country = mysqli_fetch_array($checkdomain);	
	  
	  if(!$country[0] && $subdomain !='www'){
			header('location:http://www.top9.test');
	  }
?>