<?php if(!isset($_GET['busca'])){ ?>
    <div id="hot">
        <div class="box">
            <div class="container">
                <div class="col-md-12">
                    <h2>E<b>x</b>tilos</h2>
                </div>
            </div>
        </div>
        <div class="box">
            <?php 
                        //INFORMAÇÕES NECESSÁRIAS
            $idUsuario = 0;
            $tokenDia = $_SESSION['tokenDia'];
            $idTorre = 0;
            $idPagina = 0;
            $idBusca = 0;
                        //$tipoBusca = 'index';
            $qtdSolicitada = 12;
            $qtdExibida = 8;
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
                $tipoBusca = 'index';
            }
            postagens($idUsuario,$tokenDia,$idTorre,$idPagina,$idBusca,$tipoBusca,$qtdSolicitada,$qtdExibida,$tamanhoGrid,$ordem);
               // postagens($idUsuario,$tokenDia,$idBusca,$tipoBusca,$qtdSolicitada,$qtdExibida) 
            ?>
            <!-- /.container -->
        </div>
    </div>
<?php }else{ 
    if($_GET['busca'] == 'todos'){
    ?>
    <div id="hot">
        <div class="box">
            <div class="container">
                <div class="col-md-12">
                    <h2>E<b>x</b>tilos</h2>
                </div>
            </div>
        </div>
        <div class="box">
            <?php 
                        //INFORMAÇÕES NECESSÁRIAS
            $idUsuario = 0;
            $tokenDia = $_SESSION['tokenDia'];
            $idTorre = 0;
            $idPagina = 0;
            $idBusca = 0;
                        //$tipoBusca = 'index';
            $qtdSolicitada = 25;
            $qtdExibida = 20;
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
                $tipoBusca = 'index';
            }
            postagens($idUsuario,$tokenDia,$idTorre,$idPagina,$idBusca,$tipoBusca,$qtdSolicitada,$qtdExibida,$tamanhoGrid,$ordem);
               // postagens($idUsuario,$tokenDia,$idBusca,$tipoBusca,$qtdSolicitada,$qtdExibida) 
            ?>
            <!-- /.container -->
        </div>
    </div>

    <?php } }?>