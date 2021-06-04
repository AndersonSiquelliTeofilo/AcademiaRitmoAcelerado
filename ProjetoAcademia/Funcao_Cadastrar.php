<?php
	try {
		include_once('data/conexao.php');
		include_once('util.php');
		include_once('models/funcao.php');
		$mysql = new BancodeDados();
		$mysql->conecta();
		
		if ($_POST) {
			if( $_POST['nome'] !== "" ) { 
			
				$funcao = new Funcao(guid(), $_POST['nome']);
				$insert_Funcao = $mysql->sqlQueryCommand($funcao->sqlQueryInsert());
				if (!$insert_Funcao) {
					header("Location: Funcao_Consultar.php?notificacao_erro=true");
					exit();
				}
				
				header("Location: Funcao_Consultar.php?notificacao_sucesso=true");
				exit();
				
			} else {
				header("Location: Funcao_Consultar.php?notificacao_erro=true");
				exit();
			}
			
			header("Location: Funcao_Consultar.php?notificacao_erro=true");
			exit();
		}
		
		$title = 'Cadastro função usuários';
		$childView = 'views/Funcao_Cadastrar_view.php';
		include('views/_Layout.php');
		$mysql->fechar();
		
	} catch (Exception $e) {
		echo 'Exceção capturada: ',  $e->getMessage(), "\n";
	}
?>