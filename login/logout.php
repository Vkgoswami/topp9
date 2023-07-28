<?php
    session_start();
    session_destroy();
    if(isset($_GET['t']) && $_GET['t']!='') {
	  header('Location: /login'); 
	} else if(isset($_SERVER['HTTP_REFERER'])){
	 header('Location: '.$_SERVER['HTTP_REFERER']); 
	} else {	
	 header('Location:/');  
	}
?>