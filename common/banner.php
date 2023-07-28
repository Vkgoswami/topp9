<!-- Content -->
<section id="homebanner" class="fullwidth">
	<div class="container">
	   <div class="">
		  <div class="owl-carousel owl-theme">
			<?php 
				$query="select * from banners WHERE page_type=$page AND page_url='$slug'";
				$data = mysqli_query($conn, $query);
				while($row = mysqli_fetch_assoc($data)) {
			?>
			 <div class="item">
				<div class="row">
				   <div class="col-lg-6 col-md-6">
					  <div class="banner-content">
						 <div class="home_meta-ttl"><?=$row['banner_title']?></div>
						 <div class="home_meta-dsc">
							<p><?=$row['banner_stitle']?></p>
						 </div>
						 <div class="btn-bar"><a class="cta_btn" href="<?=$row['btn_link']?>"><?=$row['btn_txt']?></a></div>
						 <div class="review-bar">
							<p class="font-awesome-star">
							   <?php
									for($x=1;$x<=$row['brating'];$x++) {
										echo '<i class="fa fa-star" aria-hidden="true"></i> ';
									}
									if (strpos($row['brating'],'.')) {
										echo '<i class="fa fa-star-half-o" aria-hidden="true"></i>';
										$x++;
									}
									while ($x<=5) {
										echo '<i class="fa fa-star-o" aria-hidden="true"></i>';
										$x++;
									}
								?>
							   <span><?=$row['creviews']?> Chrome Store reviews</span>
							</p>
							<p>Trusted by over <?=$row['tmembers']?> members</p>
						 </div>
					  </div>
				   </div>
				   <div class="col-lg-6 col-md-6 alignright">
					  <figure>
						 <img src="/admin/images/<?=$row['banner_img']?>" alt=""/>
					  </figure>
				   </div>
				</div>
			 </div>
			<?php } ?> 
		  </div>
	   </div>
	</div>
</section>