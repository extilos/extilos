<?php 
$nomePagina = $buscaBlog['nomePagina'];
$cidadePagina = $buscaBlog['cidadePagina'];
$estadoPagina = $buscaBlog['estadoPagina'];
$tipoPagina = $buscaBlog['tipoPagina'];
$setor = $buscaBlog['setorPagina'];
if($tipoPagina > 0){
    $tipo = 'Profissional';
}else{
    $tipo = 'Gratuíto';
}
if($setor == 0)
    {$setorPagina='Diversos';}
elseif($setor == 1)
    {$setorPagina = 'Vestuário / Acessórios';}
elseif($setor == 2)
    {$setorPagina = 'Corpo / Beleza';}
elseif($setor == 3)
    {$setorPagina = 'Locais / Fotografia';}
elseif($setor == 4)
    {$setorPagina = 'Dicas / Informações';}
elseif($setor == 4)
    {$setorPagina = 'Eventos Locais';}

$totalFans = fans_total($buscaBlog['idPagina']);
$totalTorres = conta_torre_pagina($buscaBlog['idPagina']);
$totalPost = total_post_pagina($buscaBlog['idPagina']);
?>
<div id="top" class="hidden-xs">
  <div class="container-full  " 
  style="

  background-image: url('<?php echo $caminho ?>imagem/capa/grande/<?php echo $buscaBlog['pgCapa'] ?>');
  background-repeat: no-repeat;
  background-size: 100%;
  height: 250px;
  ">

</div>
</div>  
<div class="col-sm-12 box no-gutters">

    <div class="col-sm-3">

        <div class="card" >
            <h3><?php echo $nomePagina ?></h3>
            <p><?php if($tipoPagina > 0){ echo '<span class="label label-default">'.$tipo.'</span>';} ?>
            <br><?php echo $cidadePagina.'-'.$estadoPagina?>
            <br>Fãs: <b><?php echo $totalFans ?></b>
            <br>Torres: <b><?php echo $totalTorres ?></b>
            <br>Postagens: <b><?php echo $totalPost ?></b>
            <br>Setor: <strong><?php if($tipoPagina > 0){ echo $setorPagina;} ?></strong>
        </p>


        <a class="btn btn-default btn-sm btn-block "><i class="fa fa-plus"></i>SEGUIR</a>
    </div>
</div>
<div id="top" class=" col-sm-9 hidden-xs">
    <ul class="nav nav-pills nav-justified ">
        <?php if(!isset($_GET['pag'])){ ?>
            <li class="active"><a href="<?php echo $nomeBlog.'&pag=inicio' ?>"><img src="https://img.icons8.com/color/30/000000/home.png"><br>Início</a></li>
            <li><a href="<?php echo $nomeBlog.'&pag=fotos' ?>"><img src="https://img.icons8.com/color/30/000000/gallery.png"><br>Fotos</a></li>
            <li><a href="<?php echo $nomeBlog.'&pag=produtos' ?>"><img src="https://img.icons8.com/color/30/000000/market-square.png"><br>Produtos</a></li>
            <li><a href="<?php echo $nomeBlog.'&pag=lojas' ?>"><img src="https://img.icons8.com/color/30/000000/price-tag.png"><br>Lojas</a></li>
            <li><a href="<?php echo $nomeBlog.'&pag=contato' ?>"><img src="https://img.icons8.com/color/48/000000/business-contact.png"><br>Contato</a></li>

        <?php }else{ ?>

            <?php if($_GET['pag'] == 'inicio'){ ?>
                <li class="active"><a href="<?php echo $nomeBlog.'&pag=inicio' ?>"><img src="https://img.icons8.com/color/30/000000/home.png"><br>Início</a></li>
            <?php }else{ ?>
                <li><a href="<?php echo $nomeBlog.'&pag=inicio' ?>"><img src="https://img.icons8.com/color/30/000000/home.png"><br>Início</a></li>
            <?php } ?>

            <?php if($_GET['pag'] == 'fotos' || $_GET['pag'] == 'publicacoes'){ ?>
                <li class="active"><a href="<?php echo $nomeBlog.'&pag=fotos#fotos' ?>"><img src="https://img.icons8.com/color/30/000000/gallery.png"><br>Fotos</a></li>
            <?php }else{ ?>
                <li><a href="<?php echo $nomeBlog.'&pag=fotos#fotos' ?>"><img src="https://img.icons8.com/color/30/000000/gallery.png"><br>Fotos</a></li>
            <?php }?>

            <?php if($_GET['pag'] == 'produtos'){ ?>
                <li class="active"><a href="<?php echo $nomeBlog.'&pag=produtos' ?>"><img src="https://img.icons8.com/color/30/000000/market-square.png"><br>Produtos</a></li>
            <?php }else{ ?>
                <li><a href="<?php echo $nomeBlog.'&pag=produtos' ?>"><img src="https://img.icons8.com/color/30/000000/market-square.png"><br>Produtos</a></li>
            <?php }?>

            <?php if($_GET['pag'] == 'lojas'){ ?>
                <li class="active"><a href="<?php echo $nomeBlog.'&pag=lojas' ?>"><img src="https://img.icons8.com/color/30/000000/price-tag.png"><br>Lojas</a></li>
            <?php }else{ ?>
                <li><a href="<?php echo $nomeBlog.'&pag=lojas' ?>"><img src="https://img.icons8.com/color/30/000000/price-tag.png"><br>Lojas</a></li>
            <?php }?>

            <?php if($_GET['pag'] == 'contato'){ ?>
                <li class="active"><a href="<?php echo $nomeBlog.'&pag=contato' ?>"><img src="https://img.icons8.com/color/48/000000/business-contact.png"><br>Contato</a></li>
            <?php }else{ ?>
                <li><a href="<?php echo $nomeBlog.'&pag=contato' ?>"><img src="https://img.icons8.com/color/48/000000/business-contact.png"><br>Contato</a></li>
            <?php }?>
        <?php } ?>
    </ul>
    <hr>
    <?php include 'include/modulos/front/publicidade/bloco-publicidade-banner-screen.php'; ?>
</div>
<div class="visible-xs">
    <div id="toptop" class="row">

        <img src="<?php echo $caminho ?>imagem/capa/grande/<?php echo $buscaBlog['pgCapa'] ?>" alt="Get inspired" class="img-responsive">
        <a class="btn btn-default btn-link"  href="<?php echo $nomeBlog.'&pag=inicio' ?>"><i class="fa fa-home"></i></a>
        <a class="btn btn-default btn-link"  href="<?php echo $nomeBlog.'&pag=fotos' ?>"><i class="fa fa-camera-retro"></i></a>
        <a class="btn btn-default btn-link"  href="<?php echo $nomeBlog.'&pag=produtos' ?>"><i class="fa fa-tag"></i></a>
        <a class="btn btn-default btn-link"  href="<?php echo $nomeBlog.'&pag=lojas' ?>"><i class="fa fa-shopping-cart"></i></a>
        <a class="btn btn-default btn-link"  href="<?php echo $nomeBlog.'&pag=contato' ?>"><i class="fa fa-phone"></i></a>
    </div>
</div>	

</div> 