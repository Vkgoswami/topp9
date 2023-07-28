<?php
	require "../login/loginheader.php";
	include 'common/connection.php';
	$timenow = date('Y-m-d H:i:s');
	$timestamp = strtotime($timenow).'_';
	
	if(isset($_POST['subcategory']) && $_POST['subcategory']!=''){
	$scname = addslashes($_POST['scname']);
	$sccat = implode(',',$_POST['cats']);
	$scslug = addslashes($_POST['scslug']);
	$scdesc = addslashes($_POST['scdesc']);
	$scsdesc = addslashes($_POST['scsdesc']);
	$mtitle = addslashes($_POST['mtitle']);
	$mdesc = addslashes($_POST['mdesc']);
	$mkeyw = addslashes($_POST['mkeyw']);
	$featured = addslashes($_POST['feature']);	
	$prefix = addslashes($_POST['prefix']);
	$suffix = addslashes($_POST['suffix']);
	$heading1 = addslashes($_POST['sch1']);
	$heading2 = addslashes($_POST['sch2']);
	
	if(isset($_FILES['scimg'])){
		  $errors= array();
		  $file_name = $_FILES['scimg']['name'];
		  $file_size = $_FILES['scimg']['size'];
		  $file_tmp = $_FILES['scimg']['tmp_name'];
		  $file_type = $_FILES['scimg']['type'];
		  $file_ext=strtolower(end(explode('.',$_FILES['scimg']['name'])));
		  
		  $extensions= array("jpeg","jpg","png");
		  
		  if(in_array($file_ext,$extensions)=== false){ $errors[]="extension not allowed, please choose a JPEG or PNG file."; }
		  
		  if($file_size > 2097152) { $errors[]='File size must be excately 2 MB'; }
		  
		  if(empty($errors)==true && $file_name!='') {
			 move_uploaded_file($file_tmp,"../assets/images/".$timestamp.$file_name);
		  } else {
			 $timestamp = '';
		  }
	   }

	if(isset($_POST['scid']) && $_POST['scid'] != ''){
			if($file_tmp != ""){
				$sql = "UPDATE subcategories SET subcat_name='$scname', category_id='$sccat', subcat_slug='$scslug', subcat_desc='$scdesc', subcat_img='$timestamp$file_name', subcat_sdesc='$scsdesc', subcat_mtitle='$mtitle', subcat_mdesc='$mdesc', subcat_mkeyw='$mkeyw', featured = '$featured', subcat_prefix='$prefix', subcat_suffix='$suffix', subcat_h1='$heading1', subcat_h2='$heading2' WHERE subcat_id='".$_POST['scid']."'";
			} else { 
				$sql = "UPDATE subcategories SET subcat_name='$scname', category_id='$sccat', subcat_slug='$scslug', subcat_desc='$scdesc', subcat_sdesc='$scsdesc', subcat_mtitle='$mtitle', subcat_mdesc='$mdesc', subcat_mkeyw='$mkeyw', featured = '$featured', subcat_prefix='$prefix', subcat_suffix='$suffix', subcat_h1='$heading1', subcat_h2='$heading2' WHERE subcat_id='".$_POST['scid']."'";
			}	
		}else{
		   $sql = "INSERT INTO subcategories(subcat_name, category_id, subcat_slug, subcat_desc, subcat_img, subcat_sdesc, subcat_mtitle, subcat_mdesc, subcat_mkeyw, featured, subcat_prefix, subcat_suffix, subcat_h1, subcat_h2) VALUES('$scname', '$sccat', '$scslug', '$scdesc', '$timestamp$file_name', '$scsdesc', '$mtitle', '$mdesc', '$mkeyw', '$featured', '$prefix', '$suffix', '$heading1', '$heading2')"; 
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
	  <h2 class="form-signup-heading">View Categories</h2>
		<table class="table">
		  <thead class="thead-dark">
			<tr>
			  <th scope="col">#</th>
			  <th scope="col">Name</th>		  
			  <th scope="col">Image</th>			  
			  <th scope="col">sDesc</th>	
			  <th scope="col">Desc</th>
			  <th scope="col">Action</th>
			</tr>
		  </thead>
		  <tbody>
			<?php
			$count=1;
			$selectQuery="select * from subcategories";
			$result = mysqli_query($conn, $selectQuery);
			while($row = mysqli_fetch_assoc($result)){	
			  if(trim($row['subcat_desc'])==''){$Description = '<span style="color:red;">No</span>';}else{$Description = 'Yes';}
			  if(trim($row['subcat_sdesc'])==''){$sDescription = '<span style="color:red;">No</span>';}else{$sDescription = 'Yes';}
			  if(trim($row['subcat_img'])==''){$scImg = '<span style="color:red;">No</span>';}else{$scImg = 'Yes';}
			?>
			<tr>
			  <th scope="row"><?=$count?></th>
			  <td><?=$row['subcat_name']?></td>
			  <td><?=$scImg?></td>
			  <td><?=$sDescription?></td>
			  <td><?=$Description?></td>
			  <td><a href="add-subcategory.php?scid=<?php echo $row["subcat_id"]; ?>">Edit Subcategory</a></td>
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