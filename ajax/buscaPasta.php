<?php
ob_start();
session_start();
require_once '../conn/init.php';
require_once '../functions/functions.php';
require_once '../functions/conexoes.php';
$PDO = db_connect();
//CONSULTA A TORRE DE PREFERÊNCIA DO USUÁRIO
	if (isset($_POST['nomePasta'])){
		//VERIFICAÇÕES DO NOME DA PÁGINA
		$nomePasta = $_POST['nomePasta'];
		$idPagina = $_POST['idPagina'];
		$qtde = album_total_blog($idPagina);
		$nomePasta = preg_replace('/[^a-z0-9]/i', '_', $nomePasta);
		$nomePasta = sanitizeString($nomePasta);
		$verificaPalavra = substr_count($nomePasta, '_');
		$verificaCaracteres = preg_replace("/[^A-Za-z]/", "", $nomePasta);
		$contaLetras = strlen($verificaCaracteres);


	if ($qtde >= '10'){
			echo '
			<div class="span4">
			Contém:
			<b style="color:#c90a00">'.$qtde.' </b>álbuns| Alerta! Você só pode criar 10 álbuns.
			<script>document.getElementById("criarPagina").disabled = true;</script>
			<script>document.getElementById("pagSeguro").disabled = true;</script>
								';
	}else{
	if ($contaLetras < 3){
			echo '
			<div class="span4">
			Nome:
			<b style="color:#c90a00">'.$nomePasta.' </b>| Alerta! Você precisa usar no mínimo 3 letras.
			<script>document.getElementById("criarPagina").disabled = true;</script>
			<script>document.getElementById("pagSeguro").disabled = true;</script>
								';
	}else{
	if($verificaPalavra > 4){
			echo '
			<div class="span4">
			Nome:
			<b style="color:#c90a00">'.$nomePasta.' </b>| Alerta! Só é possível usar 4 separadores "_" você usou: '. $verificaPalavra.', tente escrever de outra forma
			<script>document.getElementById("criarPagina").disabled = true;</script>
			<script>document.getElementById("pagSeguro").disabled = true;</script>
								';
		}else{
	$conta = strlen($nomePasta);
	if ($conta < 3){
		echo '
			<div class="span4">
			Nome:
			<b style="color:#c90a00">'.$nomePasta.' </b>| Alerta! Nome minimo com 3 letras.
			<script>document.getElementById("criarPagina").disabled = true;</script>
			<script>document.getElementById("pagSeguro").disabled = true;</script>
								';
	}else{
		$sql_pagina = "SELECT * FROM album_blog where albumBlog = '$nomePasta' and idPagina = $idPagina and album_inativo = 0 ";
		$stmt_pagina = $PDO->prepare($sql_pagina);
		$stmt_pagina->execute();
		$paginaResposta = $stmt_pagina->fetch(PDO::FETCH_ASSOC);
			if(isset($paginaResposta)){
				if ($nomePasta == $paginaResposta['albumBlog']){
					echo '
					<div class="span4">
					Nome:
					<b style="color:#FF0000">'.$nomePasta.'</b> | Ops! Nome Indisponível.
					<script>document.getElementById("criarPagina").disabled = true;</script>
					<script>document.getElementById("pagSeguro").disabled = true;</script>
								';
				}else{
									echo '
							            <div class="span4">
							            Nome:
								        	<b style="color:#228B22">'.$nomePasta.' </b>| Legal! Nome Disponível.
								        	<input type=hidden name="nomePasta" value="'.$nomePasta.'">
								        	<script>document.getElementById("criarPagina").disabled = false;</script>
								        	<script>document.getElementById("pagSeguro").disabled = false;</script>
										</div>
										<div class="text-center col-sm-4">
					                        <button type="submit" class="btn btn-sm btn-block btn-success"> Criar</button>
					                      </div>
									';
								}
							}
						}

					}
				}
			}
				}
	if (isset($_POST['idPost'])){
		$local = $_POST['local'];
		$idPost = $_POST['idPost'];
		$idPasta = $_POST['idPasta'];
		if($local == 'blog'){
			$PDO = db_connect();
                $sql = "UPDATE ext_post SET id_album_blog = :idPasta WHERE id_postagem = :idPost";
		}
		if($local == 'usuario'){
			$PDO = db_connect();
                $sql = "UPDATE ext_post SET id_album_usuario = :idPasta WHERE id_postagem = :idPost";
		}
		if($local == 'torre'){
			$PDO = db_connect();
                $sql = "UPDATE ext_post SET id_album_torre = :idPasta WHERE id_postagem = :idPost";
		}
				
                $stmt = $PDO->prepare($sql);
                $stmt->bindParam(':idPost', $idPost);
                $stmt->bindParam(':idPasta', $idPasta);
				if ($stmt->execute()){
					echo 'atualizado';
			    }else{
			    	echo 'erro';	
			    }


	}

	?>