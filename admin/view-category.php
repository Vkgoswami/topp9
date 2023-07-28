<?php
	require "../login/loginheader.php";
	include 'common/connection.php';
	$timenow = date('Y-m-d H:i:s');
	$timestamp = strtotime($timenow).'_';
	
	if(isset($_POST['category']) && $_POST['category']!=''){
		
	$cname = addslashes($_POST['cname']);
	$cslug = addslashes($_POST['cslug']);
	$cdesc = addslashes($_POST['cdesc']);
	$csdesc = addslashes($_POST['csdesc']);
	$mtitle = addslashes($_POST['mtitle']);
	$mdesc = addslashes($_POST['mdesc']);
	$mkeyw = addslashes($_POST['mkeyw']);
	$featured = addslashes($_POST['feature']);	
	$prefix = addslashes($_POST['prefix']);
	$suffix = addslashes($_POST['suffix']);
	$heading1 = addslashes($_POST['ch1']);
	$heading2 = addslashes($_POST['ch2']);

	if(isset($_FILES['cimg'])){
		  $errors= array();
		  $file_name = $_FILES['cimg']['name'];
		  $file_size = $_FILES['cimg']['size'];
		  $file_tmp = $_FILES['cimg']['tmp_name'];
		  $file_type = $_FILES['cimg']['type'];
		  $file_ext=strtolower(end(explode('.',$_FILES['cimg']['name'])));
		  
		  $extensions= array("jpeg","jpg","png");
		  
		  if(in_array($file_ext,$extensions)=== false){ $errors[]="extension not allowed, please choose a JPEG or PNG file."; }
		  
		  if($file_size > 2097152) { $errors[]='File size must be excately 2 MB'; }
		  
		  if(empty($errors)==true && $file_name!='') {
			 move_uploaded_file($file_tmp,"../assets/images/".$timestamp.$file_name);
		  } else {
			 $timestamp = '';
		  }
	   }

	if(isset($_POST['cid']) && $_POST['cid'] != ''){
			if($file_tmp != ""){
				$sql = "UPDATE categories SET cat_name='$cname', cat_slug='$cslug', cat_desc='$cdesc', cat_img='$timestamp$file_name', cat_sdesc='$csdesc', cat_mtitle='$mtitle', cat_mdesc='$mdesc', cat_mkeyw='$mkeyw', featured = '$featured', cat_prefix='$prefix', cat_suffix='$suffix', cat_h1='$heading1', cat_h2='$heading2' WHERE cat_id='".$_POST['cid']."'";
			} else { 
			$sql = "UPDATE categories SET cat_name='$cname', cat_slug='$cslug', cat_desc='$cdesc', cat_sdesc='$csdesc', cat_mtitle='$mtitle', cat_mdesc='$mdesc', cat_mkeyw='$mkeyw', featured = '$featured', cat_prefix='$prefix', cat_suffix='$suffix', cat_h1='$heading1', cat_h2='$heading2' WHERE cat_id='".$_POST['cid']."'";
			}		
		}else{
			$sql = "INSERT INTO categories(cat_name, cat_slug, cat_desc, cat_img, cat_sdesc, cat_mtitle, cat_mdesc, cat_mkeyw, featured, cat_prefix, cat_suffix, cat_h1, cat_h2) VALUES('$cname', '$cslug', '$cdesc', '$timestamp$file_name', '$csdesc', '$mtitle', '$mdesc', '$mkeyw', '$featured', '$prefix', '$suffix', '$heading1', '$heading2')";
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
	  <h2 class="form-signup-heading">View Countries</h2>
		<table class="table">
		  <thead class="thead-dark">
			<tr>
			  <th scope="col">#</th>
			  <th scope="col">Country</th>
			  <th scope="col">Image</th>
			  <th scope="col">Desc</th>
			  <th scope="col">sDesc</th>
			  <th scope="col">Action</th>
			</tr>
		  </thead>
		  <tbody>
		<?php
		$count=1;
		$selectQuery="select * from categories";
		$result = mysqli_query($conn, $selectQuery);
		while($row = mysqli_fetch_assoc($result)){
		 if(trim($row['cat_desc'])==''){$catDescription = '<span style="color:red;">No</span>';}else{$catDescription = 'Yes';}
		 if(trim($row['cat_sdesc'])==''){$csDescription = '<span style="color:red;">No</span>';}else{$csDescription = 'Yes';}if(trim($row['cat_img'])==''){$img = '<span style="color:red;">No</span>';}else{$img = 'Yes';}
		?>
		<tr>
		  <th scope="row"><?=$count?></th>
		  <td><?=$row['cat_name']?></td>
		  <td><?=$img?></td>
		  <td><?=$catDescription?></td>
		  <td><?=$csDescription?></td>
		  <td><a href="add-category.php?cid=<?php echo $row["cat_id"]; ?>">Edit Category</a></td>
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