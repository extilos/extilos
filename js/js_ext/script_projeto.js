  function Mudarestado(el) {
    var display = document.getElementById(el).style.display;
    if(display == "none")
        document.getElementById(el).style.display = 'block';
    else
        document.getElementById(el).style.display = 'none';

  }
  function Mudarestado1(el) {
    var display = document.getElementById(el).style.display;
    if(display == "block")
        document.getElementById(el).style.display = 'none';
    else
        document.getElementById(el).style.display = 'none';

  }
  function pagseguro(){
    $.post("pagseguro2.php",'',function(data){
        //$('#code').val(data);
        //$('#comprar').submit();
        window.location.href = 'https://pagseguro.uol.com.br/v2/checkout/payment.html?code='+data;
    })
  }
  $(document).ready(function(){
                //faz verificação de página no banco de dados
                $("#torre").on('keyup focusout',function(){
                    var torre = $("#torre").val();
                    $.ajax({
                        url: '/extilos/ajax/consulta-torre.php',
                        type: 'POST',
                        data: {nomeTorre:torre},
                        beforeSend: function(){
                            $("#resultado").html("Carregando...");
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
  $(document).ready(function(){
                //faz verificação de página no banco de dados
                $("#pagina").on('keyup focusout',function(){
                    var pagina = $("#pagina").val();
                    $.ajax({
                        url: '/extilos/ajax/consulta-pagina.php',
                        type: 'POST',
                        data: {nomePagina:pagina},
                        beforeSend: function(){
                            $("#resultado").html("Carregando...");
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
  // ALTERA PASTA DO POST
   function mudarPasta(idPost,local){
    var idPasta = document.getElementById(idPost).value;
    //alert(idPasta);
    $.ajax({
        type: "POST",
        url: "/extilos/ajax/buscaPasta.php",
        data:{idPost: idPost, idPasta: idPasta, local:local },
        success: function(data){
            $("#pastaAlt").html(data);
        }
    })

   }
  //VERIFICA PASTA PARA O BLOG
    $(document).ready(function(){
        var i = 0;
                //faz verificação de página no banco de dados
                $("#album").on('keyup focusout',function(){
                    var pasta = $("#album").val();
                    var pagina = $("#idPagina").val();
                    var tp = $("#tp").val();
                    i++;
                if(i > 2){
                    if(pasta > ''){
                    $.ajax({
                        url: '/extilos/ajax/buscaPasta.php',
                        type: 'POST',
                        data: {nomePasta:pasta, idPagina:pagina, tp:tp},
                        beforeSend: function(){
                            $("#resultadoPasta").html("Carregando...");
                        },
                        success: function(data)
                        {
                            $("#resultadoPasta").html(data);
                        },
                        error: function(){
                            $("#resultadoPasta").html("Erro ao enviar...");
                        }
                    }) 
                    }else{
                         $("#resultadoPasta").html('');
                    } 
                }
                });
            });

  $(document).ready(function () {
    $.getJSON('/extilos/script/estados_cidades.json', function (data) {
        var items = [];
        var options = '<option value="">escolha um estado</option>';
        $.each(data, function (key, val) {
            options += '<option value="' + val.sigla + '">' + val.sigla + '</option>';
        });
        $("#estados").html(options);
        $("#estados").change(function () {
            var options_cidades = '';
            var str = "";
            $("#estados option:selected").each(function () {
                str += $(this).text();
            });
            $.each(data, function (key, val) {
                if(val.sigla == str) {
                    $.each(val.cidades, function (key_city, val_city) {
                        options_cidades += '<option value="' + val_city + '">' + val_city + '</option>';
                    });
                }
            });
            $("#cidades").html(options_cidades);
        }).change();
    });
  });
  $(document).ready(function(){
    $("#apresenta").on('keyup focusout',function(){
        $("#descritivo").show();
    });
  })
  $(document).ready(function(){
    $("#telefone").on('keyup focusout',function(){
        $("#descritivo").show();
    });
  })
   $(document).ready(function(){
    $("#celular").on('keyup focusout',function(){
        $("#descritivo").show();
    });
  })
    $(document).ready(function(){
    $("#email").on('keyup focusout',function(){
        $("#descritivo").show();
    });
  })
     $(document).ready(function(){
    $("#endereco").on('keyup focusout',function(){
        $("#descritivo").show();
    });
  })
      $(document).ready(function(){
    $("#site").on('keyup focusout',function(){
        $("#descritivo").show();
    });
  })
  function RefreshWindow ()
  {
    window.location.reload (true);
  }
//CANCELA O CADASTRO DO USUÁRIO
function cancelaUser(){
    $("#buscaAdm").show();
    $("#adm").val('');
    $("#respostaUser").hide();
    $("#respUsuario").hide();
    $("#permitir").hide();
    $("#permitirBotao").hide();
}
//CADASTRO DE USUARIO NA PÁGINA
function cadastrarUser(){
    var dados = $('#formADM').serialize();
    $.ajax({
        type: "POST",
        url: "/extilos/ajax/attPagina.php",
        data: dados,
        success: function(data){
            $("#adicionaAdm").html(data);
                    //$("#search-box").css("background","#FFF");
                    $("#buscaAdm").show();
                    $("#adm").val('');
                    $("#respostaUser").hide();
                    $("#respUsuario").hide();
                    $("#permitir").hide();
                    $("#permitirBotao").hide();
                }
            });
}
function atualizarUser(){
    var dados = $('#formADM').serialize();
    $.ajax({
        type: "POST",
        url: "/extilos/ajax/attPagina.php",
        data: dados,
        success: function(data){
            $("#adicionaAdm").html(data);
                    //$("#search-box").css("background","#FFF");
                    $("#buscaAdm").show();
                    $("#adm").val('');
                    $("#respostaUser").hide();
                    $("#respUsuario").hide();
                    $("#permitir").hide();
                    $("#permitirBotao").hide();
                }
            });
}
// ATUALIZAR PÁGINA
function atualizarPagina(){
    setTimeout(function(){ location.reload(); }, 1000);
}
// PÁGINA ANTERIOR
function paginaAnterior(){
     setTimeout(window.history.go(-1) , 500);
   
}

//ABRIR A DIV DE PERMISÕES PARA SEREM CADASTRADAS
function permitir(pagina, user){
    var tipoPagina = $("#tipoPagina").val();
    $.ajax({
        type: "POST",
        url: "/extilos/ajax/buscaUsuario.php",
        data:{pagina: pagina, user: user, tipoPagina: tipoPagina },
        success: function(data){
            $("#nomeAdm").html(data);
            $("#buscaAdm").hide();
            $("#respUsuario").hide();
            $("#permitir").show();
            $("#permitirBotao").show();
        }
    })
}
//ABRIR A DIV DE PERMISÕES PARA SEREM CADASTRADAS
function permisoes(){
    $("#permitir").show();
    $("#permitirBotao").show();
}
// ativar postagem para torre
  function ativarPostAdm(idPermite,local,tipo, idCheck){
    var checado = $("#"+idCheck).is(':checked');
      if(checado == true){
        var liberado = 1;
        $.ajax({
            url:("/extilos/ajax/cadastroAdm.php"),
            type: "POST",
            data: {
              liberado: liberado,
              idPermite: idPermite,
              local: local,
              tipo: tipo,
            },
            success: function(data){
             // alert(data);

            },
          })
      }else{
       var liberado = 0;
        $.ajax({
            url:("/extilos/ajax/cadastroAdm.php"),
            type: "POST",
            data: {
              liberado: liberado,
              idPermite: idPermite,
              local: local,
              tipo: tipo,
            },
            success: function(data){
             // alert(data);
            },
          })
      }

    }
 // BUSCA USUÁRIO DINAMICAMENTE NO BANCO DE DADOS

 $(document).ready(function(){
    var i = 0;
    $("#adm").on('keyup focusout',function(){
        var tipoPagina = $("#tipoPagina").val();
        var localBusca = $("#localBusca").val();
        var idPagina = $("#idPagina").val();
        var idTorre = $("#idTorre").val();
        var adm = $("#adm").val();

        i++;
        if(i > 3){
        $.ajax({
            type: "POST",
            url: "/extilos/ajax/buscaUsuario.php",
            timeout: 3000,
            data:{adm: adm, idPagina: idPagina, localBusca:localBusca, tipoPagina:tipoPagina, idTorre:idTorre},
      //beforeSend: function(){
        //$("#adm").css("background","#FFF url(img/spinner.gif) no-repeat 5px");
      //},
      error: function(){
        $("#respUsuario").html('erro');
        },
      success: function(data){
        if(adm == ''){
           $("#respUsuario").hide(); 
        }else{
        $("#respUsuario").show();
        $("#respUsuario").html(data);
        $("#permitir").hide();
        }

                //$("#search-box").css("background","#FFF");
            }
        }); } 
    });
 });
 function buscarUsuario($letra){
    var tipoPagina = $("#tipoPagina").val();
    var localBusca = $("#localBusca").val();
    var idPagina = $("#idPagina").val();
    var idTorre = $("#idTorre").val();
    var adm = $("#adm").val();
    $.ajax({
        type: "POST",
        url: "/extilos/ajax/buscaUsuario.php",
        data:{adm: adm, letra: $letra, idPagina: idPagina, localBusca:localBusca, tipoPagina:tipoPagina, idTorre:idTorre},
      //beforeSend: function(){
        //$("#adm").css("background","#FFF url(img/spinner.gif) no-repeat 5px");
      //},
      success: function(data){
        $("#respUsuario").show();
        $("#respUsuario").html(data);
        $("#permitir").hide();
                //$("#search-box").css("background","#FFF");
            }
        });
 }
 // BUSCA BLOG DINAMICAMENTE NO BANCO DE DADOS
 $(document).ready(function(){
    $("#admBlog").on('keyup focusout',function(){
        var idTorre = $("#idTorreBlog").val();
        var admBlog = $("#admBlog").val();
        $.ajax({
            type: "POST",
            url: "/extilos/ajax/buscarBlog.php",
            data:{admBlog: admBlog, idTorre: idTorre},
      //beforeSend: function(){
        //$("#adm").css("background","#FFF url(img/spinner.gif) no-repeat 5px");
      //},
      success: function(data){
        $("#respBlog").show();
        $("#respBlog").html(data);
                //$("#search-box").css("background","#FFF");
            }
        });
    });
 });

      //ATUALIZA APRESENTAÇÃO DA PÁGINA
      function attDesc(idReq){
        var local = $("#local").val();
        var idPagina = $("#idPagina").val();
        var idTorre = $("#idTorre").val();
        var apresenta = $("#apresenta").val();
        var telefone = $("#telefone").val();
        var celular = $("#celular").val();
        var email = $("#email").val();
        var endereco = $("#endereco").val();
        var site = $("#site").val();

        $.ajax({
            url:("/extilos/ajax/attPagina.php"),
            type: "POST",
            data: { 
                idPagina: idPagina,
                idTorre: idTorre,
                apresenta: apresenta,
                telefone: telefone,
                celular: celular,
                email: email,
                endereco: endereco,
                site: site,
                descritivo: idReq,
                local: local
            },
            success: function(data)
            {
                $("#Resp"+idReq).html(data);
                $("#"+idReq).hide();
            },
            error: function(){
                alert('deu ruim');
            }
        })

      }
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
             // document.getElementById('qtde_preview').innerHTML = '<p>'+countFiles+' arquivo(s) selecionado(s)</p>';
          }

      } else {
        alert("foto não suportada");
      }
  } else {
    alert("Selecione uma foto");
  }
});
  // verificação de upload de imagem
  $("#upload_produto").on('change', function () {

    var countFiles = $(this)[0].files.length;

    var imgPath = $(this)[0].value;
    var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
    var image_holder = $("#image_preview");
    image_holder.empty();
        if(countFiles > 1) { // VERIFICA SE É MAIOR DO QUE 5
            alert("Não é permitido enviar mais do que 1 arquivo.");
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
             // document.getElementById('qtde_preview').innerHTML = '<p>'+countFiles+' arquivo(s) selecionado(s)</p>';
          }

      } else {
        alert("foto não suportada");
      }
  } else {
    alert("Selecione uma foto");
  }
});
 // BUSCA TORRE DINAMICAMENTE
 $(document).ready(function(){
    $("#search-box").on('keyup focusout',function(){
        var idPagina = $("#idPagina").val();
        var buscar = $("#search-box").val();
        $.ajax({
            type: "POST",
            url: "/extilos/ajax/buscatorre.php",
            data:{idPagina: idPagina, keyword: buscar },
            beforeSend: function(){
                $("#search-box").css("background","#FFF url(../img/spinner.gif) no-repeat 20px");
            },
            success: function(data){
                $("#suggesstion-box").show();
                $("#suggesstion-box").html(data);
                $("#search-box").css("background","#FFF");
            }
        });
    });
 });
          //To select country name
          function selectCountry(val) {
            $("#search-box").val(val);
            $("#suggesstion-box").hide();
          }
//ADICIONA A RELAÇÃO ENTRE PÁGINA E TORRE
function addTorre(idTorre, idPagina){
    alert('VERIFICAR AINDA');
    $.ajax({
        url:("/extilos/ajax/paginaXtorre.php"),
        type: "POST",
        data: { idPagina: idPagina, 
            idTorre: idTorre,
        },
        success: function(data)
        {
            $("#torre"+idTorre).html(data);
            $("#"+idTorre).hide();
        },
        error: function(){
            alert(idPagina);
        }
    })

}

//ADICIONA A RELAÇÃO ENTRE PÁGINA E TORRE
function selTorre(torre,pagina){
    alert(torre,pagina);
    $.ajax({
        url:("/extilos/ajax/paginaXtorre.php"),
        type: "POST",
        data: { torre: torre, 
            pagina: pagina,
        }
    })

}

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
            url: '/extilos/ajax/upFoto.php', // Url do lado server que vai receber o arquivo
            data: form_data,
            processData: false,
            contentType: false,
            type: 'POST',
            beforeSend: function(){
                $("#fotoCarrega").show();
                $("#fotoCarrega").html('<img src="../imagem/sistema/loading.gif" class="img-responsive" >');
            },
            success: function (data) {
                // utilizar o retorno
                $("#fotoCapa").html(data);
                $("#attImagem").show();
                $("#atualizadoCapa").hide();
                $("#fotoCarrega").hide();
                $("#proximaEtapa").show();
            },
            error: function(){
                alert('deu ruim');
            }
        });
    });
});
$(function () {

    var form;
    $('#upload_produto').change(function (event) {
        var form_data = new FormData();
        var ins = document.getElementById('upload_produto').files.length;
        for (var x = 0; x < ins; x++) {
            form_data.append("files[]", document.getElementById('upload_produto').files[x]);
        }
        //form.append('upload_file', event.target.files[i]); // para apenas 1 arquivo
        //var name = event.target.files[0].content.name; // para capturar o nome do arquivo com sua extenção

        $.ajax({
            url: '/extilos/ajax/upFoto.php', // Url do lado server que vai receber o arquivo
            data: form_data,
            processData: false,
            contentType: false,
            type: 'POST',
            beforeSend: function(){
                $("#fotoProdutoCarrega").show();
                $("#fotoProdutoCarrega").html('<img src="../imagem/sistema/loading.gif" class="img-responsive" >');
            },
            success: function (data) {
                // utilizar o retorno
                $("#fotoProduto").html(data);
                 $("#fotoProdutoCarrega").hide();
            },
            error: function(){
                alert('deu ruim');
            }
        });
    });
});
$(function () {

    var form;
    $('#upload_produto2').change(function (event) {
        var form_data = new FormData();
        var ins = document.getElementById('upload_produto2').files.length;
        for (var x = 0; x < ins; x++) {
            form_data.append("files[]", document.getElementById('upload_produto2').files[x]);
        }
        //form.append('upload_file', event.target.files[i]); // para apenas 1 arquivo
        //var name = event.target.files[0].content.name; // para capturar o nome do arquivo com sua extenção

        $.ajax({
            url: '/extilos/ajax/upFoto.php', // Url do lado server que vai receber o arquivo
            data: form_data,
            processData: false,
            contentType: false,
            type: 'POST',
            beforeSend: function(){
                $("#fotoProdutoCarrega2").show();
                $("#fotoProdutoCarrega2").html('<img src="../imagem/sistema/loading.gif" class="img-responsive" >');
            },
            success: function (data) {
                // utilizar o retorno
                $("#fotoProduto2").html(data);
                 $("#fotoProdutoCarrega2").hide();
            },
            error: function(){
                alert('deu ruim');
            }
        });
    });
});
$(function () {

    var form;
    $('#upload_produto3').change(function (event) {
        var form_data = new FormData();
        var ins = document.getElementById('upload_produto3').files.length;
        for (var x = 0; x < ins; x++) {
            form_data.append("files[]", document.getElementById('upload_produto3').files[x]);
        }
        //form.append('upload_file', event.target.files[i]); // para apenas 1 arquivo
        //var name = event.target.files[0].content.name; // para capturar o nome do arquivo com sua extenção

        $.ajax({
            url: '/extilos/ajax/upFoto.php', // Url do lado server que vai receber o arquivo
            data: form_data,
            processData: false,
            contentType: false,
            type: 'POST',
            beforeSend: function(){
                $("#fotoProdutoCarrega3").show();
                $("#fotoProdutoCarrega3").html('<img src="../imagem/sistema/loading.gif" class="img-responsive" >');
            },
            success: function (data) {
                // utilizar o retorno
                $("#fotoProduto3").html(data);
                $("#fotoProdutoCarrega3").hide();
            },
            error: function(){
                alert('deu ruim');
            }
        });
    });
});
      //ATUALIZA CAPA DA PÁGINA
      function attPagina(idReq){
        $("#attImagem").hide();
        var local = $("#local").val();
        var idUsuario = $("#idUsuario").val();
        var idTorre = $("#idTorre").val();
        var idPagina = $("#idPagina").val();
        var form_data = new FormData();
        form_data.append("idUsuario", $("#idUsuario").val());
        form_data.append("idTorre", $("#idTorre").val());
        form_data.append("idPagina", $("#idPagina").val());
        form_data.append("local", $("#local").val());
        var ins = document.getElementById('upload_file').files.length;
        for (var x = 0; x < ins; x++) {
            form_data.append("files[]", document.getElementById('upload_file').files[x]);
        }
       // alert(idPagina);
        $.ajax({
            processData: false,
            contentType: false,
            url:("/extilos/ajax/attPagina.php"),
            type: "POST",
            data: form_data,
            beforeSend: function(){
                $("#fotoCarrega").show();
                $("#fotoCarrega").html('<img src="../imagem/sistema/loading.gif" class="img-responsive" >');
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
  // ativar postagem para torre
  function ativarPost(post,idReq,idCheck,acao,jaPublicado){
    var checado = $("#"+idCheck).is(':checked');
      if(checado == true){
        var liberado = 1;
        $.ajax({
            url:("/extilos/ajax/validarPost.php"),
            type: "POST",
            data: {
              liberado: liberado,
              post: post,
              idReq: idReq,
              acao: acao,
              publicado: jaPublicado,
            },
            success: function(data){
              //alert(data);

            },
          })
      }else{
       var liberado = 0;
        $.ajax({
            url:("/extilos/ajax/validarPost.php"),
            type: "POST",
            data: {
              liberado: liberado,
              post: post,
              idReq: idReq,
              acao: acao,
              publicado: jaPublicado,
            },
            success: function(data){
                //alert(data);
              //atualizarPagina();
            },
          })
      }

    }
     function pontos(tipo, idPost, idUsuario, tokenDia , idTorre, idPagina){
        $.ajax({
            url:'/extilos/ajax/pontos.php',
            type:'POST',
            data:{tipo:tipo, idPost:idPost, idUsuario:idUsuario, tokenDia:tokenDia, idTorre:idTorre , idPagina:idPagina},

        success:function(data){
               // $("#dataVisita"+idPost).html(data);
               //alert(data);
            },
        })
    }
   //MUDAR PARA BLOQUEADO OU DESBLOQUEADO

     function Mudarestado(el) {
        var display = document.getElementById(el).style.display;
        if(display == "block")
            document.getElementById(el).style.display = 'none';
        else
            document.getElementById(el).style.display = 'block';

    }
    function Mudarestado1(el) {
        var display = document.getElementById(el).style.display;
        if(display == "none")
            document.getElementById(el).style.display = 'block';
        else
            document.getElementById(el).style.display = 'none';

    }

// ADICIONAR AO FAVORITO
    function favoritar(idPost, idUsuario){
        $.ajax({
            url:'/extilos/ajax/favoritos.php',
            type:'POST',
            data:{idPost:idPost, idUsuario:idUsuario},
            success:function(data){
                $("#favoritar"+idPost).html(data);
                $("#favoritarM"+idPost).html(data);
            }
        })
    }
// MUDA A COR E BLOQUEIA CURTIR POSITIVO
    function mudaPositivo(el) {
        var btnStar = document.getElementById(el);
        if (btnStar.classList == "btn btn-default disabled") {
            btnStar.classList = "btn btn-default";
        } else {
            btnStar.classList = "btn btn-default disabled";
        }

    }
// MUDA A COR E BLOQUEIA CURTIR NEGATIVO
    function mudaNegativo(el) {
        var btnStar = document.getElementById(el);
        if (btnStar.classList == "btn btn-default disabled") {
            btnStar.classList = "btn btn-default";
        } else {
            btnStar.classList = "btn btn-default disabled";
        }
    }
// ENVIA PARA BANCO DE DADOS O CURTIR NEGATIVO
    function descurtir(idPost, idUsuario, tokenDia, idTorre, idPagina){
        var positivo = 0;
        var negativo = 1;
        $.ajax({
            url:'/extilos/ajax/curtidas.php',
            type:'POST',
            data:{  positivo:positivo,
                    negativo:negativo,
                    idPost:idPost,
                    idUsuario:idUsuario,
                    tokenDia:tokenDia,
                    idTorre:idTorre,
                    idPagina:idPagina
                },
            beforeSend: function(){
                $("#descurtir").html('load..');
            },
            success:function(data){
                $("#descurtir"+idPost).html(data);
                $("#descurtirM"+idPost).html(data);
            },
            error: function(){
                $("#descurtir").html('erro ao enviar');
            }
        })
    }
// ENVIA PARA BANCO DE DADOS O CURTIR POSITIVO
    function curtir(idPost, idUsuario, tokenDia, idTorre, idPagina){
        var positivo = 1;
        var negativo = 0;
        $.ajax({
            url:'/extilos/ajax/curtidas.php',
            type:'POST',
            data:{  positivo:positivo, 
                    negativo:negativo, 
                    idPost:idPost, 
                    idUsuario:idUsuario,
                    tokenDia:tokenDia,
                    idTorre:idTorre,
                    idPagina:idPagina
                },
            beforeSend: function(){
                $("#curtir").html('load..');
            },
            success:function(data){
                $("#curtir"+idPost).html(data);
                $("#curtirM"+idPost).html(data);
            },
            error: function(){
                $("#curtir").html('erro ao enviar');
            }
        })
    }
// ENVIA PARA O BANCO DE DADOS A VISITA AO POST
    function visita(idPost, idUsuario, tokenDia , idTorre){
        $.ajax({
            url:'/extilos/ajax/visitas.php',
            type:'POST',
            data:{idPost:idPost, idUsuario:idUsuario, tokenDia:tokenDia, idTorre:idTorre},

        success:function(data){
                $("#dataVisita"+idPost).html(data);
               //alert(data);
            },
        })
    }
// ENVIA AO BANCO DE DADOS A DUNUNCIA DE UM POST
    function denuncia(idPost, idUsuario){
        $.ajax({
            url:'/extilos/ajax/denuncia.php',
            type:'POST',
            data:{idPost:idPost, idUsuario:idUsuario},
        success:function(data){
                $("#denunciado").html(data);
            },

        })
    }
// CARREGA OS COMENTÁRIOS VIA AJAX (idUsuario = Visitante / idUser = Quem Postou)
        function carregarComentario(idPost, idUsuario, tokenDia, idPagina, idTorre, idUser) {
                        $.ajax({
                            url: '/extilos/ajax/comentario.php',
                            type: 'POST',
                            data: {carrega:idPost, idUsuario:idUsuario, tokenDia:tokenDia, idPagina:idPagina, idTorre:idTorre, idUser:idUser},
                            beforeSend: function(){
                                $("#comentarios"+idPost).html("");
                            },
                            success: function(data)
                            {
                                $("#comentarios"+idPost).html(data);

                            },
                            error: function(){
                                $("#comentarios"+idPost).html("Erro ao enviar...");
                            }
                        })
                    }
// CARREGA OS COMENTÁRIOS VIA AJAX (idUsuario = Visitante / idUser = Quem Postou)
        function respostaComentario(idPost, idUsuario, tokenDia, idPagina, idTorre, idUser) {
                        $.ajax({
                            url: '/extilos/ajax/comentario.php',
                            type: 'POST',
                            data: {carrega:idPost, idUsuario:idUsuario, tokenDia:tokenDia, idPagina:idPagina, idTorre:idTorre, idUser:idUser},
                            beforeSend: function(){
                                $("#resposta"+idPost).html("");
                            },
                            success: function(data)
                            {
                                $("#resposta"+idPost).html(data);

                            },
                            error: function(){
                                $("#resposta"+idPost).html("Erro ao enviar...");
                            }
                        })
                    }
// ENVIA NOVO COMENTARIO AO BANCO DE DADOS
        function comentarPost(idPost, idUsuario, tokenDia, idPagina, idTorre) {
                         var comentario = $("#comentario"+idPost).val();
                        if (comentario > ''){
                            $.ajax({
                                url: '/extilos/ajax/comentario.php',
                                type: 'POST',
                                data: {comment:comentario, idPost:idPost, idUsuario:idUsuario, tokenDia:tokenDia, idPagina:idPagina, idTorre:idTorre},
                                beforeSend: function(){
                                    $("#postagem"+idPost).html("load..");
                                },
                                success: function(data)
                                {
                                    $("#postagem"+idPost).html(data);
                                    $("#comentario"+idPost).val('');

                                },
                                error: function(){
                                    $("#postagem"+idPost).html("Erro ao enviar...");
                                }
                            })
                        }
                    }
// ATUALIZA A EDIÇÃO DO COMENTÁRIO
        function atualizarPost(idPost, idComentario, idUsuario, tokenDia, idPagina, idTorre) {
                     var comentario = $("#textResp"+idPost+idComentario).val();
                     if (comentario > ''){
                        $.ajax({
                            url: '/extilos/ajax/comentario.php',
                            type: 'POST',
                            data: {atualiza:comentario, idPost:idPost, idUsuario:idUsuario ,idComentario:idComentario, tokenDia:tokenDia, idPagina:idPagina, idTorre:idTorre},
                            beforeSend: function(){
                                $("#atualiza"+idPost).html("load..");
                            },
                            success: function(data)
                            {
                                $("#atualiza"+idPost+idComentario).html(data);

                            },
                            error: function(){
                                $("#atualiza"+idPost).html("Erro ao enviar...");
                            }
                        })
                    }
                }
// EXCLUI COMENTÁRIO
        function excluirComentario(idPost, idComentario, idUsuario){
            var excluir = 1;
                    $.ajax({
                        url: '/extilos/ajax/comentario.php',
                        type: 'POST',
                        data: {excluir:excluir, idPost:idPost, idUsuario:idUsuario ,idComentario:idComentario},
                        beforeSend: function(){
                            $("#acao"+idPost).html("load..");
                        },
                        success: function(data)
                        {
                            $("#acao"+idPost+idComentario).html(data);

                        },
                        error: function(){
                            $("#acao"+idPost).html("Erro ao enviar...");
                        }
                    })
        }
//EXCLUI ALBUM DO BLOG
        function excluirAlbum(idAlbum, local, tipo){
                    $.ajax({
                        url: '/extilos/ajax/excluirAlbum.php',
                        type: 'POST',
                        data: {album:idAlbum, local:local, tipo:tipo},
                        success: function(data)
                        {
                            //alert(data);
                            $("#listaAlbum").html(data);

                        }
                    })

        }
//EXCLUI ALBUM DO BLOG
        function excluirAdm(idPermite){
                    $.ajax({
                        url: '/extilos/ajax/excluirAdm.php',
                        type: 'POST',
                        data: {idPermite:idPermite},
                        success: function(data)
                        {
                            //alert(data);
                            $("#adicionaAdm").html(data);

                        }
                    })

        }

//script para fazer consulta de # e @ no banco de dados
            $(document).ready(function(){
                $("#descricao").on('keyup focusout',function(e){
                 if (e.which == 51) {   
                    var hashTag = $("#descricao").val();
                    $.ajax({
                        url: '/extilos/ajax/buscaTag.php',
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
$(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');
        $sidebar_img_container = $sidebar.find('.sidebar-background');
        $full_page = $('.full-page');
        $sidebar_responsive = $('body > .navbar-collapse');
        window_width = $(window).width();
        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();
        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }
        }
        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });
        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');
          $(this).siblings().removeClass('active');
          $(this).addClass('active');
          var new_color = $(this).data('color');
          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }
          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }
          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });
        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');
          var new_color = $(this).data('background-color');
          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });
        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');
          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');
          var new_image = $(this).find("img").attr('src');
          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }
          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');
            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }
          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');
            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }
          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });
        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');
          $input = $(this);
          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }
            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }
            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }
            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }
            background_image = false;
          }
        });
        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');
          $input = $(this);
          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;
            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();
          } else {
            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');
            setTimeout(function() {
              $('body').addClass('sidebar-mini');
              md.misc.sidebar_mini_active = true;
            }, 300);
          }
          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);
          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);
        });
      });
    });