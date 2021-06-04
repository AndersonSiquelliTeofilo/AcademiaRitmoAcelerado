<?php
	try {
		include_once('util.php');

		$title = 'Erro';
		$childView = 'views/Error_view.php';
		include('views/_Layout.php');
		
	} catch (Exception $e) {
		echo 'Exceção capturada: ',  $e->getMessage(), "\n";
	}
?>