<div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Cadastro de Blog</h4>
                  <p class="card-category">Crie um blog para publicar as suas fotos e, ganhar um dinheiro extra no fim do mês.</p>
                  <div class="text-right">
                        <a href="meus_blogs" class="btn btn-sm btn-warning">Meus Blogs</a>
                      </div>
                </div>
                <div class="card-body">
                  <form action="../cadastros/pagina-gratuita.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                        <div class="bmd-label-floating" id="resultado"></div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Escolha o nome para seu blog ou loja.</label>
                          <input type="text" name="pagina" id="pagina" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email de Administração</label>
                          <input type="email" class="form-control" name="emailPagina" id="emailPagina" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email de Usuário</label>
                          <input type="email" class="form-control" value="<?php echo $usuario['emailUsuario'] ?>" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Estado</label>
                            <select name="estadoPagina" id="estados" class="form-control" required>
                                <option value=""></option>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Cidade</label>
                            <select name="cidadePagina" id="cidades" class="form-control" required>
                                <option value=""></option>
                            </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Sobre</label>
                          <div class="form-group">
                            <label class="bmd-label-floating"> Crie uma breve apresentação de sua página, para que os visitantes conheçam seus conteúdos e preferências.</label>
                            <textarea class="form-control" rows="3" name="descPagina" id="descPagina" required></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                       <div class="form-check">
  <div class="form-check">
  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
  <label class="form-check-label" for="exampleRadios1">
    Default radio
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
  <label class="form-check-label" for="exampleRadios2">
    Second default radio
  </label>
</div>
<div class="form-check disabled">
  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3" disabled>
  <label class="form-check-label" for="exampleRadios3">
    Disabled radio
  </label>
</div>
                    </div>
                    <input type="submit" class="btn btn-lg btn-block btn-primary" name='criarPagina' id="criarPagina" value="CRIAR BLOG" disabled="true">
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
            <div class="col-md-12">
              <div class="card card-profile">
                <div class="card-body">
                  <h6 class="card-category text-gray">Blog Gratuíto</h6><hr>
                  <p class="card-description">
                    05 Moderadores<br>
                    Recebe 50% do valor das publicidades <br>
                    Participar de até 10 torres <br>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card card-profile">
                <div class="card-body">
                  <h6 class="card-category text-gray">Blog Profissional | <b>R$20,00 anual</b></h6><hr>
                  <p class="card-description">
                    20 Moderadores<br>
                    Recebe 80% do valor das publicidades<br>
                    Participar de até 10 torres<br>
                    Publicar Produtos<br>
                    Controle de Dados<br>
                    Painel de Clientes<br>

                  </p>
                </div>
              </div>
            </div>
            </div>
            <script>
              <!-- javascript init -->
$('.bootstrap-switch').each(function(){
    $this = $(this);
    data_on_label = $this.data('on-label') || '';
    data_off_label = $this.data('off-label') || '';

    $this.bootstrapSwitch({
        onText: data_on_label,
        offText: data_off_label
    });
});
              
            </script>