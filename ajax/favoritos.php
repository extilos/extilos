<?php 

if (isset($_POST['idPost'])){
	include_once '../conn/init.php';
	require_once '../functions/conexoes.php';
	date_default_timezone_set('America/Sao_Paulo');

	$idPost = $_POST['idPost'];
	$idUsuario = $_POST['idUsuario'];
	$favorito = 1;
	$data = date('d-m-Y H:i');

	$favoritos = favoritos($idPost , $idUsuario);
	if (isset($favoritos['idFavorito'])){
		$idCurtida = $favoritos['idFavorito'];
		if($favoritos['favorito']>0){
			$favorito = 0;
		}
		$PDO = db_connect();
		$sql = "UPDATE ext_favoritos SET id_post = :idPost, idUsuario = :idUsuario, favorito = :favorito, data = :data WHERE idFavorito = :idFavorito";
		$stmt = $PDO->prepare($sql);
		$stmt->bindParam(':idFavorito', $idCurtida);
		$stmt->bindParam(':idPost', $idPost);
		$stmt->bindParam(':idUsuario', $idUsuario);
		$stmt->bindParam(':favorito', $favorito);
		$stmt->bindParam(':data', $data);

		if ($stmt->execute())
		{
			if ($favorito > 0){
			echo '<i class="fa fa-star" style="color:#e8e04e" ></i>';
			}else{
			echo '<i class="fa fa-star" style="color:#000" ></i>';
			}

		}else{
			print_r($stmt->errorInfo());
		}
	}else{
		$PDO = db_connect();
		$sql = "INSERT INTO ext_favoritos(id_post, idUsuario, favorito, data) VALUES(:idPost, :idUsuario, :favorito , :data)";
		$stmt = $PDO->prepare($sql);
		$stmt->bindParam(':idPost', $idPost);
		$stmt->bindParam(':idUsuario', $idUsuario);
		$stmt->bindParam(':favorito', $favorito);
		$stmt->bindParam(':data', $data);

		if ($stmt->execute())
		{
			echo '<i class="fa fa-star" style="color:#e8e04e" ></i>';

		}else{
			print_r($stmt->errorInfo());
		}
	}

}else{
	echo 'algo de errado não esta certo';
	exit;
}

?>