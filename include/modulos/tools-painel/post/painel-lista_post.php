<?php
    // busca os post relacionado a esta torre
$idBusca = intval($_GET['cd']/251);
$tipoBusca = 'torre';
$postPublicado = 'torre_publicado';
if(isset($_GET['od'])){
	if($_GET['od'] == 'asc'){
		$post_sem = 'torre_sem_ASC';
	}
	elseif($_GET['od'] == 'desc'){
		$post_sem = 'torre_sem_DESC';
	}else{
		$post_sem = 'torre_sem_DESC';
	}
}else{
$post_sem = 'torre_sem_DESC';
}
$ordem = 1;

?>
<div class="col-lg-12 col-md-12" id="lista_post">
	<div class="card">
		<div class="card-header card-header-tabs card-header-danger" >

			<div class="text-right" >
				<a class="btn btn-sm btn-warning" onclick="history.go(-1)">Voltar</a>
				<a class="btn btn-sm btn-info" onclick='history.go(0)'>Atualizar</a>
			</div>
			<div class="nav-tabs-navigation">
				<div class="nav-tabs-wrapper">
					<span class="nav-tabs-title">Postagens:</span>
					<ul class="nav nav-tabs" data-tabs="tabs">
						<?php 
						if(isset($_GET['l'])){
							if($_GET['l'] == 'p'){
								?>
								<li class="nav-item">
									<a class="nav-link active" href="#profile" data-toggle="tab">
										<i class="material-icons">check_circle_outline</i> Ativa
										<div class="ripple-container"></div>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#messages" data-toggle="tab">
										<i class="material-icons">help_outline</i> Para Ativar
										<div class="ripple-container"></div>
									</a>
								</li>
							<?php } if($_GET['l'] == 'a'){
								?>
								<li class="nav-item">
									<a class="nav-link" href="#profile" data-toggle="tab">
										<i class="material-icons">check_circle_outline</i> Ativa
										<div class="ripple-container"></div>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link active" href="#messages" data-toggle="tab">
										<i class="material-icons">help_outline</i> Para Ativar
										<div class="ripple-container"></div>
									</a>
								</li>
							<?php }
						}else{
							?>
							<li class="nav-item">
								<a class="nav-link  active" href="#profile" data-toggle="tab">
									<i class="material-icons">check_circle_outline</i> Ativa
									<div class="ripple-container"></div>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#messages" data-toggle="tab">
									<i class="material-icons">help_outline</i> Para Ativar
									<div class="ripple-container"></div>
								</a>
							</li>
						<?php } ?>
						
					</ul>
				</div>
			</div>
		</div>
		<div class="card-body table-responsive">
			<div class="tab-content">
				<?php	if(isset($_GET['l'])){
					if($_GET['l'] == 'p'){ ?>
						<div class="tab-pane active" id="profile">
							<?php   include_once "lista_publicado.php"; ?>
						</div>
						<div class="tab-pane " id="messages">
							<?php include_once "lista_aprovacao.php"; ?>
						</div>
					<?php	}if($_GET['l'] == 'a'){ ?>
						<div class="tab-pane " id="profile">
							<?php   include_once "lista_publicado.php"; ?>
						</div>
						<div class="tab-pane active" id="messages">
							<?php include_once "lista_aprovacao.php"; ?>
						</div>
					<?php } }else{ ?>
						<!-- POSTAGENS COM APROVAÇÃO  -->
						<div class="tab-pane active" id="profile">
							<?php   include_once "lista_publicado.php"; ?>
						</div>
						<!-- POSTAGENS SEM APROVAÇÃO  -->
						<div class="tab-pane" id="messages">
							<?php include_once "lista_aprovacao.php"; ?>
						</div>
					<?php	} ?>


				</div>
			</div>
		</div>
	</div>