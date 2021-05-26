<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="Site para aula de linguagem de programação da Fatec Mauá" />
        <meta name="author" content="Anderson and Monique" />
		<title>Academia Ritmo Acelerado - Login</title>
		<link rel="icon" type="image/x-icon" href="content/assets/favicon.ico" />
		<!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
		<!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" />
		<link href="content/bootstrap-5.0.0-dist/css/bootstrap.min.css" rel="stylesheet" />
	
		<?php date_default_timezone_set('America/Sao_Paulo'); ?>
	</head>
	<body class="d-flex align-items-center pt-4">
		<div class="container">
			<main role="main" class="pb-3">
				<div class="row justify-content-center">
					<div class="form-group col-md-4 col-md-offset-5 align-center">
						<section>
							<form name="login" action="login.php" method="post">
							
								<div class="row ">
									<div class="row form-group">
										<img src="content/assets/img/Logo.png" alt="Logo" width="400" height="100">
									</div>
									<div class="row g-3">
											<input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
									</div>
									<div class="row g-3">
										<input type="password" name="senha" class="form-control" placeholder="Senha" required>
									</div>
									<div class="row g-3">
										<button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
									</div>
									<div class="row g-3 text-center">
										<p>
											<a href="cadastro.php">Cadastrar-se</a>
										</p>
										<p>
											<a href="index.php" class="link-secondary">Voltar</a>
										</p>
									</div>
								</div>
							</form>
						</section>
						<footer class="pt-4 my-md-5 pt-md-5 border-top text-muted">
							<div class="row">
								<div class="col-12 col-md">
								Copyright &copy; Academia Ritmo Acelerado <?php echo date('Y'); ?>
								</div> 
							</div>
						</footer>
					</div>
				</div>
			</main>
		</div>
		
        <!-- Bootstrap core JS-->
		<script src="content\bootstrap-5.0.0-dist\js\bootstrap.bundle.min.js"></script>
	</body>
</html>
