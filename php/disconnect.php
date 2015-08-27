<?php
	session_start();
	$id = $_SESSION['id'];
	ini_set("display_errors", 1);
	error_reporting(E_ALL);
	$_SESSION = array(); 
	session_destroy();
	header('Location: ../index.php');
?>