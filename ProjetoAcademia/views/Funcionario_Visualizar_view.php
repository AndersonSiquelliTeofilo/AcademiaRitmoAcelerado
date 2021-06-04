<section>
	<div class="container mt-3">
		<form name="editar" action="Funcionario_Editar.php" method="post" enctype="multipart/form-data">
			<input type="hidden" id="id" name="id" value='<?php echo $_GET['id']; ?>' />
			<input type="hidden" name="statusCadastro" value='<?php echo $usuario->getStatusCadastro(); ?>' />			
			<div class="mb-3 row">
				<div class="col-sm-12 text-center">
					<?php 
						$foto = 'SemImagem.png';
						$func_foto = $usuario->getFoto();
						if (!empty($func_foto) && file_exists("content/assets/fotos/" . $func_foto)){
							$foto = $func_foto;
						}
						echo "<img src='content/assets/fotos/$foto' width='250px' heigth='250px'>";
					?>
				</div>				
			</div>
			<div class="mb-3 row">
				<label for="nome" class="col-sm-2 col-form-label">Nome</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" id="nome" name="nome" value='<?php echo $usuario->getNome(); ?>' required readonly />
				</div>
			</div>
			<div class="mb-3 row">
				<label for="foto" class="col-sm-2 col-form-label">Foto</label>
				<div class="col-sm-10">
					<input type="hidden" name="foto_cadastro" value='<?php echo $usuario->getFoto(); ?>'/>
					<input type="file" class="form-control" id="foto" name="foto" readonly />
				</div>
			</div>
			<div class="mb-3 row">
				<label for="email" class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-10">
				  <input type="email" class="form-control" id="email" name="email" value='<?php echo $usuario->getEmail(); ?>' required readonly />
				  <input type="hidden" name="emailConfirmado" value='<?php echo $usuario->getEmailConfirmado(); ?>' />
				</div>
			</div>
			<div class="mb-3 row">
				<label for="senha" class="col-sm-2 col-form-label">Senha</label>
				<div class="col-sm-10">
				  <input type="password" class="form-control" id="senha" name="senha" value='<?php echo $usuario->getPassword(); ?>' required readonly />
				</div>
			</div>
			<div class="mb-3 row">
				<label for="funcao" class="col-sm-2 col-form-label">Função</label>
				<div class="col-sm-10">
					<?php echo $funcao; ?>
					<a class="btn btn-primary" href="./Funcionario_Editar_Funcao.php?id=<?php echo $_GET['id']; ?>">Editar Função</a>
				</div>
			</div>
			<div class="d-grid gap-2 d-md-flex justify-content-md-center">
				<!-- Modal Deletar -->
				<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal_deletar">
				  Deletar
				</button>
				
				<button type="button" class="btn btn-primary" onclick="alterar()">
				  Editar Cadastro
				</button>
				<input type="hidden" id="btn_alterar" class="btn btn-info" value="Atualizar" />
				<input type="button" class="btn btn-secondary" onclick="window.location='Funcionario_Consultar.php';" value="Voltar" />
			</div>
		</form>
	</div>
</section>

<!-- Modal Deletar -->
<div class="modal fade" id="modal_deletar" tabindex="-1" aria-labelledby="modal_deletar_Label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form name="excluir" action="Funcionario_Excluir.php" method="post">
				<div class="modal-header">
					<h5 class="modal-title" id="modal_deletar_Label">Exclusão</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					Tem certeza que deseja deletar o usuário ?
					<input type="hidden" id="id" name="id" value='<?php echo $_GET['id']; ?>' />
					<input type="hidden" name="foto_cadastro" value='<?php echo $usuario->getFoto(); ?>'/>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-danger">Deletar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	function alterar() {
		document.getElementById('nome').removeAttribute('readonly');
		document.getElementById('foto').removeAttribute('readonly');
		document.getElementById('email').removeAttribute('readonly');
		document.getElementById('senha').removeAttribute('readonly');
		document.getElementById('btn_alterar').type = 'submit';
	};
</script>