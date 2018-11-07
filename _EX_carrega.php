<?php 
ob_start();
session_start();
require_once 'conn/init.php';
include "functions/conexoes.php";
date_default_timezone_set('America/Sao_Paulo');
?>

<?php
// funsão para trazer conteúdos
if (!isset($_GET['pg'])){
	//echo $resultado;
	}else{
		$getUrl = strip_tags(trim(filter_input(INPUT_GET, 'pg', FILTER_DEFAULT)));
		$getUrl = (empty($getUrl) ? 'index' : $getUrl);
		$url = explode('/', $getUrl);

		

	//------------------------------------ PÁGINAS FIXAS -------------------------------------------------
	//CARREGA PAGINA PRINCIPAL
	if ($url[0] === 'index'){
		if (isset($url[3])){echo 'pagina inválida';
		}else{
			include '_EX_index.php';
		}exit;
	}
	if ($url[0] === 'teste'){if (isset($url[3])){echo 'pagina inválida';}else{include 'testes_gerais.php';}exit;}
	if ($url[0] === 'pagina'){if (isset($url[3])){echo 'pagina inválida';}else{include '_EX_pagina.php';}exit;}

	if ($url[0] === 'index'){if (isset($url[3])){echo 'pagina inválida';}else{include '_EX_index.php';}exit;}
	if ($url[0] === 'torre_post'){if (isset($url[3])){echo 'pagina inválida';}else{include '_EX_post.php';}exit;}
	if ($url[0] === 'torre'){if (isset($url[3])){echo 'pagina inválida';}else{include '_EX_torre.php';}exit;}
	if ($url[0] === 'login'){if (isset($url[3])){echo 'pagina inválida';}else{include '_EX_login.php';}exit;}
	if ($url[0] === 'cadastro_pessoal'){if (isset($url[3])){echo 'pagina inválida';}else{include '_EX_register.php';}exit;}
	if ($url[0] === 'meu_post'){if (isset($url[3])){echo 'pagina inválida';}else{include '_EX_foto.php';}exit;}
	// CARREGA PÁGINA DE PASTAS DE ALBUM
	if ($url[0] === 'album_fotos'){if (isset($url[3])){echo 'pagina inválida';}else{include '_EX_album.php';}exit;}
	// CARREGA PÁGINA COM MINHAS FOTOS
	if ($url[0] === 'minhas_fotos'){if (isset($url[3])){echo 'pagina inválida';}else{include '_EX_minhas-fotos.php';}exit;}
	//CARREGA PÁGINA DE SAIR
	if ($url[0] === 'sair'){if (isset($url[1])){include '_EX_end.php';}else{include '_EX_end.php';}exit;}
	//CARREGA PAINEL DO USUÁRIO - CADASTRO PÁGINA
	if ($url[0] === 'painel_usuario'){
		if (isset($url[1])){
			// para adicionar mais um comando de busca dentro do painel extilos.com/painel_usuario/local&filtro01&filtro02...
			$filtro = explode('=', $url[1]);
			if ($url[1] === 'cadastro_blog' || $url[1] === 'meus_blogs' || $filtro[0] === 'editar_blog' || $url[1] === 'relatorio_geral' || $url[1] === 'blog_fa' || $url[1] === 'lista_fans' || $url[1] === 'editar_fans' || $url[1] === 'cadastro_torre'  || $url[1] === 'minhas_torres' || $filtro[0] === 'editar_torre' ){
				include '_EX_painel-usuario.php';
			}
			else{
				echo 'pagina inválida';
			}
		}else{
				$_SESSION['resposta'] = 'registrar';
    			header("Location: painel_usuario/relatorio_geral"); exit;
		}exit;
	}


		$buscaTorre = nome_torre($getUrl);
	if (isset($buscaTorre)){
				$_GET['idTorre'] = $buscaTorre['idTorre'];
				include '_EX_torre.php';
			exit;
		}

	//if ($url[0] === '_buscaTag'){include 'ajax/buscaTag.php';exit;}
	//-------------------------------------- BUSCADOR ----------------------------------------------------
	//$resultado = $Url[0]; // CASO A PALAVRA DIGIADA NÃO SEJA UMA PÁGINA FIXA ELE ENVIA PARA PAGINA DE BUSCA
	//if (isset($url[0])){
	//	include '404.html';exit;
	//}else{
	//	include '_EX_busca.php';exit;
	//}

	}

?>
