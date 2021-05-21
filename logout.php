<?php 
session_start(); 
	if(isset($_SESSION['username']) ){
	 	unset($_SESSION['username']);
		unset($_SESSION['password']);
        header("location: index.php");
	}
	header("location: index.php");
?>

