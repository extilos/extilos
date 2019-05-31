<?php
function postagens_conteudo($idUsuario,$tokenDia,$idTorre,$idPagina,$idBusca,$tipoBusca,$qtdSolicita,$qtdExibida,$tamanhoGrid,$ordem){
    ?>
    <div class="row no-gutters">
        <?php 
    //$idUsuario = 2;
    //$idTorre = 0; //se o tipo de busca é 'index'
    //$idPagina = 0;
    //total de post que existe na torre
    //$totalPost = total_post($idTorre);
    // requisitar numero de valores do banco lembrando que se um registro é tirado ele continua contando
    // $qtdSolicita = 20;
    // informa a quantidade de post para exibir
    // $qtdExibida = 4;
    //calculo para saber a quantidade de páginas na paginação
    //if (isset($_GET['pgAtual'])){
     //   $inicio = (($_GET['pgAtual'] * $qtdExibida) - $qtdExibida);
    //    $fim = $qtdSolicita;
    //}else{
    //    $inicio = 0;
    //    $fim = $qtdSolicita;
    //}
        $inicio = 0;
        $fim = 100;
        $qtdExibida = isset($_GET['qtde']) ? $_GET['qtde'] : 20;

                        // busca os post relacionado a esta torre ou pagina
        $busca_post = buscar_post($idBusca, $tipoBusca, 0, $fim, $ordem);
                        // Decodifica o formato JSON e retorna um Objeto
        if(!isset($busca_post)){
            echo '<div class="box col-sm-12 text-center slideshow"><p>SEM PUBLICAÇÕES PARA EXIBIR</p></div>';
        }else{
            $json = json_decode($busca_post);
                        // conta quantos registros existem no json
            $numPaginas = count($json);
            $qtdPaginas = intval($numPaginas/$qtdExibida)+ 1;
                        // Loop para percorrer o Objeto
            ?>
            

        <div class="" >
            <?php 
            for ($p = 0; $p < $qtdPaginas  ; $p++) { 

              $inicio = $qtdExibida * $p;

              ?>
              <div class="panel-collapse collapse <?php if($p == 0){echo 'show';} ?> " id="<?php echo 'P'.$p ?>">

               <?php

               foreach(array_slice($json, $inicio, $qtdExibida) as $registro):
                if($registro->temFoto == 'sim'){
                                        // busca a página que publicou o conteúdo
                    $idPostagem = $registro->postagem;
                    $pg_conteudo = pg_conteudo($idPostagem);
                    $blogAleatorio = $pg_conteudo['id_pagina'];
                    $nomePagina = busca_blog($pg_conteudo['id_pagina']);
                    $nomeBlog = $nomePagina['nomePagina'];
            $visitado = visitas($registro->postagem,$tokenDia); //verifica se foi visitado o post
            ?>
            <!-- EXIBIR POSTAGEM -->
            <div class="box slideshow col-sm-<?php echo $tamanhoGrid ?> ">
                <div class="col-sm-9 col-xs-9 text-left">
                    <p>Por:
                        <a href="/extilos/blog/<?php echo $nomeBlog?>" target="_blank"><?php echo '<i class="fa fa-user"></i>|'.$nomeBlog.$registro->arrobaUsuario ?></a></p>
                    </div>
                    <?php if($idUsuario > 1){ ?>
                        <div class="col-sm-2 col-xs-2 text-right">
                            <button class="btn btn-link btn-sm" data-toggle="modal" data-target="<?php echo '#DENUNCIA'.$registro->postagem ?>" ><i class="fa fa-ban" style="color:#ed0000"></i></button>
                        </div>
                    <?php } ?>
                    <div id="denunciado"></div>
                    <div class="col-sm-12">

                        <!-- FOTOS DO ALBUM -->
                        <div class="lista-post" id="foto<?php echo $registro->postagem?>" style="display: block">
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
                                           <img src="/extilos/imagem/post/media/<?php echo $quantasFotos[$g] ?>" alt="" class="img-responsive" >

                                           <div class="promocao titulo">
                                            <div class="theribbon"><small>PRODUTO</small></div>
                                        </div>    
                                        <div class="anuncio risca">
                                            <div class="theribbon"><small><?php echo soma_pontos($idPostagem,'post').'<small> pts</small>'; ?></small></div>
                                        </div>
                                        
                                        <!--<div class="promocao prof">
                                            <div class="theribbon"><small>DESTAQUE</small></div>
                                        </div> 
                                        <div class="promocao destaque">
                                            <div class="theribbon"><small>PROFISSIONAL</small></div>
                                        </div> -->
                                    </a>
                                </div>
                                <?php
                            }
                        }
                        ?>

                        
                    </div>
                    <div class="card" id="info<?php echo $registro->postagem?>" style="display: none; height: 400px">
                        <?php 
                        if ($registro->produto > 0){
                            $busca_produtos = buscaProduto($registro->postagem);
                            $json_produto = json_decode($busca_produtos);
                            foreach ($json_produto as $prod) {
                               ?>
                               <div class="col-xs-4">
                                <img src="/extilos/imagem/post/media/<?php echo $quantasFotos[0] ?>" alt="" class="img-responsive" style="height: 100px" >
                            </div>
                            <div class="col-xs-4">
                                <p><?php echo $prod->codigoProduto?></p>
                            </div>
                            <div class="col-xs-8">
                                <p><?php echo $prod->nomeProduto?></p>
                            </div>
                            <div class="col-xs-6">
                                <p style="text-decoration: line-through;"><?php echo 'De R$'.$prod->valorNormal?></p>
                            </div>
                            <div class="col-xs-6">
                                <p><?php echo 'Por R$'.$prod->valorDesconto?></p>
                            </div>
                            <?php 
                        }
                    }

                    ?>
                </div>
                <div class="col-sm-12">
                    <p><?php  echo palavraCurta(15,$registro->usuTitulo); ?></p>
                    <button class="btn btn-default btn-sm btn-block" onclick="Mudarestado('foto<?php echo $registro->postagem?>'); Mudarestado('info<?php echo $registro->postagem?>')">Informações</button>
                </div>


                <div class="col-sm-12 ">
                    <p><b>
                        <?php

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
                        favoritar('<?php echo $registro->postagem?>','<?php echo $idUsuario ?>' );
                        pontos('FAVORITOS','<?php echo $registro->postagem ?>','<?php echo $idUsuario ?>','<?php echo $tokenDia ?>','<?php echo $idTorre ?>','<?php echo $idPagina ?>')" 
                        id="<?php echo $registro->dataTorre.$registro->postagem.'favorito' ?>">
                        <b id="<?php echo 'favoritar'.$registro->postagem ?>"><i class="fa fa-star" style="<?php echo $styleFavorito ?>" ></i></b></a>

                        <a class="btn btn-default"
                        onclick="
                        visita('<?php echo $registro->postagem?>','<?php echo $idUsuario ?>','<?php echo $tokenDia ?>','<?php echo $idTorre ?>');
                        pontos('VISITAS','<?php echo $registro->postagem ?>','<?php echo $idUsuario ?>','<?php echo $tokenDia ?>','<?php echo $idTorre ?>','<?php echo $idPagina ?>')"
                        data-toggle="modal"
                        data-target="<?php echo '#'.$registro->postagem ?>">
                        <i class="fa fa-eye"></i></a>

                        <a class="<?php echo $bloqueioNegativo ?>"
                            onclick="
                            mudaNegativo('<?php echo $registro->dataTorre.$registro->postagem.'negativoM' ?>');
                            mudaPositivo('<?php echo $registro->dataTorre.$registro->postagem.'negativo' ?>');
                            curtir('<?php echo $registro->postagem?>','<?php echo $idUsuario ?>','<?php echo $tokenDia ?>', '<?php echo $idTorre ?>','<?php echo $idPagina ?>' );
                            pontos('CURTIDA','<?php echo $registro->postagem ?>','<?php echo $idUsuario ?>','<?php echo $tokenDia ?>','<?php echo $idTorre ?>','<?php echo $idPagina ?>')"
                            id="<?php echo $registro->dataTorre.$registro->postagem.'positivo' ?>">
                            <small id="<?php echo 'curtir'.$registro->postagem ?>"><i class="fa fa-thumbs-up" style="<?php echo $stylePositivo ?>"></i> <?php echo $total_like ?></small></a>

                            <a class="<?php echo $bloqueioPositivo ?>"
                                onclick="
                                mudaPositivo('<?php echo $registro->dataTorre.$registro->postagem.'positivoM' ?>');
                                mudaNegativo('<?php echo $registro->dataTorre.$registro->postagem.'positivo' ?>');
                                descurtir('<?php echo $registro->postagem?>','<?php echo $idUsuario ?>','<?php echo $tokenDia ?>', '<?php echo $idTorre ?>','<?php echo $idPagina ?>' )"
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
                                onclick="
                                favoritar('<?php echo $registro->postagem?>','<?php echo $idUsuario ?>');
                                pontos('FAVORITOS','<?php echo $registro->postagem ?>','<?php echo $idUsuario ?>','<?php echo $tokenDia ?>','<?php echo $idTorre ?>','<?php echo $idPagina ?>')" 
                                id="<?php echo $registro->dataTorre.$registro->postagem.'favoritoM' ?>">
                                <b id="<?php echo 'favoritarM'.$registro->postagem ?>"><i class="fa fa-star" style="<?php echo $styleFavorito ?>" ></i></b></a>

                                <a class="<?php echo $bloqueioNegativo ?>"
                                    onclick="
                                    mudaNegativo('<?php echo $registro->dataTorre.$registro->postagem.'negativo' ?>');
                                    mudaPositivo('<?php echo $registro->dataTorre.$registro->postagem.'negativoM' ?>');
                                    curtir('<?php echo $registro->postagem?>','<?php echo $idUsuario ?>','<?php echo $tokenDia ?>', '<?php echo $idTorre ?>','<?php echo $idPagina ?>' );
                                    pontos('CURTIDA','<?php echo $registro->postagem ?>','<?php echo $idUsuario ?>','<?php echo $tokenDia ?>','<?php echo $idTorre ?>','<?php echo $idPagina ?>')"
                                    id="<?php echo $registro->dataTorre.$registro->postagem.'positivoM' ?>">
                                    <small id="<?php echo 'curtirM'.$registro->postagem ?>"><i class="fa fa-thumbs-up" style="<?php echo $stylePositivo ?>"></i> <?php echo $total_like ?></small></a>

                                    <a class="<?php echo $bloqueioPositivo ?>"
                                        onclick="
                                        mudaPositivo('<?php echo $registro->dataTorre.$registro->postagem.'positivo' ?>');
                                        mudaNegativo('<?php echo $registro->dataTorre.$registro->postagem.'positivoM' ?>');
                                        descurtir('<?php echo $registro->postagem?>','<?php echo $idUsuario ?>','<?php echo $tokenDia ?>', '<?php echo $idTorre ?>','<?php echo $idPagina ?>' )"
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
                                                               <img src="/extilos/imagem/post/media/<?php echo $quantasFotos[$g] ?>" alt="" class="img-responsive" >
                                                                  <!-- <div class="anuncio titulo">
                                                                        <div class="theribbon"><small>PONTOS</small></div>
                                                                    </div> -->
                                                                    <div class="anuncio risca">
                                                                        <div class="theribbon"><small><?php echo soma_pontos($idPostagem,'post').'<small> pts</small>'; ?></small></div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div id="<?php echo 'dataVisita'.$registro->postagem ?>"></div>
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
                                                    <a class="btn btn-dafault" onclick="carregarComentario('<?php echo $registro->postagem ?>','<?php echo $idUsuario ?>','<?php echo $tokenDia ?>','<?php echo $idPagina ?>','<?php echo $idTorre ?>','<?php echo $registro->idUsuario ?>')">Meus comentários(<?php echo $total_comentarios ?>)</a>
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
                                <input type="text" class="form-control" id="<?php echo 'denunciar'.$registro->postagem ?>"> 
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="button" onclick="denuncia('<?php echo $registro->postagem?>','<?php echo $idUsuario ?>' )" class="btn btn-primary" data-dismiss="modal">Denúnciar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FIM MODAL PARA DENUNCIA DE POSTAGENS -->
                <?php
            }
        endforeach;
        if($p < ($qtdPaginas - 1)){
        $proximo = $p + 1;
        ?>
        <div id="<?php echo 'btn-'.$p; ?>" >
        <div class="col-sm-12 text-center">
        <a onclick="Mudarestado1('<?php echo 'btn-'.$p; ?>')" class="btn btn-sm btn-default" data-toggle="collapse" data-parent="#accordion" href="<?php echo '#P'.$proximo ?>">
            VER MAIS.. 
        </a>
            </div>
        </div>
         <?php }else{ ?>
        

         <?php } ?>                
    </div>
    <?php } ?>
</div>


</div>  
<?php
}
}

?>
