<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="Site para aula de linguagem de programação da Fatec Mauá" />
        <meta name="author" content="Anderson and Monique" />
		<title>Academia Ritmo Acelerado - <?php echo $title; ?></title>
		<link rel="icon" type="image/x-icon" href="content/assets/favicon.ico" />
		<!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
		<!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
		<link href="content/bootstrap-5.0.0-dist/css/bootstrap.min.css" rel="stylesheet" />
	
		<?php include('./util.php'); ?>
	</head>
	<body>
		<!-- Navigation-->
        <?php include '_TopNavbar.php'; ?>
		
		<!-- Page -->
		<?php include($childView); ?>
		
		<!-- Footer-->
		<?php include '_Footer.php'; ?>
		
        <!-- Bootstrap core JS-->
		<script src="content\bootstrap-5.0.0-dist\js\bootstrap.bundle.min.js"></script>
	</body>
</html>
