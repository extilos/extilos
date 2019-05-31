<div class="container-fluid no-gutters">
                <?php
                       require 'include/modulos/front/universal/exibir_conteudo.php';
                    ?>
                <div class="col-md-3">
                    <?php
                        //BARRA LATERAL - ALBUM DE FOTOS
                         include 'include/modulos/front/blog/bloco-lateral-album-loja.php';
                    ?>
                    <!-- *** MENUS AND FILTERS END *** -->

                    
                </div>
                
                    
                    <?php if($idUsuario > 1){ ?>
                        <div class="box col-sm-9">
                            <?php 
                            include 'include/modulos/front/blog/botao-publicacao.php';
                            //require 'include/modulos/front/blog/enviar-publicacao.php';
                            require 'include/modulos/front/blog/enviar-publicacao-produto.php';
                            ?>
                        </div>
                    <?php  } ?>
                <div class="col-md-3">
                                       
                </div>
                <div class="box col-md-9">
                        <?php 
                            //INCLUDE MODULO DE EXIBIÇÃO DE POSTAGENS
                        //echo $idPagina;
                        $ordem = 1;
                        $tamanhoGrid = 4;
                        if(isset($_GET['cd'])){
                            if($_GET['tp'] == 'produtos'){
                                $idBusca = ($_GET['cd']/251);
                                $tipoBusca = 'album_blog';
                            }
                            if($_GET['tp'] == 'usu'){
                                $idBusca = ($_GET['cd']/251);
                                $tipoBusca = 'album_usuario';
                            }
                        }else{
                            $tipoBusca = 'produtos';
                            $idBusca = $idPagina; 
                        }
                       // echo $tipoBusca;
                       // echo $idBusca;
                        $qtdSolicitada = 10;
                        $qtdExibida = 8;

                        //echo $idBusca;
                        
                        postagens_conteudo($idUsuario,$tokenDia,$idTorre,$idPagina,$idBusca,$tipoBusca,$qtdSolicitada,$qtdExibida,$tamanhoGrid,$ordem); 
                    ?>
                </div>
            </div>