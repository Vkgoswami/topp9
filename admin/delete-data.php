<?php
require "../login/loginheader.php";
include 'common/connection.php';
if(isset($_GET['did']) && $_GET['did']!=''){
$sql = "UPDATE comparision_data SET featured = 3 WHERE data_id='".$_GET['did']."'";
$query = mysqli_query($conn, $sql);		
}
header('location:view-data.php');
?>	
	