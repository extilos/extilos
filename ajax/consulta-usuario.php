<?php
ob_start();
session_start();
require_once '../conn/init.php';
require_once '../cadastros/caracteres-especiais.php';
$PDO = db_connect();
//CONSULTA A TORRE DE PREFERÊNCIA DO USUÁRIO
	if (isset($_POST['nickName'])){
		//VERIFICAÇÕES DO NOME DA PÁGINA
		$nickName = $_POST['nickName'];
		$nickName = preg_replace('/[^a-z0-9]/i', '_', $nickName);
		$nickName = sanitizeString($nickName);
		$verificaPalavra = substr_count($nickName, '_');
		$verificaCaracteres = preg_replace("/[^A-Za-z]/", "", $nickName);
		$contaLetras = strlen($verificaCaracteres);
		$nickName = '@'.$nickName;
	}
	if ($contaLetras < 3){
			echo '
			<div class="span4">
			Nome:
			<b style="color:#ff9d00">'.$nickName.' | Alerta! Você precisa usar no mínimo 3 letras.</b>
			<script>document.getElementById("complementoCadastro").disabled = true;</script>
								';
	}else{
	if($verificaPalavra > 4){
			echo '
			<div class="span4">
			Nome:
			<b style="color:#ff9d00">'.$nickName.' | Alerta! Só é possível usar 4 separadores "_" você usou: '. $verificaPalavra.', tente escrever de outra forma</b>
			<script>document.getElementById("complementoCadastro").disabled = true;</script>
								';
		}else{
	$conta = strlen($nickName);
	if ($conta < 3){
		echo '
			<div class="span4">
			Nome:
			<b style="color:#ff9d00">'.$nickName.' | Alerta! Nome minimo com 3 letras</b>
			<script>document.getElementById("complementoCadastro").disabled = true;</script>
								';
	}else{
		$sql_pagina = "SELECT * FROM ext_usuarios where usuMarca = '$nickName' ";
		$stmt_pagina = $PDO->prepare($sql_pagina);
		$stmt_pagina->execute();
		$paginaResposta = $stmt_pagina->fetch(PDO::FETCH_ASSOC);
			if(isset($paginaResposta)){
				if ($nickName == $paginaResposta['usuMarca']){
					echo '
					<div class="span4">
					Nome:
					<b style="color:#FF0000">'.$nickName.' | Ops! Nome Indisponível</b>
					<script>document.getElementById("complementoCadastro").disabled = true;</script>
								';
				}else{
									echo '
							            <div class="span4">
							            Nome:
								        	<b style="color:#228B22">'.$nickName.' | Legal! Nome Disponível</b>
								        	<input type=hidden name="nickName" value="'.$nickName.'">
								        	<script>document.getElementById("complementoCadastro").disabled = false;</script>
										</div>
									';
								}
							}
						}

					}
				}

	?>