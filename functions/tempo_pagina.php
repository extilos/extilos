<?php

include_once 'cadastros.php';
function tempoPagina_fim ($pagina, $idUsuario , $executionStartTime){
		$data = date('d-m-Y');
		$hora = date('H:i');
		$executionEndTime = microtime(true);
        $seconds = $executionEndTime - $executionStartTime;
        cadastro_tempoPagina($pagina, $idUsuario, $seconds, $hora, $data);
}