<?php
	if($_POST) {
		session_start();
		$_SESSION["email"] = $_POST["email"];
		$_SESSION["senha"] = $_POST["senha"];
		header("location:cadastro_view.php");
	}
	$title = 'Login';
	$childView = 'views/login_view.php';
	include('views/login_view.php');
?>