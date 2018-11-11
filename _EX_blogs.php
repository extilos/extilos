<?php
// VERIFICAÇÕES PRIMÁRIAS
date_default_timezone_set('America/Sao_Paulo');
$data = date('d-m-Y');
$hora = date('H:i');
$executionStartTime = microtime(true);
$explode = explode('/',$_SERVER["REQUEST_URI"]);
$total = count($explode);
if ($total == 3){
    $caminho = "";
}
if ($total == 4){
    $caminho = "../";
}
if ($total == 5){
    $caminho = "../../";
}

$buscaBlog = busca_nome_blog($url[1]);
$idPagina = $buscaBlog['idPagina'];
if (isset($_SESSION['idLogado'])){
  $idLogado = $_SESSION['idLogado'];
// verifica se usuário logado é gerenciador do blog
  $verificaUsuario = usuarioAdm($buscaBlog['idPagina'],$idLogado);
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Obaju e-commerce template">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">

    <title>
        Obaju : e-commerce template
    </title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="<?php echo $caminho ?>css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo $caminho ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $caminho ?>css/animate.min.css" rel="stylesheet">
    <link href="<?php echo $caminho ?>css/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo $caminho ?>css/owl.theme.css" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="<?php echo $caminho ?>css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="<?php echo $caminho ?>css/custom.css" rel="stylesheet">

    <link href="<?php echo $caminho ?>css/meu.css" rel="stylesheet">

    <script src="<?php echo $caminho ?>js/respond.min.js"></script>

    <link rel="shortcut icon" href="favicon.png">

</head>

<body>
    <div id="all">
        <?php include_once 'include/barra-superior.php';?>
        <div id="content">
            <div class="container">
                <div class="col-sm-12">
                    <div class="box">
                        <img src="<?php echo $caminho ?>imagem/capa/media/<?php echo $buscaBlog['pgCapa'] ?>" alt="" style="max-height: 250px" class="img-responsive">
                        <a href="../painel_usuario/editar_blog" class="btn btn-xs btn-primary pull-right" href="#"> Configurações</a>
                    </div>

                </div>
                <div class="col-md-3">
                    <!-- *** MENUS AND FILTERS ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">
                        <?php include 'include/modulos/front/bloco-lateral-album-blog.php' ?>
                    </div>
                    <div class="panel panel-default sidebar-menu">
                        <?php include 'include/modulos/front/bloco-lateral-album-adm.php' ?>
                    </div>

                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Parceiros <a class="btn btn-xs btn-primary pull-right" href="#"> Ver Todos</a></h3>
                        </div>

                        <div class="panel-body">

                            <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                                <li class="active">
                                    <a href="category.html">&loja <span class="badge pull-right">123</span></a>
                                    <ul>
                                        <li class="active" ><a href="category.html">Masculino</a>
                                        </li>
                                        <li><a href="category.html">Feminino</a>
                                        </li>
                                        <li><a href="category.html">Kids</a>
                                        </li>
                                        <li><a href="category.html">Novidades</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="category.html">&loja2  <span class="badge pull-right">11</span></a>
                                </li>
                                <li>
                                    <a href="category.html">&loja3  <span class="badge pull-right">25</span></a>
                                </li>

                            </ul>

                        </div>

                        </div>
                    </div>

                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Colours <a class="btn btn-xs btn-danger pull-right" href="#"><i class="fa fa-times-circle"></i> Clear</a></h3>
                        </div>

                        <div class="panel-body">

                            <form>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> <span class="colour white"></span> White (14)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> <span class="colour blue"></span> Blue (10)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> <span class="colour green"></span> Green (20)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> <span class="colour yellow"></span> Yellow (13)
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> <span class="colour red"></span> Red (10)
                                        </label>
                                    </div>
                                </div>

                                <button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Apply</button>

                            </form>

                        </div>
                    </div>

                    <!-- *** MENUS AND FILTERS END *** -->

                    <div class="banner">
                        <a href="#">
                            <img src="img/banner.jpg" alt="sales 2014" class="img-responsive">
                        </a>
                    </div>
                </div>
                <div class="col-md-9">
                    <?php if(isset($idLogado)){
                        //VERIFICA SE USUÁRIO TEM PERMISÃO PARA PUBLICAR CONTEÚDO NESTE BLOG
                        if($verificaUsuario['pm_post'] == 1){
                         ?>
                            <div class="box">
                                <h1>Publicações</h1>
                                <p>In our Ladies department we offer wide selection of the best products we have found and carefully selected worldwide.</p>
                                <?php echo $idLogado.'pagina'.$idPagina ?>
                            </div>
                    <?php } } ?>
                    <div class="box info-bar">
                        <div class="row">
                            <div class="col-sm-12 col-md-4 products-showing">
                                <?php 
                                    print_r($verificaUsuario);
                                    print_r($buscaBlog); 
                                ?>
                                Showing <strong>12</strong> of <strong>25</strong> products
                            </div>

                            <div class="col-sm-12 col-md-8  products-number-sort">
                                <div class="row">
                                    <form class="form-inline">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="products-number">
                                                <strong>Show</strong>  <a href="#" class="btn btn-default btn-sm btn-primary">12</a>  <a href="#" class="btn btn-default btn-sm">24</a>  <a href="#" class="btn btn-default btn-sm">All</a> products
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="products-sort-by">
                                                <strong>Sort by</strong>
                                                <select name="sort-by" class="form-control">
                                                    <option>Price</option>
                                                    <option>Name</option>
                                                    <option>Sales first</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php 
                        //INCLUDE MODULO DE POSTAGENS
                        include 'include/modulos/front/exibe_postagens.php';
                     ?>
                    


                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <!-- *** FOOTER ***
 _________________________________________________________ -->

        <div id="footer" data-animate="fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <h4>Pages</h4>

                        <ul>
                            <li><a href="text.html">About us</a>
                            </li>
                            <li><a href="text.html">Terms and conditions</a>
                            </li>
                            <li><a href="faq.html">FAQ</a>
                            </li>
                            <li><a href="contact.html">Contact us</a>
                            </li>
                        </ul>

                        <hr>

                        <h4>User section</h4>

                        <ul>
                            <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                            </li>
                            <li><a href="register.html">Regiter</a>
                            </li>
                        </ul>

                        <hr class="hidden-md hidden-lg hidden-sm">

                    </div>
                    <!-- /.col-md-3 -->

                    <div class="col-md-3 col-sm-6">

                        <h4>Top categories</h4>

                        <h5>Men</h5>

                        <ul>
                            <li><a href="category.html">T-shirts</a>
                            </li>
                            <li><a href="category.html">Shirts</a>
                            </li>
                            <li><a href="category.html">Accessories</a>
                            </li>
                        </ul>

                        <h5>Ladies</h5>
                        <ul>
                            <li><a href="category.html">T-shirts</a>
                            </li>
                            <li><a href="category.html">Skirts</a>
                            </li>
                            <li><a href="category.html">Pants</a>
                            </li>
                            <li><a href="category.html">Accessories</a>
                            </li>
                        </ul>

                        <hr class="hidden-md hidden-lg">

                    </div>
                    <!-- /.col-md-3 -->

                    <div class="col-md-3 col-sm-6">

                        <h4>Where to find us</h4>

                        <p><strong>Obaju Ltd.</strong>
                            <br>13/25 New Avenue
                            <br>New Heaven
                            <br>45Y 73J
                            <br>England
                            <br>
                            <strong>Great Britain</strong>
                        </p>

                        <a href="contact.html">Go to contact page</a>

                        <hr class="hidden-md hidden-lg">

                    </div>
                    <!-- /.col-md-3 -->



                    <div class="col-md-3 col-sm-6">

                        <h4>Get the news</h4>

                        <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>

                        <form>
                            <div class="input-group">

                                <input type="text" class="form-control">

                                <span class="input-group-btn">

                <button class="btn btn-default" type="button">Subscribe!</button>

            </span>

                            </div>
                            <!-- /input-group -->
                        </form>

                        <hr>

                        <h4>Stay in touch</h4>

                        <p class="social">
                            <a href="#" class="facebook external" data-animate-hover="shake"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter external" data-animate-hover="shake"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="instagram external" data-animate-hover="shake"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="gplus external" data-animate-hover="shake"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="email external" data-animate-hover="shake"><i class="fa fa-envelope"></i></a>
                        </p>


                    </div>
                    <!-- /.col-md-3 -->

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>

        <div id="copyright">
            <div class="container">
                <div class="col-md-6">
                    <p class="pull-left">© 2015 Your name goes here.</p>

                </div>
                <div class="col-md-6">
                    <p class="pull-right">Template by <a href="https://bootstrapious.com/e-commerce-templates">Bootstrapious</a> & <a href="https://fity.cz">Fity</a>
                         <!-- Not removing these links is part of the license conditions of the template. Thanks for understanding :) If you want to use the template without the attribution links, you can do so after supporting further themes development at https://bootstrapious.com/donate  -->
                    </p>
                </div>
            </div>
        </div>
        <!-- *** COPYRIGHT END *** -->



    </div>
    <!-- /#all -->

    <!-- *** SCRIPTS TO INCLUDE ***
 _________________________________________________________ -->
    <script src="<?php echo $caminho ?>js/jquery-1.11.0.min.js"></script>
    <script src="<?php echo $caminho ?>js/bootstrap.min.js"></script>
    <script src="<?php echo $caminho ?>js/jquery.cookie.js"></script>
    <script src="<?php echo $caminho ?>js/waypoints.min.js"></script>
    <script src="<?php echo $caminho ?>js/modernizr.js"></script>
    <script src="<?php echo $caminho ?>js/bootstrap-hover-dropdown.js"></script>
    <script src="<?php echo $caminho ?>js/owl.carousel.min.js"></script>
    <script src="<?php echo $caminho ?>js/front.js"></script>

</body>

</html>