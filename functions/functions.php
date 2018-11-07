<?php 
// FUNÇÕES GERAIS DO SISTEMA

// TRANSTORMA AS PALAVRAS COM @ EM LINKS PARA BUSCA DE USUÁRIOS
    function linkUsuario($textoBanco)
    {
		// criando link das # no descritivo
        preg_match_all ( '/@([\w]+)/' , $textoBanco , $palavra ); //pega as palavras com @
        $palavra = $palavra[0]; //usa apaenas o primeiro indice do resultado
        $arroba = explode("@", $textoBanco); //explode as palavras que começam com @
        $n_palavras = count($arroba); // conta em quantas partes foram divididos
        for ($k=1 ; $k<$n_palavras ; $k++) // loop para cada parte
            {
        $separaPalavras[$k] = preg_split('/ /', $arroba[$k], -1); //sepera as palavras novamente agora separando pelos espaços
        unset($separaPalavras[$k][0]); // elimina a primeira palavra
        $separaPalavras[$k] = implode(' ', $separaPalavras[$k]); //monta o texto novamente com as palavras que sobraram
            }
        for ($p=0 ; $p<=$n_palavras; $p++) //realiza mais um loop para colocar a palavra retirada com um link
            {
        if(isset($palavra[$p])) // se existir palavra 
            {
        $pj= $p+1; //organiza os indices para bater certo com o texto antigo
        $palavra[$p] = ' |<a href="@"><small><i class="fa fa-user"></i></small></a><b>'.$palavra[$p].'</b>'. $separaPalavras[$pj];//inclui a palavra retirada com um link para busca e formatação agradável
            }
            }
        $palavra = $arroba[0] . implode(' ', $palavra);
        // monta novamente o texto 
        // 10 horas trabalhada nesse pedaço tomanocu terminei
       
      return $palavra;
        }
//----------------------------------------------------------------------------------------------------------------------
// TRANSTORMA AS PALAVRAS COM # EM LINKS PARA BUSCA DE HASHTAG
    function linkHashtag($textoBanco)
    {
        
        preg_match_all ( '/#([\w]+)/' , $textoBanco , $palavra );
        $palavra = $palavra[0]; 
        $hashtag = explode("#", $textoBanco);
        $n_palavras = count($hashtag);
        for ($k=1 ; $k<$n_palavras ; $k++)
            {
        $separaPalavras[$k] = preg_split('/ /', $hashtag[$k], -1);
        unset($separaPalavras[$k][0]);
        $separaPalavras[$k] = implode(' ', $separaPalavras[$k]);
            }
        for ($p=0 ; $p<=$n_palavras; $p++)
            {
        if(isset($palavra[$p]))
            {
        $pj= $p+1;
        $palavra[$p] = ' |<a href="#"><small><i class="fa fa-search"></i></small></a><b>'. $palavra[$p] .'</b>'. $separaPalavras[$pj];
            }
            }
        $texto = $hashtag[0] . implode(' ', $palavra);
      return $texto;
        }
// TRANSTORMA AS PALAVRAS COM & PARA CRIAR LINK DE BUSCA DE MARCA
    function linkMarca($textoBanco)
    {
        
        preg_match_all ( '/&([\w]+)/' , $textoBanco , $palavra );
        $palavra = $palavra[0]; 
        $hashtag = explode("&", $textoBanco);
        $n_palavras = count($hashtag);
        for ($k=1 ; $k<$n_palavras ; $k++)
            {
        $separaPalavras[$k] = preg_split('/ /', $hashtag[$k], -1);
        unset($separaPalavras[$k][0]);
        $separaPalavras[$k] = implode(' ', $separaPalavras[$k]);
            }
        for ($p=0 ; $p<=$n_palavras; $p++)
            {
        if(isset($palavra[$p]))
            {
        $pj= $p+1;
        $palavra[$p] = '<a href="#" class="btn btn-info btn-sm"><small><i class="fa fa-tag"></i></small>| '. $palavra[$p] .'</a>'. $separaPalavras[$pj];
            }
            }
        $texto = $hashtag[0] . implode(' ', $palavra);
      return $texto;
        }
// TRANSTORMA AS PALAVRAS COM $ PARA CRIAR LINK DE BUSCA DE LOJA
    function linkLoja($textoBanco)
    {
        
        preg_match_all ( '/:([\w]+)/' , $textoBanco , $palavra );
        $palavra = $palavra[0]; 
        $hashtag = explode(":", $textoBanco);
        $n_palavras = count($hashtag);
        for ($k=1 ; $k<$n_palavras ; $k++)
            {
        $separaPalavras[$k] = preg_split('/ /', $hashtag[$k], -1);
        unset($separaPalavras[$k][0]);
        $separaPalavras[$k] = implode(' ', $separaPalavras[$k]);
            }
        for ($p=0 ; $p<=$n_palavras; $p++)
            {
        if(isset($palavra[$p]))
            {
        $pj= $p+1;
        $palavra[$p] = '<a href="#" class="btn btn-warning btn-sm"><small><i class="fa fa-shopping-cart "></i></small>| '.$palavra[$p] .'</a><br>'. $separaPalavras[$pj];
            }
            }
        $texto = $hashtag[0] . implode(' ', $palavra);
      return $texto;
        }
//----------------------------------------------------------------------------------------------------------------------
// FORMATAR O TAMANHO DO TEXTO PARA SER EXIBIDO DA TELA COM PALAVRAS INTEIRAS.
        function tamanhoTexto($palavra){
            $contaPalavras = explode(" ", $palavra); //explode o texto pelos espaços
            $qtdePalavras = count($contaPalavras); // conta a quantidade de fragmentos
            if ($qtdePalavras < 20) //caso haja mais de 20 pedaços, ele cria uma formatação para ter a opção de (vermais)
                {
            $textoCurto = implode(" ", $contaPalavras); // une novamente a palavra
            $palavraCurta = '';
            $continua = '';
                }
            else
                {
            $textoTela = $contaPalavras[0].' '.$contaPalavras[1].' '.$contaPalavras[2].' '.$contaPalavras[3].' '.$contaPalavras[4].' '.$contaPalavras[5].' '.$contaPalavras[6].' '.$contaPalavras[7].' '.$contaPalavras[8].' '.$contaPalavras[9].' '.$contaPalavras[10].' '.$contaPalavras[11].' '.$contaPalavras[12].' '.$contaPalavras[13].' '.$contaPalavras[14].' '.$contaPalavras[15].' '.$contaPalavras[16].' '.$contaPalavras[17].' '.$contaPalavras[18].' '.$contaPalavras[19].' '.$contaPalavras[20]; // monta uma palavra curta com os 20 primeiros fragmentos
            $textoCurto = '';
            $palavraCurta = $textoTela;
            $continua = implode(" ", $contaPalavras);
            $continua = $continua;
                }
        return array ($textoCurto, $continua, $palavraCurta, $qtdePalavras); //envia para ser montada nas descrições com marcações
        }
//----------------------------------------------------------------------------------------------------------------------
// FORMATAR O TAMANHO DO TEXTO PARA SER EXIBIDO DA TELA QUEBRANDO AS PALAVRAS E ACRESCENTANDO TRÊS PONTOS.
        function palavraCurta($qtde, $string){
           $contaLetras = strlen($string);
            if($contaLetras > $qtde)
                {
                    $contaLetras = mb_strimwidth($string, 0, $qtde).'...';
                }
            else
                {
                    $contaLetras = $string;
                }
            
            return $contaLetras;
        }
//----------------------------------------------------------------------------------------------------------------------
// LIMPAR TEXTO DE ENTRADA ELIMINANDO ALGUNS CARACTERES ESPECIFICOS NO BANCO DE DADOS.
        function sanitizeStringTexto($string) {
            // matriz de entrada
            $what = array( '>','<','[',']','=','*' );

            // matriz de saída
            $by   = array( '_','_','_','_','_','_' );

            // devolver a string
            $retorno = str_replace($what, $by, $string);
            $separaPalavras = preg_split('/ /', $retorno, -1);
            $contaPalavras = count($separaPalavras);
            for ($r=0 ; $r<$contaPalavras ; $r++ ){
                $contaLetras = strlen($separaPalavras[$r]);
                    if($contaLetras > 20){
                        $separaPalavras[$r] = mb_strimwidth($separaPalavras[$r], 0, 20).'...';
                    }
            }
            $retorno = implode(" ", $separaPalavras);
            return $retorno;
        }
//----------------------------------------------------------------------------------------------------------------------
// LIMPAR TEXTO DE ENTRADA ELIMINANDO ALGUNS CARACTERES ESPECIFICOS NO BANCO DE DADOS.
        function sanitizeStringlight($string) {
            // matriz de entrada
            $what = array( 'ä','ã','à','á','â','ê','ë','è','é','ï','ì','í','ö','õ','ò','ó','ô','ü','ù','ú','û','À','Á','É','Í','Ó','Ú','ñ','Ñ','ç','Ç','(',')',';',':','|','!','"','%','/','=','?','~','^','>','<','ª','º','[',']','*','+' );

            // matriz de saída
            $by   = array( 'a','a','a','a','a','e','e','e','i','i','i','o','o','o','o','o','u','u','u','u','A','A','E','I','O','U','n','n','c','C','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_', );

            // devolver a string
            $retorno = str_replace($what, $by, $string);
            $separaPalavras = preg_split('/ /', $retorno, -1);
            $contaPalavras = count($separaPalavras);
            for ($r=0 ; $r<$contaPalavras ; $r++ ){
                $contaLetras = strlen($separaPalavras[$r]);
                    if($contaLetras > 20){
                        $separaPalavras[$r] = mb_strimwidth($separaPalavras[$r], 0, 20).'...';
                    }
            }
            $retorno = implode(" ", $separaPalavras);
            return $retorno;
        }
//----------------------------------------------------------------------------------------------------------------------
// LIMPAR TEXTO DE ENTRADA ELIMINANDO ALGUNS CARACTERES ESPECIFICOS NO BANCO DE DADOS.
        function sanitizeString($string) {

            // matriz de entrada
            $what = array( 'ä','ã','à','á','â','ê','ë','è','é','ï','ì','í','ö','õ','ò','ó','ô','ü','ù','ú','û','À','Á','É','Í','Ó','Ú','ñ','Ñ','ç','Ç',' ','(',')',',',';',':','|','!','"','$','%','&','/','=','?','~','^','>','<','ª','º','#','-','[',']','$','*','+' );

            // matriz de saída
            $by   = array( 'a','a','a','a','a','e','e','e','e','i','i','i','o','o','o','o','o','u','u','u','u','a','a','e','i','o','u','n','n','ç','ç','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_','_', );

            // devolver a string
            $retorno = str_replace($what, $by, $string);
            $retorno = preg_replace('/[[:^print:]]/','a', $retorno);
            return $retorno;
        }
//----------------------------------------------------------------------------------------------------------------------
// LIMPAR TEXTO DE ENTRADA ELIMINANDO ALGUNS CARACTERES ESPECIFICOS NO BANCO DE DADOS.
        function paginacao ($numPaginas, $qtdExibida, $pgAtual, $qtdPaginacao ){
            $numPaginas = ($numPaginas / $qtdExibida)+1;
            $qtdP = intval($qtdPaginacao / 2);
                if (isset($pgAtual)){
                    if ($pgAtual >= ($qtdP + 1)){
                            $pos1 = $pgAtual - $qtdP;
                            $pos2 = $pgAtual + $qtdP;
                                if ($pos2 >= $numPaginas){$pos2 = $numPaginas;}
                    }else{
                            if ($numPaginas > $qtdPaginacao){
                                $pos1 = 1; 
                                $pos2 = $qtdPaginacao;
                            }else{
                                $pos1 = 1;
                                $pos2 = $numPaginas;
                                }
                        }
                }else{
                        if ($numPaginas > $qtdPaginacao){
                            $pos1 = 1;
                            $pos2 = $qtdPaginacao;
                        }else{
                                $pos1 = 1;
                                $pos2 = $numPaginas;
                            }
                    }
            $pos3 = ($numPaginas - 1);
            return array($pos1, $pos2, $pos3);
        }
?>
