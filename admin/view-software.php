<?php
	require "../login/loginheader.php";
	include 'common/connection.php';
	$timenow = date('Y-m-d H:i:s');
	$timestamp = strtotime($timenow).'_';
	if(isset($_POST['software']) && $_POST['software']!=''){
		
	$ntitle = addslashes($_POST['ntitle']);
	$pType = addslashes($_POST['pType']);
	$pUrl = addslashes($_POST['pUrl']);
	$desc = addslashes($_POST['sdesc']);

	   if(isset($_FILES['nimg'])){
		  $errors= array();
		  $file_name = $_FILES['nimg']['name'];
		  $file_size = $_FILES['nimg']['size'];
		  $file_tmp = $_FILES['nimg']['tmp_name'];
		  $file_type = $_FILES['nimg']['type'];
		  $tmp=explode('.',$file_name);
		  $file_ext=strtolower(end($tmp));
		  $extensions= array("jpeg","jpg","png");
		  
		  if(in_array($file_ext,$extensions)=== false){ $errors[]="extension not allowed, please choose a JPEG or PNG file."; }
		  
		  if($file_size > 2097152) { $errors[]='File size must be excately 2 MB'; }
		  
		  if(empty($errors)==true && $file_name!='') {
			 move_uploaded_file($file_tmp,"../assets/payImg/".$timestamp.$file_name);
		  } else {
			 $timestamp = '';
		  }
	   }
		if(isset($_POST['nid']) && $_POST['nid'] != ''){
			if($file_tmp != ""){
				$sql = "UPDATE softwares SET software_name='$ntitle', software_icon='$timestamp$file_name', page_type='$pType', page_url='$pUrl', soft_desc='$desc' WHERE software_id='".$_POST['nid']."'";
			} else {   
				$sql = "UPDATE softwares SET software_name='$ntitle', page_type='$pType', page_url='$pUrl', soft_desc='$desc' WHERE software_id='".$_POST['nid']."'";
			}
		}else{
		   $sql = "INSERT INTO softwares(software_name, software_icon, page_type, page_url, soft_desc) VALUES('$ntitle', '$timestamp$file_name', '$pType', '$pUrl', '$desc')";
		}
	   $query = mysqli_query($conn, $sql);
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
	  <h2 class="form-signup-heading">View Payment Methods</h2>
		<table class="table">
		  <thead class="thead-dark">
			<tr>
			  <th scope="col">#</th>
			  <th scope="col">Name</th>
			  <th scope="col">Image</th>
			  <th scope="col">Action</th>
			</tr>
		  </thead>
		  <tbody>
			<?php
			$count=1;
			$selectQuery="select * from softwares";
			$result = mysqli_query($conn, $selectQuery);
			while($row = mysqli_fetch_assoc($result)){
			  if(trim($row['software_icon'])==''){$softwaresImg = '<span style="color:red;">No</span>';}else{$softwaresImg = 'Yes';}
			?>
			<tr>
			  <th scope="row"><?=$count?></th>
			  <td><?=$row['software_name']?></td>
			  <td><?=$softwaresImg?></td>
			  <td><a href="add-software.php?nid=<?php echo $row["software_id"]; ?>">Edit Sofware</a></td>
			</tr>
			<?php $count++; } ?>
		  </tbody>
		</table>		
	  </div>
	</div>
</div>
<?php include "common/admin-footer.php";?>	
</body>
</html>