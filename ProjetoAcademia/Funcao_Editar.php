<?php
	if ($_POST) {
		include('util.php');
		include('models/funcao.php');
		include_once('data/conexao.php');
		$mysql = new BancodeDados();
		$mysql->conecta();
			
		try {
			if( $_POST['nome'] !== "" ) { 
					$funcao = new Funcao(guid(), $_POST['nome']);
					$resultado = $mysql->sqlstring($funcao->sqlQueryInsert(),"INCLUSÃO");
					echo 'Cadastro Realizado';
			} else {
				header('Location: erro.php');
			}
		} catch (Exception $e) {
			echo 'Exceção capturada: ',  $e->getMessage(), "\n";
		}
	} else {
		$title = 'Cadastro função usuários';
		$childView = 'views/cadastro_funcao_view.php';
		include('views/_Layout.php');
	}
?>