<?php 
$lista_album_blog = pasta_album_blog($buscaBlog['idPagina']);
$json_album = json_decode($lista_album_blog);
?>
<div class="panel-heading">
	<h3 class="panel-title">Álbuns</h3>
</div>
<div class="panel-body">
	<ul class="nav nav-pills nav-stacked category-menu">
		<?php
		if (!isset($lista_album_blog)){
			print_r($json_album);
			echo '<td>Vazio</td>';
		}else{
			foreach (array_slice($json_album ,0,15) as $lista_album){ 
				?>

				<li class="">
					<a href="category.html"><?php echo $lista_album->albumBlog ?><span class="badge pull-right">123</span></a>
				</li>
				<?php 
			} 
		}
		?>
		
	</ul>
</div>