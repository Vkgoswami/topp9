<?php
	$query="SELECT V.* FROM categories as C, vpn_tbl as V WHERE C.cat_slug='".$subdomain."' AND FIND_IN_SET(C.cat_id,V.countries)";
	$data = mysqli_query($conn, $query);
	if(mysqli_num_rows($data)){
?>		
<section class="fullwidth">
	<div class="container">
	   <div class="row">
		  <div class="col-md-12">
			 <div class="headline centered">
				<h3>Featured Brands</h3>
			 </div>
		  </div>
	   </div>
	   <div class="">
		  <div class="owl-theme brand-carousel">
			<?php 
				while($row = mysqli_fetch_assoc($data)) {
			?>
			 <div class="item">
				<figure>
				   <img src="/admin/images/<?=$row['logo']?>" alt=""/>
				</figure>
			 </div>
			<?php } ?>
		  </div>
	   </div>
	</div>
</section>
<?php } ?>