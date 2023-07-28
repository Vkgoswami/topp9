<?php
	require "../login/loginheader.php";
	include 'common/connection.php';
	$timenow = date('Y-m-d H:i:s');
	$timestamp = strtotime($timenow).'_';
	if(isset($_POST['data']) && $_POST['data']!=''){
		
	$title = addslashes($_POST['ntitle']);
	$pType = addslashes($_POST['pType']);
	$pUrl = '';
	$link = addslashes($_POST['link']);
	$desc = addslashes($_POST['sdesc']);
	$link = addslashes($_POST['link']);
	$status = addslashes($_POST['status']);

	   if(isset($_FILES['nimg'])){
		  $errors= array();
		  $file_name = $_FILES['nimg']['name'];
		  $file_size = $_FILES['nimg']['size'];
		  $file_tmp = $_FILES['nimg']['tmp_name'];
		  $file_type = $_FILES['nimg']['type'];
		  $tmp=explode('.',$file_name);
		  $file_ext=strtolower(end($tmp));
		  $extensions= array("jpeg","jpg","png","svg");
		  
		  if(in_array($file_ext,$extensions)=== false){ $errors[]="extension not allowed, please choose a JPEG or PNG file."; }
		  
		  if($file_size > 2097152) { $errors[]='File size must be excately 2 MB'; }
		  
		  if(empty($errors)==true && $file_name!='') {
			 move_uploaded_file($file_tmp,"../assets/dataImg/".$timestamp.$file_name);
		  } else {
			 $timestamp = '';
		  }
	   }
		if(isset($_POST['did']) && $_POST['did'] != ''){
			if($file_tmp != ""){
				$sql = "UPDATE data SET data_name='$title', data_icon='$timestamp$file_name', sid='$pType', page_url='$pUrl', data_desc='$desc', link='$link', status='$status' WHERE data_id='".$_POST['did']."'";
			} else {   
				$sql = "UPDATE data SET data_name='$title', sid='$pType', page_url='$pUrl', data_desc='$desc', link='$link', status='$status' WHERE data_id='".$_POST['did']."'";
			}
		}else{
		   $sql = "INSERT INTO data(data_name, data_icon, sid, page_url, data_desc, link, status) VALUES('$title', '$timestamp$file_name', '$pType', '$pUrl', '$desc', '$link', '$status')";
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
	  <h2 class="form-signup-heading">View Content</h2>
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
			$selectQuery="select * from data where status != 0";
			$result = mysqli_query($conn, $selectQuery);
			while($row = mysqli_fetch_assoc($result)){
			  if(trim($row['data_icon'])==''){$dataImg = '<span style="color:red;">No</span>';}else{$dataImg = 'Yes';}
			?>
			<tr>
			  <th scope="row"><?=$count?></th>
			  <td><?=$row['data_name']?></td>
			  <td><?=$dataImg?></td>
			  <td><a href="add-data.php?did=<?php echo $row["data_id"]; ?>">Edit Data</a></td>
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