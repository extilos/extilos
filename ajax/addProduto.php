								<?php if($_POST['num'] == 1){ ?>		
										<div class="col-sm-12 ">
										<div class="">
										<hr>
										<button type="button" class="close" data-dismiss="alert">×</button>
										<small><?php echo 'Produto '.($_POST['num']+1) ?></small>
										<hr>
										<!--div class="col-sm-3">
											<label for='upload_produto2' class="upload">Foto do produto</label>
											<input type="file" id="upload_produto2" name="imagemPro[]"  size="1" class="upload_produto" accept="image/jpeg, image/png, image/jpg,"/>
											<input id='upload_produto5' type='file' value='' />
											<span id='file-name'></span>
											<div class="foto" id="qtde_preview"></div>
											<div id="fotoProdutoCarrega2"></div>
											<div class="foto" id="fotoProduto2"></div>
										</div>-->
										<div class="col-sm-12">
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
											<div class="col-xs-6">
												<label for="subject">Marca:*</label><small></small>
												<input type="text" class="form-control" name="marcaProduto[]" placeholder="Marca" required>
											</div>
											<div class="col-xs-6">
												<label for="subject">Quantidade disponível</label>
												<input type="text" class="form-control" name="qtdeDisponivel[]" >
											</div>
											<div class="col-sm-12">
												<label for="subject">Informações adicionais:</label><small></small>
												<textarea type="text" class="form-control" name="adicionaProduto[]" placeholder="Tecido, cores, tamanhos disponíveis, etc." rows="1"></textarea>
											</div>
										</div>
										</div>
										</div>
								<?php } if($_POST['num'] == 2){ ?>
										<div class="col-sm-12 ">
										<div class="">
										<hr>
										<button type="button" class="close" data-dismiss="alert">×</button>
										<small><?php echo 'Produto '.($_POST['num']+1) ?></small>
										<hr>
										<!--div class="col-sm-4">
											<label for='upload_produto3' class="upload">Foto do produto</label>
											<input type="file" id="upload_produto3" name="imagemPro[]"  size="1" class="upload_produto" accept="image/jpeg, image/png, image/jpg,"/>
											<input id='upload_produto6' type='file' value='' />
											<span id='file-name'></span>
											<div class="foto" id="qtde_preview"></div>
											<div id="fotoProdutoCarrega3"></div>
											<div class="foto" id="fotoProduto3"></div>
										</div-->
										<div class="col-sm-12">
											<div class="col-sm-3">
												<label for="subject">Código:*</label>
												<input type="text" class="form-control" name="codigoPro[]" required>
											</div>
											<div class="col-sm-9">	
												<label for="subject">Nome do Produto:*</label>
												<input type="text" class="form-control" name="nomePro[]"  required>
											</div>
											<div class="col-sm-6">	
												<label for="subject">Preço Normal:*</label>
												<input type="text" class="form-control" name="precoNormal[]" data-mask="#.##0,00" data-mask-reverse="true" data-mask-maxlength="false" required>
											</div>
											<div class="col-sm-6">	
												<label for="subject">Preço com Desconto:</label>
												<input type="text" class="form-control" name="precoDesconto[]" data-mask="#.##0,00" data-mask-reverse="true" data-mask-maxlength="false">
											</div>
											<div class="col-xs-6">
												<label for="subject">Marca:*</label><small></small>
												<input type="text" class="form-control" name="marcaProduto[]" placeholder="Marca" required>
											</div>
											<div class="col-xs-6">
												<label for="subject">Quantidade disponível</label>
												<input type="text" class="form-control" name="qtdeDisponivel[]" data-mask="000" data-mask-reverse="true">
											</div>
											<div class="col-sm-12">
												<label for="subject">Informações adicionais:</label><small></small>
												<textarea type="text" class="form-control" name="adicionaProduto[]" placeholder="Tecido, cores, tamanhos disponíveis, etc." rows="1"></textarea>
											</div>
										</div>
										</div>
										</div>
								<?php } ?>

	<script src="/extilos/js/jquery-1.11.1.min.js"></script> 
    <script src="/extilos/js/jquery.mask.js"></script>
    <script src="/extilos/js/js_ext/script_projeto.js"></script>
										