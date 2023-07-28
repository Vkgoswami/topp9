<option value="">select</option>
<?php
include '../admin/common/connection.php';
$cat=$_POST['cat'];
$query=mysqli_query($conn, "select * from subcategories where category_id=$cat order by subcat_name ASC");
while($row = mysqli_fetch_array($query)) { 
?>
<option value="<?=$row['subcat_id']?>" <?=(isset($scid) && $scid==$row['subcat_id'])?'selected':''?>><?=$row['subcat_name']?></option>
<?php } ?>