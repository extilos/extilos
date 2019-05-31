<?php
            $paginas = usuario_pagina($idUsuario);
            ?>
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Lista de Blogs-<?php echo $idUsuario.'tirar' ?></h4>
                  <p class="card-category">Administrado por <?php echo $usuario['usuMarca'] ?></p>
                  <div class="text-right" >
                  <a href="cadastro_blog" class="btn btn-sm btn-success">Criar novo blog</a>
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
                      <th>Torres</th>
                      <th>Fãs</th>
                      <th>Post</th>
                      <th>Config.</th>
                    </thead>
                    <tbody>
            <?php while ($lista = $paginas->fetch(PDO::FETCH_ASSOC)): ?>
                <form action="" method="post">
                      <tr class="text-center">
                        <td><?php echo $lista['estadoPagina'] ?></td>
                        <td><?php echo $lista['cidadePagina'] ?></td>
                        <td><?php echo $lista['nomePagina'] ?></td>
                        <td><?php if($lista['tipoPagina']>0){echo '<b>Profissional</b>';}else{echo 'Gratuíto';}?></td>
                        <td><?php echo total_visitas_pagina($lista['idPagina']) ?></td>
                        <td><?php echo conta_torre_pagina_valida($lista['idPagina']) ?></td>
                        <td><?php echo fans_total($lista['idPagina']) ?></td>
                        <td><?php echo total_post_pagina($lista['idPagina']) ?></td>
                        <td><a href="editar_blog&nm=<?php echo $lista['nomePagina'].'&cd='.($lista['idPagina']*251).'&tp=relat_blog'?>" class="btn btn-sm btn-success">Editar</a></td>
                      </tr>
                </form>
            <?php endwhile; ?>
                    </tbody>
                  </table>
                </div>
              </div>