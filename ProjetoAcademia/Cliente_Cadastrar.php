<?php
	try {
		include_once('data/conexao.php');
		include_once('util.php');
		include_once('models/cliente.php');
		include_once('models/produto.php');
		$mysql = new BancodeDados();
		$mysql->conecta();
		$notificacao_erro = "";
		if (isset($_GET['notificacao_erro'])) {
			$notificacao_erro = "Erro ao realizar cadastro";
		}
		
		if ($_POST) {
			echo "Erro ao verificar cliente";
			if( $_FILES['foto'] ) { 
			echo "Erro ao verificar cliente";
				$guid = guid();
				$tmpName = $_FILES['foto']['tmp_name'];
				$dir = './content/assets/fotos/'; 
				$path_parts = pathinfo($_FILES['foto']['name']);
				$fotoNome = $guid . date('y') . "." . $path_parts['extension'];	

				if( move_uploaded_file( $tmpName, $dir . $fotoNome ) ) {
					$cliente = new Cliente($guid, $_POST['nome'], $_POST['email'], $_POST['senha'], $fotoNome, Status::AguardandoAprovacao,
							$_POST['dataNascimento'], $_POST['cpf'], $_POST['logradouro'], $_POST['enderecoNumero'], $_POST['cidade'], $_POST['estado'],
							$_POST['celular'], $_POST['telefone'], $_POST['produto']);
					
					$insert_Cliente = $mysql->sqlQueryCommand($cliente->sqlQueryInsert());
					
					if (!$insert_Cliente) {
						echo "Erro ao verificar cliente";
						//header("Location: Cliente_Cadastrar.php?notificacao_erro=true");
						//exit();
					}
					
					header("Location: Cliente_Login.php?notificacao_sucesso=true");
					exit();
					
				}  else {
					echo "Erro ao mover foto";
					//header("Location: Cliente_Cadastrar.php?notificacao_erro=true");
					//exit();
				}
			} else {
				echo "Erro no files";
				//header("Location: Cliente_Cadastrar.php?notificacao_erro=true");
				//exit();
			}
		}
				
		$title = 'Cadastro cliente';
		$childView = 'views/Cliente_Cadastrar_view.php';
		$lista_produtos = $mysql->sqlQueryToList(sqlQuerySelectAllProdutos());
		include('views/_Layout.php');
		$mysql->fechar();
		
	} catch (Exception $e) {
		echo 'Exceção capturada: ',  $e->getMessage(), "\n";
	}
?>