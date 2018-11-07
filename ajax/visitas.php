<?php 

if (isset($_POST['idPost'])){

	include_once '../conn/init.php';
	require_once '../functions/conexoes.php';
	require_once '../functions/cadastros.php';
	date_default_timezone_set('America/Sao_Paulo');
	$idPagina = '0';
	$idUsuario = $_POST['idUsuario'];
	$idPost = isset($_POST['idPost']) ? $_POST['idPost'] : null ;
	$idTorre = isset($_POST['idTorre']) ? $_POST['idTorre'] : null;
	$tokenDia = isset($_POST['tokenDia']) ? $_POST['tokenDia'] : null;
	$dataVisita = date('d-m-Y');
	$visitado = visitas($idPost,$tokenDia);
	//CADASTRO DE PONTUAÇÃO
	cadastro_pontos('VISITAS',$idPost,$idPagina,$idUsuario,$idTorre);
	
	if (isset($visitado)){
		if($visitado['dataVisita'] < $dataVisita){ // verifica se a data do ultimo acesso é menor do que a data atual
			$PDO = db_connect();
			$sql = "INSERT INTO ext_visita(idUsuario, tokenDia, idPost, idTorre, dataVisita) VALUES(:idUsuario,:tokenDia, :idPost , :idTorre, :dataVisita)";
			$stmt = $PDO->prepare($sql);
			$stmt->bindParam(':idUsuario', $idUsuario);
			$stmt->bindParam(':tokenDia', $tokenDia);
			$stmt->bindParam(':idPost', $idPost);
			$stmt->bindParam(':idTorre', $idTorre);
			$stmt->bindParam(':dataVisita', $dataVisita);

			if($stmt->execute()){
				echo '<small> Data da visita '.$dataVisita.'</small>';
			}else{
				print_r($stmt->errorInfo());
			}
		}else{
			echo '<small> Sua última visita foi no dia '.$visitado['dataVisita'].'</small>';
		}
		
	}else{
		$PDO = db_connect();
		$sql = "INSERT INTO ext_visita(idUsuario, tokenDia, idPost, idTorre, dataVisita) VALUES(:idUsuario, :tokenDia, :idPost , :idTorre, :dataVisita)";
		$stmt = $PDO->prepare($sql);
		$stmt->bindParam(':idUsuario', $idUsuario);
			$stmt->bindParam(':tokenDia', $tokenDia);
		$stmt->bindParam(':idPost', $idPost);
		$stmt->bindParam(':idTorre', $idTorre);
		$stmt->bindParam(':dataVisita', $dataVisita);

		if($stmt->execute()){
			echo '<small> Sua última visita foi no dia '.$visitado['dataVisita'].'</small>';
		}else{
			print_r($stmt->errorInfo());
		}
	}

}
?>
