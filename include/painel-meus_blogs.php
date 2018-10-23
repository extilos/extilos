<?php
            $paginas = usuario_pagina($idUsuario);
            ?>
            <div class="col-md-12">
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
                      <th>Fãs</th>
                      <th>Config.</th>
                    </thead>
                    <tbody>
            <?php while ($lista = $paginas->fetch(PDO::FETCH_ASSOC)): ?>
                <form action="editar_blog=<?php echo $lista['nomePagina'] ?>" method="post">
                <input type="hidden" name="idPagina" value=<?php echo $lista['idPagina'] ?>>
                <input type="hidden" name="nomePagina" value=<?php echo $lista['nomePagina'] ?>>
                <input type="hidden" name="tipoPagina" value=<?php echo $lista['tipoPagina'] ?>>
                      <tr class="text-center">
                        <td><?php echo $lista['estadoPagina'] ?></td>
                        <td><?php echo $lista['cidadePagina'] ?></td>
                        <td><?php echo $lista['nomePagina'] ?></td>
                        <td><?php if($lista['tipoPagina']>0){echo '<b>Profissional</b>';}else{echo 'Gratuíto';}?></td>
                        <td><button type="submit" name="botaoRelat" value="relat" class="btn btn-sm btn-dafault">
                        1</button></td>
                        <td><button  type="submit" name="botaoFans" value="fans" class="btn btn-sm btn-dafault"><?php echo fans_total($lista['idPagina']) ?></button></td>
                        <td><button type="submit" name="botaoEdit" value="edit" class="btn btn-sm btn-success">Editar</button></td>
                      </tr>
                </form>
            <?php endwhile; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>