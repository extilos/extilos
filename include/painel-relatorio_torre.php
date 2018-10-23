			<div class="row">
            <div class="col-md-12">
              <div class="card card-chart">
                <div class="card-header card-header-success" >
                <div class="text-right" >
                    <a class="btn btn-sm btn-primary" onclick='history.go(-1)'>Voltar</a>
                  </div>
                  <h4 class="card-title">Gráfico das atividades na torre: <?php echo $filtro[1] ?></h4>
                  <p class="card-category">Relatório anual de dados</p>
                </div>
                <div class="card-body">
                <div class="ct-chart ct-golden-section" id="chart2"></div>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <p>
                  <b style="color:#ff830f">⦿</b> Visitas |
                  <b style="color:#bcb3b3">⦿</b> Postagens |
                  <b style="color:#d11f1f">⦿</b> Fãs
                  </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
			<div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                  </div>
                  <p class="card-category">Participando</p>
                  <h3 class="card-title"><?php echo $totalBlogs ?>/50
                    <small>Blogs</small>
                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats ">
                    <i class="material-icons">format_list_bulleted</i>
                    <a href="#lista_blog"> Visualizar lista dos Blogs</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">store</i>
                  </div>
                  <p class="card-category">Fãs</p>
                  <h3 class="card-title"><?php echo $totalFans ?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i>
                    <a href="#lista_fans"> Visualizar lista dos Fãs</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">info_outline</i>
                  </div>
                  <p class="card-category">Postagens</p>
                  <h3 class="card-title"><?php echo $totalPost ?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">local_offer</i>
                    <a href="#lista_Post"> Visualizar lista das Postagens</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-twitter"></i>
                  </div>
                  <p class="card-category">Publicidade Ativa</p>
                  <h3 class="card-title">+245</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i> Just Updated
                  </div>
                </div>
              </div>
            </div>
          </div>
          