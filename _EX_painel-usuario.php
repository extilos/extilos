<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Extilos - Painel
  </title>
  <link rel="extilos icon" href="../favicon.png">
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="/extilos/css/google-fonts.css" />
  <link rel="stylesheet" href="/extilos/css/painel.css">
  <!-- CSS Files -->
  <link href="/extilos/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <link href="/extilos/css/meu.css" rel="stylesheet">

  <link href="/extilos/css/owl.theme.css" rel="stylesheet">

  <!-- CSS Just for demo purpose, don't include it in your project 
  <link href="../demo/demo.css" rel="stylesheet" /> -->
  
</head>
<?php
include_once 'functions/iniciar.php';
//verifica se usuario está logado para acessar a página
if($idUsuario == 1){
    $_SESSION['resposta'] = 'registrar';
    header("Location: ../login"); exit;
}
//INCLUI AS FUNÇÕES NECESSÁRIAS
//include_once 'ajax/validar.php';


include_once 'functions/conexoes.php';
include_once 'functions/functions.php';
//include_once 'include/modal.php';
$idUsuario = $_SESSION['idLogado'];
$usuario = busca_usuario($idUsuario);
?>
<body>
  <div class="wrapper">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          <?php echo $usuario['nomeUsuario'] ?> 
        </a>
      </div>
      <div class="sidebar-wrapper">
        <?php include 'include/modulos/tools-painel/lateral/painel-barra_lateral.php'; ?>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-sm  sticky-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">vem.moda</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
           <!-- <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form> -->
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="/extilos/">
                  <i class="material-icons">home</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">bookmark</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">input</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <?php
              // CADASTROS
                if($url[1] == "cadastro_blog"){
                    include 'include/modulos/tools-painel/cadastro/painel-cadastro_blog.php';
                }
                if($url[1] == "cadastro_torre"){
                    include 'include/modulos/tools-painel/cadastro/painel-cadastro_torre.php';
                }
              // EDITAR
                if($filtro[0] == "editar_blog"){
                    include 'include/modulos/tools-painel/blog/painel-relatorio_blog.php';
                }
                if($filtro[0] == "editar_user"){
                    include 'include/modulos/tools-painel/geral/painel-relatorio_geral.php';
                }

                if($url[1] == "meus_blogs"){
                    include 'include/modulos/tools-painel/blog/painel-meus_blogs.php';
                }
                if($url[1] == "relatorio_geral"){
                    include 'include/modulos/tools-painel/geral/painel-relatorio_geral.php';
                }
                if($url[1] == "blog_fa"){
                    include 'include/painel-blog_fa.php';
                }
                if($url[1] == "lista_fans"){
                    include 'include/modulos/tools-painel/fans/painel-lista_fans.php';
                }
                if($url[1] == "editar_fans"){
                    include 'include/modulos/tools-painel/fans/painel-editar_fans.php';
                }
                
                if($url[1] == "minhas_torres"){
                    include 'include/modulos/tools-painel/torre/painel-minhas_torres.php';
                }
                if($filtro[0] == "editar_torre"){
                    include 'include/modulos/tools-painel/torre/painel-relatorio_torre.php';
                }
             ?>

        </div>
      </div>
    </div>
  <!--   Core JS Files   -->
  <script src="../js/core/jquery.min.js" type="text/javascript"></script>
  <script src="../js/core/popper.min.js" type="text/javascript"></script>
  <script src="../js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="../js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="/extilos/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
  <script src="/extilos/js/core/bootstrap-material-design.min.js"></script>
  <script src="/extilos/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <!--  Google Maps Plugin    -->
  <!-- Chartist JS 
  <script src="../js/plugins/chartist.min.js"></script>
  <script src="../js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
  <!--  Notifications Plugin    -->
  <script src="../js/plugins/bootstrap-notify.js"></script>
  <script src="../js/js_ext/script_projeto.js"></script>

</body>
</html>

