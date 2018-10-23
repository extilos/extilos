<?php 

	include_once '../conn/init.php';
	require_once '../functions/conexoes.php';
	date_default_timezone_set('America/Sao_Paulo');

	$id_postagem = $_POST['post']; //recebe o id da postagem
	$id_torre = $_POST['torre']; // recebe o id da torre
	$valor = $_POST['liberado']; // recebe 1 ou 0 dependendo do javaScript da posição do checkbox
	$acao = $_POST['acao']; // recebe qual checkbox foi clicado
	$publicado = $_POST['publicado']; // recebe valor 1 ou 0 se a publicação esteja ativa, caso clique sim/não em excluir

	if($acao == 'libera'){
		$post_liberado = $valor;
	}
	if($acao == 'excluir'){
		$post_excluido = $valor;
		if($valor==0){
			$post_liberado = $publicado;
		}
	}
	if($acao == 'denuncia'){
		$post_denuncia = 1;
		$post_excluido = 1;
		if($valor==0){
			$post_liberado = $publicado;
		}
	}


	$PDO = db_connect();
	$sql = "UPDATE ext_post SET post_liberado = :post_liberado, post_denuncia = :post_denuncia, post_excluido = :post_excluido WHERE id_postagem = :id_postagem and id_torre = :id_torre";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':id_postagem', $id_postagem);
	$stmt->bindParam(':id_torre', $id_torre);
	$stmt->bindParam(':post_liberado', $post_liberado);
	$stmt->bindParam(':post_denuncia', $post_denuncia);
	$stmt->bindParam(':post_excluido', $post_excluido);

	if ($stmt->execute()){
		echo 'salvo'.$acao;
	}else{
		print_r($stmt->errorInfo());
	}

	?>