<?php
	try {
		include_once('data/conexao.php');
		include_once('util.php');
		include_once('models/produto.php');
		$mysql = new BancodeDados();
		$mysql->conecta();
		
		if ($_POST) {
			if( $_POST['nome'] !== "" ) {
				
				$produto = new Produto(guid(), $_POST['nome'], $_POST['preco'], $_POST['dataInicio'], $_POST['dataFim']);
				$insert_Produto = $mysql->sqlQueryCommand($produto->sqlQueryInsert());
				if (!$insert_Produto) {
					header("Location: Produto_Consultar.php?notificacao_erro=true");
					exit();
				}
				
				header("Location: Produto_Consultar.php?notificacao_sucesso=true");
				exit();
				
			} else {
				header("Location: Produto_Consultar.php?notificacao_erro=true");
				exit();
			}
			
			header("Location: Produto_Consultar.php?notificacao_erro=true");
			exit();
		} 
		
		$title = 'Cadastro Produto';
		$childView = 'views/Produto_Cadastrar_view.php';
		include('views/_Layout.php');
		$mysql->fechar();
		
	} catch (Exception $e) {
		echo 'Exceção capturada: ',  $e->getMessage(), "\n";
	}
?>