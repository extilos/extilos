<?php
//-------------------------------------------- CADASTRO DE INFORMAÇÕES PARA O SISTEMA --------------------------------
include_once 'conn/init.php';
include_once 'conexoes.php';
//-------------------------------------------- CADASTRO AUTOMÁTICO DE INFORMAÇÕES PARA O SISTEMA --------------------------------
//cadastro automatico do tempo de carregamento de cada página.
	function cadastro_tempoPagina($pagina, $idUsuario, $tempo, $hora, $data){
		$PDO = db_connect();
		$sql = "INSERT INTO ext_tempopagina(pagina, idUsuario, tempo, hora, data) VALUES(:pagina, :idUsuario, :tempo, :hora, :data)";
		$stmt = $PDO->prepare($sql);
		$stmt->bindParam(':pagina', $pagina);
		$stmt->bindParam(':idUsuario', $idUsuario);
		$stmt->bindParam(':tempo', $tempo);
		$stmt->bindParam(':hora', $hora);
		$stmt->bindParam(':data', $data);
		$stmt->execute();
	}
	function atualiza_pontos($idUsuario){
		$resultado = postagens_usuario($idUsuario);
		while ($postagens = $resultado->fetch(PDO::FETCH_ASSOC)):
			$id_postagem = $postagens['id_postagem'];
			$post_pontos = soma_pontos($id_postagem,'post');
				$PDO = db_connect();
                 $sqli = "UPDATE ext_post SET post_pontos=:post_pontos WHERE id_postagem=:id_postagem";
                      $stmt = $PDO->prepare($sqli);
                      $stmt->bindParam(':post_pontos', $post_pontos);
                      $stmt->bindParam(':id_postagem', $id_postagem);
                      $stmt->execute();
		endwhile;
	}

	/**
	**/
?>