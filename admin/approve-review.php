<?php
	require "../login/loginheader.php";
	include 'common/connection.php';
	$timenow = date('Y-m-d H:i:s');
	$timestamp = strtotime($timenow).'_';
	if(isset($_POST['review']) && $_POST['review']!=''){
	$name = addslashes($_POST['rname']);
	$email = addslashes($_POST['remail']);
	$review = addslashes($_POST['reviewtext']);
	$rating = addslashes($_POST['rating']);
	$pType = addslashes($_POST['pType']);
	$pUrl = addslashes($_POST['pUrl']);
	$status = addslashes($_POST['status']);
		$sql = "UPDATE review SET name='$name',email='$email',review='$review',rating='$rating',page_type='$pType',page_url='$pUrl',status='$status' WHERE review_id='".$_POST['rid']."'";
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
	  <h2 class="form-signup-heading">Approve Review</h2>
		<table class="table">
		  <thead class="thead-dark">
			<tr>
			  <th scope="col">#</th>
			  <th scope="col">Name</th>
			  <th scope="col">Email</th>
			  <th scope="col">Page</th>
			  <th scope="col">Url</th>
			  <th scope="col">Rating</th>
			  <th scope="col">Action</th>
			</tr>
		  </thead>
		  <tbody>
			<?php
			$count=1;
			$selectQuery="select * from review Order by page_type ASC";
			$result = mysqli_query($conn, $selectQuery);
			while($row = mysqli_fetch_assoc($result)){		  
			?>
			<tr>
			  <th scope="row"><?=$count?></th>
			  <td><?=$row['name']?></td>
			  <td><?=$row['email']?></td>
			  <td><?=$row['page_type']?></td>
			  <td><?=$row['page_url']?></td>
			  <td><?=$row['rating']?></td>
			  <td><a href="edit-review.php?rid=<?php echo $row["review_id"]; ?>">Edit</a></td>
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