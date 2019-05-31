<?php 

	include_once '../conn/init.php';
	require_once '../functions/conexoes.php';
	date_default_timezone_set('America/Sao_Paulo');

	$id_postagem = $_POST['post']; //recebe o id da postagem
	$idReq = $_POST['idReq']; // recebe o id da torre
	$valor = $_POST['liberado']; // recebe 1 ou 0 dependendo do javaScript da posição do checkbox
	$acao = $_POST['acao']; // recebe qual checkbox foi clicado
	$publicado = $_POST['publicado']; // recebe valor 1 ou 0 se a publicação esteja ativa, caso clique sim/não em excluir
// INFORMAÇÕES DA TORRE
	if($acao == 'libera'){
		$post_liberado = $valor;
		$local = 'id_torre';
	}
	if($acao == 'excluir'){
		$local = 'id_torre';
		$post_excluido = $valor;
		if($valor==0){
			$post_liberado = $publicado;
		}
	}
	if($acao == 'denuncia'){
		$local = 'id_torre';
		$post_denuncia = 1;
		$post_excluido = 1;
		if($valor==0){
			$post_liberado = $publicado;
		}
	}
// INFORMAÇÕES DO BLOG
	if($acao == 'libera_blog'){
		$blog_liberado = $valor;
		$local = 'id_pagina';
	}
	if($acao == 'excluir_blog'){
		$local = 'id_pagina';
		$blog_excluido = $valor;
		if($valor==0){
			$blog_liberado = $publicado;
		}
	}
	if($acao == 'denuncia_blog'){
		$local = 'id_pagina';
		$blog_denuncia = 1;
		$blog_excluido = 1;
		if($valor==0){
			$blog_liberado = $publicado;
		}
	}
// INFORMAÇÕES DO USUARIO
	if($acao == 'libera_user'){
		$blog_liberado = $valor;
		$local = 'id_usuario';
	}
	if($acao == 'excluir_user'){
		$local = 'id_usuario';
		$blog_excluido = $valor;
		$post_excluido = $valor;
		if($valor==0){
			$blog_liberado = $publicado;
		}
	}
	if($acao == 'denuncia_user'){
		$local = 'id_usuario';
		$blog_denuncia = 1;
		$blog_excluido = 1;
		if($valor==0){
			$blog_liberado = $publicado;
		}
	}


	$PDO = db_connect();
	$sql = "UPDATE ext_post SET post_liberado = :post_liberado, 
								post_denuncia = :post_denuncia, 
								post_excluido = :post_excluido, 
								blog_liberado = :blog_liberado, 
								blog_denuncia = :blog_denuncia, 
								blog_excluido = :blog_excluido 
							WHERE id_postagem = :id_postagem and $local = :idReq";

	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':id_postagem', $id_postagem);
	$stmt->bindParam(':idReq', $idReq);
	$stmt->bindParam(':post_liberado', $post_liberado);
	$stmt->bindParam(':post_denuncia', $post_denuncia);
	$stmt->bindParam(':post_excluido', $post_excluido);
	$stmt->bindParam(':blog_liberado', $blog_liberado);
	$stmt->bindParam(':blog_denuncia', $blog_denuncia);
	$stmt->bindParam(':blog_excluido', $blog_excluido);

	if ($stmt->execute()){
		//echo 'salvo'.$idReq;
		//print_r($sql);
	}else{
		print_r($stmt->errorInfo());
	}

	?>