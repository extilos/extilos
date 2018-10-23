<div class="col-sm-6">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Gerenciamento</h4>
                  <h4 class="card-title">Blog: <b><?php echo $blog['nomePagina'] ?></b></h4>
                  <p class="card-category">Estado:<b> <?php echo $blog['estadoPagina'] ?></b> | Cidade:
                    <b> <?php echo $blog['cidadePagina'] ?></b></p>
                    <div class="text-right" >
                      <a href="meus_blogs" class="btn btn-sm btn-primary">meus blogs</a>
                    </div>
                  </div>
                  <div class="card-body">
                    <div id="Respdescritivo" >
                      <h5 for="apresenta">Apresentação do blog</h5>
                      <div class="card-header-default">
                        <?php if($consulta['pm_editar'] > 0){ ?>
                        <textarea type="textarea" class="form-control" rows="3" id="apresenta"><?php echo $blog['descPagina'] ?></textarea>
                        <?php } else {?>
                        <textarea type="textarea" class="form-control" rows="3" id="apresenta" disabled><?php echo $blog['descPagina'] ?></textarea>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="text-center torre">
                      <input id="descritivo" onclick="attDesc('descritivo')" class="btn btn-sm btn-block upload" value="Atualizar" style="display:none">
                    </div>
                    <hr>
                    <h5> Capa</h5>
                    <div id="fotoCapa"  class="card">
                      <img src="../imagem/capa/media/<?php echo $blog['pgCapa'] ?>" style="max-height: 250px" class="img-responsive" >
                    </div>
                    <?php if($consulta['pm_editar'] > 0){ ?>
                    <label for='upload_file' class="btn btn-sm btn-block btn-default">Alterar foto</label>
                    <input type="file" id="upload_file" name="imagem" multiple class="upload_file" accept="image/jpeg, image/png, image/jpg,"/>
                    <input id='upload_file' type='file' value='' />
                    <span id='file-name'></span>
                    <div class="text-center torre">
                      <input id="attImagem" onclick="attPagina('capa')" class="btn btn-sm btn-block upload" value="Atualizar" style="display:none">
                      <div id="fotoCarrega"></div>
                      <div id="atualizado"></div>
                      <div id="atualizadoCapa"></div>
                    </div>
                    <?php } ?>
                  </div>
                </div>
          </div>
          <div class="col-sm-6">
                <div class="card ">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Definições de usuários</h4>
                    <p class="card-category">Gerenciamento</p>
                  </div>
                  <div class="card-body">
                    <div class="panel panel-default sidebar-menu">
                      <?php if($admPagina > ''){ ?>
                      <form action="" method="post" id="formADM" enctype="multipart/form-data">
                        <input type="hidden" name="idPagina" id="idPagina" value="<?php echo $idPagina ?>">
                        <div class="panel-heading">
                          <h4><i class="fa fa-users-cog"></i> Gerenciamento da página <label for=""> Administrado por: <?php echo $quantAdm ?> usuário(s) </label></h4>
                        </div>
                        <?php while ($pagina = $admPagina->fetch(PDO::FETCH_ASSOC)): //prepara o conteúdo para ser listado ?>
                          <?php
                          $idUsuario = $pagina['idUsuario'];
                                  $nomeUsuario = busca_usuario($idUsuario); //consulta para trazer o nome do usuário dentro do while(for)
                                  $nomeUsuario = $nomeUsuario['usuMarca']; //retorna o @nomedousuario para exibir.
                                  $usuCadastrado = usuarioAdm($idPagina, $idUsuario);
                                  if($usuCadastrado['pm_post']>0){$post = '1.';$checkPost = 'checked';}else{$checkPost = '';$post = '';}
                                  if($usuCadastrado['pm_editar']>0){$editar = '2.';$checkEditar = 'checked';}else{$checkEditar = '';$editar = '';}
                                  if($usuCadastrado['pm_excluir']>0){$excluir = '3.';$checkExcluir = 'checked';}else{$checkExcluir = '';$excluir = '';}
                                  if($usuCadastrado['pm_cadastro']>0){$cadastro = '4.';$checkCadastro = 'checked';}else{$checkCadastro = '';$cadastro = '';}
                                  if($usuCadastrado['pm_financeiro']>0){$financeiro = '5.';$checkFinanceiro = 'checked';}else{$checkFinanceiro = '';$financeiro = '';}
                                  $nivel = ($post.$editar.$excluir.$cadastro.$financeiro);
                                  ?>
                                  <div class="">
                                    <p><b><?php echo $nomeUsuario ?></b> <small> (Adm nível: <?php echo $nivel ?>)</small></p>
                                  </div>
                                <?php endwhile; } ?>

                                <?php if($consulta['pm_editar'] > 0){ ?>
                                <input type="hidden" id="tipoPagina" value="<?php echo $tipoPagina ?>">
                                <div id="nomeAdm"></div>
                                <div id="adicionaAdm"></div>
                                <h5>Buscar usuários</h5>
                                <div id="buscaAdm" class="card-header-default">
                                  <input type="text" class="form-control" id="adm" placeholder="@nome">
                                </div>
                                <div id="respUsuario"></div>
                              </form>
                              <?php } ?>
                              <hr>

                            </div>
                          </div>
                        </div>
          </div>
          <div class="col-sm-6">
                       <div class="card ">
                        <div class="card-header card-header-primary">
                          <h4 class="card-title">Gerencimento de Torres</h4>
                          <p class="card-category">Gerenciamento</p>
                        </div>
                        <div class="card-body">
                          <p class="card-description">
                           <?php if($consulta['pm_editar'] > 0){ ?>
                           <h5 for="marca">Publicar direto em qual torre? </h5>
                           <?php while ($pagina = $paginaTorre->fetch(PDO::FETCH_ASSOC)): //prepara o conteúdo para ser listado ?>
                            <?php
                            $idTorre = $pagina['idTorre'];
                                $autorizado = verifica_pg_tr($idPagina, $idTorre); //verifica se tem autorização para publicar conteúdo
                                if($autorizado['retorno'] == 'aceito'){
                                  $torre = topo_torre($pagina['idTorre']);
                                  $nomePagina = palavraCurta(10,$torre['nomeTorre']);
                                  ?>
                                  <div class="form-group">
                                    <div class="switch__container">
                                      <p><?php echo $nomePagina ?></p>
                                      <?php  if($autorizado['ativar'] > 0) { ?>
                                      <input onclick="selTorre(<?php echo $pagina['idTorre'] ?>,<?php echo $idPagina ?>)" id="<?php echo $nomePagina ?>" class="switch switch--shadow" name="check_list[]" type="checkbox" value="paginaPHP" checked>
                                      <label for="<?php echo $nomePagina ?>"></label>
                                      <?php } else {   ?>
                                      <input onclick="selTorre(<?php echo $pagina['idTorre'] ?>,<?php echo $idPagina ?>)" id="<?php echo $nomePagina ?>" class="switch switch--shadow" name="check_list[]" type="checkbox" value="paginaPHP" >
                                      <label for="<?php echo $nomePagina ?>"></label>
                                      <?php } ?>
                                    </div>
                                  </div> 
                                  <?php } ?>
                                <?php endwhile; ?>
                                <?php } else { ?>
                                <label for="marca">Publicando nas torres </label>
                                <?php while ($pagina = $paginaTorre->fetch(PDO::FETCH_ASSOC)): //prepara o conteúdo para ser listado ?>
                                  <?php
                                  $idTorre = $pagina['idTorre'];
                                $autorizado = verifica_pg_tr($idPagina, $idTorre); //verifica se tem autorização para publicar conteúdo
                                if($autorizado['retorno'] == 'aceito'){
                                  $torre = topo_torre($pagina['idTorre']);
                                  $nomePagina = palavraCurta($torre['nomeTorre']);
                                  ?>
                                  <div class="form-group">
                                    <div class="switch__container">
                                      <p><?php echo $nomePagina ?></p>
                                      <?php  if($autorizado['ativar'] > 0) { ?>
                                      <input id="<?php echo $nomePagina ?>" class="switch switch--shadow" name="check_list[]" type="checkbox" value="paginaPHP" checked disabled>
                                      <label for="<?php echo $nomePagina ?>"></label>
                                      <?php } else {   ?>
                                      <input id="<?php echo $nomePagina ?>" class="switch switch--shadow" name="check_list[]" type="checkbox" value="paginaPHP" disabled >
                                      <label for="<?php echo $nomePagina ?>"></label>
                                      <?php } ?>
                                    </div>
                                  </div> 
                                  <?php } ?>
                                <?php endwhile; ?>
                                <?php } ?>
                                <hr>
                                <?php if($consulta['pm_editar'] > 0){ ?>
                                <h4><i class="fa fa-project-diagram"></i> Buscar torres</h4>
                                <input type="text" id="search-box" class="form-control" placeholder="Buscar torre" />
                                <div id="suggesstion-box"></div>
                                <?php } ?>
                              </p>
                            </div>
                          </div>
          </div>