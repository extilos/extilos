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
//-------------------------------------------- CONSULTAS DO BANCO DAS TORRES----------------------------------------------------
	//BUSCA TORRES PELA SETOR
	function busca_torre ($preferencia){
		$PDO = db_connect();
		$sql_torre = "SELECT * FROM ext_torre WHERE setorTorre = $preferencia order by RAND() LIMIT 10";
		$stmt_torre = $PDO->prepare($sql_torre);
		$stmt_torre->execute();
		return $stmt_torre;
	}
	//BUSCA TORRES PELO ID DO USUÁRIO
	function lista_torre ($idUsuario){
		$PDO = db_connect();
		$sql_torre = "SELECT * FROM ext_torre WHERE idUsuario = $idUsuario";
		$stmt_torre = $PDO->prepare($sql_torre);
		$stmt_torre->execute();
		return $stmt_torre;
	}
	//BUSCA TORRE PELO NOME
	function nome_torre ($nomeTorre){
		$PDO = db_connect();
		$sql_torre = "SELECT * FROM ext_torre WHERE nomeTorre LIKE '%$nomeTorre%'";
		$stmt_torre = $PDO->prepare($sql_torre);
		$stmt_torre->execute();
		$stmt_torre = $stmt_torre->fetch(PDO::FETCH_ASSOC);
		return $stmt_torre;
	}
	//TOPO TORRES
	function topo_torre ($topoTorre){
		$PDO = db_connect();
		$sql_torre = "SELECT * FROM ext_torre WHERE idTorre = $topoTorre";
		$stmt_torre = $PDO->prepare($sql_torre);
		$stmt_torre->execute();
		$stmt_torre = $stmt_torre->fetch(PDO::FETCH_ASSOC);
		return $stmt_torre;
	}

//-----------------------------------------------CONSULTAS NO BANCO PGxTR-------------------------------------------------
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
	//VERIFICA SE EXISTE O VINCULO ENTRE A PÁGINA E A TORRE - CONFIGURAÇÃO DE PÁGINA
	function verifica_pg_tr ($idPagina, $idTorre){
		$PDO = db_connect();
		$sql_torre = "SELECT DISTINCT * FROM ext_pg_tr WHERE idPagina = $idPagina and idTorre = $idTorre ";
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
	//CONSULTA DE PÁGINA x TORRE
	function pagina_torre ($idPagina){
		$PDO = db_connect();
		$sql_torre = "SELECT DISTINCT * FROM ext_pg_tr WHERE idPagina = $idPagina" ;
		$stmt_torre = $PDO->prepare($sql_torre);
		$stmt_torre->execute();
		return $stmt_torre;
	}
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
	function lista_blog_torre ($idTorre){
				$PDO = db_connect();
				$sql_inicio = "	SELECT ext_pg_tr.* , ext_paginas.*
								FROM ext_pg_tr
								left join ext_paginas
								on ext_pg_tr.idPagina = ext_paginas.idPagina
								where ext_pg_tr.idTorre = $idTorre
								order by ext_pg_tr.idPagina desc";
				$sql_inicio = $PDO->prepare($sql_inicio);
				$sql_inicio->execute();
				while ($lista = $sql_inicio->fetch(PDO::FETCH_ASSOC)):
					$r['idPgTorre'] = $lista['idPgTorre'];
					$r['pgAutorizado'] = $lista['pgAutorizado'];
					$r['pgNegado'] = $lista['pgNegado'];
					$r['pgSaiu'] = $lista['pgSaiu'];
					$r['pgAtivar'] = $lista['pgAtivar'];
					$r['pgSolicita'] = $lista['pgSolicita'];
					$r['pgData'] = $lista['pgData'];
					$r['pgPermite'] = $lista['pgPermite']; //pgPermite refere a torre que permite publicação livre sem aprovação
					$r['dataPagina'] = $lista['dataPagina'];
					$r['nomePagina'] = $lista['nomePagina'];
					$r['descPagina'] = $lista['descPagina'];
					$r['estadoPagina'] = $lista['estadoPagina'];
					$r['cidadePagina'] = $lista['cidadePagina'];
					$r['emailPagina'] = $lista['emailPagina'];
					$r['tipoPagina'] = $lista['tipoPagina'];
					$r['pgCapa'] = $lista['pgCapa'];
					$r['idUsuario'] = $lista['idUsuario'];
					$r['idUsuario2'] = $lista['idUsuario2'];
					$r['idUsuario3'] = $lista['idUsuario3'];
				    $dados_post[] = $r;
				endwhile;
					if (isset($dados_post)){
						return json_encode($dados_post, JSON_PRETTY_PRINT);
						}else{
							return null;
						}
			}
			function lista_blog ($buscaBlog, $idTorre){
				$PDO = db_connect();
				$sql_inicio = "	SELECT ext_pg_tr.* , ext_paginas.*
								FROM ext_pg_tr
								inner join ext_paginas
								on ext_pg_tr.idPagina = ext_paginas.idPagina
								where ext_pg_tr.idTorre = $idTorre and ext_paginas.nomePagina LIKE '%$buscaBlog%' ";
				$sql_inicio = $PDO->prepare($sql_inicio);
				$sql_inicio->execute();
				while ($lista = $sql_inicio->fetch(PDO::FETCH_ASSOC)):
					$r['pgAutorizado'] = $lista['pgAutorizado'];
					$r['pgNegado'] = $lista['pgNegado'];
					$r['pgSaiu'] = $lista['pgSaiu'];
					$r['pgAtivar'] = $lista['pgAtivar'];
					$r['pgSolicita'] = $lista['pgSolicita'];
					$r['pgData'] = $lista['pgData'];
					$r['pgPermite'] = $lista['pgPermite'];
					$r['dataPagina'] = $lista['dataPagina'];
					$r['nomePagina'] = $lista['nomePagina'];
					$r['descPagina'] = $lista['descPagina'];
					$r['estadoPagina'] = $lista['estadoPagina'];
					$r['cidadePagina'] = $lista['cidadePagina'];
					$r['emailPagina'] = $lista['emailPagina'];
					$r['tipoPagina'] = $lista['tipoPagina'];
					$r['pgCapa'] = $lista['pgCapa'];
					$r['idUsuario'] = $lista['idUsuario'];
					$r['idUsuario2'] = $lista['idUsuario2'];
					$r['idUsuario3'] = $lista['idUsuario3'];
				    $dados_post[] = $r;
				endwhile;
					if (isset($dados_post)){
						return json_encode($dados_post, JSON_PRETTY_PRINT);
						}else{
							return print_r($sql_inicio->errorInfo());
							
						}
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
//-------------------------------------------------CONSULTAS NO BANCO DE FANS-----------------------------------------------------
	//FILTRO PARA APRESENTAÇÃO - PÁGINA DE INICIO
	function pagina_inicio ($postagem){
		$PDO = db_connect();
		$sql_inicio = "SELECT * FROM ext_fans FROM idUsuario = $idLogado";
		$sql_inicio = $PDO->prepare($sql_inicio);
		$sql_inicio->execute();
	}
	//BUSCA FANS PELO ID DA PÁGINA
	function busca_fans ($idPagina,$idTorre){
		if($idPagina>0){
				$PDO = db_connect();
				$sql_inicio = "	SELECT ext_fans.* , ext_usuarios.*
								FROM ext_fans
								left join ext_usuarios
								on ext_fans.idUsuario = ext_usuarios.idUsuario 
								where ext_fans.idPagina = $idPagina";
				$sql_inicio = $PDO->prepare($sql_inicio);
				$sql_inicio->execute();
				while ($lista = $sql_inicio->fetch(PDO::FETCH_ASSOC)):
					$r['arrobaUsuario'] = $lista['arrobaUsuario'];
					$r['dataSolicita'] = $lista['dataSolicita'];
					$r['usuEstado'] = $lista['usuEstado'];
					$r['usuCidade'] = $lista['usuCidade'];
				    $dados_post[] = $r;
				endwhile;
					if (isset($dados_post)){
						return json_encode($dados_post, JSON_PRETTY_PRINT);
						}
			}
		if($idTorre>0){
				$PDO = db_connect();
				$sql_inicio = "	SELECT ext_fans.* , ext_usuarios.*
								FROM ext_fans
								left join ext_usuarios
								on ext_fans.idUsuario = ext_usuarios.idUsuario 
								where ext_fans.idTorre = $idTorre";
				$sql_inicio = $PDO->prepare($sql_inicio);
				$sql_inicio->execute();
				while ($lista = $sql_inicio->fetch(PDO::FETCH_ASSOC)):
					$r['arrobaUsuario'] = $lista['arrobaUsuario'];
					$r['dataSolicita'] = $lista['dataSolicita'];
					$r['usuEstado'] = $lista['usuEstado'];
					$r['usuCidade'] = $lista['usuCidade'];
				    $dados_post[] = $r;
				endwhile;
					if (isset($dados_post)){
						return json_encode($dados_post, JSON_PRETTY_PRINT);
						}
					}
	}
	//BUSCA FANS PELO NICK NAME PÁGINA
	function busca_lista_fans ($busca, $letra, $idPagina, $idTorre){
		$PDO = db_connect();
	if($idPagina > 0){
		if(isset($letra)){
		$sql_inicio = "	SELECT * 
  						FROM ext_fans 
  						LEFT JOIN ext_usuarios
  						ON ext_fans.idUsuario = ext_usuarios.idUsuario
  						WHERE idPagina = $idPagina and arrobaUsuario 
  						LIKE '$letra%' LIMIT 50 ";
  		}else{
  		$sql_inicio = "	SELECT * 
  						FROM ext_fans 
  						LEFT JOIN ext_usuarios
  						ON ext_fans.idUsuario = ext_usuarios.idUsuario
  						WHERE idPagina = $idPagina and arrobaUsuario 
  						LIKE '%$busca%' LIMIT 50 ";

  		}
  	}elseif($idTorre > 0){
  		if(isset($letra)){
		$sql_inicio = "	SELECT * 
  						FROM ext_fans 
  						LEFT JOIN ext_usuarios
  						ON ext_fans.idUsuario = ext_usuarios.idUsuario
  						WHERE idTorre = $idTorre and arrobaUsuario 
  						LIKE '$letra%' LIMIT 50 ";
  		}else{
  		$sql_inicio = "	SELECT * 
  						FROM ext_fans 
  						LEFT JOIN ext_usuarios
  						ON ext_fans.idUsuario = ext_usuarios.idUsuario
  						WHERE idTorre = $idTorre and arrobaUsuario 
  						LIKE '%$busca%' LIMIT 50 ";

  		}
  	}
  	
		$sql_inicio = $PDO->prepare($sql_inicio);
		$sql_inicio->execute();
				while ($lista = $sql_inicio->fetch(PDO::FETCH_ASSOC)):
					$r['idUsuario'] = $lista['idUsuario'];
					$r['arrobaUsuario'] = $lista['arrobaUsuario'];
					$r['dataSolicita'] = $lista['dataSolicita'];
					$r['usuEstado'] = $lista['usuEstado'];
					$r['usuCidade'] = $lista['usuCidade'];
				    $dados_post[] = $r;
				endwhile;
					if (isset($dados_post)){
						return json_encode($dados_post, JSON_PRETTY_PRINT);
						}else{
						return null;
					}
					}
	//RETORNA O TOTAL DE FANS QUE A PAGINA TEM
	function fans_total($idPagina){
		try{
		$PDO = db_connect();
		$sql_count = "SELECT COUNT(*) AS total FROM ext_fans where idPagina = $idPagina";
		$stmt_count = $PDO->prepare($sql_count);
		$stmt_count->execute();
		$total = $stmt_count->fetchColumn();
		return $total;
	}catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
	}
	}
	//RETORNA O TOTAL DE FANS QUE A TORRE TEM
	function fans_total_torre($idTorre){
		try{
		$PDO = db_connect();
		$sql_count = "SELECT COUNT(*) AS total FROM ext_fans where idTorre = $idTorre";
		$stmt_count = $PDO->prepare($sql_count);
		$stmt_count->execute();
		$total = $stmt_count->fetchColumn();
		return $total;
	}catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
	}
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
	// VERIFICA SE EXISTE BLOG PELO NOME
		function busca_nome_blog($nomeBlog){
		$PDO = db_connect();
		$sql_fotos = "SELECT * FROM ext_paginas where nomePagina = '$nomeBlog'";
		$blog = $PDO->prepare($sql_fotos);
		$blog->execute();
		$blog = $blog->fetch(PDO::FETCH_ASSOC);
		return $blog;
		//return print_r($blog);
		}
	function busca_blog_texto($idPagina){
		$PDO = db_connect();
		$sql_fotos = "SELECT * FROM ext_paginas where idPagina = $idPagina";
		$blog = $PDO->prepare($sql_fotos);
		$blog->execute();
		while ($postagens = $blog->fetch(PDO::FETCH_ASSOC)):
			$pt['pgTexto'] = $postagens['nomePagina'];
			$nomeBlog[] = $pt;
		endwhile;
		return json_encode($nomeBlog, JSON_PRETTY_PRINT);
		}
//----------------------------------------------------------------------------------------------------------------------
	// MONTAGEM DOS DADOS PARA EXIBIÇÃO 
	// busca página que publicou conteúdo
		function pg_conteudo ($idPost){
			$PDO = db_connect();
			$post = "SELECT id_pagina FROM ext_compartilha where id_post = $idPost ORDER BY RAND()";
			$result = $PDO->prepare($post);
			$result->execute();
			$result = $result->fetch(PDO::FETCH_ASSOC);
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
		function buscar_post($idTorre, $tipoBusca, $inicio, $fim){
		$PDO = db_connect();

		if ($tipoBusca === 'torre'){
			$sql_fotos = "SELECT DISTINCT id_postagem, post_data FROM ext_post where id_torre = $idTorre  ORDER BY 'id_post' desc LIMIT $inicio, $fim";
			$blog = $PDO->prepare($sql_fotos);
			$blog->execute();
		}
		if ($tipoBusca === 'index'){
			$sql_fotos = "SELECT DISTINCT id_postagem FROM ext_post  ORDER BY rand() desc LIMIT $inicio, $fim";
			$blog = $PDO->prepare($sql_fotos);
			$blog->execute();
		}

		while ($postagens = $blog->fetch(PDO::FETCH_ASSOC)):
			$idPostagem = $postagens['id_postagem'];
			$PDO = db_connect();
			$select_usuario = "SELECT * FROM img_usuarios where idImg = $idPostagem ";
			$post_usuario = $PDO->prepare($select_usuario);
			$post_usuario->execute();
			$post_usuario = $post_usuario->fetch(PDO::FETCH_ASSOC);
				if ($post_usuario['img'] > ''){
						//dados da tabela ext_post
					$r['temFoto'] = 'sim';
					$r['postagem'] = $postagens['id_postagem'];
					$r['dataTorre'] = $post_usuario['data_post'];
						//dados da tabela img_usuarios
					$r['idPost'] = $post_usuario['idImg'];
					$r['idUsuario'] = $post_usuario['idUsuario'];
				    $r['arrobaUsuario'] = $post_usuario['arrobaUsuario'];
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
				    $r['estadoPost'] = $post_usuario['estadoPost'];
				    $r['nomeTorre'] = $post_usuario['nomeTorre'];
				    $r['precPro'] = $post_usuario['precPro'];
				    $r['descPro'] = $post_usuario['descPro'];
				    $r['formaPro'] = $post_usuario['formaPro'];
				    $r['infoPro'] = $post_usuario['infoPro'];
				    $r['dataPost'] = $post_usuario['data_post'];
				    $dados_post[] = $r;
				}else{
					$r['temFoto'] = 'nao';
					$r['postagem'] = $postagens['id_postagem'];
					$r['dataTorre'] = $post_usuario['data_post'];
						//dados da tabela img_usuarios
					$r['idPost'] = $post_usuario['idImg'];
					$r['idUsuario'] = $post_usuario['idUsuario'];
				    $r['arrobaUsuario'] = $post_usuario['arrobaUsuario'];
				    $r['usuEstilo'] = $post_usuario['usuEstilo'];
				    $r['usuTitulo'] = $post_usuario['usuTitulo'];
				    $r['usuMarca'] = $post_usuario['usuMarca'];
				    $r['usuDesc'] = $post_usuario['usuDesc'];
				    $r['publicarTorre'] = $post_usuario['publicarTorre'];
				    $r['estadoPost'] = $post_usuario['estadoPost'];
				    $r['nomeTorre'] = $post_usuario['nomeTorre'];
				    $r['precPro'] = $post_usuario['precPro'];
				    $r['descPro'] = $post_usuario['descPro'];
				    $r['formaPro'] = $post_usuario['formaPro'];
				    $r['infoPro'] = $post_usuario['infoPro'];
				    $r['dataPost'] = $post_usuario['data_post'];
				    $dados_post[] = $r;
				}
		endwhile;
		if(isset($dados_post)){
			return json_encode($dados_post, JSON_PRETTY_PRINT);
				//return $postagens;
		}else{
			return null;
		}
	}
	//verifica as permiçoes e validações do post
	function validar_post($id_postagem, $id_torre){
		$PDO = db_connect();
			$validar = "SELECT * FROM ext_post where id_postagem = $id_postagem and id_torre = $id_torre";
			$post_usuario = $PDO->prepare($validar);
			$post_usuario->execute();
			$post_usuario = $post_usuario->fetch(PDO::FETCH_ASSOC);
					$c['post_liberado'] = $post_usuario['post_liberado'];
					$c['post_denuncia'] = $post_usuario['post_denuncia'];
					$c['post_excluido'] = $post_usuario['post_excluido'];
					$info_post[] = $c;
			return json_encode($info_post, JSON_PRETTY_PRINT);
		}
//----------------------------------------------------------------------------------------------------------------------
	//contar quantas comentários existem para determinado post
	function total_comentarios($idPost, $idUsuario){
		$PDO = db_connect();
		$sql_count = "SELECT COUNT(*) AS total FROM ext_comentario where idPost = $idPost and idUsuario = $idUsuario ";
		$stmt_count = $PDO->prepare($sql_count);
		$stmt_count->execute();
		$total_coment = $stmt_count->fetchColumn();
		return $total_coment;
	}
//----------------------------------------------------------------------------------------------------------------------
	//criar um loop com os comentários
	function comentarios($idPost, $idUsuario){
		$PDO = db_connect();
		$sql = "SELECT * FROM ext_comentario where idPost = $idPost and idUsuario = $idUsuario order by idComentario desc";
		$stmt = $PDO->prepare($sql);
		$stmt->execute();
		return $stmt;
	}
//----------------------------------------------------------------------------------------------------------------------
	//contar quantidade de deslike existem para determinado post
	function total_deslike($idPost){
		$PDO = db_connect();
		$sql_count = "SELECT COUNT(*) AS total FROM ext_curtidas where id_post = $idPost and curtir_negativo = 1";
		$stmt_count = $PDO->prepare($sql_count);
		$stmt_count->execute();
		$total = $stmt_count->fetchColumn();
		return $total;
	}
	//contar quantidade de like existem para determinado post
	function total_like($idPost){
		$PDO = db_connect();
		$sql_count = "SELECT COUNT(*) AS total FROM ext_curtidas where id_post = $idPost and curtir_positivo = 1";
		$stmt_count = $PDO->prepare($sql_count);
		$stmt_count->execute();
		$total = $stmt_count->fetchColumn();
		return $total;
	}
	//pesquisa o post curtido pelo usuário
	function curtidos($idPost, $idUsuario){
		$PDO = db_connect();
		$sql = "SELECT * FROM ext_curtidas where id_post = $idPost and idUsuario = $idUsuario ";
		$stmt = $PDO->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
	}
	//pesquisa o favoritos pelo usuário
	function favoritos($idPost, $idUsuario){
		$PDO = db_connect();
		$sql = "SELECT * FROM ext_favoritos where id_post = $idPost and idUsuario = $idUsuario ";
		$stmt = $PDO->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
	}
// ------------------------------------------- CONSULTAS NO BANCO EXT_VISITAS ----------------------------------------
	//pesquisa o post curtido pelo usuário
	function visitas($idPost, $tokenDia){
		$PDO = db_connect();
		$sql = "SELECT * FROM ext_visita where tokenDia = '$tokenDia' and idPost = $idPost ORDER BY idVisita DESC";
		$stmt = $PDO->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
	}
	//quantidade de visitas
	function total_visitas_user($idPost){
		$PDO = db_connect();
		$sql = "SELECT  COUNT(*) AS total FROM ext_visita where idPost = $idPost and idUsuario > 1 ";
		$stmt = $PDO->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchColumn();
		return $result;
	}
	//quantidade de visitas usuários não logado
	function total_visitas($idPost){
		$PDO = db_connect();
		$sql = "SELECT  COUNT(*) AS total FROM ext_visita where idPost = $idPost and idUsuario < 1 ";
		$stmt = $PDO->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchColumn();
		return $result;
	}
// ------------------------------------------- CONSULTAS NO BANCO EXT_DENUNCIAS ----------------------------------------
	//pesquisa o post curtido pelo usuário
	function denuncia($idPost, $idUsuario){
		$PDO = db_connect();
		$sql = "SELECT * FROM ext_denuncia where idPost = $idPost and idUsuario = $idUsuario ORDER BY idDenuncia DESC";
		$stmt = $PDO->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
	}
	//quantidade de denuncias
	function total_denuncia($idPost){
		$PDO = db_connect();
		$sql = "SELECT  COUNT(*) AS total FROM ext_denuncia where idPost = $idPost ";
		$stmt = $PDO->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchColumn();
		return $result;
	}
// --------------------------------------- CONSULTAS NO BANCO EXT_PTS -------------------------------------------------

	function ext_pts_all(){
		$PDO = db_connect();
		$sql = "SELECT * FROM ext_pts ORDER BY id_pts DESC";
		$stmt = $PDO->prepare($sql);
		$stmt->execute();
		$lista = $stmt->fetch(PDO::FETCH_ASSOC);
					$c['idPagina'] = $lista['idPagina'];
					$c['idTorre'] = $lista['idTorre'];
					$c['idPost'] = $lista['idPost'];
					$c['idUsuario'] = $lista['idUsuario'];
					$c['ptsCurtida'] = $lista['ptsCurtida'];
					$c['ptsSeguidores'] = $lista['ptsSeguidores'];
					$c['ptsComentario'] = $lista['ptsComentario'];
					$c['ptsFavoritos'] = $lista['ptsFavoritos'];
					$c['ptsExtras'] = $lista['ptsExtras'];
					$c['ptsVisitas'] = $lista['ptsVisitas'];
					$c['ptsPost'] = $lista['ptsPost'];
					$c['ptsLoja'] = $lista['ptsLoja'];
					$c['ptsCompartilha'] = $lista['ptsCompartilha'];
					$c['ptsBonus'] = $lista['ptsBonus'];
					$c['ptsExtilos'] = $lista['ptsExtilos'];
					$pontos[] = $c;
		return json_encode($pontos, JSON_PRETTY_PRINT);
	}
	function verifica_pts($idPost, $idUsuario){
		$PDO = db_connect();
		$sql = "SELECT * FROM ext_pts where idPost = $idPost and idUsuario = $idUsuario";
		$stmt = $PDO->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
	}
// --------------------------------------- CONSULTAS NO BANCO ALBUM_BLOG -------------------------------------------------
	function pasta_album_blog($idPagina){
		$PDO = db_connect();
		$sql = "SELECT * FROM album_blog WHERE idPagina = $idPagina ORDER BY idAlbumBlog DESC";
		$stmt = $PDO->prepare($sql);
		$stmt->execute();
		while ($lista = $stmt->fetch(PDO::FETCH_ASSOC)):
					$c['idAlbumBlog'] = $lista['idAlbumBlog'];
					$c['idPagina'] = $lista['idPagina'];
					$c['idUsuario'] = $lista['idUsuario'];
					$c['albumBlog'] = $lista['albumBlog'];
					$c['data'] = $lista['data'];
					$albuns[] = $c;
		endwhile;
		return json_encode($albuns, JSON_PRETTY_PRINT);
	}
	
?>