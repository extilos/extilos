<?php
ob_start();
session_start();

include_once '../conn/init.php';
include_once '../functions/functions.php';
include_once '../functions/conexoes.php';
//recebe informação da página e o usuário desejado
if (isset($_POST['admBlog'])){
	$consulta = $_POST['admBlog'];
	$idTorre = $_POST['idTorre'];

	$PDO = db_connect();
	$blogs = lista_blog($consulta, $idTorre);
	$json_busca = json_decode($blogs);
	?>
	<table class="table table-hover">
		<thead class="text-warning">
			<th>Ativar</th>
			<th>Nome</th>
			<th>UF</th>
			<th>Cidade</th>
			<th>Email</th>
			<th>Desde</th>
			<th>Automatizar</th>
			<th>Publicações</th>
		</thead>
		<tbody>
			<?php
			if(!isset($json_busca)){
				echo '<td>Vazio</td>';
			}else{
				foreach(array_slice($json_busca, 0, 10) as $lista_busca){
					?>
					<form action="editar_fans" method="post">
						<input type="hidden" name="idPagina" value="<?php echo $lista->idUsuario  ?>">
						<tr>
							<td class="text-center">
								<div class="form-check">
									<label class="form-check-label">
										<input class="form-check-input" type="checkbox" value="" checked>
										<span class="form-check-sign">
											<span class="check"></span>
										</span>
									</label>
								</div>
							</td>
							<td><?php echo $lista_busca->nomePagina ?></td>
							<td><?php echo $lista_busca->estadoPagina ?></td>
							<td><?php echo $lista_busca->cidadePagina ?></td>
							<td><?php echo $lista_busca->emailPagina ?></td>
							<td><?php echo $lista_busca->pgData ?></td>
							<td class="text-center">
								<div class="form-check">
									<label class="form-check-label">
										 <?php if($lista_busca->pgPermite > 0){ ?>
			                                  	<input class="form-check-input" type="checkbox" id="torrePermite" value="" checked>
		                                        <?php }else{ ?>
		                                        <input class="form-check-input" type="checkbox" id="torrePermite" value="">
		                                        <?php } ?>
										<span class="form-check-sign">
											<span class="check"></span>
										</span>
									</label>
								</div>
							</td>
							<td><?php echo $lista_busca->pgData ?></td>
							<td class="text-center"><a type="submit" value="Ações" class="btn btn-sm btn-warning">Editar</a></td>
						</tr>
					</form>
					<?php } } ?>
				</tbody>
			</table>
			<?php }else{
				echo 'não passou';
				} ?>