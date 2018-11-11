<?php

	require_once '../conn/init.php';
	require_once '../functions/conexoes.php';
	$idPagina = 0;
	$idUsuario = $_POST['idUsuario'];
	$local = isset($_POST['tipo']) ? $_POST['tipo'] : null ;
	$idPost = isset($_POST['idPost']) ? $_POST['idPost'] : null ;
	$idTorre = isset($_POST['idTorre']) ? $_POST['idTorre'] : null;
	$tokenDia = isset($_POST['tokenDia']) ? $_POST['tokenDia'] : null;
	//CADASTRO DE PONTUAÇÃO
		//REALIZA O CADASTRO DE PONTUAÇÃO DAS POSTAGENS, BLOGS E TORRES.
		//consulta para ver se existe o registro deste usuário com o post.
		//Se existir, faz um update com novas informações somadas ou mantidas, vide o critério de cada campo.
		/* Critérios pré estabelecidos  
		sigla: (PBT - Post, Blog, Torre)
		local | Descrição
		SEGUIDORES 	- pts Seguidores / cadas usuário seguindo o BLOG/TORRE (100 pontos).
		CURTIDA 	- pts Curtida / (curtida positiva) cada usuário soma 10 pontos. (PBT)
		COMENTARIO 	- pts Comentario / cada usuário soma 10 pontos, se tiver resposta do adm soma 10 pontos. 20 é o maximo. (PBT)
		FAVORITOS 	- pts Favoritos / cada usuário soma 15 pontos. (PBT)
		EXTRA 	- pts Extra / se o usuário acessar o link da loja macada soma 10 pontos. (PBT)
		VISITAS - pts Visitas / cada visita de usuário soma 5 pontos por dia, 20 é o maximo de pontos somados por usuários. (PBT)
		PUBLICA 	- pts Post / publicação com 5 fotos somam 15 pontos. (PB)
		LOJA 	- pts Loja / fazer a marcação da loja ou da marca soma 10 pontos. (PB)
		COMPARTILHA	- pts Comparilha / se a loja ou a marca compartilhar a postagem somam 120 pontos. (PB)
		BONUS 	- pts Bonus / caso ocorra um bonus por um periodo ou promoção as pontuações são multiplicadas por 2x (PBT)
		EXTILOS	- pts Extilos / usado como premiação para postagens em destaque a pontuação é multiplicada por 5x. (PBT)
		 */
		

		//informações do painel de administração do site
		//consulta no bano de dados sobre a informação do bonus
		// $bunus = cosulta_bonus($cidade);
		
		//VERIFICA SE EXISTE O CADASTRO DA PONTUAÇÃO, PARA NÃO REPETIR POST E USUARIO
		$verifica_pts = verifica_pts($idPost, $idUsuario);
		if ($verifica_pts['id_pts'] > ''){
		//Update
			if($local == 'SEGUIDORES'){ $ptsSeguidores = 100; }else{ $ptsSeguidores = $verifica_pts['ptsSeguidores']; };
			if($local == 'CURTIDA'){ 	$ptsCurtida = 10; }else{ $ptsCurtida = $verifica_pts['ptsCurtida']; };
			if($local == 'COMENTARIO'){	$ptsComentario = 10; }else{ $ptsComentario = $verifica_pts['ptsComentario']; };
			if($local == 'FAVORITOS'){ 	$ptsFavoritos = 15; }else{ $ptsFavoritos = $verifica_pts['ptsFavoritos']; };
			if($local == 'EXTRA'){ 		$ptsExtras = 10;}else{ $ptsExtras = $verifica_pts['ptsExtras'];};
			if($local == 'VISITAS'){	$ptsVisitas = 5; }else{ $ptsVisitas = $verifica_pts['ptsVisitas'];};
			if($local == 'PUBLICA'){	$ptsPost = 15;}	else{$ptsPost = $verifica_pts['ptsPost'];};
			if($local == 'LOJA'){		$ptsLoja = 10; }else{$ptsLoja = $verifica_pts['ptsLoja'];};
			if($local == 'COMPARTILHA'){$ptsCompartilha = 120; }else{ $ptsCompartilha = $verifica_pts['ptsCompartilha'];};
			$id_pts = $verifica_pts['id_pts'];
			$ptsBonus = $verifica_pts['ptsBonus'];
			$ptsExtilos = $verifica_pts['ptsExtilos'];
		$PDO = db_connect();
			$sql = "UPDATE ext_pts SET idPost = :idPost, idPagina = :idPagina, idTorre = :idTorre, idUsuario = :idUsuario, ptsSeguidores = :ptsSeguidores, ptsCurtida = :ptsCurtida, ptsComentario = :ptsComentario, ptsFavoritos = :ptsFavoritos, ptsExtras = :ptsExtras, ptsVisitas = :ptsVisitas, ptsPost = :ptsPost, ptsLoja = :ptsLoja, ptsCompartilha = :ptsCompartilha, ptsBonus = :ptsBonus, ptsExtilos = :ptsExtilos WHERE id_pts =:id_pts";
			$stmt= $PDO->prepare($sql);
			$stmt->bindParam(':idPost', $idPost);
			$stmt->bindParam(':idPagina', $idPagina);
			$stmt->bindParam(':idTorre', $idTorre);
			$stmt->bindParam(':idUsuario', $idUsuario);
			$stmt->bindParam(':ptsCurtida', $ptsCurtida);
			$stmt->bindParam(':ptsSeguidores', $ptsSeguidores);
			$stmt->bindParam(':ptsComentario', $ptsComentario);
			$stmt->bindParam(':ptsFavoritos', $ptsFavoritos);
			$stmt->bindParam(':ptsExtras', $ptsExtras);
			$stmt->bindParam(':ptsVisitas', $ptsVisitas);
			$stmt->bindParam(':ptsPost', $ptsPost);
			$stmt->bindParam(':ptsLoja', $ptsLoja);
			$stmt->bindParam(':ptsCompartilha', $ptsCompartilha);
			$stmt->bindParam(':ptsBonus', $ptsBonus);
			$stmt->bindParam(':ptsExtilos', $ptsExtilos);
			$stmt->bindParam(':id_pts', $id_pts);
			if ($stmt->execute()){
				return print_r($stmt->errorInfo());
			}else{
				return print_r($stmt->errorInfo());
			}
		}else{
		//Inserir novo 
			$bonus = 'NAO';
			if($bonus == 'SIM' ){ $ptsBonus = 2; }else{ $ptsBonus = 1;};
			$ptsExtilos = 0;
			if($local == 'SEGUIDORES'){ $ptsSeguidores = 100; }else{ $ptsSeguidores = 0; };
			if($local == 'CURTIDA'){ 	$ptsCurtida = 10; }else{ $ptsCurtida = 0; };
			if($local == 'COMENTARIO'){	$ptsComentario = 10; }else{ $ptsComentario = 0; };
			if($local == 'FAVORITOS'){ 	$ptsFavoritos = 15; }else{ $ptsFavoritos = 0; };
			if($local == 'EXTRA'){ 		$ptsExtras = 10;}else{ $ptsExtras = 0;};
			if($local == 'VISITAS'){	$ptsVisitas = 5; }else{ $ptsVisitas = 0;};
			if($local == 'PUBLICA'){	$ptsPost = 15;}else{$ptsPost = 0;};
			if($local == 'LOJA'){		$ptsLoja = 10; }else{$ptsLoja = 0;};
			if($local == 'COMPARTILHA'){$ptsCompartilha = 120; }else{ $ptsCompartilha = 0;};
		$PDO = db_connect();
			$sql = "
			INSERT INTO ext_pts(idPost, idPagina, idTorre, idUsuario, ptsSeguidores, ptsCurtida, ptsComentario, ptsFavoritos, ptsExtras, ptsVisitas, ptsPost, ptsLoja, ptsCompartilha, ptsBonus, ptsExtilos) 
			VALUES(:idPost, :idPagina, :idTorre, :idUsuario, :ptsSeguidores, :ptsCurtida, :ptsComentario, :ptsFavoritos, :ptsExtras, :ptsVisitas, :ptsPost, :ptsLoja, :ptsCompartilha, :ptsBonus, :ptsExtilos)";
			$stmt = $PDO->prepare($sql);
			$stmt->bindParam(':idPost', $idPost);
			$stmt->bindParam(':idPagina', $idPagina);
			$stmt->bindParam(':idTorre', $idTorre);
			$stmt->bindParam(':idUsuario', $idUsuario);
			$stmt->bindParam(':ptsCurtida', $ptsCurtida);
			$stmt->bindParam(':ptsSeguidores', $ptsSeguidores);
			$stmt->bindParam(':ptsComentario', $ptsComentario);
			$stmt->bindParam(':ptsFavoritos', $ptsFavoritos);
			$stmt->bindParam(':ptsExtras', $ptsExtras);
			$stmt->bindParam(':ptsVisitas', $ptsVisitas);
			$stmt->bindParam(':ptsPost', $ptsPost);
			$stmt->bindParam(':ptsLoja', $ptsLoja);
			$stmt->bindParam(':ptsCompartilha', $ptsCompartilha);
			$stmt->bindParam(':ptsBonus', $ptsBonus);
			$stmt->bindParam(':ptsExtilos', $ptsExtilos);
			if ($stmt->execute()){
				return print_r($stmt->errorInfo());
			}else{
				return print_r($stmt->errorInfo());
			}
		}


?>