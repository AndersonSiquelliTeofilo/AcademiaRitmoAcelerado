<section>
	<div class="container mt-3">
		<form name="cadastro" action="Funcionario_Cadastrar.php" method="post" enctype="multipart/form-data">
			<div class="mb-3 row">
				<label for="nome" class="col-sm-2 col-form-label">Nome</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" name="nome">
				</div>
			</div>
			<div class="mb-3 row">
				<label for="foto" class="col-sm-2 col-form-label">Foto</label>
				<div class="col-sm-10">
				  <input type="file" class="form-control" name="foto">
				</div>
			</div>
			<div class="mb-3 row">
				<label for="email" class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-10">
				  <input type="email" class="form-control" name="email">
				</div>
			</div>
			<div class="mb-3 row">
				<label for="senha" class="col-sm-2 col-form-label">Senha</label>
				<div class="col-sm-10">
				  <input type="password" class="form-control" name="senha">
				</div>
			</div>
			<div class="d-grid gap-2 d-md-flex justify-content-md-center">
				<input type="submit" class="btn btn-success" value="Cadastrar">
				<input type="reset" class="btn btn-warning" value="Limpar">
				<input type="button" class="btn btn-light" onclick="window.location='index.php';" value="Cancelar">
			</div>
		</form>
	</div>
</section>