<?php

// Use this namespace
use Steampixel\Route;

// Include router class
include 'src/Steampixel/Route.php';

// Define a global basepath
define('BASEPATH','/');

// If your script lives in a subfolder you can use the following example
// Do not forget to edit the basepath in .htaccess if you are on apache
// define('BASEPATH','/api/v1');

// Add base route (startpage)
Route::add('/', function() {
  include('admin/common/connection.php');		 
  include('home.php');
});

Route::add('/mout', function() {
  include('admin/common/connection.php');
  include('mout.php');
});

Route::add('/sitemap.xml', function() {
  include('admin/common/connection.php');
  include('sitemap.php');
});

Route::add('/search', function(){
	include('admin/common/connection.php');
	$category = mysqli_query($conn, "select COUNT(*) from categories WHERE cat_name LIKE '".$_POST['q']."'");
	$categories = mysqli_fetch_array($category);
	$subcategory = mysqli_query($conn, "select COUNT(*) from subcategories WHERE subcat_name LIKE '".$_POST['q']."'");
	$subcategories = mysqli_fetch_array($subcategory);
	
	if($categories[0]){
		$slug = $_POST['q'];
		include('category.php');
	} else if($subcategories[0]){
		$slug = $_POST['q'];
		include('sub-category.php');
	} else {		
		include('search.php');
	}	
}, 'post');

// Simple test route that simulates static html file
// TODO: Fix this for some web servers
Route::add('/([a-zA-Z0-9._-]*)', function($slug) {	
    include('admin/common/connection.php');
	$subcategory = mysqli_query($conn, "select COUNT(*) from subcategories WHERE subcat_slug='".$slug."'");
	$subcategories = mysqli_fetch_array($subcategory);
	$vpn = mysqli_query($conn, "select COUNT(*) from vpn_tbl WHERE slug='".$slug."'");
	$vpns = mysqli_fetch_array($vpn);
	$page = mysqli_query($conn, "select COUNT(*) from pages WHERE page_slug='".$slug."'");
	$pages = mysqli_fetch_array($page);
	
	if($subcategories[0]){
		include('compare-page.php');
	} else if($vpns[0]){
		include('merchant-page.php');
	} else if($pages[0]){
		include('page.php');
	} else {
		include('404.php');
	}	
});


// Add a 404 not found route
Route::pathNotFound(function($path) {
	 include('404.php');
});

// Add a 405 method not allowed route
Route::methodNotAllowed(function($path, $method) {
  // Do not forget to send a status header back to the client
  // The router will not send any headers by default
  // So you will have the full flexibility to handle this case
  header('HTTP/1.0 405 Method Not Allowed');
  echo 'Error 405 :-(<br>';
  echo 'The requested path "'.$path.'" exists. But the request method "'.$method.'" is not allowed on this path!';
});

// Run the Router with the given Basepath
Route::run(BASEPATH);

// Enable case sensitive mode, trailing slashes and multi match mode by setting the params to true
// Route::run(BASEPATH, true, true, true);
