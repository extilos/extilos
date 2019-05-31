<?php 
function apresentaPaginas($tipo,$idBusca,$qtde,$idUsuario){
    $blogs = busca_blog_todos($tipo,$idBusca,$qtde); // (TIPOS DE BUSCA, IDBUSCA, QUANTIDADE BUSCA)
    ?>
    <div id="hot">
        <div class="box">
            <div class="container-fluid">
                <div class="col-md-12">
                    <h2>Blogs</h2>
                </div>
             </div>
        </div>

                <div class="row no-gutters text-center box">

                    <?php while($lista_blogs = $blogs -> fetch(PDO::FETCH_ASSOC)): ?>
                        <?php if($lista_blogs['tipoPagina'] > 0){
                            $tipo = ' Profissional';
                        }else{
                            $tipo = ' Gratuíto';
                        } ?>
                        <div class="box slideshow col-sm-3">
                            <div class="lista-post">
                                <div class="item card" style="height: 370px" id="mainImage">

                                    <img src="/extilos/imagem/capa/media/<?php echo $lista_blogs['pgCapa'] ?>" alt="Get inspired" class="img-responsive" style="height: 200px">
                                    <div class="anuncio risca">
                                        <div class="theribbon"><small><?php echo soma_pontos($lista_blogs['idPagina'],'blog').'<small> pts</small>'; ?></small></div>
                                    </div>
                                    <hr>
                                    <div class="text-center" style="height: 50px">
                                        <h4><?php echo palavracurta(15,$lista_blogs['nomePagina']) ?></h4>
                                    </div>
                                    <?php if($idUsuario > 1){ ?>
                                    <div class="col-sm-6">
                                        <a class="btn btn-success btn-sm btn-block "><i class="fa fa-plus"></i> SEGUIR</a>
                                    </div>
                                    <?php } ?>
                                    <div class="col-sm-6">
                                        <a class="btn btn-default btn-sm btn-block" href="/extilos/blog/<?php echo $lista_blogs['nomePagina']?>"><i class="fa fa-arrow-right"></i>VISITAR</a>
                                    </div>
                                    
                                </div>
                                <div class="item" style="height: 370px" id="mainImage">
                                    <div class="text-center" style="height: 200px">
                                        <p>Apresentação</p>
                                        <p><?php echo palavracurta(350,$lista_blogs['descPagina']) ?></p>
                                    </div>
                                    <hr>
                                    <div class="text-center" style="height: 50px">
                                        <h4><?php echo palavracurta(15,$lista_blogs['nomePagina']) ?></h4>
                                    </div>
                                    <?php if($idUsuario > 1){ ?>
                                    <div class="col-sm-6">
                                        <a class="btn btn-success btn-sm btn-block "><i class="fa fa-plus"></i> SEGUIR</a>
                                    </div>
                                    <?php } ?>
                                    <div class="col-sm-6">
                                        <a class="btn btn-default btn-sm btn-block" href="/extilos/blog/<?php echo $lista_blogs['nomePagina']?>"><i class="fa fa-arrow-right"></i>VISITAR</a>
                                    </div>
                                </div>
                                <div class="item" style="height: 370px" id="mainImage">
                                    <div class="text-center" style="height: 200px">
                                        <p>Blog <b><?php echo $tipo ?></b></p>
                                        <p>Fãs: <b><?php echo fans_total($lista_blogs['idPagina']) ?></b></p>
                                        <p>Postagens: <b><?php echo total_post_pagina($lista_blogs['idPagina']) ?></b></p>
                                        <p>Torre: <b><?php echo conta_torre_pagina($lista_blogs['idPagina']) ?></b></p>
                                        <p>Cidade: <b><?php echo $lista_blogs['cidadePagina'].'-'.$lista_blogs['estadoPagina'] ?></b></p>
                                    </div>
                                    <hr>
                                    <div class="text-center" style="height: 50px">
                                        <h4><?php echo palavracurta(15,$lista_blogs['nomePagina']) ?></h4>
                                    </div>
                                    <?php if($idUsuario > 1){ ?>
                                    <div class="col-sm-6">
                                        <a class="btn btn-success btn-sm btn-block "><i class="fa fa-plus"></i> SEGUIR</a>
                                    </div>
                                    <?php } ?>
                                    <div class="col-sm-6">
                                        <a class="btn btn-default btn-sm btn-block" href="/extilos/blog/<?php echo $lista_blogs['nomePagina']?>"><i class="fa fa-arrow-right"></i>VISITAR</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php endwhile; ?>
                    <div class="col-md-12">
                       <a href="index&busca=blog" class="btn btn-default" data-dismiss="modal">VER MAIS</a>
                   </div>

               </div>
           </div>
<?php 
}
?>
<?php 
function apresentaPaginasTorre($idBusca,$inicio,$fim,$idUsuario){
    $blogsJson = lista_blog_torre($idBusca); 
    $blog = json_decode($blogsJson);
    ?>
    <div id="hot">
        <div class="box">
            <div class="container-fluid">
                <div class="col-md-12">
                    <h2>Blogs</h2>
                </div>
             </div>
        </div>

                <div class="row no-gutters text-center box">

                    <?php 
                    if(!isset($blogsJson)){
                        echo '<td>Vazio</td>';
                    }else{
                    foreach(array_slice($blog, $inicio, $fim) as $lista_blogs){ ?>
                        <?php if($lista_blogs->tipoPagina > 0){
                            $tipo = ' Profissional';
                        }else{
                            $tipo = ' Gratuíto';
                        } ?>
                        <div class="box slideshow col-sm-3">
                            <div class="lista-post">
                                <div class="item card" style="height: 370px" id="mainImage">

                                    <img src="/extilos/imagem/capa/media/<?php echo $lista_blogs->pgCapa ?>" alt="Get inspired" class="img-responsive" style="height: 200px">
                                    <div class="anuncio risca">
                                        <div class="theribbon"><small><?php echo soma_pontos($lista_blogs->idPagina,'blog').'<small> pts</small>'; ?></small></div>
                                    </div>
                                    <hr>
                                    <div class="text-center" style="height: 50px">
                                        <h4><?php echo palavracurta(15,$lista_blogs->nomePagina) ?></h4>
                                    </div>
                                    <?php if($idUsuario > 1){ ?>
                                    <div class="col-sm-6">
                                        <a class="btn btn-success btn-sm btn-block "><i class="fa fa-plus"></i> SEGUIR</a>
                                    </div>
                                    <?php } ?>
                                    <div class="col-sm-6">
                                        <a class="btn btn-default btn-sm btn-block" href="/extilos/blog/<?php echo $lista_blogs['nomePagina']?>"><i class="fa fa-arrow-right"></i>VISITAR</a>
                                    </div>
                                    
                                </div>
                                <div class="item" style="height: 370px" id="mainImage">
                                    <div class="text-center" style="height: 200px">
                                        <p>Apresentação</p>
                                        <p><?php echo palavracurta(350,$lista_blogs->descPagina) ?></p>
                                    </div>
                                    <hr>
                                    <div class="text-center" style="height: 50px">
                                        <h4><?php echo palavracurta(15,$lista_blogs->nomePagina) ?></h4>
                                    </div>
                                    <?php if($idUsuario > 1){ ?>
                                    <div class="col-sm-6">
                                        <a class="btn btn-success btn-sm btn-block "><i class="fa fa-plus"></i> SEGUIR</a>
                                    </div>
                                    <?php } ?>
                                    <div class="col-sm-6">
                                        <a class="btn btn-default btn-sm btn-block" href="/extilos/blog/<?php echo $lista_blogs['nomePagina']?>"><i class="fa fa-arrow-right"></i>VISITAR</a>
                                    </div>
                                </div>
                                <div class="item" style="height: 370px" id="mainImage">
                                    <div class="text-center" style="height: 200px">
                                        <p>Blog <b><?php echo $tipo ?></b></p>
                                        <p>Fãs: <b><?php echo fans_total($lista_blogs->idPagina) ?></b></p>
                                        <p>Postagens: <b><?php echo total_post_pagina($lista_blogs->idPagina) ?></b></p>
                                        <p>Torre: <b><?php echo conta_torre_pagina($lista_blogs->idPagina) ?></b></p>
                                        <p>Cidade: <b><?php echo $lista_blogs->cidadePagina.'-'.$lista_blogs->estadoPagina ?></b></p>
                                    </div>
                                    <hr>
                                    <div class="text-center" style="height: 50px">
                                        <h4><?php echo palavracurta(15,$lista_blogs->nomePagina) ?></h4>
                                    </div>
                                    <?php if($idUsuario > 1){ ?>
                                    <div class="col-sm-6">
                                        <a class="btn btn-success btn-sm btn-block "><i class="fa fa-plus"></i> SEGUIR</a>
                                    </div>
                                    <?php } ?>
                                    <div class="col-sm-6">
                                        <a class="btn btn-default btn-sm btn-block" href="/extilos/blog/<?php echo $lista_blogs['nomePagina']?>"><i class="fa fa-arrow-right"></i>VISITAR</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php } ?>
                    <div class="col-md-12">
                       <a href="index&busca=blog" class="btn btn-default" data-dismiss="modal">VER MAIS</a>
                   </div>
                    <?php } ?>
               </div>
           </div>
<?php 
}
?>