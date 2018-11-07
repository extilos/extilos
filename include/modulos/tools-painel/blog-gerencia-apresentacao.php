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
                  </div>
                </div>