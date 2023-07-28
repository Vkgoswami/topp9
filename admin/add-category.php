<?php 
require "../login/loginheader.php";
include 'common/connection.php';
if(isset($_GET['cid'])){
$cId = $_GET['cid'];
$query = "select * from categories where cat_id='".$cId."'"; 
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_row($result);
$name = $row[1];
$slug = $row[2];
$description = $row[3];
$image = '/assets/images/'.$row[4];
$sdescription = $row[5];
$mtitle = $row[6];
$mdesc = $row[7];
$mkeyw = $row[8];
$feature = $row[9];
$prefix = $row[10];
$suffix = $row[11];
$heading1 = $row[12];
$heading2 = $row[13];
}else{
$cId = '';
}	
?>
<!DOCTYPE html>
<html lang="en">  
	<?php include "common/admin-header.php";?>
   <body>	
	<div class="container">
		<div class="row">
		  <div class="col-md-3 col-xs-12">
			<?php include "common/left-nav.php";?>	
		  </div>
		  <div class="col-md-9 col-xs-12">
			<form method="post" action="view-category.php" enctype="multipart/form-data">
				<h2 class="form-signup-heading">Add Country</h2>
				<label>Name:</label>
				<input name="cname" id="name" type="text" class="form-control" placeholder="Name" value="<?=($cId)?$name:''?>"><br>
				<label>Shortname:</label>
				<input name="cslug" type="text" class="form-control" placeholder="Url" value="<?=($cId)?$slug:''?>"><br>
				<div class="col-md-6 col-xs-12" style="padding-left:0">
					<label>Currency:</label>
					<input name="prefix" id="prefix" type="text" class="form-control" placeholder="Currency" value="<?=($cId)?$prefix:''?>"><br>
				</div>				
				<div class="col-md-6 col-xs-12" style="padding-right:0">
					<label>Symbol:</label>
					<input name="suffix" id="suffix" type="text" class="form-control" placeholder="Symbol" value="<?=($cId)?$suffix:''?>"><br>
				</div><br>				
				<label>Heading1:</label>
				<input name="ch1" id="ch1" type="text" class="form-control" placeholder="Heading1" value="<?=($cId)?$heading1:''?>"><br>
				<label>Heading2:</label>
				<input name="ch2" id="ch2" type="text" class="form-control" placeholder="Heading2" value="<?=($cId)?$heading2:''?>"><br>
				<label>Image:</label><br>
				<?=($cId && $row[4])?'<img src="'.$image.'" width="300"/>':''?>
				<input type="file"  id="cimg" name="cimg"><br>
				<label>Meta Title:</label>
				<input name="mtitle" id="mtitle" type="text" class="form-control" placeholder="Meta Title" value="<?=($cId)?$mtitle:''?>"><br>
				<label>Meta Description:</label>
				<input name="mdesc" id="mdesc" type="text" class="form-control" placeholder="Meta Description" value="<?=($cId)?$mdesc:''?>"><br>
				<label>Meta Keywords:</label>
				<input name="mkeyw" id="mkeyw" type="text" class="form-control" placeholder="Meta Keywords" value="<?=($cId)?$mkeyw:''?>"><br>
				<label>Short Description:</label>
				<span id="textarecId"><textarea class="form-control" id="csdesc" name="csdesc"><?=($cId)?$sdescription:''?></textarea></span><br>
				<label>Description:</label>
				<span id="textarecId"><textarea class="form-control" id="cdesc" name="cdesc"><?=($cId)?$description:''?></textarea></span><br>
				<input type="hidden" name="feature" value="0">
				<input type="checkbox" id="feature" name="feature" value="1" <?=(isset($feature) && $feature)?'checked':''?>>
				<label> Featured</label><br><br>
				<input type="hidden" name="cid" value="<?=($cId)?$cId:''?>">
				<input type="submit" name="category" value="Submit">
			</form>			
		  </div>
		</div>
	</div>
	<?php include "common/admin-footer.php";?>	
  </body>
</html>