<?php 
$idBusca = intval($_GET['cd']/251);
$idLogado = $_SESSION['idLogado'];
//VERIFICA SE USUÁRIO TEM PERMIÇÃO PARA MOSTRAR AS INFOMAÇÕES DO BLOG
$valida = verifica_usu_pg($idUsuario,$idBusca);
  if($valida == 'erro'){
     header("Location: ../painel_usuario"); exit;
  }
$blog = busca_blog($idBusca); // faz consulta no conexoes.php para saber qual a página(blog) pelo id informado
$dadosPagina = dados_extra($idBusca, 'blog'); // carrega os dados extras de cada pagina
$dadosPagina = json_decode($dadosPagina);
$idPagina = $blog['idPagina']; //retorna o id da página(blog)
$tipoPagina = $blog['tipoPagina']; //faz as verificalão se a página é gratuíta ou profissional

?>
              <div class="card">
                  <div class="card-header card-header-primary">
                    <div class="text-right" >
                    <a class="btn btn-sm btn-warning" onclick="history.go(-1)">Voltar</a>
                  </div>
                    <h4 class="card-title">Foto de Capa</h4>
                    <p class="card-category">Alterar a foto de capa do blog</p>
                  </div>
                  <div class="card-body">
                    <div id="fotoCapa"  class="card">
                      <img src="../imagem/capa/media/<?php echo $blog['pgCapa'] ?>" style="max-height: 250px" class="img-responsive" >
                    </div>
                    <input type="hidden" id="local" value="blog">
                    <input type="hidden" id="idUsuario" value="0">
                    <input type="hidden" id="idTorre" value="0">
                    <label for='upload_file' class="btn btn-sm btn-block btn-default">Alterar foto</label>
                    <input type="file" id="upload_file" name="imagem" multiple class="upload_file" accept="image/jpeg, image/png, image/jpg,"/>
                    <input id='upload_file' type='file' value='' />
                    <span id='file-name'></span>
                    <div class="text-center torre">
                      <input id="attImagem" onclick="attPagina('capa')" class="btn btn-sm btn-block upload" value="Atualizar" style="display:none">
                      <div id="fotoCarrega"></div>
                      <div id="atualizado"></div>
                      <div id="atualizadoCapa"></div>
                    </div>
                  </div>
                </div>