<?php

	include_once("../common/tools/_tools.php");

	$MAIN = file_get_html(HTML_DIR."main.html");
	$FILTERS_TOP = file_get_html(HTML_TODOS_PROJETOS."filters_top.html");
	$FILTERS_SIDE = file_get_html(HTML_TODOS_PROJETOS."filters_side.html");
	$SCRIPTS = '<script type="text/javascript" src="../common/js/main.js"></script>';
//	--------------------------------------------------

	
// 	kill_components($MAIN->find(".logged"));	
	
	// VERIFICAR SE USUÁRIO ESTÁ LOGADO ANTES DE CHAMAR A FUNÇÃO PARA ADCIONAR OS INTERESSES AO MAIN,
	// ir na função e recuperar valores do banco em função do user
	show_interesses($MAIN);
	


	// Adiciona municípios às listas de filtros
	foreach ($FILTERS_SIDE->find(".select-3") as $select){
		$select->innertext .= '<option value="PT">PT</option>';
		$select->innertext .= '<option value="PSDB">PSDB</option>';
	}
	foreach ($FILTERS_TOP->find(".select-3") as $select){
		$select->innertext .= '<option value="PT">PT</option>';
		$select->innertext .= '<option value="PSDB">PSDB</option>';
	}


	/*
	$SELECT_PARTIDOS = $MAIN->find(".select-3");
	$SQL = "SELECT sigla FROM partido;";
	$RETORNO = runQuery($SQL);
	if ($RETORNO) {
	 	while($row = mysql_fetch_assoc($RETORNO)) {
	 		foreach ($SELECT_PARTIDOS as $select) {
	 			$select->innertext .= '<option value="'.$row["sigla"].'">'.$row["sigla"].'</option>';
	 		}
	    }
	}
	unset($SQL,$RETORNO);
	*/






//	-----------------------------------------------------
	$MAIN->find("#painel-filtrar-top",0)->innertext = $FILTERS_TOP;
	$MAIN->find("#painel-filtrar-side",0)->innertext = $FILTERS_SIDE;
	$MAIN->find("html",0)->innertext .= $SCRIPTS;	
//	-----------------------------------------------------

	echo $MAIN;




?>
