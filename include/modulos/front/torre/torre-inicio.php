
            <div id="advantages">

                <div class="container-fluid">
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
            
             <div id="hot">
        <div class="box">
            <div class="container">
                <div class="col-md-12">
                    <h2>RANKING TORRE</h2>
                </div>
            </div>
        </div>
        <div class="box">
            <?php 
                        //INFORMAÇÕES NECESSÁRIAS
            $idUsuario = 0;
            $tokenDia = $_SESSION['tokenDia'];
            $idTorre = $idTorre;
            $idPagina = 0;
            $idBusca = $idTorre;
                        //$tipoBusca = 'index';
            $qtdSolicitada = 8;
            $qtdExibida = 4;
            $tamanhoGrid = 3;
            $ordem = 1;
            if(isset($_GET['cd'])){
                if($_GET['tp'] == 'blog'){
                    $idBusca = ($_GET['cd']/251);
                    $tipoBusca = 'album_blog';
                }
                if($_GET['tp'] == 'usu'){
                    $idBusca = ($_GET['cd']/251);
                    $tipoBusca = 'album_usuario';
                }
            }else{
                $tipoBusca = 'torre-ranking';
            }
            postagens($idUsuario,$tokenDia,$idTorre,$idPagina,$idBusca,$tipoBusca,$qtdSolicitada,$qtdExibida,$tamanhoGrid,$ordem);
               // postagens($idUsuario,$tokenDia,$idBusca,$tipoBusca,$qtdSolicitada,$qtdExibida) 
            ?>
            <!-- /.container -->
        </div>
    </div>

           <?php  
               // apresentaPaginasTorre($idTorre,0,4,13);
           ?>


            <?php  include 'include/modulos/front/publicidade/bloco-publicidade-banner-grande-torre.php'; ?>
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
