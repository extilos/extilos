<?php
ob_start();
session_start();
date_default_timezone_set('America/Sao_Paulo');

include_once '../conn/init.php';
include_once '../functions/functions.php';
include_once '../functions/conexoes.php';


$dataLocal      =       date('d/m/Y');
$codigoProduto  =       isset($_POST['codigoPro'])      ? $_POST['codigoPro']      : null;
$nomeProduto    =       isset($_POST['nomePro'])      ? $_POST['nomePro']      : null;
$precoNormal    =       isset($_POST['precoNormal'])      ? $_POST['precoNormal']      : null;
$precoDesconto  =       isset($_POST['precoDesconto'])      ? $_POST['precoDesconto']      : null;
$marcaProduto   =       isset($_POST['marcaProduto'])      ? $_POST['marcaProduto']      : null;
$adicionaProduto =      isset($_POST['adicionaProduto'])      ? $_POST['adicionaProduto']      : null;

$img =      isset($_POST['adicionaProduto'])      ? $_POST['adicionaProduto']      : null;

$masculino       =       isset($_POST['masculino'])       ? $_POST['masculino']       : '0';
$feminino       =       isset($_POST['feminino'])       ? $_POST['feminino']       : '0';
$alternativo       =       isset($_POST['alternativo'])       ? $_POST['alternativo']       : '0';
$dinheiro       =       isset($_POST['dinheiro'])       ? $_POST['dinheiro']       : '0';
$boleto         =       isset($_POST['boleto'])         ? $_POST['boleto']         : '0';
$debito         =       isset($_POST['debito'])         ? $_POST['debito']         : '0';
$credito        =       isset($_POST['credito'])        ? $_POST['credito']        : '0';

//Cadastro de Produtos
                                         //print_r($codigoProduto);
                        //print_r($nomeProduto);
                        //print_r($precoNormal);
                        //print_r($precoDesconto);
                        //print_r($marcaProduto);
                        //print_r($adicionaProduto);
                       $pro = 0;
                      foreach ($codigoProduto as $cod) {
                        $produtos[] = $ultimo.','.$idUsuario.','.'"'.$cod.'"'.','.'"'.$nomeProduto[$pro].'"'.','.'"'.$precoNormal[$pro].'"'.','.'"'.$precoDesconto[$pro].'"'.','.'"'.$marcaProduto[$pro].'"'.','.$dinheiro.','.$boleto.','.$debito.','.$credito.','.'"'.$dataLocal.'"'.','.'"'.$adicionaProduto[$pro].'"';
                        $pro++;
                      }
                      $PDO = db_connect();
                       $sql2 = sprintf( 'INSERT INTO ext_produtos(idAlbum, idUsuario, codigoProduto, nomeProduto, valorNormal, valorDesconto, marcaProduto, dinheiro, boleto, debito, credito, dataProduto, infoAdicionais) VALUES (%s);' , implode( '),(' , $produtos ) );
                       print_r($sql2);
                       $stmt2 = $PDO->prepare($sql2);
                       if ($stmt2->execute()){
                       }else{
                        $_SESSION['resposta'] = 'alb_erro_Produto';
                           print_r($stmt2->errorInfo());
                           // header('Location: ../album_fotos');
                        exit;
                       }



?>