<?php
if(isset($_GET['tp'])){	
  $idBusca = intval($_GET['cd']/251);
  $dataAtual = date('d-m-Y');
  $blogs = busca_pagina_adm($idBusca);
  $usuMarca = $usuario['usuMarca'];
  $idTorre = $idBusca;
  $idPagina = 0;
  $tipoPagina = 0;
  $local = 'Meus Blogs';
}else{
  header("Location: blog_fa"); exit;
}
?>
  <div class="card">
    <div class="card-header card-header-warning">
      <h4 class="card-title"><?php echo $local ?></h4>
      <p class="card-category">Administrado por <b><?php echo $usuMarca ?></b></p>
    </div>
    <div class="card-body table-responsive">
      <div id="respBlog">
        <table class="table table-hover">
          <thead class="text-warning">
            <th>Nome</th>
            <th>UF</th>
            <th>Cidade</th>
            <th>Email</th>
            <th>Data</th>
            <th>Postar</th>
            <th>Editar</th>
            <th>Excluir</th>
            <th>Cadastrar</th>
            <th>Financeiro</th>
          </thead>
          <tbody>
            <?php
            $json_blog = json_decode($blogs);
            if(!isset($json_blog)){
              echo '<td>Vazio</td>';
            }else{
              foreach(array_slice($json_blog, 0, 10) as $lista_blog){
                $dataPassado = date('d-m-Y', strtotime('-2 days'));
                if(strtotime($lista_blog->dataPagina) >= strtotime($dataPassado)) {
                  $novo = '<img src="../imagem/sistema/new.jpg" class="img-responsive" style="height: 25px">';
                }else{
                  $novo = '';
                }
                ?>
                <form action="editar_fans" method="post">
                  <input type="hidden" name="idPagina" value="<?php echo $lista->idUsuario  ?>">
                  <tr>

                   <td><?php echo $novo.' '.$lista_blog->nomePagina ?></td>
                   <td><?php echo $lista_blog->estadoPagina ?></td>
                   <td><?php echo $lista_blog->cidadePagina ?></td>
                   <td><?php echo $lista_blog->emailPagina ?></td>
                   <td><?php echo $lista_blog->dataPagina ?></td>
                   <?php if($tipoPagina>0){ ?>
                     <td><input type="submit" value="Ações" class="btn btn-sm btn-warning"></td>
                   <?php } ?>
                   <td class="text-center">
                     <div class="form-check">
                       <label class="form-check-label">
                         <?php if($lista_blog->pm_post > 0){ ?>
                           <input class="form-check-input" type="checkbox" value="" checked disabled>
                         <?php }else{ ?>
                           <input class="form-check-input" type="checkbox" value="" disabled>
                         <?php } ?>
                         <span class="form-check-sign">
                           <span class="check"></span>
                         </span>
                       </label>
                     </div>
                   </td>
                   <td class="text-center">
                     <div class="form-check">
                       <label class="form-check-label">
                        <input class="hidden" type="checkbox" value="<?php echo $lista_blog->idPgTorre ?>" checked disabled>
                        <?php if($lista_blog->pm_editar > 0){ ?>
                          <input class="form-check-input" type="checkbox" value="" checked disabled>
                        <?php }else{ ?>
                          <input class="form-check-input" type="checkbox" value="">
                        <?php } ?>
                        <span class="form-check-sign">
                         <span class="check"></span>
                       </span>
                     </label>
                   </div>
                 </td>
                 <td class="text-center">
                   <div class="form-check">
                     <label class="form-check-label">
                      <input class="hidden" type="checkbox" value="<?php echo $lista_blog->idPgTorre ?>" checked disabled>
                      <?php if($lista_blog->pm_excluir > 0){ ?>
                        <input class="form-check-input" type="checkbox" value="" checked disabled>
                      <?php }else{ ?>
                        <input class="form-check-input" type="checkbox" value="">
                      <?php } ?>
                      <span class="form-check-sign">
                       <span class="check"></span>
                     </span>
                   </label>
                 </div>
               </td>
               <td class="text-center">
                 <div class="form-check">
                   <label class="form-check-label">
                    <input class="hidden" type="checkbox" value="<?php echo $lista_blog->idPgTorre ?>" checked disabled>
                    <?php if($lista_blog->pm_cadastro > 0){ ?>
                      <input class="form-check-input" type="checkbox" value="" checked disabled>
                    <?php }else{ ?>
                      <input class="form-check-input" type="checkbox" value="">
                    <?php } ?>
                    <span class="form-check-sign">
                     <span class="check"></span>
                   </span>
                 </label>
               </div>
             </td>
             <td class="text-center">
               <div class="form-check">
                 <label class="form-check-label">
                  <input class="hidden" type="checkbox" value="<?php echo $lista_blog->idPgTorre ?>" checked disabled>
                  <?php if($lista_blog->pm_financeiro > 0){ ?>
                    <input class="form-check-input" type="checkbox" value="" checked disabled>
                  <?php }else{ ?>
                    <input class="form-check-input" type="checkbox" value="">
                  <?php } ?>
                  <span class="form-check-sign">
                   <span class="check"></span>
                 </span>
               </label>
             </div>
           </td>
         </tr>
       </form>
     <?php } } ?>
   </tbody>
 </table>
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