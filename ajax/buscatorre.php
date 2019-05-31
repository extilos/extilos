<?php
ob_start();
session_start();
//verifica se usuario está logado para acessar a página
if(!isset($_SESSION['idLogado']) && (!isset($_POST['emailUsuario']))){
	$_SESSION['resp'] = 'negado';
	header("Location: login.php"); exit;
} 
include_once '../conn/init.php';
include_once '../functions/functions.php';
include_once '../functions/conexoes.php';

$PDO = db_connect();
if(!empty($_POST["keyword"])) {
	$pesquisa = $_POST["keyword"];
	$idPagina = $_POST["idPagina"];
	$pesquisa = sanitizeStringlight($pesquisa);
	$busca = "SELECT * FROM ext_torre WHERE nomeTorre or cidadeTorre LIKE '%$pesquisa%' LIMIT 5 "; //busca no banco de dados se existe a página
	$categoria = $PDO->prepare($busca); //monta os dados
	$categoria->execute();
	if($categoria->fetch(PDO::FETCH_ASSOC) == ""){
		echo 'Não foi encontrada nenhuma torre';
	}else{
		?>

		<div id="respUsuario">
			<table class="table table-hover">
				<tbody>

					<?php 
					
					while ($user = $categoria->fetch(PDO::FETCH_ASSOC)): //prepara o conteúdo para ser listado ?>
					
						<?php 
						if($user>""){
							$nomeTorre = $user['nomeTorre'];
							$cidadeTorre = $user['cidadeTorre'];
							$estadoTorre = $user['estadoTorre'];
							$idTorre = $user['idTorre'];
							$tipoTorre = $user['publicTorre'];
							if($user['setorTorre'] == 1)
								{$setorTorre = 'Vestuário / Acessórios';}
							elseif($user['setorTorre'] == 2)
								{$setorTorre = 'Corpo / Beleza';}
							elseif($user['setorTorre'] == 3)
								{$setorTorre = 'Locais / Fotografia';}
							elseif($user['setorTorre'] == 4)
								{$setorTorre = 'Dicas / Informações';}
							elseif($user['setorTorre'] == 4)
								{$setorTorre = 'Eventos Locais';}else{$setorTorre='Diversos';}

							$consulta = verifica_pg_tr($idPagina, $idTorre);
							if($consulta['retorno'] == "livre"){
								?>
								<tr>
									<td><img src="../imagem/sistema/<?php echo $user['torreImg'] ?>"  alt="" class="img-responsive" style="height: 50px"></td>
									<td><?php echo (palavraCurta(20,$nomeTorre)); ?></td>
									<td><?php echo $estadoTorre; ?></td>
									<td><?php echo $cidadeTorre; ?></td>
									<td><?php echo $setorTorre; ?></td>
								
									<td><a onclick="addTorre('<?php echo $idTorre ?>','<?php echo $idPagina ?>');history.go(0)" class="btn btn-sm btn-block btn-default" id="<?php echo $idTorre ?>">Participar</a></td>
								</tr>
								<?php
							}
						}

					endwhile;
					if($consulta['retorno'] != "livre"){
						echo 'Buscando...';
					}
				}?>
			</tbody>
		</table>
	</div>
</div>
<?php } ?>

