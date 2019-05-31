 <div class="box  ">
 	<h3>Login</h3>
 	<?php
 	date_default_timezone_set('America/Sao_Paulo');
 	$_SESSION['retorno'] = $_SERVER["REQUEST_URI"];
 	$hr = date(" H "); //echo $_SESSION['retorno'];
 	if($hr >= 12 && $hr<18) {
 		$resp = "Olá, Boa tarde! <br> Entre com seu email e senha.";}
 		else if ($hr >= 0 && $hr <12 ){
 			$resp = "Olá, Bom dia! <br> Entre com seu email e senha.";}
 			else {
 				$resp = "Olá, Boa noite! <br> Entre com seu email e senha.";}
 				?>
 				<p class="lead"><?php echo "$resp"; ?></p>
 				<hr>

 				<form action="/extilos/ajax/logar.php" method="post" enctype="multipart/form-data">
 					<div class="form-group">
 						<label for="email">Email</label>
 						<input type="text" class="form-control" name="emailUsuario" id="inputEmail">
 					</div>
 					<div class="form-group">
 						<label for="password">Senha</label>
 						<input type="password" class="form-control" name="senhaUsuario" id="inputPassword">
 					</div>
 					<div class="text-center">

 						<input type="submit" name="logar" value="Entrar" class="btn btn-lg btn-block btn-success" onclick="load('load')">

 						<label class="small">Ops! <a href="text.html">Esqueci a senha</a>.</label>
 					</div>
 				</form>
 				<div class="text-center">
 					<a href="cadastro_pessoal" class="btn btn-lg btn-block btn-default btn-secondary">Cadastre-se</a>
 				</div>

 			</div>