<?php
            $torres = lista_torre($idUsuario);
            ?>
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Lista de Torres</h4>
                  <p class="card-category">Administrado por <?php echo $usuario['usuMarca'] ?></p>
                  <div class="text-right" >
<<<<<<< HEAD
                  <a href="cadastro_torre" class="btn btn-sm btn-success">Criar nova Torre</a>
=======
                  <a href="cadastro_torre" class="btn btn-sm btn-success">Criar novo blog</a>
>>>>>>> adc18539d984a9e5de305db099b9be8de01686f4
                  </div>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning text-center">
                      <th>UF</th>
                      <th>Cidade</th>
                      <th>Blog</th>
                      <th>Tipo</th>
                      <th>Visitas</th>
                      <th>Fãs</th>
                      <th>Blog</th>
                      <th>Post</th>
                      <th>Config.</th>
                    </thead>
                    <tbody>
            <?php while ($lista = $torres->fetch(PDO::FETCH_ASSOC)): ?>
                <form action="editar_torre=<?php echo $lista['nomeTorre'] ?>" method="post">
                      <input type="hidden" name="idTorre" value=<?php echo $lista['idTorre'] ?>>
                      <input type="hidden" name="nomeTorre" value=<?php echo $lista['nomeTorre'] ?>>
                      <input type="hidden" name="descTorre" value=<?php echo $lista['descTorre'] ?>>
                      <input type="hidden" name="torreImg" value=<?php echo $lista['torreImg'] ?>>
                      <input type="hidden" name="cidadeTorre" value=<?php echo $lista['cidadeTorre'] ?>>
                      <input type="hidden" name="estadoTorre" value=<?php echo $lista['estadoTorre'] ?>>
                      <input type="hidden" name="tipoTorre" value=<?php echo $lista['tipoTorre'] ?>>
                      <input type="hidden" name="publicTorre" value=<?php echo $lista['publicTorre'] ?>>
                      <input type="hidden" name="permiteTorre" value=<?php echo $lista['permiteTorre'] ?>>
                      <input type="hidden" name="setorTorre" value=<?php echo $lista['setorTorre'] ?>>
                      <input type="hidden" name="situacaoTorre" value=<?php echo $lista['situacaoTorre'] ?>>
                      <?php
                      if(!isset($lista)){echo 'Você ainda não tem participação em alguma torre.';}
                      if($lista['situacaoTorre']==0){$situacao = 'Aguardando';}
                      if($lista['situacaoTorre']==1){$situacao = '<b>Liberado</b>';}
                      ?>
                      <tr class="text-center">
                        <td><?php echo $lista['estadoTorre'] ?></td>
                        <td><?php echo $lista['cidadeTorre'] ?></td>
                        <td><?php echo $lista['nomeTorre'] ?></td>
                        <td><?php echo $situacao ?></td>
                        <td><button type="submit" name="botaoRelat" value="relat" class="btn btn-sm btn-dafault">
                        1</button></td>
                        <td><button  type="submit" name="botaoFans" value="fans" class="btn btn-sm btn-dafault"><?php echo fans_total_torre($lista['idTorre']) ?></button></td>
                        <td><button  type="submit" name="botaoBlog" value="blog" class="btn btn-sm btn-dafault"><?php echo conta_pagina_torre($lista['idTorre']) ?></button></td>
                        <td><button  type="submit" name="botaoPost" value="post" class="btn btn-sm btn-dafault"><?php echo total_post($lista['idTorre']) ?></button></td>
                        <td><button  type="submit" name="botaoEditar" value="editar" class="btn btn-sm btn-success">Editar</button></td>
                      </tr>
                </form>
            <?php endwhile; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>