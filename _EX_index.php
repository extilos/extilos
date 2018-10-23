<?php

include_once 'functions/iniciar.php';
include_once 'functions/functions.php';
include_once 'functions/conexoes.php';
include'include/conteudos/topoHtml.php';

?>
<div id="all">
    <div id="content">

<div class="navbar navbar-default yamm" role="navigation" id="navbar">
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand home" href="index.html" data-animate-hover="bounce">
                    <img src="imagem/sistema/extilos_rosa.png" alt="extilos logo" height="50" class="">
                </a>
                <div class="navbar-buttons">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                    <a class="btn btn-default navbar-toggle" href="basket.html">
                        <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs">3 items in cart</span>
                    </a>
                </div>
            </div>
            <!--/.navbar-header -->

            <div class="navbar-collapse collapse" id="navigation">

                <ul class="nav navbar-nav navbar-left">
                    <li class="active"><a href="index.html">Inicio</a>
                    </li>
                    <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Comunidade <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h5>Selecione sua preferência</h5>
                                            <ul>
                                                <li><a href="category.html">Vestuário / Acessórios</a>
                                                </li>
                                                <li><a href="category.html">Corpo / Beleza</a>
                                                </li>
                                                <li><a href="category.html">Locais / Fotografia</a>
                                                </li>
                                                <li><a href="category.html">Dicas / Informações</a>
                                                </li>
                                                <li><a href="category.html">Eventos Locais</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Açoes <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h5>Ferramentas</h5>
                                            <ul>
                                                <li><a href="index.html">Publicidade</a>
                                                </li>
                                                <li><a href="category.html">Cadastros</a>
                                                </li>
                                                <li><a href="category-right.html">Sobre</a>
                                                </li>
                                                <li><a href="category-full.html">Termos</a>
                                                </li>
                                                <li><a href="detail.html">Contato</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
            <!--/.nav-collapse -->

            <div class="navbar-buttons">

                <div class="navbar-collapse collapse right" id="basket-overview">
                    <a href="basket.html" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm">3 items in cart</span></a>
                </div>
                <!--/.nav-collapse -->

                <div class="navbar-collapse collapse right" id="search-not-mobile">
                    <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>

            </div>

            <div class="collapse clearfix" id="search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                      <span class="input-group-btn">
			             <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
		              </span>
                    </div>

            </div>
            <!--/.nav-collapse -->

        </div>
        <!-- /.container -->
    </div>
        <div class="container-full box">

<!-- SELECIONE A TORRE QUE DESEJA EXIBIR -->
				<?php
				if(isset($_SESSION['idLogado']) && (isset($_POST['emailUsuario']))){
				// Se usuário estiver logado, carregar torres com base em sua preferência
				}else{
				// Se usuário é visitante, carregar aleatóriamente ou o que ele selecionar na busca.
				$preferencia = 3;
				$torre = busca_torre($preferencia);
				?>
				<div id="hot">
				<div class="container-full">
                    <div class="product-slider">
                    <?php while ($resultado_torre = $torre->fetch(PDO::FETCH_ASSOC)): //prepara o conteúdo para ser listado ?>
	                    <form action="azul" method="post">
	                        	<div class="item">
		                            <div class="product">
		                                <img src="img/main-slider1.jpg" alt="" class="img-responsive">
		                                <div class="text">
		                                    <h4>♜ | <?php $result = palavracurta(10,$resultado_torre['nomeTorre']); echo $result ?></h4>
		                                    <input type="submit" class="btn btn-sm btn-block btn-default btn-primary" value="Visitar">
		                                    <input type="hidden" name="torre" value=<?php echo $resultado_torre['idTorre'] ?>>
		                                    <input type="hidden" name="qtdpost" value="5">
		                                </div>
		                                <div class="ribbon sale">
		                                    <div class="theribbon"><center>fãs<br>1200</center></div>
		                                    <div class="ribbon-background"></div>
		                                </div>
		                                <div class="ribbon new">
		                                    <div class="theribbon"><center>Visitas<br>+300</center></div>
		                                    <div class="ribbon-background"></div>
		                                </div>
		                            </div>
	                            </div>
	                    </form>
	                  <?php endwhile ?>
                    </div>
                </div>
			</div>
			<?php
			if (isset($_POST['torre'])){
				$topoTorre = $_POST['torre'];
				$topoTorre = topo_torre($topoTorre);
			?>
			<div class="luis" id="customer-order">
                    <div class="box" id="contact">
                        <h2 class="text-center"><?php echo $topoTorre['nomeTorre'] ?></h2>
                        <img src="img/main-slider1.jpg" alt="" class="img-responsive">
                        <p class="lead text-center">Descritivo principal da torre</p>
                        <hr>
                        <div class="group">
                        <p class="text-center buttons">
                        <a href="#"  class="btn btn-sm btn-default btn-secondary mesmo-tamanho">120<br>Fãs</a>
                        <a href="#"  class="btn btn-sm btn-default btn-secondary mesmo-tamanho">35<br>Paginas</a>
                        <a href="#"  class="btn btn-sm btn-default btn-secondary mesmo-tamanho">21<br>Lojas</a>
                        <a href="#"  class="btn btn-sm btn-default btn-secondary mesmo-tamanho">30<br>Produtos</a>
                        </p>
                        <a href="#" data-toggle="modal" data-target="#modal-gratuito" class="btn btn-sm btn-block btn-primary ">Ganhou +1 Fã</a>

                        </div>
                        <hr>
                        <p>Ranking da Torre</p>

                        <!-- /.panel-group -->
                    </div>
            </div>
			<?php } ?>
<!-- CONTEÚDO DAS TORRES SELECIONADAS ACIMA -->

<?php
//include'include/conteudos/listaTorres.php';
//include_once 'include/conteudos/topoTorre.php';
include_once 'include/conteudos/bannerTorre.php';
include_once 'include/conteudos/conteudoTorre.php';
?>
				</div>
                <a href="#" class="btn btn-sm btn-default btn-block btn-secundary" data-spy="affix" data-offset-top="500">♜| Nome da Torre - <b>Voltar ao Inicio</b></a>
                <!-- END CONTAINER -->
        </div>
</div>

<?php
include_once 'include/conteudos/fimHtml.php';
}



?>
