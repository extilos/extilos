<?php
include_once '../../functions/functions.php';
include_once '../../functions/conexoes.php';
require_once '../../conn/init.php';
include_once '../../cadastros/caracteres-especiais.php';
?>
<div class="container">

                    <div id="" >
                        <?php 
                        $idTorre = 1;
                        // informa a quantidade de post para exibir
                        $inicio = 0;
                        $fim = 1;
                        // busca os post relacionado a esta torra
                        $torre_post = torre_post($idTorre, $inicio, $fim);
                        // Decodifica o formato JSON e retorna um Objeto
                        $json = json_decode($torre_post);
                        
                        // Loop para percorrer o Objeto
                        foreach($json as $registro):
                            if($registro->idPost > ''){
                        ?>
                            <div class="box slideshow col-sm-3 ">
                               <?php 
                                    // busca a página que publicou o conteúdo
                                        $idPostagem = $registro->postagem;
                                        $pg_conteudo = pg_conteudo($idPostagem);
                                        while ($conteudo = $pg_conteudo->fetch(PDO::FETCH_ASSOC)):
                                            $nomePagina = busca_blog($conteudo['id_pagina']);
                                           echo '<p>'.$nomePagina['nomePagina'].'</p>';
                                        endwhile;
                                ?>
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
                                <!-- /.ribbon -->

                                <div class="ribbon new">
                                    <div class="theribbon">NEW</div>
                                    <div class="ribbon-background"></div>
                                </div>
                                <!-- /.ribbon -->

                            </div>
                        </div>
                        <p><?php echo palavraCurta20($registro->usuDesc)?></p>
                        <p class="buttons">
                            <a type='button' href='#editar' class='btn btn-default' data-toggle='modal' data-target='#modal-editar' data-id='<?php echo $fotos['idImg']; ?>' id='btnEditar' > VER MAIS

                                <a href="basket.html" class="btn btn-primary"><i class="fa fa-star"></i>Add FAVORITO</a>
                            </p>
                        </div>
                        <?php
                        $contaPost[] = $registro->idPost;
                    }
                        endforeach;
                        $conta = count($contaPost);
                        $ultimoPost = end($contaPost);
                        $totalPost = total_post($idTorre);
                        echo $totalPost;
                        echo $ultimoPost;
                        ?>
                    </div>
                    <!-- whishlist -->
                    <div class="col-md-12 text-center">
                        <div class="pages">
                            <ul class="pagination">
                                <li><a href="#">&laquo;</a>
                                </li>
                                <?php  ?>
                                <li class="active"><a href="?t=1">1</a>
                                </li>
                                <li><a href="?t=2">2</a>
                                </li>
                                <li><a href="#">3</a>
                                </li>
                                <li><a href="#">4</a>
                                </li>
                                <li><a href="#">5</a>
                                </li>
                                <li><a href="#">&raquo;</a>
                                </li>
                                <?php ?>
                            </ul>
                        </div>
                    </div>

                </div>