<?php session_start();
session_destroy();
session_unset();
$_SESSION = array();
$_SESSION['login'] = 0;

if($_SESSION['login'] == 0)
{	
	header("Location: index.php");	
}
?>

