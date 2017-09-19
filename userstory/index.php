<?php 

session_start();

require_once 'includefiles/config.php';
require_once 'includefiles/functions.php';

 if(isset($_SESSION['UserName']) and !empty($_SESSION['UserName'])){
	echo '<script>window.location = "userstory.php";</script>';
	//header("Location: dashboard.php");
	
}else{
	echo '<script>window.location = "login.php";</script>';
	//header("Location: login.php");
}


?>