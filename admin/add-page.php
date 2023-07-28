<?php 
require "../login/loginheader.php";
include 'common/connection.php';
if(isset($_GET['pid'])){
$pId = $_GET['pid'];
$query = "select * from pages where page_id='".$pId."'"; 
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_row($result);
$name = $row[1];
$slug = $row[2];
$description = $row[3];
$mtitle = $row[4];
$mdesc = $row[5];
$mkeyw = $row[6];
}else{
$pId = '';
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
			<form method="post" action="view-page.php" enctype="multipart/form-data">
				<h2 class="form-signup-heading">Add Page</h2>
				<label>Title:</label>
				<input name="pname" id="name" type="text" class="form-control" placeholder="Title" value="<?=($pId)?$name:''?>"><br>
				<label>Url:</label>
				<input name="pslug" id="slug" type="text" class="form-control" placeholder="Url" value="<?=($pId)?$slug:''?>"><br>
				<label>Meta Title:</label>
				<input name="mtitle" id="mtitle" type="text" class="form-control" placeholder="Meta Title" value="<?=($pId)?$mtitle:''?>"><br>
				<label>Meta Description:</label>
				<input name="mdesc" id="mdesc" type="text" class="form-control" placeholder="Meta Description" value="<?=($pId)?$mdesc:''?>"><br>
				<label>Meta Keywords:</label>
				<input name="mkeyw" id="mkeyw" type="text" class="form-control" placeholder="Meta Keywords" value="<?=($pId)?$mkeyw:''?>"><br>
				<label>Description:</label>
				<span id="textareaId"><textarea class="form-control" id="pdesc" name="pdesc"><?=($pId)?$description:''?></textarea></span><br>
				<input type="hidden" name="pid" value="<?=($pId)?$pId:''?>">
				<input type="submit" name="page" value="Submit">
			</form>			
		  </div>
		</div>
	</div>
	<?php include "common/admin-footer.php";?>	
  </body>
</html>