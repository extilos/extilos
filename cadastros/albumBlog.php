<?php
session_start();
require_once '../conn/init.php';
include_once '../functions/functions.php';

// carrega os dados a serem salvos
$data = date("Y-m-d");
$idUsuario = $_SESSION['idLogado'];
$idPagina = isset($_POST['idPagina']) ? $_POST['idPagina'] : null;
$local = isset($_POST['local']) ? $_POST['local'] : 'history.go(-1)';
$albumBlog = isset($_POST['nomePasta']) ? $_POST['nomePasta'] : null;

//limpa a string de caracteres especiais
$idUsuario = sanitizeString($idUsuario);
$idPagina = sanitizeString($idPagina);
$albumBlog = sanitizeString($albumBlog);

// validação (bem simples, só pra evitar dados vazios)
if (empty($albumBlog))
{
	$_SESSION['resposta'] = 'alb_nome_negado';
	//$_SESSION['n'] = $_POST['nomeUsuario'];
   	//header("Location: album_fotos");
    exit;
}

// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO album_blog(idPagina, idUsuario, albumBlog, data) VALUES(:idPagina, :idUsuario, :albumBlog, :data)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':idPagina', $idPagina);
$stmt->bindParam(':idUsuario', $idUsuario);
$stmt->bindParam(':albumBlog', $albumBlog);
$stmt->bindParam(':data', $data);


if ($stmt->execute())
{
	//$_SESSION['e'] = $_POST['emailUsuBasico'];
	//$_SESSION['resposta'] = 'alb_nome_criado';
   header('location:'.$local.'#albuns');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}