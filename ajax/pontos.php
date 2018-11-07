<?php

	require_once '../functions/cadastros.php';
	$idPagina = 0;
	$idUsuario = $_POST['idUsuario'];
	$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : null ;
	$idPost = isset($_POST['idPost']) ? $_POST['idPost'] : null ;
	$idTorre = isset($_POST['idTorre']) ? $_POST['idTorre'] : null;
	$tokenDia = isset($_POST['tokenDia']) ? $_POST['tokenDia'] : null;
	//CADASTRO DE PONTUAÇÃO
 	cadastro_pontos($tipo,$idPost,$idPagina,$idUsuario,$idTorre);

?>