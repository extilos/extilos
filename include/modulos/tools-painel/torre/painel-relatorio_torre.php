<?php 
$idBusca = intval($_GET['cd']/251);
  $idLogado = $_SESSION['idLogado'];
 // $valida = verifica_usu_tr($idUsuario,$idBusca);
 // if($valida == 'erro'){
 //    header("Location: ../painel_usuario"); exit;
 // }
$dadosTorre = topo_torre($idBusca);
$totalBlogs   = conta_pagina_torre($idBusca);
$totalFans    = fans_total_torre($idBusca);
$totalPost    = total_post($idBusca);

?>
  <div class="col-sm-12">
          <?php 
            if(isset($_GET['tp'])){
              if($_GET['tp'] == 'adm_torre'){
                include_once 'include/modulos/tools-painel/usuario/blog-gerencia-usuario.php';
              }
              if($_GET['tp'] == 'capa_torre'){
                include_once 'include/modulos/tools-painel/torre/torre-gerencia-dados.php';
              }
              if($_GET['tp'] == 'fans_torre'){
                include_once 'include/modulos/tools-painel/fans/painel-lista_fans.php';
              }
              if($_GET['tp'] == 'post_torre'){
                include_once 'include/modulos/tools-painel/post/painel-lista_post.php';
              }
              if($_GET['tp'] == 'blog_torre'){
                include_once 'include/modulos/tools-painel/blog/painel-lista_blogs.php';
              }
              if($_GET['tp'] == 'dados_torre'){
                include_once 'include/modulos/tools-painel/apresentacao/blog-gerencia-apresentacao.php';
              }
              if($_GET['tp'] == 'categoria_torre'){
                include_once 'include/modulos/tools-painel/album/blog-gerencia-album.php';
              }
              if($_GET['tp'] == 'editar_album_torre'){
                include_once 'include/modulos/tools-painel/blog/painel-post_album.php';
              }
            } 
            ?> 
          </div>
			<div class="row col-sm-12">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">location_city</i>
                  </div>
                  <p class="card-category"></p>
                  <h3 class="card-title"><?php echo $totalFans ?>/2
                    <br><small>Dados</small>
                  </h3>
                </div>
                <div class="card-footer">
                    <a href="editar_torre&nm=<?php echo $dadosTorre['nomeTorre'].'&cd='.($idBusca*251).'&tp=capa_torre'?>" class="btn btn-info btn-sm btn-block">Editar</a>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">location_city</i>
                  </div>
                  <p class="card-category"></p>
                  <h3 class="card-title"><?php echo $totalFans ?>
                    <br><small>Fans</small>
                  </h3>
                </div>
                <div class="card-footer">
                    <a href="editar_torre&nm=<?php echo $dadosTorre['nomeTorre'].'&cd='.($idBusca*251).'&tp=fans_torre'?>" class="btn btn-info btn-sm btn-block">Editar</a>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">location_city</i>
                  </div>
                  <p class="card-category"></p>
                  <h3 class="card-title"><?php echo $totalBlogs ?>
                    <br><small>Blogs</small>
                  </h3>
                </div>
                <div class="card-footer">
                    <a href="editar_torre&nm=<?php echo $dadosTorre['nomeTorre'].'&cd='.($idBusca*251).'&tp=blog_torre'?>" class="btn btn-info btn-sm btn-block">Editar</a>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">location_city</i>
                  </div>
                  <p class="card-category"></p>
                  <h3 class="card-title"><?php echo $totalPost ?>
                    <br><small>Post</small>
                  </h3>
                </div>
                <div class="card-footer">
                    <a href="editar_torre&nm=<?php echo $dadosTorre['nomeTorre'].'&cd='.($idBusca*251).'&tp=post_torre'?>" class="btn btn-info btn-sm btn-block">Editar</a>
                </div>
              </div>
            </div>
            
          </div>
          