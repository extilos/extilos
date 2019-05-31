<?php
            $torres = lista_torre($idUsuario);
            ?>
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Lista de Torres</h4>
                  <p class="card-category">Administrado por <?php echo $usuario['usuMarca'] ?></p>
                  <div class="text-right" >
                  <a href="cadastro_torre" class="btn btn-sm btn-success">Criar nova Torre</a>
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
                <form action="" method="post">
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
                        
                        <td><?php echo total_visitas_torre($lista['idTorre']) ?></td>

                        <td><?php echo fans_total_torre($lista['idTorre']) ?></td>

                        <td><?php echo conta_pagina_torre($lista['idTorre']) ?></td>

                        <td><?php echo total_post($lista['idTorre']) ?></td>

                        <td><a href="editar_torre&nm=<?php echo $lista['nomeTorre'].'&cd='.($lista['idTorre']*251).'&tp=relat_torre'?>" class="btn btn-sm btn-success">Editar</a></td>
                      </tr>
                </form>
            <?php endwhile; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>