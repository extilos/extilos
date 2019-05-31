<?php 
ob_start();
session_start();
require_once 'conn/init.php';
include_once "functions/conexoes.php";
include_once 'functions/iniciar.php';
date_default_timezone_set('America/Sao_Paulo');
include_once 'functions/functions.php';
include_once 'functions/cadastros.php';
include_once 'functions/tempo_pagina.php';
?>
<?php
// funsão para trazer conteúdos
	if (!isset($_GET['pg'])){
	//include 'teste.php';
		$getUrl = strip_tags(trim(filter_input(INPUT_GET, 'pg', FILTER_DEFAULT)));
		$getUrl = (empty($getUrl) ? 'index' : $getUrl);
		$url = explode('/', $getUrl);
		//print_r($url);
	 //echo $url[0];
	echo 'Não encontrado';
	//echo $resultado;
	}else{
		$getUrl = strip_tags(trim(filter_input(INPUT_GET, 'pg', FILTER_DEFAULT)));
		$getUrl = (empty($getUrl) ? 'index' : $getUrl);
		$url = explode('/', $getUrl);
		//echo $url[0];
	//------------------------------------ PÁGINAS FIXAS -------------------------------------------------
	//PAGINA DE CONFIMAÇÃO BLOG (ajustar)
		if ($url[0] === 'pagina'){
			if (isset($url[3])){
				echo 'pagina inválida';
			}else{
				include_once 'include/barra-superior.php';
				include '_EX_pagina.php';
			}exit;
		}
	//CARREGA PAGINA PRINCIPAL
		if ($url[0] === 'index'){
			if (isset($url[3])){echo 'pagina inválida';
			}else{

				include_once 'include/barra-superior.php';
				include '_EX_index.php';
			}exit;
		}
	//TORRE POST(ajustar)
	if ($url[0] === 'torre_post'){
		if (isset($url[3])){
			echo 'pagina inválida';
		}else{
			include_once 'include/barra-superior.php';
			include '_EX_post.php';
		}exit;
	}
	//TELA DE LOGIN
	if ($url[0] === 'login'){
		if (isset($url[3])){
			echo 'pagina inválida';
		}else{
			include_once 'include/barra-superior.php';
			include '_EX_login.php';
		}exit;
	}
	//CADASTRO DE USUÁRIO
	if ($url[0] === 'cadastro_pessoal'){
		if (isset($url[3])){echo 'pagina inválida';
		}else{
			include_once 'include/barra-superior.php';
			include '_EX_register.php';
		}exit;
	}
	//CADASTRO DE IMAGENS (tela de teste)
	if ($url[0] === 'meu_post'){
		if (isset($url[3])){echo 'pagina inválida';
		}else{
			include_once 'include/barra-superior.php';
			include '_EX_foto.php';
		}exit;
	}
	//ACESSO AO PAINEL DE GERENCIADOR(ajustar)
	if ($url[0] === 'gerenciamento'){
		if (isset($url[3])){echo 'pagina inválida';
		}else{
			include_once 'include/barra-superior.php';
			include '_EX_logger.php';
		}exit;
	}
	//PAINEL COM AS INFORMAÇÕES PARA O GERENCIADOR
	if ($url[0] === 'painel_gerenciamento'){
		if (isset($url[1])){
			// para adicionar mais um comando de busca dentro do painel extilos.com/painel_usuario/local&filtro01&filtro02...
			$filtro = explode('=', $url[1]);
			if ($url[1] === 'gerencia_usuarios' || $url[1] === 'meus_blogs' || $filtro[0] === 'editar_blog' || $url[1] === 'relatorio_geral' || $url[1] === 'blog_fa' || $url[1] === 'lista_fans' || $url[1] === 'editar_fans' || $url[1] === 'cadastro_torre'  || $url[1] === 'minhas_torres' ||  $filtro[0] === 'editar_torre' ){
				include '_EX_ger.php';
			}
			else{
				echo 'pagina inválida';
			}
		}else{
			$_SESSION['resposta'] = 'registrar';
			header("Location: painel_usuario/relatorio_geral"); exit;
		}exit;
		if (isset($url[3])){echo 'pagina inválida';}else{include '_EX_ger.php';}exit;
	}
	// CARREGA BLOG PROCURADO NA URL
	if ($url[0] === 'blog'){
		if (isset($url[1])){
			$filtro = explode('=', $url[1]);
			if(isset($filtro)){
				$buscaBlog = busca_nome_blog($filtro[0]);
				if ($buscaBlog  > ""){

					include_once 'include/barra-superior.php';
					include '_EX_blogs.php';
				}else{
					echo 'blog nao encontrado';
				}
				exit;
			}
			$buscaBlog = busca_nome_blog($url[1]);
			if ($buscaBlog  > ""){

				include_once 'include/barra-superior.php';
				include '_EX_blogs.php';
			}else{
				echo 'blog nao encontrado';
			}
			//include '_EX_buscaBlogs.php';
		}else{
			include_once 'include/barra-superior.php';
			include '_EX_blogs.php';
		}exit;
	}
	// CARREGA INFORMAÇÕES DO USUÁRIO
	if ($url[0] === 'usuario'){
		if (isset($url[3])){
			echo 'pagina inválida';
		}else{
			include_once 'include/barra-superior.php';
			include '_EX_usuario.php';
		}exit;
	}
	// CARREGA PÁGINA COM AS NOTIFÍCAÇÕES PARA O USUÁRIO
	if ($url[0] === 'notificacoes'){
		if (isset($url[3])){echo 'pagina inválida';
		}else{
			include_once 'include/barra-superior.php';
			include '_EX_notifica.php';
		}exit;
	}
	// CARREGA PÁGINA SOBRE O SITE
	if ($url[0] === 'sobre'){
		if (isset($url[3])){
			echo 'pagina inválida';
		}else{
			include_once 'include/barra-superior.php';
			include '_EX_sobre.php';
		}exit;
	}
	// CARREGA PÁGINA DE PASTAS DE ALBUM(página de testes)
	if ($url[0] === 'album_fotos'){
		if (isset($url[3])){
			echo 'pagina inválida';
		}else{
			include_once 'include/barra-superior.php';
			include '_EX_album.php';
		}exit;
	}
	// CARREGA PÁGINA COM MINHAS FOTOS(página de testes)
	if ($url[0] === 'minhas_fotos'){
		if (isset($url[3])){echo 'pagina inválida';
		}else{
			include_once 'include/barra-superior.php';
			include '_EX_minhas-fotos.php';
		}exit;
	}
	//CARREGA PÁGINA DE SAIR
	if ($url[0] === 'sair'){
		if (isset($url[1])){
			include '_EX_end.php';
		}else{
			include_once 'include/barra-superior.php';
			include '_EX_end.php';
		}exit;
	}
	//CARREGA PAINEL DO USUÁRIO - CADASTRO PÁGINA
	if ($url[0] === 'painel_usuario'){
		if (isset($url[1])){
			// para adicionar mais um comando de busca dentro do painel extilos.com/painel_usuario/local&filtro01&filtro02...
			$filtro = explode('=', $url[1]);
			if ($url[1] === 'cadastro_blog' || $url[1] === 'meus_blogs' || $filtro[0] === 'editar_blog' || $filtro[0] === 'editar_user' || $url[1] === 'relatorio_geral' || $url[1] === 'blog_fa' || $url[1] === 'lista_fans' || $url[1] === 'editar_fans' || $url[1] === 'cadastro_torre'  || $url[1] === 'minhas_torres' ||  $filtro[0] === 'editar_torre' ){
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

	// CARREGA PÁGINA COM RESULTADO DAS BUSCAS
	if ($url[0] === 'busca'){
		if (isset($url[3])){echo 'pagina inválida';
		}else{
			include_once 'include/barra-superior.php';
			include '_EX_busca.php';
		}exit;
	}
	//CARREGA PAINEL DO USUÁRIO - CADASTRO PÁGINA
	$buscaTorre = nome_torre($getUrl);
	if ($buscaTorre > ""){
		$buscaTorre = nome_torre($getUrl);
		if (isset($buscaTorre)){
			$_GET['idTorre'] = $buscaTorre['idTorre'];
			include_once 'include/barra-superior.php';
			include '_EX_torre.php';
			//exit;
		}
	
	//if ($url[0] === '_buscaTag'){include 'ajax/buscaTag.php';exit;}
	//-------------------------------------- BUSCADOR ----------------------------------------------------
	//$resultado = $Url[0]; // CASO A PALAVRA DIGIADA NÃO SEJA UMA PÁGINA FIXA ELE ENVIA PARA PAGINA DE BUSCA
	//if (isset($url[0])){
	//	include '404.html';exit;
	//}else{
	//	include '_EX_busca.php';exit;
	//}

	}else{
		$termo = 'Location: busca&termo='.$url[0];
		header($termo);
		}
}

?>

</body>

</html>
