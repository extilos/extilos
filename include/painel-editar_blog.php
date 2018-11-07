<?php
if (isset($_POST['idPagina'])){
              $idPagina = $_POST['idPagina']; // busca do post o id do blog
            }else{
              header("Location: meus_blogs"); exit;
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
            $botaoEdit  = isset($_POST['botaoEdit'])  ? $_POST['botaoEdit'] : null;
            $botaoFans  = isset($_POST['botaoFans'])  ? $_POST['botaoFans'] : null;
            $botaoRelat  = isset($_POST['botaoRelat'])  ? $_POST['botaoRelat'] : null;

            $totalBlogs =  fans_total($_POST['idPagina']);
            ?>

      <div class="container-fluid">
        <?php if($botaoRelat!=null){
            include 'painel-relatorio_blog.php'; 
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
              include 'painel-lista_fans.php';
              }
            ?>
        </div>
      </div>