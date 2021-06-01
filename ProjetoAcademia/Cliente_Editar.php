<?php
	if ($_POST) {
		include('util.php');
		include('models/cliente.php');
		include_once('data/conexao.php');
		$mysql = new BancodeDados();
		$mysql->conecta();
			
		try {
			if( $_FILES['foto'] ) { 
				$tmpName = $_FILES['foto']['tmp_name'];
				$dir = './content/assets/fotos/'; 
				$path_parts = pathinfo($_FILES['foto']['name']);
				$fotoNome = guid() . "." . $path_parts['extension'];		

				if( move_uploaded_file( $tmpName, $dir . $fotoNome ) ) {
					$cliente = new Cliente(guid(), $_POST['nome'], $_POST['email'], $_POST['senha'], $fotoNome, Status::AguardandoAprovacao,
					$_POST['dataNascimento'], $_POST['cpf'], $_POST['logradouro'], $_POST['enderecoNumero'], $_POST['cidade'], $_POST['estado'],
					$_POST['celular'], $_POST['telefone'], $_POST['produtoId']);
					$resultado = $mysql->sqlstring($cliente->sqlQueryInsert(),"INCLUSÃO");
					echo 'Cadastro Realizado';
				} else {
					header('Location: erro.php');
				}
			} else {
				header('Location: erro.php');
			}
		} catch (Exception $e) {
			echo 'Exceção capturada: ',  $e->getMessage(), "\n";
		}
	} else {
		$title = 'Cadastro cliente';
		$childView = 'views/cadastro_cliente_view.php';
		include('views/_Layout.php');
	}
?>