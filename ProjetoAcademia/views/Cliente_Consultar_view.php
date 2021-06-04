<section>
	<div class="container mt-3">
		<?php
			if ($notificacao_sucesso !== "") {
				echo "<div class='alert alert-success' role='alert'>";
				echo $notificacao_sucesso;
				echo "</div>";
			}
			if ($notificacao_alteracao !== "") {
				echo "<div class='alert alert-info' role='alert'>";
				echo $notificacao_alteracao;
				echo "</div>";
			}
			if ($notificacao_deletado !== "") {
				echo "<div class='alert alert-danger' role='alert'>";
				echo $notificacao_deletado;
				echo "</div>";
			}
			if ($notificacao_erro !== "") {
				echo "<div class='alert alert-danger' role='alert'>";
				echo $notificacao_erro;
				echo "</div>";
			}
		?>
		<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th scope="col"></th>
					<th scope="col">Nome</th>
					<th scope="col">Email</th>
					<th scope="col">Email Confirmado</th>
					<th scope="col">Status Cadastro</th>
					<th scope="col">Data Criação</th>
					<th scope="col">Foto</th>
				</tr>
			</thead>
			<tbody>
				<?php
					while($dados=mysqli_fetch_array($lista_clientes)) 
					{
						$id = base64_encode($dados['Id']);
						$produtoNome = mysqli_query($mysql->con,"select Nome from Produtos where Id='".$dados['ProdutoId']."' order by Id LIMIT 1");

						echo "<tr>";
						echo "<td><a href='./Cliente_Visualizar.php?id=$id' class='btn btn-info'><i class='bi bi-eye'></i> Visualizar</a></td>";
						echo "<td class='hidden-xs hidden-sm'>". $dados['Nome'] ."</td>";
						echo "<td class='hidden-xs hidden-sm'>". $dados['Email'] ."</td>";
						if ($dados['EmailConfirmado'] == 1) {
							echo "<td>Sim</td>";
						} else {
							echo "<td>Não</td>";
						}						
						echo "<td>". Status::type($dados['StatusCadastro']) ."</td>";
						echo "<td>". $dados['DataCriacao'] ."</td>";
										
						$foto = 'SemImagem.png';
						if (!empty($dados['Foto']) && file_exists("content/assets/fotos/" . $dados['Foto'])){
							$foto = $dados['Foto'];
						}
						echo "<td align='center'><img src='content/assets/fotos/$foto' width='50px' heigth='50px'>";
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
		 </div>
	</div>
</section>