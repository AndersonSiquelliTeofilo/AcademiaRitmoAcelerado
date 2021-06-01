<?php
	include('models/usuario.php');
	include_once('data/conexao.php');
	$mysql = new BancodeDados();
	$mysql->conecta();
	$query = mysqli_query($mysql->con,"select * from usuarios order by DataCriacao desc");

	if (!$query) {
		echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
		die('<b>Query Inválida:</b>' . @mysqli_error($mysql->con));  
	}

	$title = 'Consultar funcionário';
	$childView = 'views/Funcionario_Consultar_View.php';
	include('views/_Layout.php');
?>