<?php
include_once 'functions/iniciar.php';
include_once 'functions/functions.php';
include_once 'functions/conexoes.php';
include_once 'functions/functions.php';
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
$idtorre = 3;
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

    <!-- your stylesheet with modifications -->
    <link href="<?php echo $caminho ?>css/meu.css" rel="stylesheet">

    <script src="<?php echo $caminho ?>js/respond.min.js"></script>
    <link rel="extilos icon" href="favicon.png">
</head>
<body>
    <div id="all">
        <?php include_once'include/barra-superior.php' ;

        ?>
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
                    <div class="col-sm-3 hidden-xs">
                        <h3 class="responsive">♜ | <?php echo $dadosTorre['nomeTorre'] ?></h3>
                        <p><?php echo $dadosTorre['cidadeTorre'].'-'.$dadosTorre['estadoTorre'] ?>.</p>
                    </div>
                    <div class="col-sm-12 visible-xs">
                        <h4 class="responsive">♜ | <?php echo $dadosTorre['nomeTorre'] ?></h4>
                        <small><?php echo $dadosTorre['cidadeTorre'].'-'.$dadosTorre['estadoTorre'] ?>.</small>
                        <hr>
                    </div>
                    <div class="col-sm-9">
                        <div class="col-sm-12">
                            <div class="col-sm-2 "><small><i class="fa fa-star"></i> Blog: <b><?php echo $paginasTorres ?></b> </small></div>
                            <div class="col-sm-2"><small><i class="fa fa-star"></i> Lojas: <b><?php echo $paginasTorres ?> </b></small></div>
                            <div class="col-sm-2"><small><i class="fa fa-star"></i> Fãs: <b><?php echo $paginasTorres ?> </b></small></div>
                            <div class="col-sm-3"><small><i class="fa fa-star"></i>Pontuação: <b>585</b></small></div>
                            <div class="col-sm-3"><small><i class="fa fa-star"></i>Ranking: <b>32º</b></small></div>
                        </div>
                        <div class="col-sm-12 hidden-xs">
                            <br>
                            <p><?php echo $dadosTorre['descTorre'] ?>.</p>
                        </div>
                        <div class="col-sm-12 visible-xs">
                            <br>
                            <small><?php echo $dadosTorre['descTorre'] ?>.</small>
                            <hr>
                        </div>
                    </div>
                    <ul class="nav nav-tabs nav-justified">
                      <li class="active"><a href="torre">INICIO</a></li>
                      <li><a href="post">POSTAGENS</a></li>
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

                    <div id="" >
                        <?php 
                        $idTorre = 1;
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
                        // busca os post relacionado a esta torra
                    $torre_post = torre_post($idTorre, 0, $fim);
                        // Decodifica o formato JSON e retorna um Objeto
                    $json = json_decode($torre_post);
                        // conta quantos registros existem no json
                    $numPaginas = count($json);
                        // Loop para percorrer o Objeto
                    foreach(array_slice($json, $inicio, $qtdExibida) as $registro):
                        if($registro->postagem > ''){
                            ?>
                            <div class="box slideshow col-sm-3 ">
                                <div class="col-sm-12 ">
                                <select class="form-control" name="formaPro">
                                 <?php 
                                // busca a página que publicou o conteúdo
                                 $idPostagem = $registro->postagem;
                                 $pg_conteudo = pg_conteudo($idPostagem);
                                 while ($conteudo = $pg_conteudo->fetch(PDO::FETCH_ASSOC)):
                                    //verifica se a página que publicou participa desta torre
                                    $validarPost = verifica_pg_tr($conteudo['id_pagina'], $idTorre);
                                    if ($validarPost['retorno'] == 'aceito'){
                                        $nomePagina = busca_blog($conteudo['id_pagina']);
                                         echo '<option value="0"><small><i class="fa fa-th-large"></i></small>'.$nomePagina['nomePagina'].' </option>';
                                    }
                                    //verifica se a o conteúdo pode ser publicado
                                endwhile;
                                ?>
                                </select>
                                </div>
                            <hr>
                            <!-- FOTOS DO ALBUM -->
                            <div class="owl-carousel owl-theme product-slider visible-xs ">
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
                                        <div class="banner visible-xs ">
                                            <a href="#">
                                               <img src="imagem/post/media/<?php echo $quantasFotos[$g] ?>" alt="" class="img-responsive" >
                                           </a>
                                       </div>
                                       <?php
                                   }
                               }
                               ?>
                           </div>
                           <div class="hidden-xs col-sm-12">
                            <div class="col-sm-12 ">
                                <div id="mainImage ">
                                    <img src="imagem/post/mini/<?php echo $registro->img ?>" alt="" class="img-responsive" >
                                </div>
                                <div class="ribbon sale">
                                    <div class="theribbon">SALE</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <div class="ribbon new">
                                    <div class="theribbon">NEW</div>
                                    <div class="ribbon-background"></div>
                                </div>
                            </div>
                        </div>
                        <p><?php echo palavraCurta(20,$registro->usuDesc)?></p>
                        <p class="buttons">
                            <a type='button' href='#editar' class='btn btn-default' data-toggle='modal' data-target='#modal-editar' data-id='<?php echo $fotos['idImg']; ?>' id='btnEditar' > VER MAIS

                                <a href="basket.html" class="btn btn-primary"><i class="fa fa-star"></i>Add FAVORITO</a>
                            </p>
                        </div>
                        <?php
                    }
                    endforeach;
                    
                    //$conta = count($json->postagem);
                    //$ultimoPost = end($contaPost);
                        //echo $totalPost;
                        //echo $ultimoPost;
                    ?>
                </div>
                <!-- whishlist -->
                <div class="col-md-12 text-center">
                    <div class="pages">
                        <ul class="pagination">
                            <?php
                            $qtdPaginacao = 6;
                            $pgAtual = isset($_GET['pgAtual']) ? $_GET['pgAtual'] : null;
                            $paginacao = paginacao($numPaginas, $qtdExibida, $pgAtual, $qtdPaginacao);

                            echo '<li><a href="'.$_GET['pg'].'&pgAtual=1#hot">&laquo;</a></li>';
                            for ($pgA = $paginacao[0]; $pgA < $paginacao[1]; $pgA++){
                                echo '<li><a href="'.$_GET['pg'].'&pgAtual='.$pgA.'#hot">'.$pgA.'</a></li>';
                            }
                            echo '<li><a href="'.$_GET['pg'].'&pgAtual='.$paginacao[2].'#hot">&raquo;</a></li>';
                            ?>
                        </ul>
                    </div>
                </div>

            </div>
            <!-- /.container -->

        </div>
        <!-- /#hot -->


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
     <div class="modal fade" id="modal-editar" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
        <div class=" modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="Login">Breve apresentação de cada página.</h4>
                </div>
                <div class="modal-body">
                  <div class="container-fluid">
                    <div class="row">

                        <div  id="resultado">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
$(document).on("click", "#btnEditar", function () {
    var info = $(this).attr('data-id');
    var str = info.split('|');
    var meuid = str[0];
    var minhadata = str[1];
    $(".modal-body #meuid").val(meuid);
    $(".modal-body #minhadata").val(minhadata);
    $.ajax({
        url: 'functions/editar-produto.php',
        type: 'POST',
        data: {idAlbum:meuid},
        beforeSend: function(){
            $(".modal-body #resultado").html("Carregando...");
        },
        success: function(data)
        {
            $(".modal-body #resultado").html(data);
        },
        error: function(){
            $(".modal-body #resultado").html("Erro ao enviar...");
        }
    })
});
</script>


</body>

</html>