<?php

	include_once("../common/tools/_tools.php");

	$main = file_get_html(HTML_DIR."main.html");
	$filters_top = file_get_html(HTML_ARQUIVADOS."filters_top.html");
	$filters_side = file_get_html(HTML_ARQUIVADOS."filters_side.html");
	$scripts = '<script type="text/javascript" src="../common/js/main.js"></script>';	
//	--------------------------------------------------

	if (!user_logged()) {
 		kill_components($main->find(".logged")); 		
	}
	
	else {
		show_interesses($main);
	}


	// Adiciona municípios às listas de filtros
	foreach ($main->find(".select-3") as $select) {
		$select->innertext .= '<option value="PT">PT</option>';
		$select->innertext .= '<option value="PSDB">PSDB</option>';
	}

	/*
	$SELECT_PARTIDOS = $main->find(".select-3");
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
	$main->find("#painel-filtrar-top",0)->innertext = $filters_top;
	$main->find("#painel-filtrar-side",0)->innertext = $filters_side;
	$main->find("html",0)->innertext .= $scripts;
//	-----------------------------------------------------

	echo $main;




?>
