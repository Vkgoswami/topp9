<div class="footer-top gray">
	<div class="container">
	   <div class="row">
		<?php 
			$catQuery="select * from categories Limit 0, 4";
			$cresult = mysqli_query($conn, $catQuery);
			while($row = mysqli_fetch_assoc($cresult)){
			$catId = $row['cat_id'];
		?>
		  <div class="col-md-3 col-sm-3 col-xs-6">
			 <h4><?=$row['cat_name']?></h4>
			 <ul>
				<?php 
					$subcatQuery="select C.*, S.* from categories as C, subcategories as S where cat_id=$catId AND FIND_IN_SET(C.cat_id,S.category_id) order by subcat_name ASC Limit 0, 8";
					$sresult = mysqli_query($conn, $subcatQuery);
					while($data = mysqli_fetch_assoc($sresult)){
					?>
					<li><a href="/<?=$data['subcat_slug']?>"><?=$data['subcat_name']?></a></li>
				<?php } ?>
			 </ul>
		  </div>
		<?php } ?>  
	   </div>
	</div>
 </div>