<?php 
session_start(); 
	if(isset($_SESSION['username']) ){
	 	unset($_SESSION['username']);
		unset($_SESSION['password']);
	}
	
	if (isset($_GET["return_url"])) {
		$return_url = base64_decode($_GET["return_url"]);
		header('Location:'.$return_url);
	} else{
		header('location:index.php');
	}	
?>

