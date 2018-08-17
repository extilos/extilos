<?php
ob_start();
session_start();
//VERIFICA SE USUÁRIO TEM ACESSO A PÁGINA
if(!isset($_SESSION['idLogado']) && (!isset($_POST['emailUsuario']))){
 $_SESSION['respesposta'] = 'negado';
 header("Location: login.php"); exit;
}

//INCLUI AS FUNÇÕES NECESSÁRIAS
include_once 'functions/validar.php';
include_once 'functions/functions.php';
include_once 'functions/conexoes.php';
include_once 'include/modal.php';
include_once 'cadastros/caracteres-especiais.php';
$idUsuario = $_SESSION['idLogado']; // puxa da sessão o usuário logado
$usuario = busca_usuario($idUsuario); //retorna os dados do usuário que esta acessando a página
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
  <link href="css/custom.css" rel="stylesheet">
  <script src="js/respond.min.js"></script>
  <link rel="shortcut icon" href="favicon.png">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">


</head>

<body>
  <div id="all">
    <div id="content">
      <div class="container box ">
        <div class="" id="customer-order">
          <a type="button" class="" data-toggle="modal" data-target="#modal-fotos">
            <i class="pull-right fa fa-align-justify"></i></a>
            <h4>Complemento Cadastro</h4>
            <!-- CARD DE EXIBIÇÃO -->
            <hr>
          </div>
          <div class='input-wrapper'>
           <form action="cadastros/addUsuarioComp.php" method="post" enctype="multipart/form-data">
            <div class="panel panel-default sidebar-menu">
              <div class="panel-heading">
                <h4>Olá, <b><?php echo $usuario['nomeUsuario'] ?></b></h4>
                <p><?php echo $usuario['emailUsuario'] ?></p>
                <small>Vamos completar algumas informações em seu cadastro, para uma melhor experiência no extilos.</small>
                <input type="hidden" name="idPagina" id="idPagina" value="<?php echo $idPagina ?>">
              </div>
              <div class="container-full">
                <div class="col-sm-6">
                  <div class="form-group" >
                    <h5 for="apresenta">Nome de Usuario</h5>
                    <input type="text" class="form-control" id="nickName" value="<?php echo $usuario['usuMarca'] ?>" required>
                    <small>Escolha um nome único de usuário.</small>
                    <div id="respUsuario"></div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="col-sm-6">
              <h5 for="apresenta">Capa</h5>
              <div class="container-full">
                <div id="fotoCapa">
                  <img src="imagem/capa/media/<?php echo $usuario['usuFoto'] ?>" class="img-responsive" >
                </div>
                <label for='upload_file' class="btn btn-sm btn-block btn-default">Alterar foto</label>
                <input type="file" id="upload_file" name="imagem" multiple class="upload_file" accept="image/jpeg, image/png, image/jpg,"/>
                <input id='upload_file' type='file' value='' />
                <span id='file-name'></span>
                <div class="col-sm-12 text-center torre">
                  <div id="fotoCarrega"></div>
                </div>
              </div>
              </div>
              <hr>
              <div class="col-sm-6">
                <h5 for="apresenta">Localidade</h5>
                <div class ="form-group">
                  <label for="estado">Estado</label>
                  <select name="estadoUsuario" id="estados" class="form-control" required>
                    <option value=""></option>
                  </select>
                </div>
                <div class ="form-group">
                  <label for="cidade">Cidade</label>
                  <select name="cidadeUsuario" id="cidades" class="form-control" required>
                    <option value=""></option>
                  </select>
                </div>
                <hr>
                <label for="marca">Escolha suas preferências básicas: </label>
                <div class="form-group">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="feminino" value="feminino">Look Feminino
                    </label>
                    <label>
                      <input type="checkbox" name="masculino" value="masculino">Look Masculino
                    </label>
                    <label>
                      <input type="checkbox" name="roupas" value="roupas">Roupas
                    </label>
                    <label>
                      <input type="checkbox" name="calcados" value="calcados">Calçados
                    </label>
                    <label>
                      <input type="checkbox" name="cabelo" value="cabelo">Cabelo
                    </label>
                    <label>
                      <input type="checkbox" name="maquiagem" value="maquiagem">Maquiagem
                    </label>
                    <label>
                      <input type="checkbox" name="barbearia" value="barbearia">Barbearia
                    </label>
                    <label>
                      <input type="checkbox" name="acessorio" value="acessorio">Acessórios
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="marca">Publicar suas postagens na torre Global? </label>
                  <div class="switch__container">
                    <input id="global" class="switch switch--shadow" name="global" type="checkbox" value="1" >
                    <label for="global"></label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="marca">Participar de Ranking das Torres? </label>
                  <div class="switch__container">
                    <input id="torres" class="switch switch--shadow" name="torres" type="checkbox" value="1" >
                    <label for="torres"></label>
                  </div>
                </div> 
              </div>
               <div class="col-sm-12 text-center torre">
                    <input type="submit" class="btn btn-sm btn-block upload" id="complementoCadastro" value="Cadastrar">
                  </div>
            </div>
          </form>
        </div>
        <!-- END CONTAINER -->
      </div>
      <!-- END CONTENT -->
      <!-- RODAPÉ -->
    </div>
  </div>

  <script src="js/jquery-1.11.0.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.cookie.js"></script>
  <script src="js/waypoints.min.js"></script>
  <script src="js/modernizr.js"></script>
  <script src="js/bootstrap-hover-dropdown.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/front.js"></script>
<script type="text/javascript">
         $(document).ready(function(){
                //VERIFICA SE EXISTE NOME REPETIDO NO BANCO DE DADOS
                $("#nickName").on('keyup focusout',function(){
                    var nickName = $("#nickName").val();
                    $.ajax({
                        url: 'functions/consulta-usuario.php',
                        type: 'POST',
                        data: {nickName:nickName},
                        beforeSend: function(){
                            $("#respUsuario").html("Carregando...");
                        },
                        success: function(data)
                        {
                            $("#respUsuario").html(data);
                        },
                        error: function(){
                            $("#respUsuario").html("Erro ao enviar...");
                        }
                    })
                });
            });
    </script>
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
              //document.getElementById('qtde_preview').innerHTML = '<p>'+countFiles+' arquivo(s) selecionado(s)</p>';
            }

          } else {
            alert("foto não suportada");
          }
        } else {
          alert("Selecione uma foto");
        }
      });
    </script>

<script type="text/javascript">
//FAZ O TRATAMENTO DA IMAGEM ENVIADA NO UPLOAD
$(function () {

  var form;
  $('#upload_file').change(function (event) {
    var form_data = new FormData();
    var ins = document.getElementById('upload_file').files.length;
    for (var x = 0; x < ins; x++) {
      form_data.append("files[]", document.getElementById('upload_file').files[x]);
    }
        //form.append('upload_file', event.target.files[i]); // para apenas 1 arquivo
        //var name = event.target.files[0].content.name; // para capturar o nome do arquivo com sua extenção

        $.ajax({
            url: 'functions/upFoto.php', // Url do lado server que vai receber o arquivo
            data: form_data,
            processData: false,
            contentType: false,
            type: 'POST',
            beforeSend: function(){
              $("#fotoCarrega").show();
              $("#fotoCarrega").html('<img src="imagem/sistema/loading.gif" class="img-responsive" >');
            },
            success: function (data) {
                // utilizar o retorno
                $("#fotoCapa").html(data);
                $("#attImagem").show();
                $("#atualizadoCapa").hide();
                $("#fotoCarrega").hide();
              },
              error: function(){
               alert('deu ruim');
             }
           });
      });
});
</script>
<script type="text/javascript">
      //ATUALIZA CAPA DA PÁGINA
      function attPagina(idReq){
        $("#attImagem").hide();
        var idPagina = $("#idPagina").val();
        var form_data = new FormData();
        form_data.append("idPagina", $("#idPagina").val());
        var ins = document.getElementById('upload_file').files.length;
        for (var x = 0; x < ins; x++) {
          form_data.append("files[]", document.getElementById('upload_file').files[x]);
        }
        $.ajax({
          processData: false,
          contentType: false,
          url:("functions/attPagina.php"),
          type: "POST",
          data: form_data,
          beforeSend: function(){
            $("#fotoCarrega").show();
            $("#fotoCarrega").html('<img src="imagem/sistema/loading.gif" class="img-responsive" >');
          },
          success: function(data)
          {
            $("#atualizadoCapa").html(data);
            $("#atualizadoCapa").show();
            $("#fotoCarrega").hide();
          },
          error: function(){
           alert('deu ruim');
         }
       })

      }
    </script>


  </body>

  </html>
