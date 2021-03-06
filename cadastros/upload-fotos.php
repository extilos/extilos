<?php
ob_start();
session_start();
date_default_timezone_set('America/Sao_Paulo');
//if(!isset($_SESSION['usuariolog']) && (!isset($_SESSION['senhalog']))){
    //header("Location: login.php?acao=negado"); exit;
//} 
include_once '../conn/init.php';
include_once '../functions/functions.php';
include_once '../functions/conexoes.php';
include_once ('../include/lib/WideImage.php'); //Inclui classe WideImage à página
//carrega informação da session
$idUsuario = $_SESSION['idLogado'];
$idTorre = isset($_SESSION['idTorre']) ? $_SESSION['idTorre'] : '1';
// informações do formulário
$dataLocal      =       date('d/m/Y');
$usuEstilo      = 	    isset($_POST['usuEstilo']) 	    ? $_POST['usuEstilo']      : null;
$usuTitulo      = 	    isset($_POST['usuTitulo']) 	    ? $_POST['usuTitulo']      : null;
$usuDesc        =       isset($_POST['usuDesc'])        ? $_POST['usuDesc']        : null;
$usuMarca       = 	    isset($_POST['usuMarca']) 	    ? $_POST['usuMarca']       : null;
$produto        =       isset($_POST['produto'])        ? $_POST['produto']        : '0';
$torreCidade    =       isset($_POST['torreCidade'])    ? $_POST['torreCidade']    : null;
$torreEstado    =       isset($_POST['torreEstado'])    ? $_POST['torreEstado']    : null;
$torreExtilos   =       isset($_POST['torreExtilos'])   ? $_POST['torreExtilos']   : null;
$idPagina       =       isset($_POST['idPagina'])       ? $_POST['idPagina']       : array(12);
$idPaginaCheck  =       isset($_POST['idPaginaCheck'])  ? $_POST['idPaginaCheck']  : null;
$idAlbumBlog    =       isset($_POST['albumBlog'])      ? $_POST['albumBlog']      : null;
$feminino       =       isset($_POST['feminino'])       ? $_POST['feminino']       : '0';
$masculino      =       isset($_POST['masculino'])      ? $_POST['masculino']      : '0';
$alternativo    =       isset($_POST['alternativo'])    ? $_POST['alternativo']    : '0';
$precPro        =       isset($_POST['precPro'])        ? $_POST['precPro']        : null;
$descPro        =       isset($_POST['descPro'])        ? $_POST['descPro']        : null;
$formaPro       =       isset($_POST['formaPro'])       ? $_POST['formaPro']       : null;
$infoPro        =       isset($_POST['infoPro'])        ? $_POST['infoPro']        : null;
$caminhoAtual   =       isset($_POST['caminho'])        ? $_POST['caminho']        : '/extilos/index';
// PRODUTOS
$codigoProduto  =       isset($_POST['codigoPro'])      ? $_POST['codigoPro']      : null;
$nomeProduto    =       isset($_POST['nomePro'])      ? $_POST['nomePro']      : null;
$precoNormal    =       isset($_POST['precoNormal'])      ? $_POST['precoNormal']      : null;
$precoDesconto  =       isset($_POST['precoDesconto'])      ? $_POST['precoDesconto']      : null;
$marcaProduto   =       isset($_POST['marcaProduto'])      ? $_POST['marcaProduto']      : null;
$adicionaProduto =      isset($_POST['adicionaProduto'])      ? $_POST['adicionaProduto']      : null;
$qtdeDisponivel =       isset($_POST['qtdeDisponivel'])      ? $_POST['qtdeDisponivel']      : null;
$dinheiro       =       isset($_POST['dinheiro'])       ? $_POST['dinheiro']       : '0';
$boleto         =       isset($_POST['boleto'])         ? $_POST['boleto']         : '0';
$debito         =       isset($_POST['debito'])         ? $_POST['debito']         : '0';
$credito        =       isset($_POST['credito'])        ? $_POST['credito']        : '0';


//echo($idPagina);
                       // print_r($idPaginaCheck);
                        //print_r($precoNormal);
                        //print_r($precoDesconto);
                        //print_r($marcaProduto);
                        //print_r($adicionaProduto);


if($idPaginaCheck != null){
$idPagina = array_merge($idPagina, $idPaginaCheck); //combinam as duas arrays de id do Blog
}
//print_r($idPagina);
//exit;
//limpa as strings passadas via post
$usuEstilo =  sanitizeString($usuEstilo);
$usuTitulo=   sanitizeString($usuTitulo);
$usuDesc =   sanitizeStringTexto($usuDesc);
$usuMarca =   sanitizeStringTexto($usuMarca);
$precPro = sanitizeStringTexto($precPro);
$descPro = sanitizeStringTexto($descPro);
$formaPro = sanitizeString($formaPro);
$infoPro = sanitizeStringTexto($infoPro);
// validação (bem simples, só pra evitar dados vazios)
if (empty($usuEstilo) || empty($usuTitulo) )
{
	echo "Preencha os campos obrigatórios.";
	exit;
}

//print_r($_FILES['imagemPro']);


//$i = 0;
//foreach ($idPagina as $pag) {
      
//      $result[]= $pag.'-'.$idAlbumBlog[$i];
//      $i++;
//  }
//print_r($idPagina);
//print_r($idPaginaCheck);
//print_r($result);
//exit;
//print_r($_FILES['imagem']['error']);
if(isset($_FILES['imagem']))
{
     // require ('../include/lib/WideImage.php'); //Inclui classe WideImage à página
      date_default_timezone_set("Brazil/East");
      //$maxSize	= 1024 * 1024 * 10;
      	$name  = $_FILES['imagem']['name']; //Atribui uma array com os nomes dos arquivos à variável
      	$tmp_name = $_FILES['imagem']['tmp_name']; //Atribui uma array com os nomes temporários dos arquivos à variável
      	//$tamanho = $_FILES['imagem']['size'];
        //$exif = exif_read_data($_FILES['imagem']['tmp_name']);
//print_r($tmp_name);
      $allowedExts = array(".gif", ".jpeg", ".jpg", ".png", ".bmp"); //Extensões permitidas
      $grande = '../imagem/post/grande/';
      $media = '../imagem/post/media/';
      $mini = '../imagem/post/mini/';
      for($i = 0; $i < count($tmp_name); $i++){ //passa por todos os arquivos
       $ext = strtolower(substr($name[$i],-4));
       //faz o tratamento caso a extesão do arquivo seja jpeg, por causa da quantidade de caracteres
       if ($ext == 'jpeg'){
        $ext = ".jpeg";
       }
         if(in_array($ext, $allowedExts)) //Pergunta se a extensão do arquivo, está presente no array das extensões permitidas
         {
         	if ($_FILES['imagem']['size'][$i] > 0 )
          {
           $new_name = date("YmdHis") .uniqid(). $ext;
           @($exif = exif_read_data($tmp_name[$i]));
           $orientation = (isset($exif['Orientation'])) ? $exif['Orientation'] : null;
        		$image = WideImage::load($tmp_name[$i]); //Carrega a imagem utilizando a WideImage

            if($orientation == 6){
              $image = $image->rotate(90,0);
            }
            if($orientation == 3){
              $image = $image->rotate(180,0);
            }
            if($orientation == 8){
              $image = $image->rotate(270,0);
            }
            list($largura, $altura) = getimagesize($tmp_name[$i]);
            //IMAGEM GRANDE
            if($largura > $altura){
              $largura = $largura / 2;
              $imageGG = $image->crop('center', 'center', $largura, $altura);
              $imageGG = $imageGG->resize(500, 700, 'outside');
            }else{
              $imageGG = $image->resize(500, 700, 'outside');
            }
            $imageGG->saveToFile($grande.$new_name); //Salva a imagem}

            //IMAGEM MEDIA
            if($largura > $altura){
              $largura = $largura / 2;
              $imageMM = $image->crop('center', 'center', $largura, $altura);
              $imageMM = $imageMM->resize(300, 500, 'outside');
            }else{
              $imageMM = $image->resize(300, 500, 'outside');
            }
            $imageMM->saveToFile($media.$new_name);

            //IMAGEM MINI
            if($largura > $altura){
              $largura = $largura / 2;
              $imagePP = $image->crop('center', 'center', $largura, $altura);
              $imagePP = $imagePP->crop('center', 'center',280, 400);
            }else{
              $imagePP = $image->resize(300, 420, 'outside');
              $imagePP = $imagePP->crop('center', 'center',280, 400);
            }
            $imagePP->saveToFile($mini.$new_name);

            //echo $image;
            $str[] = $new_name;

            $_SESSION['resposta'] = 'alb_publicado';

          }
          else
          {
           $_SESSION['resposta'] = 'alb_alerta';
         }

       }

     }
  }

   $img =   isset($str[0]) 	? $str[0] : null;
   $img1 =  isset($str[1]) 	? $str[1] : null;
   $img2 =  isset($str[2]) 	? $str[2] : null;
   $img3 =  isset($str[3]) 	? $str[3] : null;
   $img4 =  isset($str[4]) 	? $str[4] : null;

//IMAGEM PRODUTO
if(isset($_FILES['imagemPro'])) 
{
      
      date_default_timezone_set("Brazil/East");
      //$maxSize  = 1024 * 1024 * 10;
        $nameP  = $_FILES['imagemPro']['name']; //Atribui uma array com os nomes dos arquivos à variável
        $tmp_nameP = $_FILES['imagemPro']['tmp_name']; //Atribui uma array com os nomes temporários dos arquivos à variável
        //$tamanho = $_FILES['imagem']['size'];
        //$exif = exif_read_data($_FILES['imagem']['tmp_name']);
//print_r($tmp_name);
      $allowedExtsP = array(".gif", ".jpeg", ".jpg", ".png", ".bmp"); //Extensões permitidas
      $miniP = '../imagem/produt/';
      for($iP = 0; $iP < count($tmp_nameP); $iP++){ //passa por todos os arquivos
       $extP = strtolower(substr($nameP[$iP],-4));
       //faz o tratamento caso a extesão do arquivo seja jpeg, por causa da quantidade de caracteres
       if ($extP == 'jpeg'){
        $extP = ".jpeg";
       }
         if(in_array($extP, $allowedExtsP)) //Pergunta se a extensão do arquivo, está presente no array das extensões permitidas
         {
          if ($_FILES['imagemPro']['size'][$iP] > 0 )
          {
           $new_nameP = date("YmdHis") .uniqid(). $extP;
           @($exifP = exif_read_data($tmp_nameP[$iP]));
           $orientationP = (isset($exifP['Orientation'])) ? $exifP['Orientation'] : null;


            $imageP = WideImage::load($tmp_nameP[$iP]); //Carrega a imagem utilizando a WideImage

            if($orientationP == 6){
              $imageP = $imageP->rotate(90,0);
            }
            if($orientationP == 3){
              $imageP = $imageP->rotate(180,0);
            }
            if($orientationP == 8){
              $imageP = $imageP->rotate(270,0);
            }
            list($larguraP, $alturaP) = getimagesize($tmp_nameP[$iP]);
            /*/IMAGEM GRANDE
            if($largura > $altura){
              $largura = $largura / 2;
              $imageGG = $image->crop('center', 'center', $largura, $altura);
              $imageGG = $imageGG->resize(500, 700, 'outside');
            }else{
              $imageGG = $image->resize(500, 700, 'outside');
            }
            $imageGG->saveToFile($grande.$new_name); //Salva a imagem}

            //IMAGEM MEDIA
            if($largura > $altura){
              $largura = $largura / 2;
              $imageMM = $image->crop('center', 'center', $largura, $altura);
              $imageMM = $imageMM->resize(300, 500, 'outside');
            }else{
              $imageMM = $image->resize(300, 500, 'outside');
            }
            $imageMM->saveToFile($media.$new_name); **/

            //IMAGEM MINI
            if($larguraP > $alturaP){
              $larguraP = $larguraP / 2;
              $imagePPP = $imageP->crop('center', 'center', $larguraP, $alturaP);
              $imagePPP = $imagePPP->crop('center', 'center',280, 400);
            }else{
              $imagePPP = $imageP->resize(300, 420, 'outside');
              $imagePPP = $imagePPP->crop('center', 'center',280, 400);
            }
            $imagePPP->saveToFile($miniP.$new_nameP);

            //echo $image;
            $strPro[] = $new_nameP;

            $_SESSION['resposta'] = 'alb_publicado';

          }
          else
          {
           $_SESSION['resposta'] = 'alb_alerta';
         }

       }

     }
  }
// insere no banco
                      $PDO = db_connect();
                      $sql = "INSERT INTO img_usuarios(idUsuario, usuEstilo, usuTitulo, usuMarca, usuDesc, img, img1, img2, img3, img4, produto, torreEstado, torreCidade, torreExtilos) VALUES(:idUsuario, :usuEstilo, :usuTitulo, :usuMarca, :usuDesc, :img, :img1, :img2, :img3, :img4, :produto,:torreEstado, :torreCidade, :torreExtilos)";
                      $stmt = $PDO->prepare($sql);

                      $stmt->bindParam(':idUsuario', $idUsuario);
                      $stmt->bindParam(':usuEstilo', $usuEstilo);
                      $stmt->bindParam(':usuTitulo', $usuTitulo);
                      $stmt->bindParam(':usuMarca', $usuMarca);
                      $stmt->bindParam(':usuDesc', $usuDesc);
                      $stmt->bindParam(':img', $img);
                      $stmt->bindParam(':img1', $img1);
                      $stmt->bindParam(':img2', $img2);
                      $stmt->bindParam(':img3', $img3);
                      $stmt->bindParam(':img4', $img4);
                      $stmt->bindParam(':produto', $produto);
                      $stmt->bindParam(':torreEstado', $torreEstado);
                      $stmt->bindParam(':torreCidade', $torreCidade);
                      $stmt->bindParam(':torreExtilos', $torreExtilos);

                      if ($stmt->execute())
                      {
        //DEPOIS DE EXECUTAR A INSERÇÃO DE DADADOS
        
        //Tratamento para as marcas de produto
                       $eComercial = explode("&", $usuMarca);
                       $n_eComercial= count($eComercial);
                       for ($c=1 ; $c<$n_eComercial ; $c++)
                       {
                        $separaComercial[$c] = preg_split('/ /', $eComercial[$c], -1);
                      }
                      $contaComercial = isset($separaComercial) ? count($separaComercial) : 0 ; //verifica se exite
                      for ($d=1; $d<=$contaComercial; $d++)
                      {
                        $novoComercial[$d] = "&".sanitizeString($separaComercial[$d][0]);
                      }
        //Tratamento para as lojas
                       $marcaLoja = explode("$", $usuMarca);
                       $n_loja= count($marcaLoja);
                       for ($l=1 ; $l<$n_loja ; $l++)
                       {
                        $separaLoja[$l] = preg_split('/ /', $marcaLoja[$l], -1);
                      }
                      $contaLoja = isset($separaLoja) ? count($separaLoja) : 0 ; //verifica se exite
                      for ($m=1; $m<=$contaLoja; $m++)
                      {
                        $novoLoja[$m] = "$".sanitizeString($separaLoja[$m][0]);
                      }
        //Tratamento para as hashtag
                       $hashtag = explode("#", $usuDesc);
                       $n_palavras = count($hashtag);
                       for ($k=1 ; $k<$n_palavras ; $k++)
                       {
                        $separaPalavras[$k] = preg_split('/ /', $hashtag[$k], -1);
                      }
                      $contaPalavra = isset($separaPalavras) ? count($separaPalavras) : 0 ; //verifica se exite
                      for ($v=1; $v<=$contaPalavra; $v++)
                      {
                        $novaHashtag[$v] = "#".sanitizeString($separaPalavras[$v][0]);
                      }
        //Tratamento para as @ arroba
                      $arroba = explode("@", $usuDesc);
                      $n_arroba = count($arroba);

                      for ($a=1 ; $a<$n_arroba ; $a++)
                      {
                        $separaArroba[$a] = preg_split('/ /', $arroba[$a], -1);
                      }
                       $contaArroba = isset($separaArroba) ? count($separaArroba) : 0 ; //verifica se exite
                      for ($b=1; $b<=$contaArroba; $b++)
                      {
                        $novaArroba[$b] = "@".sanitizeString($separaArroba[$b][0]);
                      }
        /* EXEMPLO DE FUNCIONAMENTO
            Usuário _POST: #minhaloja a melhor loja da cidade #cidade #compra_aqui é barato
            Sistema:  (explode) tudo que começa com #
                      (resultado) Array[0]=>minhaloja a melhor loja da cidade [1]=>cidade [2]=>compra_aqui é barato
                      (count) conta a quandidade de palavras
                      (resultado) 3 seguimentos
                      (loop) cria regra para cada seguimento
                      (preg_split) separa cada palavra onde tem espaço criando array multidimencional
                      (resultado) Array=>[1] Array=[0]minhaloja [1]a [2]melhor... Array=>[2] Array=>[0]cidade ..
                      (count) conta a quantidade de Array primario
                      (resultado) 3 Array
                      (loop)cira um loop para cada array
                      (finaliza) pega o reslutado de cada array na matriz [0]onde contem a primeira palavra escrita com a # e descarta o restante do texto. Adiciona #novamente na frete da palavra. SanitizeString substitui caracteres invalidos.
                      (resultado) Array([1]=>#minhaloja [2]=>#cidade [3]=>#comprar_aqui)
          */
        // Consulta para saber o ultimo post do usuário, para recuperar o valor de IDdo Post
                        $sqlConsulta = "SELECT MAX(IdImg) as ultimo FROM img_usuarios where idUsuario = $idUsuario";
                        $sqlExecuta = $PDO->prepare($sqlConsulta);
                        $sqlExecuta -> execute();
                        $ultimoNum = $sqlExecuta -> fetch(PDO::FETCH_ASSOC);
                        $ultimo = $ultimoNum['ultimo'];

        //prepara o conteudo para ser inserido
                        $qtdePalavras = isset($novaHashtag) ? count($novaHashtag) : 0 ; //verifica se exite
                        $qtdeArrobas = isset($novaArroba) ? count($novaArroba) : 0 ; //verifica se exite
                        $qtdeComercial = isset($novoComercial) ? count($novoComercial) : 0 ; //verifica se exite
                        $qtdeLoja = isset($novoLoja) ? count($novoLoja) : 0 ; //verifica se exite
        // Cadastra pontuação do post com 5 imagens
                        if($img4 > null){
                          $idPost = $ultimo;
                          $idPaginaPts = '0';
                          $idTorrePts = '0';
                          $idUsuario = $idUsuario;
                          $ptsCurtida = '0';
                          $ptsSeguidores = '0';
                          $ptsComentario = '0';
                          $ptsFavoritos = '0';
                          $ptsExtras = '0';
                          $ptsVisitas = '0';
                          $ptsLoja = '0';
                          $ptsCompartilha = '0';
                          $ptsBonus = '1';
                          $ptsExtilos = '0';
                          $local = 'PUBLICA';
                          if($local == 'PUBLICA'){  $ptsPost = 75;}else{$ptsPost = 0;};
                          $PDO = db_connect();
                          $sql = "
                          INSERT INTO ext_pts(idPost, idPagina, idTorre, idUsuario, ptsSeguidores, ptsCurtida, ptsComentario, ptsFavoritos, ptsExtras, ptsVisitas, ptsPost, ptsLoja, ptsCompartilha, ptsBonus, ptsExtilos) 
                          VALUES(:idPost, :idPagina, :idTorre, :idUsuario, :ptsSeguidores, :ptsCurtida, :ptsComentario, :ptsFavoritos, :ptsExtras, :ptsVisitas, :ptsPost, :ptsLoja, :ptsCompartilha, :ptsBonus, :ptsExtilos)";
                          $stmt = $PDO->prepare($sql);
                          $stmt->bindParam(':idPost', $idPost);
                          $stmt->bindParam(':idPagina', $idPaginaPts);
                          $stmt->bindParam(':idTorre', $idTorrePts);
                          $stmt->bindParam(':idUsuario', $idUsuario);
                          $stmt->bindParam(':ptsCurtida', $ptsCurtida);
                          $stmt->bindParam(':ptsSeguidores', $ptsSeguidores);
                          $stmt->bindParam(':ptsComentario', $ptsComentario);
                          $stmt->bindParam(':ptsFavoritos', $ptsFavoritos);
                          $stmt->bindParam(':ptsExtras', $ptsExtras);
                          $stmt->bindParam(':ptsVisitas', $ptsVisitas);
                          $stmt->bindParam(':ptsPost', $ptsPost);
                          $stmt->bindParam(':ptsLoja', $ptsLoja);
                          $stmt->bindParam(':ptsCompartilha', $ptsCompartilha);
                          $stmt->bindParam(':ptsBonus', $ptsBonus);
                          $stmt->bindParam(':ptsExtilos', $ptsExtilos);
                          if ($stmt->execute()){
                           // return print_r($stmt->errorInfo());
                          }else{
                            return print_r($stmt->errorInfo());
                          }
                      }
        // Cadastra o relacionamento de Post | Pagina | Torre
                      //$usuarioPagina1 = usuario_pagina($idUsuario);
                      $id_usuario = $idUsuario;
                      $i = 0;
                      //print_r($idPagina);
                      //exit;
                      foreach ($idPagina as $pag) {
                            $paginaTorre = pagina_torre($pag);
                                while ($torre = $paginaTorre->fetch(PDO::FETCH_ASSOC)): 
                                    $idPoste = $ultimo;
                                    $id_usuario = $idUsuario;
                                    $idTor[] = $idPoste.','.$torre['idTorre'].','.$pag.','.$id_usuario.','.$idAlbumBlog[$i].','.$usuEstilo.','.$produto.','.$feminino.','.$masculino;
                                endwhile;
                            $i++;
                            $idPag[] = $idPoste.','.$pag;
                      }
                      $PDO = db_connect();

                       $sql = sprintf( 'INSERT INTO ext_post(id_postagem, id_torre, id_pagina, id_usuario, id_album_blog, id_album_usuario, produto, feminino, masculino) VALUES (%s);' , implode( '),(' , $idTor ) );
                       $stmt = $PDO->prepare($sql);
                       if ($stmt->execute()){
                       }else{
                        $_SESSION['resposta'] = 'alb_erro_cTorre';
                           print_r($stmt->errorInfo());
                           // header('Location: ../album_fotos');
                       // exit;
                       }
                       $sql1 = sprintf( 'INSERT INTO ext_compartilha(id_post, id_pagina) VALUES (%s);' , implode( '),(' , $idPag ) );
                       $stmt1 = $PDO->prepare($sql1);
                       if ($stmt1->execute()){
                       }else{
                        print_r($stmt1->errorInfo());
                        exit;
                        $_SESSION['resposta'] = 'alb_erro_cPagina';
                            header('Location:'.$caminhoAtual);
                       }

        //Cadastro de Produtos
                       if($produto > 0){
                        //print_r($codigoProduto);
                        //exit;
                        //print_r($nomeProduto);
                        //print_r($precoNormal);
                        //print_r($precoDesconto);
                        //print_r($marcaProduto);
                        //print_r($adicionaProduto);
                       $pro = 0;
                      foreach ($codigoProduto as $cod) {
                        $produtos[] = '"'.$ultimo.'"'.','.'"'.$idUsuario.'"'.','.'"'.$cod.'"'.','.'"'.$nomeProduto[$pro].'"'.','.'"'.$precoNormal[$pro].'"'.','.'"'.$precoDesconto[$pro].'"'.','.'"'.$marcaProduto[$pro].'"'.','.'"'.$dinheiro.'"'.','.'"'.$boleto.'"'.','.'"'.$debito.'"'.','.'"'.$credito.'"'.','.'"'.$dataLocal.'"'.','.'"'.$strPro[$pro].'"'.','.'"'.$adicionaProduto[$pro].'"'.','.'"'.$masculino.'"'.','.'"'.$feminino.'"'.','.'"'.$alternativo.'"'.','.'"'.$qtdeDisponivel[$pro].'"';

                        $pro++;
                      }
                      $PDO = db_connect();
                       $sql2 = sprintf( 'INSERT INTO ext_produtos(idAlbum, idUsuario, codigoProduto, nomeProduto, valorNormal, valorDesconto, marcaProduto, dinheiro, boleto, debito, credito, dataProduto, img, infoAdicionais, masculino, feminino, alternativo, qtdeDisponivel) VALUES (%s);' , implode( '),(' , $produtos ) );
                       print_r($sql2);
                       $stmt2 = $PDO->prepare($sql2);
                       if ($stmt2->execute()){
                       }else{
                        $_SESSION['resposta'] = 'alb_erro_Produto';
                           print_r($stmt2->errorInfo());
                           // header('Location: ../album_fotos');
                        exit;
                       }
                     }

        //Cadastro de eComercial no banco de dados com Loop
                        for ($co=1 ; $co<=$qtdeComercial; $co++)
                        {
                          $eCom = $novoComercial[$co];
                          $sqlTag = "INSERT INTO ext_ecom(nomeCom, idUsuario, idAlbum) VALUES(:eCom, :idUsuario, :ultimo)";
                          $stmtTag = $PDO->prepare($sqlTag);
                          $stmtTag->bindParam(':eCom', $eCom);
                          $stmtTag->bindParam(':idUsuario', $idUsuario);
                          $stmtTag->bindParam(':ultimo', $ultimo);
                          if($stmtTag ->execute())
                          {
                          }else{
                            $_SESSION['resposta'] = 'alb_erro_eCom';
                            header('Location:'.$caminhoAtual);
                            exit;
                          }
                        }
        //Cadastro de marcaLoja no banco de dados com Loop
                        for ($lo=1 ; $lo<=$qtdeLoja; $lo++)
                        {
                          $mLoja = $novoLoja[$lo];
                          $sqlTag = "INSERT INTO ext_mloja(nomeLoja, idUsuario, idAlbum) VALUES(:mLoja, :idUsuario, :ultimo)";
                          $stmtTag = $PDO->prepare($sqlTag);
                          $stmtTag->bindParam(':mLoja', $mLoja);
                          $stmtTag->bindParam(':idUsuario', $idUsuario);
                          $stmtTag->bindParam(':ultimo', $ultimo);
                          if($stmtTag ->execute())
                          {
                          }else{
                            $_SESSION['resposta'] = 'alb_erro_mLoja';
                            header('Location:'.$caminhoAtual);
                            exit;
                          }
                        }
        //Cadastro de Hashtag no banco de dados com Loop
                        for ($ha=1 ; $ha<=$qtdePalavras; $ha++)
                        {
                          $hash = $novaHashtag[$ha];
                          $sqlTag = "INSERT INTO ext_tag(nomeTag, idUsuario, idAlbum) VALUES(:hash, :idUsuario, :ultimo)";
                          $stmtTag = $PDO->prepare($sqlTag);
                          $stmtTag->bindParam(':hash', $hash);
                          $stmtTag->bindParam(':idUsuario', $idUsuario);
                          $stmtTag->bindParam(':ultimo', $ultimo);
                          if($stmtTag ->execute())
                          {
                          }else{
                            $_SESSION['resposta'] = 'alb_erro_hash';
                            header('Location:'.$caminhoAtual);
                            exit;
                          }
                        }
        //Cadastro de Arrobas no banco de dados com Loop
                        for ($ar=1 ; $ar<=$qtdeArrobas; $ar++)
                        {
                          $arroba = $novaArroba[$ar];
                          $sqlArr = "INSERT INTO ext_marca(usuMarcado, idUsuario, idAlbum) VALUES(:arroba, :idUsuario, :ultimo)";
                          $stmtArr = $PDO->prepare($sqlArr);
                          $stmtArr->bindParam(':arroba', $arroba);
                          $stmtArr->bindParam(':idUsuario', $idUsuario);
                          $stmtArr->bindParam(':ultimo', $ultimo);

                          if($stmtArr ->execute())
                          {
                          }else{
                            $_SESSION['resposta'] = 'alb_erro_arroba';
                            header('Location:'.$caminhoAtual);
                            exit;
                          }
                        }
                       header('Location: '.$caminhoAtual);
                      }
                      else
                      {
                       $_SESSION['resposta'] = 'alb_erro';
                       echo "Erro ao cadastrar";
                      print_r($stmt->errorInfo());
                       // header('Location: ../foto.php');
                     }
    ?>
