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