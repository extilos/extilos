<?php
ob_start();
session_start();
require_once '../conn/init.php';
require_once '../functions/functions.php';
$PDO = db_connect();
//CONSULTA A TORRE DE PREFERÊNCIA DO USUÁRIO
	if (isset($_POST['nomePagina'])){
		//VERIFICAÇÕES DO NOME DA PÁGINA
		$nomePagina = $_POST['nomePagina'];
		$nomePagina = preg_replace('/[^a-z0-9]/i', '_', $nomePagina);
		$nomePagina = sanitizeString($nomePagina);
		$verificaPalavra = substr_count($nomePagina, '_');
		$verificaCaracteres = preg_replace("/[^A-Za-z]/", "", $nomePagina);
		$contaLetras = strlen($verificaCaracteres);
	}
	if ($contaLetras < 3){
			echo '
			<div class="span4">
			Nome:
			<b style="color:#c90a00">'.$nomePagina.' </b>| Alerta! Você precisa usar no mínimo 3 letras.
			<script>document.getElementById("criarPagina").disabled = true;</script>
			<script>document.getElementById("pagSeguro").disabled = true;</script>
								';
	}else{
	if($verificaPalavra > 4){
			echo '
			<div class="span4">
			Nome:
			<b style="color:#c90a00">'.$nomePagina.' </b>| Alerta! Só é possível usar 4 separadores "_" você usou: '. $verificaPalavra.', tente escrever de outra forma
			<script>document.getElementById("criarPagina").disabled = true;</script>
			<script>document.getElementById("pagSeguro").disabled = true;</script>
								';
		}else{
	$conta = strlen($nomePagina);
	if ($conta < 3){
		echo '
			<div class="span4">
			Nome:
			<b style="color:#c90a00">'.$nomePagina.' </b>| Alerta! Nome minimo com 3 letras.
			<script>document.getElementById("criarPagina").disabled = true;</script>
			<script>document.getElementById("pagSeguro").disabled = true;</script>
								';
	}else{
		$sql_pagina = "SELECT nomePagina FROM ext_paginas where nomePagina = '$nomePagina' ";
		$stmt_pagina = $PDO->prepare($sql_pagina);
		$stmt_pagina->execute();
		$paginaResposta = $stmt_pagina->fetch(PDO::FETCH_ASSOC);
			if(isset($paginaResposta)){
				if ($nomePagina == $paginaResposta['nomePagina']){
					echo '
					<div class="span4">
					Nome:
					<b style="color:#FF0000">'.$nomePagina.'</b> | Ops! Nome Indisponível.
					<script>document.getElementById("criarPagina").disabled = true;</script>
					<script>document.getElementById("pagSeguro").disabled = true;</script>
								';
				}else{
									echo '
							            <div class="span4">
							            Nome:
								        	<b style="color:#228B22">'.$nomePagina.' </b>| Legal! Nome Disponível.
								        	<input type=hidden name="nomePagina" value="'.$nomePagina.'">
								        	<script>document.getElementById("criarPagina").disabled = false;</script>
								        	<script>document.getElementById("pagSeguro").disabled = false;</script>
										</div>
									';
								}
							}
						}

					}
				}

	?>