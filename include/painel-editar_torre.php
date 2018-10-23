<?php
//VERIFICA SE ESTA EDITANDO A TORRE CERTA
if(!isset($_POST['nomeTorre'])){
	 header("Location: ../painel_usuario"); exit;
}
// dados da torre
$idTorre      = isset($_POST['idTorre'])      ? $_POST['idTorre'] : null;
//$idTorre = 3;
$botaoRelat    = isset($_POST['botaoRelat'])    ? $_POST['botaoRelat'] : null;
$botaoFans    = isset($_POST['botaoFans'])    ? $_POST['botaoFans'] : null;
$botaoBlog    = isset($_POST['botaoBlog'])    ? $_POST['botaoBlog'] : null;
$botaoPost    = isset($_POST['botaoPost'])    ? $_POST['botaoPost'] : null;
$botaoEditar  = isset($_POST['botaoEditar'])  ? $_POST['botaoEditar'] : null;

$totalBlogs   = conta_pagina_torre($idTorre);
$totalFans    = fans_total_torre($idTorre);
$totalPost    = total_post($idTorre);

if($totalBlogs==''){$totalBlogs = '0';}
if($totalFans==''){$totalFans = '0';}
if($totalPost==''){$totalPost = '0';}
?>
<div class="container-fluid">
        <?php if($botaoRelat!=null){
            include 'painel-relatorio_torre.php'; 
         } ?>
          <div class="row" id="lista_post">
            <?php
            if($botaoPost!=null){
            include 'painel-lista_post.php'; 
              }
            ?>
          </div>
          <div class="row" id="lista_fans">
            <?php 
            if($botaoFans!=null){
            include 'painel-lista_fans.php'; 
              }
            ?>
          </div>
          <div class="row" id="lista_blog">
            <?php 
            if($botaoBlog!=null){
            include 'painel-lista_blogs.php'; 
              }
            ?>
          </div>
        </div>