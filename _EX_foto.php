<?php
//verifica se usuario está logado para acessar a página
include 'include/valida_acesso.php';
//abre a conexão com banco de dados
require_once 'conn/init.php';
require_once 'functions/conexoes.php';
$PDO = db_connect();
//puxa da session o id do usuario
$idLogado = $_SESSION['idLogado'];
//carrega as informações necessárias do banco para a páginas
$usuarioAlbum = usuario_album($idLogado);
//carrega informações do usuario pelo id
$usuarioDados = busca_usuario($idLogado);
//carrega as informações necessárias do banco para a página
$usuarioPagina = usuario_pagina($idLogado);

$corBotao = 2;

if ($corBotao == 1){
	$corBotao = 'css/style.blue.css';
}else{
	$corBotao = 'css/style.mono.css';
}
include_once 'include/modal.php';
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
    <link href=<?php echo $corBotao ?> rel="stylesheet" id="theme-stylesheet">
    <!-- your stylesheet with modifications -->
    <link href="css/meu.css" rel="stylesheet">
    <link href="css/bootstrap-suggest.css" rel="stylesheet">
    
    <link rel="shortcut icon" href="favicon.png">
</head>

<body>
    <div id="all">
        <div id="content">
            <div class="container box">
            <!-- CONTEÚDO DA PÁGINA -->
            <div class="" id="customer-order">
            <a type="button" class="" data-toggle="modal" data-target="#modal-fotos">
              <i class="pull-right fa fa-align-justify"></i></a>
              <h4>Publicar contúdo</h4>
              <p class="text-muted">Carregue até 5 fotos.</p>
              <?php
              if(isset($_SESSION['resposta'])){
                include_once 'include/resposta.php';
                echo $_SESSION['idLogado'];
            }
            ?>
            <form action="cadastros/upload-fotos.php" method="post" enctype="multipart/form-data">
                <div class='input-wrapper'>
                    <div class="form-group">
                        <label for="subject">Título</label>
                        <input type="text" class="form-control" name="usuTitulo" id="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="marca">Descrição </label>
                        <textarea type="text" class="form-control" name="usuDesc" id="descricao" placeholder="Use também: #hashtag | @pessoas." rows="3"></textarea>
                        <div id="resultadohashPag"></div>
                    </div>
                    <div class="form-group">
                        <label for="subject">O que está vestindo? <small><b>&</b>Marca | <b>$</b>Loja</label></small>
                         <textarea type="text" class="form-control" name="usuMarca" id="marcacao" placeholder="Use: &marcaDoProduto | $nomeDaLoja." rows="3"></textarea>
                    </div>
                    <label for='upload_file' class="upload">Selecionar fotos</label>
                    <input type="file" id="upload_file" name="imagem[]"  multiple size="5" class="upload_file" accept="image/jpeg, image/png, image/jpg,"/>
                    <input id='upload_file1' type='file' value='' />
                    <span id='file-name'></span>
                    <div class="foto" id="qtde_preview"></div>

                    <div id="container"></div>
                    <hr>
                    <?php if(isset($_SESSION['usuProf'])){
                        if($_SESSION['usuProf'] == 'sim'){
                            ?>
                    <div class="form-group">
                     <input data-toggle="collapse" class="btn btn-sm btn-block btn-default" data-parent="#accordion" href="#faq1" value="Adicionar preços e condições">
                     </div>
                    <div id="faq1" class="panel-collapse collapse">
                        <label for="subject">Preço Normal</label>
                        <input type="text" class="form-control" name="precPro" >
                        <label for="subject">Preço com Desconto</label>
                        <input type="text" class="form-control" name="descPro" >
                        <label for="subject">Forma de Pagamento</label>
                        <select class="form-control" name="formaPro">
                        <option value="0">Selecione</option>
                        <option value="1" >Dinheiro</option>
                        <option value="2" >Dinheiro / Débito</option>
                        <option value="3" >Dinheiro / Débito / Crédito</option>
                        <option value="4" >Dinheiro / Débito / Crédito / Boleto</option>
                        <option value="5" >A combinar</option>
                        </select>
                        <label for="subject">Informação complementar</label>
                        <textarea type="text" class="form-control" name="infoPro" id="subject" rows="2" ></textarea>
                    </div>
                    <hr>
                    <?php }
                    } ?>
                    <label class="text-center">Look</label>
                    <div class="switch__container">
                    <p>Masculino</p>
                    <input id="masculino" class="switch switch--shadow" name="masculino" type="checkbox" value="1" >
                    <label for="masculino"></label>
                    </div>
                    <div class="switch__container">
                    <p>Feminino</p>
                    <input id="feminino" class="switch switch--shadow" name="feminino" type="checkbox" value="1" >
                    <label for="feminino"></label>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="name">Qual estilo?</label>
                        <select class="form-control" name="usuEstilo" id="estilo" required>
                            <?php while ($user = $usuarioAlbum->fetch(PDO::FETCH_ASSOC)): //LISTA NOME DOS ALBUNS ?>
                                <?php $nomeAlbum = $user['album']; $idAlbum = $user['idAlbum'];?>
                                <option value="<?php echo $idAlbum ?>"><?php echo $nomeAlbum ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="marca">Publicar em qual blog? </label>
                        <?php while ($pagina = $usuarioPagina->fetch(PDO::FETCH_ASSOC)): //prepara o conteúdo para ser listado ?>
                            <?php   $nomePagina = $pagina['nomePagina']; 
                            $idPagina = $pagina['idPagina'];
                            ?>
                            <div class="form-group">
                                <div class="switch__container">
                                    <p><?php echo $nomePagina ?></p>
                                    <input id="<?php echo $nomePagina ?>" class="switch switch--shadow" name="idPagina[]" type="checkbox" value="<?php echo $idPagina ?>">
                                    <label for="<?php echo $nomePagina ?>"></label>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <div class="form-group">
                        <label for="marca">Publicar na torre? </label>
                        <div class="switch__container">
                            <p>Extilos</p>FAZER LOOP DAS TORRES - ESTA DANDO ERRO NAS POSTAGENS QUE NAO TEM BLOG
                            <input id="torre" class="switch switch--shadow" name="torre" type="checkbox" value="1">
                            <label for="torre"></label>
                        </div>
                        <div class="switch__container">
                            <p><?php echo $usuarioDados['usuCidade']?></p>
                            <input id="torreCidade" class="switch switch--shadow" name="torreCidade" type="checkbox" value="<?php echo $usuarioDados['usuCidade']?>">
                            <label for="torreCidade"></label>
                        </div>
                    </div>
                    <hr>
                    <input type="submit" class="btn btn-lg btn-block btn-primary" name='submit_image' value="PUBLICAR">
                    <hr>
                    <small><font color="cccccc">Obs. Se nesta visualização as fotos estiverem invertidas, elas serão ajustadas quando publicadas.</font></small>
                        <div class="foto" id="image_preview"><font color="cccccc">Nenhuma foto foi selecionada </font></div>


                    </div>
                </div>
              
            </form>
        </div>
        <!-- CONTEÚDO DA PÁGINA -->

    </div>
</div>
</div>

<!-- *** COPYRIGHT END *** -->
</div>
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src="js/waypoints.min.js"></script>
<script src="js/modernizr.js"></script>
<script src="js/bootstrap-hover-dropdown.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/respond.min.js"></script>
<script src="js/jquery.textcomplete.js"></script>
<script src="js/bootstrap-suggest.js"></script>
<script>
    
// verificação de upload de imagem
$("#upload_file").on('change', function () {

  var countFiles = $(this)[0].files.length;

  var imgPath = $(this)[0].value;
  var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
  var image_holder = $("#image_preview");
  image_holder.empty();
            if(countFiles > 5) { // VERIFICA SE É MAIOR DO QUE 5
                alert("Não é permitido enviar mais do que 5 arquivos.");
                $(this).val("");
                return false;
            } else if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
                if (typeof (FileReader) != "undefined") {

                    for (var i = 0; i < countFiles; i++) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                      $(
                        "<img />",{
                        "src": e.target.result,
                        "class": "img-responsive"
                      }).appendTo(image_holder);
                      image_holder.show();
                    }
                    reader.readAsDataURL($(this)[0].files[i]);
                        document.getElementById('qtde_preview').innerHTML = '<p>'+countFiles+' arquivo(s) selecionado(s)</p>';

                    }

                } else {
                    alert("foto não suportada");
                }
            } else {
                alert("Selecione uma foto");
            }
        });
//teste de exibição

//script para fazer consulta de # e @ no banco de dados
            $(document).ready(function(){
                $("#descricao").on('keyup focusout',function(e){
                 if (e.which == 51) {
                    var hashTag = $("#descricao").val();
                    $.ajax({
                        url: 'ajax/buscaTag.php',
                        type: 'POST',
                        data: {marcacao:hashTag},
                        success: function(data)
                        {
                           // $("#resultadohashPag").html(data);
                            var users = JSON.parse(data);
                             var options = {
                                data: users,
                                map: function(user){
                                    return{
                                        value: user.username,
                                        text: '<b>#'+user.username+'</b>'
                                    }
                                }
                             }
                             $("#descricao").suggest({'#': options, '': options})

                        },
                        error: function(){
                            $("#resultadohashPag").html("Erro ao enviar...");
                        }
                    })
                      }
                  }

              );
            

            });

             


//$(document).ready(function(){
//$('#marcacao').textcomplete([
   // { // html
    //    mentions: 'buscaTag.php',
    //    match: /\B@(\w*)$/,
   //     search: function (term, callback) {
    //        callback($.map(this.mentions, function (mention) {
   //             return mention.indexOf(term) === 0 ? mention : null;
    //        }));
   //     },
   //     index: 1,
   //     replace: function (mention) {
   //         return '@' + mention + ' ';
   //     }
 //   }
//]);
// });

</script>

</body>

</html>
