<?php
	include("../connect.php");
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$mysql_query =mysqli_query($conn,"DELETE FROM code WHERE id=".$id);
	}
	header("Location: code.php");
?>