<?php
ob_start();
session_start();
include_once '../conn/init.php';
require_once '../functions/conexoes.php';
date_default_timezone_set('America/Sao_Paulo');
$date = date('d-m-Y H:i');
?>

<?php 
//----------------------------------------------------- CARREGA COMENTARIOS ------------------------------------------------
if(isset($_POST['carrega'])){ 
$idUsuario = $_POST['idUsuario'];
$idPost = $_POST['carrega'];
$comentarios = comentarios($idPost,$idUsuario);
?>
<div class="row">
	<div class="col-sm-12">
		<div class="form-group">
			<label for="comment">Comentar <span class="required">*</span>
			</label>
			<textarea class="form-control" id="<?php echo 'comentario'.$idPost ?>" rows="2"></textarea>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12 text-right">
		<button class="btn btn-primary" onclick="
		comentarPost('<?php echo $idPost ?>', '<?php echo $idUsuario ?>'); 
		pontos('COMENTARIO','<?php echo $idPost ?>','<?php echo $idUsuario ?>','<?php echo $tokenDia ?>','<?php echo $idTorre ?>')" id="btnComent")><i class="fa fa-comment-o"></i> Postar</button>
	</div>
</div>
<div id="<?php echo 'postagem'.$idPost ?>"></div> <!-- RETORNO DO PRIMEIRO COMENTARIO -->

<?php
while ($postagens = $comentarios->fetch(PDO::FETCH_ASSOC)):
?>
<div class="row comment">
	<div class="col-xs-3 col-md-2 text-center-xs">
		<p>
			<img src="img/blog-avatar2.jpg" class="img-responsive img-circle" alt="">
		</p>
	</div>
	<div class="col-sm-9 col-md-10">
		<h5>Julie Alma <small class="posted" id=""><i class="fa fa-clock-o"></i> <?php echo $postagens['data'] ?></small></h5>
		<div class="col-sm-12" id="<?php echo 'atualiza'.$postagens['idPost'].$postagens['idComentario'] ?>"> <!-- TROCA O COMENTÁRIO DO BANCO PELO ATUALIZADO -->
		<p><?php echo $postagens['comentario'] ?>.</p> <!-- CARREGA COMENTÁRIO DO BANCO DE DADOS -->
		</div><!-- RETORNO DA ATUALIZAÇÃO DO COMENTARIO -->

		<div class="col-sm-12 text-right">
			<div id="<?php echo 'acao'.$postagens['idPost'].$postagens['idComentario'] ?>" style="display:block"> <!-- BOTÃO DE REQUISIÇÃO -->
				<p class="reply">
					<a class="btn btn-default" onclick="Mudarestado('<?php echo 're'.$postagens['idPost'].$postagens['idComentario'] ?>'); Mudarestado1('<?php echo 'acao'.$postagens['idPost'].$postagens['idComentario'] ?>')">
						<i class="fa fa-pencil"></i>Editar
					</a>
					<a class="btn btn-default" onclick="excluirComentario('<?php echo $postagens['idPost'] ?>','<?php echo $postagens['idComentario'] ?>','<?php echo $postagens['idUsuario'] ?>')">
						<i class="fa fa-times-circle"></i>Excluir
					</a>
				</p>
			</div>
		</div>
		<div id="<?php echo 're'.$postagens['idPost'].$postagens['idComentario'] ?>" style="display:none"><!-- RESPOSTA DA REQUISIÇÃO -->
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						<textarea class="form-control" id="<?php echo 'textResp'.$postagens['idPost'].$postagens['idComentario'] ?>"><?php echo $postagens['comentario'] ?></textarea>
					</div>
				</div>
			</div>
			<div class="col-sm-12 text-right">
				<button class="btn btn-default" onclick="Mudarestado('<?php echo 'acao'.$postagens['idPost'].$postagens['idComentario'] ?>') ; Mudarestado1('<?php echo 're'.$postagens['idPost'].$postagens['idComentario'] ?>' )" id="btnComent")></i> Cancelar</button>

				<button class="btn btn-success" 
				onclick="atualizarPost('<?php echo $postagens['idPost'] ?>','<?php echo $postagens['idComentario'] ?>','<?php echo $postagens['idUsuario'] ?>') ; 
							Mudarestado('<?php echo 'acao'.$postagens['idPost'].$postagens['idComentario'] ?>') ; 
							Mudarestado1('<?php echo 're'.$postagens['idPost'].$postagens['idComentario'] ?>' )" 
				id="btnComent")><i class="fa fa-refresh"></i> Atualizar</button>
			</div>
			<hr>
		</div>
		
	</div>
</div>

<?php
	endwhile;
 } ?>


<?php
//----------------------------------------------------- PRIMEIRO COMENTARIO ------------------------------------------------
if(isset($_POST['comment'])){
	$idUsuario = $_POST['idUsuario'];
	$idPost = $_POST['idPost'];
	$comentario = $_POST['comment'];
	$data = $date;
	$respUsu = 1;
	$respPost = 0;

	$PDO = db_connect();
	$sql = "INSERT INTO ext_comentario(idUsuario, idPost, comentario, data, respUsu, respPost) VALUES(:idUsuario, :idPost, :comentario, :data, :respUsu, :respPost)";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':idUsuario', $idUsuario);
	$stmt->bindParam(':idPost', $idPost);
	$stmt->bindParam(':comentario', $comentario);
	$stmt->bindParam(':data', $data);
	$stmt->bindParam(':respUsu', $respUsu);
	$stmt->bindParam(':respPost', $respPost);


	if ($stmt->execute())
	{
		// Consulta para saber o ultimo post do usuário, para recuperar o valor de IDdo Post
                        $sqlConsulta = "SELECT MAX(idComentario) as ultimo FROM ext_comentario where idUsuario = $idUsuario";
                        $sqlExecuta = $PDO->prepare($sqlConsulta);
                        $sqlExecuta -> execute();
                        $ultimoNum = $sqlExecuta -> fetch(PDO::FETCH_ASSOC);
                        $ultimo = $ultimoNum['ultimo'];
		?>
		<div class="row comment">
			<div class="col-xs-3 col-md-2 text-center-xs">
				<p><img src="img/blog-avatar2.jpg" class="img-responsive img-circle" alt=""></p>
			</div>
			<div class="col-sm-9 col-md-10">
				<h5>Julie Alma<small class="posted" id=""><i class="fa fa-clock-o"></i> <?php echo $date ?></small></h5>
				<div class="col-sm-12" id="<?php echo 'atualiza'.$idPost.$ultimo ?>">
				<p><?php echo $_POST['comment']; ?></p>
				</div>
				<div id="<?php echo 'retorno'.$idPost.$ultimo ?>"></div><!-- RETORNO DA RESPOSTA DO COMENTARIO -->
				<div class="col-sm-12 text-right">
					<div class="col-sm-12 text-right">
						<div id="<?php echo 'acao'.$idPost.$ultimo ?>" style="display:block"> <!-- BOTÃO DE REQUISIÇÃO -->
							<p class="reply">
								<a class="btn btn-default" onclick="Mudarestado('<?php echo 'resposta'.$idPost.$ultimo ?>'); Mudarestado1('<?php echo 'acao'.$idPost.$ultimo ?>')">
									<i class="fa fa-pencil"></i>Editar
								</a>
								<a class="btn btn-default" onclick="excluirComentario('<?php echo $idPost ?>','<?php echo $ultimo ?>','<?php echo $idUsuario ?>')">
									<i class="fa fa-times-circle"></i>Excluir
								</a>
							</p>
						</div>
					</div>
					<div id="<?php echo 'resposta'.$idPost.$ultimo ?>" style="display:none">
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<textarea class="form-control" id="<?php echo 'textResp'.$idPost.$ultimo ?>"><?php echo $_POST['comment']; ?></textarea>
								</div>
							</div>
						</div>
						<div class="col-sm-12 text-right">
							<button class="btn btn-default" onclick="Mudarestado('<?php echo 'acao'.$idPost.$ultimo ?>') ; Mudarestado1('<?php echo 'resposta'.$idPost.$ultimo ?>' )" id="btnComent")> Cancelar</button>

							<button class="btn btn-primary" 
							onclick="atualizarPost('<?php echo $idPost ?>','<?php echo $ultimo ?>','<?php echo $idUsuario ?>') ; Mudarestado('<?php echo 'acao'.$idPost.$ultimo ?>') ; 
								Mudarestado1('<?php echo 'resposta'.$idPost.$ultimo ?>' )" 
							id="btnComent")><i class="fa fa-refresh"></i> Atualizar</button>
						</div>
						<hr>
					</div>
				</div>
				
			</div>
		</div>
		<?php
	}
	else
	{
		echo "Erro ao cadastrar";
		print_r($stmt->errorInfo());
	}
}
?>

<?php
//----------------------------------------------------- RESPOSTA DA PERGUNTA ------------------------------------------------
if(isset($_POST['atualiza'])){
	$idComentario = $_POST['idComentario'];
	$idUsuario = $_POST['idUsuario'];
	$idPost = $_POST['idPost'];
	$comentario = $_POST['atualiza'];
	$data = $date.'-Atualizado';
	$respUsu = 1;
	$respPost = 0;

	$PDO = db_connect();
	$sql = "UPDATE ext_comentario SET idUsuario = :idUsuario, idPost = :idPost, comentario = :comentario, data = :data, respUsu = :respUsu, respPost = :respPost WHERE idComentario = :idComentario";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':idComentario', $idComentario);
	$stmt->bindParam(':idUsuario', $idUsuario);
	$stmt->bindParam(':idPost', $idPost);
	$stmt->bindParam(':comentario', $comentario);
	$stmt->bindParam(':data', $data);
	$stmt->bindParam(':respUsu', $respUsu);
	$stmt->bindParam(':respPost', $respPost);
	if ($stmt->execute()){
	?>
	<div class="row comment">
		<div class="col-sm-9 col-md-10">
			<h5>Julie Alma <small class="posted" id=""><i class="fa fa-clock-o"></i> <?php echo $date ?> - Atualizado</small></h5>
			<p><?php echo $_POST['atualiza']; ?></p>
		</div>
	</div>
	<?php 
}else
	{
		echo "Erro ao cadastrar";
		print_r($stmt->errorInfo());
	}
}
//----------------------------------------------------- EXCLUIR COMENTARIO ------------------------------------------------
if(isset($_POST['excluir'])){
	$idComentario = $_POST['idComentario'];
	$idUsuario = $_POST['idUsuario'];
	$idPost = $_POST['idPost'];

	$PDO = db_connect();
	$sql = "DELETE FROM ext_comentario WHERE idComentario = :idComentario";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':idComentario', $idComentario);
	if ($stmt->execute()){
		echo 'excluido com sucesso!';
}else
	{
		echo "Erro ao tentar excluir";
		//print_r($stmt->errorInfo());
	}
}
?>
