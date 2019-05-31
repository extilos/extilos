<?php
    $qtdExibida = 30;
    $qtdSolicita = 30;
    // busca os post relacionado a esta torre
    $idBusca = intval($_GET['cd']/251);
    $tipoBusca = 'blog';
    $ordem = 1;

    if (isset($_GET['pgAtual'])){
        $inicio = (($_GET['pgAtual'] * $qtdExibida) - $qtdExibida);
        $fim = $qtdSolicita;
    }else{
        $inicio = 0;
        $fim = $qtdSolicita;
    }
    $torre_post = buscar_post($idBusca, $tipoBusca, $inicio, $fim, $ordem);
    	// Decodifica o formato JSON e retorna um Objeto
    $json = json_decode($torre_post);
        // conta quantos registros existem no json
   	$numPaginas = count($json);
   	//echo $_GET['cd'];

?>
        <div class="col-lg-12 col-md-12" id="lista_post">
              <div class="card">
                <div class="card-header card-header-tabs card-header-danger" >

                <div class="text-right" >
                    <a class="btn btn-sm btn-warning" onclick="history.go(-1)">Voltar</a>
                    <a class="btn btn-sm btn-info" onclick='history.go(0)'>Atualizar</a>
                  </div>
                  <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                      <span class="nav-tabs-title">Postagens:</span>		
                      <ul class="nav nav-tabs" data-tabs="tabs">
                        <li class="nav-item">
                          <a class="nav-link active" href="#profile" data-toggle="tab">
                            <i class="material-icons">check_circle_outline</i> Ativa
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#messages" data-toggle="tab">
                            <i class="material-icons">help_outline</i> Para Ativar
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#settings" data-toggle="tab">
                            <i class="material-icons">cloud</i> Server
                            <div class="ripple-container"></div>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="card-body table-responsive">
                  <div class="tab-content">
                    <div class="tab-pane active" id="profile">
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
                          if($valida_json[0]->blog_excluido == 0){
                            if($valida_json[0]->blog_liberado > 0){
                            	
                          ?>
                            <tr>
                              <td>
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" 
                                  onclick="ativarPost('<?php echo $registro->idPost ?>','<?php echo $idBusca ?>','<?php echo 'checkDesativar'.$registro->idPost ?>','libera_blog','1')"
                                    id="<?php echo 'checkDesativar'.$registro->idPost ?>" checked="true">
                                    <span class="form-check-sign">
                                      <span class="check"></span>
                                    </span>
                                  </label>
                                </div>
                              </td>
                              <td><?php echo $registro->usuTitulo ?></td>
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
                              <td><small><i class="material-icons" title="Verificar denúcias" style="color:#ef8300">warning</i><?php echo total_denuncia($registro->idPost) ?></small></td>
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
                            </tr>
                          <?php } } } }?>
                        </tbody>
                      </table>
                      <div class="text-center">
			                <ul class="pagination">
			                    <?php
			                    $qtdPaginacao = 6;
			                    $pgAtual = isset($_GET['pgAtual']) ? $_GET['pgAtual'] : 1;
			                    $paginacao = paginacao($numPaginas, $qtdExibida, $pgAtual, $qtdPaginacao);

			                    if(isset($_GET['cd'])){
			                        echo '<li><a class="btn btn-sm btn-danger" href="'.$_SERVER["REQUEST_URI"].'&pgAtual=1#hot">&laquo;</a></li>';
			                        for ($pgA = $paginacao[0]; $pgA < $paginacao[1]; $pgA++){
			                            echo '<li><a class="btn btn-sm btn-danger" href="'.$_SERVER["REQUEST_URI"].'&pgAtual='.$pgA.'#hot">'.$pgA.'</a></li>';
			                        }
			                        echo '<li><a class="btn btn-sm btn-danger" href="'.$_SERVER["REQUEST_URI"].'&pgAtual='.$paginacao[2].'#hot">&raquo;</a></li>';
			                    }else{
			                        echo '<li><a class="btn btn-sm btn-danger" href="/extilos/'.$_GET['pg'].'&pgAtual=1#hot">&laquo;</a></li>';
			                        for ($pgA = $paginacao[0]; $pgA < $paginacao[1]; $pgA++){
			                            echo '<li><a class="btn btn-sm btn-danger" href="/extilos/'.$_GET['pg'].'&pgAtual='.$pgA.'#hot">'.$pgA.'</a></li>';
			                        }
			                        echo '<li><a class="btn btn-sm btn-danger" href="/extilos/'.$_GET['pg'].'&pgAtual='.$paginacao[2].'#hot">&raquo;</a></li>';
			                    }
			                    ?>
			                </ul>
			        </div>
                    </div>
                    
                    <div class="tab-pane" id="messages">
                      <table class="table table-hover">
                          <thead class="text-warning text-center">
                              <th>Publicar</th>
                              <th>Título</th>
                              <th>Usuario</th>
                              <th>UF</th>
                              <th>Cidade</th>
                              <th COLSPAN="2">Curtidas</th>
                              <th COLSPAN="2">Visitas</th>
                              <th>Denúncias</th>
                              <th>Excluir</th>
                              <th>Feramentas</th>
                          </thead>
                        <tbody class="text-center">
                            <?php
                            if(!isset($json)){
                            echo '<td>Vazio</td>';
                            }else{
                            foreach(array_slice($json, $inicio, $qtdExibida) as $registro){ 
                              $valida = validar_post($registro->postagem, $idBusca, $tipoBusca);
                              $valida_json = json_decode($valida);
                            if($valida_json[0]->blog_excluido == 0){
                              if($valida_json[0]->blog_liberado == 0){
                            ?>
                              <tr>
                                <td>
                                  <div class="form-check">
                                    <label class="form-check-label">
                                      <input class="form-check-input"
                                      onclick="ativarPost('<?php echo $registro->idPost ?>','<?php echo $idBusca ?>','<?php echo 'checkAtivar'.$registro->idPost ?>','libera_blog','0')" type="checkbox" id="<?php echo 'checkAtivar'.$registro->idPost ?>" >
                                      <span class="form-check-sign">
                                        <span class="check"></span>
                                      </span>
                                    </label>
                                  </div>
                                </td>
                                <td><?php if($registro->usuTitulo>''){ echo $registro->usuTitulo; }  ?></td>
                                <td><?php if($registro->arrobaUsuario>''){echo $registro->arrobaUsuario;} ?></td>
                                <td><?php if($registro->estadoPost>''){echo $registro->estadoPost;} ?></td>
                                <td><?php if($registro->nomeTorre)>''{echo $registro->nomeTorre;} ?></td>
                                <td><small><i class="material-icons" style="color:#000991">thumb_up_alt</i> <?php echo total_like($registro->idPost) ?></small></td>
                                <td><small><i class="material-icons" style="color:#ed0000">thumb_down_alt</i> <?php echo total_deslike($registro->idPost) ?></small> </td>
                                <td><small><i class="material-icons" title="Usuários logados" style="color:#303030">person</i><?php echo total_visitas_user($registro->idPost) ?></small></td>
                                <td><small><i class="material-icons" title="Visitantes não logados" style="color:#494949">perm_identity</i><?php echo total_visitas($registro->idPost) ?></small></td>
                                <td><small><i class="material-icons" title="Verificar denúcias" style="color:#ef8300">warning</i><?php echo total_denuncia($registro->idPost) ?></small></td>
                                <td>
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" 
                                  onclick="ativarPost('<?php echo $registro->idPost ?>','<?php echo $idBusca ?>','<?php echo 'checkDesativar'.$registro->idPost ?>','excluir','0')"
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
                                  onclick="ativarPost('<?php echo $registro->idPost ?>','<?php echo $idBusca ?>','<?php echo 'checkDenuncia'.$registro->idPost ?>','denuncia','0')"
                                    id="<?php echo 'checkDenuncia'.$registro->idPost ?>">
                                    <span class="form-check-sign">
                                      <span class="check"></span>
                                    </span>
                                  </label>
                                </div>
                              </td>
                              </tr>
                            <?php } } } }?>
                        </tbody>
                      </table>
                    </div>
                    <div class="tab-pane" id="settings">
                      <table class="table">
                        <tbody>
                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="">
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                            <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">edit</i>
                              </button>
                              <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">close</i>
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                            <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                            </td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">edit</i>
                              </button>
                              <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">close</i>
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="" checked>
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                            </td>
                            <td>Sign contract for "What are conference organizers afraid of?"</td>
                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                <i class="material-icons">edit</i>
                              </button>
                              <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">close</i>
                              </button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>