<?php
	if ($_POST) {
		include('util.php');
		include('models/produto.php');
		include_once('data/conexao.php');
		$mysql = new BancodeDados();
		$mysql->conecta();
			
		try {
			if( $_POST['nome'] !== "" ) { 
				$produto = new Produto(guid(), $_POST['nome'], $_POST['preco'], $_POST['dataInicio'], $_POST['dataFim']);
				$resultado = $mysql->sqlstring($produto->sqlQueryInsert(),"INCLUSÃO");
				echo 'Cadastro Realizado';
				
			} else {
				header('Location: erro.php');
			}
		} catch (Exception $e) {
			echo 'Exceção capturada: ',  $e->getMessage(), "\n";
		}
	} else {
		$title = 'Cadastro Produto';
		$childView = 'views/Produto_Cadastrar_view.php';
		include('views/_Layout.php');
	}
?>