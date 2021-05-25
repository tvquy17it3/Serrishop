<?php 
	@session_start();
	$id = $_GET['id'];
	$prd = NULL;
	if(isset($_SESSION['cart'][$id]))
	{
		$prd = $_SESSION['cart'][$id] + 1;
	}
	else
	{
		$prd = 1;
	}
	$_SESSION['cart'][$id] = $prd;
	if (isset($_GET["return_url"])) {
		$return_url = base64_decode($_GET["return_url"]);
		header('Location:'.$return_url);
	} else{
		header('location:index.php');
	}	
	
?>