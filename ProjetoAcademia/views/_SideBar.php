<div class="flex-shrink-0 p-3 bg-white float-start" style="width: 280px;">
	<!--<a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
		<svg class="bi me-2" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
		 <span class="fs-5 fw-semibold">Ritmo Acelerado</span> 
	</a>-->
	<ul class="list-unstyled ps-0">
		<li class="mb-1">
			<button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#funcionario-collapse" aria-expanded="true">
				Funcionários
			</button>
			<div class="collapse show" id="funcionario-collapse">
				<ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
					<li><a href="Funcionario_Cadastrar.php" class="link-dark rounded">Cadastrar Funcionários</a></li>
					<li><a href="Funcionario_Consultar.php" class="link-dark rounded">Listar Funcionários</a></li>
				</ul>
			</div>
		</li>
		<li class="mb-1">
			<button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#funcao-collapse" aria-expanded="true">
			  Funções
			</button>
			<div class="collapse show" id="funcao-collapse">
				<ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
					<li><a href="Funcao_Cadastrar.php" class="link-dark rounded">Cadastrar Função</a></li>
					<li><a href="Funcao_Consultar.php" class="link-dark rounded">Listar Funções</a></li>
				</ul>
			</div>
		</li>
		<li class="mb-1">
			<button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#produto-collapse" aria-expanded="true">
			  Produtos
			</button>
			<div class="collapse show" id="produto-collapse">
				<ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
					<li><a href="Produto_Cadastrar.php" class="link-dark rounded">Cadastrar Produto</a></li>
					<li><a href="Produto_Consultar.php" class="link-dark rounded">Listar Produtos</a></li>
				</ul>
			</div>
		</li>

		<li class="border-top my-3"></li>
		<li class="mb-1">
			<button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
			  Conta
			</button>
			<div class="collapse" id="account-collapse">
				<ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
					<li><a href="#" class="link-dark rounded">Configurações</a></li>
					<li><a href="#" class="link-dark rounded">Sair</a></li>
				</ul>
			</div>
		</li>
	</ul>
</div>