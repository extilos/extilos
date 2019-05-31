<?php 
if(!isset($_GET['busca'])){
$torres = busca_torre_todos(4);  ?>
<div id="hot">

    <div class="box">
        <div class="container-fluid">
            <div class="col-md-12">
                <h2>Torres</h2>
            </div>


            <div class="row no-gutters text-center">

                <?php while($lista_torres = $torres -> fetch(PDO::FETCH_ASSOC)): 
                        $nomeTorre = palavracurta(20,$lista_torres['nomeTorre']);
                    ?>
                    <?php if($lista_torres['tipoTorre'] > 0){
                        $tipo = ' Profissional';
                    }else{
                        $tipo = ' Gratuíta';
                    } ?>
                    <div class="box slideshow col-sm-3">
                        <div class="lista-post">
                            <div class="item card" style="height: 370px" id="mainImage">

                                <img src="/extilos/imagem/capa/media/<?php echo $lista_torres['torreImg'] ?>" alt="Get inspired" class="img-responsive" style="height: 200px">
                                <div class="anuncio risca">
                                    <div class="theribbon"><small><?php echo soma_pontos($lista_torres['idTorre'],'torre').'<small> pts</small>'; ?></small></div>
                                </div>
                                <hr>
                                <div class="text-center" style="height: 50px">
                                    <h4><?php echo $nomeTorre ?></h4>
                                </div>
                                <?php if($idUsuario > 1){ ?>
                                <div class="col-sm-6">
                                    <a class="btn btn-success btn-sm btn-block "><i class="fa fa-plus"></i> SEGUIR</a>
                                </div>
                                <?php } ?>
                                <div class="col-sm-6">
                                    <a href="<?php echo '/extilos/'.$nomeTorre ?>" class="btn btn-default btn-sm btn-block "><i class="fa fa-arrow-right"></i>VISITAR</a>
                                </div>
                                    
                            </div>
                            <div class="item" style="height: 370px" id="mainImage">
                                <div class="text-center" style="height: 200px">
                                    <p>Apresentação</p>
                                    <p><?php echo palavracurta(350,$lista_torres['descTorre']) ?></p>
                                </div>
                                <hr>
                                <div class="text-center" style="height: 50px">
                                    <h4><?php echo $nomeTorre ?></h4>
                                </div>
                                <?php if($idUsuario > 1){ ?>
                                <div class="col-sm-6">
                                    <a class="btn btn-success btn-sm btn-block "><i class="fa fa-plus"></i> SEGUIR</a>
                                </div>
                                <?php } ?>
                                <div class="col-sm-6">
                                    <a href="<?php echo '/extilos/'.$nomeTorre ?>" class="btn btn-default btn-sm btn-block "><i class="fa fa-arrow-right"></i>VISITAR</a>
                                </div>
                            </div>
                            <div class="item" style="height: 370px" id="mainImage">
                                <div class="text-center" style="height: 200px">
                                    <p>Torre: <b><?php echo $tipo ?></b></p>
                                    <p>Fãs: <b><?php echo fans_total_torre($lista_torres['idTorre']) ?></b></p>
                                    <p>Postagens: <b><?php echo total_post($lista_torres['idTorre']) ?></b></p>
                                    <p>Blogs: <b><?php echo conta_pagina_torre($lista_torres['idTorre']) ?> </b></p>
                                    <p>Cidade: <b><?php echo $lista_torres['cidadeTorre'].'-'.$lista_torres['estadoTorre'] ?></b></p>
                                </div>
                                <hr>
                                <div class="text-center" style="height: 50px">
                                    <h4><?php echo $nomeTorre ?></h4>
                                </div>
                                <?php if($idUsuario > 1){ ?>
                                <div class="col-sm-6">
                                    <a class="btn btn-success btn-sm btn-block "><i class="fa fa-plus"></i> SEGUIR</a>
                                </div>
                                <?php } ?>
                                <div class="col-sm-6">
                                    <a href="<?php echo '/extilos/'.$nomeTorre ?>" class="btn btn-default btn-sm btn-block "><i class="fa fa-arrow-right"></i>VISITAR</a>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endwhile; ?>
                <div class="col-md-12">
                    <a href="index&busca=torre" class="btn btn-default" data-dismiss="modal">VER MAIS</a>
                </div>

            </div>
        </div>
    </div>
</div>
<?php }else{ 
    if($_GET['busca'] == 'torre'){
    $torres = busca_torre_todos(30);
?>
<div id="hot">

    <div class="box">
        <div class="container-fluid">
            <div class="col-md-12">
                <h2>Torres</h2>
            </div>


            <div class="row no-gutters text-center">

                <?php while($lista_torres = $torres -> fetch(PDO::FETCH_ASSOC)): 
                    $nomeTorre = palavracurta(20,$lista_torres['nomeTorre']);
                    ?>
                    <?php if($lista_torres['tipoTorre'] > 0){
                        $tipo = ' Profissional';
                    }else{
                        $tipo = ' Gratuíta';
                    } ?>
                    <div class="box slideshow col-sm-3">
                        <div class="lista-post">
                            <div class="item card" style="height: 370px" id="mainImage">

                                <img src="/extilos/imagem/capa/media/<?php echo $lista_torres['torreImg'] ?>" alt="Get inspired" class="img-responsive" style="height: 200px">
                                <div class="anuncio risca">
                                    <div class="theribbon"><small><?php echo soma_pontos($lista_torres['idTorre'],'torre').'<small> pts</small>'; ?></small></div>
                                </div>
                                <hr>
                                <div class="text-center" style="height: 50px">
                                    <h4><?php echo $nomeTorre ?></h4>
                                </div>
                                <?php if($idUsuario > 1){ ?>
                                <div class="col-sm-6">
                                    <a  class="btn btn-success btn-sm btn-block "><i class="fa fa-plus"></i> SEGUIR</a>
                                </div>
                                <?php } ?>
                                <div class="col-sm-6">
                                    <a href="<?php echo '/extilos/'.$nomeTorre ?>" class="btn btn-default btn-sm btn-block "><i class="fa fa-arrow-right"></i>VISITAR</a>
                                </div>
                                    
                            </div>
                            <div class="item" style="height: 370px" id="mainImage">
                                <div class="text-center" style="height: 200px">
                                    <p>Apresentação</p>
                                    <p><?php echo palavracurta(350,$lista_torres['descTorre']) ?></p>
                                </div>
                                <hr>
                                <div class="text-center" style="height: 50px">
                                    <h4><?php echo $nomeTorre ?></h4>
                                </div>
                                <?php if($idUsuario > 1){ ?>
                                <div class="col-sm-6">
                                    <a class="btn btn-success btn-sm btn-block "><i class="fa fa-plus"></i> SEGUIR</a>
                                </div>
                                <?php } ?>
                                <div class="col-sm-6">
                                    <a href="<?php echo '/extilos/'.$nomeTorre ?>" class="btn btn-default btn-sm btn-block "><i class="fa fa-arrow-right"></i>VISITAR</a>
                                </div>
                            </div>
                            <div class="item" style="height: 370px" id="mainImage">
                                <div class="text-center" style="height: 200px">
                                    <p>Blog <b><?php echo $tipo ?></b></p>
                                    <p>Fãs: <b><?php echo fans_total_torre($lista_torres['idTorre']) ?></b></p>
                                    <p>Postagens: <b><?php echo total_post($lista_torres['idTorre']) ?></b></p>
                                    <p>Blogs: <b><?php echo conta_pagina_torre($lista_torres['idTorre']) ?> </b></p>
                                    <p>Cidade: <b><?php echo $lista_torres['cidadeTorre'].'-'.$lista_torres['estadoTorre'] ?></b></p>
                                </div>
                                <hr>
                                <div class="text-center" style="height: 50px">
                                    <h4><?php echo $nomeTorre ?></h4>
                                </div>
                                <?php if($idUsuario > 1){ ?>
                                <div class="col-sm-6">
                                    <a class="btn btn-success btn-sm btn-block "><i class="fa fa-plus"></i> SEGUIR</a>
                                </div>
                                <?php } ?>
                                <div class="col-sm-6">
                                    <a href="<?php echo '/extilos/'.$nomeTorre ?>" class="btn btn-default btn-sm btn-block "><i class="fa fa-arrow-right"></i>VISITAR</a>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>


<?php }} ?>