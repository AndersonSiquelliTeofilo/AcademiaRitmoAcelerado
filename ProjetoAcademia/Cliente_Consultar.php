<?php
	try {
		include_once('data/conexao.php');
		include_once('util.php');
		include_once('models/cliente.php');
		$mysql = new BancodeDados();
		$mysql->conecta();
		$lista_clientes = $mysql->sqlQueryToList(sqlQuerySelectAllUsers());
		
		if (!$lista_clientes) {
			echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
			die('<b>Query Inválida:</b>' . @mysqli_error($mysql->con));  
		}
		
		$notificacao_sucesso = "";
		$notificacao_alteracao = "";
		$notificacao_deletado = "";
		$notificacao_erro = "";

		if (isset($_GET['notificacao_alteracao']) && $_GET['notificacao_alteracao'] == true) {
			$notificacao_alteracao = "Cliente alterado";
		}
		if (isset($_GET['notificacao_deletado']) && $_GET['notificacao_deletado'] == true) {
			$notificacao_erro = "Cliente deletado";
		}
		if (isset($_GET['notificacao_erro']) && $_GET['notificacao_erro'] == true) {
			$notificacao_erro = "Erro ao tentar realizar a operação";
		}
		
		$title = 'Consultar cliente';
		$childView = 'views/Cliente_Consultar_view.php';
		include('views/_Layout.php');
		$mysql->fechar();
		
	} catch (Exception $e) {
		echo 'Exceção capturada: ',  $e->getMessage(), "\n";
	}
?>