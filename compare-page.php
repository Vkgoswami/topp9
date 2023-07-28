<!DOCTYPE html>
<html lang="en">
<?php 	
	$page= 2;
	$result = mysqli_query($conn, "select B.* from subcategories as B where subcat_slug='$slug'");
	$row = mysqli_fetch_row($result);
	$cCid = $row[0]; 
	$cCname = $row[2];
	$cCdesc= $row[4];
	$mtitle = $row[7];
	$mdesc = $row[8];
	$mkeyw = $row[9];
	include 'common/head.php';
?>
   <body>
      <!-- Wrapper -->
      <div id="wrapper" class="mm-page mm-slideout">
         <!-- Header Container -->
         <?php include 'common/header.php'; ?>
         <div class="clearfix"></div>
         <!-- Content -->
         <?php include 'common/banner.php'; ?>
         <section  class="testimonials">
            <div class="container">
               <div class="cold-md-12">
                  <ul>
                     <li><a href="/">Home</a>/</li>
                     <li><?=$cCname?>	</li>
                  </ul>
               </div>
            </div>
         </section>
         <section class="fullwidth">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="headline centered">
                        <h3>Top Merchants in <?=$cCname?></h3>
                     </div>
                  </div>
               </div>
               <div class="row">
				<?php 	
					$query="SELECT C.*, S.*, V.* FROM categories as C, subcategories as S, vpn_tbl as V WHERE C.cat_slug='".$subdomain."' AND S.subcat_slug='".$slug."' AND FIND_IN_SET(C.cat_id,V.countries) AND FIND_IN_SET(S.subcat_id,V.categories)";
					$data = mysqli_query($conn, $query);
					$items = mysqli_num_rows($data);
					$rank = 1;
					while($row = mysqli_fetch_assoc($data)) {
					 $payMethods = explode(",", $row['pay_methods']);
				?>
                  <div class="compare-item">
                     <div class="compare-item-top">
                        <div class="col-lg-6 col-md-3 col-sm-3 col-xs-12">
                           <div class="prof">
                              <img class="logo" src="/admin/images/<?=$row['logo']?>"/>
                              <div class="name">
                                 <h1><?=$row['name']?></h1>
                                 <p>#<?=$rank?> Rank out of <?=$items?></p>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                           <p>User Rating (<?=$row['user_reviews']?> Reviews)</p>
                           <p class="font-awesome-star">
								<?php
										for($x=1;$x<=$row['oa_rating'];$x++) {
											echo '<i class="fa fa-star" aria-hidden="true"></i> ';
										}
										if (strpos($row['oa_rating'],'.')) {
											echo '<i class="fa fa-star-half-o" aria-hidden="true"></i>';
											$x++;
										}
										while ($x<=5) {
											echo '<i class="fa fa-star-o" aria-hidden="true"></i>';
											$x++;
										}
									?>
								<span><?=$row['oa_rating']?></span>
							</p>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                           <p class="availableon"><span>Deposit Option Include:</span>
						   <?php 
								$query2="select * from softwares";
								$data2 = mysqli_query($conn, $query2);
								while($row2 = mysqli_fetch_assoc($data2)){
								 if(in_array($row2['software_id'], $payMethods)){	
							?>
								<img src="/admin/images/<?=$row2['software_icon']?>"/>
							 <?php } } ?>
						   </p>
                        </div>
                        <!--<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                           <a class="cta_btn2" href="/<?//=$row['slug']?>">More Detail >></a>
                        </div>-->
                     </div>
                     <div class="compare-item-bottom">
                        <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                        <p>
                           <b>Payout Time:</b> <?=$row['pay_days']?> <br>
                           <b>Win Rate:</b> <?=$row['pay_rate']?><br>
                           <b>Compatible Devices:</b> <?=$row['comp_devices']?><br>
                           <?php if($row['bonus']!=""){?>
                           <b>Welcome Bonus:</b> <?=$row['bonus']; } ?>
                       </p>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                           <p><?=$row['pros']?></p>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                          <p><?=$row['cons']?></p>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                            <a class="cta_btn" href="<?=$row['ofc_link']?>" target="_blank">Play Now >></a><br><br>
                            <a href="<?=$row['slug']?>"><b>Read <?=$row['name']?> Review</b></a>
                        </div>
                     </div>
                  </div>
				<?php $rank++; } ?>
				</div>
            </div>
         </section>
         <section class="fullwidth gray content">
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="headline centered">
                        <h3 >How we Rate the Best <?=$cCname?></h3>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12">
                     <div class="home_pro_item">
                        <?=$cCdesc?>
                     </div>
                  </div>
               </div>
            </div>
         </section>
		 
        <?php include 'common/brands.php'; ?>
		 
		<?php include 'common/newsletter.php'; ?>
         
        <?php include 'common/review.php'; ?>
		 
        <?php // include 'common/links.php'; ?>
         
		<?php include 'common/footer.php'; ?>
		
   </body>
 </html>