<?php
ob_start();
session_start();
require_once '../conn/init.php';
require_once '../cadastros/caracteres-especiais.php';
include_once 'functions.php';
include_once 'conexoes.php';
$PDO = db_connect();


            $fotos = editar_album($_POST['idAlbum']);
            ?>
                            <h4><?php echo palavraCurta20($fotos['usuTitulo']) ?></h4>
                            <?php
                                $retorno = linkHashtag($fotos['usuDesc']);
                                $marca = linkMarca($fotos['usuMarca']);
                                $idAleatorio = uniqid($fotos['idImg'].'0');
                                $idAleatorio1 = uniqid($fotos['idImg'].'1');
                                $idAleatorio2 = uniqid($fotos['idImg'].'2');
                                $idAleatorio3 = uniqid($fotos['idImg'].'3');
                            ?>
                    <div class="col-md-6 ml-auto">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                          <?php
                                                        $foto0 = isset($fotos['img']) ? $fotos['img'] : null;
                                                        $foto1 = isset($fotos['img1']) ? $fotos['img1'] : null;
                                                        $foto2 = isset($fotos['img2']) ? $fotos['img2'] : null;
                                                        $foto3 = isset($fotos['img3']) ? $fotos['img3'] : null;
                                                        $foto4 = isset($fotos['img4']) ? $fotos['img4'] : null;

                                                        $quantasFotos = array($foto0, $foto1, $foto2, $foto3, $foto4);
                                                        $conta = count($quantasFotos); ?>
                                                        <div class="item active">
                                                                    <a href="#">
                                                                       <img src="imagem/post/grande/<?php echo $fotos['img'] ?>" alt="" class="img-responsive" >
                                                                   </a>
                                                               </div>
                                                            <?php
                                                        for ($g = 1; $g < $conta; $g++){
                                                            if ($quantasFotos[$g]!= 0){
                                                                ?>
                                                                <div class="item">
                                                                    <a href="#">
                                                                       <img src="imagem/post/grande/<?php echo $quantasFotos[$g] ?>" alt="" class="img-responsive" >
                                                                   </a>
                                                               </div>
                                                               <?php
                                                           }
                                                       }
                                                       ?>
                                        </div>
                                   <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                      <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
                                </div>
                        </div>
            <div class="col-md-6 ml-auto">
                                    <div class="col-md-12">
                                    <?php if ($retorno[3] < 20) { ?>
                                        <p> <?php echo $retorno[0]; ?> </p>
                                    <?php  }else{ ?>
                                        <p id="<?php echo $idAleatorio  ?>"" style="display:block;" > <?php echo $retorno[2]; ?>
                                        <a  onclick=" 
                                            Mudarestado('<?php echo $idAleatorio ?>');
                                            Mudarestado1('<?php echo $idAleatorio1 ?>');
                                            this.style.display = ''">...mais</a>
                                        </p>
                                        <p id="<?php echo $idAleatorio1 ?>" style="display:none;"><?php echo $retorno[1] ?>
                                        <a  onclick=" 
                                            Mudarestado('<?php echo $idAleatorio ?>');
                                            Mudarestado1('<?php echo $idAleatorio1 ?>');
                                            this.style.display = ''"><< menos</a>
                                        </p>
                                    <?php  } ?>
                            </div>
                                <div class="col-md-12">
                                    <?php if ($marca[3] < 20) { ?>
                                        <p> <?php echo $marca[0]; ?> </p>
                                    <?php  }else{ ?>
                                        <p id="<?php echo $idAleatorio2  ?>"" style="display:block;" > <?php echo $marca[2]; ?>
                                        <a  onclick=" 
                                            Mudarestado('<?php echo $idAleatorio2 ?>');
                                            Mudarestado1('<?php echo $idAleatorio3 ?>');
                                            this.style.display = ''">...mais >></a>
                                        </p>
                                        <p id="<?php echo $idAleatorio3 ?>" style="display:none;"><?php echo $marca[1] ?>
                                            <a  onclick=" 
                                            Mudarestado('<?php echo $idAleatorio2 ?>');
                                            Mudarestado1('<?php echo $idAleatorio3 ?>');
                                            this.style.display = ''"><< menos</a>
                                        </p>
                                    <?php  }?>
                            </div>
                            </div>
            </div>
