<?php
//VERIFICA SE USUÁRIO TEM PERMISÃO PARA PUBLICAR CONTEÚDO NESTE BLOG
if(isset($idLogado)){  
		// echo $idLogado.'pagina'.$idPagina;
		//carrega as informações necessárias do banco para a páginas
	$usuarioAlbum = usuario_album($idLogado);
//carrega informações do usuario pelo id
	$usuarioDados = busca_usuario($idLogado);
//carrega as informações necessárias do banco para a página
	$usuarioPagina = usuario_pagina($idLogado);
	?>


	<div class="modal fade" id="modal-conteudo" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="Login">Publicar Conteúdo</h4>
				</div>
				<div class="modal-body row">
					<form action="/extilos/cadastros/upload-fotos.php" method="post" enctype="multipart/form-data">
						<div class='input-wrapper'>
							<div class="col-sm-12">
									<div id="selecioneImg">
										<label for='upload_file' class="upload">Selecionar fotos</label>
										<input type="file" id="upload_file" name="imagem[]"  multiple size="5" class="upload_file" accept="image/jpeg, image/png, image/jpg,"/>
										<input id='upload_file1' type='file' value='' />
										<span id='file-name'></span>
										<div class="foto" id="qtde_preview"></div>
										<div id="fotoCarrega"></div>
										<div class="foto" id="fotoCapa"></div>
									
										<div class="col-sm-12" id="proximaEtapa" style="display: none;">
											<a onclick="Mudarestado1('selecioneImg');Mudarestado('descritivoImg')" class="btn btn-sm btn-block btn-info" data-toggle="collapse" data-parent="#accordion" href="#descritivoImg">Falar sobre <img src="https://img.icons8.com/color/20/000000/right.png"></a>
										</div>
									</div>

								
								<div id="descritivoImg" class="panel-collapse collapse">
									<div class="panel-body">
										<div class="form-group">
											<label for="subject">Título</label>
											<input type="text" class="form-control" name="usuTitulo" id="subject" required>
										</div>
										<div class="form-group">
											<label for="marca">Descrição </label>
											<textarea type="text" class="form-control" name="usuDesc" id="descricao" placeholder="Use também: #hashtag | @pessoas." rows="3"></textarea>
											<div id="resultadohashPag"></div>
										</div>
										<div class="form-group">
											<label for="subject">Marcações <small><b>&</b>Marca | <b>$</b>Loja</small></label>
											<textarea type="text" class="form-control" name="usuMarca" id="marcacao" placeholder="Use: &marcaDoProduto | $nomeDaLoja." rows="3"></textarea>
										</div>
									</div>
									<div class="col-sm-6">
										<a onclick="Mudarestado('selecioneImg'); Mudarestado1('descritivoImg')" class="btn btn-sm btn-block btn-default">Voltar <img src="https://img.icons8.com/color/20/000000/left.png"></a>
									</div>
									<div class="col-sm-6">
											<a onclick="Mudarestado1('descritivoImg');Mudarestado('configImg')" class="btn btn-sm btn-block btn-info" data-toggle="collapse" data-parent="#accordion" href="#configImg">Onde publicar <img src="https://img.icons8.com/color/20/000000/right.png"></a>
										</div>
								</div>
								<div id="configImg" class="panel-collapse collapse">
									<div class="panel-body">
										<label class="text-center">Look</label>
										<div class="switch__container">
											<p>Masculino</p>
											<input id="masculino" class="switch switch--shadow" name="masculino" type="checkbox" value="1" >
											<label for="masculino"></label>
										</div>
										<div class="switch__container">
											<p>Feminino</p>
											<input id="feminino" class="switch switch--shadow" name="feminino" type="checkbox" value="1" >
											<label for="feminino"></label>
										</div>
										<hr>
										<div class="form-group">
											<label for="name">Categoria Pessoal?</label>
											<select class="form-control" name="usuEstilo" id="estilo" required>
												<?php while ($user = $usuarioAlbum->fetch(PDO::FETCH_ASSOC)): //LISTA NOME DOS ALBUNS ?>
													<?php $nomeAlbum = $user['album']; $idAlbum = $user['idAlbum'];?>
													<option value="<?php echo $idAlbum ?>"><?php echo $nomeAlbum ?></option>
													<?php endwhile; ?>s
												</select>
											</div>
											<hr>
											<div class="form-group">
												<label for="marca">Publicar em qual blog? </label>
												<?php while ($pagina = $usuarioPagina->fetch(PDO::FETCH_ASSOC)): //prepara o conteúdo para ser listado ?>
													<?php
													$nomePagina = $pagina['nomePagina']; 
													$idPaginaConsulta = $pagina['idPagina'];

													?>
													<div class="form-group">
														<?php if($idPagina == $idPaginaConsulta){ ?>
															<div class="switch__container">
																<p><?php echo $nomePagina.$idPaginaConsulta ?></p>
																<input id="<?php echo $nomePagina ?>" class="switch switch--shadow" name="idPagina[]" type="checkbox" value="<?php echo $idPaginaConsulta ?>" checked="checked" onclick="return false;">
																<label for="<?php echo $nomePagina ?>"></label>
															</div>
															<small>Categoria do Blog</small>
															<select class="form-control" name="albumBlog[]" id="<?php echo $idPaginaConsulta ?>">
																<?php 
																$pastaBlog = pasta_album_blog($idPaginaConsulta);
																$pasta_album = json_decode($pastaBlog);
																foreach (array_slice($pasta_album ,0,15) as $pasta_album){ 
																	$pastaAlbum = $pasta_album->albumBlog; 
																	$idAlbumBlog = $pasta_album->idAlbumBlog;
																	?>
																	<option value="<?php echo $idAlbumBlog ?>"><?php echo $pastaAlbum ?></option>
																<?php } ?>
															</select>
															<?php
														}else{ 
															?>
															<div class="switch__container">
																<p><?php echo $nomePagina.$idPaginaConsulta ?></p>
																<input id="<?php echo $nomePagina ?>" class="switch switch--shadow" name="idPaginaCheck[]" type="checkbox" value="<?php echo $idPaginaConsulta ?>" onclick="Mudarestado('<?php echo 'blog'.$idPaginaConsulta ?>')" 	>
																<label for="<?php echo $nomePagina ?>"></label>
															</div>
															<div id="<?php echo 'blog'.$idPaginaConsulta ?>"" style="display:none">
																<small>Categoria do Blog</small>
																<select class="form-control" name="albumBlog[]">
																	<?php 
																	$pastaBlog = pasta_album_blog($idPaginaConsulta);
																	$pasta_album = json_decode($pastaBlog);
																	foreach (array_slice($pasta_album ,0,15) as $pasta_album){ 
																		$pastaAlbum = $pasta_album->albumBlog; 
																		$idAlbumBlog = $pasta_album->idAlbumBlog;
																		?>
																		<option value="<?php echo $idAlbumBlog ?>"><?php echo $pastaAlbum ?></option>
																	<?php } ?>
																</select>
															</div>
														<?php } ?>

													</div>
												<?php endwhile; ?>
											</div>
											<hr>
											<div class="form-group">
												<label for="marca">Participar do Ranking? </label>
												<div class="switch__container">
													<p>Extilos</p>
													<input id="torreExtilos" class="switch switch--shadow" name="torreExtilos" type="checkbox" value="1">
													<label for="torreExtilos"></label>
												</div>
												<div class="switch__container">
													<p><?php echo $usuarioDados['usuEstado']?></p>
													<input id="torreEstado" class="switch switch--shadow" name="torreEstado" type="checkbox" value="<?php echo $usuarioDados['usuEstado']?>">
													<label for="torreEstado"></label>
												</div>
												<div class="switch__container">
													<p><?php echo $usuarioDados['usuCidade']?></p>
													<input id="torreCidade" class="switch switch--shadow" name="torreCidade" type="checkbox" value="<?php echo $usuarioDados['usuCidade']?>">
													<label for="torreCidade"></label>
												</div>
											</div>
										</div>
										<input type="hidden" name="caminho" value="<?php echo $_SERVER["REQUEST_URI"] ?>" >
										<hr>
										<input type="submit" class="btn btn-lg btn-block btn-primary" name='submit_image' value="PUBLICAR">
										<hr>
										<div class="col-sm-6">
										<a onclick="Mudarestado('descritivoImg'); Mudarestado1('configImg')" class="btn btn-sm btn-default btn-block">Voltar <img src="https://img.icons8.com/color/20/000000/left.png"></a>
									</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php 
	} 
	?>
