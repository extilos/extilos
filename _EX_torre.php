<?php
include_once 'functions/iniciar.php';
include_once 'functions/functions.php';
include_once 'functions/conexoes.php';
include_once 'functions/cadastros.php';
include_once 'functions/functions.php';
include_once 'include/modal.php';
include'include/conteudos/topoHtml.php';
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
$idtorre = $_GET['idTorre'];
$pagina = $url[0];
if (isset($_SESSION['idLogado'])){
    $idUsuario =  $_SESSION["idLogado"];
}else{
    $idUsuario = '0.'.rand(123456789,987654321);
    $_SESSION['idLogado'] = $idUsuario;
}

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
        eXtilos
    </title>

    <link href="<?php echo $caminho ?>css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo $caminho ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $caminho ?>css/animate.min.css" rel="stylesheet">
    <link href="<?php echo $caminho ?>css/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo $caminho ?>css/owl.theme.css" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="<?php echo $caminho ?>css/style.default.css" rel="stylesheet" id="theme-stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <!-- your stylesheet with modifications -->
    <link href="<?php echo $caminho ?>css/meu.css" rel="stylesheet">

    <script src="<?php echo $caminho ?>js/respond.min.js"></script>
    <link rel="extilos icon" href="favicon.png">
</head>
<body>
    <div id="all">
        <?php include 'include/barra-superior.php';?>
        <div id="content">
            <div class="container">
                <div class="box col-sm-12">
                    <!-- SLIDE DE CAPA DA TORRE -->
                    <div id="main-slider">
                        <div class="item">
                            <img src="img/slider2.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="item">
                            <img src="img/slider4.jpg" alt="" class="img-responsive">
                        </div>
                    </div>
                    <div class="col-sm-3 hidden-xs text-center">
                        <h3 class="responsive">♜ | <?php echo $dadosTorre['nomeTorre'] ?></h3>
                        <p><b><?php echo $dadosTorre['cidadeTorre'].'-'.$dadosTorre['estadoTorre'] ?></b><br>
                            <i class="fa fa-star"></i> Fãs: <b><?php echo $paginasTorres ?> </b></p>
                        </div>
                        <div class="col-sm-12 visible-xs text-center">
                            <h4 class="responsive">♜ | <?php echo $dadosTorre['nomeTorre'] ?></h4>
                            <small><?php echo $dadosTorre['cidadeTorre'].'-'.$dadosTorre['estadoTorre'] ?>.
                                <i class="fa fa-star"></i> Fãs: <b><?php echo $paginasTorres ?> </b></small>
                            </div>
                            <div class="col-sm-9">
                                <div class="col-sm-12 col-xs-12 text-center ">
                                    <div class="col-xs-6 col-sm-3"><small><i class="fa fa-star"></i> Blog: <b><?php echo $paginasTorres ?></b> </small></div>
                                    <div class="col-xs-6 col-sm-3"><small><i class="fa fa-star"></i> Lojas: <b><?php echo $paginasTorres ?> </b></small></div>
                                    <div class="col-xs-6 col-sm-3"><small><i class="fa fa-star"></i> Pts: <b>585</b></small></div>
                                    <div class="col-xs-6 col-sm-3"><small><i class="fa fa-star"></i> Ranking: <b>32º</b></small></div>
                                    <hr>
                                </div>
                                <div class="col-sm-12 hidden-xs">
                                    <p>Sobre: <?php echo $dadosTorre['descTorre'] ?>.</p>
                                </div>
                                <div class="col-sm-12 visible-xs">
                                    <br>
                                    <small><?php echo $dadosTorre['descTorre'] ?>.</small>
                                    <hr>
                                </div>
                            </div>
                            <ul class="nav nav-tabs nav-justified">
                              <li class="active"><a href="torre">INICIO</a></li>
                              <li><a href="torre_post">POSTAGENS</a></li>
                              <li><a href="#">LOJAS</a></li>
                              <li><a href="blogs.php">BLOGS</a></li>
                              <li><a href="#">PUBLICIDADE</a></li>
                              <li><a href="#">CONTATO</a></li>
                          </ul>

                      </div>
                  </div>

            <!-- *** ADVANTAGES HOMEPAGE ***
            _________________________________________________________ -->
            <div id="advantages">

                <div class="container">
                    <div class="same-height-row">
                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-heart"></i>
                                </div>

                                <h3><a href="#">BLOG DA SEMANA</a></h3>
                                <p>Parabéns ao blog <?php echo 'NOME BLOG' ?> pela conquista.</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-tags"></i>
                                </div>

                                <h3><a href="#">DESTAQUE</a></h3>
                                <p>Parabéns ao blog <?php echo 'NOME BLOG' ?> pela conquista.</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-thumbs-up"></i>
                                </div>

                                <h3><a href="#">LOJA DA SEMANA</a></h3>
                                <p>Parabéns ao blog <?php echo 'NOME BLOG' ?> pela conquista.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container -->

            </div>
            <!-- /#advantages -->

            <!-- *** ADVANTAGES END *** -->

            <!-- *** HOT PRODUCT SLIDESHOW ***
            _________________________________________________________ -->
            <div id="hot">

                <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2>TOP E<b>X</b>TILOS</h2>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <?php 
                    $idTorre = 3;
                        //total de post que existe na torre
                    $totalPost = total_post($idTorre);
                        // requisitar numero de valores do banco lembrando que se um registro é tirado ele continua contando
                    $qtdeSolicita = 20;
                        //calculo para saber a quantidade de páginas na paginação
                    $qtdExibida = 4;
                        // informa a quantidade de post para exibir
                    if (isset($_GET['pgAtual'])){
                        $inicio = (($_GET['pgAtual'] * $qtdExibida) - $qtdExibida);
                        $fim = $qtdeSolicita;
                    }else{
                        $inicio = 1;
                        $fim = $qtdeSolicita;
                    }
                        // busca os post relacionado a esta torre
                    $torre_post = torre_post($idTorre, 0, $fim);
                        // Decodifica o formato JSON e retorna um Objeto
                    $json = json_decode($torre_post);
                        // conta quantos registros existem no json
                    $numPaginas = count($json);
                        // Loop para percorrer o Objeto
                    foreach(array_slice($json, $inicio, $qtdExibida) as $registro):
                        if($registro->postagem > ''){
                                        // busca a página que publicou o conteúdo
                            $idPostagem = $registro->postagem;
                            $pg_conteudo = pg_conteudo($idPostagem);
                            $blogAleatorio = $pg_conteudo['id_pagina'];
                            $nomePagina = busca_blog($pg_conteudo['id_pagina']);
                            $nomeBlog = $nomePagina['nomePagina'];
                            ?>
        <!-- EXIBIR POSTAGEM -->
                            <div class="box slideshow col-sm-3">
                                <div class="col-sm-9 col-xs-9 text-left">
                                    <p>Por:
                                        <a href="pagina/<?php echo $nomeBlog?>" target="_blank"><?php echo '<i class="fa fa-user"></i>|'.$nomeBlog?></a></p>
                                </div>
                                <?php if($idUsuario > 1){ ?>
                                <div class="col-sm-2 col-xs-2 text-right">
                                    <button class="btn btn-link btn-sm" data-toggle="modal" data-target="<?php echo '#DENUNCIA'.$registro->postagem ?>" ><i class="fa fa-ban" style="color:#ed0000"></i></button>
                                </div>
                                <?php } ?>
                            <div id="denunciado"></div>
                            <div class="col-sm-12">
                            ARRUMAR O PROBLEMA DO USUÁRIO VISITANTE comentario/curtidas/favoritos
                                <!-- FOTOS DO ALBUM -->
                                <div class="lista-post">
                                    <?php
                                    $foto0 = isset($registro->img) ? $registro->img : null;
                                    $foto1 = isset($registro->img1) ? $registro->img1 : null;
                                    $foto2 = isset($registro->img2) ? $registro->img2 : null;
                                    $foto3 = isset($registro->img3) ? $registro->img3 : null;
                                    $foto4 = isset($registro->img4) ? $registro->img4 : null;

                                    $quantasFotos = array($foto0, $foto1, $foto2, $foto3, $foto4);
                                    $conta = count($quantasFotos);
                                    for ($g = 0; $g < $conta; $g++){
                                        if ($quantasFotos[$g]!= 0){
                                            ?>
                                            <div class="item" style="height: 400px" id="mainImage">
                                                <a data-toggle='modal' data-target='#modal-editar' data-id='<?php echo $registro->postagem ?>' id='btnEditar'>
                                                 <img src="imagem/post/media/<?php echo $quantasFotos[$g] ?>" alt="" class="img-responsive" >
                                                 <div class="anuncio titulo">
                                                    <div class="theribbon"><small>CONJUNTO</small></div>
                                                </div>
                                                <div class="anuncio risca">
                                                    <div class="theribbon"><strike><small>R$799,90</small></strike></div>
                                                </div>
                                                <div class="anuncio terceiro">
                                                    <div class="theribbon"><small>R$699,90</small></div>
                                                </div>
                                            </a>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class="col-sm-12 ">
                                <p><b>
                                    <?php
                                    echo palavraCurta(15,$registro->usuTitulo);
                                   // echo $registro->postagem;
                                    $total_comentarios = total_comentarios($registro->postagem , $idUsuario);
                                    $total_deslike = total_deslike($registro->postagem);
                                    $total_like = total_like($registro->postagem);
                                    $curtido = curtidos($registro->postagem , $idUsuario);
                                    $favoritado = favoritos($registro->postagem , $idUsuario);
                                    //print_r($total_comentarios);
                                    //echo $curtido['curtir_positivo'];
                                    if($favoritado['favorito']>0){
                                        $styleFavorito = 'color:#e8e04e';
                                    }else{
                                        $styleFavorito = 'color:#000';
                                    }
                                    if($curtido['curtir_positivo'] == 1){
                                        $stylePositivo = 'color:#0d86c6';
                                        $bloqueioPositivo = 'btn btn-default disabled';
                                    }
                                    elseif($curtido['curtir_positivo'] == 0){
                                        $stylePositivo = 'color:#000';
                                        $bloqueioPositivo = 'btn btn-default';
                                    }else{
                                        $stylePositivo = 'color:#000';
                                        $bloqueioPositivo = 'btn btn-default';
                                    }
                                    if($curtido['curtir_negativo'] == 1){
                                        $styleNegativo = 'color:#f2341a';
                                        $bloqueioNegativo = 'btn btn-default disabled';
                                    }
                                    elseif($curtido['curtir_negativo'] == 0){
                                        $styleNegativo = 'color:#000';
                                        $bloqueioNegativo = 'btn btn-default';
                                    }else{
                                        $styleNegativo = 'color:#000';
                                        $bloqueioNegativo = 'btn btn-default';
                                    }

                                    ?></b></p>
                                </div>
                                <p class="buttons">
                                    <a class="btn btn-default" 
                                    onclick="
                                    favoritar('<?php echo $registro->postagem?>','<?php echo $idUsuario ?>' )" 
                                    id="<?php echo $registro->dataTorre.$registro->postagem.'favorito' ?>">
                                    <b id="<?php echo 'favoritar'.$registro->postagem ?>"><i class="fa fa-star" style="<?php echo $styleFavorito ?>" ></i></b></a>

                                    <a class="btn btn-default"
                                    onclick="visita('<?php echo $registro->postagem?>','<?php echo $idUsuario ?>')"
                                    data-toggle="modal"
                                    data-target="<?php echo '#'.$registro->postagem ?>">
                                    <i class="fa fa-eye"></i></a>

                                    <a class="<?php echo $bloqueioNegativo ?>"
                                    onclick="
                                    mudaNegativo('<?php echo $registro->dataTorre.$registro->postagem.'negativoM' ?>');
                                    mudaPositivo('<?php echo $registro->dataTorre.$registro->postagem.'negativo' ?>');
                                    curtir('<?php echo $registro->postagem?>','<?php echo $idUsuario ?>' )"
                                    id="<?php echo $registro->dataTorre.$registro->postagem.'positivo' ?>">
                                    <small id="<?php echo 'curtir'.$registro->postagem ?>"><i class="fa fa-thumbs-up" style="<?php echo $stylePositivo ?>"></i> <?php echo $total_like ?></small></a>

                                    <a class="<?php echo $bloqueioPositivo ?>"
                                    onclick="
                                    mudaPositivo('<?php echo $registro->dataTorre.$registro->postagem.'positivoM' ?>');
                                    mudaNegativo('<?php echo $registro->dataTorre.$registro->postagem.'positivo' ?>');
                                    descurtir('<?php echo $registro->postagem?>','<?php echo $idUsuario ?>' )"
                                    id="<?php echo $registro->dataTorre.$registro->postagem.'negativo' ?>">
                                    <small id="<?php echo 'descurtir'.$registro->postagem ?>"><i class="fa fa-thumbs-down" style="<?php echo $styleNegativo ?>"></i> <?php echo $total_deslike ?></small></a>
                                </p> 
                            </div>
                            </div>
        <!-- FIM EXIBIR POSTAGEM -->
        <!-- MODAL DA POSTAGEM -->
                            <div class="modal fade " id="<?php echo $registro->postagem ?>" tabindex="-1" role="dialog" aria-labelledby="">
                              <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <div class="text-center">
                                            <a class="btn btn-default" 
                                            onclick="favoritar('<?php echo $registro->postagem?>','<?php echo $idUsuario ?>')" 
                                            id="<?php echo $registro->dataTorre.$registro->postagem.'favoritoM' ?>">
                                            <b id="<?php echo 'favoritarM'.$registro->postagem ?>"><i class="fa fa-star" style="<?php echo $styleFavorito ?>" ></i></b></a>

                                            <a class="<?php echo $bloqueioNegativo ?>"
                                            onclick="
                                            mudaNegativo('<?php echo $registro->dataTorre.$registro->postagem.'negativo' ?>');
                                            mudaPositivo('<?php echo $registro->dataTorre.$registro->postagem.'negativoM' ?>');
                                            curtir('<?php echo $registro->postagem?>','<?php echo $idUsuario ?>' )"
                                            id="<?php echo $registro->dataTorre.$registro->postagem.'positivoM' ?>">
                                            <small id="<?php echo 'curtirM'.$registro->postagem ?>"><i class="fa fa-thumbs-up" style="<?php echo $stylePositivo ?>"></i> <?php echo $total_like ?></small></a>

                                            <a class="<?php echo $bloqueioPositivo ?>"
                                            onclick="
                                            mudaPositivo('<?php echo $registro->dataTorre.$registro->postagem.'positivo' ?>');
                                            mudaNegativo('<?php echo $registro->dataTorre.$registro->postagem.'positivoM' ?>');
                                            descurtir('<?php echo $registro->postagem?>','<?php echo $idUsuario ?>' )"
                                            id="<?php echo $registro->dataTorre.$registro->postagem.'negativoM' ?>">
                                            <small id="<?php echo 'descurtirM'.$registro->postagem ?>"><i class="fa fa-thumbs-down" style="<?php echo $styleNegativo ?>"></i> <?php echo $total_deslike ?></small></a>
                                        </div>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="lista-post">
                                                <?php for ($g = 0; $g < $conta; $g++){
                                                    if ($quantasFotos[$g]!= 0){
                                                        ?>
                                                        <div class="item" id="mainImage">
                                                            <a data-toggle='modal' data-target='#modal-editar' data-id='<?php echo $registro->postagem ?>' id='btnEditar'>
                                                             <img src="imagem/post/media/<?php echo $quantasFotos[$g] ?>" alt="" class="img-responsive" >
                                                             <div class="anuncio titulo">
                                                                <div class="theribbon"><small>CONJUNTO</small></div>
                                                            </div>
                                                            <div class="anuncio risca">
                                                                <div class="theribbon"><strike><small>R$799,90</small></strike></div>
                                                            </div>
                                                            <div class="anuncio terceiro">
                                                                <div class="theribbon"><small>R$699,90</small></div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div id="dataVisita"></div>
                                    <div class="col-sm-6">
                                    <h4 class="titulo"><?php echo $registro->usuTitulo ?></h4>
                                    <hr>
                                        <small>Descritivo</small>
                                        <p><?php echo linkUsuario(linkHashtag($registro->usuDesc)) ?></p>
                                        <br>
                                        <small>Marcações</small>
                                        <p><?php echo linkLoja(linkMarca($registro->usuMarca)) ?></p>
                                    <!-- SISTEMA DE COMENTÁRIOS -->
                                    <div class="col-md-12 text-center">
                                    <a class="btn btn-dafault" onclick="carregarComentario('<?php echo $registro->postagem ?>','<?php echo $idUsuario ?>')">Meus comentários(<?php echo $total_comentarios ?>)</a>
                                    </div>
                                    <div id="<?php echo 'comentarios'.$registro->postagem ?>"></div>
                                    <!-- FIM SISTEMA DE COMENTÁRIOS -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <!-- FIM DO MODAL -->
        <!-- MODAL PARA DENUNCIA DE POSTAGENS -->
                <div class="modal fade" id="<?php echo 'DENUNCIA'.$registro->postagem ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Denúnciar Postagem</h4>
                      </div>
                      <div class="modal-body">
                        <label for="">Qual o motivo da denúncia desta postagem?</label>
                        <input type="text" class="form-control" id="denunciar"> 
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="button" onclick="denuncia('<?php echo $registro->postagem?>','<?php echo $idUsuario ?>' )"" class="btn btn-primary" data-dismiss="modal">Denúnciar</button>
                      </div>
                    </div>
                  </div>
                </div>
        <!-- FIM MODAL PARA DENUNCIA DE POSTAGENS -->
                <?php
            }
            endforeach;
            ?>
            <!-- whishlist -->
            <div class="col-md-12 text-center">
                <div class="pages">
                    <ul class="pagination">
                        <?php
                        $qtdPaginacao = 6;
                        $pgAtual = isset($_GET['pgAtual']) ? $_GET['pgAtual'] : 1;
                        $paginacao = paginacao($numPaginas, $qtdExibida, $pgAtual, $qtdPaginacao);

                        echo '<li><a href="'.$_GET['pg'].'&pgAtual=1#hot">&laquo;</a></li>';
                        for ($pgA = $paginacao[0]; $pgA < $paginacao[1]; $pgA++){
                            echo '<li><a href="'.$_GET['pg'].'&pgAtual='.$pgA.'#hot">'.$pgA.'</a></li>';
                        }
                        echo '<li><a href="'.$_GET['pg'].'&pgAtual='.$paginacao[2].'#hot">&raquo;</a></li>';
                        $executionEndTime = microtime(true);
                        $seconds = $executionEndTime - $executionStartTime;
                        cadastro_tempoPagina($pagina, $idUsuario, $seconds, $hora, $data);
                        ?>
                    </ul>
                </div>
            </div>
        </div>

        <!-- /.container -->

    </div>


            <!-- *** GET INSPIRED ***
            _________________________________________________________ -->
            <div class="container" data-animate="fadeInUpBig">
                <div class="col-md-12">
                    <div class="box slideshow">
                        <h3>PUBLICIDADE</h3>
                        <p class="lead">Área publicitária</p>
                        <div id="get-inspired" class="owl-carousel owl-theme">
                            <div class="item">
                                <a href="#">
                                    <img src="img/getinspired1.jpg" alt="Get inspired" class="img-responsive">
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <img src="img/getinspired2.jpg" alt="Get inspired" class="img-responsive">
                                </a>
                            </div>
                            <div class="item">
                                <a href="#">
                                    <img src="img/getinspired3.jpg" alt="Get inspired" class="img-responsive">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- *** GET INSPIRED END *** -->

            <!-- *** BLOG HOMEPAGE ***
            _________________________________________________________ -->

            <div class="box text-center" data-animate="fadeInUp">
                <div class="container">
                    <div class="col-md-12">
                        <h3 class="text-uppercase">PUBLIQUE NESTA TORRE</h3>

                        <p class="lead">Quer aparecer nessa torre? <a href="blog.html">Clique aqui</a>!
                        </p>
                    </div>
                </div>
            </div>

            <div class="container">

                <div class="col-md-12" data-animate="fadeInUp">

                    <div id="blog-homepage" class="row">
                        <div class="col-sm-6">
                            <div class="post">
                                <h4><a href="post.html">Fashion now</a></h4>
                                <p class="author-category">By <a href="#">John Slim</a> in <a href="">Fashion and style</a>
                                </p>
                                <hr>
                                <p class="intro">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean
                                    ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                                    <p class="read-more"><a href="post.html" class="btn btn-primary">Continue reading</a>
                                    </p>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="post">
                                    <h4><a href="post.html">Who is who - example blog post</a></h4>
                                    <p class="author-category">By <a href="#">John Slim</a> in <a href="">About Minimal</a>
                                    </p>
                                    <hr>
                                    <p class="intro">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean
                                        ultricies mi vitae est. Mauris placerat eleifend leo.</p>
                                        <p class="read-more"><a href="post.html" class="btn btn-primary">Continue reading</a>
                                        </p>
                                    </div>

                                </div>

                            </div>
                            <!-- /#blog-homepage -->
                        </div>
                    </div>
                    <!-- /.container -->

                    <!-- *** BLOG HOMEPAGE END *** -->


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
           <!-- MODAL DA CRIAÇÃO DE PÁGINAS GRATUITAS -->
           </div>
           <script src="js/jquery-1.11.0.min.js"></script>
           <script src="js/bootstrap.min.js"></script>
           <script src="js/jquery.cookie.js"></script>
           <script src="js/waypoints.min.js"></script>
           <script src="js/modernizr.js"></script>
           <script src="js/bootstrap-hover-dropdown.js"></script>
           <script src="js/owl.carousel.min.js"></script>
           <script src="js/front.js"></script>
           <script src="js/jquery.textcomplete.js"></script>
           <script src="js/bootstrap-carousel.js"></script>

<script type="text/javascript">

     function Mudarestado(el) {
        var display = document.getElementById(el).style.display;
        if(display == "block")
            document.getElementById(el).style.display = 'none';
        else
            document.getElementById(el).style.display = 'block';

    }
    function Mudarestado1(el) {
        var display = document.getElementById(el).style.display;
        if(display == "none")
            document.getElementById(el).style.display = 'block';
        else
            document.getElementById(el).style.display = 'none';

    }

</script>

<script type="text/javascript">
    function favoritar(idPost, idUsuario){
        $.ajax({
            url:'ajax/favoritos.php',
            type:'POST',
            data:{idPost:idPost, idUsuario:idUsuario},
            success:function(data){
                $("#favoritar"+idPost).html(data);
                $("#favoritarM"+idPost).html(data);
            }
        })
    }
</script>
<script type="text/javascript">
    function mudaPositivo(el) {
        var btnStar = document.getElementById(el);
        if (btnStar.classList == "btn btn-default disabled") {
            btnStar.classList = "btn btn-default";
        } else {
            btnStar.classList = "btn btn-default disabled";
        }

    }
    function mudaNegativo(el) {
        var btnStar = document.getElementById(el);
        if (btnStar.classList == "btn btn-default disabled") {
            btnStar.classList = "btn btn-default";
        } else {
            btnStar.classList = "btn btn-default disabled";
        }
    }
    function descurtir(idPost, idUsuario){
        var positivo = 0;
        var negativo = 1;
        $.ajax({
            url:'ajax/curtidas.php',
            type:'POST',
            data:{positivo:positivo, negativo:negativo, idPost:idPost, idUsuario:idUsuario},
            beforeSend: function(){
                $("#descurtir").html('load..');
            },
            success:function(data){
                $("#descurtir"+idPost).html(data);
                $("#descurtirM"+idPost).html(data);
            },
            error: function(){
                $("#descurtir").html('erro ao enviar');
            }
        })
    }
    function curtir(idPost, idUsuario){
        var positivo = 1;
        var negativo = 0;
        $.ajax({
            url:'ajax/curtidas.php',
            type:'POST',
            data:{positivo:positivo, negativo:negativo, idPost:idPost, idUsuario:idUsuario},
            beforeSend: function(){
                $("#curtir").html('load..');
            },
            success:function(data){
                $("#curtir"+idPost).html(data);
                $("#curtirM"+idPost).html(data);
            },
            error: function(){
                $("#curtir").html('erro ao enviar');
            }
        })
    }
    function visita(idPost, idUsuario){
        $.ajax({
            url:'ajax/visitas.php',
            type:'POST',
            data:{idPost:idPost, idUsuario:idUsuario},

        success:function(data){
                $("#dataVisita").html(data);
            },
        })
    }
    function denuncia(idPost, idUsuario){
        $.ajax({
            url:'ajax/denuncia.php',
            type:'POST',
            data:{idPost:idPost, idUsuario:idUsuario},
        success:function(data){
                $("#denunciado").html(data);
            },

        })
    }
</script>
<script type="text/javascript">
        function carregarComentario(idPost, idUsuario) {
                        $.ajax({
                            url: 'ajax/comentario.php',
                            type: 'POST',
                            data: {carrega:idPost, idUsuario:idUsuario},
                            beforeSend: function(){
                                $("#comentarios"+idPost).html("");
                            },
                            success: function(data)
                            {
                                $("#comentarios"+idPost).html(data);

                            },
                            error: function(){
                                $("#comentarios"+idPost).html("Erro ao enviar...");
                            }
                        })
                    }
        function comentarPost(idPost, idUsuario) {
                         var comentario = $("#comentario"+idPost).val();
                        if (comentario > ''){
                            $.ajax({
                                url: 'ajax/comentario.php',
                                type: 'POST',
                                data: {comment:comentario, idPost:idPost, idUsuario:idUsuario},
                                beforeSend: function(){
                                    $("#postagem"+idPost).html("load..");
                                },
                                success: function(data)
                                {
                                    $("#postagem"+idPost).html(data);
                                    $("#comentario"+idPost).val('');

                                },
                                error: function(){
                                    $("#postagem"+idPost).html("Erro ao enviar...");
                                }
                            })
                        }
                    }
        function atualizarPost(idPost, idComentario, idUsuario) {
                     var comentario = $("#textResp"+idPost+idComentario).val();
                     if (comentario > ''){
                        $.ajax({
                            url: 'ajax/comentario.php',
                            type: 'POST',
                            data: {atualiza:comentario, idPost:idPost, idUsuario:idUsuario ,idComentario:idComentario},
                            beforeSend: function(){
                                $("#atualiza"+idPost).html("load..");
                            },
                            success: function(data)
                            {
                                $("#atualiza"+idPost+idComentario).html(data);

                            },
                            error: function(){
                                $("#atualiza"+idPost).html("Erro ao enviar...");
                            }
                        })
                    }
                }
        function excluirComentario(idPost, idComentario, idUsuario){
            var excluir = 1;
                    $.ajax({
                        url: 'ajax/comentario.php',
                        type: 'POST',
                        data: {excluir:excluir, idPost:idPost, idUsuario:idUsuario ,idComentario:idComentario},
                        beforeSend: function(){
                            $("#acao"+idPost).html("load..");
                        },
                        success: function(data)
                        {
                            $("#acao"+idPost+idComentario).html(data);

                        },
                        error: function(){
                            $("#acao"+idPost).html("Erro ao enviar...");
                        }
                    })
        }
</script>


</body>

</html>