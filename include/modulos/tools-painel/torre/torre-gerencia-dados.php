<?php 
$idBusca = intval($_GET['cd']/251);
$idLogado = $_SESSION['idLogado'];
//VERIFICA SE USUÁRIO TEM PERMIÇÃO PARA MOSTRAR AS INFOMAÇÕES DO BLOG
$valida = verifica_usu_pg($idUsuario,$idBusca);
  if($valida == 'erro'){
     //header("Location: ../painel_usuario"); exit;
  }
$torre = topo_torre($idBusca); // faz consulta no conexoes.php para saber qual a página(blog) pelo id informado
$dadosPagina = dados_extra($idBusca, 'torre'); // carrega os dados extras de cada pagina
if(isset($dadosPagina)){
$dadosPagina = json_decode($dadosPagina);
$telefone = $dadosPagina[0]->telefone;
$celular = $dadosPagina[0]->celular;
$email = $dadosPagina[0]->email;
$endereco = $dadosPagina[0]->endereco;
$site = $dadosPagina[0]->site;
}else{
  $telefone = '';
  $celular = '';
  $email = '';
  $endereco = '';
  $site = '';
}
//$idPagina = $torre['torreImg']; //retorna o id da página(blog)
//$tipoPagina = $blog['tipoPagina']; //faz as verificalão se a página é gratuíta ou profissional

?>
              <div class="card">
                <div class="card-header card-header-warning">
                  <div class="text-right" >
                    <a class="btn btn-sm btn-primary" onclick="history.go(-1)">Voltar</a>
                  </div>
                  <h4 class="card-title">Dados do Blog: <b><?php echo $torre['nomeTorre'] ?></b></h4>
                      Estado:<b> <?php echo $torre['estadoTorre'] ?></b> | Cidade:
                    <b> <?php echo $torre['cidadeTorre'] ?></b>
                  </div>
                  <div class="card-body">
                    <div class="col-sm-5">
                      <h5 for="apresenta">Foto de Perfil</h5>
                    <div id="fotoCapa"  class="card">
                      <img src="../imagem/capa/media/<?php echo $torre['torreImg'] ?>" style="max-height: 250px" class="img-responsive" >
                    </div>
                    <input type="hidden" id="local" value="torre">
                    <input type="hidden" id="idUsuario" value="0">
                    <input type="hidden" id="idPagina" value="0">
                    <input type="hidden" id="idTorre" value="<?php echo $idBusca ?>">
                    <input type="hidden" id="local" value="torre">
                    <label for='upload_file' class="btn btn-sm btn-block btn-default">Alterar foto</label>
                    <input type="file" id="upload_file" name="imagem" multiple class="upload_file" accept="image/jpeg, image/png, image/jpg,"/>
                    <input id='upload_file' type='file' value='' />
                    <span id='file-name'></span>
                    <div class="text-center torre">
                      <input id="attImagem" onclick="attPagina('capa'); atualizarPagina()" class="btn btn-sm btn-block upload" value="Confirmar" style="display:none">
                      <div id="fotoCarrega"></div>
                      <div id="atualizado"></div>
                      <div id="atualizadoCapa"></div>
                    </div>
                  </div>
                    <div id="Respdescritivo" class="col-sm-12">
                      <hr>
                      <h5 for="apresenta">Apresentação</h5>
                      <div class="card-header-default col-sm-5">
                        <textarea type="textarea" class="form-control" rows="3" id="apresenta"><?php echo $torre['descTorre'] ?></textarea>
                      </div>
                      <hr>
                      <h5 for="contato">Contato</h5>
                        <div class="card-header-default col-sm-4">
                            <input type="text" name="telefone" id="telefone" placeholder="Telefone" class="form-control"  data-mask="(00)0000-0000" value="<?php echo $telefone ;?>">
                            <input type="text" name="celular" id="celular" placeholder="Celular" data-mask="(00)00000-0000" class="form-control" value="<?php echo $celular ;?>">
                            <input type="email" name="email" id="email" placeholder="Email de contato" class="form-control" value="<?php echo $email ;?>">
                            <textarea type="text" name="endereco" id="endereco" placeholder="Edereço Completo" class="form-control"><?php echo $endereco ;?></textarea>
                            <input type="text" name="site" id="site" placeholder="Site" class="form-control" value="<?php echo $site ;?>">
                          
                        </div>
                    </div>
                    <div class="text-center torre">
                      <button id="descritivo" onclick="attDesc('descritivo'); atualizarPagina()" class="btn btn-sm btn-block upload" style="display:none">Atualizar</button>
                    </div>                    
                  </div>
                </div>
             
    <script src="/extilos/js/jquery-1.11.1.min.js"></script> 
    <script src="/extilos/js/jquery.mask.js"></script>