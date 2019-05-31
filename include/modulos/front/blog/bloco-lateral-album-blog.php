<?php 
$lista_album_blog = pasta_album_blog($buscaBlog['idPagina']);
$json_album = json_decode($lista_album_blog);
?>
<div class="no-gutters row">
<div class="panel panel-default sidebar-menu">
	<div class="panel-heading">
		<h3 class="panel-title">Álbuns </h3>
	</div>
		<ul class="nav nav-pills nav-stacked category-menu">
			<?php
			if (!isset($lista_album_blog)){
				print_r($json_album);
				echo '<td>Vazio</td>';
			}else{
				foreach (array_slice($json_album ,0,15) as $lista_album){ 
				$totalPostagem = total_post_album($lista_album->idAlbumBlog);

				if(isset($_GET['album'])){ 
					if($_GET['album'] == $lista_album->albumBlog){ ?>
					<li class="active">
						<a href="/extilos/<?php echo $_GET['pg'].'&pag=publicacoes'.'&cd='.($lista_album->idAlbumBlog*251).'&tp=blog'.'&album='.$lista_album->albumBlog ?>""><?php echo $lista_album->albumBlog ?><span class="badge pull-right">
							<?php echo $totalPostagem ?></span></a>
					</li>
					<?php } else { ?>
						<li class="">
							<a href="/extilos/<?php echo $_GET['pg'].'&pag=publicacoes'.'&cd='.($lista_album->idAlbumBlog*251).'&tp=blog'.'&album='.$lista_album->albumBlog ?>""><?php echo $lista_album->albumBlog ?><span class="badge pull-right">
							<?php echo $totalPostagem ?></span></a>
						</li>
				<?php  } } else { ?>
					<li class="">
						<a href="/extilos/<?php echo $_GET['pg'].'&pag=publicacoes'.'&cd='.($lista_album->idAlbumBlog*251).'&tp=blog'.'&album='.$lista_album->albumBlog ?>""><?php echo $lista_album->albumBlog ?><span class="badge pull-right">
							<?php echo $totalPostagem ?></span></a>
					</li>
				<?php  } } } ?>
			
		</ul>
	</div>
</div>