
  // GRAFICOS DA EDIÇÃO DA TORRE
  $("#chart2").ready(function (){
// GRAFICO DE DATAS
var data = {
	labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
	series: [
	[5, 4, 3, 7, 5, 10, 3, 4, 8, 10, 6, 8],
	[3, 2, 9, 5, 4, 6, 4, 6, 7, 8, 7, 4],
	[8, 2, 20, 2, 8, 3, 2, 8, 8, 7, 7, 4]
	]
};

var options = {
    height: '300px',
	seriesBarDistance: 10,
	chartPadding: {
		top: 0,
		right: 0,
		bottom: 0,
		left: 0
	}
};

var responsiveOptions = [
  ['screen and (min-width: 641px) and (max-width: 1024px)', {
    
    showPoint: false,
    axisX: {
      labelInterpolationFnc: function(value) {
        // Will return Mon, Tue, Wed etc. on medium screens
        return value.slice(0, 3);
      }
    }
  }],
  ['screen and (max-width: 640px)', {

    showPoint: false,
    axisX: {
      labelInterpolationFnc: function(value) {
        // Will return M, T, W etc. on small screens
        return value[0];
      }
    }
  }]
];

new Chartist.Line('#chart2', data, options, responsiveOptions);
})
  $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

  });

  $(document).ready(function(){
    // Use only for V1
    $('#radioBtn span').on('click', function(){
    	var sel = $(this).data('value');
    	var tog = $(this).data('toggle');
    	$('#'+tog).val(sel);
        // You can change these lines to change classes (Ex. btn-default to btn-danger)
        $('span[data-toggle="'+tog+'"]').not('[data-value="'+sel+'"]').removeClass('active btn-primary').addClass('notActive btn-default');
        $('span[data-toggle="'+tog+'"][data-value="'+sel+'"]').removeClass('notActive btn-default').addClass('active btn-primary');
    });
    
    // Use only for V2
    $('#radioBtnV2 span').on('click', function(){
    	var sel = $(this).data('value');
    	var tog = $(this).data('toggle');
    	var active = $(this).data('active');
    	var classes = "btn-default btn-primary btn-success btn-info btn-warning btn-danger btn-link";
    	var notactive = $(this).data('notactive');
    	$('#'+tog).val(sel);
    	$('span[data-toggle="'+tog+'"]').not('[data-value="'+sel+'"]').removeClass('active '+classes).addClass('notActive '+notactive);
    	$('span[data-toggle="'+tog+'"][data-value="'+sel+'"]').removeClass('notActive '+classes).addClass('active '+active);
    });
});
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
                		url: '../ajax/consulta-torre.php',
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
                		url: '../ajax/consulta-pagina.php',
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
  $(document).ready(function () {
  	$.getJSON('../script/estados_cidades.json', function (data) {
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
		url: "../ajax/attPagina.php",
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
//ABRIR A DIV DE PERMISÕES PARA SEREM CADASTRADAS
function permitir(pagina, user){
	var tipoPagina = $("#tipoPagina").val();
	$.ajax({
		type: "POST",
		url: "../ajax/buscaUsuario.php",
		data:{pagina: pagina, user: user, tipoPagina: tipoPagina },
		success: function(data){
			$("#nomeAdm").html(data);
			$("#buscaAdm").hide();
			$("#respUsuario").hide();
		}
	})
}
//ABRIR A DIV DE PERMISÕES PARA SEREM CADASTRADAS
function permisoes(){
	$("#permitir").show();
	$("#permitirBotao").show();
}
 // BUSCA USUÁRIO DINAMICAMENTE NO BANCO DE DADOS
 $(document).ready(function(){
 	$("#adm").on('keyup focusout',function(){
 		var tipoPagina = $("#tipoPagina").val();
 		var localBusca = $("#localBusca").val();
 		var idPagina = $("#idPagina").val();
 		var idTorre = $("#idTorre").val();
 		var adm = $("#adm").val();
 		$.ajax({
 			type: "POST",
 			url: "../ajax/buscaUsuario.php",
 			timeout: 3000,
 			data:{adm: adm, idPagina: idPagina, localBusca:localBusca, tipoPagina:tipoPagina, idTorre:idTorre},
      //beforeSend: function(){
        //$("#adm").css("background","#FFF url(img/spinner.gif) no-repeat 5px");
      //},
      error: function(){
        $("#respUsuario").html('erro');
    	},
      success: function(data){
      	$("#respUsuario").show();
      	$("#respUsuario").html(data);
      	$("#permitir").hide();
                //$("#search-box").css("background","#FFF");
            }
        });
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
 		url: "../ajax/buscaUsuario.php",
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
 			url: "../ajax/buscarBlog.php",
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
      	var idPagina = $("#idPagina").val();
      	var apresenta = $("#apresenta").val();

      	$.ajax({
      		url:("../ajax/attPagina.php"),
      		type: "POST",
      		data: { idPagina: idPagina,
      			apresenta: apresenta,
      			descritivo: idReq
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
              //document.getElementById('qtde_preview').innerHTML = '<p>'+countFiles+' arquivo(s) selecionado(s)</p>';
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
 			url: "../ajax/buscatorre.php",
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
function addTorre(idTorre){
	var idPagina = $("#idPagina").val();
	$.ajax({
		url:("../ajax/paginaXtorre.php"),
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
	$.ajax({
		url:("../ajax/paginaXtorre.php"),
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
            url: '../functions/upFoto.php', // Url do lado server que vai receber o arquivo
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
      		url:("../ajax/attPagina.php"),
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
  function ativarPost(post,torre,idCheck,acao,jaPublicado){
    var checado = $("#"+idCheck).is(':checked');
      if(checado == true){
        var liberado = 1;
        $.ajax({
            url:("../ajax/validarPost.php"),
            type: "POST",
            data: {
              liberado: liberado,
              post: post,
              torre: torre,
              acao: acao,
              publicado: jaPublicado,
            },
            success: function(data){
              alert(data);
            },
          })
      }else{
       var liberado = 0;
        $.ajax({
            url:("../ajax/validarPost.php"),
            type: "POST",
            data: {
              liberado: liberado,
              post: post,
              torre: torre,
              acao: acao,
              publicado: jaPublicado,
            },
            success: function(data){
              alert(data);
            },
          })
      }

    }


