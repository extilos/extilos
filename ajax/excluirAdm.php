<?php
ob_start();
session_start();
include_once '../conn/init.php';
include_once '../functions/functions.php';
require_once '../functions/conexoes.php';

if(isset($_POST['idPermite'])){
	$id = $_POST['idPermite'];

	$PDO = db_connect();
	$sql = "DELETE FROM ext_permite WHERE idPermite = :id";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':id', $id);
	if($stmt->execute() === false){
		echo "<pre>";
		print_r($stmt->errorInfo());
	}
//echo $sql.'chegou aqui!'.$id;
}else{
	echo 'não chegou';
}
?>
