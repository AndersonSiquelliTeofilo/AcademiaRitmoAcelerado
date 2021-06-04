<?php
	try {
		include_once('data/conexao.php');
		include_once('util.php');
		include_once('models/cliente.php');
		$mysql = new BancodeDados();
		$mysql->conecta();
		$notificacao_sucesso = "";
		$notificacao_erro = "";
		
		if (isset($_GET['notificacao_sucesso']) && $_GET['notificacao_sucesso'] == true) {
			$notificacao_sucesso = "Cliente cadastrado";
		}
		if (isset($_GET['notificacao_erro']) && $_GET['notificacao_erro'] == true) {
			$notificacao_erro = "Erro ao tentar realizar a operação";
		}
		
		if($_POST) {
			$email = $_POST['email'];
			$senha = $_POST['senha'];
			$result_Usuario = $mysql->sqlQuery(sqlQuerySelectUserByEmail($email));
			if($result_Usuario) {
				session_start();
				$_SESSION['id'] = $result_Usuario['Id'];
				$_SESSION['nome'] = $result_Usuario['Nome'];
				$_SESSION['funcao'] = 'cliente';
				$_SESSION['log'] = 'ativo';
				
				header("location:index.php");
			} else {
				$notificacao_erro = "Usuário não localizado";
			}
		}
		
		$title = 'Login';
		$childView = 'views/Cliente_Login_view.php';
		include('views/Cliente_Login_view.php');

		$mysql->fechar();

	} catch (Exception $e) {
		echo 'Exceção capturada: ',  $e->getMessage(), "\n";
		header("Location: Cliente_Login_view.php?notificacao_erro=true");
		exit();
	}	
?>