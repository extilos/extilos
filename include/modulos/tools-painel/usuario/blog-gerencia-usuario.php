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
  $admPagina = usersAdm($idBusca); //pega os usuários que administram a página
  $paginaTorre = pagina_torre($idBusca); // buscam as torres que a página participa
  $quantAdm = adm_total($idBusca); // consulta a quantidade de admininstradores na página
  $usuPermite = usuarioAdm($idBusca,$idLogado); // consulta a quantidade de admininstradores na página

?>
            <div class="card ">
              <div class="card-header card-header-primary">
                <div class="text-right" >
                    <a class="btn btn-sm btn-warning" onclick="history.go(-1)">Voltar</a>
                  </div>
                <h4 class="card-title">Definições de usuários(<?php echo $_SESSION['nomeLogado'] ?>)</h4>
                <p class="card-category">Gerenciamento (maxímo <?php if($tipoPagina > 0){echo'20';}else{echo'3';}  ?> pessoas)</p>
              </div>
              <div class="card-body">
                <div class="panel panel-default sidebar-menu">
                  <?php if($admPagina > ''){ ?>
                    <form action="" method="post" id="formADM" enctype="multipart/form-data">
                      <input type="hidden" name="idPagina" id="idPagina" value="<?php echo $idPagina ?>">
                      <div class="panel-heading">
                        <h4><i class="fa fa-users-cog"></i> Gerenciamento da página <label for=""> Administrado por: <?php echo $quantAdm ?> usuário(s) </label></h4>
                      </div>
                      <table class="table table-hover">
                        <thead class="text-warning">
                          <th class="text-center">Ação</th>
                          <th class="text-center">Foto</th>
                          <th>Nick</th>
                          <th>Nome</th>
                          <th>Nivel</th>
                          <th>Email</th>
                          <th>UF</th>
                          <th>Cidade</th>
                        </thead>
                        <tbody>
                          <?php while ($pagina = $admPagina->fetch(PDO::FETCH_ASSOC)): //prepara o conteúdo para ser listado ?>
                            <tr>
                            <?php
                                  $idPermite = $pagina['idPermite'];
                                  $idUsuario = $pagina['idUsuario'];
                                  $userUsuario = busca_usuario($idUsuario); //consulta para trazer o nome do usuário dentro do while(for)
                                  $nomeUsuario = $userUsuario['usuMarca']; //retorna o @nomedousuario para exibir.
                                  $usuCadastrado = usuarioAdm($idPagina, $idUsuario);
                                  if($usuCadastrado['pm_post']>0){$post = '1.';$checkPost = 'checked';}else{$checkPost = '';$post = '';}
                                  if($usuCadastrado['pm_editar']>0){$editar = '2.';$checkEditar = 'checked';}else{$checkEditar = '';$editar = '';}
                                  if($usuCadastrado['pm_excluir']>0){$excluir = '3.';$checkExcluir = 'checked';}else{$checkExcluir = '';$excluir = '';}
                                  if($usuCadastrado['pm_cadastro']>0){$cadastro = '4.';$checkCadastro = 'checked';}else{$checkCadastro = '';$cadastro = '';}
                                  if($usuCadastrado['pm_financeiro']>0){$financeiro = '5.';$checkFinanceiro = 'checked';}else{$checkFinanceiro = '';$financeiro = '';}
                                  $nivel = ($post.$editar.$excluir.$cadastro.$financeiro);
                                  ?>
                                    <td class="text-center">
                                      <?php if($usuPermite['pm_editar'] > 0){ ?>
                                      <a  class="btn btn-sm btn-success" onclick="permitir('<?php echo $idPagina ?>','<?php echo $idUsuario ?>');permisoes()">Editar</a>
                                      <?php } if($usuPermite['pm_excluir'] > 0){ 
                                              if($usuPermite['idPermite'] != $usuCadastrado['idPermite']){
                                       ?>
                                      <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#excluirAdm">Excluir</a></td>
                                      <?php } } ?>

                                    <td class="text-center"><img src="../imagem/user/<?php echo $userUsuario['usuFoto'] ?>" alt="" class="img-responsive" style="height: 50px" ></td>
                                    <td><b><?php echo $userUsuario['usuMarca'] ?></b></td>
                                    <td><?php echo $userUsuario['nomeUsuario'] ?></td>
                                    <td> <?php echo $nivel ?></td>
                                    <td><?php echo $userUsuario['emailUsuario'] ?></td>
                                    <td><?php echo $userUsuario['usuEstado'] ?></td>
                                    <td><?php echo $userUsuario['usuCidade'] ?></td>
                                </tr>
                                <?php endwhile; } ?>
                              </tbody>
                            </table>
                            <?php if($usuPermite['pm_cadastro'] > 0){ ?>
                              <h5>Buscar usuários <small>(Lista de fãs)</small></h5>
                              <div id="buscaAdm" class="card-header-default">
                                <input type="text" class="form-control" id="adm" placeholder="@nome">
                              </div>
                            <?php } ?>
                            <input type="hidden" id="tipoPagina" value="<?php echo $tipoPagina ?>">
                            <div id="nomeAdm"></div>
                            <div id="respUsuarioAdm"></div>
                            </form>
                          <hr>
                        </div>

                      </div>
                      <div id="adicionaAdm"></div>
                      <div id="respUsuario"></div>
                    </div>
                    

<!-- Modal -->
<div class="modal fade" id="excluirAdm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Excluir</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Deseja realmente excluir este usuário?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="excluirAdm('<?php echo $idPermite ?>',atualizarPagina())">Sim</button>
      </div>
    </div>
  </div>
</div>