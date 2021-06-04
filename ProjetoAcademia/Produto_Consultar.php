<?php
	try {
		include_once('data/conexao.php');
		include_once('util.php');
		include_once('models/produto.php');
		$mysql = new BancodeDados();
		$mysql->conecta();
		$lista_produtos = $mysql->sqlQueryToList(sqlQuerySelectAllofAllProdutos());
		
		if (!$lista_produtos) {
			echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
			die('<b>Query Inválida:</b>' . @mysqli_error($mysql->con));  
		}
		
		$notificacao_sucesso = "";
		$notificacao_alteracao = "";
		$notificacao_deletado = "";
		$notificacao_erro = "";
		
		if (isset($_GET['notificacao_sucesso']) && $_GET['notificacao_sucesso'] == true) {
			$notificacao_sucesso = "Produto cadastrado";
		}
		if (isset($_GET['notificacao_alteracao']) && $_GET['notificacao_alteracao'] == true) {
			$notificacao_alteracao = "Produto alterado";
		}
		if (isset($_GET['notificacao_deletado']) && $_GET['notificacao_deletado'] == true) {
			$notificacao_erro = "Produto deletado";
		}
		if (isset($_GET['notificacao_erro']) && $_GET['notificacao_erro'] == true) {
			$notificacao_erro = "Erro ao tentar realizar a operação";
		}
		
		$title = 'Consultar Produto';
		$childView = 'views/Produto_Consultar_View.php';
		include('views/_Layout.php');
		$mysql->fechar();
		
	} catch (Exception $e) {
		echo 'Exceção capturada: ',  $e->getMessage(), "\n";
	}	
?>