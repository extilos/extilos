<?php
//VERIFICA SE USUÁRIO TEM PERMISÃO PARA PUBLICAR CONTEÚDO NESTE BLOG
if(isset($idLogado)){     
	?>
	<?php 
		// echo $idLogado.'pagina'.$idPagina;
		//carrega as informações necessárias do banco para a páginas
	$usuarioAlbum = usuario_album($idLogado);
		//carrega informações do usuario pelo id
	$usuarioDados = busca_usuario($idLogado);
		//carrega as informações necessárias do banco para a página profissional
	$usuarioPagina = usuario_pagina_profissional($idLogado);
	?>
	<div class="modal fade" id="modal-produto" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" onclick="Mudarestado('adicinaPro')" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="Login">Publicar Conteúdo</h4>
				</div>
				<div class="modal-body row">
					<form action="/extilos/cadastros/upload-fotos.php" method="post" enctype="multipart/form-data">
						<div class='input-wrapper'>
							<div class="col-sm-12">
								<div class="col-sm-12">
									<div id="adicinaPro" class="panel-collapse collapse" style="display: none;"> <!-- PRODUTO -->
										<div class="panel-body">
											<div class="form-group">
												<div class="col-sm-12">
													<h4>Adicionar Produto</h4>
													<!--div class="col-sm-3">
														<label for='upload_produto' class="upload">Foto do produto</label>
														<input type="file" id="upload_produto" name="imagemPro[]"  size="1" class="upload_produto" accept="image/jpeg, image/png, image/jpg,"/>
														<input id='upload_produto7' type='file' value='' />
														<span id='file-name'></span>
														<div class="foto" id="qtde_preview"></div>
														<div id="fotoProdutoCarrega"></div>
														<div class="foto" id="fotoProduto"></div>
													</div>-->
														<div class="col-sm-3">
															<label for="subject">Código:*</label>
															<input type="text" class="form-control" name="codigoPro[]" placeholder="AB123" required>
														</div>
														<div class="col-sm-9">	
															<label for="subject">Nome do Produto:*</label>
															<input type="text" class="form-control" name="nomePro[]" placeholder="Blusa" required>
														</div>
														<div class="col-sm-6">	
															<label for="subject">Preço Normal:*</label>
															<input type="text" class="form-control" name="precoNormal[]" data-mask="#.##0,00" data-mask-reverse="true" data-mask-maxlength="false" placeholder="29,90" required>
														</div>
														<div class="col-sm-6">	
															<label for="subject">Preço com Desconto:</label>
															<input type="text" class="form-control" name="precoDesconto[]" data-mask="#.##0,00" data-mask-reverse="true" data-mask-maxlength="false" placeholder="25,90">
														</div>
														<div class="col-sm-6">
															<label for="subject">Marca:*</label><small></small>
															<input type="text" class="form-control" name="marcaProduto[]" placeholder="Marca" required>
														</div>
														<div class="col-sm-6">
															<label for="subject">Quantidade disponível</label>
															<input type="text" class="form-control" name="qtdeDisponivel[]" data-mask="000" data-mask-reverse="true">
														</div>
														<div class="col-sm-12">
															<label for="subject">Informações adicionais:</label><small></small>
															<textarea type="text" class="form-control" name="adicionaProduto[]" placeholder="Tecido, cores, tamanhos disponíveis, etc." rows="1"></textarea>
														</div>
												</div>
											</div>
											<div id="addproduto"></div>
											<div class="col-sm-12">
												<hr>
												<label for="subject">Você pode cadastrar até 3 produtos em cada look.</label>
												<a class="btn btn-default btn-block btn-sm" onclick="addProdutos()">+1 Produto</a>
												<hr>
											</div>
											<div class="col-sm-6">
												<a onclick="Mudarestado('descritivoImgPro'); Mudarestado1('adicinaPro')" class="btn btn-sm btn-block btn-default">Voltar <img src="https://img.icons8.com/color/20/000000/left.png"></a>
											</div>
											<div class="col-sm-6">
												<a onclick="Mudarestado1('adicinaPro');Mudarestado('configPro')" class="btn btn-sm btn-block btn-info" data-toggle="collapse" data-parent="#accordion" href="#configPro">Produtos e Preços <img src="https://img.icons8.com/color/20/000000/right.png"></a>
											</div>
										</div>
									</div>
									<div id="selecioneImgPro">
										<label for='upload_file' class="upload">Selecionar fotos do look</label>
										<input type="file" id="upload_file" name="imagem[]"  multiple size="5" class="upload_file" accept="image/jpeg, image/png, image/jpg,"/>
										<input id='upload_file1' type='file' value='' />
										<span id='file-name'></span>
										<div class="foto" id="qtde_preview"></div>
										<div id="fotoCarrega"></div>
										<div class="foto" id="fotoCapa"></div>
										<div class="col-sm-12" id="proximaEtapa" style="display: none;">
											<a onclick="Mudarestado1('selecioneImgPro');Mudarestado('descritivoImgPro')" class="btn btn-sm btn-block btn-info" data-toggle="collapse" data-parent="#accordion" href="#descritivoImg">Falar sobre <img src="https://img.icons8.com/color/20/000000/right.png"></a>
										</div>
									</div>
									<div id="descritivoImgPro" class="panel-collapse collapse">
										<div class="form-group">
											<label for="subject">Título</label>
											<input type="text" class="form-control" name="usuTitulo" id="subject" placeholder="Conjunto Amarelo" required>
											<input type="text" class="hidden" name="produto" id="produto" value="1">
										</div>
										<div class="form-group">
											<label for="marca">Descrição </label>
											<textarea type="text" class="form-control" name="usuDesc" id="descricao" placeholder="Use também: #hashtag | @pessoas." rows="3"></textarea>
											<div id="resultadohashPag"></div>
										</div>
										<div class="col-sm-6">
											<a onclick="Mudarestado('selecioneImgPro'); Mudarestado1('descritivoImgPro')" class="btn btn-sm btn-block btn-default">Voltar <img src="https://img.icons8.com/color/20/000000/left.png"></a>
										</div>
										<div class="col-sm-6">
											<a onclick="Mudarestado1('descritivoImgPro');Mudarestado('adicinaPro')" class="btn btn-sm btn-block btn-info" data-toggle="collapse" data-parent="#accordion" href="#adicinaPro">Produtos e Preços <img src="https://img.icons8.com/color/20/000000/right.png"></a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id="configPro" class="panel-collapse collapse">
							<div class="panel-body">
								<div class="col-sm-12">
									<div class="col-sm-4">
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
										<div class="switch__container">
											<p>Alternativo</p>
											<input id="alternativo" class="switch switch--shadow" name="alternativo" type="checkbox" value="1" >
											<label for="alternativo"></label>
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
									<div class="col-sm-4">
										<label for="subject">Forma aceita para pagamento?</label>
										<div class="form-check">
											<div class="switch__container">
												<p>Dinheiro</p>
												<input id="dinheiro" class="switch switch--shadow" name="dinheiro" type="checkbox" value="1" >
												<label for="dinheiro"></label>
											</div>
											<div class="switch__container">
												<p>Boleto</p>
												<input id="boleto" class="switch switch--shadow" name="boleto" type="checkbox" value="1" >
												<label for="boleto"></label>
											</div>
											<div class="switch__container">
												<p>Cartão Débito</p>
												<input id="debito" class="switch switch--shadow" name="debito" type="checkbox" value="1" >
												<label for="debito"></label>
											</div>
											<div class="switch__container">
												<p>Cartão Crédito</p>
												<input id="credito" class="switch switch--shadow" name="credito" type="checkbox" value="1" >
												<label for="credito"></label>
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-group">
											<label for="name">Categoria Pessoal</label>
											<select class="form-control" name="usuEstilo" id="estilo" required>
												<?php while ($user = $usuarioAlbum->fetch(PDO::FETCH_ASSOC)): //LISTA NOME DOS ALBUNS ?>
													<?php $nomeAlbum = $user['album']; $idAlbum = $user['idAlbum'];?>
													<option value="<?php echo $idAlbum ?>"><?php echo $nomeAlbum ?></option>
													<?php endwhile; ?>s
												</select>
											</div>
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
										</div>

									</div>
									<div class="col-sm-12">
										<hr>
									</div>

									<input type="hidden" name="caminho" value="<?php echo $_SERVER["REQUEST_URI"] ?>" >
									<hr>
									<input type="submit" class="btn btn-lg btn-block btn-primary" name='submit_image' value="PUBLICAR">
									<div class="col-sm-6">
										<a onclick="Mudarestado('adicinaPro'); Mudarestado1('configPro')" class="btn btn-sm btn-block btn-default">Voltar <img src="https://img.icons8.com/color/20/000000/left.png"></a>
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
<script>
	//ADICIONA CAMPO PARA PRODUTOS
	var max = 3;
	var num = 1;
	function addProdutos(){
		if(num < max){
			$.ajax({
				url: '/extilos/ajax/addProduto.php',
				type: 'POST',
				data: {num:num},
				success: function(data)
				{
                            //alert(data);
                            $("#addproduto").append(data);
                            num++;
                        }
                    })
		}

	}
</script>