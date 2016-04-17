<?php


	/*

		- é importante lembrar que o perfil de usuario e o perfil de político carregam integralmente, sem o scroll infinito (sem usar a função de load_page), ou seja, ele traz todos os cards seguidos e votados (no caso de perfil de usuário) e todas os porjetos do político de uma vez. sem scroll infininto.

	*/

	include_once("../common/tools/_tools.php");

	if (!empty($_GET["nome"])) {

		$nome_politico = $_GET["nome"];

		//CONSULTAR BANCO ATRAVÉS DO NOME
		$main = file_get_html(HTML_DIR."main.html");
		$main->find("#painel-filtrar-top",0)->style .= "display: none;";
		$main->find("#painel-filtrar-side",0)->style .= "display: none;";
		$content = file_get_html(HTML_POLITICO . "politico.html");
		$scripts = '<script type="text/javascript" src="../common/js/main.js"></script>
					<script type="text/javascript" src="../common/js/Charts.js"></script>';
	//	-----------------------------------------------------------------------------------------------------

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

		$content->find("img[class=page-pol-img]",0)->src = "http://blogdoprisco.com.br/wp-content/uploads/2015/07/dilma-rousseff-laguna.jpg";
		$content->find("h2[id=pol-name]",0)->innertext = "Dilma Rouseff";
		$content->find("img[id=partido-img]",0)->innertext = "Dilma Rouseff";
		$content->find("strong[id=partido-sigla]",0)->innertext = "PT";
		$content->find("span[id=partido-nome]",0)->innertext = "Partido dos Trabalhadores";
		$content->find("strong[id=n-mandato]",0)->innertext = 2 . "º";
		$content->find("span[id=n-projetos-registados]",0)->innertext = 1034 . ""; // QT TOTAL DE PROJETOS REGISTRADOS
		$content->find("font[color=green]",0)->innertext = 740 . "";  // QT PROJETOS APROVADOS
		$content->find("font[color=red]",0)->innertext = 294 . "";  // QT PROJETOS REPROVADOS
		$content->find("span[id=n-votos-projetos]",0)->innertext = 1233 . "";  // QT VOTOS EM PROJETOS
		$content->find("font[color=green]",1)->innertext = 133 . "";  // QT VOTOS SIM EM PROJETOS
		$content->find("font[color=red]",1)->innertext = 1100 . "";  // QT VOTOS NÃO EM PROJETOS
		$content->find("p[id=pol-ranking]",0)->innertext = 71 . "º";  // QT VOTOS NÃO EM PROJETOS
		$content->find("canvas[id=polAceitacaoChart]",0)->{"data-yes-percent"} = 70;  
		$content->find("canvas[id=polAceitacaoChart]",0)->{"data-no-percent"} = 30;
		


		for ($i=0; $i < 10; $i++) { // SUBSTITUIR ESTRUTURA DO FOR COM RETORNOS DO BANCO, PEDIR MINHA AJUDA!
			$projeto = file_get_html(HTML_DIR."card.html");

			$lei_id = "000001". $i; // FATOR DE BUSCA NO BANCO

			$projeto->find('div', 0)->id = $lei_id;
			$projeto->find('img[id=card-img]', 0)->src = 'https://git.reviewboard.kde.org/media/uploaded/files/2015/07/18/a70d8ab6-1bbf-4dcc-b11f-524c2f56b14a__picture_default_cover.jpg';
			$projeto->find('div[class=card-img-spot] a', 0)->href = PROJETO."?id=". $lei_id;
			$projeto->find('h4[id=card-name] span', 0)->innertext = 'pls-452-2015';
			//$projeto->find('h4[id=card-seg]', 0)->innertext = '<span class="label label-primary">Em breve</span>';
			$projeto->find('p[id=card-desc] a', 0)->innertext = 'Etiam porta <b>sem malesuada magna</b> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.';
			$projeto->find('p[id=card-desc] a', 0)->href = PROJETO."?id=". $lei_id;
			$projeto->find('img[id=card-politico-img]', 0)->src = 'https://pbs.twimg.com/profile_images/526853273546788864/xAkXA8V8.jpeg'; //IMAGEM POLÍTICO MINIATURA
			$projeto->find('p[id=card-politico-info] a', 0)->innertext = 'Dilma Rouseff'; //CANDIDATO
			$projeto->find('p[id=card-politico-info] strong', 0)->innertext = 'PT'; //SIGLA PARTIDO
			$projeto->find('p[id=card-footer] font[color=black]', 0)->innertext = 1034; //TOTAL DE VOTOS
			$projeto->find('p[id=card-footer] font[color=green]', 0)->innertext = 720; //VOTOS SIM
			$projeto->find('p[id=card-footer] font[color=red]', 0)->innertext = 294; //VOTOS NAO	
			$projeto->find('button[id=btn-lei-no]',0)->onclick = "set_vote_no(document.getElementById('".$lei_id."'),this);";
			$projeto->find('button[id=btn-lei-yes]',0)->onclick = "set_vote_yes(document.getElementById('".$lei_id."'),this);";
			

			$content->find("div[id=page-pol-cards]",0)->innertext .= $projeto;

			
		 }

		
		
		

		


	//	-----------------------------------------------------
		$main->find("body",0)->{"data-chart"} = 1;
		$main->find("#content-div",0)->innertext = $content;
		$main->find("html",0)->innertext .= $scripts;
	//	-----------------------------------------------------

		echo $main;

	}
	else {
		header("Location: ". HOME);
	}




?>
