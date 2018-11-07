<?php
session_start();
require_once '../conn/init.php';

$nickName = isset($_POST['nickName']) ? $_POST['nickName'] : null;
$usuEstado = isset($_POST['estado']) ? $_POST['estado'] : null;
$usuCidade = isset($_POST['cidade']) ? $_POST['cidade'] : null;
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
   	header("Location: ../register.php");
    exit;
}

//ATUALIZA A CAPA DA EMPRESA
if(isset($_FILES['files'])){
	//$idUsuario = $_SESSION['idLogado'];
	$idPagina = $_POST['idPagina'];
	$name = $_FILES['files']['name'][0];
	$tmp_name = $_FILES['files']['tmp_name'][0]; //Atribui uma array com os nomes temporários dos arquivos à variável
    $allowedExts = array(".gif", ".jpeg", ".jpg", ".png", ".bmp"); //Extensões permitidas
    $temp = '../imagem/capa/temp/';
    $grande = '../imagem/capa/grande/';
    $media = '../imagem/capa/media/';
    $mini = '../imagem/capa/mini/';
    $ext = strtolower(substr($name,-4));
    if ($ext == 'jpeg'){
        $ext = ".jpeg";
       }
    if ($_FILES['files']['size'][0] > 0 )
          	{
           	$new_name = date("YmdHis") .uniqid(). $ext;
           	$exif = @exif_read_data($tmp_name);
           	$orientation = (isset($exif['Orientation'])) ? $exif['Orientation'] : null;
        	$image = WideImage::load($tmp_name); //Carrega a imagem utilizando a WideImage
            if($orientation == 6){
              $image = $image->rotate(90,0);
            }
            if($orientation == 3){
              $image = $image->rotate(180,0);
            }
            if($orientation == 8){
              $image = $image->rotate(270,0);
            }
            $pgCapa = $new_name;
			$PDO = db_connect();
        	$sql = "UPDATE ext_paginas SET pgCapa = :pgCapa WHERE idPagina = :idPagina";
        	$stmt = $PDO->prepare($sql);
        	$stmt->bindParam(':pgCapa', $pgCapa);
        	$stmt->bindParam(':idPagina', $idPagina);

        	if ($stmt->execute()){ //se salvar no banco, gravar as imagens nas pastas
            
            //IMAGEM GRANDE
            $fundoG = $image->crop("center","middle",1200,500);
            $fundoG = $fundoG->addNoise('50', 'color');
        	$imageG = $image->resize(1200, 500, 'inside'); //Redimensiona a imagem para 170 de largura e 180 de altura
        	$imageG = $fundoG->merge($imageG,"center","middle");
        	//$imageG = $image->crop("center","center",1200,500);
        	$imageG->saveToFile($grande.$new_name); //Salva a imagem
            //IMAGEM MÉDIA
            $fundoM = $image->crop("center","middle",600,250);
            $fundoM = $fundoM->addNoise('50', 'color');
            $imageM = $image->resize(600, 350, 'inside'); //Redimensiona a imagem 
            $imageM = $fundoM->merge($imageM,"center","middle");
            //$imageM = $image->crop('center', 'center', 400, 250); //Corta a imagem do centro, forçando sua altura e largura
            $imageM->saveToFile($media.$new_name); //Salva a imagem

            echo '<div class="alert">
    			<button type="button" class="close" data-dismiss="alert">×</button>
          		<p class="text-muted" ><b><font color="0da314">Atualizado!</b></font></p>
      			</div>';
        	}
       		}
       		

    }

// insere no banco
$PDO = db_connect();
$sql = "INSERT INTO ext_usuarios(nomeUsuario, emailUsuario, senhaUsuario, ip1, ip2, ip3, ip4, data, captcha, usuMarca) VALUES(:nomeUsuario, :emailUsuario, :senhaUsuario, :ip1, :ip2, :ip3, :ip4, :data, :captcha, :usuMarca)";
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

if ($stmt->execute())
{
	$_SESSION['e'] = $emailUsuario;
	$_SESSION['resposta'] = 'sucesso';
    header('Location: ../login.php');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}