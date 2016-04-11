<?php

	include_once("../common/tools/_tools.php");

	$MAIN_HTML = file_get_html(HTML_DIR."main.html");
	$FILTERS_TOP = file_get_html(HTML_POLITICOS."filters_top.html");
	$FILTERS_SIDE = file_get_html(HTML_POLITICOS."filters_side.html");
	$SCRIPTS = '<script type="text/javascript" src="../common/js/main.js"></script>';
//	--------------------------------------------------

	if (!user_logged()) {
 		kill_components($MAIN_HTML->find(".logged")); 		
	}
	
	else {
		show_interesses($MAIN_HTML);
	}

	

	// Adiciona municípios às listas de filtros	
	foreach ($MAIN_HTML->find(".select-3") as $select) {
		$select->innertext .= '<option value="PT">PT</option>';
		$select->innertext .= '<option value="PSDB">PSDB</option>';
	}

	/*
	$SELECT_PARTIDOS = $MAIN_HTML->find(".select-3");
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


//	------------------------------------------------------
	$MAIN_HTML->find("#painel-filtrar-top",0)->innertext = $FILTERS_TOP;
	$MAIN_HTML->find("#painel-filtrar-side",0)->innertext = $FILTERS_SIDE;
	$MAIN_HTML->find("html",0)->innertext .= $SCRIPTS;	
//	------------------------------------------------------


	echo $MAIN_HTML;




?>
