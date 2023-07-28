<!DOCTYPE html>
<html lang="en">
    <?php
	$page= 10;
	$result = mysqli_query($conn, "select * from pages where page_slug='$slug'");
	$row = mysqli_fetch_row($result);	
	$pId = $row[0] ; 
	$pName = $row[1];
	$pDesc= $row[3] ;
	$mtitle = $row[4];
	$mdesc = $row[5];
	$mkeyw = $row[6];
	include 'common/head.php';
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
                     <li><?=$pName?></li>
                  </ul>
               </div>
            </div>
         </section>
		 <?php if($slug != 'sitemap'){ ?>
         <section class="fullwidth content">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="headline centered">
                        <h3><?=$pName?></h3>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12">
                     <div class="home_pro_item"><?=$pDesc?></div>
                  </div>
               </div>
            </div>
         </section>		 
		 <?php } else { ?>
		  <section class="fullwidth">
            <div class="container">
			
			  <div class="row">
				<div class="col-md-12">
                     <div class="headline centered">
                        <h3>Check out all categories</h3>
                     </div>
                  </div>
               </div>
			
			<div class="row">   
			<?php 
			$query = mysqli_query($conn, "select * from categories order by cat_name ASC");
			while($data = mysqli_fetch_assoc($query)){ 
			?>
                  <div class="col-md-3">
                     <div class="sub_cat_item">
                        <div class="sub_cat_meta">
                           <div class="sub_cat-ttl"><a href="#<?=$data['cat_name']?>"><?=$data['cat_name']?></a></div>
                        </div>
                     </div>
                  </div>
			<?php } ?>
               </div>
            </div>
         </section>
		<?php 
			$result1 = mysqli_query($conn, "select * from categories order by cat_name ASC");
			while($row1 = mysqli_fetch_assoc($result1)) { 
			$catId = $row1['cat_id'];
		?>
         <section class="fullwidth packages" style="border-bottom: 1px solid #cdcdcd;" id="<?=$row1['cat_name']?>">
            <div class="container">				
               <div class="row">
                  <div class="col-md-12">
                     <div class="headline centered">
                        <h3><?=$row1['cat_name']?></h3>	
                     </div>
                  </div>
               </div>
				<ul class="category-verticals--items">
					<?php 
						$query1 = mysqli_query($conn, "select * from subcategories where category_id=$catId order by subcat_name ASC");
						while($data1 = mysqli_fetch_assoc($query1)) { 
					?>
						<li class="category-verticals--item"><a href="<?=$data1['subcat_slug']?>"><?=$data1['subcat_name']?></a></li>
					<?php } ?>	
				</ul>
			</div>
         </section>		 
		<?php } ?>
		 <section class="fullwidth packages" style="border-bottom: 1px solid #cdcdcd;" id="<?=$row1['cat_name']?>">
            <div class="container">				
               <div class="row">
                  <div class="col-md-12">
                     <div class="headline centered">
                        <h3>Pages</h3>	
                     </div>
                  </div>
               </div>
				<ul class="category-verticals--items">
					<?php 
						$query2 = mysqli_query($conn, "select * from pages order by page_id ASC");
						while($data2 = mysqli_fetch_assoc($query2)) { 
					?>
						<li class="category-verticals--item"><a href="<?=$data2['page_slug']?>"><?=$data2['page_name']?></a></li>
					<?php } ?>	
				</ul>
			</div>
         </section>		
		<?php } include 'common/newsletter.php'; ?>
         
        <?php include 'common/review.php'; ?>
		 
        <?php include 'common/links.php'; ?>
         
		<?php include 'common/footer.php'; ?>
   </body>
 </html>