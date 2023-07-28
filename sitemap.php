<?php
header("Content-Type: application/xml; charset=utf-8");
echo '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL; 
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<url>
	<loc>https://<?=$_SERVER['HTTP_HOST'];?></loc>
	<priority>1.00</priority>
</url>
<?php
   $sql = "select cat_slug from categories order by cat_name ASC";
   $ExecQuery=mysqli_query($conn, $sql);
   while ($result = mysqli_fetch_array($ExecQuery)) {
?>     
<url>
	<loc>https://<?=$result['cat_slug'].$_SERVER['HTTP_HOST'];?></loc>
	<changefreq>weekly</changefreq>
	<priority>0.80</priority>
</url>
<?php } 
	$sql1 = "select subcat_slug from subcategories order by subcat_name ASC";
	$ExecQuery1=mysqli_query($conn, $sql1);
	while ($result1 = mysqli_fetch_array($ExecQuery1)) {
 ?>
<url>
	<loc>https://<?=$_SERVER['HTTP_HOST'];?>/<?=$result1['subcat_slug']?></loc>
	<changefreq>weekly</changefreq>
	<priority>0.80</priority>
</url>
<?php }    
	$sql2 = "select slug from vpn_tbl order by name ASC";
	$ExecQuery2=mysqli_query($conn, $sql2);
	while ($result2 = mysqli_fetch_array($ExecQuery2)) {
?>     
<url>
	<loc>https://<?=$_SERVER['HTTP_HOST'];?>/<?=$result2['slug']?></loc>
	<changefreq>weekly</changefreq>
	<priority>0.80</priority>
</url>
<?php }  ?>
</urlset>