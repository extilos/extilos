<?php

require_once 'conn/init.php';
//VERIFICAÇÕES INICIAIS;
date_default_timezone_set('America/Sao_Paulo');
$data = date('d-m-Y');
$hora = date('H:i');
$executionStartTime = microtime(true);
$explode = explode('/',$_SERVER["REQUEST_URI"]);
$total = count($explode);
if ($total == 3){
    $caminho = "";
}
if ($total == 4){
    $caminho = "../";
}
if ($total == 5){
    $caminho = "../../";
}
// VERIFICA SE USUÁRIO ESTÁ LOGADO
if (isset($_SESSION['idLogado'])){
	$idUsuario =  $_SESSION["idLogado"];
	//$_SESSION['retorno'] = $_SERVER["REQUEST_URI"];
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
	//$_SESSION['retorno'] = $_SERVER["REQUEST_URI"];
	if(!isset($_SESSION['tokenDia'])){
		$rand = rand(12345,54321); //CRIA UM NUMERO RAND PARA QUE NÃO OCORRA REPETIÇÃO
		$tokenDia = 'V'.md5($idUsuario).md5($rand); //CRIA UM TOKEN TEMPORÁRIO PARA SESSÃO DO VISITANTE
		$_SESSION['tokenDia'] = $tokenDia;
	}else{
		$tokenDia = $_SESSION['tokenDia'];
	}
    
}


?>