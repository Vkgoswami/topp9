<?php
	require "../login/loginheader.php";
	include 'common/connection.php';
	$timenow = date('Y-m-d H:i:s');
	$timestamp = strtotime($timenow).'_';
	
	if(isset($_POST['banner']) && $_POST['banner']!=''){
		
	$btitle = addslashes($_POST['btitle']);
	$bstitle = addslashes($_POST['bstitle']);
	$pType = addslashes($_POST['pType']);
	$pUrl = addslashes($_POST['pUrl']);
	$btext = addslashes($_POST['btext']);
	$blink = addslashes($_POST['blink']);
	$bstar = addslashes($_POST['bstar']);
	$creviews = addslashes($_POST['creviews']);
	$tmembers = addslashes($_POST['tmembers']);
	
	if(isset($_FILES['bimg'])){
		  $errors= array();
		  $file_name = $_FILES['bimg']['name'];
		  $file_size = $_FILES['bimg']['size'];
		  $file_tmp = $_FILES['bimg']['tmp_name'];
		  $file_type = $_FILES['bimg']['type'];
		  $tmp=explode('.',$file_name);
		  $file_ext=strtolower(end($tmp));
		  $extensions= array("jpeg","jpg","png");
		  
		  if(in_array($file_ext,$extensions)=== false){ $errors[]="extension not allowed, please choose a JPEG or PNG file."; }
		  
		  if($file_size > 2097152) { $errors[]='File size must be excately 2 MB'; }
		  
		  if(empty($errors)==true && $file_name!='') {
			 move_uploaded_file($file_tmp,"../assets/banners/".$timestamp.$file_name);
		  } else {
			 $timestamp = '';
		  }
	   }

	if(isset($_POST['bId']) && $_POST['bId'] != ''){	
			if($file_tmp != ""){
				$sql = "UPDATE banners SET page_type='$pType', page_url='$pUrl', banner_title='$btitle', banner_stitle='$bstitle', btn_txt='$btext', btn_link='$blink', banner_img='$timestamp$file_name', creviews='$creviews', tmembers='$tmembers', brating='$bstar' WHERE banner_id='".$_POST['bId']."'";
			} else { 
				$sql = "UPDATE banners SET page_type='$pType', page_url='$pUrl', banner_title='$btitle', banner_stitle='$bstitle', btn_txt='$btext', btn_link='$blink', creviews='$creviews', tmembers='$tmembers', brating='$bstar' WHERE banner_id='".$_POST['bId']."'";
				
			}	
		}else{
		   $sql = "INSERT INTO banners(page_type, page_url, banner_title, banner_stitle, btn_txt, btn_link, banner_img, creviews, tmembers, brating) VALUES('$pType', '$pUrl', '$btitle', '$bstitle', '$btext', '$blink', '$timestamp$file_name', '$creviews', '$tmembers', '$bstar')"; 
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
	  <h2 class="form-signup-heading">View Banner</h2>
		<table class="table">
		  <thead class="thead-dark">
			<tr>
			  <th scope="col">#</th>
			  <th scope="col">Title</th>
			  <th scope="col">Image</th>
			  <th scope="col">Page Type</th>
			  <th scope="col">Page Url</th>
			  <th scope="col">Action</th>
			</tr>
		  </thead>
		  <tbody>
			<?php
			$count=1;
			$selectQuery="select * from banners";
			$result = mysqli_query($conn, $selectQuery);
			while($row = mysqli_fetch_assoc($result)){
			  if(trim($row['banner_img'])==''){$bImg = '<span style="color:red;">No</span>';}else{$bImg = 'Yes';}
			?>
			<tr>
			  <th scope="row"><?=$count?></th>
			  <td><?=$row['banner_title']?></td>
			  <td><?=$bImg?></td>			  
			  <td><?=$row['page_type']?></td>
			  <td><?=$row['page_url']?></td>
			  <td><a href="add-banner.php?bid=<?php echo $row["banner_id"]; ?>">Edit Banner</a></td>
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