	<section class="fullwidth">
	<div class="container">
	   <div class="row">
		  <div class="col-md-12">
			 <div class="headline centered">
				<h3 >Reviews & Rating</h3>
				<a data-toggle="modal" data-target="#WriteReview" href="" class="log-in-button">Write a Review</a>
			 </div>
		  </div>
	   </div>
	   <div class="">
		  <div class="owl-theme review-carousel">
			<?php 
				$query="select * from review WHERE page_type=$page AND page_url='$slug' AND status=1";
				$data = mysqli_query($conn, $query);
				while($row = mysqli_fetch_assoc($data)) {
			?>
			 <div class="item">
				<div class="review-item">
				   <div class="col-md-9 col-sm-9 col-xs-12 quote">
					  <p><?=$row['review']?>
					  </p>
				   </div>
				   <div class="col-md-3 col-sm-3 col-xs-12 author">
					  <img src="/assets/images/author1.png" alt="1"/>
					  <p><?=$row['name']?></p>
				   </div>
				</div>
			 </div>
			<?php }?> 
		  </div>
	   </div>
	</div>
 </section>