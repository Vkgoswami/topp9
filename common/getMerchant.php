<option value="">Select Merchant</option>
<?php
include '../admin/common/connection.php';
$ccat=$_POST['ccat'];
$query=mysqli_query($conn, "select * from vpn_tbl where FIND_IN_SET($ccat, ccid) > 0 order by name ASC");
while($row = mysqli_fetch_array($query)) { 
?>
<option value="<?=$row['id']?>" <?=(isset($mid) && $mid==$row['id'])?'selected':''?>><?=$row['name']?></option>
<?php } ?>