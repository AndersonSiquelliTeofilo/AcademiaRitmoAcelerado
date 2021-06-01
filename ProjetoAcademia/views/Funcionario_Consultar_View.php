<section>
	<div class="container mt-3">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th scope="col">Função</th>
					<th scope="col">Nome</th>
					<th scope="col">Email</th>
					<th scope="col">Email Confirmado</th>
					<th scope="col">Status Cadastro</th>
					<th scope="col">Data Criação</th>
					<th scope="col">Ações</th>
					<th scope="col">Foto</th>
				</tr>
			</thead>
			<tbody>
				<?php 				
					while($dados=mysqli_fetch_array($query)) 
					{
						$result = mysqli_query($mysql->con,"select FuncaoId from usuariosfuncoes where UsuarioId='".$dados['Id']."' order by FuncaoId LIMIT 1");
						$funcaoNome = mysqli_query($mysql->con,"select Nome from funcoes where Id='".$result->fetch_row()[0]."' order by Id LIMIT 1");

						echo "<tr>";
						echo "<td>". $dados['Nome'] ."</td>";
						echo "<td>". $funcaoNome->fetch_row()[0] ."</td>";
						echo "<td>". $dados['Email'] ."</td>";
						if ($dados['EmailConfirmado'] == 1) {
							echo "<td>Sim</td>";
						} else {
							echo "<td>Não</td>";
						}						
						echo "<td>". Status::type($dados['StatusCadastro']) ."</td>";
						echo "<td>". $dados['DataCriacao'] ."</td>";
						echo "<td><a href='#' class='btn btn-primary'>Editar</a> <a href='#' class='btn btn-danger'>Desativar</a></td>";
						
						$id = base64_encode($dados['Id']);
						$foto = 'SemImagem.png';
						if (!empty($dados['Foto'])){
							$foto = $dados['Foto'];
						}
						echo "<td align='center'><a href='verproduto.php?id=$id'><img src='content/assets/img/$foto' width='50px' heigth='50px'></a>";
						echo "</tr>";
					}
					
					$mysql->fechar();
				?>
			</tbody>
		</table>
	</div>
</section>