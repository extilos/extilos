<?php 
$idBusca = intval($_GET['cd']/251);
$idLogado = $_SESSION['idLogado'];
//VERIFICA SE USUÁRIO TEM PERMIÇÃO PARA MOSTRAR AS INFOMAÇÕES DO BLOG
$valida = verifica_usu_pg($idUsuario,$idBusca);
  if($valida == 'erro'){
     header("Location: ../painel_usuario"); exit;
  }
?>
                <div class="card">
                  <div class="card-header card-header-success">
                    <div class="text-right" >
                    <a class="btn btn-sm btn-primary" onclick="history.go(-1)">Voltar</a>
                  </div>
                    <h4 class="card-title">Álbuns</h4>
                    <p class="card-category">Criar álbum para organizar as publicações</p>
                  </div>
                  <div class="card-body">
                    <div id="listaAlbum" ></div>
                    <form action="/extilos/cadastros/albumBlog.php" method="post" enctype="multipart/form-data" >
                      <div class="form-group col-sm-4">
                        <label for="album">Digite aqui o nome de um novo álbum.</label>
                        <input type="hidden" name="idPagina" id="idPagina" value="<?php echo $idBusca ?>">
                        <input type="hidden" name="local" value="<?php echo $_SERVER["REQUEST_URI"] ?>">
                        <input type="text" class="form-control" name="album" id="album" size="50">
                      </div>
                      <div id="resultadoPasta"></div>
                    </form>
                  </div>
                  <div class="card-body table-responsive">
                    <table class="table table-hover">
                      <thead class="text-warning text-center">
                        <th>Nome Album</th>
                        <th>Qtde Post</th>
                        <th colspan="2">Açao</th>
                      </thead>
                      <tbody>
                        <?php
                          $usu        = (isset($_GET['nm']))      ? '&nm='.$_GET['nm'] : null;
                          $pag        = (isset($_GET['pag']))     ? '&pag='.$_GET['pag'] : null;
                          $tp         = (isset($_GET['tp']))      ? '&tp='.$_GET['tp'] : null;
                          $album      = (isset($_GET['album']))   ? '&album='.$_GET['album'] : null;
                          $cd         = (isset($_GET['cd']))      ? '&cd='.$_GET['cd'] : null;
                          $pg         = (isset($_GET['pg']))      ? $_GET['pg'] : null;

                        $albuns = pasta_album_blog($idBusca);
                        $json_album = json_decode($albuns);
                        if (!isset($albuns)){
                          print_r($json_album);
                          echo '<td>Vazio</td>';
                        }else{
                          foreach (array_slice($json_album ,0,15) as $lista_album){ 
                            $qtdePost = total_post_album($lista_album->idAlbumBlog);
                            $idCheqAlbum = $lista_album->idAlbumBlog * 251;
                            ?>
                            <form action="editar_album_blog=<?php echo $lista->albumBlog ?>" method="post">
                              <input type="hidden" name="idAlb" value=<?php echo $lista_album->idAlbumBlog ?>>
                              <tr class="text-center">
                                <td><?php echo $lista_album->albumBlog ?></td>
                                <td><?php echo $qtdePost ?></td>
                                <td><a href="/extilos/<?php echo $pg.$usu.$pag.'&tp=editar_album_blog'.$album.$cd.'&pasta='.$idCheqAlbum ?>#albuns" name="botaoEdit" value="edit" class="btn btn-sm btn-success">Editar</a></td>
                                <?php 
                                if($qtdePost == 0 and $lista_album->albumBlog != 'album' ){
                                  ?>
                                  <td><button onclick="excluirAlbum('<?php echo $lista_album->idAlbumBlog ?>','<?php echo $_SERVER["REQUEST_URI"] ?>','blog'); atualizarPagina() "  class="btn btn-sm btn-danger">Excluir</button></td>
                                  <?php
                                }
                                ?>

                              </tr>
                            </form>

                            <?php 
                          } 
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>