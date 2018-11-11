                <div class="card">
                  <div class="card-header card-header-success">
                    <h4 class="card-title">Pastas</h4>
                    <p class="card-category">Criar pasta para organizar as publicações</p>
                  </div>
                  <div class="card-body">
                    <form action="/extilos/cadastros/albumBlog.php" method="post" enctype="multipart/form-data" >
                                <div class="form-group">
                                    <label for="album">Digite o nome da nova pasta.</label>
                                    <input type="hidden" name="idPagina" value="<?php echo $blog['idPagina'] ?>">
                                    <input type="text" class="form-control" name="album" id="album" size="50">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-sm btn-block btn-secundary"> Criar</button>
                                </div>
                    </form>
                  </div>
                  <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning text-center">
                      <th>Nome Album</th>
                      <th>Qtde Post</th>
                      <th>Data</th>
                    </thead>
                    <tbody>
            <?php
            $albuns = pasta_album_blog($blog['idPagina']);
            $json_album = json_decode($albuns);
            if (!isset($albuns)){
              print_r($json_album);
              echo '<td>Vazio</td>';
            }else{
              foreach (array_slice($json_album ,0,15) as $lista_album){ 
                ?>
                <form action="editar_album_blog=<?php echo $lista->albumBlog ?>" method="post">
                <input type="hidden" name="idAlb" value=<?php echo $lista_album->idAlbumBlog ?>>
                      <tr class="text-center">
                        <td><?php echo $lista_album->albumBlog ?></td>
                        <td><?php echo $lista_album->data ?></td>
                        <td><button type="submit" name="botaoEdit" value="edit" class="btn btn-sm btn-success">Editar</button></td>
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