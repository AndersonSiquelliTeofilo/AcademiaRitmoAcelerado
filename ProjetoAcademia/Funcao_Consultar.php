<?php
	include('models/funcao.php');
	include_once('data/conexao.php');
	$mysql = new BancodeDados();
	$mysql->conecta();
	$query = mysqli_query($mysql->con,"select * from funcoes");

	if (!$query) {
		echo '<input type="button" onclick="window.location='."'index.php'".';" value="Voltar"><br><br>';
		die('<b>Query Inválida:</b>' . @mysqli_error($mysql->con));  
	}

	$title = 'Consultar funções';
	$childView = 'views/Funcao_Consultar_View.php';
	include('views/_Layout.php');
?>