<?php
	$idBusca = intval($_GET['cd']/251);
  $idLogado = $_SESSION['idLogado'];
  $valida = verifica_usu_pg($idUsuario,$idBusca);
  if($valida == 'erro'){
     header("Location: ../painel_usuario"); exit;
  }
  $totalFans = fans_total($idBusca);
  $totalTorres = conta_torre_pagina($idBusca);
  $totalPost = total_post_pagina($idBusca);
  $totalAdm = adm_total($idBusca);
  

  $blog = busca_blog($idBusca); // faz consulta no conexoes.php para saber qual a página(blog) pelo id informado
  
  //$criadorPagina = $blog['idUsuario']; //retorna o id do usuário que criou a página
  //$arrobaCriador = busca_usuario($criadorPagina); //retorna informações do usuário criador da página
  //


?>
<input type="hidden" name="idPagina" id="idPagina" value="<?php echo $idBusca ?>">
  		<div class="row">
          <div class="col-sm-12">
          <?php 
            if(isset($_GET['tp'])){
              if($_GET['tp'] == 'adm_blog'){
                include_once 'include/modulos/tools-painel/usuario/blog-gerencia-usuario.php';
              }
              if($_GET['tp'] == 'capa_blog'){
                include_once 'include/modulos/tools-painel/capa/blog-gerencia-capa.php';
              }
              if($_GET['tp'] == 'fans_blog'){
                include_once 'include/modulos/tools-painel/fans/painel-lista_fans.php';
              }
              if($_GET['tp'] == 'post_blog'){
                include_once 'include/modulos/tools-painel/blog/painel-post_blog.php';
              }
              if($_GET['tp'] == 'torre_blog'){
                include_once 'include/modulos/tools-painel/torre/painel-lista_torre.php';
              }
              if($_GET['tp'] == 'dados_blog'){
                include_once 'include/modulos/tools-painel/apresentacao/blog-gerencia-apresentacao.php';
              }
              if($_GET['tp'] == 'categoria_blog'){
                include_once 'include/modulos/tools-painel/album/blog-gerencia-album.php';
              }
              if($_GET['tp'] == 'editar_album_blog'){
                include_once 'include/modulos/tools-painel/blog/painel-post_album.php';
              }
            } 
            ?> 
          </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">location_city</i>
                  </div>
                  <p class="card-category"></p>
                  <h3 class="card-title"><?php echo $totalTorres ?>/10
                    <br><small>Torres</small>
                  </h3>
                </div>
                <div class="card-footer">
                    <a href="editar_blog&nm=<?php echo $_GET['nm'].'&cd='.($idBusca*251).'&tp=torre_blog'?>" class="btn btn-info btn-sm btn-block">Editar</a>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">favorite</i>
                  </div>
                  <p class="card-category"></p>
                  <h3 class="card-title"><?php echo $totalFans ?>/∞
                    <br><small>Fãs</small>
                  </h3>
                </div>
                <div class="card-footer">
                    <a href="editar_blog&nm=<?php echo $_GET['nm'].'&cd='.($idBusca*251).'&tp=fans_blog'?>" class="btn btn-info btn-sm btn-block">Editar</a>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">photo_library</i>
                  </div>
                  <p class="card-category"></p>
                  <h3 class="card-title"><?php echo $totalPost ?>/∞
                  <br><small>Postagens</small>
                  </h3>
                </div>
                <div class="card-footer">
                    <a href="editar_blog&nm=<?php echo $_GET['nm'].'&cd='.($idBusca*251).'&tp=post_blog'?>" class="btn btn-info btn-sm btn-block">Editar</a>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">vpn_key</i>
                  </div>
                  <?php if($blog['tipoPagina'] > 0){$n='20';}else{$n='5';} ?>
                  <p class="card-category"></p>
                  <h3 class="card-title"><?php echo $totalAdm.'/'.$n ?>
                  <br><small>Adm</small>
                  </h3>
                </div>
                <div class="card-footer">
                    <a href="editar_blog&nm=<?php echo $_GET['nm'].'&cd='.($idBusca*251).'&tp=adm_blog'?>" class="btn btn-info btn-sm btn-block">Editar</a>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">panorama</i>
                  </div>
                  <p class="card-category"></p>
                  <h3 class="card-title"> 1/1
                  <br><small>Capa</small>
                  </h3>
                </div>
                <div class="card-footer">
                    <a href="editar_blog&nm=<?php echo $_GET['nm'].'&cd='.($idBusca*251).'&tp=capa_blog'?>" class="btn btn-info btn-sm btn-block">Editar</a>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">notes</i>
                  </div>
                  <?php $tt = dados_porcentagem($idBusca); ?>
                  <p class="card-category"></p>
                  <h3 class="card-title"><?php echo $tt; ?>/5
                  <br><small>Dados</small>
                  </h3>
                </div>
                <div class="card-footer">
                    <a href="editar_blog&nm=<?php echo $_GET['nm'].'&cd='.($idBusca*251).'&tp=dados_blog'?>" class="btn btn-info btn-sm btn-block">Editar</a>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">favorite</i>
                  </div>
                  <p class="card-category"></p>
                  <h3 class="card-title"><?php echo album_total_blog($idBusca) ?>/10
                    <br><small>Albuns</small>
                  </h3>
                </div>
                <div class="card-footer">
                    <a href="editar_blog&nm=<?php echo $_GET['nm'].'&cd='.($idBusca*251).'&tp=categoria_blog'?>" class="btn btn-info btn-sm btn-block">Editar</a>
                </div>
              </div>
            </div>

            
          </div>
         
          