<div class="container">
    <h4 class="modal-title" id="Login">Publicar conteúdos</h4>
			<div class="col-sm-9">
                        <p class="text-center">
                            <div class="col-sm-2" id="btn_foto">
                                <a class="btn btn-block btn-sq-sm btn-default"  data-toggle="modal" data-target="#modal-conteudo">
                                    <img src="https://img.icons8.com/color/30/000000/add-camera.png"><br/>
                                    Fotos
                                </a>
                            </div>
                            <div class="col-sm-2" id="btn_post">
                                <a class="btn btn-block btn-sq-sm btn-default" data-toggle="collapse" data-parent="#accordion" href="#post" onclick="Mudarestado1('btn_foto');Mudarestado1('btn_produto');Mudarestado1('btn_youtube');Mudarestado1('btn_link');Mudarestado1('btn_publicidade')">
                                   <img src="https://img.icons8.com/color/30/000000/edit.png"><br/>
                                    Texto
                                </a>
                            </div>
                            <div class="col-sm-2" id="btn_produto">
                                <a class="btn btn-block btn-sq-sm btn-default" onclick="Mudarestado('adicinaPro')" data-toggle="modal" data-target="#modal-produto">
                                    <img src="https://img.icons8.com/color/30/000000/shopping-bag.png"><br/>
                                    Produto
                                </a>
                            </div>
                            <div class="col-sm-2" id="btn_youtube">
                                <a class="btn btn-block btn-sq-sm btn-default" data-toggle="collapse" data-parent="#accordion" href="#" onclick="Mudarestado1('btn_post');Mudarestado1('btn_produto');Mudarestado1('btn_foto');Mudarestado1('btn_link');Mudarestado1('btn_publicidade')">
                                    <img src="https://img.icons8.com/color/30/000000/camcorder-pro.png"><br/>
                                    Video 
                                </a>
                            </div>
                            <div class="col-sm-2" id="btn_link">
                                <a class="btn btn-block btn-sq-sm btn-default" data-toggle="collapse" data-parent="#accordion" href="#" onclick="Mudarestado1('btn_post');Mudarestado1('btn_produto');Mudarestado1('btn_youtube');Mudarestado1('btn_foto');Mudarestado1('btn_publicidade')">
                                    <img src="https://img.icons8.com/color/30/000000/link.png"><br/>
                                    Link
                                </a>
                            </div>
                            <div class="col-sm-2" id="btn_publicidade">
                                <a class="btn btn-block btn-sq-sm btn-default" data-toggle="collapse" data-parent="#accordion" href="#" onclick="Mudarestado1('btn_post');Mudarestado1('btn_produto');Mudarestado1('btn_youtube');Mudarestado1('btn_link');Mudarestado1('btn_foto')" >
                                    <img src="https://img.icons8.com/color/30/000000/commercial.png"><br/>
                                    Publicidade
                                </a>   
                            </div>      
                        </p>
			
			</div>
        </div>