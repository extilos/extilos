<?php 
$lista_album_adm = usersAdm($buscaBlog['idPagina']);
?>
<div class="no-gutters row">
<div class="panel panel-default sidebar-menu">
<div class="panel-heading">
    <h3 class="panel-title">Usuários </h3>
</div>
<div class="panel-body">
    <ul class="nav nav-pills nav-stacked category-menu">
        <?php $i=0; 
        while ($pagina = $lista_album_adm->fetch(PDO::FETCH_ASSOC)): //prepara o conteúdo para ser listado ?>
        <?php  
            $idUsuarioAdm = $pagina['idUsuario']; //pega o id do usuario 
            $buscaDados = busca_usuario($idUsuarioAdm); // dados do usuario
            $nomeUsuario = $buscaDados['usuMarca']; //retorna o @nomedousuario para exibir.

        ?>
        <li>
            <a data-toggle="collapse" data-parent="#accordion" href="<?php echo '#'.$i ?>"><?php echo $nomeUsuario ?> <span class="badge pull-right"><i class="fa fa-angle-down" ></i></span></a>
            <div id="<?php echo $i ?>" class="panel-collapse collapse">
            <ul>
               <?php 
               $i++;
               $albumAdm = album_while($idUsuarioAdm); //busca os albuns de cada usuário
                ?>
                <?php while ($album = $albumAdm->fetch(PDO::FETCH_ASSOC)): //prepara o conteúdo para ser listado ?>
                    <?php
                        $nomeAlbum = mb_strimwidth($album['album'], 0, 13,"..."); // carrega informações do album
                        $idAlbum = $album['idAlbum'];
                        $total_post = conta_album($idAlbum);
                        $qtdPost = $total_post;
                    ?>
                    <li class="active" ><a href="/extilos/<?php echo $_GET['pg'].'&pag=publicacoes'.'&cd='.($idAlbum*251).'&tp=usu'.'&album='.$nomeAlbum.'&nick='.$nomeUsuario ?>"><?php echo $nomeAlbum.$idAlbum ?> (<?php echo $total_post ?>)</a></li>
                <?php endwhile; ?>
            </ul>
            </div>
        </li>
    <?php endwhile; ?>

    </ul>

</div>
</div>
</div>


