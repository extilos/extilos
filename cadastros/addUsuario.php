<?php
session_start();
require_once '../conn/init.php';

// verifica novamente o captcha antes de mandar para o banco
$captcha = isset($_POST['captcha']) ? $_POST['captcha'] : null;
$captcha = strtoupper($captcha);

if ($_SESSION['captcha'] === $captcha){
	unset($_SESSION['captcha']);
	}else{
		$_SESSION['resposta'] = 'invalido';
		$_SESSION['resposta'] = 'captcha';
		$_SESSION['n'] = $_POST['nomeUsuario'];
		$_SESSION['e'] = $_POST['emailUsuario'];
		unset($_SESSION['captcha']);
		header("Location: ../cadastro_pessoal"); exit;
	}

// pega os dados do formuário
$ip1 = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : null;  //recuperar o IP da internet , exemplo, por um roteador.
$ip2 = isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : null ; //verificar se o usuário está utilizando um proxy ou não.
$ip3 = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : null; //Endereço IP do computador que acessou.

$data = date("Y-m-d");
$captcha = isset($_POST['captcha']) ? $_POST['captcha'] : null;
$usuMarca = '@nick_name('.$captcha.')';
$usuFoto = 'album.jpg';
$primeiroAcesso = '0';
$estadoUsuario = isset($_POST['estadoUsuario']) ? $_POST['estadoUsuario'] : null;
$cidadeUsuario = isset($_POST['cidadeUsuario']) ? $_POST['cidadeUsuario'] : null;
$opSexo = isset($_POST['opSexo']) ? $_POST['opSexo'] : null;
$idUsuBasico = isset($_POST['idUsuBasico']) ? $_POST['idUsuBasico'] : null;
$nomeUsuario = isset($_POST['nomeUsuario']) ? $_POST['nomeUsuario'] : null;
$emailUsuario = isset($_POST['emailUsuario']) ? $_POST['emailUsuario'] : null;
$senhaUsuario = isset($_POST['senhaUsuario']) ? $_POST['senhaUsuario'] : null;
$senhaUsuario = md5($senhaUsuario);
// validação (bem simples, só pra evitar dados vazios)
if (empty($emailUsuario) || empty($senhaUsuario) )
{
	$_SESSION['resposta'] = 'nome_email';
	$_SESSION['n'] = $nomeUsuario;
	$_SESSION['e'] = $emailUsuario;
   	header("Location: ../cadastro_pessoal");
    exit;
}

// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO ext_usuarios(nomeUsuario, emailUsuario, senhaUsuario, ip1, ip2, ip3, ip4, data, captcha, usuMarca, usuFoto, usuEstado, usuCidade, primeiroAcesso, opSexo) VALUES(:nomeUsuario, :emailUsuario, :senhaUsuario, :ip1, :ip2, :ip3, :ip4, :data, :captcha, :usuMarca, :usuFoto, :usuEstado, :usuCidade, :primeiroAcesso, :opSexo)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nomeUsuario', $nomeUsuario);
$stmt->bindParam(':emailUsuario', $emailUsuario);
$stmt->bindParam(':senhaUsuario', $senhaUsuario);

$stmt->bindParam(':ip1', $ip1);
$stmt->bindParam(':ip2', $ip2);
$stmt->bindParam(':ip3', $ip3);
$stmt->bindParam(':ip4', $ip4);
$stmt->bindParam(':data', $data);
$stmt->bindParam(':captcha', $captcha);
$stmt->bindParam(':usuMarca', $usuMarca);
$stmt->bindParam(':usuFoto', $usuFoto);
$stmt->bindParam(':usuEstado', $estadoUsuario);
$stmt->bindParam(':usuCidade', $cidadeUsuario);
$stmt->bindParam(':primeiroAcesso', $primeiroAcesso);
$stmt->bindParam(':opSexo', $opSexo);

if ($stmt->execute())
{
	$_SESSION['e'] = $emailUsuario;
	$_SESSION['resposta'] = 'sucesso';
	$_SESSION['retorno'] = 'painel_usuario';
    header('Location: ../login');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}