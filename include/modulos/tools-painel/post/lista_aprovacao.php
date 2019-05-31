<?php
// POST NÃO PUBLICADOS

$qtdExibida_sem = isset($_GET['qtde']) ? $_GET['qtde'] : 9;
$qtdSolicita_sem = total_post($idBusca);
if (isset($_GET['pgAtual'])){
	$inicio_sem = (($_GET['pgAtual'] * $qtdExibida_sem) - $qtdExibida_sem);
	$fim_sem = $qtdSolicita_sem;
}else{
	$inicio_sem = 0;
	$fim_sem = $qtdSolicita_sem;
}

$torre_post_sem = buscar_post($idBusca, $post_sem, $inicio_sem, $fim_sem, $ordem);
$json_sem = json_decode($torre_post_sem);
$numPaginas_sem = count($json_sem);
$qtdPaginas_sem = intval($numPaginas_sem/$qtdExibida_sem)+ 1;
// CARREGA INFORMAÇÕES DA URL
$nm = isset($_GET['busca']) ? '&nm='.$_GET['busca'] : '';
$cd = isset($_GET['cd']) ? '&cd='.$_GET['cd'] : '';
$tp = isset($_GET['tp']) ? '&tp='.$_GET['tp'] : '';
$pg = isset($_GET['pg']) ? $_GET['pg'] : '';
$qtde = isset($_GET['qtde']) ? '&tp='.$_GET['qtde'] : '';
?>
<div class="card-header card-header-tabs card-header-info" >
	<div class="nav-tabs-navigation">
		<div class="nav-tabs-wrapper">
			<span class="nav-tabs-title">Ordem:</span>
			<ul class="nav nav-tabs" data-tabs="tabs">
				<a class="nav-link" href="<?php echo '/extilos/'.$pg.$nm.$cd.$tp.$qtde.'&od=asc&l=a' ?>" >
					<i class="material-icons">arrow_drop_up</i>asc
					<div class="ripple-container"></div>
				</a>
				<a class="nav-link" href="<?php echo '/extilos/'.$pg.$nm.$cd.$tp.$qtde.'&od=desc&l=a' ?>" >
					<i class="material-icons">arrow_drop_down</i>desc
					<div class="ripple-container"></div>
				</a>
			<span class="nav-tabs-title">Quantidade:</span>
				<a class="nav-link" href="<?php echo '/extilos/'.$pg.$nm.$cd.$tp.'&qtde=5&l=a' ?>" >5
					<div class="ripple-container"></div>
				</a>
				<a class="nav-link" href="<?php echo '/extilos/'.$pg.$nm.$cd.$tp.'&qtde=10&l=a' ?>" >10
					<div class="ripple-container"></div>
				</a>
				<a class="nav-link" href="<?php echo '/extilos/'.$pg.$nm.$cd.$tp.'&qtde=25&l=a' ?>" >25
					<div class="ripple-container"></div>
				</a>
				<a class="nav-link" href="<?php echo '/extilos/'.$pg.$nm.$cd.$tp.'&qtde=50&l=a' ?>" >50
					<div class="ripple-container"></div>
				</a>
			</ul>
		</div>
	</div>
</div>
<div class="card-body table-responsive">
	<div class="tab-content">
		<?php for ($i_sem = 0; $i_sem < $qtdPaginas_sem  ; $i_sem++) { 
			$inicio_sem = $qtdExibida_sem * $i_sem; ?>

			<div class="tab-pane <?php if($i_sem == 0) echo 'active';?>" id="<?php echo 'A'.$i_sem ?>">
				<table class="table table-hover">
					<thead class="text-warning text-center">
						<th>Publicar</th>
						<th>Excluir</th>
						<th>Título</th>
						<th COLSPAN="5">Imagens</th>
						<th COLSPAN="2">Curtidas</th>
						<th COLSPAN="2">Visitas</th>
						<th>Denúncias</th>
						<th>Cidade</th>
						<th>UF</th>
						<th>Usuario</th>
					</thead>
					<tbody class="text-center">
						<?php
						if(!isset($json_sem)){
							echo '<td>Vazio</td>';
						}else{
								//print_r($json_sem);
							foreach(array_slice($json_sem, $inicio_sem, $qtdExibida_sem) as $registro_sem){ 
								$img = isset($registro_sem->img) ? $registro_sem->img : 'semimagem.jpg';
								$img1 = isset($registro_sem->img1) ? $registro_sem->img1 : 'semimagem.jpg';
								$img2 = isset($registro_sem->img2) ? $registro_sem->img2 : 'semimagem.jpg';
								$img3 = isset($registro_sem->img3) ? $registro_sem->img3 : 'semimagem.jpg';
								$img4 = isset($registro_sem->img4) ? $registro_sem->img4 : 'semimagem.jpg';
								?>
								<tr>
									<td>
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input"
												onclick="ativarPost('<?php echo $registro_sem->idPost ?>','<?php echo $idBusca ?>','<?php echo 'checkAtivar'.$registro_sem->idPost ?>','libera','0')" type="checkbox" id="<?php echo 'checkAtivar'.$registro_sem->idPost ?>" >
												<span class="form-check-sign">
													<span class="check"></span>
												</span>
											</label>
										</div>
									</td>
									<td>
										<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input" type="checkbox" 
												onclick="ativarPost('<?php echo $registro_sem->idPost ?>','<?php echo $idBusca ?>','<?php echo 'checkExcluir'.$registro_sem->idPost ?>','excluir','0')"
												id="<?php echo 'checkExcluir'.$registro_sem->idPost ?>">
												<span class="form-check-sign">
													<span class="check"></span>
												</span>
											</label>
										</div>
									</td>
									<td><?php echo $registro_sem->usuTitulo.$registro_sem->idPost.'-'.$idBusca ?></td>
									<td><img src="../imagem/post/mini/<?php echo $img ?>" alt="" class="img-responsive" style="height: 60px" >
									</td>
									<td><img src="../imagem/post/mini/<?php echo $img1 ?>" alt="" class="img-responsive" style="height: 60px" >
									</td>
									<td><img src="../imagem/post/mini/<?php echo $img2 ?>" alt="" class="img-responsive" style="height: 60px" >
									</td>
									<td><img src="../imagem/post/mini/<?php echo $img3 ?>" alt="" class="img-responsive" style="height: 60px" >
									</td>
									<td><img src="../imagem/post/mini/<?php echo $img4 ?>" alt="" class="img-responsive" style="height: 60px" >
									</td>
									
									<td><small><i class="material-icons" style="color:#000991">thumb_up_alt</i> <?php echo total_like($registro_sem->idPost) ?></small></td>
									<td><small><i class="material-icons" style="color:#ed0000">thumb_down_alt</i> <?php echo total_deslike($registro_sem->idPost) ?></small> </td>
									<td><small><i class="material-icons" title="Usuários logados" style="color:#303030">person</i><?php echo total_visitas_user($registro_sem->idPost) ?></small></td>

									<td><small><i class="material-icons" title="Visitantes não logados" style="color:#494949">perm_identity</i><?php echo total_visitas($registro_sem->idPost) ?></small></td>

									<td><small><i class="material-icons" title="Verificar denúcias" style="color:#ef8300">warning</i><br><?php echo total_denuncia($registro_sem->idPost) ?></small></td>

									<td><?php echo $registro_sem->torreCidade; ?></td>
									<td><?php echo $registro_sem->torreEstado; ?></td>
									<td><?php echo $registro_sem->arrobaUsuario; ?></td>
									
								</tr>
							<?php } } ?>
						</tbody>
					</table>
					
				</div>
			<?php } ?> 
		</div>
	</div>
	<div class="card-header card-header-tabs card-header-info" >
	<div class="nav-tabs-navigation">
		<div class="nav-tabs-wrapper">
			<span class="nav-tabs-title">Paginas:</span>
			<ul class="nav nav-tabs" data-tabs="tabs">
				<?php for ($i_sem = 0; $i_sem < $qtdPaginas_sem ; $i_sem++) { ?>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo '#A'.$i_sem ?>" data-toggle="tab">
							<?php echo $i_sem ?>
							<div class="ripple-container"></div>
						</a>
					</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>