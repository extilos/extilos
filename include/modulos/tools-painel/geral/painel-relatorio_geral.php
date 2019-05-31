<?php
$idLogado = $_SESSION['idLogado'];
$idBusca = $idLogado;
// dados da torre
$idTorre = isset($_POST['idTorre']) ? $_POST['idTorre'] : null;
$totalBlogs = conta_pagina_torre($idTorre);
$totalFans = fans_total_torre($idTorre);
if($totalBlogs==''){$totalBlogs = '0';}
if($totalFans==''){$totalFans = '0';}
?>
<div class="">
          <div >
          <?php 
            if(isset($_GET['tp'])){
              if($_GET['tp'] == 'lista_blog_adm'){
                include_once 'include/modulos/tools-painel/geral/painel-blog_geral.php';
              }
              if($_GET['tp'] == 'lista_post_adm'){
                include_once 'include/modulos/tools-painel/usuario/post_lista.php';
              }
            } 
            ?> 
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">bookmark</i>
                  </div>
                  <p class="card-category">Participando</p>
                  <h3 class="card-title"><?php echo adm_blog_total($idLogado) ?>/5
                    <br><small>Blogs</small>
                  </h3>
                </div>
                <div class="card-footer">
                    <a href="editar_user&nm=<?php echo $_SESSION['nomeLogado'].'&cd='.($idBusca*251).'&tp=lista_blog_adm'?>" class="btn btn-info btn-sm btn-block">Editar</a>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                  </div>
                  <p class="card-category">Publicou</p>
                  <h3 class="card-title"><?php echo total_post_usuario($idLogado) ?>
                    <br><small>Post</small>
                  </h3>
                </div>
                <div class="card-footer">
                    <a href="editar_user&nm=<?php echo $_SESSION['nomeLogado'].'&cd='.($idBusca*251).'&tp=lista_post_adm'?>" class="btn btn-info btn-sm btn-block">Editar</a>
                </div>
              </div>
            </div>
            <!-- div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">question_answer</i>
                  </div>
                  <p class="card-category">Participando</p>
                  <h3 class="card-title"><?php // echo total_comentarios_user($idLogado) ?>
                    <br><small>Mensagens</small>
                  </h3>
                </div>
                <div class="card-footer">
                    <a href="editar_blog&nm=<?php // echo $_GET['nm'].'&cd='.($idBusca*251).'&tp=categoria_blog'?>" class="btn btn-info btn-sm btn-block">Editar</a>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">question_answer</i>
                  </div>
                  <p class="card-category">Participando</p>
                  <h3 class="card-title"><?php  ?>
                    <br><small>Mensagens</small>
                  </h3>
                </div>
                <div class="card-footer">
                    <a href="editar_blog&nm=<?php // echo $_GET['nm'].'&cd='.($idBusca*251).'&tp=categoria_blog'?>" class="btn btn-info btn-sm btn-block">Editar</a>
                </div>
              </div>
            </div -->
          </div>

          
        </div>
        