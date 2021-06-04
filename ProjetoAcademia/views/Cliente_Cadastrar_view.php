<section>
	<div class="container mt-3">
		<?php
			if ($notificacao_erro !== "") {
				echo "<div class='alert alert-danger' role='alert'>";
				echo $notificacao_erro;
				echo "</div>";
			}
		?>
		<form name="cadastro" action="Cliente_Cadastrar.php" method="post" enctype="multipart/form-data">
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
				  <input type="text" maxlength="11" class="form-control" name="cpf">
				</div>
			</div>
			<div class="mb-3 row">
				<label for="logradouro" class="col-sm-2 col-form-label">Endereço</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="logradouro">
				</div>
				<label for="enderecoNumero" class="col-sm-1 col-form-label">Número</label>
				<div class="col-sm-2">
					<input type="text" class="form-control" name="enderecoNumero">
				</div>
			</div>
			<div class="mb-3 row">
				<label for="cidade" class="col-sm-2 col-form-label">Cidade</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="cidade">
				</div>
				<label for="estado" class="col-sm-1 col-form-label">UF</label>					
				<div class="col-sm-1">
					<input type="text" maxlength="2" class="form-control" name="estado">
				</div>
			</div>
			
			<div class="mb-3 row">
				<label for="celular" class="col-sm-2 col-form-label">Celular</label>
				<div class="col-sm-4">
					<input type="text" maxlength="12" class="form-control" name="celular">
				</div>
				<label for="telefone" class="col-sm-1 col-form-label">Telefone</label>
				<div class="col-sm-4">
					<input type="text" maxlength="11" class="form-control" name="telefone">
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
			
			<div class="mb-3 row">
				<label for="produto" class="col-sm-2 col-form-label">Produto</label>
				<div class="col-sm-10">
					<select name="produto" class="form-select" required>
						<?php 
							while($dados=mysqli_fetch_array($lista_produtos)) {
								echo "<option value='{$dados['Id']}'>{$dados['Nome']} - R$ " . number_format((float)$dados['Preco'], 2, ',', '') . "</option>";
							}
						?>
					</select>
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