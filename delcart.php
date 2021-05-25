<?php 
	@session_start();
	$id = $_GET['id'];
	if($id == 0 )
	{
		unset($_SESSION['cart']);
	}
	else
	{
		unset($_SESSION['cart'][$id]);
	}
	if (isset($_GET["return_url"])) {
		$return_url = base64_decode($_GET["return_url"]);
		header('Location:'.$return_url);
	} else{
		header("Location:../index.php");
	}	
?>