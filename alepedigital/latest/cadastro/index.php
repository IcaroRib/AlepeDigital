<?php

	include_once("../common/tools/_tools.php");

	$main = file_get_html(HTML_DIR."main.html");
	$main->find("#painel-filtrar-top",0)->style .= "display: none;";
	$main->find("#painel-filtrar-side",0)->style .= "display: none;";	
	$content = file_get_html(HTML_CADASTRO."form.html");
	$scripts = '<script type="text/javascript" src="../files/js/cadastro.js"></script>';
//	--------------------------------------------------

	if (!user_logged()) {
 		kill_components($main->find(".logged")); 		
	}
	
	else {
		show_interesses($main);
	}


	






//	-----------------------------------------------------
	$main->find("#content-div",0)->innertext = $content;
	$main->find("html",0)->innertext .= $scripts;	
//	-----------------------------------------------------

	echo $main;




?>
