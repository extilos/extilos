<div id="hot">
    <div class="box">
        <div class="container">
            <div class="col-md-12">
                <h2>E<b>X</b>TILOS</h2>
            </div>
        </div>
    </div>
    <div class="box">
        <?php 
                        //INFORMAÇÕES NECESSÁRIAS
        $idUsuario = 0; //INFORMAÇÃO COMPLEMENTAR
        $tokenDia = $_SESSION['tokenDia']; //INFORMAÇÃO COMPLEMENTAR
        $idTorre = 0; //INFORMAÇÃO COMPLEMENTAR
        $idPagina = 0; //INFORMAÇÃO COMPLEMENTAR
        $idBusca = 0; //INFORMAÇÃO A SER BUSCADA
                        //$tipoBusca = 'index';
        $qtdSolicitada = 10;
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
            $tipoBusca = 'cidade';
        }
        postagens($idUsuario,$tokenDia,$idTorre,$idPagina,$idBusca,$tipoBusca,$qtdSolicitada,$qtdExibida,$tamanhoGrid,$ordem);
               // postagens($idUsuario,$tokenDia,$idBusca,$tipoBusca,$qtdSolicitada,$qtdExibida) 
        ?>
    </div>
</div>