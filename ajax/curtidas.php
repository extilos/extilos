<?php 

if (isset($_POST['idPost'])){
	include_once '../conn/init.php';
	require_once '../functions/conexoes.php';
	date_default_timezone_set('America/Sao_Paulo');

	$idPost = $_POST['idPost'];
	$idUsuario = $_POST['idUsuario'];
	$positivo = $_POST['positivo'];
	$negativo = $_POST['negativo'];
	$data = date('d-m-Y H:i');

	$curtido = curtidos($idPost , $idUsuario);
	if (isset($curtido['idCurtida'])){
		$idCurtida = $curtido['idCurtida'];
		if($curtido['curtir_positivo']>0){
			$positivo = 0;
		}
		if($curtido['curtir_negativo']>0){
			$negativo = 0;
		}
		$PDO = db_connect();
		$sql = "UPDATE ext_curtidas SET id_post = :idPost, idUsuario = :idUsuario, curtir_positivo = :positivo, curtir_negativo = :negativo, data_atualizado = :data WHERE idCurtida = :idCurtida";
		$stmt = $PDO->prepare($sql);
		$stmt->bindParam(':idCurtida', $idCurtida);
		$stmt->bindParam(':idPost', $idPost);
		$stmt->bindParam(':idUsuario', $idUsuario);
		$stmt->bindParam(':positivo', $positivo);
		$stmt->bindParam(':negativo', $negativo);
		$stmt->bindParam(':data', $data);

		if ($stmt->execute())
		{
			if($_POST['positivo'] > 0){
				$total = total_like($idPost);
				if ($positivo > 0){
				$estilo = 'color:#0d86c6';
				}else{
				$estilo = 'color:#000';
				}
				echo '<b><i class="fa fa-thumbs-up" style="'.$estilo.'"></i>' .$total.'</b>';
			}elseif($_POST['negativo'] > 0){
				$total = total_deslike($idPost);
				if ($negativo > 0){
				$estilo = 'color:#f2341a';
				}else{
				$estilo = 'color:#000';
				}
				echo '<b><i class="fa fa-thumbs-down" style="'.$estilo.'"></i>' .$total.'</b>';

			}
			

		}else{
			print_r($stmt->errorInfo());
		}
	}else{
		$PDO = db_connect();
		$sql = "INSERT INTO ext_curtidas(id_post, idUsuario, curtir_positivo, curtir_negativo, data_atualizado) VALUES(:idPost, :idUsuario, :positivo , :negativo, :data)";
		$stmt = $PDO->prepare($sql);
		$stmt->bindParam(':idPost', $idPost);
		$stmt->bindParam(':idUsuario', $idUsuario);
		$stmt->bindParam(':positivo', $positivo);
		$stmt->bindParam(':negativo', $negativo);
		$stmt->bindParam(':data', $data);

		if ($stmt->execute())
		{
			if($_POST['positivo'] > 0){
				$total = total_like($idPost);
				if ($positivo > 0){
				$estilo = 'color:#0d86c6';
				}else{
				$estilo = 'color:#000';
				}
				echo '<b><i class="fa fa-thumbs-up" style="'.$estilo.'"></i>' .$total.'</b>';
			}elseif($_POST['negativo'] > 0){
				$total = total_deslike($idPost);
				if ($negativo > 0){
				$estilo = 'color:#f2341a';
				}else{
				$estilo = 'color:#000';
				}
				echo '<b><i class="fa fa-thumbs-down" style="'.$estilo.'"></i>' .$total.'</b>';
			}
		}else{
			print_r($stmt->errorInfo());
		}
	}

}else{
	echo 'algo de errado não esta certo';
	exit;
}

?>