    <div class="no-gutters">
                <div class="box ">
                    <!-- SLIDE DE CAPA DA TORRE -->
                    <div id="main-slider">
                        <div class="item">
                            <img src="/extilos/img/slider2.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="item">
                            <img src="/extilos/img/slider4.jpg" alt="" class="img-responsive">
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
                                    <div class="col-xs-6 col-sm-3"><small><i class="fa fa-star"></i> Blogs: <b><?php echo conta_pagina_torre($idTorre) ?></b> </small></div>
                                    <div class="col-xs-6 col-sm-3"><small><i class="fa fa-star"></i> Lojas: <b><?php echo $paginasTorres ?> </b></small></div>
                                    <div class="col-xs-6 col-sm-3"><small><i class="fa fa-star"></i> Pontos: <?php echo soma_pontos($idTorre,'torre') ?> <b></b></small></div>
                                    <div class="col-xs-6 col-sm-3"><small><i class="fa fa-star"></i> Ranking: <b>?</b></small></div>
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
                                 <?php if(!isset($_GET['pag'])){ ?>
                                      <li class="active"><a href="<?php echo $nomeTorre.'&pag=inicio' ?>">INICIO</a></li>
                                      <li><a href="<?php echo $nomeTorre.'&pag=fotos' ?>">FOTOS</a></li>
                                      <li><a href="<?php echo $nomeTorre.'&pag=lojas' ?>">LOJAS</a></li>
                                      <li><a href="<?php echo $nomeTorre.'&pag=blogs' ?>">BLOGS</a></li>
                                      <li><a href="<?php echo $nomeTorre.'&pag=eventos' ?>">EVENTOS</a></li>
                                      <li><a href="<?php echo $nomeTorre.'&pag=contato' ?>">CONTATO</a></li>
                                 <?php }else{ ?>
                                        <?php if($_GET['pag'] == 'inicio'){ ?>
                                        <li class="active"><a href="<?php echo $nomeTorre.'&pag=inicio' ?>">INICIO</a></li>
                                        <?php }else{ ?>
                                        <li><a href="<?php echo $nomeTorre.'&pag=inicio' ?>">INICIO</a></li>
                                        <?php } ?>

                                        <?php if($_GET['pag'] == 'fotos'){ ?>
                                        <li class="active"><a href="<?php echo $nomeTorre.'&pag=fotos' ?>">FOTOS</a></li>
                                        <?php }else{ ?>
                                        <li><a href="<?php echo $nomeTorre.'&pag=fotos' ?>">FOTOS</a></li>
                                        <?php }?>

                                        <?php if($_GET['pag'] == 'lojas'){ ?>
                                        <li class="active"><a href="<?php echo $nomeTorre.'&pag=lojas' ?>">LOJAS</a></li>
                                        <?php }else{ ?>
                                        <li><a href="<?php echo $nomeTorre.'&pag=lojas' ?>">LOJAS</a></li>
                                        <?php }?>

                                        <?php if($_GET['pag'] == 'blogs'){ ?>
                                        <li class="active"><a href="<?php echo $nomeTorre.'&pag=blogs' ?>">BLOGS</a></li>
                                        <?php }else{ ?>
                                        <li><a href="<?php echo $nomeTorre.'&pag=blogs' ?>">BLOGS</a></li>
                                        <?php }?>

                                        <?php if($_GET['pag'] == 'eventos'){ ?>
                                        <li class="active"><a href="<?php echo $nomeTorre.'&pag=eventos' ?>">EVENTOS</a></li>
                                        <?php }else{ ?>
                                        <li><a href="<?php echo $nomeTorre.'&pag=eventos' ?>">EVENTOS</a></li>
                                        <?php }?>

                                        <?php if($_GET['pag'] == 'contato'){ ?>
                                        <li class="active"><a href="<?php echo $nomeTorre.'&pag=contato' ?>">CONTATO</a></li>
                                        <?php }else{ ?>
                                        <li><a href="<?php echo $nomeTorre.'&pag=contato' ?>">CONTATO</a></li>
                                        <?php }?>
                                    <?php } ?>
                          </ul>

                </div>
            </div>