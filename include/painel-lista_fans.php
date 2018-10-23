<?php
            if (isset($_POST['idPagina'])){
              $fans = busca_fans($_POST['idPagina'],0);
              $nomePagina = $_POST['nomePagina'];
              $usuMarca = $usuario['usuMarca'];
              $idPagina = $_POST['idPagina'];
              $idTorre = 0;
              $tipoPagina = $_POST['tipoPagina'];
              $local = 'Lista de Fãs do Blog: ';
            }elseif(isset($_POST['idTorre'])){
              $fans = busca_fans(0,$_POST['idTorre']);
              $nomePagina = $_POST['nomeTorre'];
              $usuMarca = $usuario['usuMarca'];
              $idTorre = $_POST['idTorre'];
              $idPagina = 0;
              $tipoPagina = 0;
              $local = 'Lista de Fãs da Torre: ';
            }else{
                header("Location: blog_fa"); exit;
            }
            ?>
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                <div class="text-right" >
                    <a class="btn btn-sm btn-primary" onclick='history.go(-1)'>Voltar</a>
                  </div>
                  <h4 class="card-title"><?php echo $local.$nomePagina ?></h4>
                  <p class="card-category">Administrado por <?php echo $usuMarca ?></p>
                </div>
                <div class="card-body table-responsive">
                  <div class="alfabeto">
                    <a onclick="buscarUsuario('')">TODOS-</a>
                    <a onclick="buscarUsuario('@a')">A-</a>
                    <a onclick="buscarUsuario('@b')">B-</a>
                    <a onclick="buscarUsuario('@c')">C-</a>
                    <a onclick="buscarUsuario('@d')">D-</a>
                    <a onclick="buscarUsuario('@e')">E-</a>
                    <a onclick="buscarUsuario('@f')">F-</a>
                    <a onclick="buscarUsuario('@g')">G-</a>
                    <a onclick="buscarUsuario('@h')">H-</a>
                    <a onclick="buscarUsuario('@i')">I-</a>
                    <a onclick="buscarUsuario('@j')">J-</a>
                    <a onclick="buscarUsuario('@k')">K-</a>
                    <a onclick="buscarUsuario('@l')">L-</a>
                    <a onclick="buscarUsuario('@m')">M-</a>
                    <a onclick="buscarUsuario('@n')">N-</a>
                    <a onclick="buscarUsuario('@o')">O-</a>
                    <a onclick="buscarUsuario('@p')">P-</a>
                    <a onclick="buscarUsuario('@q')">Q-</a>
                    <a onclick="buscarUsuario('@r')">R-</a>
                    <a onclick="buscarUsuario('@s')">S-</a>
                    <a onclick="buscarUsuario('@t')">T-</a>
                    <a onclick="buscarUsuario('@u')">U-</a>
                    <a onclick="buscarUsuario('@v')">V-</a>
                    <a onclick="buscarUsuario('@x')">X-</a>
                    <a onclick="buscarUsuario('@z')">Z</a>
                  </div>
                    
                	<form class="navbar-form">
		              <div class="input-group no-border">
		            <input type="hidden" id="idPagina" value="<?php echo $idPagina ?>">
                <input type="hidden" id="idTorre" value="<?php echo $idTorre ?>">
		            <input type="hidden" id="localBusca" value="lista">
                	<input type="hidden" id="tipoPagina" value="<?php echo $tipoPagina ?>">
		                <input type="text" id="adm" class="form-control" placeholder="Buscar Usuario">
		                <button class="btn btn-dark btn-round btn-just-icon" disabled="disabled">
		                  <i class="material-icons">search</i>
		                  <div class="ripple-container"></div>
		                </button>
		              </div>
		            </form>
		            <div id="respUsuario">
                  <table class="table table-hover">
                    <thead class="text-warning">
                      <th>Usuario</th>
                      <th>Data</th>
                      <th>UF</th>
                      <th>Cidade</th>
                    </thead>
		        		<tbody>
				            <?php
                      $json = json_decode($fans);
                      if(!isset($json)){
                        echo '<td>Vazio</td>';
                      }else{
                      foreach(array_slice($json, 0, 10) as $lista){
                        ?>
                        <form action="editar_fans" method="post">
                        <input type="hidden" name="idPagina" value="<?php echo $lista->idUsuario  ?>">
				                      <tr>
				                        <td><?php echo $lista->arrobaUsuario ?></td>
				                        <td><?php echo $lista->dataSolicita ?></td>
				                        <td><?php echo $lista->usuEstado ?></td>
				                        <td><?php echo $lista->usuCidade ?></td>
				                        <?php if($tipoPagina>0){ ?>
				                        <td><input type="submit" value="Ações" class="btn btn-sm btn-warning"></td>
				                        <?php } ?>
				                      </tr>
                        </form>
				                <?php } } ?>
                    	</tbody>
                  </table>
                  </div>
                </div>
              </div>
            </div>
            <!--
            <div class="col-md-4">
            <div class="col-md-12">
              <div class="card card-profile">
                <div class="card-body">
                  <h6 class="card-category text-gray">Gratuíto</h6><hr>
                  <p class="card-description">
                    03 Moderadores<br>
                    Recebe 50% do valor das publicidades <br>
                    Participar de até 10 torres <br>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card card-profile">
                <div class="card-body">
                  <h6 class="card-category text-gray">Profissional | <b>R$20,00 anual</b></h6><hr>
                  <p class="card-description">
                    Moderadores Ilimitados<br>
                    Recebe 80% do valor das publicidades<br>
                    Participar de até 10 torres<br>
                    Publicar Produtos<br>
                    Controle de Dados<br>
                    Painel de Clientes<br>

                  </p>
                </div>
              </div>
            </div>
            </div> -->