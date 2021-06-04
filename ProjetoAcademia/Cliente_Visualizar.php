<?php
	try {
		include_once('data/conexao.php');
		include_once('util.php');
		include_once('models/cliente.php');
		$mysql = new BancodeDados();
		$mysql->conecta();
		$id=base64_decode($_REQUEST['id']);
		$usuario;
		$result_Produto = $mysql->sqlQuery(sqlQuerySelectProdutoNomeByUserId($id));
		$produto = $result_Produto['Nome'];

		$title = 'Editar cliente';
		$childView = 'views/Cliente_Visualizar_view.php';
		include('views/_Layout.php');
		$mysql->fechar();
		
	} catch (Exception $e) {
		echo 'Exceção capturada: ',  $e->getMessage(), "\n";
	}
?>