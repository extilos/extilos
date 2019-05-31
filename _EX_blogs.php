<?php
// TEMPO DE CARREGAMENTO DE PÁGINA
$executionStartTime = microtime(true);
$nomeBlog = sanitizeStringlight($url[1]);
$buscaBlog = busca_nome_blog($nomeBlog);
//$idPaginaAtual = $buscaBlog['idPagina'];
$idPagina = $buscaBlog['idPagina'];
$idTorre = 0;
if (isset($_SESSION['idLogado'])){
  $idLogado = $_SESSION['idLogado'];
// verifica se usuário logado é gerenciador do blog
  $verificaUsuario = usuarioAdm($buscaBlog['idPagina'],$idLogado);
}

?>
    <div class="container-fluid row no-gutters">
        <div id="content" class="card">
            <?php 
            //MÓDULO DE EXIBIÇÃO DE POSTAGENS
            require 'include/modulos/front/universal/exibe_postagens.php';
            //BARRA SUPERIOR - PAGINA BLOG
            include 'include/modulos/front/blog/blog-topo.php'; 
            include_once 'include/modal.php';
                   // echo $tokenDia.'token';
                   // echo $idPagina.'pagina';
                   // echo $idTorre.'torre';
            ?>
            <?php if(!isset($_GET['pag'])){ // VERIFICAÇÃO PARA NAVEGAÇÃO DENTRO DO BLOG
                include 'include/modulos/front/blog/blog-inicio.php'; ?>
            <?php }else{ ?>
                <?php if($_GET['pag'] == 'fotos'){ // CONDIÇÃO BOTÃO PUBLICAÇÕES GET[PAG] 
                    include 'include/modulos/front/blog/blog-fotos.php';
                    }
                ?>
                <?php if($_GET['pag'] == 'publicacoes'){ // CONDIÇÃO BOTÃO PUBLICAÇÕES GET[PAG] 
                    include 'include/modulos/front/blog/blog-fotos.php';
                    }
                ?>
                <?php if($_GET['pag'] == 'produtos'){ // CONDIÇÃO BOTÃO PUBLICAÇÕES GET[PAG] 
                    include 'include/modulos/front/blog/blog-produtos.php';
                    }
                ?>
                <?php if($_GET['pag'] == 'inicio'){ // CONDIÇÃO BOTÃO INICIO GET[PAG] 
                    include 'include/modulos/front/blog/blog-inicio.php';
                    }
                ?>
                <?php if($_GET['pag'] == 'lojas'){ // CONDIÇÃO BOTÃO INICIO GET[PAG] 
                    echo 'LOJA';
                    }
                ?>
                <?php if($_GET['pag'] == 'contato'){ // CONDIÇÃO BOTÃO INICIO GET[PAG] 
                    echo 'CONTATO';
                    }
                ?>
            <?php } // FIM DO SE EXISTIR GET[PAG]?> 

        </div>
    </div>
    <script src="<?php echo $caminho ?>js/jquery-1.11.0.min.js"></script>
    <script src="<?php echo $caminho ?>js/jquery-1.11.1.min.js"></script>
    <script src="<?php echo $caminho ?>js/jquery.suggest.js"></script>
     <script src="<?php echo $caminho ?>js/bootstrap.min.js"></script>
     <script src="<?php echo $caminho ?>js/jquery.cookie.js"></script>
     <script src="<?php echo $caminho ?>js/waypoints.min.js"></script>
     <script src="<?php echo $caminho ?>js/modernizr.js"></script>
     <script src="<?php echo $caminho ?>js/bootstrap-hover-dropdown.js"></script>
     <script src="<?php echo $caminho ?>js/owl.carousel.min.js"></script>
     <script src="<?php echo $caminho ?>js/front.js"></script>
     <script src="<?php echo $caminho ?>js/js_ext/script_projeto.js"></script>