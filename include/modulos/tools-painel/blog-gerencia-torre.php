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