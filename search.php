<!DOCTYPE html>
<html lang="en">
    <?php
	$page= 10;
	$mtitle = '';
	$mdesc = '';
	$mkeyw = '';
	include 'common/head.php';
	if (isset($_POST['q'])) {	
	$Name = $_POST['q']; 
	}else{
	$Name = ''; 
	}
	?>
   <body>
      <!-- Wrapper -->
      <div id="wrapper" class="mm-page mm-slideout">
         <!-- Header Container -->
         <?php include 'common/header.php'; ?>
         <div class="clearfix"></div>
         <section  class="testimonials">
            <div class="container">
               <div class="cold-md-12">
                  <ul>
                     <li><a href="/">Home</a>/</li>
                     <li>Search</li>
                  </ul>
               </div>
            </div>
		</section>
		
		<section class="fullwidth">
		    <div class="container">			
			  <div class="row">
				<div class="col-md-12">
                     <div class="headline centered">
                        <h3>Search results for "<?=$Name?>"</h3>
                     </div>
                  </div>
               </div>
			
			<div class="row">   
			<?php
			   $sql = "select cat_name, cat_slug from categories where cat_name LIKE '$Name%'";
			   $ExecQuery=mysqli_query($conn, $sql);
			   while ($result = mysqli_fetch_array($ExecQuery)) {
			?>     
				<div class="col-md-4">
				 <div class="sub_cat_item">
					<div class="sub_cat_meta">
					   <div class="sub_cat-ttl"><a href="<?=$result['cat_slug']?>"><?=$result['cat_name']?></a></div>
					</div>
				 </div>
				</div>
			<?php } 
				$sql1 = "select subcat_name, subcat_slug from subcategories WHERE subcat_name LIKE '$Name%'";
				$ExecQuery1=mysqli_query($conn, $sql1);
				while ($result1 = mysqli_fetch_array($ExecQuery1)) {
			 ?>
				<div class="col-md-4">
				 <div class="sub_cat_item">
					<div class="sub_cat_meta">
					   <div class="sub_cat-ttl"><a href="<?=$result1['subcat_slug']?>"><?=$result1['subcat_name']?></a></div>
					</div>
				 </div>
				</div>
			<?php }    
				$sql2 = "select childcat_name, childcat_slug from childcategories where childcat_name LIKE '$Name%'";
				$ExecQuery2=mysqli_query($conn, $sql2);
				while ($result2 = mysqli_fetch_array($ExecQuery2)) {
			?>     
			   <div class="col-md-4">
				 <div class="sub_cat_item">
					<div class="sub_cat_meta">
					   <div class="sub_cat-ttl"><a href="<?=$result2['childcat_slug']?>"><?=$result2['childcat_name']?></a></div>
					</div>
				 </div>
				</div>
			<?php }  ?>
               </div>
            </div>
        </section>
		 
		<?php include 'common/newsletter.php'; ?>
         
        <?php include 'common/review.php'; ?>
		 
        <?php include 'common/links.php'; ?>
         
		<?php include 'common/footer.php'; ?>
   </body>
 </html>