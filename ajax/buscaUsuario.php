  <?php
  ob_start();
  session_start();

  include_once '../conn/init.php';
  include_once '../functions/functions.php';
  include_once '../functions/conexoes.php';
//recebe informação da página e o usuário desejado
  if (isset($_POST['adm'])){
   $consulta = $_POST['adm'];
   $idPagina = isset($_POST['idPagina']) ?  $_POST['idPagina'] : null;
   $idTorre = isset($_POST['idTorre']) ?  $_POST['idTorre'] : null;
   $letra = isset($_POST['letra']) ?  $_POST['letra'] : null;
   $localBusca = isset($_POST['localBusca']) ?  $_POST['localBusca'] : null;
   $tipoPagina = isset($_POST['tipoPagina']) ?  $_POST['tipoPagina'] : null;
   $PDO = db_connect();
  //faz a consulta para verificar se existe usuario fã da pagina para ser incluido como adm
   $busca = busca_lista_fans($consulta, $letra, $idPagina, $idTorre);
   $json = json_decode($busca);

  //echo $idPagina.'pg';
  //echo $consulta.'con';
  //echo $letra.'letr';
  //echo $idTorre.'tor';
  //echo $localBusca.'locBus';
  //echo $tipoPagina.'tip';

   if ($localBusca == 'lista'){
     ?>
     <table class="table table-hover">
       <thead class="text-warning">
        <th>Usuario</th>
        <th>Data</th>
        <th>UF</th>
        <th>Cidade</th>
      </thead>
      <tbody>
        <?php
        if($json == null){
          echo '<td><small>Vazio</small></td>';
        }else{
        //EXIBE A LISTA DE USUÁRIO ENCONTRADO COM LIMITE DE 10 REGISTROS
          foreach(array_slice($json, 0, 10) as $lista){ ?>
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
     <?php 
   }else{ 
    ?>
    <div class="box pesquisa">
      <table class="table table-hover">
        <thead class="text-warning text-center">
          <th>Add/Edit</th>
          <th>Foto</th>
          <th>Nick</th>
          <th>Nome</th>
          <th>Estado</th>
          <th>Cidade</th>
        </thead>
        <tbody>
          <?php 
          if($json == null){
            echo '<td><p>Vazio</p></td>';
          }else{
            foreach(array_slice($json, 0, 10) as $lista){ 
              $usuCadastrado = usuarioAdm($idPagina, $lista->idUsuario);
              if ($usuCadastrado == ''){
                ?>
                <tr>
                  <td class="text-center">
                    <button onclick="
                    permitir('<?php echo $idPagina ?>','<?php echo $lista->idUsuario ?>');
                    permisoes()
                    " class="btn btn-sm btn-success btn-block">Adicionar</button>
                  </td>
                  <td class="text-center"><img src="../imagem/user/<?php echo $lista->usuFoto ?>" alt="" class="img-responsive" style="height: 50px" ></td>
                  <td class="text-center"><?php echo $lista->arrobaUsuario ?></td>
                  <td class="text-center"><?php echo $lista->nomeUsuario ?></td>
                  <td class="text-center"><?php echo $lista->usuEstado ?></td>
                  <td class="text-center"><?php echo $lista->usuCidade ?></td>
                </tr>
              <?php }else{?>
                <tr>
                  <td class="text-center">já cadastrado.</td>
                  <td class="text-center"><img src="../imagem/user/<?php echo $lista->usuFoto ?>" alt="" class="img-responsive" style="height: 50px" ></td>
                  <td class="text-center"><?php echo $lista->arrobaUsuario ?></td>
                  <td class="text-center"><?php echo $lista->nomeUsuario ?></td>
                  <td class="text-center"><?php echo $lista->usuEstado ?></td>
                  <td class="text-center"><?php echo $lista->usuCidade ?></td>
                </tr>
              <?php } } }?>
            </tbody>
          </table>
        </div>
      <?php } }?>



      <?php
      if(isset($_POST['user'])){
       $idUsuario = $_POST['user'];
       $idPagina = $_POST['pagina'];
       $tipoPagina = $_POST['tipoPagina'];
       if($tipoPagina > 0){
        $limitAdm = '20';
      }else{
        $limitAdm = '5';
      }
      $quantAdm = adm_total($idPagina);
      $PDO = db_connect();
      $sql = "SELECT * FROM ext_usuarios WHERE idUsuario = $idUsuario";
      $stmt = $PDO->prepare($sql);
      $stmt->execute();
      $user = $stmt->fetch(PDO::FETCH_ASSOC);
      $nome = $user['nomeUsuario'];
      $arroba = $user['usuMarca'];
      $estado = $user['usuEstado'];
      $cidade = $user['usuCidade'];
      $usuCadastrado = usuarioAdm($idPagina, $idUsuario);
      ?>
      <div id="respostaUser">
        <?php 
        if($quantAdm >= $limitAdm){ 
          if($limitAdm == 3){
            ?>
            <p>Ops! O limite de administradores foi atingido</p>
            <label for="city">É permitido no máximo 03 administradores para o blog gratuíto e 20 para o blog profissinal. </label>
            <a onclick="cancelaUser()" class="btn btn-sm btn-block btn-default">Voltar</a>
            <?php 
          }else{ 
            ?>
            <p>Ops! O limite de administradores foi atingido</p>
            <label for="city">É permitido no máximo 20 administradores para o blog profissional. </label>
            <a onclick="cancelaUser()" class="btn btn-sm btn-block btn-default">Voltar</a>
            <?php
          }
        }else{ 
          ?>
        </div>
        <?php if($usuCadastrado['idPermite'] > 0){ ?>
        <div id="permitir">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">vpn_key</i>
              </div>
              <p class="card-category"></p>
              <h3 class="card-title">Permissões.
                <br><small><?php echo '('.$arroba.')' ?></small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats ">   
                <div class="form-group">
                  
                  <input type="hidden" name="idPermite" id="idPermite" value="<?php echo $usuCadastrado['idPermite'] ?>">
                  <input type="hidden" name="codigoAdm" id="codigoAdm" value="2">
                  <input type="hidden" id="nomeUser" name="nomeUser" value="<?php echo $idUsuario ?>">
                  <input type="hidden" name="idPagina" id="idPagina" value="<?php echo $idPagina ?>">
                  <p>Você permite este adm a realizar quais tarefas nesta página:</p>
                  <?php if($usuCadastrado['pm_post'] > 0){ ?>
                    <div class="switch__container">
                      <small>Postar Fotos e Contúdos.</small>
                      <input id="post" class="switch switch--shadow" name="post" type="checkbox" value="1" checked>
                      <label for="post"></label>
                    </div>
                  <?php }else{ ?>
                    <div class="switch__container">
                      <small>Postar Fotos e Contúdos.</small>
                      <input id="post" class="switch switch--shadow" name="post" type="checkbox" value="1" >
                      <label for="post"></label>
                    </div>
                  <?php } ?>
                  <?php if($usuCadastrado['pm_editar'] > 0){ ?>
                    <div class="switch__container">
                      <small>Editar configurações da página.</small>
                      <input id="editar" class="switch switch--shadow" name="editar" type="checkbox" value="1" checked>
                      <label for="editar"></label>
                    </div>
                  <?php }else{ ?>
                    <div class="switch__container">
                      <small>Editar configurações da página.</small>
                      <input id="editar" class="switch switch--shadow" name="editar" type="checkbox" value="1" >
                      <label for="editar"></label>
                    </div>
                  <?php } ?>
                  <?php if($usuCadastrado['pm_excluir'] > 0){ ?>
                    <div class="switch__container">
                      <small>Excluir postagens, fãs e conteúdos.</small>
                      <input id="excluir" class="switch switch--shadow" name="excluir" type="checkbox" value="1" checked>
                      <label for="excluir"></label>
                    </div>
                  <?php }else{ ?>
                    <div class="switch__container">
                      <small>Excluir postagens, fãs e conteúdos.</small>
                      <input id="excluir" class="switch switch--shadow" name="excluir" type="checkbox" value="1" >
                      <label for="excluir"></label>
                    </div>
                  <?php } ?>
                  <?php if($usuCadastrado['pm_cadastro'] > 0){ ?>
                    <div class="switch__container">
                      <small>Cadastrar em Torres e Publicidades.</small>
                      <input id="cadastro" class="switch switch--shadow" name="cadastro" type="checkbox" value="1" checked>
                      <label for="cadastro"></label>
                    </div>
                  <?php }else{ ?>
                    <div class="switch__container">
                      <small>Cadastrar em Torres e Publicidades.</small>
                      <input id="cadastro" class="switch switch--shadow" name="cadastro" type="checkbox" value="1" >
                      <label for="cadastro"></label>
                    </div>
                  <?php } ?>
                  <?php if($usuCadastrado['pm_financeiro'] > 0){ ?>
                    <div class="switch__container">
                      <small>Administrar assuntos financeiros.</small>
                      <input id="financeiro" class="switch switch--shadow" name="financeiro" type="checkbox" value="1" checked>
                      <label for="financeiro"></label>
                    </div>
                  <?php }else{ ?>
                    <div class="switch__container">
                      <small>Administrar assuntos financeiros.</small>
                      <input id="financeiro" class="switch switch--shadow" name="financeiro" type="checkbox" value="1" >
                      <label for="financeiro"></label>
                    </div>
                  <?php } ?>
                </div>  
              </div>
            </div>
            <a onclick="cadastrarUser(),atualizarPagina()" class="btn btn-sm btn-success">Atualizar</a>
            <button onclick="cancelaUser()" class="btn-sm btn-danger">Cancelar</button>
            <div id="atualizado"></div>
          </div>
      </div>

<?php }else{ ?>

       <div id="permitir">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">vpn_key</i>
              </div>
              <p class="card-category"></p>
              <h3 class="card-title">Permissões.
                <br><small><?php echo '('.$arroba.')' ?></small>
              </h3>
            </div>
            <div class="card-footer">
              <div class="stats ">   
                <div class="form-group">
                  
                  <input type="hidden" name="codigoAdm" id="codigoAdm" value="1">
                  <input type="hidden" id="nomeUser" name="nomeUser" value="<?php echo $idUsuario ?>">
                  <input type="hidden" name="idPagina" id="codigoAdm" value="<?php echo $idPagina ?>">
                  <p>Você permite este adm a realizar quais tarefas nesta página:</p>
                  
                    <div class="switch__container">
                      <small>Postar Fotos e Contúdos.</small>
                      <input id="post" class="switch switch--shadow" name="post" type="checkbox" value="1" >
                      <label for="post"></label>
                    </div>
                  
                    <div class="switch__container">
                      <small>Editar configurações da página.</small>
                      <input id="editar" class="switch switch--shadow" name="editar" type="checkbox" value="1" >
                      <label for="editar"></label>
                    </div>
                  
                    <div class="switch__container">
                      <small>Excluir postagens, fãs e conteúdos.</small>
                      <input id="excluir" class="switch switch--shadow" name="excluir" type="checkbox" value="1" >
                      <label for="excluir"></label>
                    </div>
                  
                    <div class="switch__container">
                      <small>Cadastrar em Torres e Publicidades.</small>
                      <input id="cadastro" class="switch switch--shadow" name="cadastro" type="checkbox" value="1" >
                      <label for="cadastro"></label>
                    </div>
                  
                    <div class="switch__container">
                      <small>Administrar assuntos financeiros.</small>
                      <input id="financeiro" class="switch switch--shadow" name="financeiro" type="checkbox" value="1" >
                      <label for="financeiro"></label>
                    </div>
                </div>  
              </div>
            </div>
            <a onclick="cadastrarUser(),atualizarPagina()" class="btn btn-sm btn-success">Cadastrar</a>
            
            <button onclick="cancelaUser()" class="btn-sm btn-danger">Cancelar</button>
            <div id="atualizado"></div>
          </div>
      </div>

      <?php } ?>

          <?php
        }

      }
      ?>