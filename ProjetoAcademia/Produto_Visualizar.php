<?php
	try {
		include_once('data/conexao.php');
		include_once('util.php');
		include_once('models/funcao.php');
		$mysql = new BancodeDados();
		$mysql->conecta();
		$id=base64_decode($_REQUEST['id']);

		$title = 'Editar Função';
		$childView = 'views/Funcao_Visualizar_view.php';
		include('views/_Layout.php');
		$mysql->fechar();
		
	} catch (Exception $e) {
		echo 'Exceção capturada: ',  $e->getMessage(), "\n";
	}
?>