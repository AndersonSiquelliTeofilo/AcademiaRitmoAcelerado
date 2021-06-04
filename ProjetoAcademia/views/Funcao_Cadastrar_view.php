<section>
	<div class="container mt-3">
		<form name="cadastro" action="Funcao_Cadastrar.php" method="post" enctype="multipart/form-data">
			<div class="mb-3 row">
				<label for="nome" class="col-sm-2 col-form-label">Função</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" name="nome">
				</div>
			</div>
			<div class="d-grid gap-2 d-md-flex justify-content-md-center">
				<input type="submit" class="btn btn-success" value="Cadastrar">
				<input type="reset" class="btn btn-warning" value="Limpar">
				<input type="button" class="btn btn-light" onclick="window.location='Funcao_Consultar.php';" value="Cancelar">
			</div>
		</form>
	</div>
</section>