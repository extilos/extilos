<?php
/**
		if (isset($_GET['cd'])){
            $idPagina = $_GET['cd']; // busca do post o id do blog
        }else{
            //  header("Location: meus_blogs"); exit;
            }
            $blog = busca_blog($idPagina); // faz consulta no conexoes.php para saber qual a página(blog) pelo id informado
            $idPagina = $blog['idPagina']; //retorna o id da página(blog)
            $criadorPagina = $blog['idUsuario']; //retorna o id do usuário que criou a página
            $arrobaCriador = busca_usuario($criadorPagina); //retorna informações do usuário criador da página
            $tipoPagina = $blog['tipoPagina']; //faz as verificalão se a página é gratuíta ou profissional
            $consulta = verifica_usu_pg($idUsuario, $idPagina); // faz as verificações de autorização do usuário X página
            $admPagina = usersAdm($idPagina); //pega os usuários que administram a página
            $paginaTorre = pagina_torre($idPagina); // buscam as torres que a página participa
            $quantAdm = adm_total($idPagina); // consulta a quantidade de admininstradores na página
            if ($blog['tipoPagina']>0){
              $tipoPg = 'Profissional';
            }else{
              $tipoPg = 'Gratuíto';
            }
            //POST
            if($_GET['tp'] == 'post_blog'){
      				$botaoPost = $_GET['tp'];
      			}else{
      				$botaoPost = null;
      			}
            //EDIT
            if($_GET['tp'] == 'edit_blog'){
              $botaoEdit = $_GET['tp'];
            }else{
              $botaoEdit = null;
            }
            //FANS
            if($_GET['tp'] == 'fans_blog'){
              $botaoFans = $_GET['tp'];
            }else{
              $botaoFans = null;
            }
            //RELAT
            if($_GET['tp'] == 'relat_blog'){
              $botaoRelat = $_GET['tp'];
            }else{
              $botaoRelat = null;
            }
            //ADMINISTRADORES
            if($_GET['tp'] == 'adm_blog'){
              $botaoAdm = $_GET['tp'];
            }else{
              $botaoAdm = null;
            }
            //TORRE
            if($_GET['tp'] == 'torre_blog'){
              $botaoTorre = $_GET['tp'];
            }else{
              $botaoTorre = null;
            }

            $totalBlogs =  fans_total($idPagina);
            ?>

      <div class="container-fluid">
        <?php if($botaoRelat!=null){
            include 'modulos/tools-painel/painel-relatorio_blog.php'; 
         } ?>
        <div class="row" id="lista_blog">
            <?php 
            if($botaoEdit!=null){
              include 'painel-gerencia_blog.php';
              }
            ?>
        </div>
        <div class="row" id="lista_fans">
            <?php 
            if($botaoFans!=null){
              include 'modulos/tools-painel/painel-lista_fans.php';
              }
            ?>
        </div>
        <div class="row" id="lista_post">
            <?php 
            if($botaoPost!=null){
              include 'modulos/tools-painel/blog-lista-post.php';
              }
            ?>
        </div>
        <div class="row" id="lista_adm">
            <?php 
            if($botaoAdm!=null){
              include 'modulos/tools-painel/painel-lista_usuario.php';
              }
            ?>
        </div>
        <div class="row" id="lista_torre">
            <?php 
            if($botaoTorre!=null){
              include 'modulos/tools-painel/painel-lista_torre.php';
              }
            ?>
        </div>
      </div>