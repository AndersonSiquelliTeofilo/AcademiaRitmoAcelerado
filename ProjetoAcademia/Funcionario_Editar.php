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
					if ($_FILES['foto']['size'] > 0) { 
						$dir = 'content/assets/fotos/';
						$filename = $dir . $foto;
						if (file_exists($filename)) {
							unlink($filename);
						}
						$fixGuid = guid();
						$tmpName = $_FILES['foto']['tmp_name'];
						$path_parts = pathinfo($_FILES['foto']['name']);
						$name = $fixGuid . date('y') . "." . $path_parts['extension'];		
						move_uploaded_file( $tmpName, $dir . $name );
						$foto = $name;
					}
								
					$usuario = new Usuario(base64_decode($_POST['id']), $_POST['nome'], $_POST['email'], 
						$_POST['senha'], $foto);
							
					$update = $mysql->sqlQueryCommand($usuario->sqlQueryUpdate());
					
					if (!$update) {
						header("Location: Funcionario_Consultar.php?notificacao_erro=true");
						exit();
					}

					header("Location: Funcionario_Consultar.php?notificacao_alteracao=true");
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