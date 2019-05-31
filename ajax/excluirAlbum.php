<?php
ob_start();
session_start();
include_once '../conn/init.php';
include_once '../functions/functions.php';
require_once '../functions/conexoes.php';

if (isset($_POST['album']))
$album = $_POST['album'];
$tipo = $_POST['tipo'];
$local = $_POST['local'];
$valor = 1;

			$PDO = db_connect();
			if ($tipo == 'blog'){
			$sql = "UPDATE album_blog SET album_inativo = :valor WHERE idAlbumBlog=:album";
			}
			$stmt= $PDO->prepare($sql);
			$stmt->bindParam(':album', $album);
			$stmt->bindParam(':valor', $valor);
		if ($stmt->execute())
			{
				
			}

?>