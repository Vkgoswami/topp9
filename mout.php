<?php
include '../admin/common/connection.php';
$mid=$_GET['id'];
$query=mysqli_query($conn, "select offc_link from vpn_tbl where id='$mid'");
$link = mysqli_fetch_row($query);
header('Location:'.$link[0]);
?>
