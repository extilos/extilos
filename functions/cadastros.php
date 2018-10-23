<?php
//-------------------------------------------- CADASTRO DE INFORMAÇÕES PARA O SISTEMA --------------------------------
	function cadastro_tempoPagina($pagina, $idUsuario, $tempo, $hora, $data){
		$PDO = db_connect();
		$sql = "INSERT INTO ext_tempopagina(pagina, idUsuario, tempo, hora, data) VALUES(:pagina, :idUsuario, :tempo, :hora, :data)";
		$stmt = $PDO->prepare($sql);
		$stmt->bindParam(':pagina', $pagina);
		$stmt->bindParam(':idUsuario', $idUsuario);
		$stmt->bindParam(':tempo', $tempo);
		$stmt->bindParam(':hora', $hora);
		$stmt->bindParam(':data', $data);
		$stmt->execute();
	}
?>