   
    <?php
    date_default_timezone_set('America/Sao_Paulo');
    require 'include/modulos/front/universal/exibe_postagens.php';
// VERIFICAÇÕES PRIMÁRIAS
    $executionStartTime = microtime(true);
//if(isset($idUsuario)){
    atualiza_pontos(13); //Atualiza a contagem de pontos do usuário no ranking
//}
    ?>

            <div class="container-fluid row no-gutters box">
                <?php include 'include/modulos/front/index/publicacoes-ranking.php'; 

                    if(!isset($idUsuario)){
                ?>
                    <div id="hot">
                        <div id="content" class="container-fluid box">
                            <div class="same-height-row">
                                <div class="col-sm-4 text-center">
                                    <div class="box same-height clickable" >
                                        <h3>Baixe o aplicativo</h3>
                                        <img width="200px"  src="imagem/sistema/celular.png">
                                        <img width="200px"  src="imagem/sistema/gplay.png">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="box same-height clickable ">
                                        <h3>Extilos.com</h3>
                                        <small><i class="fa fa-share-alt"></i> | Crie ou faça parte de um blog, compartilhe conteúdos e fotos sobre beleza, saúde e estilo.  </small><hr>
                                        <small><i class="fa fa-retweet"></i> | Fique por dentro do que está na moda, acompanhando as postagens de outros blogs.</small><hr>
                                        <small><i class="fa fa-star"></i> | Encontre as melhores lojas e serviços em sua região, adicione seus favoritos e fique por dentro das novidades e lançamentos.</small><hr>
                                        <small><i class="fa fa-list-ol"></i> | Participe do ranking e, concorra a prêmios com as postagens com maior pontuação. </small><hr>
                                        <small><i class="fa fa-dollar"></i> | Ganhe dinheiro com as publicidades em seu blog. Com o destaque de suas postagens, receba o convite da equipe da extilos para realizar serviços de modelo, fotografia e desfile. </small>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                   <?php include 'include/modulos/front/universal/login.php'; ?>
                               </div>
                           </div>
                       </div>
                   </div>
                <?php 
                    }
                include 'include/modulos/front/universal/lista-torres.php'; ?>
                
                <?php  include 'include/modulos/front/publicidade/bloco-publicidade-banner-screen.php'; ?>

                <?php  require 'include/modulos/front/universal/lista-paginas.php';
                        apresentaPaginas('rand',0,4,$idUsuario) ?>

                <?php include 'include/modulos/front/universal/publicacoes-gerais.php'; ?>



           </div>
   <div id="copyright">
    <div class="container">
        <div class="col-md-6">
            <p class="pull-left">© 2015 Your name goes here.</p>

        </div>
        <div class="col-md-6">
            <p class="pull-right">Template by <a href="https://bootstrapious.com/e-commerce-templates">Bootstrapious</a> & <a href="https://fity.cz">Fity</a>
             <!-- Not removing these links is part of the license conditions of the template. Thanks for understanding :) If you want to use the template without the attribution links, you can do so after supporting further themes development at https://bootstrapious.com/donate  -->
         </p>
     </div>
 </div>
</div>
    <!-- *** SCRIPTS TO INCLUDE ***
     _________________________________________________________ -->
    <script src="<?php echo $caminho ?>js/jquery-1.11.0.min.js"></script>
     <script src="<?php echo $caminho ?>js/bootstrap.min.js"></script>
     <script src="<?php echo $caminho ?>js/jquery.cookie.js"></script>
     <script src="<?php echo $caminho ?>js/waypoints.min.js"></script>
     <script src="<?php echo $caminho ?>js/modernizr.js"></script>
     <script src="<?php echo $caminho ?>js/bootstrap-hover-dropdown.js"></script>
     <script src="<?php echo $caminho ?>js/owl.carousel.min.js"></script>
     <script src="<?php echo $caminho ?>js/front.js"></script>
     <script src="<?php echo $caminho ?>js/js_ext/script_projeto.js"></script>
