    
<?php
// VERIFICAÇÕES PRIMÁRIAS
$pagina = $url[0];
$torre = nome_torre($pagina);
$idTorre = $torre['idTorre'];
$nomeTorre = $torre['nomeTorre'];
if(!isset($torre)){
    echo 'Blog não encontrado!';
    exit;
}
//if (isset($_SESSION['idLogado'])){
//    $idUsuario =  $_SESSION["idLogado"];
//}else{
//    $idUsuario = '0.'.rand(123456789,987654321);
//    $_SESSION['idLogado'] = $idUsuario;
//}

?>
<?php
//include'include/conteudos/topoHtml.php';

//PUXANDO TODOS OS DADOS REFERENTE A TORRE
$dadosTorre =  topo_torre($idTorre);
$paginasTorres = 0;
?>
    <div class="container-fluid row no-gutters">
        <?php // include 'include/barra-superior.php';
        require 'include/modulos/front/universal/exibe_postagens.php';
        ?>

        <div  id="hot" class="card">
            <?php 
                    //BARRA SUPERIOR - PAGINA BLOG
                    include_once 'include/modulos/front/torre/torre-topo.php'; 
                   // echo $tokenDia.'token';
                   // echo $idPagina.'pagina';
                   // echo $idTorre.'torre';
            ?>
            <?php if(!isset($_GET['pag'])){ // VERIFICAÇÃO PARA NAVEGAÇÃO DENTRO DO BLOG
                    include_once 'include/modulos/front/torre/torre-inicio.php';
            ?>
            <?php }else{ ?>
                <?php if($_GET['pag'] == 'fotos'){ // CONDIÇÃO BOTÃO PUBLICAÇÕES GET[PAG] 
                    include 'include/modulos/front/torre/torre_postagens.php';
                    }
                ?>
                <?php if($_GET['pag'] == 'inicio'){ // CONDIÇÃO BOTÃO INICIO GET[PAG] 
                    include_once 'include/modulos/front/torre/torre-inicio.php';
                    }
                ?>
                <?php if($_GET['pag'] == 'blogs'){ // CONDIÇÃO BOTÃO INICIO GET[PAG] 
                    echo 'BLOGS';
                    }
                ?>
                <?php if($_GET['pag'] == 'lojas'){ // CONDIÇÃO BOTÃO INICIO GET[PAG] 
                    echo 'LOJA';
                    }
                ?>
                <?php if($_GET['pag'] == 'eventos'){ // CONDIÇÃO BOTÃO INICIO GET[PAG] 
                    echo 'eventos';
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
 <script src="<?php echo $caminho ?>js/mask.js"></script>
 <script src="<?php echo $caminho ?>js/textcomplete.js"></script>
     <script src="<?php echo $caminho ?>js/bootstrap.min.js"></script>
     <script src="<?php echo $caminho ?>js/jquery.cookie.js"></script>
     <script src="<?php echo $caminho ?>js/waypoints.min.js"></script>
     <script src="<?php echo $caminho ?>js/modernizr.js"></script>
     <script src="<?php echo $caminho ?>js/bootstrap-hover-dropdown.js"></script>
     <script src="<?php echo $caminho ?>js/owl.carousel.min.js"></script>
     <script src="<?php echo $caminho ?>js/front.js"></script>
     <script src="<?php echo $caminho ?>js/js_ext/script_projeto.js"></script>