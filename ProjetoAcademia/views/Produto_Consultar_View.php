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
					  <th scope="col">Preço</th>
					  <th scope="col">Data Início</th>
					  <th scope="col">Data Fim</th>
					  
					</tr>
				</thead>
				<tbody>
					<?php 				
						while($dados=mysqli_fetch_array($lista_produtos)) 
						{
							$id = base64_encode($dados['Id']);
							echo "<tr>";
							echo "<td><a href='./Produto_Visualizar.php?id=$id' class='btn btn-info'><i class='bi bi-eye'></i> Visualizar</a></td>";
							echo "<td>". $dados['Nome'] ."</td>";
							echo "<td>". $dados['Preco'] ."</td>";
							echo "<td>". $dados['DataInicio'] ."</td>";
							echo "<td>". $dados['DataFim'] ."</td>";
							echo "</tr>";
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</section>