<?php
include '../admin/common/connection.php';
echo $_POST['search'];
if (isset($_POST['search']) && $_POST['search']!='') {	
   $Name = $_POST['search'];   
?>
<ul>
<?php
   $sql = "select cat_name, cat_slug from categories where cat_name LIKE '%$Name%'";
   $ExecQuery=mysqli_query($conn, $sql);
   $cats = mysqli_num_rows($ExecQuery);
   if($cats){
?>   
<span><b>Countries</b></span><br>
<?php }
   while ($result = mysqli_fetch_array($ExecQuery)) {
?>     
   <li><a href="/<?=$result['cat_slug']?>"><?=$result['cat_name']?></li></a> <br>
<?php } 
	$sql1 = "select subcat_name, subcat_slug from subcategories WHERE subcat_name LIKE '%$Name%'";
	$ExecQuery1=mysqli_query($conn, $sql1);
	$subcats = mysqli_num_rows($ExecQuery1);
	if($subcats){
?>
<span><b>Categories</b></span><br>
<?php }
   while ($result1 = mysqli_fetch_array($ExecQuery1)) {
 ?>
	<li><a href="/<?=$result1['subcat_slug']?>"><?=$result1['subcat_name']?></li></a><br>
<?php } 
	$sql3 = "select name, slug from vpn_tbl where name LIKE '%$Name%'";
	$ExecQuery3=mysqli_query($conn, $sql3);   
	$merchants = mysqli_num_rows($ExecQuery3);
	if($merchants){ 
?>
<span><b>Merchants</b></span><br>
<?php }
	while ($result3 = mysqli_fetch_array($ExecQuery3)) {
?>     
   <li><a href="/<?=$result3['slug']?>"><?=$result3['name']?></li></a><br>   
<?php } }  ?>
</ul>

