<div class="nav-side-menu">
	<div class="brand">Top10 Admin</div>
		<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>	  
		<div class="menu-list">	  
			<ul id="menu-content" class="menu-content collapse out">
				<li class="active">
				  <a href="/admin">
				  <i class="fa fa-dashboard fa-lg"></i> <b>Dashboard - <?=$_SESSION['username']?></b>
				  </a>
				</li>
				<li data-toggle="collapse" data-target="#page" class="collapsed">
				  <a href="#"><i class="fa fa-edit fa-lg"></i> Pages <span class="arrow"></span></a>
				</li>  
				<ul class="sub-menu collapse" id="page">
				  <li><a href="add-page.php">Add Page</a></li>
				  <li><a href="view-page.php">View Pages</a></li>
				</ul>
				<li data-toggle="collapse" data-target="#category" class="collapsed">
				  <a href="#"><i class="fa fa-edit fa-lg"></i> Countries <span class="arrow"></span></a>
				</li>
				<ul class="sub-menu collapse" id="category">
					<li><a href="add-category.php">Add Country</a></li>
					<li><a href="view-category.php">View Countries</a></li>
				</ul>
				<li data-toggle="collapse" data-target="#subcategory" class="collapsed">
				  <a href="#"><i class="fa fa-edit fa-lg"></i> Categories <span class="arrow"></span></a>
				</li>
				<ul class="sub-menu collapse" id="subcategory">
					<li><a href="add-subcategory.php">Add Category</a></li>
					<li><a href="view-subcategory.php">View Categories</a></li>
				</ul>
				<li data-toggle="collapse" data-target="#childcategory" class="collapsed">
				  <a href="#"><i class="fa fa-edit fa-lg"></i> Subcategories <span class="arrow"></span></a>
				</li>
				<ul class="sub-menu collapse" id="childcategory">
					<li><a href="add-childcategory.php">Add Subcategory</a></li>
					<li><a href="view-childcategory.php">View Subcategories</a></li>
				</ul>
				<li data-toggle="collapse" data-target="#merchant" class="collapsed">
				  <a href="#"><i class="fa fa-edit fa-lg"></i> Merchants <span class="arrow"></span></a>
				</li>
				<ul class="sub-menu collapse" id="merchant">
				  <li><a href="add-merchant.php">Add Merchant</a></li>
				  <li><a href="view-merchant.php">View Merchants</a></li>
				</ul>
				<li data-toggle="collapse" data-target="#section" class="collapsed">
				  <a href="#"><i class="fa fa-edit fa-lg"></i> Sections <span class="arrow"></span></a>
				</li>
				<ul class="sub-menu collapse" id="section">
				  <li><a href="add-section.php">Add Section</a></li>
				  <li><a href="view-section.php">View Sections</a></li>
				</ul>
				<li data-toggle="collapse" data-target="#content" class="collapsed">
				  <a href="#"><i class="fa fa-edit fa-lg"></i> Content <span class="arrow"></span></a>
				</li>
				<ul class="sub-menu collapse" id="content">
				  <li><a href="add-data.php">Add Content</a></li>
				  <li><a href="view-data.php">View Content</a></li>
				</ul>
				<li data-toggle="collapse" data-target="#software" class="collapsed">
				  <a href="#"><i class="fa fa-edit fa-lg"></i> Payment Methods <span class="arrow"></span></a>
				</li>
				<ul class="sub-menu collapse" id="software">
				  <li><a href="add-software.php">Add Methods</a></li>
				  <li><a href="view-software.php">View Methods</a></li>
				</ul>
				<li data-toggle="collapse" data-target="#banner" class="collapsed">
				  <a href="#"><i class="fa fa-edit fa-lg"></i> Banners <span class="arrow"></span></a>
				</li>
				<ul class="sub-menu collapse" id="banner">
				  <li><a href="add-banner.php">Add Banner</a></li>
				  <li><a href="view-banner.php">View Banners</a></li>
				</ul>
				<li>				
				  <a href="approve-review.php">
				  <i class="fa fa-edit fa-lg"></i> Approve Review
				  </a>
				</li>
				<li>				
				  <a href="/login/logout.php?t=admin">
				  <i class="fa fa-sign-out fa-lg"></i> Logout
				  </a>
				</li>
			</ul>
	 </div>
</div>