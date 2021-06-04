<?php
	try {
		include_once('data/conexao.php');
		include_once('util.php');
		include_once('models/funcao.php');
		$mysql = new BancodeDados();
		$mysql->conecta();
		$lista_funcoes = $mysql->sqlQueryToList(sqlQuerySelectAllFuncoes());
		
		if (!$lista_funcoes) {
			echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
			die('<b>Query Inválida:</b>' . @mysqli_error($mysql->con));  
		}
		
		$notificacao_sucesso = "";
		$notificacao_alteracao = "";
		$notificacao_deletado = "";
		$notificacao_erro = "";
		
		if (isset($_GET['notificacao_sucesso']) && $_GET['notificacao_sucesso'] == true) {
			$notificacao_sucesso = "Função cadastrada";
		}
		if (isset($_GET['notificacao_alteracao']) && $_GET['notificacao_alteracao'] == true) {
			$notificacao_alteracao = "Função alterada";
		}
		if (isset($_GET['notificacao_deletado']) && $_GET['notificacao_deletado'] == true) {
			$notificacao_erro = "Função deletada";
		}
		if (isset($_GET['notificacao_erro']) && $_GET['notificacao_erro'] == true) {
			$notificacao_erro = "Erro ao tentar realizar a operação";
		}
		
		$title = 'Consultar funções';
		$childView = 'views/Funcao_Consultar_View.php';
		include('views/_Layout.php');
		$mysql->fechar();
		
	} catch (Exception $e) {
		echo 'Exceção capturada: ',  $e->getMessage(), "\n";
	}	
?>