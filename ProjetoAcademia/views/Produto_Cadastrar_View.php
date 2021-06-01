<section>
	<div class="container mt-3">
		<form name="cadastro" action="Produto_Cadastrar.php" method="post" enctype="multipart/form-data">
			<div class="mb-3 row">
				<label for="nome" class="col-sm-2 col-form-label">Nome</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" name="nome">
				</div>
			</div>
			<div class="mb-3 row">
				<label for="preco" class="col-sm-2 col-form-label">Preço</label>
				<div class="col-sm-10">
				  <input type="number" class="form-control" name="preco" step=".01" min="0" value="0" required>
				</div>
			</div>
			<div class="mb-3 row">
				<label for="dataInicio" class="col-sm-2 col-form-label">Data Início</label>
				<div class="col-sm-10">
				  <input type="date" class="form-control" name="dataInicio">
				</div>
			</div>
			<div class="mb-3 row">
				<label for="dataFim" class="col-sm-2 col-form-label">Data Fim</label>
				<div class="col-sm-10">
				  <input type="date" class="form-control" name="dataFim">
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