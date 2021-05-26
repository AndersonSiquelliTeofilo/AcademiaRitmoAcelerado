<section>
	<div class="container mt-3">
		<form name="cadastro" action="cadastrar.php" method="post" enctype="multipart/form-data">
			<div class="mb-3 row">
				<label for="nome" class="col-sm-2 col-form-label">Nome</label>
				<div class="col-sm-10">
				  <input type="text" class="form-control" name="nome">
				</div>
			</div>
			<div class="mb-3 row">
				<label for="dataNascimento" class="col-sm-2 col-form-label">Data de Nascimento</label>
				<div class="col-sm-10">
				  <input type="date" class="form-control" name="dataNascimento">
				</div>
			</div>
			<div class="mb-3 row">
				<label for="cpf" class="col-sm-2 col-form-label">CPF</label>
				<div class="col-sm-10">
				  <input type="text" maxlength="12" class="form-control" name="cpf">
				</div>
			</div>
			<div class="mb-3 row">
				<div class="col-sm-1">
					<label for="logradouro" class="col-sm-2 col-form-label">Endereço</label>
				</div>
				<div class="col-sm-8">
				  <input type="text" class="form-control" name="logradouro">
				</div>
				
				<div class="col-sm-1">
					<label for="enderecoNumero" class="col-sm-2 col-form-label">Número</label>
				</div>
				<div class="col-sm-2">
					<input type="text" class="form-control" name="enderecoNumero">
				</div>
				
			</div>
			<div class="mb-3 row">
				<div class="col-sm-2">
					<label for="cidade" class="col-sm-2 col-form-label">Cidade</label>
				</div>
				<div class="col-sm-3">
					<input type="text" class="form-control" name="cidade">
				</div>
				<div class="col-sm-2">
					<label for="estado" class="col-sm-2 col-form-label">Estado</label>
				</div>
				<div class="col-sm-2">
					<input type="text" maxlength="2" class="form-control" name="estado">
				</div>
			</div>
			
			<div class="mb-3 row">
				<div class="col-sm-1">
					<label for="celular" class="col-sm-2 col-form-label">Celular</label>
				</div>
				<div class="col-sm-3">
					<input type="text" maxlength="14" class="form-control" name="celular">
				</div>
				<div class="col-sm-1">
					<label for="telefone" class="col-sm-2 col-form-label">Telefone</label>
				</div>
				<div class="col-sm-3">
					<input type="text" maxlength="13" class="form-control" name="telefone">
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