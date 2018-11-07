
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
        Obaju : e-commerce template
    </title>

    <meta name="keywords" content="">

    <!-- <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    styles -->
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
<?php 
	include_once 'functions/conexoes.php';


?>
    <!-- *** TOPBAR ***
 _________________________________________________________ -->
    <div id="top">


    </div>
    <div class="box">
    <?php 
    	$idPost =8;
    	$idUsuario =5;
    	$idTorre = 2;
    	$tokenDia = 123;


    ?>
  		<button class="btn btn-default" onclick="pontos('VISITAS','<?php echo $idPost ?>','<?php echo $idUsuario ?>','<?php echo $tokenDia ?>','<?php echo $idTorre ?>')" > VISITA</button>
  		<button class="btn btn-default" onclick="pontos('SEGUIDORES','<?php echo $idPost ?>','<?php echo $idUsuario ?>','<?php echo $tokenDia ?>','<?php echo $idTorre ?>')" > SEGUIDORES</button>
  		<button class="btn btn-default" onclick="pontos('CURTIDA','<?php echo $idPost ?>','<?php echo $idUsuario ?>','<?php echo $tokenDia ?>','<?php echo $idTorre ?>')" > CURTIDA</button>
  		<button class="btn btn-default" onclick="pontos('LOJA','<?php echo $idPost ?>','<?php echo $idUsuario ?>','<?php echo $tokenDia ?>','<?php echo $idTorre ?>')" > LOJA</button>
  	</div>
  	<div id="respBlog">
      <table class="table table-hover">
        <thead class="text-warning">
          <th>Blog</th>
          <th>Torre</th>
          <th>Post</th>
          <th>Usu</th>
          <th>Curt</th>
          <th>Seg</th>
          <th>Com</th>
          <th>Fav</th>
          <th>Extr</th>
          <th>Vis</th>
          <th>Publ</th>
          <th>Loja</th>
          <th>Comp</th>
          <th>Bonus</th>
          <th>Exti</th>
        </thead>
        <tbody>
          <?php
          $listaPontos = ext_pts_all();
          $json_blog = json_decode($listaPontos);
          if(!isset($json_blog)){
            echo '<td>Vazio</td>';
          }else{
            foreach(array_slice($json_blog, 0, 10) as $lista_pontos){
              ?>
              	<form action="editar_fans" method="post">
	                <tr>
	                 <td><?php echo $lista_pontos->idPagina ?></td>
	                 <td><?php echo $lista_pontos->idTorre ?></td>
	                 <td><?php echo $lista_pontos->idPost ?></td>
	                 <td><?php echo $lista_pontos->idUsuario ?></td>
	                 <td><?php echo $lista_pontos->ptsCurtida ?></td>
	                 <td><?php echo $lista_pontos->ptsSeguidores ?></td>
	                 <td><?php echo $lista_pontos->ptsComentario ?></td>
	                 <td><?php echo $lista_pontos->ptsFavoritos ?></td>
	                 <td><?php echo $lista_pontos->ptsExtras ?></td>
	                 <td><?php echo $lista_pontos->ptsVisitas ?></td>
	                 <td><?php echo $lista_pontos->ptsPost ?></td>
	                 <td><?php echo $lista_pontos->ptsLoja ?></td>
	                 <td><?php echo $lista_pontos->ptsCompartilha ?></td>
	                 <td><?php echo $lista_pontos->ptsBonus ?></td>
	                 <td><?php echo $lista_pontos->ptsExtilos ?></td>
	             	</tr>
           		</form>
           <?php } } ?>
         </tbody>
       </table>
     </div>

    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap-hover-dropdown.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/front.js"></script>

<script type="text/javascript">
	
	 function pontos(tipo, idPost, idUsuario, tokenDia , idTorre){
        $.ajax({
            url:'ajax/pontos.php',
            type:'POST',
            data:{tipo:tipo, idPost:idPost, idUsuario:idUsuario, tokenDia:tokenDia, idTorre:idTorre},

        success:function(data){
               // $("#dataVisita"+idPost).html(data);
               alert(data);
            },
        })
    }
</script>


</body>

</html>
