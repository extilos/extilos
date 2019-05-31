<?php
ob_start();
session_start();
require_once '../conn/init.php';
require_once '../functions/functions.php';
$retorno = isset($_SESSION['retorno']) ? $_SESSION['retorno'] : 'index';
        if(isset($_POST['logar'])){
                    $email_limpo = sanitizeStringTexto($_POST['emailUsuario']);
                    $emailUsuario = trim(strip_tags( $email_limpo));
                    $senhaUsuario = trim(strip_tags( $_POST['senhaUsuario']));
                    $senhaUsuario = md5($senhaUsuario);
                    $PDO = db_connect();

                    $select = "SELECT * FROM ext_usuarios WHERE emailUsuario = '$emailUsuario' AND senhaUsuario = '$senhaUsuario'";
                try{    
                    $stmt_count = $PDO->prepare($select);
                    $stmt_count->bindParam(':emailUsuario', $nomeUsuario, PDO::PARAM_STR);
                    $stmt_count->bindParam(':senhaUsuario', $senhaUsuario, PDO::PARAM_STR);
                    $stmt_count->execute();
                    $user = $stmt_count->fetch(PDO::FETCH_ASSOC);
                    $contar = $stmt_count->rowCount();
                    if ($contar>0){
                        $emailUsuario = $_POST['emailUsuario'];
                        $senhaUsuario = $_POST['senhaUsuario'];
                        $idlog = $user['idUsuario'];
                        $nomelog = $user['nomeUsuario'];
                        $arroba = $user['usuMarca'];
                        $usuProf = $user['usuProf'];

                        $_SESSION['usuarioLogado'] ='';
                        $_SESSION['senhaLogado'] = '';
                        $_SESSION['idLogado'] = '';
                        $_SESSION['nomeLogado'] = '';
                        $_SESSION['arroba'] = '';
                        $_SESSION['usuProf'] = '';

                        $_SESSION['usuarioLogado'] = $emailUsuario;
                        $_SESSION['senhaLogado'] = $senhaUsuario;
                        $_SESSION['idLogado'] = $idlog;
                        $_SESSION['nomeLogado'] = $nomelog;
                        $_SESSION['arroba'] = $arroba;
                        $_SESSION['usuProf'] = $usuProf;
                        $_SESSION['resposta'] = 'libera_entrada';
                            sleep(2);
                            header("Location:".$retorno);

                    }else{
                            
                            $_SESSION['resposta'] = 'login_invalido';
                            sleep(2);
                            header("Location: ../login");
                        }
                }catch(PDOExeception $e){
                            echo $e;
                        }
        }

         if(isset($_POST['gerencia'])){
                    $email_limpo = sanitizeStringTexto($_POST['emailUsuario']);
                    $emailUsuario = trim(strip_tags( $email_limpo));
                    $senhaUsuario = trim(strip_tags( $_POST['senhaUsuario']));
                    //$senhaUsuario = md5($senhaUsuario);
                    $PDO = db_connect();

                    $select = "SELECT * FROM ext_ger WHERE emailGerente = '$emailUsuario' AND senhaGerente = '$senhaUsuario'";
                try{    
                    $stmt_count = $PDO->prepare($select);
                    $stmt_count->bindParam(':emailUsuario', $nomeUsuario, PDO::PARAM_STR);
                    $stmt_count->bindParam(':senhaUsuario', $senhaUsuario, PDO::PARAM_STR);
                    $stmt_count->execute();
                    $user = $stmt_count->fetch(PDO::FETCH_ASSOC);
                    $contar = $stmt_count->rowCount();
                    if ($contar>0){ 
                        $emailUsuario = $_POST['emailUsuario'];
                        $senhaUsuario = $_POST['senhaUsuario'];
                        $idlog = $user['idUsuario'];
                        $nomelog = $user['nomeUsuario'];
                        $arroba = $user['usuMarca'];
                        $usuProf = $user['usuProf'];

                        $_SESSION['usuarioLogado'] ='';
                        $_SESSION['senhaLogado'] = '';
                        $_SESSION['idGerente'] = '';
                        $_SESSION['nomeLogado'] = '';
                        $_SESSION['arroba'] = '';
                        $_SESSION['usuProf'] = '';

                        $_SESSION['usuarioLogado'] = $emailUsuario;
                        $_SESSION['senhaLogado'] = $senhaUsuario;
                        $_SESSION['idGerente'] = $idlog;
                        $_SESSION['nomeLogado'] = $nomelog;
                        $_SESSION['arroba'] = $arroba;
                        $_SESSION['usuProf'] = $usuProf;
                        $_SESSION['resposta'] = 'libera_entrada';
                            sleep(2);
                            header("Location: ../painel_gerenciador");

                    }else{
                            
                            $_SESSION['resposta'] = 'login_invalido';
                            sleep(2);
                            header("Location: ../gerenciamento");
                        }
                }catch(PDOExeception $e){
                            echo $e;
                        }
        }
        
    ?>