<?php
// VERIFICA SE USUÁRIO ESTÁ LOGADO
if (isset($_SESSION['idLogado'])){
	$idUsuario =  $_SESSION["idLogado"];
	if(!isset($_SESSION['tokenDia'])){
		$data = date('d-m-Y');
		$tokenDia = 'U'.md5($idUsuario).md5($data); //CRIA UM TOKEN DE VALIDAÇÃO DIÁRIA
		$_SESSION['tokenDia'] = $tokenDia;
	}else{
		$tokenDia = $_SESSION['tokenDia'];
	}
     //CARREGA VARIAVEL COM ID DO USÚARIO
}else{
	$idUsuario = '1'; //ID PADRÃO PARA VISITANTE
	if(!isset($_SESSION['tokenDia'])){
		$rand = rand(12345,54321); //CRIA UM NUMERO RAND PARA QUE NÃO OCORRA REPETIÇÃO
		$tokenDia = 'V'.md5($idUsuario).md5($rand); //CRIA UM TOKEN TEMPORÁRIO PARA SESSÃO DO VISITANTE
		$_SESSION['tokenDia'] = $tokenDia;
	}else{
		$tokenDia = $_SESSION['tokenDia'];
	}
    
}

// PREFERENCIA DE COR DE BOTÃO
function corbotao($corbotao){
	if ($corBotao = 0){
		$corBotao = '/extilos/aplicativo/css/style.blue.css';

	}else{
		$corBotao = '/extilos/aplicativo/css/style.pink.css';
	}
	return $corbotao;
}
?>