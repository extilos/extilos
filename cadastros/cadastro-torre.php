<?php
session_start();
if(!isset($_SESSION['idLogado']) && (!isset($_POST['emailUsuario']))){
    $_SESSION['resp'] = 'negado';
    header("Location: login.php"); exit;
} 
require_once '../conn/init.php';


$emailTorre = isset($_POST['emailTorre']) ? $_POST['emailTorre'] : null;
$idUsuario = isset($_SESSION['idLogado']) ? $_SESSION['idLogado'] : null;
$nomeTorre = isset($_POST['nomeTorre']) ? $_POST['nomeTorre'] : null;
$descTorre = isset($_POST['descTorre']) ? $_POST['descTorre'] : null;
$torreImg = 'album.jpg';
$torreData = date("Y-m-d");
$cidadeTorre = isset($_POST['cidadeTorre']) ? $_POST['cidadeTorre'] : null;
$estadoTorre = isset($_POST['estadoTorre']) ? $_POST['estadoTorre'] : null;
$publicTorre = isset($_POST['publicTorre']) ? $_POST['publicTorre'] : null;
$tipoTorre = isset($_POST['tipoTorre']) ? $_POST['tipoTorre'] : null;
$permiteTorre = '0';
$setorTorre = isset($_POST['setorTorre']) ? $_POST['setorTorre'] : null;


// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO ext_torre(emailTorre, idUsuario, nomeTorre, descTorre, torreImg, torreData, cidadeTorre, estadoTorre, tipoTorre, publicTorre, permiteTorre, setorTorre) VALUES(:emailTorre, :idUsuario, :nomeTorre, :descTorre, :torreImg, :torreData, :cidadeTorre, :estadoTorre, :tipoTorre, :publicTorre, :permiteTorre, :setorTorre)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':emailTorre', $emailTorre);
$stmt->bindParam(':idUsuario', $idUsuario);
$stmt->bindParam(':nomeTorre', $nomeTorre);
$stmt->bindParam(':descTorre', $descTorre);
$stmt->bindParam(':torreImg', $torreImg);
$stmt->bindParam(':torreData', $torreData);
$stmt->bindParam(':cidadeTorre', $cidadeTorre);
$stmt->bindParam(':estadoTorre', $estadoTorre);
$stmt->bindParam(':tipoTorre', $tipoTorre);
$stmt->bindParam(':publicTorre', $publicTorre);
$stmt->bindParam(':permiteTorre', $permiteTorre);
$stmt->bindParam(':setorTorre', $setorTorre);

if ($stmt->execute())
{

    $_SESSION['resposta'] = 'npg_criada';
    header('Location: ../painel_usuario/cadastro_torre');
}
else
{
    //$_SESSION['resposta'] = 'npg_erro';
    //header('Location: ../painel_usuario/cadastro_torre');
     echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}