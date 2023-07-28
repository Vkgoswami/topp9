<?php
	require "../login/loginheader.php";
	include 'common/connection.php';
	$timenow = date('Y-m-d H:i:s');
	$timestamp = strtotime($timenow).'_';
	if(isset($_POST['section']) && $_POST['section']!=''){
	$name = addslashes($_POST['rname']);
	$title = addslashes($_POST['rtitle']);	
	$pType = addslashes($_POST['pType']);
	$pUrl = addslashes($_POST['pUrl']);
	$review = addslashes($_POST['reviewtext']);
	$status = addslashes($_POST['status']);
	if(isset($_POST['sid']) && $_POST['sid'] != '') {	
		$sql = "UPDATE section SET sec_name='$name',sec_title='$title',page_type='$pType',page_url='$pUrl',sec_desc='$review',status='$status' WHERE sec_id='".$_POST['sid']."'";
	}else{
		$sql = "INSERT INTO section(sec_name, sec_title, page_type, page_url, sec_desc, status) VALUES ('$name','$title','$pType','$pUrl','$review','$status')";
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
	  <h2 class="form-signup-heading">View Sections</h2>
		<table class="table">
		  <thead class="thead-dark">
			<tr>
			  <th scope="col">#</th>
			  <th scope="col">Name</th>
			  <th scope="col">Title</th>
			  <th scope="col">Page</th>
			  <th scope="col">Url</th>
			  <th scope="col">Action</th>
			</tr>
		  </thead>
		  <tbody>
			<?php
			$count=1;
			$selectQuery="select * from section Order by page_type ASC";
			$result = mysqli_query($conn, $selectQuery);
			while($row = mysqli_fetch_assoc($result)){		  
			?>
			<tr>
			  <th scope="row"><?=$count?></th>
			  <td><?=$row['sec_name']?></td>
			  <td><?=$row['sec_title']?></td>
			  <td><?=$row['page_type']?></td>
			  <td><?=$row['page_url']?></td>
			  <td><a href="add-section.php?sid=<?php echo $row["sec_id"]; ?>">Edit</a></td>
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