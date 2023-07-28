<?php
	require "../login/loginheader.php";
	include 'common/connection.php';
	$timenow = date('Y-m-d H:i:s');
	$timestamp = strtotime($timenow).'_';
	
	if(isset($_POST['childcategory']) && $_POST['childcategory']!=''){
		
	$ccname = addslashes($_POST['ccname']);
	$ccslug = addslashes($_POST['ccslug']);
	$countries=implode(",", $_POST['cats']);
	$cats=implode(",", $_POST['scats']);
	$ccdesc = addslashes($_POST['ccdesc']);
	$ccsdesc = addslashes($_POST['ccsdesc']);
	$mtitle = addslashes($_POST['mtitle']);
	$mdesc = addslashes($_POST['mdesc']);
	$mkeyw = addslashes($_POST['mkeyw']);
	$prefix = addslashes($_POST['prefix']);
	$suffix = addslashes($_POST['suffix']);
	
	if(isset($_FILES['ccimg'])){
		  $errors= array();
		  $file_name = $_FILES['ccimg']['name'];
		  $file_size = $_FILES['ccimg']['size'];
		  $file_tmp = $_FILES['ccimg']['tmp_name'];
		  $file_type = $_FILES['ccimg']['type'];
		  $tmp=explode('.',$_FILES['ccimg']['name']);
		  $file_ext = strtolower(end($tmp));
		  
		  $extensions= array("jpeg","jpg","png");
		  
		  if(in_array($file_ext,$extensions)=== false){ $errors[]="extension not allowed, please choose a JPEG or PNG file."; }
		  
		  if($file_size > 2097152) { $errors[]='File size must be excately 2 MB'; }
		  
		  if(empty($errors)==true && $file_name!='') {
			 move_uploaded_file($file_tmp,"images/".$timestamp.$file_name);
		  } else {
			 $timestamp = '';
		  }
	   }

	if(isset($_POST['ccid']) && $_POST['ccid'] != ''){	
			if($file_tmp != ""){
				$sql = "UPDATE childcategories SET category_id='$countries', subcategory_id='$cats', childcat_name='$ccname', childcat_slug='$ccslug', childcat_desc='$ccdesc', childcat_img='$timestamp$file_name', childcat_sdesc='$ccsdesc', childcat_mtitle='$mtitle', childcat_mdesc='$mdesc', childcat_mkeyw='$mkeyw', childcat_prefix='$prefix', childcat_suffix='$suffix' WHERE childcat_id='".$_POST['ccid']."'";
			} else { 
				$sql = "UPDATE childcategories SET category_id='$countries', subcategory_id='$cats', childcat_name='$ccname', childcat_slug='$ccslug', childcat_desc='$ccdesc', childcat_sdesc='$ccsdesc', childcat_mtitle='$mtitle', childcat_mdesc='$mdesc', childcat_mkeyw='$mkeyw', childcat_prefix='$prefix', childcat_suffix='$suffix' WHERE childcat_id='".$_POST['ccid']."'";
			}	
		}else{
		   $sql = "INSERT INTO childcategories(category_id, subcategory_id, childcat_name, childcat_slug, childcat_desc, childcat_img, childcat_sdesc, childcat_mtitle, childcat_mdesc, childcat_mkeyw, childcat_prefix, childcat_suffix) VALUES('$countries', '$cats', '$ccname', '$ccslug', '$ccdesc', '$timestamp$file_name', '$ccsdesc', '$mtitle', '$mdesc', '$mkeyw', '$prefix', '$suffix')"; 
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
	  <h2 class="form-signup-heading">View Subcategories</h2>
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
			$selectQuery="select * from childcategories";
			$result = mysqli_query($conn, $selectQuery);
			while($row = mysqli_fetch_assoc($result)){	
			  if(trim($row['childcat_desc'])==''){$Description = '<span style="color:red;">No</span>';}else{$Description = 'Yes';}
			  if(trim($row['childcat_sdesc'])==''){$sDescription = '<span style="color:red;">No</span>';}else{$sDescription = 'Yes';}
			  if(trim($row['childcat_img'])==''){$cImg = '<span style="color:red;">No</span>';}else{$cImg = 'Yes';}
			?>
			<tr>
			  <th scope="row"><?=$count?></th>
			  <td><?=$row['childcat_name']?></td>
			  <td><?=$cImg?></td>			  
			  <td><?=$sDescription?></td>
			  <td><?=$Description?></td>
			  <td><a href="add-childcategory.php?ccid=<?php echo $row["childcat_id"]; ?>">Edit Childcategory</a></td>
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