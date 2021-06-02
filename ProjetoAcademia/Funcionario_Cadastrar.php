<?php
	include_once('data/conexao.php');
	$mysql = new BancodeDados();
	$mysql->conecta();
	$notificacao_sucesso = "";
	$notificacao_erro = "";

	if ($_POST) {
		try {
			include_once('util.php');
			include_once('models/usuario.php');
			if( $_FILES['foto'] ) { 
				$fixGuid = guid();
				$tmpName = $_FILES['foto']['tmp_name'];
				$dir = './content/assets/fotos/'; 
				$path_parts = pathinfo($_FILES['foto']['name']);
				$name = $fixGuid . date('y') . "." . $path_parts['extension'];		

				if( move_uploaded_file( $tmpName, $dir . $name ) ) {
					$usuarioId = $fixGuid;
					$funcaoId = $_POST['funcao'];
					$usuario = new Usuario($usuarioId, $_POST['nome'], $_POST['email'], $_POST['senha'], $name, Status::Aprovado);
					$result_Usuario = $mysql->sqlstring($usuario->sqlQueryInsert(),"INCLUSÃO");
					$result_UsuarioFuncao = $mysql->sqlstring("insert into usuariosfuncoes (UsuarioId, FuncaoId) values ('{$usuarioId}', '{$funcaoId}')","INCLUSÃO");
					if (!$result_Usuario || !$result_UsuarioFuncao) {
						$notificacao_erro = "Erro ao tentar cadastrar usuário";
					}
					$notificacao_sucesso = "Cadastro Realizado";
				} else {
					header('Location: erro.php');
				}
			} else {
				header('Location: erro.php');
			}
		} catch (Exception $e) {
			echo 'Exceção capturada: ',  $e->getMessage(), "\n";
		}
	}
	
	$title = 'Cadastro funcionário';
	$childView = 'views/Funcionario_Cadastrar_view.php';
	$query = mysqli_query($mysql->con,"select * from funcoes order by Nome");
	include('views/_Layout.php');
	$mysql->fechar();	
?>