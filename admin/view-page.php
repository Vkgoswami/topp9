<?php
	require "../login/loginheader.php";
	include 'common/connection.php';
	
	if(isset($_POST['page']) && $_POST['page']!=''){
		
	$pname = addslashes($_POST['pname']);
	$pslug = addslashes($_POST['pslug']);
	$pdesc = addslashes($_POST['pdesc']);
	$mtitle = addslashes($_POST['mtitle']);
	$mdesc = addslashes($_POST['mdesc']);
	$mkeyw = addslashes($_POST['mkeyw']);

	   
		if(isset($_POST['pid']) && $_POST['pid'] != ''){
			$sql = "UPDATE pages SET page_name='$pname', page_slug='$pslug', page_desc='$pdesc', page_mtitle='$mtitle', page_mdesc='$mdesc', page_mkeyw='$mkeyw' WHERE page_id='".$_POST['pid']."'";
		}else{
			$sql = "INSERT INTO pages(page_name, page_slug, page_desc, page_mtitle, page_mdesc, page_mkeyw) VALUES('$pname', '$pslug', '$pdesc', '$mtitle', '$mdesc', '$mkeyw')";
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
	  <h2 class="form-signup-heading">View Pages</h2>
		<table class="table">
		  <thead class="thead-dark">
			<tr>
			  <th scope="col">#</th>
			  <th scope="col">Page</th>
			  <th scope="col">slug</th>
			  <th scope="col">Description</th>
			  <th scope="col">Action</th>
			</tr>
		  </thead>
		  <tbody>
			<?php
			$count=1;
			$selectQuery="select * from pages";
			$result = mysqli_query($conn, $selectQuery);
			while($row = mysqli_fetch_assoc($result)){
			  if(trim($row['page_desc'])==''){$pageDescription = '<span style="color:red;">No</span>';}else{$pageDescription = 'Yes';}
			?>
			<tr>
			  <th scope="row"><?=$count?></th>
			  <td><?=$row['page_name']?></td>
			  <td><?=$row['page_slug']?></td>
			  <td><?=$pageDescription?></td>
			  <td><a href="add-page.php?pid=<?php echo $row["page_id"]; ?>">Edit Page</a></td>
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