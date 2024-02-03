<?php

require  'vendor/autoload.php';

require_once ("include/initialize.php");
// if(isset($_SESSION['IDNO'])){
// 	redirect(web_root.'index.php');

// }
$content='home.php';
$view = (isset($_GET['q']) && $_GET['q'] != '') ? $_GET['q'] : '';

switch ($view) {
 

	case 'product' :
        $title="Products";	
		$content='menu.php';		
		break;
	default :
	    $title="Home";	
		$content ='menu.php';		

}

       
    
 
require_once("theme/templates.php");
 

?>

