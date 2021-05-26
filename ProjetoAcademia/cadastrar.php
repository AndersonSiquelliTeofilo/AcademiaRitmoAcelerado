<?php
	include('util.php');

	//include_once('conexao.php');
	//criando o objeto mysql e conectando ao banco de dados
	//$mysql = new BancodeDados();
	//$mysql->conecta();
			
	// recuperando 
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	//$foto = $_POST['foto'];
	$statusCadastro = "Aguardando Email";
	//$dataCriacao = date();
	//$dataNascimento = $_POST['date'];	
	$cpf = $_POST['cpf'];	
	$logradouro = $_POST['logradouro'];	
	$enderecoNumero = $_POST['enderecoNumero'];
	$cidade = $_POST['cidade'];
	$estado = $_POST['estado'];
	$celular = $_POST['celular'];
	$telefone = $_POST['telefone'];
	//$produtoId = $_POST['produto'];
	
	if( $_FILES['foto'] ) { 
		$tmpName = $_FILES['foto']['tmp_name'];
		$dir = './content/assets/fotos/'; 
		$path_parts = pathinfo($_FILES['foto']['name']);
		$name = guid() . "." . $path_parts['extension'];		
		
		// move_uploaded_file
		if( move_uploaded_file( $tmpName, $dir . $name ) ) { 	
				//$sqlupdate =  "update tabelaimg set imagem='$name' where codigo=$codigo";
				// executando instrução SQL através do método sqlstring()
				//$resultado = $mysql->sqlstring($sqlupdate,"ALTERAÇÃO IMAGEM");	
				//echo '<br><br><input type="button" onclick="window.location='."'imagem.php'".';" value="Voltar"><br><br>';
		} else {		
			// direciona para a página de erro qdo ocorre erro no move_uploaded_file
			//header('Location: erro.php'); 			
			echo "leu mas nao moveu foto";
		}
		
	} else {
		// direciona para a página de erro qdo não seleciona o arquivo
		//header('Location: erro.php'); 
		echo "nem leu a foto";
	}

	// criando a linha de INSERT
	//$sqlinsert =  "insert into tabelaimg (codigo, produto, descricao, data, valor) values ($codigo, '$produto', '$descricao', '$data', $valor)";
	
	// executando instrução SQL através do método sqlstring()
	//$resultado = $mysql->sqlstring($sqlinsert,"INCLUSÃO");
?>