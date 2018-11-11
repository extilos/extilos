<?php 
$lista_album_adm = usersAdm($buscaBlog['idPagina']);
?>
<div class="panel-heading">
    <h3 class="panel-title">Gerenciadores</h3>
</div>

<div class="panel-body">
    <ul class="nav nav-pills nav-stacked category-menu">
        <?php while ($pagina = $lista_album_adm->fetch(PDO::FETCH_ASSOC)): //prepara o conteúdo para ser listado ?>
        <?php  
            $idUsuarioAdm = $pagina['idUsuario']; //pega o id do usuario 
            $buscaDados = busca_usuario($idUsuarioAdm); // dados do usuario
            $nomeUsuario = $buscaDados['usuMarca']; //retorna o @nomedousuario para exibir.
        ?>
        <li>
            <a href="category.html"><?php echo $nomeUsuario ?> <span class="badge pull-right">123</span></a>
            <ul>
               <?php 
               $albumAdm = album_while($idUsuarioAdm); //busca os albuns de cada usuário
                ?>
                <?php while ($album = $albumAdm->fetch(PDO::FETCH_ASSOC)): //prepara o conteúdo para ser listado ?>
                    <?php
                        $nomeAlbum = mb_strimwidth($album['album'], 0, 13,"..."); // carrega informações do album
                        $idAlbum = $album['idAlbum'];
                        $total_post = conta_album($idAlbum);
                        $qtdPost = $total_post;
                    ?>
                    <li class="active" ><a href="category.html"><?php echo $nomeAlbum ?> (<?php echo $qtdPost ?>)</a></li>
                <?php endwhile; ?>
            </ul>
        </li>
    <?php endwhile; ?>

    </ul>

</div>