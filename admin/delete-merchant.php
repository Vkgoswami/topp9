<?php
require "../login/loginheader.php";
include 'common/connection.php';
if(isset($_GET['id']) && $_GET['id']!=''){
$sql = "UPDATE vpn_tbl SET featured = 3 WHERE id='".$_GET['id']."'";
$query = mysqli_query($conn, $sql);		
}
header('location:view-merchant.php');
?>	
	