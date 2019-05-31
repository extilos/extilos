<div class="no-gutters" id="fotos">
                <?php
                       require 'include/modulos/front/universal/exibir_conteudo.php';
                    ?>
                <div class="col-md-3 no-gutters">
                    <?php
                        //BARRA LATERAL - ALBUM DE FOTOS
                         include 'include/modulos/front/blog/bloco-lateral-album-adm.php';
                    ?>
                    <?php
                        //BARRA LATERAL - ALBUM DE FOTOS
                         include 'include/modulos/front/blog/bloco-lateral-album-blog.php'; 
                    ?>
                    <?php
                        //BARRA LATERAL - ALBUM DE FOTOS
                         include 'include/modulos/front/blog/bloco-lateral-album-loja.php';
                    ?>

                    
                </div>
                 <?php if($idUsuario > 1){ ?>
                        <div class="box col-sm-9">
                            <?php 
                            include 'include/modulos/front/blog/botao-publicacao.php';
                            //include 'include/modulos/front/blog/enviar-publicacao.php';
                            include 'include/modulos/front/blog/enviar-publicacao-produto.php';
                            ?>
                        </div>
                    <?php  } ?>
                <div id="hot" class="box col-md-9 no-gutters">
                    
                       
                        <?php 
                            //INCLUDE MODULO DE EXIBIÇÃO DE POSTAGENS
                        //echo $idPagina;
                        $ordem = 1;
                        $tamanhoGrid = 4;
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
                            $tipoBusca = 'blog';
                            $idBusca = $idPagina; 
                        }
                        //echo $tipoBusca;
                        //echo $idBusca;
                        $qtdSolicitada = 10;
                        $qtdExibida = 8;

                        //echo $idBusca;
                       // require 'include/modulos/front/universal/exibe_postagens.php';
                        postagens($idUsuario,$tokenDia,$idTorre,$idPagina,$idBusca,$tipoBusca,$qtdSolicitada,$qtdExibida,$tamanhoGrid,$ordem); 
                    ?>
                </div>
            </div>