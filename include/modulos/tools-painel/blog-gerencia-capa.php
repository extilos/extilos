              <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Foto de Capa</h4>
                    <p class="card-category">Alterar a foto de capa do blog</p>
                  </div>
                  <div class="card-body">
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