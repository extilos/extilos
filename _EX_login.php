<?php
require_once 'conn/init.php';
if(isset($_SESSION['idLogado'])){
    if ($_SESSION['idLogado'] > 1){
        $_SESSION['resposta'] = 'negado';
        header("Location: index"); exit;
    }
}
?>

    <div id="hot">
        <div id="content">
            <div class="container-fluid">
                <div class="col-sm-12 box">
                <?php
                if(isset($_SESSION['resposta'])){
                   include_once "include/resposta.php";
               }
               ?>
               <div id="load" style="display: none" >
                  <p><i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Verificando</p>
               </div>
            
                <div class="col-md-8">
                    <?php include 'include/modulos/front/universal/banner-login.php'; ?>
                </div>
               <div class="col-md-4 box">
                <h3>Acesso</h3>
                <?php
                date_default_timezone_set('America/Sao_Paulo');
                $hr = date(" H ");
                if($hr >= 12 && $hr<18) {
                    $resp = "Olá, Boa tarde! <br> Entre com seu email e senha.";}
                    else if ($hr >= 0 && $hr <12 ){
                        $resp = "Olá, Bom dia! <br> Entre com seu email e senha.";}
                        else {
                            $resp = "Olá, Boa noite! <br> Entre com seu email e senha.";}
                            ?>
                            <p class="lead"><?php echo "$resp"; ?></p>
                            <hr>

                            <form action="ajax/logar.php" method="post" enctype="multipart/form-data">
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
                </div>
                </div>
                    <!-- /.container -->
            </div>
                <!-- /.content -->
    </div>
            <!-- /#all -->
    <!-- *** SCRIPTS TO INCLUDE ***
    _________________________________________________________ -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap-hover-dropdown.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/front.js"></script>
    <script type="text/javascript">
        function load(el) {
        var display = document.getElementById(el).style.display;
        if(display == "none")
            document.getElementById(el).style.display = 'block';
        else
            document.getElementById(el).style.display = 'none';
    }
    </script>