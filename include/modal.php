
<!-- MODAL PARA LOGIN -->
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Customer login</h4>
                    </div>
                    <div class="modal-body">
                        <form action="customer-orders.html" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="login-modal" placeholder="email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password-login" placeholder="password">
                            </div>

                            <p class="text-center">
                                <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                            </p>

                        </form>

                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted"><a href="register.html"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

                    </div>
                </div>
            </div>
        </div>
<!-- MODAL DA ÁREA DE FOTOS -->
	<div class="modal fade" id="modal-fotos" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
        <div class="modal-dialog modal-sm">
			 <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Painel de Acessos</h4>
                </div>
             <div class="modal-body">
                 <?php include 'include/painel-fotos.php'  ?>
             </div>
             </div>
         </div>
     </div>
<!-- MODAL DA AREA DE CADASTROS -->
    <div class="modal fade" id="modal-cadastro" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="Login">Painel de Cadastros</h4>
                </div>
            <div class="modal-body">
                    <?php include 'include/painel-fotos.php'  ?>
            </div>
            </div>
        </div>
    </div>
<!-- MODAL DA CRIAÇÃO DE PÁGINAS GRATUITAS -->
    <div class="modal fade" id="modal-gratuito" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="Login">Breve apresentação de cada página.</h4>
                </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <b style="color:#228B22"> ✔</b><b> Páginas Gratuítas</b>
                        <small>Com ela é possivel publicar seus albuns; Administrar em até 03 usuários; Ganhar 50% do valor das publicidades na página; Participa do ranking; Participar de uma torre; Página para contato; Vender publicidade diretamente para as lojas; Tem uma lista de fãs e muito mais.<br>
                        Indicado para quem ama moda e adora compartilhar seu estilo de se vestir. </small>
                    <hr>
                    <b style="color:#228B22"> ✔</b><b> Páginas Profissionais</b>
                        <small>Aqui, além de você publicar seus albuns na página, você pode enviar convites para diversas pessoas para publicarem em sua página, seguindo seus critérios de moda e estilo; Pode administrar a página em 03 usuários; Recebe 65% das publicidades; Participa de ranking; Se agrega em alguma torre; Tem destaques em publicações; Vende publicidade direta; Tem uma lista de fãs e muito mais.
                        <br>Indicado para quem é profissional na area de moda e beleza.</small>
                    <hr>
                    <b style="color:#228B22"> ✔</b><b> Páginas Produtos</b>
                        <small>Publique seus produtos, com preço, valor e descritivo, forme uma lista de clientes, use o app para compartilhar as novidades e aumentar suas vendas, seus fãs poderão indicar a outros, em uma publicação o usuário pode encomendar o produto via app extilos, além de fazer tudo igual a uma Página Profissional.
                        <br>Indicado para quem é lojista e quer divulgar seus produtos e aumentar sua lista de clientes. </small>
                    <hr>
                    <b style="color:#228B22"> ✔</b><b> Torre</b>
                        <small>Adiquirindo uma torre, você passa a ser comandante de um time, e precisa incentivar as páginas a entrarem no seu time, pode criar uma torre que represente algum estilo, orientação, costume, etc. É importante dizer que você determina as regras, então se algum usuário estiver em desacordo com o que determinou, cabe a você tira-lo de sua torre. A torre tem participação nos resultados publicitários de todas as páginas em sua cobertura e poderá vender suas publicidades a valores pré determinados pelo sistema.</small>
                    <hr>
                        <small>Para conhecer mais detalhes acesse: <a>extilos.com/planos</a>.</small>

                </div>
            </div>
            </div>
        </div>
    </div>
