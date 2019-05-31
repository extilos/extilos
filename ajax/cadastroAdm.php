<?php
include_once '../conn/init.php';
include_once '../functions/functions.php';
require_once '../functions/conexoes.php';


//CADASTRA UM NOVO ADMINISTRADOR PARA A PÁGINA
if (isset($_POST['codigoAdm'])){
	if($_POST['codigoAdm'] == 1){
		$idUsuario = $_POST['nomeUser'];
		$idPagina = $_POST['idPagina'];
		$post = isset($_POST['post']) ? $_POST['post'] : 0;
		$editar = isset($_POST['editar']) ? $_POST['editar'] : 0;
		$excluir = isset($_POST['excluir']) ? $_POST['excluir'] : 0;
		$cadastro = isset($_POST['cadastro']) ? $_POST['cadastro'] : 0;
		$financeiro = isset($_POST['financeiro']) ? $_POST['financeiro'] : 0;
					$PDO = db_connect();
                      $sql = "INSERT INTO ext_permite(idPagina, idUsuario, pm_post, pm_editar, pm_excluir, pm_cadastro, pm_financeiro) VALUES(:idPagina, :idUsuario, :post, :editar, :excluir, :cadastro, :financeiro)";
                      $stmt = $PDO->prepare($sql);

                      $stmt->bindParam(':idUsuario', $idUsuario);
                      $stmt->bindParam(':idPagina', $idPagina);
                      $stmt->bindParam(':post', $post);
                      $stmt->bindParam(':editar', $editar);
                      $stmt->bindParam(':excluir', $excluir);
                      $stmt->bindParam(':cadastro', $cadastro);
                      $stmt->bindParam(':financeiro', $financeiro);

                      if ($stmt->execute()){
                      	echo '<div class="alert">
        						<button type="button" class="close" data-dismiss="alert">×</button>
          						<p class="text-muted" ><b><font color="0da314">Cadastrado!</b></font></p>
                      <input class="btn btn-sm btn-block btn-success upload" value="Atualizar Página" onclick="return RefreshWindow();"/>
      						</div>';
                      }else{
                        echo 'Ocorreu algum erro!';
                      }

	}
}
//ATUALIZA AS PERMISÕES DO ADMINISTRADOR
if (isset($_POST['tipo'])){
  if($_POST['tipo'] == 'atualiza'){
    $idPermite = $_POST['idPermite'];
    $local = $_POST['local'];
    $liberado = $_POST['liberado'];

    if($local == 'postAdm'){
      $pm = 'pm_post';
      $va = $liberado;
    }
    if($local == 'editarAdm'){
      $pm = 'pm_editar';
      $va = $liberado;
    }
    if($local == 'excluirAdm'){
      $pm = 'pm_excluir';
      $va = $liberado;
    }
    if($local == 'cadastroAdm'){
      $pm = 'pm_cadastro';
      $va = $liberado;
    }
    if($local == 'financeiroAdm'){
      $pm = 'pm_financeiro';
      $va = $liberado;
    }
          $PDO = db_connect();
          //$sql = "UPDATE ext_permite SET(idPagina, idUsuario, pm_post, pm_editar, pm_excluir, pm_cadastro, pm_financeiro) VALUES(:idPagina, :idUsuario, :post, :editar, :excluir, :cadastro, :financeiro) WHERE idPermite = :idPermite ";
                       $sql = "UPDATE ext_permite SET $pm = :va WHERE idPermite = :idPermite";
                      $stmt = $PDO->prepare($sql);
                      $stmt->bindParam(':idPermite', $idPermite);
                      $stmt->bindParam(':va', $va);

                      if ($stmt->execute()){
                        echo $idPermite;
                      }
                      if($stmt->execute() === false){
                echo "<pre>";
               print_r($stmt->errorInfo());
            }

  }
}
?>