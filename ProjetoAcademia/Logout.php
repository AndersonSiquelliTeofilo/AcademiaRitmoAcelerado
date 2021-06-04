<?php 
	session_start();
	if (isset($_SESSION['log']) && $_SESSION['log'] == "ativo") {
		$_SESSION['log'] = "inativo";
		session_destroy();
		header("location:index.php");
	}
?>