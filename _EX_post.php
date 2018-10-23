<?php
include_once 'functions/iniciar.php';
include_once 'functions/functions.php';
include_once 'functions/conexoes.php';
include_once 'include/modal.php';
include'include/conteudos/topoHtml.php';
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
$idtorre = 1;
//PUXANDO TODOS OS DADOS REFERENTE A TORRE
$dadosTorre =  topo_torre($idtorre);
$paginasTorres = conta_pagina_torre($idtorre);
?>
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
    <link href="<?php echo $caminho ?>css/meu.css" rel="stylesheet">

    <script src="<?php echo $caminho ?>js/respond.min.js"></script>

    <link rel="shortcut icon" href="favicon.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

</head>
<body>
<div id="all">
    <?php include_once'include/barra-superior.php' ?>
    <div id="content">
    <div class="container">
            <div class="col-md-12">
                <div class="box col-sm-12">
                    <div class="visible-xs">
                        <h4>♜ | <?php echo $dadosTorre['nomeTorre'] ?></h4>
                        <small><?php echo $dadosTorre['cidadeTorre'].'-'.$dadosTorre['estadoTorre'] ?>.</small>
                        <div id="main-slider">
                            <div class="item">
                                <img src="<?php echo $caminho ?>img/slider2.jpg" alt="" class="img-responsive">
                            </div>
                            <div class="item">
                                <img src="<?php echo $caminho ?>img/slider4.jpg" alt="" class="img-responsive">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 hidden-xs">
                        <h3 class="responsive">♜ | <?php echo $dadosTorre['nomeTorre'] ?></h3>
                        <p><?php echo $dadosTorre['cidadeTorre'].'-'.$dadosTorre['estadoTorre'] ?>.</p>
                    </div>
                    <?php
                    //$categoria = $_GET['cat']
                    ?>
                    <div class="col-sm-9">
                        <ul class="nav nav-tabs nav-justified">
                          <li><a href="torre">INICIO</a></li>
                          <li class="active"><a href="post">POSTAGENS</a></li>
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
        <div class="row products col-sm-9">

            <div id="">
                <?php
                $idTorre = 1;
                $qtd_post = 12;

                $inicio = 0;
                $fim = $qtd_post;
                $albumImagemResposta = banco_inicio($idTorre, $inicio, $fim);
                ?>

                <?php while ($fotos = $albumImagemResposta->fetch(PDO::FETCH_ASSOC)): //prepara o conteúdo para ser listado ?>
                    <!-- INFORMAÇÃOE DO ALBUM -->
                    <div class="box slideshow col-sm-4">
                     <p><?php echo palavraCurta(10,$fotos['usuTitulo']) ?></p>
                     <!-- FOTOS DO ALBUM -->
                     <div class="owl-carousel owl-theme product-slider visible-xs ">
                        <?php
                        $foto0 = isset($fotos['img']) ? $fotos['img'] : null;
                        $foto1 = isset($fotos['img1']) ? $fotos['img1'] : null;
                        $foto2 = isset($fotos['img2']) ? $fotos['img2'] : null;
                        $foto3 = isset($fotos['img3']) ? $fotos['img3'] : null;
                        $foto4 = isset($fotos['img4']) ? $fotos['img4'] : null;

                        $quantasFotos = array($foto0, $foto1, $foto2, $foto3, $foto4);
                        $conta = count($quantasFotos);
                        for ($g = 0; $g < $conta; $g++){
                            if ($quantasFotos[$g]!= 0){
                                ?>
                                <div class="banner visible-xs">
                                    <a href="#">
                                       <img src="<?php echo $caminho ?>imagem/post/media/<?php echo $quantasFotos[$g] ?>" alt="" class="img-responsive" >
                                   </a>
                               </div>
                               <?php
                           }
                       }
                       ?>
                   </div>
                   <div class="product hidden-xs">
                    <div class="col-sm-12 ">
                        <div id="mainImage ">
                            <img src="<?php echo $caminho ?>imagem/post/mini/<?php echo $fotos['img'] ?>" alt="" class="img-responsive" >
                        </div>

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

                    </div>
                </div>
                <p><?php echo palavraCurta(10,$fotos['usuTitulo']) ?></p>
                <p class="price"><del>$280</del> $143.00</p>
                <p class="buttons">
                    <a type='button' href='#editar' class='btn btn-default' data-toggle='modal' data-target='#modal-editar' data-id='<?php echo $fotos['idImg']; ?>' id='btnEditar' > VER MAIS

                        <a href="basket.html" class="btn btn-primary"><i class="fa fa-star"></i>Add FAVORITO</a>
                    </p>
                </div>
                <?php
                $contaRegistro = count($fotos);
                endwhile;
                ?>
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


        <!-- /.col-md-9 -->

    </div>
    <!-- /.container -->
</div>

</div>

</div>
</body>

    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap-hover-dropdown.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/front.js"></script>