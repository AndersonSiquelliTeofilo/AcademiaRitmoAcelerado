<?php
	try {
		if(!isset($_SESSION)) 
		{ 
			session_start(); 
		}
		if (isset($_SESSION['log']) && $_SESSION['log'] == "ativo")
		{
			if ($_SESSION['funcao'] == "Administrador") {
				include_once('data/conexao.php');
				include_once('util.php');
				include_once('models/usuario.php');
				$mysql = new BancodeDados();
				$mysql->conecta();
				$lista_usuarios = $mysql->sqlQueryToList(sqlQuerySelectAllUsers());

				if (!$lista_usuarios) {
					echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
					die('<b>Query Inválida:</b>' . @mysqli_error($mysql->con));  
				}

				$notificacao_sucesso = "";
				$notificacao_alteracao = "";
				$notificacao_deletado = "";
				$notificacao_erro = "";
				
				if (isset($_GET['notificacao_sucesso']) && $_GET['notificacao_sucesso'] == true) {
					$notificacao_sucesso = "Funcionário cadastrado";
				}
				if (isset($_GET['notificacao_alteracao']) && $_GET['notificacao_alteracao'] == true) {
					$notificacao_alteracao = "Funcionário alterado";
				}
				if (isset($_GET['notificacao_deletado']) && $_GET['notificacao_deletado'] == true) {
					$notificacao_erro = "Funcionário deletado";
				}
				if (isset($_GET['notificacao_erro']) && $_GET['notificacao_erro'] == true) {
					$notificacao_erro = "Erro ao tentar realizar a operação";
				}
				
				$title = 'Consultar funcionário';
				$childView = 'views/Funcionario_Consultar_view.php';
				include('views/_Layout.php');
				$mysql->fechar();
			} else{
				header("Location: Error.php");
				exit();
			}
			
		} else {
			session_destroy();
			header("Location: index.php");
			exit();
		}

	} catch (Exception $e) {
		echo 'Exceção capturada: ',  $e->getMessage(), "\n";
	}
?>