<?php
require_once 'conn/init.php';
if(isset($_SESSION['idLogado'])){
    header("Location: painel_usuario"); exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head> 
    <meta charset="utf-8">
    <meta name="robots" content="all,follow,extilos,moda">
    <meta name="googlebot" content="index,follow,snippet,archive,moda,extilos">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Extilos - Mostre a sua moda">
    <meta name="author" content="APP Extilos | vempublicar.com">
    <meta name="keywords" content="">
    <title>
        eXtilos | Painel
    </title>
    <meta name="keywords" content="">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>
    <!-- styles -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">
    <!-- theme stylesheet -->
    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">
    <!-- your stylesheet with modifications -->
    <link href="css/meu.css" rel="stylesheet">
    <script src="js/respond.min.js"></script>
    <link rel="shortcut icon" href="favicon.png">
</head>
<body>
    <!-- *** TOPBAR ***
    _________________________________________________________ -->

    <div id="hot">
     <?php include 'include/barra-superior.php';?>
     <div id="content">
        <div class="container">
            <div class="col-sm-12 box">
                <div class="col-sm-6">
                    <h3>Inscreva-se | <small>Cadastro Pessoal</small></h3>
                    <p class="lead">Siga, curta, faça a sua moda, mostre o seu <font face="segoe Print">e<b>X</b>tilo's.</font> </p>
                    <?php
                        //retorna o que foi preenchido caso ocorra algum erro no cadastro
                    if(isset($_SESSION['resposta'])){
                        if ($_SESSION['resposta'] != 'captcha'){
                            include_once 'include/resposta.php';
                        }
                    }
                    if(isset($_SESSION['n'])){

                        $nome = $_SESSION['n'];
                        unset($_SESSION['n']);
                    }else{
                        $nome = null;
                    }
                    if(isset($_SESSION['e']))
                    {
                        $email = $_SESSION['e'];
                        unset($_SESSION['e']);
                    }else{
                        $email = null;
                    }
                    ?>
                    <hr>
                    <div class="card">
                        <div class="card-block p-3">
                            <!--Title-->
                            <h3 class="text-center font-up font-bold indigo-text py-2 mb-3"><strong>Veja como funciona</strong></h3>

                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/vlDzYIIOYmM" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
                    
                        <div class="col-sm-6 box">
                        <h3><small>Preencha os campos abaixo para realizar o seu cadastro.</small></h3>
                        <form action="cadastros/addUsuario.php" method="post">
                            <div class="col-sm-12">
                                <div class ="form-group">
                                    <label for="estado">Estado - UF</label>
                                    <select name="estadoUsuario" id="estados" class="form-control" required>
                                        <option value=""></option>
                                    </select>
                                    <label for="cidade">Cidade</label>
                                    <select name="cidadeUsuario" id="cidades" class="form-control" required>
                                        <option value=""></option>
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <label for="sexo">Visualizar conteúdo para o sexo:</label>
                                </div>
                                        <div class="form-check col-sm-3" required>
                                            <label>
                                                <input type="radio" value="1" name="opSexo" checked> <span class="label-text">Feminino</span>
                                            </label>
                                        </div>
                                        <div class="form-check col-sm-3">
                                            <label>
                                                <input type="radio" value="2" name="opSexo"> <span class="label-text">Masculino</span>
                                            </label>
                                        </div>
                                        <div class="form-check col-sm-5">
                                            <label>
                                                <input type="radio" value="3" name="opSexo"> <span class="label-text">Diversificado</span>
                                            </label>
                                        </div>
                                
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name">Nome</label>
                                    <input type="text" class="form-control" name="nomeUsuario" id="nomeUsuario" value="<?php echo $nome ?>">
                                     <div id="resultado">Email</div> <!-- RESPONDE CASO O EMAIL NÃO FOR VÁLIDO  -->
                                     <input type="email" class="form-control" name="" id="informaemail" value="<?php echo $email ?>">
                                     <input type="hidden" id="emailUsuario" name="emailUsuario" value="<?php echo $email ?>">
                                        <label for="password">Senha</label>
                                        <input type="password" class="form-control" name="senhaUsuario" id="password">
                                        <label for="password">Repita a senha</label>
                                        <input type="password" class="form-control" name="" id="confirm_password">
                                        <hr>
                                        <div class="col-sm-6">
                                        <div id="captchaResultado">Digite o código exibido </div> <!-- RESPONDE CASO O CAPTCHA NÃO FOR VÁLIDO  -->
                                        <input class="form-control" type="text" name="captcha" id="captcha" required>
                                        </div>
                                        <div class="col-sm-6">
                                        <img class="img-responsive" src="include/captcha.php" alt="captcha">
                                        </div>
                                        <label class="small">Ao se cadastrar estará concordando com os <a href="text.html">Termos de uso</a> do site.</label>
                                        <div class="text-center">
                                            <button type="submit" id="cadastroLogin" disabled="true" class="btn btn-lg btn-block btn-primary"> Cadastrar</button>
                                        </div>
                                </div>
                            </div>
                        </form>
                        </div>
            </div>
        </div>
    <!-- /.container -->
    </div>

<div id="copyright">
    <div class="container">
        <div class="col-md-12">
            <p class="pull-left">© 2018 eXtilos.com</p>
        </div>

    </div>
</div>
<!-- *** COPYRIGHT END *** -->
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
    <script src="script/script-geral.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
                //faz verificação de página no banco de dados
                $("#informaemail").on('keyup focusout',function(){
                    var url = $("#informaemail").val();

                    $.ajax({
                        url: 'ajax/buscalogin.php',
                        type: 'POST',
                        data: {urlParaMontar:url},
                        beforeSend: function(){
                            $("#resultado").html("");
                        },
                        success: function(data)
                        {
                            $("#resultado").html(data);

                        },
                        error: function(){
                            $("#resultado").html("Erro ao enviar...");
                        }
                    })
                });

            });
        </script>
        <script type="text/javascript">
         $(document).ready(function(){
                //faz verificação de página no banco de dados
                $("#captcha").on('keyup focusout',function(){
                    var url = $("#captcha").val();

                    $.ajax({
                        url: 'include/captcha.php',
                        type: 'POST',
                        data: {captcha:url},
                        beforeSend: function(){
                            $("#captchaResultado").html("");
                        },
                        success: function(data)
                        {
                            $("#captchaResultado").html(data);

                        },
                        error: function(){
                            $("#captchaResultado").html("Erro ao enviar...");
                        }
                    })
                });

            });
        </script>
        <script type="text/javascript">
            var password = document.getElementById("password")
            , confirm_password = document.getElementById("confirm_password");

            function validatePassword(){
                if(password.value != confirm_password.value) {
                    confirm_password.setCustomValidity("Senhas diferentes!");
                } else {
                    confirm_password.setCustomValidity('');
                }
            }
            password.onchange = validatePassword;
            confirm_password.onkeyup = validatePassword;
        </script>

    </body>
    </html>
