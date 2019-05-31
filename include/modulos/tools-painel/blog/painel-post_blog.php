<?php

    // busca os post relacionado a esta torre
$idBusca = intval($_GET['cd']/251);
$tipoBusca = 'blog';
$ordem = 1;
//calculo para exibição
$qtdExibida = isset($_GET['qtde']) ? $_GET['qtde'] : 5;
$qtdSolicita = total_post_usuario($idLogado);


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
$qtdPaginas = intval($numPaginas/$qtdExibida)+ 1;
    //echo $_GET['cd'];
?>
<div class="" id="lista_post">
          <div class="card">
                    <div class="card-header card-header-tabs card-header-danger" >
                      <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                          <div class="text-right" >
                    <a class="btn btn-sm btn-primary" onclick="history.go(-1)">Voltar</a>
                  </div>
                          <span class="nav-tabs-title">Pg:</span>    
                          <ul class="nav nav-tabs" data-tabs="tabs">
                            <li class="nav-item">
                              <a class="nav-link active" href="#profile" data-toggle="tab">
                                 0
                                <div class="ripple-container"></div>
                              </a>
                            </li>
                            <?php for ($i = 1; $i < $qtdPaginas ; $i++) { ?>
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
            <div class="card-body table-responsive">
              <div class="tab-content">
                <div class="tab-pane active" id="profile">
                  <table class="table">
                    <thead class="text-warning text-center">
                      <th>Título</th>
                      <th COLSPAN="5">Imagens</th>
                      <th COLSPAN="2">Curtidas</th>
                      <th COLSPAN="2">Visitas</th>
                      <th>Denúncias</th>
                      <th>Data</th>
                      <th>Excluir</th>
                    </thead>
                    <tbody class="text-center">
                      <?php
                      if(!isset($json)){
                        echo '<td>Vazio</td>';
                      }else{
                        $a = 0;
                        foreach(array_slice($json, $inicio, $qtdExibida) as $registro){ 

                          $img = isset($registro->img) ? $registro->img : 'semimagem.jpg';
                          $img1 = isset($registro->img1) ? $registro->img1 : 'semimagem.jpg';
                          $img2 = isset($registro->img2) ? $registro->img2 : 'semimagem.jpg';
                          $img3 = isset($registro->img3) ? $registro->img3 : 'semimagem.jpg';
                          $img4 = isset($registro->img4) ? $registro->img4 : 'semimagem.jpg';
                          ?>
                          <tr>
                              <?php 
                              $a++

                              ?>
                              
                              <td><?php echo $registro->usuTitulo.$registro->postagem ?></td>
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
                              <td><?php echo $registro->data_post ?></td>
                              <td>
                                <div class="form-check">
                                  <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" 
                                 onclick="ativarPost('<?php echo $registro->postagem ?>','<?php echo $idBusca ?>','<?php echo 'checkExcluir'.$registro->idPost ?>','excluir_blog','1')"
                                    id="<?php echo 'checkExcluir'.$registro->idPost ?>">
                                    <span class="form-check-sign">
                                      <span class="check"></span>
                                    </span>
                                  </label>
                                </div>
                              </td>
                            </tr>                   
                          <?php } } ?>
                        </tbody>
                      </table>
                   </div>



          <?php 
           for ($i = 1; $i < $qtdPaginas  ; $i++) { 

              $inicio = $qtdExibida * $i;

            ?>
             
                <div class="tab-pane" id="<?php echo $i ?>">
                  <table class="table">
                    <thead class="text-warning text-center">
                      <th>Data</th>
                      <th>Título</th>
                      <th COLSPAN="5">Imagens</th>
                      <th COLSPAN="2">Curtidas</th>
                      <th COLSPAN="2">Visitas</th>
                      <th>Denúncias</th>
                      <th>Excluir</th>
                    </thead>
                    <tbody class="text-center">
                      <?php
                      if(!isset($json)){
                        echo '<td>Vazio</td>';
                      }else{
                        $a = 0;
                        foreach(array_slice($json, $inicio, $qtdExibida) as $registro){ 

                          $img = isset($registro->img) ? $registro->img : 'semimagem.jpg';
                          $img1 = isset($registro->img1) ? $registro->img1 : 'semimagem.jpg';
                          $img2 = isset($registro->img2) ? $registro->img2 : 'semimagem.jpg';
                          $img3 = isset($registro->img3) ? $registro->img3 : 'semimagem.jpg';
                          $img4 = isset($registro->img4) ? $registro->img4 : 'semimagem.jpg';
                          ?>
                          <tr>
                             
                              <?php 
                              $a++

                              ?>
                              <td><?php echo $registro->data_post.$a ?></td>
                              <td><?php echo $registro->usuTitulo.$registro->postagem ?></td>
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
                                 onclick="ativarPost('<?php echo $registro->postagem ?>','<?php echo $idBusca ?>','<?php echo 'checkExcluir'.$registro->idPost ?>','excluir_blog','1')"
                                    id="<?php echo 'checkExcluir'.$registro->idPost ?>">
                                    <span class="form-check-sign">
                                      <span class="check"></span>
                                    </span>
                                  </label>
                                </div>
                              </td>
                             
                            </tr>
                          <?php } } ?>
                        </tbody>
                      </table>
                   </div>
                   <?php } ?> 
                </div>
            </div>
            </div>
          </div>