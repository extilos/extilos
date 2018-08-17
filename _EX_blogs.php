<?php
ob_start();
session_start();

include_once 'functions/iniciar.php';
include_once 'functions/functions.php';
include_once 'functions/conexoes.php';
include_once 'include/modal.php';
include_once 'cadastros/caracteres-especiais.php';
include'include/conteudos/topoHtml.php';
$idtorre = 1;
//PUXANDO TODOS OS DADOS REFERENTE A TORRE
$dadosTorre =  topo_torre($idtorre);
$paginasTorres = conta_pagina_torre($idtorre);
?>
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
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="css/custom.css" rel="stylesheet">

    <script src="js/respond.min.js"></script>

    <link rel="shortcut icon" href="favicon.png">
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">


</head>

<body>

    <div class="hidden-xs"><!-- TOPO INVISÍVEL PARA CELULAR -->

        <div class="navbar navbar-fixed-top yamm navbar-inverse" role="navigation" id="navbar">
            <div class="container">
                <div class="navbar-header">

                    <a class="navbar-brand home" href="index.html" data-animate-hover="bounce">
                        <img src="imagem/sistema/extilos.png" alt="extilos logo" height="70" class="hidden-xs">

                    </a>
                </div>
                <!--/.navbar-header -->

                <div class="navbar-collapse collapse" id="navigation">

                    <ul class="nav navbar-nav navbar-left">
                        <li class="active"><a href="index.html">Home</a>
                        </li>
                        <li class="dropdown yamm-fw">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Men <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="yamm-content">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h5>Clothing</h5>
                                                <ul>
                                                    <li><a href="category.html">T-shirts</a>
                                                    </li>
                                                    <li><a href="category.html">Shirts</a>
                                                    </li>
                                                    <li><a href="category.html">Pants</a>
                                                    </li>
                                                    <li><a href="category.html">Accessories</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-3">
                                                <h5>Shoes</h5>
                                                <ul>
                                                    <li><a href="category.html">Trainers</a>
                                                    </li>
                                                    <li><a href="category.html">Sandals</a>
                                                    </li>
                                                    <li><a href="category.html">Hiking shoes</a>
                                                    </li>
                                                    <li><a href="category.html">Casual</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-3">
                                                <h5>Accessories</h5>
                                                <ul>
                                                    <li><a href="category.html">Trainers</a>
                                                    </li>
                                                    <li><a href="category.html">Sandals</a>
                                                    </li>
                                                    <li><a href="category.html">Hiking shoes</a>
                                                    </li>
                                                    <li><a href="category.html">Casual</a>
                                                    </li>
                                                    <li><a href="category.html">Hiking shoes</a>
                                                    </li>
                                                    <li><a href="category.html">Casual</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-3">
                                                <h5>Featured</h5>
                                                <ul>
                                                    <li><a href="category.html">Trainers</a>
                                                    </li>
                                                    <li><a href="category.html">Sandals</a>
                                                    </li>
                                                    <li><a href="category.html">Hiking shoes</a>
                                                    </li>
                                                </ul>
                                                <h5>Looks and trends</h5>
                                                <ul>
                                                    <li><a href="category.html">Trainers</a>
                                                    </li>
                                                    <li><a href="category.html">Sandals</a>
                                                    </li>
                                                    <li><a href="category.html">Hiking shoes</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.yamm-content -->
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown yamm-fw">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Ladies <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="yamm-content">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h5>Clothing</h5>
                                                <ul>
                                                    <li><a href="category.html">T-shirts</a>
                                                    </li>
                                                    <li><a href="category.html">Shirts</a>
                                                    </li>
                                                    <li><a href="category.html">Pants</a>
                                                    </li>
                                                    <li><a href="category.html">Accessories</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-3">
                                                <h5>Shoes</h5>
                                                <ul>
                                                    <li><a href="category.html">Trainers</a>
                                                    </li>
                                                    <li><a href="category.html">Sandals</a>
                                                    </li>
                                                    <li><a href="category.html">Hiking shoes</a>
                                                    </li>
                                                    <li><a href="category.html">Casual</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-3">
                                                <h5>Accessories</h5>
                                                <ul>
                                                    <li><a href="category.html">Trainers</a>
                                                    </li>
                                                    <li><a href="category.html">Sandals</a>
                                                    </li>
                                                    <li><a href="category.html">Hiking shoes</a>
                                                    </li>
                                                    <li><a href="category.html">Casual</a>
                                                    </li>
                                                    <li><a href="category.html">Hiking shoes</a>
                                                    </li>
                                                    <li><a href="category.html">Casual</a>
                                                    </li>
                                                </ul>
                                                <h5>Looks and trends</h5>
                                                <ul>
                                                    <li><a href="category.html">Trainers</a>
                                                    </li>
                                                    <li><a href="category.html">Sandals</a>
                                                    </li>
                                                    <li><a href="category.html">Hiking shoes</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="banner">
                                                    <a href="#">
                                                        <img src="img/banner.jpg" class="img img-responsive" alt="">
                                                    </a>
                                                </div>
                                                <div class="banner">
                                                    <a href="#">
                                                        <img src="img/banner2.jpg" class="img img-responsive" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.yamm-content -->
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown yamm-fw">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Template <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="yamm-content">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <h5>Shop</h5>
                                                <ul>
                                                    <li><a href="index.html">Homepage</a>
                                                    </li>
                                                    <li><a href="category.html">Category - sidebar left</a>
                                                    </li>
                                                    <li><a href="category-right.html">Category - sidebar right</a>
                                                    </li>
                                                    <li><a href="category-full.html">Category - full width</a>
                                                    </li>
                                                    <li><a href="detail.html">Product detail</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-3">
                                                <h5>User</h5>
                                                <ul>
                                                    <li><a href="register.html">Register / login</a>
                                                    </li>
                                                    <li><a href="customer-orders.html">Orders history</a>
                                                    </li>
                                                    <li><a href="customer-order.html">Order history detail</a>
                                                    </li>
                                                    <li><a href="customer-wishlist.html">Wishlist</a>
                                                    </li>
                                                    <li><a href="customer-account.html">Customer account / change password</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-3">
                                                <h5>Order process</h5>
                                                <ul>
                                                    <li><a href="basket.html">Shopping cart</a>
                                                    </li>
                                                    <li><a href="checkout1.html">Checkout - step 1</a>
                                                    </li>
                                                    <li><a href="checkout2.html">Checkout - step 2</a>
                                                    </li>
                                                    <li><a href="checkout3.html">Checkout - step 3</a>
                                                    </li>
                                                    <li><a href="checkout4.html">Checkout - step 4</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-sm-3">
                                                <h5>Pages and blog</h5>
                                                <ul>
                                                    <li><a href="blog.html">Blog listing</a>
                                                    </li>
                                                    <li><a href="post.html">Blog Post</a>
                                                    </li>
                                                    <li><a href="faq.html">FAQ</a>
                                                    </li>
                                                    <li><a href="text.html">Text page</a>
                                                    </li>
                                                    <li><a href="text-right.html">Text page - right sidebar</a>
                                                    </li>
                                                    <li><a href="404.html">404 page</a>
                                                    </li>
                                                    <li><a href="contact.html">Contact</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.yamm-content -->
                                </li>
                            </ul>
                        </li>
                    </ul>

                </div>
                <!--/.nav-collapse -->

                <div class="navbar-buttons">

                    <div class="navbar-collapse collapse right" id="basket-overview">
                        <a data-toggle="modal" data-target="#login-modal" class="btn btn-secondary navbar-btn"><i class="fa fa-user"></i><span class="hidden-sm">Login</span></a>
                    </div>
                    <!--/.nav-collapse -->

                    <div class="navbar-collapse collapse right" id="search-not-mobile">
                       <form class="navbar-form" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="input-group-btn">

                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>Buscar</button>

                            </span>
                        </div>
                    </form>
                </div>

            </div>

        </div>
        <!-- /.container -->
    </div>
</div>

<div id="all">

    <div id="content">
        <div class="container">

            <div class="col-sm-12 box hidden-xs">
            </div>
            
            <div class="col-md-12">

                <div class=" col-sm-12 box">
                    <img src="imagem/sistema/extilos.png" alt="extilos logo" height="30" class="visible-xs">
                </div>
                <div class="box col-sm-12">
                    <div class="visible-xs">
                    <h4>♜ | <?php echo $dadosTorre['nomeTorre'] ?></h4>
                        <small><?php echo $dadosTorre['cidadeTorre'].'-'.$dadosTorre['estadoTorre'] ?>.</small>
                <div id="main-slider">
                    <div class="item">
                        <img src="img/slider2.jpg" alt="" class="img-responsive">
                    </div>
                    <div class="item">
                        <img src="img/slider4.jpg" alt="" class="img-responsive">
                    </div>
                </div>
            </div>
                    <div class="col-sm-3 hidden-xs">
                        <h3 class="responsive">♜ | <?php echo $dadosTorre['nomeTorre'] ?></h3>
                        <p><?php echo $dadosTorre['cidadeTorre'].'-'.$dadosTorre['estadoTorre'] ?>.</p>
                    </div>
                    <div class="col-sm-9">
                        <ul class="nav nav-tabs nav-justified">
                          <li><a href="#">INICIO</a></li>
                          <li class="active"><a href="#">POSTAGENS</a></li>
                          <li><a href="#">LOJAS</a></li>
                          <li><a href="blogs.php">BLOGS</a></li>
                          <li><a href="#">PUBLICIDADE</a></li>
                          <li><a href="#">CONTATO</a></li>
                      </ul>
                      <br>
                  </div>


                  <div class="col-sm-9 hidden-xs">
                    <ul class="nav nav-pills nav-justified">
                      <li class="active"><a href="#">Ultimos Post</a></li>
                      <li><a href="#">Mais Votados</a></li>
                      <li><a href="#">Look Masculino</a></li>
                      <li><a href="lista-paginas.php">Look Feminino</a></li>
                      <li><a href="#">Produtos</a></li>
                      <li><a href="#">Destaques</a></li>
                  </ul>
              </div>
              <div class="col-sm-9 visible-xs">
                <div class="products-sort-by">
                    <strong>Aplicar Filtro</strong>
                    <select name="sort-by" class="form-control">
                        <option><a href="#">Ultimos Post</a></option>
                        <option><a href="#">Mais Votados</a></option>
                        <option><a href="#">Look Masculino</a></option>
                        <option><a href="#">Look Feminino</a></option>
                        <option><a href="#">Produtos</a></option>
                        <option><a href="#">Destaques</a></option>
                    </select>
                </div>
            </div>
            </div>
        <div class="row products">

            <div class="col-md-3 col-sm-4">
                <div class="product">
                            <div class="">
                                <a href="detail.html">
                                    <img src="img/banner.jpg" alt="" class="img-responsive">
                                </a>
                            </div>
                    <div class="text">
                        <p class="buttons">
                            <a href="detail.html" class="btn btn-primary"><i class="fa fa-eye"></i>Visitar Blog</a>
                            <a href="basket.html" class="btn btn-default">+<i class="fa fa-hand-o-up"></i>fã</a>
                        </p>
                    </div>
                    <!-- /.text -->
                </div>
                <!-- /.product -->
            </div>

            <div class="col-md-3 col-sm-4">
                <div class="product">
                    <div class="flip-container">
                        <div class="flipper">
                            <div class="front">
                                <a href="detail.html">
                                    <img src="img/product2.jpg" alt="" class="img-responsive">
                                </a>
                            </div>
                            <div class="back">
                                <a href="detail.html">
                                    <img src="img/product2_2.jpg" alt="" class="img-responsive">
                                </a>
                            </div>
                        </div>
                    </div>
                    <a href="detail.html" class="invisible">
                        <img src="img/product2.jpg" alt="" class="img-responsive">
                    </a>
                    <div class="text">
                        <h3><a href="detail.html">White Blouse Armani</a></h3>
                        <p class="price"><del>$280</del> $143.00</p>
                        <p class="buttons">
                            <a href="detail.html" class="btn btn-default">View detail</a>
                            <a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </p>
                    </div>
                    <!-- /.text -->

                    <div class="ribbon sale">
                        <div class="theribbon">SALE</div>
                        <div class="ribbon-background"></div>
                    </div>
                    <!-- /.ribbon -->

                    <div class="ribbon new">
                        <div class="theribbon">NEW</div>
                        <div class="ribbon-background"></div>
                    </div>
                    <!-- /.ribbon -->

                    <div class="ribbon gift">
                        <div class="theribbon">GIFT</div>
                        <div class="ribbon-background"></div>
                    </div>
                    <!-- /.ribbon -->
                </div>
                <!-- /.product -->
            </div>

            <div class="col-md-3 col-sm-4">
                <div class="product">
                    <div class="flip-container">
                        <div class="flipper">
                            <div class="front">
                                <a href="detail.html">
                                    <img src="img/product3.jpg" alt="" class="img-responsive">
                                </a>
                            </div>
                            <div class="back">
                                <a href="detail.html">
                                    <img src="img/product3_2.jpg" alt="" class="img-responsive">
                                </a>
                            </div>
                        </div>
                    </div>
                    <a href="detail.html" class="invisible">
                        <img src="img/product3.jpg" alt="" class="img-responsive">
                    </a>
                    <div class="text">
                        <h3><a href="detail.html">Black Blouse Versace</a></h3>
                        <p class="price">$143.00</p>
                        <p class="buttons">
                            <a href="detail.html" class="btn btn-default">View detail</a>
                            <a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </p>

                    </div>
                    <!-- /.text -->
                </div>
                <!-- /.product -->
            </div>

            <div class="col-md-3 col-sm-4">
                <div class="product">
                    <div class="flip-container">
                        <div class="flipper">
                            <div class="front">
                                <a href="detail.html">
                                    <img src="img/product3.jpg" alt="" class="img-responsive">
                                </a>
                            </div>
                            <div class="back">
                                <a href="detail.html">
                                    <img src="img/product3_2.jpg" alt="" class="img-responsive">
                                </a>
                            </div>
                        </div>
                    </div>
                    <a href="detail.html" class="invisible">
                        <img src="img/product3.jpg" alt="" class="img-responsive">
                    </a>
                    <div class="text">
                        <h3><a href="detail.html">Black Blouse Versace</a></h3>
                        <p class="price">$143.00</p>
                        <p class="buttons">
                            <a href="detail.html" class="btn btn-default">View detail</a>
                            <a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </p>

                    </div>
                    <!-- /.text -->
                </div>
                <!-- /.product -->
            </div>

            <div class="col-md-3 col-sm-4">
                <div class="product">
                    <div class="flip-container">
                        <div class="flipper">
                            <div class="front">
                                <a href="detail.html">
                                    <img src="img/product2.jpg" alt="" class="img-responsive">
                                </a>
                            </div>
                            <div class="back">
                                <a href="detail.html">
                                    <img src="img/product2_2.jpg" alt="" class="img-responsive">
                                </a>
                            </div>
                        </div>
                    </div>
                    <a href="detail.html" class="invisible">
                        <img src="img/product2.jpg" alt="" class="img-responsive">
                    </a>
                    <div class="text">
                        <h3><a href="detail.html">White Blouse Versace</a></h3>
                        <p class="price">$143.00</p>
                        <p class="buttons">
                            <a href="detail.html" class="btn btn-default">View detail</a>
                            <a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </p>

                    </div>
                    <!-- /.text -->

                    <div class="ribbon new">
                        <div class="theribbon">NEW</div>
                        <div class="ribbon-background"></div>
                    </div>
                    <!-- /.ribbon -->
                </div>
                <!-- /.product -->
            </div>

            <div class="col-md-3 col-sm-4">
                <div class="product">
                    <div class="flip-container">
                        <div class="flipper">
                            <div class="front">
                                <a href="detail.html">
                                    <img src="img/product1.jpg" alt="" class="img-responsive">
                                </a>
                            </div>
                            <div class="back">
                                <a href="detail.html">
                                    <img src="img/product1_2.jpg" alt="" class="img-responsive">
                                </a>
                            </div>
                        </div>
                    </div>
                    <a href="detail.html" class="invisible">
                        <img src="img/product1.jpg" alt="" class="img-responsive">
                    </a>
                    <div class="text">
                        <h3><a href="detail.html">Fur coat</a></h3>
                        <p class="price">$143.00</p>
                        <p class="buttons">
                            <a href="detail.html" class="btn btn-default">View detail</a>
                            <a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </p>

                    </div>
                    <!-- /.text -->

                    <div class="ribbon gift">
                        <div class="theribbon">GIFT</div>
                        <div class="ribbon-background"></div>
                    </div>
                    <!-- /.ribbon -->

                </div>
                <!-- /.product -->
            </div>
            <!-- /.col-md-4 -->

            <div class="col-md-3 col-sm-4">
                <div class="product">
                    <div class="flip-container">
                        <div class="flipper">
                            <div class="front">
                                <a href="detail.html">
                                    <img src="img/product2.jpg" alt="" class="img-responsive">
                                </a>
                            </div>
                            <div class="back">
                                <a href="detail.html">
                                    <img src="img/product2_2.jpg" alt="" class="img-responsive">
                                </a>
                            </div>
                        </div>
                    </div>
                    <a href="detail.html" class="invisible">
                        <img src="img/product2.jpg" alt="" class="img-responsive">
                    </a>
                    <div class="text">
                        <h3><a href="detail.html">White Blouse Armani</a></h3>
                        <p class="price"><del>$280</del> $143.00</p>
                        <p class="buttons">
                            <a href="detail.html" class="btn btn-default">View detail</a>
                            <a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </p>
                    </div>
                    <!-- /.text -->

                    <div class="ribbon sale">
                        <div class="theribbon">SALE</div>
                        <div class="ribbon-background"></div>
                    </div>
                    <!-- /.ribbon -->

                    <div class="ribbon new">
                        <div class="theribbon">NEW</div>
                        <div class="ribbon-background"></div>
                    </div>
                    <!-- /.ribbon -->

                    <div class="ribbon gift">
                        <div class="theribbon">GIFT</div>
                        <div class="ribbon-background"></div>
                    </div>
                    <!-- /.ribbon -->
                </div>
                <!-- /.product -->
            </div>

            <div class="col-md-3 col-sm-4">
                <div class="product">
                    <div class="flip-container">
                        <div class="flipper">
                            <div class="front">
                                <a href="detail.html">
                                    <img src="img/product3.jpg" alt="" class="img-responsive">
                                </a>
                            </div>
                            <div class="back">
                                <a href="detail.html">
                                    <img src="img/product3_2.jpg" alt="" class="img-responsive">
                                </a>
                            </div>
                        </div>
                    </div>
                    <a href="detail.html" class="invisible">
                        <img src="img/product3.jpg" alt="" class="img-responsive">
                    </a>
                    <div class="text">
                        <h3><a href="detail.html">Black Blouse Versace</a></h3>
                        <p class="price">$143.00</p>
                        <p class="buttons">
                            <a href="detail.html" class="btn btn-default">View detail</a>
                            <a href="basket.html" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </p>

                    </div>
                    <!-- /.text -->
                </div>
                <!-- /.product -->
            </div>

        </div>
        <!-- /.products -->

        <div class="pages">

            <p class="loadMore">
                <a href="#" class="btn btn-primary btn-lg"><i class="fa fa-chevron-down"></i> Load more</a>
            </p>

            <ul class="pagination">
                <li><a href="#">&laquo;</a>
                </li>
                <li class="active"><a href="#">1</a>
                </li>
                <li><a href="#">2</a>
                </li>
                <li><a href="#">3</a>
                </li>
                <li><a href="#">4</a>
                </li>
                <li><a href="#">5</a>
                </li>
                <li><a href="#">&raquo;</a>
                </li>
            </ul>
        </div>


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
    <!-- /#footer -->

    <!-- *** FOOTER END *** -->




        <!-- *** COPYRIGHT ***
        _________________________________________________________ -->
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
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap-hover-dropdown.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/front.js"></script>






</body>

</html>