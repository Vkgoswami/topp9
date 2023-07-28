<?php 
require "../login/loginheader.php";
include 'common/connection.php';
if(isset($_GET['did'])){
$dId = $_GET['did'];
$query = "select * from data where data_id='".$dId."'"; 
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_row($result);
$title = $row[1];
$image = '../assets/dataImg/'.$row[2];
$pType = $row[3];
$pUrl = $row[4];
$desc =  $row[5];
$link = $row[6];
$status = $row[7];
}else{
$dId = '';
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
			<form method="post" action="view-data.php" enctype="multipart/form-data">
				<h2 class="form-signup-heading">Add Content</h2>
				<label>Name:</label>
				<input name="ntitle" id="ntitle" type="text" class="form-control" placeholder="Name" value="<?=($dId)?$title:''?>"><br>
				<label>Image:</label><br>
				<?=($dId && $row[2])?'<img src="'.$image.'" width="300"/>':''?>
				<input type="file"  id="nimg" name="nimg"><br>
				<label>Select Page Type:</label>
				<select name="pType" id="pType" class="form-control">				
					<option value="">select</option>
					<?php 
					$selectQuery="select * from section order by sec_id ASC";
					$result = mysqli_query($conn, $selectQuery);
					while($row = mysqli_fetch_assoc($result)){ 
					?>
					<option value="<?=$row['sec_id']?>" <?=(isset($pType) && $pType==$row['sec_id'])?'selected':''?>><?=$row['sec_name'].' - '.$row['page_url']?></option>
					<?php } ?>						  
				</select><br>
				<label>Link:</label>
				<input name="link" id="link" type="text" class="form-control" placeholder="Name" value="<?=($dId)?$link:''?>"><br>
				<label>Description:</label>
				<span id="textareaId"><textarea class="form-control" id="sdesc" name="sdesc"><?=($dId)?$desc:''?></textarea></span><br>
				<input type="hidden" name="status" value="0">
				<input type="checkbox" id="status" name="status" value="1" <?=(isset($status) && $status)?'checked':''?>>
				<label>Status</label><br><br>
				<input type="hidden" name="did" value="<?=($dId)?$dId:''?>">
				<input type="submit" name="data" value="Submit">
			</form>			`
		  </div>
		</div>
	</div>
	<?php include "common/admin-footer.php";?>
  </body>
</html>