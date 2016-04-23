<?php

	include_once("../common/tools/_tools.php");
	include_once("../common/DB/conexaoDB.php");
	include_once("../common/DB/loadDB.php");

	$MAIN = file_get_html(HTML_DIR."main.html");
	$FILTERS_TOP = file_get_html(HTML_TODOS_PROJETOS."filters_top.html");
	$FILTERS_SIDE = file_get_html(HTML_TODOS_PROJETOS."filters_side.html");
	$SCRIPTS = '<script type="text/javascript" src="../common/js/main.js"></script>
				<script src="https://apis.google.com/js/platform.js" async defer> </script>
				<script type="text/javascript" src="../common/js/cadastro.js"></script>';
	
	include("../common/sessions/recuperarSessao.php");

//	--------------------------------------------------
	
// 	kill_components($MAIN->find(".logged"));	
	
	// VERIFICAR SE USUÁRIO ESTÁ LOGADO ANTES DE CHAMAR A FUNÇÃO PARA ADCIONAR OS INTERESSES AO MAIN,
	// ir na função e recuperar valores do banco em função do user
	//show_interesses($MAIN);

//	-----------------------------------------------------
	$conn = connect();
	selectPartidos("");
	desconnect($conn);

//	-----------------------------------------------------




//	-----------------------------------------------------
	$MAIN->find("#painel-filtrar-top",0)->innertext = $FILTERS_TOP;
	$MAIN->find("#painel-filtrar-side",0)->innertext = $FILTERS_SIDE;
	$MAIN->find("html",0)->innertext .= $SCRIPTS;	
//	-----------------------------------------------------
	
	echo $MAIN;


?>
