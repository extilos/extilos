<?php
// FUNÇÕES DE CADASTRO NO SISTEMA
	//CADASTRO DE PERMISÕES PARA PRIMEIRO ACESSO A PÁGINA
	function cadastroAdm($idUsuario, $idPagina, $arrobaUsuario){
		//cadastro de permisões de usuário
		$pm_post = '1';
		$pm_editar = '1';
		$pm_excluir = '1';
		$pm_cadastro = '1';
		$pm_financeiro = '1';
		$PDO = db_connect();
		$sql = "INSERT INTO ext_permite(idPagina, idUsuario, pm_post, pm_editar, pm_excluir, pm_cadastro, pm_financeiro) VALUES(:idPagina, :idUsuario, :pm_post, :pm_editar, :pm_excluir, :pm_cadastro, :pm_financeiro)";
		$stmt = $PDO->prepare($sql);
		$stmt->bindParam(':idPagina', $idPagina);
		$stmt->bindParam(':idUsuario', $idUsuario);
		$stmt->bindParam(':pm_post', $pm_post);
		$stmt->bindParam(':pm_editar', $pm_editar);
		$stmt->bindParam(':pm_excluir', $pm_excluir);
		$stmt->bindParam(':pm_cadastro', $pm_cadastro);
		$stmt->bindParam(':pm_financeiro', $pm_financeiro);
		$stmt->execute();
		sleep(0.5);
		// cadastrando primeiro fan da página
		$pgResposta = '0'; //se 0 a pagina permite a pessoa acompanhar a página se 1 a página tirou  a pessoa da lista de fans
		$fanResposta = '0'; // se 0 a pessoa continua curtindo a pagina se 1 a pessoa deixou de curtir a página
		$dataSolicita = date('l jS \of F Y h:i:s A'); // data do começo da relação entre usuario e páina
		$dataResposta = ''; //data que o usuário ou a página deixaram a relação
		$sqlFan = "INSERT INTO ext_fans(idUsuario, arrobaUsuario, idPagina, pgResposta, fanResposta, dataSolicita, dataResposta) VALUES(:idUsuario, :arrobaUsuario, :idPagina, :pgResposta, :fanResposta, :dataSolicita, :dataResposta)";
		$stmtfan = $PDO->prepare($sqlFan);
		$stmtfan->bindParam(':idUsuario', $idUsuario);
		$stmtfan->bindParam(':arrobaUsuario', $arrobaUsuario);
		$stmtfan->bindParam(':idPagina', $idPagina);
		$stmtfan->bindParam(':pgResposta', $pgResposta);
		$stmtfan->bindParam(':fanResposta', $fanResposta);
		$stmtfan->bindParam(':dataSolicita', $dataSolicita);
		$stmtfan->bindParam(':dataResposta', $dataResposta);
		$stmtfan->execute();
	}
//----------------------------------------------------------------------------------------------------------------------
	//BUSCA USUÁRIO QUE ADMINISTRA PÁGINA
	function usersAdm($idPagina){
		$PDO = db_connect();
		$sql = "SELECT * FROM ext_permite where idPagina = $idPagina";
		$usu = $PDO->prepare($sql);
		$usu->execute();
		return $usu;
	}
//----------------------------------------------------------------------------------------------------------------------
	//CONTA A QUANTIDADE DE USUÁRIOS ADMINISTRANDO UMA PÁGINA
	function adm_total($idPagina){
		$PDO = db_connect();
		$sql_count = "SELECT COUNT(*) AS total FROM ext_permite where idPagina = $idPagina";
		$stmt_count = $PDO->prepare($sql_count);
		$stmt_count->execute();
		$total = $stmt_count->fetchColumn();
		return $total;
	}
//----------------------------------------------------------------------------------------------------------------------
	//BUSCA USUÁRIO QUE ADMINISTRA PÁGINA
	function usuarioAdm($idPagina, $idUsuario){
		$PDO = db_connect();
		$sql = "SELECT * FROM ext_permite where idPagina = $idPagina and idUsuario = $idUsuario";
		$usu = $PDO->prepare($sql);
		$usu->execute();
		$usu = $usu->fetch(PDO::FETCH_ASSOC);
		return $usu;
	}
//----------------------------------------------------------------------------------------------------------------------
	//BUSCA DADOS USUARIO PELO ID DO USUÁRIO
	function busca_usuario($idUsuario){
		$PDO = db_connect();
		$sql = "SELECT * FROM ext_usuarios where idUsuario = $idUsuario";
		$usu = $PDO->prepare($sql);
		$usu->execute();
		$usu = $usu->fetch(PDO::FETCH_ASSOC);
		return $usu;
	}
//----------------------------------------------------------------------------------------------------------------------
	//BUSCA ALBUM PELO ID DO USUÁRIO - FOLHA DE CADASTRO DE ALBUM E POST
	function usuario_album($idUsuario){
		$PDO = db_connect();
		$sql = "SELECT idAlbum, album FROM album_usuarios where idUsuario = $idUsuario order by RAND() asc";
		$stmt = $PDO->prepare($sql);
		$stmt->execute();
		return $stmt;
	}
//----------------------------------------------------------------------------------------------------------------------
	//VERIFICA QUAIS AS PÁGINAS O USUÁRIO TEM ACESSO
	function usuario_pagina($idUsuario){
		$PDO = db_connect();
		$sql_pagina = "SELECT * FROM ext_paginas where idUsuario = $idUsuario OR idUsuario2 = $idUsuario OR idUsuario3 = $idUsuario order by nomePagina asc";
		$stmt_pagina = $PDO->prepare($sql_pagina);
		$stmt_pagina->execute();
		return $stmt_pagina;
	}
//----------------------------------------------------------------------------------------------------------------------
	//BUSCA TORRES
	function busca_torre ($preferencia){
		$PDO = db_connect();
		$sql_torre = "SELECT * FROM ext_torre WHERE setorTorre LIKE '%$preferencia%' order by RAND() LIMIT 10";
		$stmt_torre = $PDO->prepare($sql_torre);
		$stmt_torre->execute();
		return $stmt_torre;
	}
//----------------------------------------------------------------------------------------------------------------------
	//TOPO TORRES
	function topo_torre ($topoTorre){
		$PDO = db_connect();
		$sql_torre = "SELECT * FROM ext_torre WHERE idTorre = $topoTorre";
		$stmt_torre = $PDO->prepare($sql_torre);
		$stmt_torre->execute();
		$stmt_torre = $stmt_torre->fetch(PDO::FETCH_ASSOC);
		return $stmt_torre;
	}
//----------------------------------------------------------------------------------------------------------------------
	//VERIFICA SE EXISTE O VINCULO ENTRE A PÁGINA E A TORRE - CONFIGURAÇÃO DE PÁGINA
	function verifica_pg_tr ($idPagina, $idTorre){
		$PDO = db_connect();
		$sql_torre = "SELECT DISTINCT * FROM ext_pg_tr WHERE idPagina = $idPagina and idTorre = $idTorre";
		$stmt_torre = $PDO->prepare($sql_torre);
		$stmt_torre->execute();
		$stmt_torre = $stmt_torre->fetch(PDO::FETCH_ASSOC);
			if($stmt_torre > 0){
				$idPgTorre = $stmt_torre['idPgTorre']; //id de localização
				$autorizado = $stmt_torre['pgAutorizado']; //Verifica se a página está aceita na torre
				$negado = $stmt_torre['pgNegado']; //Verifica se a página foi negada ou excluída na torre
				$sair = $stmt_torre['pgSaiu']; //verifica se a página saiu da torre (1), se ela voltar ou tiver ativa é (0)
				$ativar = $stmt_torre['pgAtivar']; //verifica se a página ativou a publicação na torre 1 sim | 0 não
				if ($autorizado == 1){
					$retorno = 'aceito';
				}else{
					$retorno = 'aguarde';
				}
				if ($negado == 1){
					$retorno = 'negado';
				}
				if ($sair == 1){
					$retorno = 'sair';
				}
				$retorno = ['idPgTorre'=>$idPgTorre, 'retorno'=>$retorno, 'ativar'=>$ativar];
			}else{
				$retorno = ['retorno'=>'livre'];
			}
		return $retorno;
	}
//----------------------------------------------------------------------------------------------------------------------
	//VERIFICA SE EXISTE O VINCULO ENTRE A PÁGINA E A TORRE - CONFIGURAÇÃO DE PÁGINA
	function verifica_usu_pg ($idUsuario, $idPagina){
		$PDO = db_connect();
		$sql_torre = $sql_pagina = "SELECT * FROM ext_permite where idPagina = $idPagina and idUsuario = $idUsuario";
		$stmt_torre = $PDO->prepare($sql_torre);
		$stmt_torre->execute();
		$stmt_torre = $stmt_torre->fetch(PDO::FETCH_ASSOC);
		if($stmt_torre > 0){
				$pm_post = $stmt_torre['pm_post']; //Permiter postar conteúdo
				$pm_editar = $stmt_torre['pm_editar']; //Permite editar textos da apresentação e descritivos
				$pm_excluir = $stmt_torre['pm_excluir']; //Permite excluir conteúdos da página
				$pm_cadastro = $stmt_torre['pm_cadastro']; //Permite cadastrar a pagina em torre ou publicidade
				$pm_financeiro = $stmt_torre['pm_financeiro']; //Permite ter acesso ao controle financeiro da página
		$retorno = [
				'pm_post'=>$pm_post,
				'pm_editar'=>$pm_editar,
				'pm_excluir'=>$pm_excluir,
				'pm_cadastro'=>$pm_cadastro,
				'pm_financeiro'=>$pm_financeiro
				];
		}else{
			$retorno = 'erro';
		}
		return $retorno;
	}
//----------------------------------------------------------------------------------------------------------------------
	//CONSULTA DE PÁGINA x TORRE
	function pagina_torre ($idPagina){
		$PDO = db_connect();
		$sql_torre = "SELECT DISTINCT * FROM ext_pg_tr WHERE idPagina = $idPagina" ;
		$stmt_torre = $PDO->prepare($sql_torre);
		$stmt_torre->execute();
		return $stmt_torre;
	}
//----------------------------------------------------------------------------------------------------------------------
	//CONSULTA A TORRE DE PREFERÊNCIA DO USUÁRIO - FOLHA DE CADASTRO
	function banco_torre($idAlbum){
		$PDO = db_connect();
		$sql_torre = "SELECT idTorre, nomeTorre FROM ext_torre where torreSistema = 'sim' order by RAND() asc";
		$stmt_torre = $PDO->prepare($sql_torre);
		$stmt_torre->execute();
		return $stmt_torre;
	}
//----------------------------------------------------------------------------------------------------------------------
	//FILTRO PARA APRESENTAÇÃO - PÁGINA DE INICIO
	function pagina_inicio ($postagem){
		$PDO = db_connect();
		$sql_inicio = "SELECT * FROM ext_fans FROM idUsuario = $idLogado";
		$sql_inicio = $PDO->prepare($sql_inicio);
		$sql_inicio->execute();
	}
//----------------------------------------------------------------------------------------------------------------------
	// CONSULTA PARA SABER SE ALBUM PERTENCE AO USUÁRIO QUE ESTA EDITANDO
	// BUSCA OS ALBUNS DO USUÁRIO COM PARÂMETRO INFORMADO VIA GET
	//verifica o nome do album
	function banco_album($idLogado, $idAlbum){
		$PDO = db_connect();
		$sql_album = "SELECT album FROM album_usuarios where idUsuario = $idLogado and idAlbum = $idAlbum";
		$stmt_album = $PDO->prepare($sql_album);
		$stmt_album->execute();
		$albumResposta = $stmt_album->fetch(PDO::FETCH_ASSOC);
		return $albumResposta;
	}
//----------------------------------------------------------------------------------------------------------------------
	//contar os registros / ALBUNS DO USUÁRIO
	function album_total($idLogado){
		$PDO = db_connect();
		$sql_count = "SELECT COUNT(*) AS total FROM album_usuarios where idUsuario = $idLogado ";
		$stmt_count = $PDO->prepare($sql_count);
		$stmt_count->execute();
		$total = $stmt_count->fetchColumn();
		return $total;
	}
//----------------------------------------------------------------------------------------------------------------------
	//contar quantas postagens para cada album / ALBUNS DO USUÁRIO
	function conta_album($idAlbum){
		$PDO = db_connect();
		$sql_count = "SELECT COUNT(*) AS total FROM img_usuarios where usuEstilo = $idAlbum ";
		$stmt_count = $PDO->prepare($sql_count);
		$stmt_count->execute();
		$total = $stmt_count->fetchColumn();
		return $total;
	}
//----------------------------------------------------------------------------------------------------------------------
	//criar um loop com as informações do album
	function album_while($idLogado){
		$PDO = db_connect();
		$sql = "SELECT * FROM album_usuarios where idUsuario = $idLogado order by album asc";
		$stmt = $PDO->prepare($sql);
		$stmt->execute();
		return $stmt;
	}
//----------------------------------------------------------------------------------------------------------------------
	//CONSULTA AS IMAGENS QUE PERTENCE AO ALBUM SELECIONADO
	function banco_imagem($idAlbum){
		$PDO = db_connect();
		$sql_fotos = "SELECT * FROM img_usuarios where usuEstilo = $idAlbum ORDER BY idImg desc"; //arrumar id estilo porque não pesquisa mais pelo id
		$albumImagemResposta = $PDO->prepare($sql_fotos);
		$albumImagemResposta->execute();
		return $albumImagemResposta;
	}
//----------------------------------------------------------------------------------------------------------------------
	//CONSULTA AS IMAGENS QUE PERTENCE PELO ID DO ALBUM
	function editar_album($idAlbum){
		$PDO = db_connect();
		$sql_fotos = "SELECT * FROM img_usuarios where idImg = $idAlbum "; //arrumar id estilo porque não pesquisa mais pelo id
		$albumImagemResposta = $PDO->prepare($sql_fotos);
		$albumImagemResposta->execute();
		$album_id = $albumImagemResposta->fetch(PDO::FETCH_ASSOC);
		return $album_id;
	}
//----------------------------------------------------------------------------------------------------------------------
	//CONSULTA PARA EXIBIR OS CONTEÚDOS DA PÁGINA PRINCIPAL

	//contar os registros / ALBUNS PARA POSTAGEM
	function inicio_total($idTorre){
		try{
		$PDO = db_connect();
		$sql_count = "SELECT COUNT(*) AS total FROM img_usuarios where publicarTorre = $idTorre";
		$stmt_count = $PDO->prepare($sql_count);
		$stmt_count->execute();
		$total = $stmt_count->fetchColumn();
		return $total;
	}catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
	}
	}
//----------------------------------------------------------------------------------------------------------------------
//contar os registros / RELAÇÃO ENTRE A PÁGINA E A TORRE
	function conta_pagina_torre($idTorre){
		try{
		$PDO = db_connect();
		$sql_count = "SELECT COUNT(*) AS total FROM ext_pg_tr where idTorre = $idTorre";
		$stmt_count = $PDO->prepare($sql_count);
		$stmt_count->execute();
		$total = $stmt_count->fetchColumn();
		return $total;
	}catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
	}
	}
//----------------------------------------------------------------------------------------------------------------------
	// BUSCA NO BANCO DE DADOS DE IMAGENS
	function banco_inicio($idTorre, $inicio, $fim){
		try{
		$PDO = db_connect();
		$sql_fotos = "SELECT * FROM img_usuarios where publicarTorre = $idTorre ORDER BY idImg desc LIMIT $inicio, $fim";
		$albumImagemResposta = $PDO->prepare($sql_fotos);
		$albumImagemResposta->execute();
		return $albumImagemResposta;
		}catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
		}
	}
//----------------------------------------------------------------------------------------------------------------------
	// BUSCA OS BLOGS QUE O USUÁRIO FAZ PARTE
	function busca_blog($idPagina){
		try{
		$PDO = db_connect();
		$sql_fotos = "SELECT * FROM ext_paginas where idPagina = $idPagina";
		$blog = $PDO->prepare($sql_fotos);
		$blog->execute();
		$blog = $blog->fetch(PDO::FETCH_ASSOC);
		return $blog;
		}catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
	}
		}
//----------------------------------------------------------------------------------------------------------------------
	// MONTAGEM DOS DADOS PARA EXIBIÇÃO 
	// busca página que publicou conteúdo
		function pg_conteudo ($idPost){
			$PDO = db_connect();
			$post = "SELECT id_pagina FROM ext_compartilha where id_post = $idPost ";
			$result = $PDO->prepare($post);
			$result->execute();
			return $result;
		}
//----------------------------------------------------------------------------------------------------------------------
	//contar quantas postagens existem para determinada tore
	function total_post($idTorre){
		$PDO = db_connect();
		$sql_count = "SELECT COUNT(DISTINCT id_postagem, post_data) AS total FROM ext_post where id_torre = $idTorre ";
		$stmt_count = $PDO->prepare($sql_count);
		$stmt_count->execute();
		$total = $stmt_count->fetchColumn();
		return $total;
	}
//----------------------------------------------------------------------------------------------------------------------
	// Dados para torre
		function torre_post($idTorre, $inicio, $fim){
		$PDO = db_connect();
		$sql_fotos = "SELECT DISTINCT id_postagem, post_data FROM ext_post where id_torre = $idTorre  ORDER BY 'id_post' desc LIMIT $inicio, $fim";
		$blog = $PDO->prepare($sql_fotos);
		$blog->execute();
		while ($postagens = $blog->fetch(PDO::FETCH_ASSOC)):
			$idPostagem = $postagens['id_postagem'];
			$PDO = db_connect();
			$select_usuario = "SELECT * FROM img_usuarios where idImg = $idPostagem ";
			$post_usuario = $PDO->prepare($select_usuario);
			$post_usuario->execute();
			$post_usuario = $post_usuario->fetch(PDO::FETCH_ASSOC);
				if ($post_usuario['img'] > ''){
								//dados da tabela ext_post
								$r['postagem'] = $postagens['id_postagem'];
								//dados da tabela img_usuarios
								$r['idPost'] = $post_usuario['idImg'];
								$r['idUsuario'] = $post_usuario['idUsuario'];
				        		$r['usuEstilo'] = $post_usuario['usuEstilo'];
				        		$r['usuTitulo'] = $post_usuario['usuTitulo'];
				        		$r['usuMarca'] = $post_usuario['usuMarca'];
				        		$r['usuDesc'] = $post_usuario['usuDesc'];
				        		$r['img'] = $post_usuario['img'];
				        		$r['img1'] = $post_usuario['img1'];
				        		$r['img2'] = $post_usuario['img2'];
				        		$r['img3'] = $post_usuario['img3'];
				        		$r['img4'] = $post_usuario['img4'];
				        		$r['publicarTorre'] = $post_usuario['publicarTorre'];
				        		$r['nomeTorre'] = $post_usuario['nomeTorre'];
				        		$r['precPro'] = $post_usuario['precPro'];
				        		$r['descPro'] = $post_usuario['descPro'];
				        		$r['formaPro'] = $post_usuario['formaPro'];
				        		$r['infoPro'] = $post_usuario['infoPro'];
				        		$dados_post[] = $r;
				        	}
		endwhile;

		return json_encode($dados_post, JSON_PRETTY_PRINT);
	}
?>