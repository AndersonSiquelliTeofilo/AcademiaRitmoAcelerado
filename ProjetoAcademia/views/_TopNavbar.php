<nav class="navbar sticky-top navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
	<div class="container-fluid">
		<a class="navbar-brand" href="index.php"><img src="content/assets/img/Logo.png" alt="Logo" width="200" class="d-inline-block align-text-top"></a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
		<div class="collapse navbar-collapse nav nav-tabs justify-content-end" id="navbarResponsive">
		
		<?php 
			if(!isset($_SESSION)) 
			{ 
				session_start(); 
			} 

			if (isset($_SESSION['log']) && $_SESSION['log'] == "ativo")
			{
				if ($_SESSION['funcao'] == "Administrador" || $_SESSION['funcao'] == "Vendedor") {
					echo "<ul class='navbar-nav me-auto mb-2 mb-lg-0'>";
					
					if ($_SESSION['funcao'] == "Administrador") {
						echo "
						<li class='nav-item dropdown'>
							<a class='nav-link dropdown-toggle' href='#' id='funcionarios' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
								<i class='bi bi-building'></i> Funcionários
							</a>
							<ul class='dropdown-menu' aria-labelledby='funcionarios'>
								<li><a class='dropdown-item' href='Funcionario_Cadastrar.php' class='link-dark rounded'>Cadastrar Funcionários</a></li>
								<li><a class='dropdown-item' href='Funcionario_Consultar.php' class='link-dark rounded'>Listar Funcionários</a></li>
							</ul>
						</li>

						<li class='nav-item dropdown'>
							<a class='nav-link dropdown-toggle' href='#' id='funcoes' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
								<i class='bi bi-box-seam'></i> Funções
							</a>
							<ul class='dropdown-menu' aria-labelledby='funcoes'>
								<li><a class='dropdown-item' href='Funcao_Cadastrar.php' class='link-dark rounded'>Cadastrar Função</a></li>
								<li><a class='dropdown-item' href='Funcao_Consultar.php' class='link-dark rounded'>Listar Funções</a></li>
							</ul>
						</li>";
						
					}
					
					echo "
						<li class='nav-item dropdown'>
							<a class='nav-link dropdown-toggle' href='#' id='produtos' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
								<i class='bi bi-card-checklist'></i> Produtos
							</a>
							<ul class='dropdown-menu' aria-labelledby='produtos'>
								<li><a class='dropdown-item' href='Produto_Cadastrar.php' class='link-dark rounded'>Cadastrar Produto</a></li>
								<li><a class='dropdown-item' href='Produto_Consultar.php' class='link-dark rounded'>Listar Produtos</a></li>
							</ul>
						</li>
						
						<li class='nav-item dropdown'>
							<a class='nav-link dropdown-toggle' href='#' id='clientes' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
								<i class='bi bi-person-circle'></i> Clientes
							</a>
							<ul class='dropdown-menu' aria-labelledby='clientes'>
								<li><a class='dropdown-item' href='Cliente_Consultar.php' class='link-dark rounded'>Listar clientes</a></li>
							</ul>
						</li>";
					
					echo "</ul>";
				
					echo "
						<ul class='navbar-nav mb-2 mb-lg-0 justify-content-end'>
							<li class='nav-item'><a class='nav-link' aria-current='page' href='#'><i class='bi bi-gear-fill'></i> Conta</a><li>
							<li class='nav-item'><a class='nav-link' href='Logout.php'><i class='bi bi-arrow-right-square-fill'></i> Sair</a></li>
						</ul>";
					
				} else {
					// Cliente
					echo "
						<ul class='navbar-nav mb-2 mb-lg-0 justify-content-end'>
							<li class='nav-item'><a class='nav-link' aria-current='page' href='#'><i class='bi bi-gear-fill'></i> Conta</a><li>
							<li class='nav-item'><a class='nav-link' href='Logout.php'><i class='bi bi-arrow-right-square-fill'></i> Sair</a></li>
						</ul>";
				}
			
			} else {
				session_destroy();
				
				echo "
				<ul class='navbar-nav mb-2 mb-lg-0 justify-content-end'>
					<li class='nav-item'><a class='nav-link' href='Cliente_Cadastrar.php'><i class='bi bi-people-fill'></i> Cadastre-se</a></li>
					<li class='nav-item'><a class='nav-link' href='Cliente_Login.php'><i class='bi bi-person-circle'></i> Área do Cliente</a></li>
					<li class='nav-item'><a class='nav-link' href='Funcionario_Login.php'><i class='bi bi-lock-fill'></i> Área Restrita</a></li>
				</ul>";
			}
		?>
		</div>
	</div>
</nav>