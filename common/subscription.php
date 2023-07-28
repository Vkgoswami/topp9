<?php
include '../admin/common/connection.php';
   
$checkemail = mysqli_query($conn, "SELECT subscriber_email FROM subscribers WHERE subscriber_email= '".$_POST['semail']."'");

if(!filter_var($_POST['semail'], FILTER_VALIDATE_EMAIL)) {
    
	$result = array(
        'error' => false,
        'msg' => 'Please enter a valid email address.'
    );
	
}else if(mysqli_num_rows($checkemail)) {

    $result = array(
        'error' => false,
        'msg' => 'You are already subscribed.'
    );

} else {

	$insertemail = "INSERT INTO subscribers(subscriber_email, subscribe_date) VALUES ('".$_POST['semail']."',now())";
	mysqli_query($conn, $insertemail);
	 $result = array(
        'error' => true,
        'msg' => 'Thanks! You subscribed successfully.'
    );
}

header('Content-type: application/json');
echo json_encode($result);
?>
