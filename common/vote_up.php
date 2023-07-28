<?php
session_start();
include '../admin/common/connection.php';
$data = $_POST['id'];   

if (isset($_SESSION['username']) && $_SESSION['username']!='') {

    // User is logged in!
	$updatevote = "UPDATE vpn_tbl SET votes = votes + 1 WHERE id = $data";
	mysqli_query($conn, $updatevote);
    $result = array(
        'error' => false,
        'msg' => 'Thanks ! You voted successfully.'
    );

} else {

    // write the needed code to save the vote to db here
	 $result = array(
        'error' => true,
        'msg' => 'Please login first!'
    );
}

// Return JSON to ajax call
header('Content-type: application/json');
echo json_encode($result);
?>