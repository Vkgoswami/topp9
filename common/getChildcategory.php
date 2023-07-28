<option value="">Select Childcategory</option>
<?php
include '../admin/common/connection.php';
$scat=$_POST['scat'];
$query=mysqli_query($conn, "select * from childcategories where subcategory_id=$scat order by childcat_name ASC");
while($row = mysqli_fetch_array($query)) { 
?>
<option value="<?=$row['childcat_id']?>" <?=(isset($ccid) && $ccid==$row['childcat_id'])?'selected':''?>><?=$row['childcat_name']?></option>
<?php } ?>