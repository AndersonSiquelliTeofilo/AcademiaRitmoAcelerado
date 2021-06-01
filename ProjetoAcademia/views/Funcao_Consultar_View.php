<section>
	<div class="container mt-3">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
				  <th scope="col">Nome</th>
				  <th scope="col">Ações</th>
				</tr>
			</thead>
			<tbody>
				<?php 				
					while($dados=mysqli_fetch_array($query)) 
					{
						echo "<tr>";
						echo "<td>". $dados['Nome'] ."</td>";
						echo "<td><a href='#' class='btn btn-primary'>Editar</a> <a href='#' class='btn btn-danger'>Desativar</a></td>";
						$id = base64_encode($dados['Id']);
						echo "</tr>";
					}
					
					$mysql->fechar();
				?>
			</tbody>
		</table>
	</div>
</section>