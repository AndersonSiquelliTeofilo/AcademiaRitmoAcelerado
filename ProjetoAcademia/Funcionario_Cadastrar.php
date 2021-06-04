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
				include_once('models/funcao.php');
				$mysql = new BancodeDados();
				$mysql->conecta();

				if ($_POST) {		
					if( $_FILES['foto'] ) { 
						$guid = guid();
						$tmpName = $_FILES['foto']['tmp_name'];
						$dir = './content/assets/fotos/'; 
						$path_parts = pathinfo($_FILES['foto']['name']);
						$fotoNome = $guid . date('y') . "." . $path_parts['extension'];		

						if( move_uploaded_file( $tmpName, $dir . $fotoNome ) ) {
							$usuarioId = $guid;
							$funcaoId = $_POST['funcao'];
							$usuario = new Usuario($usuarioId, $_POST['nome'], $_POST['email'], $_POST['senha'], $fotoNome, Status::Aprovado);
							$insert_Usuario = $mysql->sqlQueryCommand($usuario->sqlQueryInsert());
							$insert_UsuarioFuncao = $mysql->sqlQueryCommand("insert into usuariosfuncoes (UsuarioId, FuncaoId) values ('{$usuarioId}', '{$funcaoId}')");
							
							if (!$insert_Usuario || !$insert_UsuarioFuncao) {
								header("Location: Funcionario_Consultar.php?notificacao_erro=true");
								exit();
							}
							
							header("Location: Funcionario_Consultar.php?notificacao_sucesso=true");
							exit();
							
						} else {
							header("Location: Funcionario_Consultar.php?notificacao_erro=true");
							exit();
						}
					} else {
						header("Location: Funcionario_Consultar.php?notificacao_erro=true");
						exit();
					}
				}
				
				$title = 'Cadastro funcionário';
				$childView = 'views/Funcionario_Cadastrar_view.php';
				$lista_funcoes = $mysql->sqlQueryToList(sqlQuerySelectAllFuncoes());
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