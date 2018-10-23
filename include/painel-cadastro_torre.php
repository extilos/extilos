<div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Cadastro de Torre</h4>
                  <p class="card-category">Crie um blog para publicar as suas fotos e, ganhar um dinheiro extra no fim do mês.</p>
                  <div class="text-right">
                        <a href="minhas_torres" class="btn btn-sm btn-warning">Minhas Torres</a>
                      </div>
                </div>
                <div class="card-body">
                  <form action="../cadastros/cadastro-torre.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                        <div class="bmd-label-floating" id="resultado"></div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Escolha o nome para sua Torre.</label>
                          <input type="text" name="nomePagina" id="torre" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email para contato</label>
                          <input type="email" class="form-control" name="emailTorre" id="emailPagina" required>
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
                            <select name="estadoTorre" id="estados" class="form-control" required>
                                <option value=""></option>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Cidade</label>
                            <select name="cidadeTorre" id="cidades" class="form-control" required>
                                <option value=""></option>
                            </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Selecione o Tipo de Conteúdo</label>
                            <select name="setorTorre" class="form-control" required>
                                <option value="1">Vestuário / Acessórios</option>
                                <option value="2">Corpo / Beleza</option>
                                <option value="3">Locais / Fotografia</option>
                                <option value="4">Dicas / Informações</option>
                                <option value="4">Eventos Locais</option>
                            </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tipo de torre</label>
                            <select name="publicTorre" class="form-control" required>
                                <option value="0">Livre</option>
                                <option value="1">Fechada</option>
                            </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Sobre sua torre</label>
                          <div class="form-group">
                            <label class="bmd-label-floating"> Escreva sobre sua torre e os conteúdos que serão apresentados para seus visitantes.</label>
                            <textarea class="form-control" rows="3" name="descTorre" required></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                <section class="pricing">
  					<label>Escolha um plano</label>
  					<div class="container">
                    <div class="row">
                       <div class="col-lg-6">
					        <div class="card mb-5 mb-lg-0">
					          <div class="card-body">
					            <h5 class="card-title text-muted text-uppercase text-center">BRONZE</h5>
					            <h6 class="card-price text-center">R$ 50,00<span class="period">/anual</span></h6>
					            <hr>
					            <ul class="fa-ul">
					              <li><span class="fa-li"><i class="fa fa-check"></i></span>extilos.com/SUA_TORRE</li>
					              <li><span class="fa-li"><i class="fa fa-check"></i></span>3 Administradores</li>
					              <li><span class="fa-li"><i class="fa fa-check"></i></span>Até 30 blog Gratuítos</li>
					              <li><span class="fa-li"><i class="fa fa-check"></i></span>Até 20 blog Profissionais</li>
					              <li><span class="fa-li"><i class="fa fa-check"></i></span>Painel de Gerenciamento</li>
					              <li><span class="fa-li"><i class="fa fa-check"></i></span>Total de 10 Áreas Publicitárias</li>
					              <li>Recebe 70% dos valores em 4 áreas publicitárias.</li>
					              <li>Recebe 100% do valor em 1 área publicitária.</li>
					            </ul>
					          </div>
					        </div>
					      </div>
					      <div class="col-lg-6">
					        <div class="card mb-5 mb-lg-0">
					          <div class="card-body">
					            <h5 class="card-title text-muted text-uppercase text-center">PRATA</h5>
					            <h6 class="card-price text-center">R$100<small class="period">,00/anual</small></h6>
					            <hr>
					            <ul class="fa-ul">
					              <li><span class="fa-li"><i class="fa fa-check"></i></span>extilos.com/SUA_TORRE</li>
					              <li><span class="fa-li"><i class="fa fa-check"></i></span>10 Administradores</li>
					              <li><span class="fa-li"><i class="fa fa-check"></i></span>Até 60 blog Gratuítos</li>
					              <li><span class="fa-li"><i class="fa fa-check"></i></span>Até 40 blog Profissionais</li>
					              <li><span class="fa-li"><i class="fa fa-check"></i></span>Painel de Gerenciamento</li>
					              <li><span class="fa-li"><i class="fa fa-check"></i></span>Total de 10 Áreas Publicitárias</li>
					              <li>Recebe 80% dos valores em 6 áreas publicitárias.</li>
					              <li>Recebe 100% do valor em 2 áreas publicitárias.</li>
					            </ul>
					          </div>
					        </div>
					      </div>
                    </div>
                    </div>
                    </section>
			                <div class="input-group">
			                    <div id="radioBtnV2" class="btn-group col-sm-12 col-md-12">
			                        <span class="btn btn-default btn-block btn-sm active" data-toggle="estadochange" data-value="1" data-active="btn-dark" data-notactive="btn-default">BRONZE</span>
			                        <span class="btn btn-default btn-block btn-sm notActive" data-toggle="estadochange" data-value="2" data-active="btn-dark" data-notactive="btn-default">PRATA</span>
			                    </div>
			                    <input type="hidden" name="tipoTorre" id="estadochange">
			                </div>
                    <input type="submit" class="btn btn-block btn-primary text-uppercase" name='criarPagina' id="criarPagina" value="CRIAR BLOG" disabled="true">
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-body">
                  <h6 class="card-category text-gray">O que é uma torre?</h6><hr>
                  <p class="card-description">
                    O sistema de torre foi criado para organizar os blogs, de acordo com sua região, estilo e conteúdo. Desta forma fica a critério dos administradores da torre, escolher os blogs que farão parte de seu grupo de compartilhamento de conteúdos.
                  </p>
                </div>
            </div>
              <div class="card card-profile">
                <div class="card-body">
                  <h6 class="card-category text-gray">qual faturamento de uma torre?</h6><hr>
                  <p class="card-description">
                    O administrador recebe uma porcentagem de 60% á 80% sobre as publicidades da torre. Recebe também uma pequena porcentagem sobre as publicidades dos blogs que participam na torre.
                  </p>
                </div>
              </div>
              <div class="card card-profile">
                <div class="card-body">
                  <h6 class="card-category text-gray">Dividir os lucros.</h6><hr>
                  <p class="card-description">
                    O administrador da torre determina a porcentagem que vai dividir com os blogs. Exemplo: Uma torre recebe sobre os valores das publicidade anúnciadas, este valor obrigatóriamente precisa ser dividido entre os blogs do grupo, porém a porcentagem a ser repassada é por conta do administrador, sendo que o mínimo é de 10%. Está porcentagem será dividida entre todos os blogs da torre, seguindo alguns critérios do sistema. (Obs. Uma torre que paga porcentagem maior, atrairá mais e, melhores blogs).
                  </p>
                </div>
              </div>
              <div class="card card-profile">
                <div class="card-body">
                  <h6 class="card-category text-gray">Regras Gerais.</h6><hr>
                  <p class="card-description">
                    O administrador da torre é o responsável pelo controle das as publicações exibidas em sua torre, é proibido a exibição de conteúdos pornogáficos, preconceito, discriminação, ofenças, cunho político, memes, etc. As publicações contam com um sistema de denúcia e, fica sob responsabilidade do administrador a avaliação e retirada imediata destes conteúdos, o não cumprimento das regras, resultará no bloqueio ou exclusão da torre. Acesse para ficar por dentro de todas as regras e política de privacidade.<br><a href="">REGRAS DO SITE</a>
                  </p>
                </div>
              </div>
            </div>