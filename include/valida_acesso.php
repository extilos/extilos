<?php
if(isset($_SESSION['idLogado']) && (isset($_POST['emailUsuario']))){
	if ($_SESSION['idLogado'] < 1){
		$_SESSION['resposta'] = 'negado';
    	header("Location: login"); exit;
	}
}else{
	$_SESSION['resposta'] = 'negado';
    	header("Location: login"); exit;
}
?>