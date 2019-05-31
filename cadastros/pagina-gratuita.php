<?php
session_start();
if(!isset($_SESSION['idLogado']) && (!isset($_POST['emailUsuario']))){
	$_SESSION['resp'] = 'negado';
	header("Location: login.php"); exit;
} 
require_once '../conn/init.php';

$dataPagina = date("Y-m-d");
$torrePagina = isset($_POST['torrePagina']) ? $_POST['torrePagina'] : null;
$idUsuario = isset($_SESSION['idLogado']) ? $_SESSION['idLogado'] : null;
$nomePagina = isset($_POST['nomePagina']) ? $_POST['nomePagina'] : null;
$descPagina = isset($_POST['descPagina']) ? $_POST['descPagina'] : null;
$estadoPagina = isset($_POST['estadoPagina']) ? $_POST['estadoPagina'] : null;
$cidadePagina = isset($_POST['cidadePagina']) ? $_POST['cidadePagina'] : null;
$emailPagina = isset($_POST['emailPagina']) ? $_POST['emailPagina'] : null;
$tipoPagina = isset($_POST['opcao']) ? $_POST['opcao'] : null;;
$pgCapa = 'album.jpg';


// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO ext_paginas(dataPagina, torrePagina, idUsuario, nomePagina, descPagina, estadoPagina, cidadePagina, emailPagina, tipoPagina, pgCapa) VALUES(:dataPagina, :torrePagina, :idUsuario, :nomePagina, :descPagina, :estadoPagina, :cidadePagina, :emailPagina, :tipoPagina, :pgCapa)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':dataPagina', $dataPagina);
$stmt->bindParam(':torrePagina', $torrePagina);
$stmt->bindParam(':idUsuario', $idUsuario);
$stmt->bindParam(':nomePagina', $nomePagina);
$stmt->bindParam(':descPagina', $descPagina);
$stmt->bindParam(':estadoPagina', $estadoPagina);
$stmt->bindParam(':cidadePagina', $cidadePagina);
$stmt->bindParam(':emailPagina', $emailPagina);
$stmt->bindParam(':tipoPagina', $tipoPagina);
$stmt->bindParam(':pgCapa', $pgCapa);

if ($stmt->execute())
{
	// Consulta para saber o ultimo post do usuário, para recuperar o valor de IDdo Post
	$sqlConsulta = "SELECT MAX(idPagina) as ultimo FROM ext_paginas where idUsuario = $idUsuario";
	$sqlExecuta = $PDO->prepare($sqlConsulta);
	$sqlExecuta -> execute();
	$ultimoNum = $sqlExecuta -> fetch(PDO::FETCH_ASSOC);
	$ultimo = $ultimoNum['ultimo'];

	$idPagina = $ultimo;
	$post = 1;
	$editar = 1;
	$excluir = 1;
	$cadastro = 1;
	$financeiro = 1;
	$PDO = db_connect();
	$sql = "INSERT INTO ext_permite(idPagina, idUsuario, pm_post, pm_editar, pm_excluir, pm_cadastro, pm_financeiro) VALUES(:idPagina, :idUsuario, :post, :editar, :excluir, :cadastro, :financeiro)";
	$stmt = $PDO->prepare($sql);

	$stmt->bindParam(':idUsuario', $idUsuario);
	$stmt->bindParam(':idPagina', $idPagina);
	$stmt->bindParam(':post', $post);
	$stmt->bindParam(':editar', $editar);
	$stmt->bindParam(':excluir', $excluir);
	$stmt->bindParam(':cadastro', $cadastro);
	$stmt->bindParam(':financeiro', $financeiro);

	if ($stmt->execute()){

		$albumBlog = 'album';
		$PDO = db_connect();
		$sql = "INSERT INTO album_blog(idPagina, idUsuario, albumBlog, data) VALUES(:idPagina, :idUsuario, :albumBlog, :data)";
		$stmt = $PDO->prepare($sql);
		$stmt->bindParam(':idPagina', $idPagina);
		$stmt->bindParam(':idUsuario', $idUsuario);
		$stmt->bindParam(':albumBlog', $albumBlog);
		$stmt->bindParam(':data', $dataPagina);


		if ($stmt->execute())
		{
			
			$PDO = db_connect();
			$sqli = "INSERT INTO ext_dados_paginas(idPagina) VALUES(:idPagina)";
			
			$stmt = $PDO->prepare($sqli);
			$stmt->bindParam(':idPagina', $idPagina);
			if ($stmt->execute())
			{
				header('Location: ../painel_usuario/meus_blogs');
			}
		}
		else
		{
			echo "Erro ao cadastrar";
			print_r($stmt->errorInfo());
		}
	}else{
		echo 'Ocorreu algum erro!';
	}

	$_SESSION['resposta'] = 'npg_criada';
    //header('Location: ../paginas-usuario.php');
}
else
{
	$_SESSION['resposta'] = 'npg_erro';
    //header('Location: ../nova-pg-gratuita.php');
}