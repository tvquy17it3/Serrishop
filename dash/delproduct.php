<?php
	include("../connect.php");
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$mysql_query =mysqli_query($conn,"DELETE FROM products WHERE id=".$id);
	}
	header("Location: allproduct.php");
?>