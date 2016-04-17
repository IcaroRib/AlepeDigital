<?php

	/*

		- é importante lembrar que o perfil de usuario e o perfil de político carregam integralmente, sem o scroll infinito (sem usar a função de load_page), ou seja, ele traz todos os cards seguidos e votados (no caso de perfil de usuário) e todas os porjetos do político de uma vez. sem scroll infininto.

	*/

	include_once("../common/tools/_tools.php");

	// para testar a página de perfil eu retirei a revificação de logado, mas lembrese de consertar
	if (user_logged()) {
//	if (!user_logged()) {
 		header("Location: ". HOME);
	}
	
	else {   // SUBSTITUIR VALORES POR RESULT DE CONSULTA SQL EM FUNÇÃO DOS DADOS DE USER EM SESSION	

		$main = file_get_html(HTML_DIR."main.html");
		$main->find("#painel-filtrar-top",0)->style .= "display: none;";
		$main->find("#painel-filtrar-side",0)->style .= "display: none;";
		$content = file_get_html(HTML_PERFIL . "perfil.html");
		$scripts = '<script type="text/javascript" src="../common/js/main.js"></script>';
	//	----------------------------------------------------------------------------------------------------------------

		$user_id = 000012; // Valor retornado da global session
		$default_profile_img = "../common/img/profile.png"; //CASO O USUÁRIO N TENHA IMAGEM DE PERFIL SALVA, ESTA É A PADRÃO
		kill_components($main->find(".not-logged"));	
		$main->find("img[id=user-pic]",0)->src = "../common/img/profile.png";
		$main->find("button[id=user-button]",0)->innertext .= "Guilherme"; // IMPORTANTE! POR APENAS O PRIMEIRO NOME!
		$main->find("button[id=user-button-bar]",0)->innertext = "Guilherme"; // IMPORTANTE! POR APENAS O PRIMEIRO NOME!
		$main->find("a[id=cadastro-edit-anchor]",0)->href .= $user_id; // id do usuário da sessão
		$main->find("a[id=cadastro-edit-anchor-bar]",0)->href .= $user_id; // id do usuário da sessão
		show_interesses($main);

		$content->find("img[id=user-perfil-pic]",0)->src = "https://scontent-gru2-1.xx.fbcdn.net/hphotos-xta1/v/t1.0-9/12119160_981882851873822_1042885828410420420_n.jpg?oh=d2e636f4e0402671f469d4b18c64bb9c&oe=5744D8D1";
		$content->find("h2[id=user-perfil-name]",0)->innertext = "Guilherme Matheus de Araújo";
		$content->find("em[id=user-perfil-sex]",0)->innertext = "Masculino";
		$content->find("em[id=user-perfil-age] span",0)->innertext = 19; // IDEDADE
		$content->find("em[id=user-perfil-adress]",0)->innertext = "Paulista, Pernambuco";
		$content->find("strong[id=user-perfil-total-votos]",0)->innertext = 1034; // TOTAL DE PROJETOS QUE USER VOTOU
		$content->find("font[id=user-perfil-votos-yes]",0)->innertext = 740; // TOTAL DE VOTOS SIM DE USER EM PROJETO
		$content->find("font[id=user-perfil-votos-no]",0)->innertext = 294; // TOTAL DE VOTOS NÃO DE USER EM PROJETO
		$content->find("a[id=edit-perfil]",0)->href = CADASTRO . "?edit=" . $user_id; // TOTAL DE VOTOS NÃO DE USER EM PROJETO



		// CONSULTAR BANCO SOBRE VOTADOS
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
			

			$content->find("div[id=perfil-cards-votados]",0)->innertext .=  $projeto;

			
		 }




		 // CONSULTAR BANCO SOBRE SEGUIDOS
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
			

			$content->find("div[id=perfil-cards-seguidos]",0)->innertext .= $projeto;

			
		 }
		
		


		
//		if (!user_logged()) {
//	 		kill_components($main->find(".logged"));
//		}
		
//		else {
			kill_components($main->find(".not-logged"));	
			show_interesses($main);
//		}






	//	-----------------------------------------------------
		$main->find("#content-div",0)->innertext = $content;
		$main->find("html",0)->innertext .= $scripts;
	//	-----------------------------------------------------

		echo $main;
	}

	
//	--------------------------------------------------

?>
