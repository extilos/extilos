<?php
if(isset($_GET['tp'])){	
  $idBusca = intval($_GET['cd']/251);
  $dataAtual = date('d-m-Y');
  $blogs = lista_blog_torre($idBusca);
  $usuMarca = $usuario['usuMarca'];
  $idTorre = $idBusca;
  $idPagina = 0;
  $tipoPagina = 0;
  $local = 'Lista de Blogs Participantes ';
}else{
  header("Location: blog_fa"); exit;
}
?>
<div class="col-md-12">
  <div class="card">
    <div class="card-header card-header-warning">
    <div class="text-right" >
        <a class="btn btn-sm btn-primary" onclick="location.href='meus_blogs'">Voltar</a>
    </div>
      <h4 class="card-title"><?php echo $local ?></h4>
      <p class="card-category">Administrado por <?php echo $usuMarca ?></p>
    </div>
    <div class="card-body table-responsive">
     <form class="navbar-form">
      <div class="input-group no-border">
        <input type="hidden" id="idTorreBlog" value="<?php echo $idTorre ?>">
        <input type="text" id="admBlog" class="form-control" placeholder="Buscar Blog">
        <button class="btn btn-dark btn-round btn-just-icon" disabled="disabled">
          <i class="material-icons">search</i>
          <div class="ripple-container"></div>
        </button>
      </div>
    </form>
    <div id="respBlog">
      <table class="table table-hover">
        <thead class="text-warning">
          <th>Ativar</th>
          <th>Nome</th>
          <th>UF</th>
          <th>Cidade</th>
          <th>Email</th>
          <th>Desde</th>
          <th title="Publica de forma automática as postagens">Automatizar</th>
          <th>Publicações</th>
        </thead>
        <tbody>
          <?php
          $json_blog = json_decode($blogs);
          if(!isset($json_blog)){
            echo '<td>Vazio</td>';
          }else{
            foreach(array_slice($json_blog, 0, 10) as $lista_blog){
              $dataPassado = date('d-m-Y', strtotime('-2 days'));
              if(strtotime($lista_blog->pgData) >= strtotime($dataPassado)) {
                $novo = '<img src="../imagem/sistema/new.jpg" class="img-responsive" style="height: 25px">';
              }else{
                $novo = '';
              }
              ?>
              <form action="editar_fans" method="post">
                <input type="hidden" name="idPagina" value="<?php echo $lista->idUsuario  ?>">
                <tr>
                 <td class="text-center">
                   <div class="form-check">
                     <label class="form-check-label">
                     <?php if($lista_blog->pgAutorizado > 0){ ?>
                       <input class="form-check-input" type="checkbox" value="" checked>
                       <?php }else{ ?>
                       <input class="form-check-input" type="checkbox" value="">
                     <?php } ?>
                       <span class="form-check-sign">
                         <span class="check"></span>
                       </span>
                     </label>
                   </div>
                 </td>
                 <td><?php echo $novo.' '.$lista_blog->nomePagina ?></td>
                 <td><?php echo $lista_blog->estadoPagina ?></td>
                 <td><?php echo $lista_blog->cidadePagina ?></td>
                 <td><?php echo $lista_blog->emailPagina ?></td>
                 <td><?php echo $lista_blog->pgData ?></td>
                 <?php if($tipoPagina>0){ ?>
                 <td><input type="submit" value="Ações" class="btn btn-sm btn-warning"></td>
                 <?php } ?>
                 <td class="text-center">
                   <div class="form-check">
                     <label class="form-check-label">
                      <input class="hidden" type="checkbox" value="<?php echo $lista_blog->idPgTorre ?>" checked>
                      <?php if($lista_blog->pgPermite > 0){ ?>
                      <input class="form-check-input" type="checkbox" value="" checked>
                      <?php }else{ ?>
                      <input class="form-check-input" type="checkbox" value="">
                      <?php } ?>
                      <span class="form-check-sign">
                       <span class="check"></span>
                     </span>
                   </label>
                 </div>
               </td>
               <td><?php echo date('d-m-Y', strtotime('-2 days')) ?></td>
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