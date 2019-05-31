<?php
if(isset($_GET['tp'])){	
  $idBusca = intval($_GET['cd']/251);
  $dataAtual = date('d-m-Y');
  $listaUsers = usersAdmistra($idBusca);
  $usuMarca = $usuario['usuMarca'];
  $idTorre = $idBusca;
  $idPagina = 0;
  $tipoPagina = 0;
  $local = 'Lista de Administradores ';
}else{
  header("Location: blog_fa"); exit;
}
?>
<div class="col-md-12">
  <div class="card">
    <div class="card-header card-header-warning">
      <div class="text-right" >
        <a class="btn btn-sm btn-primary" onclick="history.go(-1)">Voltar</a>
        <a class="btn btn-sm btn-success" onclick="history.go(0)">Atualizar</a>
      </div>
      <h4 class="card-title"><?php  echo $local ?></h4>
      <p class="card-category">Administrado por <?php echo $usuMarca ?></p>
    </div>
    <div class="card-body table-responsive">
     <form class="navbar-form"  method="post" id="formADM" enctype="multipart/form-data">
      <input type="hidden" name="idPagina" id="idPagina" value="<?php echo $idBusca ?>">
      <input type="hidden" id="tipoPagina" value="<?php echo $tipoPagina ?>">
      <div class="input-group no-border">
        <input type="hidden" id="buscaAdm" value="<?php echo $idTorre ?>">
        <input type="text" id="adm" class="form-control" placeholder="Buscar Usuários">
      </div>
      <div id="nomeAdm"></div>
      <div id="adicionaAdm"></div>
    </form>
    <div id="respUsuario">
      <table class="table table-hover">
        <thead class="text-warning">
          <th>Foto</th>
          <th>Nome</th>
          <th>UF</th>
          <th>Cidade</th>
          <th>Email</th>
          <th title="Autoriza publicar conteúdos no Blog">Post</th>
          <th title="Autoriza responder e alterar conteúdos do Blog">Editar</th>
          <th title="Autoriza excluir comentários e conteúdos do Blog">Excluir</th>
          <th title="Autoriza gerenciar cadastro de Usuarios, Blogs e Torres">Cadastro</th>
          <th title="Autoriza gerenciar decisões relacionada ao financeiro">Financeiro</th>
        </thead>
        <tbody>
          <?php
          $json_blog = json_decode($listaUsers);
          if(!isset($json_blog)){
            echo '<td>Vazio</td>';
          }else{
            foreach(array_slice($json_blog, 0, 10) as $lista_blog){
             // $dataPassado = date('d-m-Y', strtotime('-2 days'));
             // if(strtotime($lista_blog->pgData) >= strtotime($dataPassado)) {
             //   $novo = '<img src="../imagem/sistema/new.jpg" class="img-responsive" style="height: 25px">';
             // }else{
             //   $novo = '';
             // }
              ?>
              <form action="editar_fans" method="post">
                <input type="hidden" name="idPagina" value="<?php echo $lista->idUsuario  ?>">
                <tr>
                  <td><img src="../imagem/user/<?php echo $lista_blog->usuFoto ?>" alt="" class="img-responsive" style="height: 50px" >
                  </td>
                  <td><?php echo $lista_blog->nomeUsuario ?></td>
                  <td><?php echo $lista_blog->usuEstado ?></td>
                  <td><?php echo $lista_blog->usuCidade ?></td>
                  <td><?php echo $lista_blog->usuMarca ?></td>
                  <td class="text-center">
                    <?php if($lista_blog->pm_post > 0){ ?>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" 
                              onclick="ativarPostAdm('<?php echo $lista_blog->idPermite ?>','postAdm','atualiza','<?php echo 'postAdm'.$lista_blog->idPermite ?>')"
                              id="<?php echo 'postAdm'.$lista_blog->idPermite ?>" checked="true">
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                    <?php }else{ ?>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" 
                              onclick="ativarPostAdm('<?php echo $lista_blog->idPermite ?>','postAdm','atualiza','<?php echo 'postAdm'.$lista_blog->idPermite ?>')"
                              id="<?php echo 'postAdm'.$lista_blog->idPermite ?>" >
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                    <?php } ?>
               </td>
                <td class="text-center">
                 <?php if($lista_blog->pm_editar > 0){ ?>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" 
                              onclick="ativarPostAdm('<?php echo $lista_blog->idPermite ?>','editarAdm','atualiza','<?php echo 'editarAdm'.$lista_blog->idPermite ?>')"
                              id="<?php echo 'editarAdm'.$lista_blog->idPermite ?>" checked="true">
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                    <?php }else{ ?>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" 
                              onclick="ativarPostAdm('<?php echo $lista_blog->idPermite ?>','editarAdm','atualiza','<?php echo 'editarAdm'.$lista_blog->idPermite ?>')"
                              id="<?php echo 'editarAdm'.$lista_blog->idPermite ?>" >
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                    <?php } ?>
                </td>
                <td class="text-center">
                  <?php if($lista_blog->pm_excluir > 0){ ?>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" 
                              onclick="ativarPostAdm('<?php echo $lista_blog->idPermite ?>','excluirAdm','atualiza','<?php echo 'excluirAdm'.$lista_blog->idPermite ?>')"
                              id="<?php echo 'excluirAdm'.$lista_blog->idPermite ?>" checked="true">
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                    <?php }else{ ?>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" 
                              onclick="ativarPostAdm('<?php echo $lista_blog->idPermite ?>','excluirAdm','atualiza','<?php echo 'excluirAdm'.$lista_blog->idPermite ?>')"
                              id="<?php echo 'excluirAdm'.$lista_blog->idPermite ?>" >
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                    <?php } ?>
                </td>
                <td class="text-center">
                    <?php if($lista_blog->pm_cadastro > 0){ ?>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" 
                              onclick="ativarPostAdm('<?php echo $lista_blog->idPermite ?>','cadastroAdm','atualiza','<?php echo 'cadastroAdm'.$lista_blog->idPermite ?>')"
                              id="<?php echo 'cadastroAdm'.$lista_blog->idPermite ?>" checked="true">
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                    <?php }else{ ?>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" 
                              onclick="ativarPostAdm('<?php echo $lista_blog->idPermite ?>','cadastroAdm','atualiza','<?php echo 'cadastroAdm'.$lista_blog->idPermite ?>')"
                              id="<?php echo 'cadastroAdm'.$lista_blog->idPermite ?>" >
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                    <?php } ?>
                </td>
                <td class="text-center">
                  <?php if($lista_blog->pm_financeiro > 0){ ?>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" 
                              onclick="ativarPostAdm('<?php echo $lista_blog->idPermite ?>','financeiroAdm','atualiza','<?php echo 'financeiroAdm'.$lista_blog->idPermite ?>')"
                              id="<?php echo 'financeiroAdm'.$lista_blog->idPermite ?>" checked="true">
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                    <?php }else{ ?>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="form-check-input" type="checkbox" 
                              onclick="ativarPostAdm('<?php echo $lista_blog->idPermite ?>','financeiroAdm','atualiza','<?php echo 'financeiroAdm'.$lista_blog->idPermite ?>')"
                              id="<?php echo 'financeiroAdm'.$lista_blog->idPermite ?>" >
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                    <?php } ?>
                </td>
     </tr>
   </form>
 <?php } } ?>
</tbody>
</table>
</div>
</div>
</div>
</div>
            <!--
            <div class="col-md-4">
            <div class="col-md-12">
              <div class="card card-profile">
                <div class="card-body">
                  <h6 class="card-category text-gray">Gratuíto</h6><hr>
                  <p class="card-description">
                    03 Moderadores<br>
                    Recebe 50% do valor das publicidades <br>
                    Participar de até 10 torres <br>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card card-profile">
                <div class="card-body">
                  <h6 class="card-category text-gray">Profissional | <b>R$20,00 anual</b></h6><hr>
                  <p class="card-description">
                    Moderadores Ilimitados<br>
                    Recebe 80% do valor das publicidades<br>
                    Participar de até 10 torres<br>
                    Publicar Produtos<br>
                    Controle de Dados<br>
                    Painel de Clientes<br>

                  </p>
                </div>
              </div>
            </div>
            </div> -->