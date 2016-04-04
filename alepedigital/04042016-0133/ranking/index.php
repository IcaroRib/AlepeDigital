<?php

	include_once("../common/tools/functions.php");

	$MAIN_HTML = file_get_html("html/main.html");
//	--------------------------------------------------

	if (!user_logged()) {
 		kill_components($MAIN_HTML->find(".logged")); 		
	}
	
	else {
		show_interesses($MAIN_HTML);
	}

	

	// Adiciona municípios às listas de filtros
	$SELECT_PARTIDOS = $MAIN_HTML->find(".select-3");
	foreach ($SELECT_PARTIDOS as $select) {
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



	echo $MAIN_HTML;




?>
