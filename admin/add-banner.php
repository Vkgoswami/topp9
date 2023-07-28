<?php 
require "../login/loginheader.php";
include 'common/connection.php';
if(isset($_GET['bid']) && $_GET['bid']!=''){
$bId = $_GET['bid'];
$query = "select * from banners where banner_id='".$bId."'"; 
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_row($result);
$bid = $row[0];
$pType = $row[1];
$pUrl = $row[2];
$bTitle = $row[3];
$bsTitle = $row[4];
$btext = $row[5];
$bLink = $row[6];
$image = '../assets/banners/'.$row[7];
$creviews = $row[8];
$tmembers = $row[9];
$bstar = $row[10];
}else{
$bId = '';
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
			<form method="post" action="view-banner.php" enctype="multipart/form-data">
				<h2 class="form-signup-heading">Add Banner</h2>
				<label>Title:</label>
				<input name="btitle" id="btitle" type="text" class="form-control" placeholder="Title" value="<?=($bId)?$bTitle:''?>"><br>
				<label>Sub Title:</label>
				<input name="bstitle" id="bstitle" type="text" class="form-control" placeholder="SubTItle" value="<?=($bId)?$bsTitle:''?>"><br>
				<label>Select Page Type:</label>
				<select name="pType" id="pType" class="form-control">				
					<option value="">select</option>
					<option value="1" <?=(isset($pType) && $pType==1)?'selected':''?>>Home</option>
					<option value="2" <?=(isset($pType) && $pType==2)?'selected':''?>>Category</option>	
					<option value="3" <?=(isset($pType) && $pType==3)?'selected':''?>>Subategory</option>
					<option value="4" <?=(isset($pType) && $pType==4)?'selected':''?>>Merchant</option>
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
					<option value="<?php echo $row['childcat_slug'];?>" <?=(isset($pUrl) && $row['childcat_slug']==$pUrl)?'selected':''?>><?=$row['name']?></option>
				<?php } ?>	
				</select></div>
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
				<label>Image:</label><br>
				<?=($bId)?'<img src="'.$image.'" width="300"/>':''?>
				<input type="file"  id="bimg" name="bimg"><br>
				<label>Button Link</label>
				<input name="blink" id="blink" type="text" class="form-control" placeholder="Button Link" value="<?=($bId)?$bLink:''?>"><br>
					<div class="col-md-6 col-xs-12" style="padding-left:0">	
						<div class="col-md-6 col-xs-12">
							<input name="btext" id="btext" type="text" class="form-control" placeholder="Button Text" value="<?=($bId)?$btext:''?>"><br>
						</div>
						<div class="col-md-6 col-xs-12">
							<input name="bstar" id="bstar" type="text" class="form-control" placeholder="Rating" value="<?=($bId)?$bstar:''?>"><br>
						</div>
					</div>					
					<div class="col-md-6 col-xs-12">	
						<div class="col-md-6 col-xs-12">					
							<input name="creviews" id="creviews" type="text" class="form-control" placeholder="Chrome Reviews" value="<?=($bId)?$creviews:''?>"><br>
						</div>
						<div class="col-md-6 col-xs-12">					
							<input name="tmembers" id="tmembers" type="text" class="form-control" placeholder="Trusted Members" value="<?=($bId)?$tmembers:''?>"><br>
						</div>
					</div><br>
				<input type="hidden" name="bId" value="<?=($bId)?$bId:''?>">
				<input type="submit" name="banner" value="Submit">
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