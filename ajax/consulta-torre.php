<?php
require_once '../conn/init.php';
require_once '../functions/functions.php';
require_once '../functions/conexoes.php';
$PDO = db_connect();
//CONSULTA A TORRE DE PREFERÊNCIA DO USUÁRIO
	if (isset($_POST['nomeTorre'])){
		//VERIFICAÇÕES DO NOME DA PÁGINA
		$nomeTorre = $_POST['nomeTorre'];
		$nomeTorre = preg_replace('/[^a-z0-9]/i', '_', $nomeTorre);
		$nomeTorre = sanitizeString($nomeTorre);
		$verificaPalavra = substr_count($nomeTorre, '_');
		$verificaCaracteres = preg_replace("/[^A-Za-z]/", "", $nomeTorre);
		$contaLetras = strlen($verificaCaracteres);
	}
	if ($contaLetras < 3){
			echo '
			<div class="span4">
			Nome:
			<b style="color:#c90a00">'.$nomeTorre.' </b>| Alerta! Você precisa usar no mínimo 3 letras.
			<script>document.getElementById("criarPagina").disabled = true;</script>
			<script>document.getElementById("pagSeguro").disabled = true;</script>
								';
	}else{
	if($verificaPalavra > 4){
			echo '
			<div class="span4">
			Nome:
			<b style="color:#c90a00">'.$nomeTorre.' </b>| Alerta! Só é possível usar 4 separadores "_" você usou: '. $verificaPalavra.', tente escrever de outra forma
			<script>document.getElementById("criarPagina").disabled = true;</script>
			<script>document.getElementById("pagSeguro").disabled = true;</script>
								';
		}else{
	$conta = strlen($nomeTorre);
	if ($conta < 3){
		echo '
			<div class="span4">
			Nome:
			<b style="color:#c90a00">'.$nomeTorre.' </b>| Alerta! Nome minimo com 3 letras.
			<script>document.getElementById("criarPagina").disabled = true;</script>
			<script>document.getElementById("pagSeguro").disabled = true;</script>
								';
	}else{
		$paginaResposta = nome_torre($nomeTorre);
			if(isset($paginaResposta)){
				if ($nomeTorre == $paginaResposta['nomeTorre']){
					echo '
					<div class="span4">
					Nome:
					<b style="color:#FF0000">'.$nomeTorre.'</b> | Ops! Nome Indisponível.
					<script>document.getElementById("criarPagina").disabled = true;</script>
					<script>document.getElementById("pagSeguro").disabled = true;</script>
								';
				}else{
									echo '
							            <div class="span4">
							            Nome:
								        	<b style="color:#228B22">'.$nomeTorre.' </b>| Legal! Nome Disponível.
								        	<input type=hidden name="nomeTorre" value="'.$nomeTorre.'">
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