<?php 

if (isset($_POST['idPost'])){

	include_once '../conn/init.php';
	require_once '../functions/conexoes.php';
	date_default_timezone_set('America/Sao_Paulo');

	$idUsuario = $_POST['idUsuario'];
	$idPost = isset($_POST['idPost']) ? $_POST['idPost'] : null ;
	$idTorre = isset($_POST['idTorre']) ? $_POST['idTorre'] : null;
	$dataVisita = date('d-m-Y');

	$visitado = visitas($idPost,$idUsuario);

	if (isset($visitado)){
		if($visitado['dataVisita'] < $dataVisita){
			$PDO = db_connect();
			$sql = "INSERT INTO ext_visita(idUsuario, idPost, idTorre, dataVisita) VALUES(:idUsuario, :idPost , :idTorre, :dataVisita)";
			$stmt = $PDO->prepare($sql);
			$stmt->bindParam(':idUsuario', $idUsuario);
			$stmt->bindParam(':idPost', $idPost);
			$stmt->bindParam(':idTorre', $idTorre);
			$stmt->bindParam(':dataVisita', $dataVisita);

			if($stmt->execute()){
				echo '<small> Sua última visita foi no dia '.$visitado['dataVisita'].'</small>';
			}else{
				print_r($stmt->errorInfo());
			}
		}else{
			echo '<small> Data da visita '.$visitado['dataVisita'].'</small>';
		}
		
	}else{
		$PDO = db_connect();
		$sql = "INSERT INTO ext_visita(idUsuario, idPost, idTorre, dataVisita) VALUES(:idUsuario, :idPost , :idTorre, :dataVisita)";
		$stmt = $PDO->prepare($sql);
		$stmt->bindParam(':idUsuario', $idUsuario);
		$stmt->bindParam(':idPost', $idPost);
		$stmt->bindParam(':idTorre', $idTorre);
		$stmt->bindParam(':dataVisita', $dataVisita);

		if($stmt->execute()){
			echo '<small> Data da visitas '.$visitado['dataVisita'].'</small>';
		}else{
			print_r($stmt->errorInfo());
		}
	}

}
?>
