<?php 
require "../login/loginheader.php";
include 'common/connection.php';
if(isset($_GET['sid'])){
$sId = $_GET['sid'];
$query = "select * from section where sec_id='".$sId."'"; 
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_row($result);
$name = $row[1];
$title = $row[2];
$pType = $row[3];
$rUrl = $row[4];
$review = $row[5];
$status = $row[6];
}else{
$sId = '';
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
			<form method="post" action="view-section.php" enctype="multipart/form-data">
				<h2 class="form-signup-heading">Edit Section</h2>
				<label>Section Name:</label>
				<input name="rname" id="rname" type="text" class="form-control" placeholder="Name" value="<?=($sId)?$name:''?>" autofocus required><br>
				<label>Section Title:</label>
				<input name="rtitle" id="rtitle" type="text" class="form-control" placeholder="Title" value="<?=($sId)?$title:''?>" autofocus required><br>
				<label>Select Page Type:</label>
				<select name="pType" id="pType" class="form-control">				
					<option value="">select</option>
					<option value="1" <?=(isset($pType) && $pType==1)?'selected':''?>>Home Page</option>
					<option value="2" <?=(isset($pType) && $pType==2)?'selected':''?>>Category Pages</option>
					<option value="3" <?=(isset($pType) && $pType==3)?'selected':''?>>Subcategory Pages</option>	
					<option value="4" <?=(isset($pType) && $pType==3)?'selected':''?>>Marchant Pages</option>						  
				</select><br>
				<div id="number1" class="number">
				<label>Select Page Url:</label>
				<select name="pUrl" class="form-control">				
					<?php 
					$selectQuery="select * from categories order by cat_name ASC";
					$result = mysqli_query($conn, $selectQuery);
					while($row = mysqli_fetch_assoc($result)){ 
					?>
						<option value="<?php echo $row['cat_slug'];?>" <?=(isset($pUrl) && $row['cat_slug']==$pUrl)?'selected':''?>><?=$row['cat_name']?></option>
					<?php } ?>	
				</select>
				</div>
				<div id="number2" class="number">
				<label>Select Page Url:</label>
				<select name="pUrl" class="form-control">
				<?php 
				$selectQuery="select * from subcategories order by subcat_name ASC";
				$result = mysqli_query($conn, $selectQuery);
				while($row = mysqli_fetch_assoc($result)){ 
				?>
					<option value="<?php echo $row['subcat_slug'];?>" <?=(isset($pUrl) && $row['subcat_slug']==$pUrl)?'selected':''?>><?=$row['subcat_name']?></option>
				<?php } ?>	
				</select>
				</div>
				<div id="number3" class="number">
				<label>Select Page Url:</label>
				<select name="pUrl" class="form-control">
				<?php 
				$selectQuery="select * from childcategories order by childcat_name ASC";
				$result = mysqli_query($conn, $selectQuery);
				while($row = mysqli_fetch_assoc($result)){ 
				?>
					<option value="<?php echo $row['childcat_slug'];?>" <?=(isset($pUrl) && $row['childcat_slug']==$pUrl)?'selected':''?>><?=$row['subcat_name']?></option>
				<?php } ?>	
				</select>
				</div>
				<div id="number4" class="number">
				<label>Select Page Url:</label>
				<select name="pUrl" class="form-control">
				<?php 
				$selectQuery="select * from vpn_tbl order by name ASC";
				$result = mysqli_query($conn, $selectQuery);
				while($row = mysqli_fetch_assoc($result)){ 
				?>
					<option value="<?php echo $row['slug'];?>" <?=(isset($pUrl) && $row['slug']==$pUrl)?'selected':''?>><?=$row['name']?></option>
				<?php } ?>	
				</select></div>
				<br>
				<label>Section Description:</label>
				<span id="textareaId"><textarea class="form-control" id="reviewtext" name="reviewtext"><?=($sId)?$review:''?></textarea></span><br>
				<input type="hidden" name="status" value="0">
				<input type="checkbox" id="status" name="status" value="1" <?=(isset($status) && $status)?'checked':''?>>
				<label>Status</label><br><br>
				<input type="hidden" name="sid" value="<?=($sId)?$sId:''?>">
				<input type="submit" name="section" value="Submit">
			</form>			`
		  </div>
		</div>
	</div>
	<?php include "common/admin-footer.php";?>	
	<script>
	$(document).ready(function() {
		  $('#pType').change(function() {
				$('div.number').hide();
				$('div.number > select').attr("disabled",true);
				$('#number' + $(this).val()).show();
				$('#number' + $(this).val() + '> select' ).attr("disabled",false);
		  }).change(); // Invoke it now
	});
	</script>
  </body>
</html>