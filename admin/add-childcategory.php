<?php 
require "../login/loginheader.php";
include 'common/connection.php';
if(isset($_GET['ccid'])){
$ccId = $_GET['ccid'];
$query = "select * from childcategories where childcat_id='".$ccId."'"; 
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_row($result);
$countries = $row[1];
$cArray=explode(",", $countries);
$ccid = $row[2];
$catArray=explode(",", $ccid);
$name = $row[3];
$slug = $row[4];
$description = $row[5];
$image = '/admin/images/'.$row[6];
$sdescription = $row[7];
$mtitle = $row[8];
$mdesc = $row[9];
$mkeyw = $row[10];
$prefix = $row[11];
$suffix = $row[12];
}else{
$ccId = '';
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
			<form method="post" action="view-childcategory.php" enctype="multipart/form-data">
				<h2 class="form-signup-heading">Add Subcategory</h2>
				<label>Name:</label>
				<input name="ccname" id="name" type="text" class="form-control" placeholder="Name" value="<?=($ccId)?$name:''?>"><br>
				<div class="col-md-6 col-xs-12" style="padding-left:0">
					<label>Name Prefix:</label>
					<input name="prefix" id="prefix" type="text" class="form-control" placeholder="Prefix" value="<?=($ccId)?$prefix:''?>"><br>
					<label>Select Countries:</label>
					<select name="cats[]" id="categories" class="form-control" multiple onchange="checkName()">
						<option value="">select countries</option>
						<?php
						$query=mysqli_query($conn, "select * from categories order by cat_name ASC");
						while($row = mysqli_fetch_array($query)) { 
						?>
						<option value="<?=$row['cat_id']?>" <?=($ccId && in_array($row['cat_id'], $cArray))?$checked = 'selected':$checked='';?>><?=$row['cat_name']?></option>
						<?php } ?>
					</select><br>
				</div>				
				<div class="col-md-6 col-xs-12" style="padding-right:0">
					<label>Name Suffix:</label>
					<input name="suffix" id="suffix" type="text" class="form-control" placeholder="Suffix" value="<?=($ccId)?$suffix:''?>"><br>
					<label>Select Category:</label>
					<select name="scats[]" id="subcategories" class="form-control" multiple onchange="checkName()">
						<option value="">select</option>
						<?php
						$query=mysqli_query($conn, "select * from subcategories order by subcat_name ASC");
						while($row = mysqli_fetch_array($query)) { 
						?>
						<option value="<?=$row['subcat_id']?>" <?=($ccId && in_array($row['subcat_id'], $catArray))?$checked = 'selected':$checked='';?>><?=$row['subcat_name']?></option>
						<?php } ?>
					</select><br><br>
				</div><br>
				<label>Url:</label>
				<input name="ccslug" id="slug" type="text" class="form-control" placeholder="Url" value="<?=($ccId)?$slug:''?>"><br>
				<label>Image:</label><br>
				<?=($ccId && ($row[6]!=''))?'<img src="'.$image.'" width="300"/>':''?>
				<input type="file"  id="ccimg" name="ccimg"><br>
				<label>Meta Title:</label>
				<input name="mtitle" id="mtitle" type="text" class="form-control" placeholder="Meta Title" value="<?=($ccId)?$mtitle:''?>"><br>
				<label>Meta Description:</label>
				<input name="mdesc" id="mdesc" type="text" class="form-control" placeholder="Meta Description" value="<?=($ccId)?$mdesc:''?>"><br>
				<label>Meta Keywords:</label>
				<input name="mkeyw" id="mkeyw" type="text" class="form-control" placeholder="Meta Keywords" value="<?=($ccId)?$mkeyw:''?>"><br>
				<label>Short Description:</label>
				<span id="textareaId"><textarea class="form-control" id="ccsdesc" name="ccsdesc"><?=($ccId)?$sdescription:''?></textarea></span><br>
				<label>Description:</label>
				<span id="textareaId"><textarea class="form-control" id="ccdesc" name="ccdesc"><?=($ccId)?$description:''?></textarea></span><br>
				<input type="hidden" name="ccid" value="<?=($ccId)?$ccId:''?>">
				<input type="submit" name="childcategory" value="Submit">
			</form>			`
		  </div>
		</div>
	</div>
	<?php include "common/admin-footer.php";?>	
  </body>
</html>