<?php
$token = md5(session_id());
?>
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
        Obaju : e-commerce template
    </title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="css/custom.css" rel="stylesheet">

    <script src="js/respond.min.js"></script>

    <link rel="shortcut icon" href="favicon.png">



</head>

<body>

    <div id="all">

        <div id="content">
        <?php 
        	if(isset($url[1]) && $url[1] === $token) {
			   // limpe tudo que for necessário na saída.
			   // Eu geralmente não destruo a seção, mas invalido os dados da mesma
			   // para evitar algum "necromancer" recuperar dados. Mas simplifiquemos:
			   session_destroy();
			   echo '<h3>Obrigado!</h3>';
			    header("Location: /extilos/login");
			   
			   exit();
			} else {
        ?>
            <div class="container">

                <div class="col-md-12">

                    <div class="row" id="error-page">
                        <div class="col-sm-4 col-sm-offset-4">
                            <div class="box">

                                <p class="text-center">
                                    <img src="img/logo.png" alt="Obaju template">
                                </p>

                                <h3>Obrigado!</h3>
                                <h4 class="text-muted">Deseja sair do site?</h4>
                                <a href="sair/<?php echo $token ?>" class="btn btn-block btn-danger "></i>SAIR</a><HR>
                                <a href="index" "><i class="fa fa-home"></i>VOLTAR AO INICIO</a>
                                </p>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
         <?php 
			}
			 ?>

    </div>
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap-hover-dropdown.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/front.js"></script>




</body>

</html>