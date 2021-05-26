<?php
	if ($_POST) {
		include('util.php');
		include('models/usuario.php');

		include_once('conexao.php');
		//criando o objeto mysql e conectando ao banco de dados
		$mysql = new BancodeDados();
		$mysql->conecta();
			
		try {
			if( $_FILES['foto'] ) { 
				$tmpName = $_FILES['foto']['tmp_name'];
				$dir = './content/assets/fotos/'; 
				$path_parts = pathinfo($_FILES['foto']['name']);
				$name = guid() . "." . $path_parts['extension'];		

				if( move_uploaded_file( $tmpName, $dir . $name ) ) {
					$Usuario = new Usuario(guid(), $_POST['nome'], $_POST['email'], $_POST['senha'], $name, Status::Aprovado);
					$resultado = $mysql->sqlstring($Usuario->sqlQueryInsert(),"INCLUSÃO");
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
		$title = 'Cadastro';
		$childView = 'views/cadastro_funcionario_view.php';
		include('views/_Layout.php');
	}
?>