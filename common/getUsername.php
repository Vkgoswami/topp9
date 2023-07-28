<?php
include '../admin/common/connection.php';
$email=$_POST['email'];
$query=mysqli_query($conn, "select username from members where email='$email'");
$result=mysqli_fetch_row($query);
echo trim($result[0]);
exit;
?>