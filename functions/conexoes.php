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
	//BUSCA USUÁRIO QUE ADMINISTRA PÁGINA (whille)
	function usersAdm($idPagina){
		$PDO = db_connect();
		$sql = "SELECT * FROM ext_permite where idPagina = $idPagina";
		$usu = $PDO->prepare($sql);
		$usu->execute();
		return $usu;
	}
	//BUSCA USUARIO QUE ADMINISTRA PÁGINA - RESPOSTA EM JSON
	function usersAdmistra($idPagina){
		$PDO = db_connect();

		$sql = "SELECT ext_permite.* , ext_usuarios.*
								FROM ext_permite
								left join ext_usuarios
								on ext_permite.idUsuario = ext_usuarios.idUsuario
								where ext_permite.idPagina = $idPagina";
		$stmt = $PDO->prepare($sql);
		$stmt->execute();
		while ($lista = $stmt->fetch(PDO::FETCH_ASSOC)):
					$c['idPermite'] = $lista['idPermite'];
					$c['idUsuario'] = $lista['idUsuario'];
					$c['pm_post'] = $lista['pm_post'];
					$c['pm_editar'] = $lista['pm_editar'];
					$c['pm_excluir'] = $lista['pm_excluir'];
					$c['pm_cadastro'] = $lista['pm_cadastro'];
					$c['pm_financeiro'] = $lista['pm_financeiro'];
					$c['nomeUsuario'] = $lista['nomeUsuario'];
					$c['emailUsuario'] = $lista['emailUsuario'];
					$c['usuMarca'] = $lista['usuMarca'];
					$c['usuFoto'] = $lista['usuFoto'];
					$c['usuEstado'] = $lista['usuEstado'];
					$c['usuCidade'] = $lista['usuCidade'];
					$c['captcha'] = $lista['captcha'];

					$listaAdm[] = $c;
		endwhile;

		if (isset($listaAdm)){
		return json_encode($listaAdm, JSON_PRETTY_PRINT);
			}
		}
	/**

	**/
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
	//CONTA A QUANTIDADE DE USUÁRIOS ADMINISTRANDO UMA PÁGINA
	function adm_blog_total($idUsuario){
		$PDO = db_connect();
		$sql_count = "SELECT COUNT(*) AS total FROM ext_permite where idUsuario = $idUsuario";
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
	function usuario_pagina1($idUsuario){
		$PDO = db_connect();
		$sql_pagina = "SELECT * FROM ext_paginas where idUsuario = $idUsuario OR idUsuario2 = $idUsuario OR idUsuario3 = $idUsuario order by nomePagina asc";
		$stmt_pagina = $PDO->prepare($sql_pagina);
		$stmt_pagina->execute();
		return $stmt_pagina;
	}
	function usuario_pagina($idUsuario){
		$PDO = db_connect();
		$sql_pagina = "SELECT ext_permite.* , ext_paginas.*
		 FROM ext_permite 
		 LEFT JOIN ext_paginas
		 ON ext_permite.idPagina = ext_paginas.idPagina
		 WHERE ext_permite.idUsuario = $idUsuario";
		$stmt_pagina = $PDO->prepare($sql_pagina);
		$stmt_pagina->execute();
		return $stmt_pagina;
	}
	//VERIFICA QUAIS AS PÁGINAS O USUÁRIO TEM ACESSO JSON
	function busca_pagina_adm($idUsuario){
		$PDO = db_connect();
		$sql = "SELECT ext_permite.* , ext_paginas.*
		 FROM ext_permite 
		 LEFT JOIN ext_paginas
		 ON ext_permite.idPagina = ext_paginas.idPagina
		 WHERE ext_permite.idUsuario = $idUsuario";
		$stmt = $PDO->prepare($sql);
		$stmt->execute();
		while ($lista = $stmt->fetch(PDO::FETCH_ASSOC)):
			// dados referente a as permições entre torre e pagina
					$r['idPermite'] = $lista['idPermite'];
					$r['idUsuario'] = $lista['idUsuario'];
					$r['pm_post'] = $lista['pm_post'];
					$r['pm_editar'] = $lista['pm_editar'];
					$r['pm_excluir'] = $lista['pm_excluir'];
					$r['pm_cadastro'] = $lista['pm_cadastro'];
					$r['pm_financeiro'] = $lista['pm_financeiro'];
					$r['idPagina'] = $lista['idPagina'];
					
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
					$listaAdm[] = $r;
		endwhile;

		if (isset($listaAdm)){
		return json_encode($listaAdm, JSON_PRETTY_PRINT);
			}else{
				return null;
			}
		}
	//VERIFICA QUAIS AS PÁGINAS O USUÁRIO TEM ACESSO
	function usuario_pagina_profissional($idUsuario){
		$PDO = db_connect();
		$sql_pagina = 
		"SELECT ext_permite.* , ext_paginas.*
		 FROM ext_permite 
		 LEFT JOIN ext_paginas
		 ON ext_permite.idPagina = ext_paginas.idPagina
		 WHERE ext_permite.idUsuario = $idUsuario
		 AND ext_paginas.tipoPagina = 1";
		$stmt_pagina = $PDO->prepare($sql_pagina);
		$stmt_pagina->execute();
		return $stmt_pagina;
	}
//-------------------------------------------- CONSULTAS DO BANCO DAS TORRES----------------------------------------------------
	//BUSCA TODAS AS TORRES
	function busca_torre_todos ($qtde){
		$PDO = db_connect();
		$sql_torre = "SELECT * FROM ext_torre order by RAND() LIMIT $qtde";
		$stmt_torre = $PDO->prepare($sql_torre);
		$stmt_torre->execute();
		return $stmt_torre;
	}
	//BUSCA TORRES PELA SETOR
	function busca_torre ($preferencia){
		$PDO = db_connect();
		$sql_torre = "SELECT * FROM ext_torre WHERE setorTorre = $preferencia order by RAND() LIMIT 20";
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
	//VERIFICA SE USUÁRIO TEM PERMIÇÃO DE ACESSO A TORRE
	function verifica_usu_tr ($idUsuario, $idTorre){
		$PDO = db_connect();
		$sql_torre = "SELECT * FROM ext_torre WHERE idUsuario = $idUsuario and idTorre = $idTorre";
		$stmt_torre = $PDO->prepare($sql_torre);
		$stmt_torre->execute();
		$stmt_torre = $stmt_torre->fetch(PDO::FETCH_ASSOC);
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
	//CONSULTA DE PÁGINA x TORRE - RESPOSTA EM JSON
	function busca_pagina_torre($idPagina){
		$PDO = db_connect();
		$sql = "SELECT ext_pg_tr.* , ext_torre.*
								FROM ext_pg_tr
								left join ext_torre
								on ext_pg_tr.idTorre = ext_torre.idTorre
								where ext_pg_tr.idPagina = $idPagina";
		$stmt = $PDO->prepare($sql);
		$stmt->execute();
		while ($lista = $stmt->fetch(PDO::FETCH_ASSOC)):
			// dados referente a as permições entre torre e pagina
					$c['idPgTorre'] = $lista['idPgTorre'];
					$c['pgAutorizado'] = $lista['pgAutorizado']; //VERIFICA SE A PÁGINA FOI ACEITA NA TORRE
					$c['pgNegado'] = $lista['pgNegado']; //VERIFICA SE A PÁGINA NÃO PODE MAIS PUBLICAR NA TORRE
					$c['pgSaiu'] = $lista['pgSaiu']; //CASO A PÁGINA SAIA DA TORRE
					$c['pgAtivar'] = $lista['pgAtivar']; //AUTORIZA A PÁGINA ENTRAR DE FORMA AUTOMÁTICA NA TORRE (PUBLIC/PRIVAD)
					$c['pgSolicita'] = $lista['pgSolicita']; //PÁGINA SOLICITANDO PARTICIPAÇÃO NA TORRE
					$c['pgPermite'] = $lista['pgPermite']; //pgPermite refere a torre que permite publicação livre sem aprovação
			// verifica situação da página na torre e retorna o resultado
					if ($lista['pgSolicita'] == 1){ //SE A PÁGINA SOLICITOU A PARTICIPAÇÃO
						$c['retorno'] = 'Aguarde';
					}
					if ($lista['pgAutorizado'] == 1){ //SE A TORRE ACEITAR UMA PÁGINA
						$c['retorno'] = 'Aprovado';
					}
					if ($lista['pgNegado'] == 1){ //SE A TORRE REJEITAR UMA PÁGINA 
						$c['retorno'] = 'Negado';
					}
					if ($lista['pgSaiu'] == 1){ //SE A PÁGINA OPTAR NÃO PARTICIPAR DA TORRE
						$c['retorno'] = 'Bloqueada';
					}
			// carrega os dados da torre
					$c['idTorre'] = $lista['idTorre'];
					$c['emailTorre'] = $lista['emailTorre'];
					$c['nomeTorre'] = $lista['nomeTorre'];
					$c['descTorre'] = $lista['descTorre'];
					$c['torreImg'] = $lista['torreImg'];
					$c['torreData'] = $lista['torreData'];
					$c['estadoTorre'] = $lista['estadoTorre'];
					$c['cidadeTorre'] = $lista['cidadeTorre'];
					$c['tipoTorre'] = $lista['tipoTorre'];
					$c['publicTorre'] = $lista['publicTorre'];
					$c['permiteTorre'] = $lista['permiteTorre'];
					$c['setorTorre'] = $lista['setorTorre'];
					$c['situacaoTorre'] = $lista['situacaoTorre'];	
					$listaAdm[] = $c;
		endwhile;

		if (isset($listaAdm)){
		return json_encode($listaAdm, JSON_PRETTY_PRINT);
			}else{
				return null;
			}
		}
	
	//contar os registros / RELAÇÃO ENTRE A PÁGINA E A TORRE PEGANDO PELO ID DA TORRE
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
	//contar os registros / RELAÇÃO ENTRE A PÁGINA E A TORRE PEGANDO PELO ID DA PAGINA
	function conta_torre_pagina($idPagina){
		try{
		$PDO = db_connect();
		$sql_count = "SELECT COUNT(*) AS total FROM ext_pg_tr where idPagina = $idPagina";
		$stmt_count = $PDO->prepare($sql_count);
		$stmt_count->execute();
		$total = $stmt_count->fetchColumn();
		return $total;
	}catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
	}
	}
	//contar os registros / RELAÇÃO ENTRE A PÁGINA E A TORRE PEGANDO PELO ID DA PAGINA VÁLIDOS
	function conta_torre_pagina_valida($idPagina){
		try{
		$PDO = db_connect();
		$sql_count = "SELECT COUNT(*) AS total FROM ext_pg_tr where idPagina = $idPagina and pgNegado = 0 and pgSaiu = 0";
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
					$r['idPagina'] = $lista['idPagina'];
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

					$r['idPermite'] = isset($lista['idPermite']) ? $lista['idPermite'] : null;
					$r['idUsuario'] = $lista['idUsuario'];
					$r['arrobaUsuario'] = $lista['arrobaUsuario'];
					$r['nomeUsuario'] = $lista['nomeUsuario'];
					$r['dataSolicita'] = $lista['dataSolicita'];
					$r['usuEstado'] = $lista['usuEstado'];
					$r['usuCidade'] = $lista['usuCidade'];
					$r['usuFoto'] = $lista['usuFoto'];
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
	//contar os registros / ALBUNS DO USUÁRIO
	function album_total_blog($idPagina){
		$PDO = db_connect();
		$sql_count = "SELECT COUNT(*) AS total FROM album_blog where idPagina = $idPagina and album_inativo = 0 ";
		$stmt_count = $PDO->prepare($sql_count);
		$stmt_count->execute();
		$total = $stmt_count->fetchColumn();
		return $total;
	}
//----------------------------------------------------------------------------------------------------------------------
	//contar quantas postagens para cada album / ALBUNS DO USUÁRIO
	function conta_album($idAlbum){
		$PDO = db_connect();
		$sql_count = "SELECT COUNT(DISTINCT id_postagem) AS total FROM ext_post where id_album_usuario = $idAlbum ";
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
	function produtos_total(){
		try{
		$PDO = db_connect();
		$sql_count = "SELECT COUNT(*) AS total FROM img_usuarios where produto = 1";
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
	function banco_produtos($inicio, $fim){
		try{
		$PDO = db_connect();
		$sql_fotos = "SELECT * FROM img_usuarios where produto = 1 ORDER BY idImg desc LIMIT $inicio, $fim";
		$albumImagemResposta = $PDO->prepare($sql_fotos);
		$albumImagemResposta->execute();
		return $albumImagemResposta;
		}catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
		}
	}
//----------------------------------------------------------------------------------------------------------------------
	// BUSCA OS BLOGS ALEATÓRIOS CIDADE/ESTADO/"profissional|gratuita"
	function busca_blog_todos($tipo,$busca,$qtde){
		$PDO = db_connect();
		if($tipo == 'cidade'){
		$sql_fotos = "SELECT * FROM ext_paginas where cidadePagina = '$busca' ORDER BY idPagina DESC LIMIT $qtde";
		}
		if($tipo == 'estado'){
		$sql_fotos = "SELECT * FROM ext_paginas where estadoPagina = '$busca' ORDER BY idPagina DESC LIMIT $qtde";
		}
		if($tipo == 'modo'){
		$sql_fotos = "SELECT * FROM ext_paginas where tipoPagina = '$busca' ORDER BY idPagina DESC LIMIT $qtde";
		}
		if($tipo == 'rand'){
		$sql_fotos = "SELECT * FROM ext_paginas ORDER BY RAND() LIMIT $qtde";
		}
		if($tipo == 'ultimo'){
		$sql_fotos = "SELECT * FROM ext_paginas ORDER BY idPagina DESC LIMIT $qtde";
		}
		$blog = $PDO->prepare($sql_fotos);
		$blog->execute();
		return $blog;
	}
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
	//Encontra as postagens de cada usuário
	function postagens_usuario ($idUsuario){
			$PDO = db_connect();
			$post = "SELECT DISTINCT id_postagem FROM ext_post where id_usuario = $idUsuario";
			$result = $PDO->prepare($post);
			$result->execute();
			return $result;
		}
	//contar quantas postagens existem para determinado usuário
	function total_post_usuario($idUsuario){
		$PDO = db_connect();
		$sql_count = "SELECT COUNT(DISTINCT id_postagem, post_data) AS total FROM ext_post where id_usuario = $idUsuario ";
		$stmt_count = $PDO->prepare($sql_count);
		$stmt_count->execute();
		$total = $stmt_count->fetchColumn();
		return $total;
	}
	//contar quantas postagens existem para determinada tore
	function total_post($idTorre){
		$PDO = db_connect();
		$sql_count = "SELECT COUNT(DISTINCT id_postagem, post_data) AS total FROM ext_post where id_torre = $idTorre ";
		$stmt_count = $PDO->prepare($sql_count);
		$stmt_count->execute();
		$total = $stmt_count->fetchColumn();
		return $total;
	}
	//contar quantas postagens existem para determinada página
	function total_post_pagina($idPagina){
		$PDO = db_connect();
		$sql_count = "SELECT COUNT(DISTINCT id_postagem, post_data) AS total FROM ext_post where id_pagina = $idPagina ";
		$stmt_count = $PDO->prepare($sql_count);
		$stmt_count->execute();
		$total = $stmt_count->fetchColumn();
		return $total;
	}
	//contar quantas postagens existem para determinado album
	function total_post_album($idBusca){
		$PDO = db_connect();
		$sql_count = "SELECT COUNT(DISTINCT id_postagem, post_data) AS total FROM ext_post where id_album_blog = $idBusca ";
		$stmt_count = $PDO->prepare($sql_count);
		$stmt_count->execute();
		$total = $stmt_count->fetchColumn();
		return $total;
	}
//----------------------------------------------------------------------------------------------------------------------
	// Dados para torre
		function buscar_post($idBusca, $tipoBusca, $inicio, $fim, $ordem){
		$PDO = db_connect();
		if ($ordem == 1){
			$order = 'id_postagem'; //ORDENAR PELO ULTIMO POST 
		}else{
			$order = 'rand()'; //ORDENAR DE FORMA ALEATÓRIA
		}

		if ($tipoBusca === 'torre'){
			$sql_fotos = "SELECT DISTINCT id_postagem, post_data FROM ext_post where id_torre = $idBusca  ORDER BY 'id_post' desc LIMIT $inicio, $fim";
			$blog = $PDO->prepare($sql_fotos);
			$blog->execute();
		}
		if ($tipoBusca === 'torre_publicado'){
			$sql_fotos = "SELECT DISTINCT id_postagem, post_data FROM ext_post where id_torre = $idBusca and post_liberado = 1 ORDER BY $order desc LIMIT $inicio, $fim";
			$blog = $PDO->prepare($sql_fotos);
			$blog->execute();
		}
		if ($tipoBusca === 'torre_sem_ASC'){
			$sql_fotos = "SELECT DISTINCT id_postagem, post_data FROM ext_post where id_torre = $idBusca and post_liberado = 0 ORDER BY $order ASC LIMIT $inicio, $fim";
			$blog = $PDO->prepare($sql_fotos);
			$blog->execute();
		}
		if ($tipoBusca === 'torre_sem_DESC'){
			$sql_fotos = "SELECT DISTINCT id_postagem, post_data FROM ext_post where id_torre = $idBusca and post_liberado = 0 ORDER BY $order DESC LIMIT $inicio, $fim";
			$blog = $PDO->prepare($sql_fotos);
			$blog->execute();
		}
		if ($tipoBusca === 'torre-ranking'){
			$sql_fotos = "SELECT DISTINCT id_postagem, post_data FROM ext_post where id_torre = $idBusca  ORDER BY 'post_pontos' desc LIMIT $inicio, $fim";
			$blog = $PDO->prepare($sql_fotos);
			$blog->execute();
		}
		if ($tipoBusca === 'index'){
			$sql_fotos = "SELECT DISTINCT id_postagem FROM ext_post  ORDER BY rand() desc LIMIT $inicio, $fim";
			$blog = $PDO->prepare($sql_fotos);
			$blog->execute();
		}
		if ($tipoBusca === 'ranking'){
			$sql_fotos = "SELECT DISTINCT id_postagem FROM ext_post  ORDER BY post_pontos DESC LIMIT $inicio, $fim";
			$blog = $PDO->prepare($sql_fotos);
			$blog->execute();
		}
		if ($tipoBusca === 'blog'){
			$sql_fotos = "SELECT DISTINCT id_postagem FROM ext_post where id_pagina = $idBusca and blog_excluido = 0  ORDER BY $order desc LIMIT $inicio, $fim";
			$blog = $PDO->prepare($sql_fotos);
			$blog->execute();
		}
		if ($tipoBusca === 'album_blog'){
			$sql_fotos = "SELECT DISTINCT id_postagem FROM ext_post where id_album_blog = $idBusca  ORDER BY rand() desc LIMIT $inicio, $fim";
			$blog = $PDO->prepare($sql_fotos);
			$blog->execute();
		}
		if ($tipoBusca === 'album_usuario'){
			$sql_fotos = "SELECT DISTINCT id_postagem FROM ext_post where id_album_usuario = $idBusca  ORDER BY rand() desc LIMIT $inicio, $fim";
			$blog = $PDO->prepare($sql_fotos);
			$blog->execute();
		}
		if ($tipoBusca === 'usuario'){
			$sql_fotos = "SELECT DISTINCT id_postagem FROM ext_post where id_usuario = $idBusca and blog_excluido = 0  ORDER BY id_postagem desc LIMIT $inicio, $fim";
			$blog = $PDO->prepare($sql_fotos);
			$blog->execute();
		}
		if ($tipoBusca === 'produtos'){
			$sql_fotos = "SELECT DISTINCT id_postagem FROM ext_post where id_pagina = $idBusca AND produto = 1  ORDER BY rand() desc LIMIT $inicio, $fim";
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
				    $r['produto'] = $post_usuario['produto'];
				    $r['torreEstado'] = $post_usuario['torreEstado'];
				    $r['torreCidade'] = $post_usuario['torreCidade'];
				    $r['data_post'] = $post_usuario['data_post'];
				    $dados_post[] = $r;
				/**}else{
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
				    $r['produto'] = $post_usuario['produto'];
				    $r['torreEstado'] = $post_usuario['torreEstado'];
				    $r['torreCidade'] = $post_usuario['torreCidade'];
				    $r['data_post'] = $post_usuario['data_post'];
				    $dados_post[] = $r;**/
				}
		endwhile;
		if(isset($dados_post)){
			return json_encode($dados_post, JSON_PRETTY_PRINT);
				//return $postagens;
		}else{
			return null;
		}
	}
	// Busca produtos
	 function buscaProduto($idPagina){
	 	$PDO = db_connect();
			$produtos = "SELECT * FROM ext_produtos where idAlbum = $idPagina";
			$busca = $PDO->prepare($produtos);
			$busca->execute();
			while ($resut= $busca->fetch(PDO::FETCH_ASSOC)):
			$pt['codigoProduto'] = $resut['codigoProduto'];
			$pt['nomeProduto'] = $resut['nomeProduto'];
			$pt['valorNormal'] = $resut['valorNormal'];
			$pt['valorDesconto'] = $resut['valorDesconto'];
			$pt['marcaProduto'] = $resut['marcaProduto'];
			$pt['dinheiro'] = $resut['dinheiro'];
			$pt['boleto'] = $resut['boleto'];
			$pt['debito'] = $resut['debito'];
			$pt['credito'] = $resut['credito'];
			$pt['dataProduto'] = $resut['dataProduto'];
			$pt['infoAdicionais'] = $resut['infoAdicionais'];
			$resultado[] = $pt;
		endwhile;
			return json_encode($resultado, JSON_PRETTY_PRINT);
	 }
	//verifica as permiçoes e validações do post
	function validar_post($id_postagem, $id_torre, $tipoBusca){
		if($tipoBusca == 'blog'){
			$local = 'id_pagina';
		}
		if($tipoBusca == 'torre'){
			$local = 'id_torre';
		}
		if($tipoBusca == 'torre_lista'){
			$local = 'id_torre';
		}
		if($tipoBusca == 'usuario'){
			$local = 'id_usuario';
		}
		$PDO = db_connect();
			$validar = "SELECT * FROM ext_post where id_postagem = $id_postagem and $local = $id_torre";
			$post_usuario = $PDO->prepare($validar);
			$post_usuario->execute();
			$post_usuario = $post_usuario->fetch(PDO::FETCH_ASSOC);
					$c['post_liberado'] = $post_usuario['post_liberado'];
					$c['post_denuncia'] = $post_usuario['post_denuncia'];
					$c['post_excluido'] = $post_usuario['post_excluido'];
					$c['blog_liberado'] = $post_usuario['blog_liberado'];
					$c['blog_denuncia'] = $post_usuario['blog_denuncia'];
					$c['blog_excluido'] = $post_usuario['blog_excluido'];
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
	//contar quantas comentários para quem postou a foto
	function total_comentarios_user($idUsuario){
		$PDO = db_connect();
		$sql_count = "SELECT COUNT(*) AS total FROM ext_comentario where idUser = $idUsuario ";
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
	//criar um loop com os comentários
	function comentarios_adm($idUsuario){
		$PDO = db_connect();
		$sql = "SELECT * FROM ext_comentario where idUser = $idUsuario order by idComentario desc";
		$stmt = $PDO->prepare($sql);
		$stmt->execute();
		while ($coment = $stmt->fetch(PDO::FETCH_ASSOC)):
			$c['idComentario'] = $coment['idComentario'];
			$c['idUsuario'] = $coment['idUsuario'];
			$c['idPagina'] = $coment['idPagina'];
			$c['idTorre'] = $coment['idTorre'];
			$c['idUser'] = $coment['idUser'];
			$c['idPost'] = $coment['idPost'];
			$c['comentario'] = $coment['comentario'];
			$c['data'] = $coment['data'];
			$c['respUsu'] = $coment['respUsu'];
			$c['respPost'] = $coment['respPost'];
			$c['respPublica'] = $coment['respPublica'];
			$c['tokenDia'] = $coment['tokenDia'];
			$comentario[] = $c;
		endwhile;

		return json_encode($comentario, JSON_PRETTY_PRINT);
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
	//quantidade de visitas
	function total_visitas_pagina($idPagina){
		$PDO = db_connect();
		$sql = "SELECT  COUNT( DISTINCT tokenDia) AS total FROM ext_visita where idPagina = $idPagina";
		$stmt = $PDO->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchColumn();
		return $result;
	}
	//quantidade de visitas
	function total_visitas_torre($idTorre){
		$PDO = db_connect();
		$sql = "SELECT  COUNT( DISTINCT tokenDia) AS total FROM ext_visita where idTorre = $idTorre";
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
//RETORNA O VALOR EM JSON - BUSCA PELO ID DOS PTS
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
	function soma_pontos($idBusca,$local){
		$PDO = db_connect();
		if($local == 'post'){
		$sql = "SELECT * FROM ext_pts where idPost = $idBusca";
		}
		if($local == 'torre'){
		$sql = "SELECT * FROM ext_pts where idTorre = $idBusca";
		}
		if($local == 'blog'){
		$sql = "SELECT * FROM ext_pts where idPagina = $idBusca";
		}
		$stmt = $PDO->prepare($sql);
		$stmt->execute();
		$conta = 0;
		$ptsCurtida = 0;
		$ptsSeguidores = 0;
		$ptsComentario = 0;
		$ptsFavoritos = 0;
		$ptsExtras = 0;
		$ptsVisitas = 0;
		$ptsPost = 0;
		$ptsLoja = 0;
		$ptsCompartilha = 0;
		$ptsBonus = 0;
		$ptsExtilos = 0;
		while ($lista = $stmt->fetch(PDO::FETCH_ASSOC)):
					$conta = $conta+1;
					$ptsCurtida += $lista['ptsCurtida'];
					$ptsSeguidores += $lista['ptsSeguidores'];
					$ptsComentario += $lista['ptsComentario'];
					$ptsFavoritos += $lista['ptsFavoritos'];
					$ptsExtras += $lista['ptsExtras'];
					$ptsVisitas += $lista['ptsVisitas'];
					$ptsPost += $lista['ptsPost'];
					$ptsLoja += $lista['ptsLoja'];
					$ptsCompartilha += $lista['ptsCompartilha'];
					$ptsBonus += $lista['ptsBonus'];
					$ptsExtilos += $lista['ptsExtilos'];
		endwhile;
		if($conta > 0){
			$total = intval(($ptsCurtida
			+$ptsSeguidores+$ptsComentario+$ptsFavoritos
			+$ptsExtras+$ptsVisitas+$ptsPost+$ptsLoja
			+$ptsCompartilha+$ptsBonus+$ptsExtilos)*($conta/$ptsBonus));
		}else{
			$total = 0;
		}
		
		return $total;
	}
// --------------------------------------- CONSULTAS NO BANCO ALBUM_BLOG -------------------------------------------------
	function pasta_album_blog($idPagina){
		$PDO = db_connect();
		$sql = "SELECT * FROM album_blog WHERE idPagina = $idPagina and album_inativo = 0 ORDER BY idAlbumBlog DESC";
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
		if (isset($albuns)){
		return json_encode($albuns, JSON_PRETTY_PRINT);
			}
	}
	function pasta_album_blog_id($idAlbumBlog){
		$PDO = db_connect();
		$sql = "SELECT * FROM album_blog WHERE idAlbumBlog = $idAlbumBlog ORDER BY idAlbumBlog DESC";
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
		if (isset($albuns)){
		return json_encode($albuns, JSON_PRETTY_PRINT);
			}
	}
	// --------------------------------------- CONSULTAS NO BANCO DADOS DA PÁGINA -------------------------------------------
	function dados_extra($idBusca, $tipo){
		$PDO = db_connect();
		if($tipo == 'blog'){
		$sql = "SELECT * FROM ext_dados_extra WHERE idPagina = $idBusca";
		}
		if($tipo == 'torre'){
		$sql = "SELECT * FROM ext_dados_extra WHERE idTorre = $idBusca";
		}
		$stmt = $PDO->prepare($sql);
		$stmt->execute();
		while ($lista = $stmt->fetch(PDO::FETCH_ASSOC)):
					$c['idDadosPaginas'] = $lista['idDadosPaginas'];
					$c['idPagina'] = $lista['idPagina'];
					$c['idUsuario'] = $lista['idUsuario'];
					$c['idTorre'] = $lista['idTorre'];
					$c['telefone'] = $lista['telefone'];
					$c['celular'] = $lista['celular'];
					$c['endereco'] = $lista['endereco'];
					$c['email'] = $lista['email'];
					$c['site'] = $lista['site'];
					$c['facebook'] = $lista['facebook'];
					$c['instagram'] = $lista['instagram'];
					$c['filial'] = $lista['filial'];
					$c['matriz'] = $lista['matriz'];
					$c['horario'] = $lista['horario'];
					$c['mapa'] = $lista['mapa'];
					$c['codigo'] = $lista['codigo'];
					$dados_pg[] = $c;
		endwhile;
		if (isset($dados_pg)){
		return json_encode($dados_pg, JSON_PRETTY_PRINT);
			}else{
				$dados_pg = null;
			}
	}
	// PORCENTAGEM DE CADASTRAMENTO
	function dados_porcentagem($idPagina){
		$PDO = db_connect();
		$sql = "SELECT * FROM ext_dados_paginas WHERE idPagina = $idPagina";
		$stmt = $PDO->prepare($sql);
		$stmt->execute();
		while ($lista = $stmt->fetch(PDO::FETCH_ASSOC)):
					$c['idDadosPaginas'] = $lista['idDadosPaginas'];
					$c['idPagina'] = $lista['idPagina'];
					$c['telPagina'] = $lista['telPagina'] ? 1 : 0;
					$c['celPagina'] = $lista['celPagina'] ? 1 : 0;
					$c['enderecoPagina'] = $lista['enderecoPagina'] ? 1 : 0;
					$c['emailPagina'] = $lista['emailPagina'] ? 1 : 0;
					$c['sitePagina'] = $lista['sitePagina'] ? 1 : 0;
					$c['facePagina'] = $lista['facePagina'] ? 1 : 0;
					$c['instaPagina'] = $lista['instaPagina'] ? 1 : 0;
					$c['filialPagina'] = $lista['filialPagina'] ? 1 : 0;
					$c['matrizPagina'] = $lista['matrizPagina'] ? 1 : 0;
					$c['horarioPagina'] = $lista['horarioPagina'] ? 1 : 0;
					$c['mapaPagina'] = $lista['mapaPagina'] ? 1 : 0;
					$c['codigoPagina'] = $lista['codigoPagina'] ? 1 : 0;
					$total = $c['telPagina']+$c['celPagina']+$c['enderecoPagina']+$c['emailPagina']+$c['sitePagina']+$c['facePagina']+$c['instaPagina']+$c['filialPagina']+$c['matrizPagina']+$c['horarioPagina']+$c['mapaPagina']+$c['codigoPagina'];
					$dados_pg = $total;
		endwhile;
		if (isset($dados_pg)){
				return $dados_pg;
			}else{
				return '0';
			}
	}
	
?>