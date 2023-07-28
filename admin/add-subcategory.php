<?php 
require "../login/loginheader.php";
include 'common/connection.php';
if(isset($_GET['scid'])){
$scId = $_GET['scid'];
$query = "select * from subcategories where subcat_id='".$scId."'"; 
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_row($result);
$name = $row[2];
$cids = $row[1];
$catArray = explode(",", $cids);
$slug = $row[3];
$description = $row[4];
$image = '/assets/images/'.$row[5];
$sdescription = $row[6];
$mtitle = $row[7];
$mdesc = $row[8];
$mkeyw = $row[9];
$feature = $row[10];
$prefix = $row[11];
$suffix = $row[12];
$heading1 = $row[13];
$heading2 = $row[14];
}else{
$catArray = [];	
$scId = '';
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
			<form method="post" action="view-subcategory.php" enctype="multipart/form-data">
				<h2 class="form-signup-heading">Add Category</h2>
				<label>Name:</label>
				<input name="scname" id="name" type="text" class="form-control" placeholder="Name" value="<?=($scId)?$name:''?>"><br>
				<div class="col-md-6 col-xs-12" style="padding-left:0">
					<label>Name Prefix:</label>
					<input name="prefix" id="prefix" type="text" class="form-control" placeholder="Prefix" value="<?=($scId)?$prefix:''?>"><br>
				</div>				
				<div class="col-md-6 col-xs-12" style="padding-right:0">
					<label>Name Suffix:</label>
					<input name="suffix" id="suffix" type="text" class="form-control" placeholder="Suffix" value="<?=($scId)?$suffix:''?>"><br>
				</div><br>
				<label>Url:</label>
				<input name="scslug" id="slug" type="text" class="form-control" placeholder="Url" value="<?=($scId)?$slug:''?>"><br>
				<label>Select Country:</label>
				<select name="cats[]" id="categories" multiple class="form-control">				
				<option value="">select countries</option>
				<?php 
				$selectQuery="select * from categories order by cat_name ASC";
				$result = mysqli_query($conn, $selectQuery);
				while($row = mysqli_fetch_assoc($result)){ 
				?>
					<option value="<?=$row['cat_id']?>" <?php echo in_array($row['cat_id'], $catArray)?$checked = 'selected':$checked='';?>><?=$row['cat_name']?></option>
				<?php } ?>	
				</select><br><br>
				<label>Heading1:</label>
				<input name="sch1" id="sch1" type="text" class="form-control" placeholder="Heading1" value="<?=($scId)?$heading1:''?>"><br>
				<label>Heading2:</label>
				<input name="sch2" id="sch2" type="text" class="form-control" placeholder="Heading2" value="<?=($scId)?$heading2:''?>"><br>				
				<label>Image:</label><br>
				<?=($scId && $row[5])?'<img src="'.$image.'" width="300"/>':''?>
				<input type="file"  id="scimg" name="scimg"><br>
				<label>Meta Title:</label>
				<input name="mtitle" id="mtitle" type="text" class="form-control" placeholder="Meta Title" value="<?=($scId)?$mtitle:''?>"><br>
				<label>Meta Description:</label>
				<input name="mdesc" id="mdesc" type="text" class="form-control" placeholder="Meta Description" value="<?=($scId)?$mdesc:''?>"><br>
				<label>Meta Keywords:</label>
				<input name="mkeyw" id="mkeyw" type="text" class="form-control" placeholder="Meta Keywords" value="<?=($scId)?$mkeyw:''?>"><br>
				<label>Short Description:</label>
				<span id="textareaId"><textarea class="form-control" id="scsdesc" name="scsdesc"><?=($scId)?$sdescription:''?></textarea></span><br>
				<label>Description:</label>
				<span id="textareaId"><textarea class="form-control" id="scdesc" name="scdesc" height="250px"><?=($scId)?$description:''?></textarea></span><br>
				<input type="hidden" name="feature" value="0">
				<input type="checkbox" id="feature" name="feature" value="1" <?=(isset($feature) && $feature)?'checked':''?>>
				<label> Featured</label><br><br>
				<input type="hidden" name="scid" value="<?=($scId)?$scId:''?>">
				<input type="submit" name="subcategory" value="Submit">
			</form>
		  </div>
		</div>
	</div>
	<?php include "common/admin-footer.php";?>	
  </body>
</html>