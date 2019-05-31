  <!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="robots" content="all,follow">
  <meta name="googlebot" content="index,follow,snippet,archive">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Obaju e-commerce template">
  <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
  <meta name="keywords" content="">

  <title>
    Extilos 
  </title>

  <meta name="keywords" content="">

  <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


  <!-- styles -->

  <link href="<?php echo $caminho ?>css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo $caminho ?>css/animate.min.css" rel="stylesheet">
  <link href="<?php echo $caminho ?>css/owl.carousel.css" rel="stylesheet">
  <link href="<?php echo $caminho ?>css/owl.theme.css" rel="stylesheet">

  <!-- theme stylesheet -->
  <link href="<?php echo $caminho ?>css/style.default.css" rel="stylesheet" id="theme-stylesheet">

  <!-- your stylesheet with modifications 
  <link href="<?php //echo $caminho ?>css/custom.css" rel="stylesheet"> -->

  <link href="<?php echo $caminho ?>css/meu.css" rel="stylesheet">

  <script src="<?php echo $caminho ?>js/respond.min.js"></script>

  <link rel="shortcut icon" href="favicon.png">
</head>

<body>
  <?php include_once 'include/modal.php' ?>
  <div class="hidden-xs">
    <div id="top">
        <div class="container-fluid">
            <div class="col-md-6 offer" >
             <img src="<?php echo $caminho ?>imagem/sistema/VEMMODA_alt.png" alt="extilos logo" height="30" class="">
         </div>
         
        <div class="col-md-6" >

            <ul class="nav nav-pills nav-justified">
                <li><a href="/extilos">Inicio</a></li>
                <li><a href="/extilos/sobre">Sobre</a></li>

                <?php if($idUsuario > 1){ ?>
                    <li><a href="/extilos/painel_usuario">PAINEL</a></li>
                    <li><a href="/extilos/sair">SAIR</a></li>
                    <li><a href="/extilos/notifica" type="button" rel="tooltip" title="Ver respostas" class="btn btn-default btn-link ">
                        <i class="fa fa-bell"></i><span class="label label-danger">4</span></a></li>
                    <?php  }else{ ?>
                        <li><a href="/extilos/cadastro_pessoal">Cadastro</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a></li>
                    <?php } ?>

                </ul>

            </div>

        </div>
    </div>
</div>
            <div class="visible-xs" >
                <div id="top">
                    <div class="container">
                        <div class="col-xs-6 offer">
                         <img src="<?php echo $caminho ?>imagem/sistema/VEMMODA_alt.png" alt="extilos logo" height="20" class="">
                        </div>
                        <div class="col-xs-3 text-right">
                        <?php if($idUsuario > 1){ ?>
                            <a href="/extilos/notifica" type="button" rel="tooltip" title="Notifica" class="btn btn-default btn-link "><i class="fa fa-bell"> <span class="label label-danger">4</span></i></a>
                        <?php } ?>
                        </div>
                        <div class="col-xs-3 text-right">
                        <a class="btn btn-default btn-link" data-toggle="collapse" data-parent="#accordion" href="#menu"><i class="fa fa-bars"></i></a>
                        </div>
                    
                </div> 
                       
                            <div id="menu" class="panel-collapse collapse">
                                <div class="panel-body">
                                            <form role="search">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="o que procura?">
                                                    <span class="input-group-btn">
                                                        <button type="submit" class="btn btn-primary visible-xs">Buscar</button>
                                                    </span>
                                                </div>
                                            </form>
                                </div>
                                <div class="panel-body">
                                    <ul class="nav nav-pills nav-stacked ">
                                        <li class="active"><a href="/extilos/" type="button" class="btn btn-default btn-link">INICIO</a></li>
                                        <li class="active"><a href="/extilos/sobre" type="button" rel="tooltip" title="Ver respostas" class="btn btn-default btn-link ">SOBRE</a></li>
                                        <?php if($idUsuario > 1){ ?>
                                        <li class="active"><a href="/extilos/painel_usuario" type="button" rel="tooltip" title="Painel" class="btn btn-default btn-link ">PAINEL</a></li>
                                        <li class="active"><a href="/extilos/sair" type="button" rel="tooltip" title="Sair" class="btn btn-default btn-link ">SAIR</a></li>
                                        <?php  }else{ ?>
                                        <li class="active"><a type="button" class="btn btn-default btn-link" href="/extilos/cadastro_pessoal">REGISTRO</a></li>
                                        <li class="active"><a type="button" class="btn btn-default btn-link" href="#" data-toggle="modal" data-target="#login-modal">ENTRAR</a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                </div>
                    
            </div>
            <?php
            if($idUsuario > 1){
            ?>
            <div class="">
                <nav class="navbar  navbar-fixed-bottom">
                      <div class="container-fluid">

                              <!-- Brand/logo -->
                              <div class="col-xs-6">
                                
                              </div>
                              <div class="text-right hidden-xs">
                                <div class="collapse" id="escolha" >
                                  <ul class="">
                                  <a class="btn btn-lg btn-round btn-warning" data-toggle="collapse" data-parent="#accordion" href="#submenu" style="width: 150px"><i class="fa fa-arrow-up"></i>INÍCIO</a></br>
                                  <a class="btn btn-lg btn-round btn-info" data-toggle="modal" data-target="#modal-conteudo" style="width: 150px"><i class="fa fa-camera"></i>POSTAR</a><br>
                                  <a class="btn btn-lg btn-round btn-danger" href="#" style="width: 150px"><i class="fa fa-cogs"></i>PAINEL</a>
                                  </ul>
                                </div>
                                  <a class="btn btn-success btn-round btn-lg " data-toggle="collapse" data-parent="#accordion" href="#escolha" style="width: 150px"><i class="fa fa-bars"></i>MENU</a>
                              </div>

                              <div class="text-right visible-xs">
                                <div class="collapse" id="escolha">
                                  <ul class="">
                                  <a class="btn btn-lg btn-round btn-success" data-toggle="collapse" data-parent="#accordion" href="#submenu"><i class="fa fa-arrow-up"></i></a></br>
                                  <a class="btn btn-lg btn-round btn-warning" data-toggle="modal" data-target="#modal-conteudo"><i class="fa fa-bars"></i></a><br>
                                  <a class="btn btn-lg btn-round btn-primary" href="#"><i class="fa fa-bars"></i></a>
                                  </ul>
                                </div>
                                  <a class="btn btn-info btn-round btn-lg " data-toggle="collapse" data-parent="#accordion" href="#escolha"><i class="fa fa-plus"></i></a>

                              </div>

                              <!-- Collapsible Navbar -->

                      </div>
                </nav>
            </div>
            <?php
                }
            ?>