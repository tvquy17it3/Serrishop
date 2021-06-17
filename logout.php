<?php 
session_start(); 
class LogAcc{
	public function Logout()
	{
		unset($_SESSION['email']);
		unset($_SESSION['password']);
		if (isset($_GET["return_url"])) {
			$return_url = base64_decode($_GET["return_url"]);
			header('Location:'.$return_url);
		}else{
			header('location:index.php');
		}
		
	}
}

$Log = new LogAcc();
$Log->Logout();
?>

