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
				
				if ($_POST) {
					$foto = $_POST['foto_cadastro'];
					$dir = 'content/assets/fotos/';
					$filename = $dir . $foto;
					if (file_exists($filename)) {
						unlink($filename);
					}
							
					$delete_Usuario = $mysql->sqlQueryCommand(sqlQueryDeleteUserById(base64_decode($_POST['id'])));
					$delete_UsuarioFuncao = $mysql->sqlQueryCommand(sqlQueryDeleteFuncaoByUserId(base64_decode($_POST['id'])));
					
					if (!$delete_Usuario) {
						header("Location: Funcionario_Consultar.php?notificacao_erro=true");
						exit();
					}
					
					if (!$delete_UsuarioFuncao) {
						header("Location: Funcionario_Consultar.php?notificacao_erro=true");
						exit();
					}

					header("Location: Funcionario_Consultar.php?notificacao_deletado=true");
					exit();
				}
				
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
		header("Location: Funcionario_Consultar.php?notificacao_erro=true");
		exit();
	}
?>