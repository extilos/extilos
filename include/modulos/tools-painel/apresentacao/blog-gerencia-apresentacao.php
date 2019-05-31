<?php 
$idBusca = intval($_GET['cd']/251);
$idLogado = $_SESSION['idLogado'];
//VERIFICA SE USUÁRIO TEM PERMIÇÃO PARA MOSTRAR AS INFOMAÇÕES DO BLOG
$valida = verifica_usu_pg($idUsuario,$idBusca);
  if($valida == 'erro'){
     header("Location: ../painel_usuario"); exit;
  }
$blog = busca_blog($idBusca); // faz consulta no conexoes.php para saber qual a página(blog) pelo id informado
$dadosPagina = dados_extra($idBusca,'blog'); // carrega os dados extras de cada pagina
$dadosPagina = json_decode($dadosPagina);
$idPagina = $blog['idPagina']; //retorna o id da página(blog)
$tipoPagina = $blog['tipoPagina']; //faz as verificalão se a página é gratuíta ou profissional
?>
<div class="card">
                <div class="card-header card-header-warning">
                  <div class="text-right" >
                    <a class="btn btn-sm btn-primary" onclick="history.go(-1)">Voltar</a>
                  </div>
                  <h4 class="card-title">Dados do Blog: <b><?php echo $blog['nomePagina'] ?></b></h4>
                      Estado:<b> <?php echo $blog['estadoPagina'] ?></b> | Cidade:
                    <b> <?php echo $blog['cidadePagina'] ?></b>
                  </div>
                  <div class="card-body">
                    <div id="Respdescritivo">
                      <h5 for="apresenta">Apresentação</h5>
                      <div class="card-header-default">
                        <textarea type="textarea" class="form-control" rows="6" id="apresenta"><?php echo $blog['descPagina'] ?></textarea>
                      </div>
                    <input type="hidden" id="local" value="blog">
                    <input type="hidden" id="idTorre" value="0">
                      <h5 for="contato">Contato</h5>
                        <div class="card-header-default">
                            <input type="text" name="telefone" id="telefone" placeholder="Telefone" class="form-control"  data-mask="(00)0000-0000" value="<?php echo $dadosPagina[0]->telefone ;?>">
                            <input type="text" name="celular" id="celular" placeholder="Celular" data-mask="(00)00000-0000" class="form-control" value="<?php echo $dadosPagina[0]->celular ;?>">
                            <input type="email" name="email" id="email" placeholder="Email de contato" class="form-control" value="<?php echo $dadosPagina[0]->email ;?>">
                            <textarea type="text" name="endereco" id="endereco" placeholder="Edereço Completo" class="form-control"><?php echo $dadosPagina[0]->endereco ;?></textarea>
                            <input type="text" name="site" id="site" placeholder="Site" class="form-control" value="<?php echo $dadosPagina[0]->site ;?>">
                          
                        </div>
                    </div>
                    <div class="text-center torre">
                      <button id="descritivo" onclick="attDesc('descritivo'); atualizarPagina()" class="btn btn-sm btn-block upload" style="display:none">Atualizar</button>
                    </div>                    
                  </div>
                </div>
    <script src="/extilos/js/jquery-1.11.1.min.js"></script> 
    <script src="/extilos/js/jquery.mask.js"></script>
    