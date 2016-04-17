<?php

	include_once("../common/tools/_tools.php");

	$main = file_get_html(HTML_DIR."main.html");
	$main->find("#painel-filtrar-top",0)->style .= "display: none;";
	$main->find("#painel-filtrar-side",0)->style .= "display: none;";	
	$content = file_get_html(HTML_CADASTRO."form.html");
	$scripts = '<script type="text/javascript" src="../common/js/main.js"></script>';
//	--------------------------------------------------

	// para testar a página de perfil eu retirei a revificação de logado, mas lembrese de consertar
	if (user_logged()) {
//	if (!user_logged()) {
 		kill_components($main->find(".logged"));
 		$content->find('button[id=btn-cad-salvar]',0)->style .= "display: none;";
	}
	
	else {
		$user_id = 000100;
		$default_profile_img = "../common/img/profile.png"; //CASO O USUÁRIO N TENHA IMAGEM DE PERFIL SALVA, ESTA É A PADRÃO
		
		kill_components($main->find(".not-logged"));	
		$main->find("img[id=user-pic]",0)->src = "../common/img/profile.png";
		$main->find("button[id=user-button]",0)->innertext .= "Guilherme"; // IMPORTANTE! POR APENAS O PRIMEIRO NOME!
		$main->find("button[id=user-button-bar]",0)->innertext = "Guilherme"; // IMPORTANTE! POR APENAS O PRIMEIRO NOME!
		$main->find("a[id=cadastro-edit-anchor]",0)->href .= $user_id; // id do usuário da sessão
		$main->find("a[id=cadastro-edit-anchor-bar]",0)->href .= $user_id; // id do usuário da sessão
		show_interesses($main);

		if (!empty($_GET["edit"])) {
			$user_id = $_GET["edit"];
			// SETAR CAMPOS DE ACORDO COM A CONSULTA SQL AO USUÁRIO EM FUNÇÃO
			// DO ID INSTANCIADO EM --> $_GET["edit"]
			$content->find('button[id=btn-cad-enviar]',0)->style .= "display: none;";
		}
		else {
			header("Location: ". HOME);
		}
	}



/*
	PÁGINA INACABADA. O QUE FALTA:
		1-	Não sei se você já fez o cadastro. Se sim, integre.
		2-	Caso o usuário esteja logado, esta página funciona como edição de dados.
			Settar dados do usuário nos campos (value) e tornar os campos que não devem ser editados como desabilitados
			(Lembrando tamb´em de fazer a verificação facebook/google/cadastro nativo)
			Ex. de set de dados de usuário nos campos:
				$main->find("input[id=inputName]",0)->value = "Fulano de Tal";				
				IMPORTATE {
					O DO SEXO (select/"combobox") vc deve settar uma das options como selected="selected".
					émais trabalhoso, mas é isso aí, pesquisa, te vira <3

					O do arquivo de imagem eu também n sei como colocar. #youBetterGoogle, Bitch

					Você também pode fazer todas essas mudanças de valor através do javvascript.
				}
		3-	Criar o evento ajax associado ao botão "Salvar" no javascript (checar no html e modificar o onclick dele)
			para salvar as alterações do usuário, sempre em função da id dele na sessão.
		4-	Sistema de notificação por e-mail

*/

	






//	-----------------------------------------------------
	$main->find("#content-div",0)->innertext = $content;
	$main->find("html",0)->innertext .= $scripts;	
//	-----------------------------------------------------

	echo $main;




?>
