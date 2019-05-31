<?php
if(isset($_GET['tp'])){	
  $idBusca = intval($_GET['cd']/251);
  $dataAtual = date('d-m-Y');
  $listaTorres = busca_pagina_torre($idBusca);
  $usuMarca = $usuario['usuMarca'];
  $idTorre = $idBusca;
  $idPagina = 0;
  $tipoPagina = 0;
  $local = 'Lista de Torres ';
}else{
  header("Location: blog_fa"); exit;
}
?>
<div class="col-md-12">
  <div class="card">
    <div class="card-header card-header-warning">
      <div class="text-right" >
        <a class="btn btn-sm btn-primary" onclick="history.go(-1)">Voltar</a>
        <a class="btn btn-sm btn-success" onclick="history.go(0)">Atualizar</a>
      </div>
      <h4 class="card-title"><?php  echo $local ?></h4>
      <p class="card-category">Administrado por <?php echo $usuMarca ?></p>
    </div>
    <div class="card-body table-responsive">
     <form class="navbar-form"  method="post" id="formADM" enctype="multipart/form-data">
      <input type="hidden" name="idPagina" id="idPagina" value="<?php echo $idBusca ?>">
      <input type="hidden" id="tipoPagina" value="<?php echo $tipoPagina ?>">
      <div id='buscandoTorre'>
      <div class="input-group no-border">
        <input type="hidden" id="buscaAdm" value="<?php echo $idTorre ?>">
        <input type="text" id="search-box" class="form-control" placeholder="Buscar Torres">
        <button class="btn btn-dark btn-round btn-just-icon" disabled="disabled">
          <i class="material-icons">search</i>
          <div class="ripple-container"></div>
        </button>
      </div>
    </div>
    </form>
    <div id="suggesstion-box"></div>
    <div>
      <table class="table table-hover">
        <thead class="text-warning text-center">
          <th>Foto</th>
          <th>Nome</th>
          <th>Situação</th>
          <th>Ativar</th>
          <th>Cidade</th>
          <th>UF</th>
          <th>Modelo</th>
          <th>Tipo</th>
          <th>Setor</th>
        </thead>
        <tbody>
          <?php
          $json_torre = json_decode($listaTorres);
          if(!isset($json_torre)){
            echo '<td>Vazio</td>';
          }else{
            foreach(array_slice($json_torre, 0, 10) as $lista_torre){
             // $dataPassado = date('d-m-Y', strtotime('-2 days'));
             // if(strtotime($lista_blog->pgData) >= strtotime($dataPassado)) {
             //   $novo = '<img src="../imagem/sistema/new.jpg" class="img-responsive" style="height: 25px">';
             // }else{
             //   $novo = '';
             // }
              if($lista_torre->tipoTorre > 0){$tipoTorre = 'Profissional';}else{$tipoTorre = 'Gratuíto';}
              if($lista_torre->publicTorre > 0){$publicTorre = 'Privada';}else{$publicTorre = 'Pública';}
              if($lista_torre->setorTorre == 1)
                {$setorTorre = 'Vestuário / Acessórios';}
              elseif($lista_torre->setorTorre == 2)
                {$setorTorre = 'Corpo / Beleza';}
              elseif($lista_torre->setorTorre == 3)
                {$setorTorre = 'Locais / Fotografia';}
              elseif($lista_torre->setorTorre == 4)
                {$setorTorre = 'Dicas / Informações';}
              elseif($lista_torre->setorTorre == 4)
                {$setorTorre = 'Eventos Locais';}else{$setorTorre='Diversos';}

              ?>
              <form action="editar_fans" method="post">
                <input type="hidden" name="idPagina" value="<?php echo $lista_torre->idPgTorre  ?>">
                <tr class="text-center">
                  <td><img src="/extilos/imagem/torre/<?php echo $lista_torre->torreImg; ?>" alt="" class="img-responsive" style="height: 50px" >
                  </td>
                  <td><?php echo $lista_torre->nomeTorre.$lista_torre->idTorre; ?></td>
                  <td><b><?php echo $lista_torre->retorno; ?></b></td>
                  <td>
                    <div class="switch__container">
                        <?php  
                          if($lista_torre->retorno == 'Aprovado'){
                        if($lista_torre->pgAtivar > 0) { ?>
                          <input onclick="selTorre(<?php echo $lista_torre->idTorre ?>,<?php echo $idBusca ?>)" id="<?php echo $lista_torre->nomeTorre ?>" class="switch switch--shadow" name="check_list[]" type="checkbox" value="paginaPHP" checked>
                          <label for="<?php echo $lista_torre->nomeTorre ?>"></label>
                        <?php } else {   ?>
                          <input onclick="selTorre(<?php echo $lista_torre  ->idTorre ?>,<?php echo $idBusca ?>)" id="<?php echo $lista_torre->nomeTorre ?>" class="switch switch--shadow" name="check_list[]" type="checkbox" value="paginaPHP" >
                          <label for="<?php echo $lista_torre->nomeTorre ?>"></label>
                        <?php } 
                           }
                        ?>
                    </div>
                  </td>
                  <td><?php echo $lista_torre->cidadeTorre; ?></td>
                  <td><?php echo $lista_torre->estadoTorre; ?></td>
                  <td><?php echo $publicTorre; ?></td>
                  <td><?php echo $tipoTorre; ?></td>
                  <td><?php echo $setorTorre; ?></td>
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