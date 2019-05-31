<?php
//calculo para exibição

$tipoBusca = 'torre';
$qtdExibida = isset($_GET['qtde']) ? $_GET['qtde'] : 20;
$qtdSolicita = total_post($idBusca);


if (isset($_GET['pgAtual'])){
	$inicio = (($_GET['pgAtual'] * $qtdExibida) - $qtdExibida);
	$fim = $qtdSolicita;
}else{
	$inicio = 0;
	$fim = $qtdSolicita;
}
// POST PUBLICADOS
$torre_post = buscar_post($idBusca, $postPublicado, $inicio, $fim, $ordem);
$json = json_decode($torre_post);
$numPaginas = count($json);
$qtdPaginas = intval($numPaginas/$qtdExibida)+ 1;
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
				<a class="nav-link" href="<?php echo '/extilos/'.$pg.$nm.$cd.$tp.$qtde.'&od=asc&l=p' ?>" >
					<i class="material-icons">arrow_drop_up</i>asc
					<div class="ripple-container"></div>
				</a>
				<a class="nav-link" href="<?php echo '/extilos/'.$pg.$nm.$cd.$tp.$qtde.'&od=desc&l=p' ?>" >
					<i class="material-icons">arrow_drop_down</i>desc
					<div class="ripple-container"></div>
				</a>
			<span class="nav-tabs-title">Quantidade:</span>
				<a class="nav-link" href="<?php echo '/extilos/'.$pg.$nm.$cd.$tp.'&qtde=5&l=p' ?>" >5
					<div class="ripple-container"></div>
				</a>
				<a class="nav-link" href="<?php echo '/extilos/'.$pg.$nm.$cd.$tp.'&qtde=10&l=p' ?>" >10
					<div class="ripple-container"></div>
				</a>
				<a class="nav-link" href="<?php echo '/extilos/'.$pg.$nm.$cd.$tp.'&qtde=25&l=p' ?>" >25
					<div class="ripple-container"></div>
				</a>
				<a class="nav-link" href="<?php echo '/extilos/'.$pg.$nm.$cd.$tp.'&qtde=50&l=p' ?>" >50
					<div class="ripple-container"></div>
				</a>
			</ul>
		</div>
	</div>
</div>
<div class="card-body table-responsive">
	<div class="tab-content">

		<?php 	
		for ($i = 0; $i < $qtdPaginas  ; $i++) { 
			$inicio = $qtdExibida * $i; ?>
			<div class="tab-pane <?php if($i == 0) echo $active ;?>" id="<?php echo $i ?>">
				<table class="table">
					<thead class="text-warning text-center">
						<th>Publicar</th>
						<th>Título</th>
						<th COLSPAN="5">Imagens</th>
						<th COLSPAN="2">Curtidas</th>
						<th COLSPAN="2">Visitas</th>
						<th>Denúncias</th>
						<th>Excluir</th>
						<th>Denunciar</th>
						<th>Cidade</th>
						<th>UF</th>
						<th>Usuario</th>
					</thead>
					<tbody class="text-center">
						<?php
						if(!isset($json)){
							echo '<td>Vazio</td>';
						}else{
							foreach(array_slice($json, $inicio, $qtdExibida) as $registro){ 
								$img = isset($registro->img) ? $registro->img : 'semimagem.jpg';
								$img1 = isset($registro->img1) ? $registro->img1 : 'semimagem.jpg';
								$img2 = isset($registro->img2) ? $registro->img2 : 'semimagem.jpg';
								$img3 = isset($registro->img3) ? $registro->img3 : 'semimagem.jpg';
								$img4 = isset($registro->img4) ? $registro->img4 : 'semimagem.jpg';
								$valida = validar_post($registro->postagem, $idBusca, $tipoBusca);
								$valida_json = json_decode($valida);
                           			// echo $registro->idPost; print_r($valida);
								if($valida_json[0]->post_excluido == 0){
									if($valida_json[0]->post_liberado > 0){
										?>
										<tr>
											<td>
												<div class="form-check">
													<label class="form-check-label">
														<input class="form-check-input" type="checkbox" 
														onclick="ativarPost('<?php echo $registro->idPost ?>','<?php echo $idBusca ?>','<?php echo 'checkDesativar'.$registro->idPost ?>','libera','1')"
														id="<?php echo 'checkDesativar'.$registro->idPost ?>" checked="true">
														<span class="form-check-sign">
															<span class="check"></span>
														</span>
													</label>
												</div>
											</td>
											<td><?php echo $registro->usuTitulo.$registro->idPost ?></td>
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
											<td><small><i class="material-icons" style="color:#000991">thumb_up_alt</i> <?php echo total_like($registro->idPost) ?></small></td>
											<td><small><i class="material-icons" style="color:#ed0000">thumb_down_alt</i> <?php echo total_deslike($registro->idPost) ?></small> </td>
											<td><small><i class="material-icons" title="Usuários logados" style="color:#303030">person</i><?php echo total_visitas_user($registro->idPost) ?></small></td>
											<td><small><i class="material-icons" title="Visitantes não logados" style="color:#494949">perm_identity</i><?php echo total_visitas($registro->idPost) ?></small></td>
											<td><small><i class="material-icons" title="Verificar denúcias" style="color:#ef8300">warning</small></i><?php echo total_denuncia($registro->idPost) ?></td>
											<td>
												<div class="form-check">
													<label class="form-check-label">
														<input class="form-check-input" type="checkbox" 
														onclick="ativarPost('<?php echo $registro->idPost ?>','<?php echo $idBusca ?>','<?php echo 'checkExcluir'.$registro->idPost ?>','excluir','1')"
														id="<?php echo 'checkExcluir'.$registro->idPost ?>">
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
														onclick="ativarPost('<?php echo $registro->idPost ?>','<?php echo $idBusca ?>','<?php echo 'checkDenuncia'.$registro->idPost ?>','denuncia','1')"
														id="<?php echo 'checkDenuncia'.$registro->idPost ?>">
														<span class="form-check-sign">
															<span class="check"></span>
														</span>
													</label>
												</div>
											</td>
											<td><?php echo $registro->torreCidade; ?></td>
											<td><?php echo $registro->torreEstado; ?></td>
											<td> <a href="/extilos/usuario&nick=<?php echo $registro->arrobaUsuario ?>"><?php echo $registro->arrobaUsuario ?></a></td>
										</tr>
									<?php } } } }?>
								</tbody>
							</table>
						</div>

					<?php } ?> 

				</div>
			</div>
			<div class="card-header card-header-tabs card-header-info" >
		<div class="nav-tabs-navigation">
			<div class="nav-tabs-wrapper">
				<span class="nav-tabs-title">Pg:</span>
				<ul class="nav nav-tabs" data-tabs="tabs">
					<?php for ($i = 0; $i < $qtdPaginas ; $i++) { ?>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo '#'.$i ?>" data-toggle="tab">
								<?php echo $i ?>
								<div class="ripple-container"></div>
							</a>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>