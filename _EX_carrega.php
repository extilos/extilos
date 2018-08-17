<?php 
ob_start();
session_start();
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
	if ($url[0] === 'torre_post'){if (isset($url[3])){echo 'pagina inválida';}else{include '_EX_post.php';}exit;}
	if ($url[0] === 'torre'){if (isset($url[3])){echo 'pagina inválida';}else{include '_EX_torre.php';}exit;}
	if ($url[0] === 'login'){if (isset($url[3])){echo 'pagina inválida';}else{include '_EX_login.php';}exit;}
	if ($url[0] === 'meu_post'){if (isset($url[3])){echo 'pagina inválida';}else{include '_EX_foto.php';}exit;}
	if ($url[0] === 'album'){if (isset($url[3])){echo 'pagina inválida';}else{include '_EX_album.php';}exit;}
	if ($url[0] === 'fotos'){if (isset($url[3])){echo 'pagina inválida';}else{include '_EX_minhas-fotos.php';}exit;}
	//-------------------------------------- BUSCADOR ----------------------------------------------------
	$resultado = $Url[0]; // CASO A PALAVRA DIGIADA NÃO SEJA UMA PÁGINA FIXA ELE ENVIA PARA PAGINA DE BUSCA
	if (isset($url[1])){
		include '404.html';exit;
	}else{
		include '_EX_busca.php';exit;
	}

	}

?>
