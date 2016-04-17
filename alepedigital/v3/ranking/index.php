<?php

	include_once("../common/tools/_tools.php");

	$main = file_get_html(HTML_DIR."main.html");
	$filters_top = file_get_html(HTML_RANKING."filters_top.html");
	$filters_side = file_get_html(HTML_RANKING."filters_side.html");
	$ranking_table = file_get_html(HTML_RANKING."ranking_table.html");
	$scripts = '<script type="text/javascript" src="../common/js/main.js"></script>
				<script type="text/javascript" src="../common/js/Charts.js"></script>';	
//	--------------------------------------------------

//		if (!user_logged()) {
//	 		kill_components($main->find(".logged"));
//		}
		
//		else {

			$user_id = 000100;
			$default_profile_img = "../common/img/profile.png"; //CASO O USUÁRIO N TENHA IMAGEM DE PERFIL SALVA, ESTA É A PADRÃO

			kill_components($main->find(".not-logged"));	
			$main->find("img[id=user-pic]",0)->src = "../common/img/profile.png";
			$main->find("button[id=user-button]",0)->innertext .= "Guilherme"; // IMPORTANTE! POR APENAS O PRIMEIRO NOME!
			$main->find("button[id=user-button-bar]",0)->innertext = "Guilherme"; // IMPORTANTE! POR APENAS O PRIMEIRO NOME!
			$main->find("a[id=cadastro-edit-anchor]",0)->href .= $user_id; // id do usuário da sessão
			$main->find("a[id=cadastro-edit-anchor-bar]",0)->href .= $user_id; // id do usuário da sessão
			show_interesses($main);
//		}

	

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
	$main->find("body",0)->{"data-chart"} = 1;
	$main->find("#content-div",0)->innertext .= $ranking_table;
	$main->find("#painel-filtrar-top",0)->innertext = $filters_top;
	$main->find("#painel-filtrar-side",0)->innertext = $filters_side;
	$main->find("html",0)->innertext .= $scripts;
//	-----------------------------------------------------

	echo $main;




?>
