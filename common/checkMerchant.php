<?php
include '../admin/common/connection.php';
$name=$_POST['name'];
$query=mysqli_query($conn, "select * from vpn_tbl where slug='$name'");
$items = mysqli_num_rows($query);
if($items>0){
?>
Url already exists, Please change Url !
<?php } ?> 