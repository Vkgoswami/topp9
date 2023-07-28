<?php 
require "../login/loginheader.php";
include 'common/connection.php';
if(isset($_GET['nid'])){
$nId = $_GET['nid'];
$query = "select * from softwares where software_id='".$nId."'"; 
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_row($result);
$title = $row[1];
$image = '../assets/payImg/'.$row[2];
$pType = $row[3];
$pUrl = $row[4];
$desc =  $row[5];
}else{
$nId = '';
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
			<form method="post" action="view-software.php" enctype="multipart/form-data">
				<h2 class="form-signup-heading">Add Payment Method</h2>
				<label>Name:</label>
				<input name="ntitle" id="ntitle" type="text" class="form-control" placeholder="Name" value="<?=($nId)?$title:''?>"><br>
				<label>Image:</label><br>
				<?=($nId && $row[2])?'<img src="'.$image.'" width="300"/>':''?>
				<input type="file"  id="nimg" name="nimg"><br>
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
				<label>Review Text:</label>
				<span id="textareaId"><textarea class="form-control" id="sdesc" name="sdesc"><?=($nId)?$desc:''?></textarea></span><br>
				<input type="hidden" name="nid" value="<?=($nId)?$nId:''?>">
				<input type="submit" name="software" value="Submit">
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