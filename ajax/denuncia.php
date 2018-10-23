<?php 

if (isset($_POST['idPost'])){

	include_once '../conn/init.php';
	require_once '../functions/conexoes.php';
	date_default_timezone_set('America/Sao_Paulo');

	$idUsuario = $_POST['idUsuario'];
	$idPost = isset($_POST['idPost']) ? $_POST['idPost'] : null ;
	$dataDenuncia = date('d-m-Y');

	$denunciado = denuncia($idPost,$idUsuario);

	if (!isset($visitado)){
		$PDO = db_connect();
		$sql = "INSERT INTO ext_denuncia(idUsuario, idPost,  dataDenuncia) VALUES(:idUsuario, :idPost , :dataDenuncia)";
		$stmt = $PDO->prepare($sql);
		$stmt->bindParam(':idUsuario', $idUsuario);
		$stmt->bindParam(':idPost', $idPost);
		$stmt->bindParam(':dataDenuncia', $dataDenuncia);

		if($stmt->execute()){
			echo '<small>Denunciado!</small>'.$idUsuario ;
		}else{
			print_r($stmt->errorInfo());
		}
	}

}
?>
