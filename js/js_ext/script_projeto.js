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
            url:'ajax/favoritos.php',
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
            url:'ajax/curtidas.php',
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
            url:'ajax/curtidas.php',
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
            url:'ajax/visitas.php',
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
            url:'ajax/denuncia.php',
            type:'POST',
            data:{idPost:idPost, idUsuario:idUsuario},
        success:function(data){
                $("#denunciado").html(data);
            },

        })
    }
// CARREGA OS COMENTÁRIOS VIA AJAX
        function carregarComentario(idPost, idUsuario) {
                        $.ajax({
                            url: 'ajax/comentario.php',
                            type: 'POST',
                            data: {carrega:idPost, idUsuario:idUsuario},
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
// ENVIA NOVO COMENTARIO AO BANCO DE DADOS
        function comentarPost(idPost, idUsuario) {
                         var comentario = $("#comentario"+idPost).val();
                        if (comentario > ''){
                            $.ajax({
                                url: 'ajax/comentario.php',
                                type: 'POST',
                                data: {comment:comentario, idPost:idPost, idUsuario:idUsuario},
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
        function atualizarPost(idPost, idComentario, idUsuario) {
                     var comentario = $("#textResp"+idPost+idComentario).val();
                     if (comentario > ''){
                        $.ajax({
                            url: 'ajax/comentario.php',
                            type: 'POST',
                            data: {atualiza:comentario, idPost:idPost, idUsuario:idUsuario ,idComentario:idComentario},
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
                        url: 'ajax/comentario.php',
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