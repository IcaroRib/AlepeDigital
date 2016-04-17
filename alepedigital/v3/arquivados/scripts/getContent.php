<?php

include_once("../../common/tools/_tools.php");


$page = (!empty($_POST["page"])) ? $_POST['page'] : 0;
$qt_cards = 9;
$start = $qt_cards * $page;
$cards = [];

for ($i=0; $i < $qt_cards; $i++) { // SUBSTITUIR ESTRUTURA DO FOR COM RETORNOS
	$content = file_get_html(HTML_DIR."card.html");

	$lei_id = "000001". $i;
	$nome_candidato = 'Dilma Rouseff';

	$content->find('div', 0)->id = $lei_id;
	$content->find('img[id=card-img]', 0)->src = 'https://git.reviewboard.kde.org/media/uploaded/files/2015/07/18/a70d8ab6-1bbf-4dcc-b11f-524c2f56b14a__picture_default_cover.jpg';
	$content->find('div[class=card-img-spot] a', 0)->href = PROJETO."?id=". $lei_id; //LINK DA LEI NA IMAGEM
	$content->find('h4[id=card-name] span', 0)->innertext = 'pls-452-2015'; //NOME DA LEI
	//$content->find('h4[id=card-seg]', 0)->innertext = '<span class="label label-primary">Em breve</span>';
	$content->find('p[id=card-desc] a', 0)->innertext = 'Etiam porta <b>sem malesuada magna</b> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.';
	$content->find('p[id=card-desc] a', 0)->href = PROJETO."?id=". $lei_id; //LINK DA LEI NO TEXTO
	$content->find('p[id=card-desc] a', 0)->href = PROJETO."?id=". $lei_id; //LINK DA LEI NO TEXTO
	$content->find('img[id=card-politico-img]', 0)->src = 'https://pbs.twimg.com/profile_images/526853273546788864/xAkXA8V8.jpeg'; //IMAGEM POLÍTICO MINIATURA
	$content->find('p[id=card-politico-info] a', 0)->innertext = $nome_candidato; //CANDIDATO
	$content->find('a[id=a-nomePol]', 0)->href = POLITICO . '?nome=' . $nome_candidato; //CANDIDATO
	$content->find('p[id=card-politico-info] strong', 0)->innertext = 'PT'; //SIGLA PARTIDO
	$content->find('p[id=card-footer] font[color=black]', 0)->innertext = 1034; //TOTAL DE VOTOS
	$content->find('p[id=card-footer] font[color=green]', 0)->innertext = 720; //VOTOS SIM
	$content->find('p[id=card-footer] font[color=red]', 0)->innertext = 294; //VOTOS NAO
	$content->find('button[id=btn-lei-no]',0)->onclick = "set_vote_no(document.getElementById('".$lei_id."'),this);";
	$content->find('button[id=btn-lei-yes]',0)->onclick = "set_vote_yes(document.getElementById('".$lei_id."'),this);";
	
	/*
	 * Variáveis abaixo são utilizadas na manipulação da interface em função da verificação
	 * de se o usuário votou no projeto ou não (e se sim, qual seu voto). Tudo em função das consultas do banco.
	 * OBS.: criar instância (ou sistemática) no banco que correlacione usuário, projeto e voto!
	 *
	 * IMPORTANTE! - notar verificação de se usuário está logado ou não. Caso usuário não esteja logado
	 *				 "data-voted" e "data-vote" recebem 0
	 *
	 * Case 1 : Usuário não votou
	 * 		Do: "data-voted" e "data-vote" recebem 0
	 * Case 2 : Usuário votou
	 * 		Do: "data-voted" recebe 1
	 *		Case 2.1 : Usuário votou sim
	 *			Do: "data-vote" recebe 1
	 *		Case 2.2 : Usuário votou não
	 *			Do: "data-vote" recebe 0
	 *
	 *	VALORES PADRÃO:
	 *		data-voted = "0"
	 *		data-vote = "" (empty) important! - vazio e não zero, pois o zero representa o voto NEGATIVO
	 *
	 */

	if (user_logged()) {
		// SE USUÁRIO VOTOU NESTE PROJETO (consulta sql na tabela que associa usuário - projeto - voto)
		// Método "user_votou_no_projeto" abaixo é fictício, gerar consulta acima citada
		if (user_votou_no_projeto()) {
			$content->find('div[id=card-maker]', 0)->{'data-voted'} = 1;
			/* 
			 * verificação curta abaixo representa o tipo do voto do usu´ario (se ele votou sim ou não)
			 * interpretação do "if short" (esta verificação simples de apenas uma linha):
			 *		se o se usuario votou sim (user_votou_sim() === true)
			 *		então variável recebe 1 (que representa o voto sim)
			 *		caso contrário
			 *		variável receve 0 (que representa o voto não) importante!
			 * Método "user_votou_sim" abaixo é fictício, gerar consulta acima citada
			 *
			 */
			$content->find('div[id=card-maker]', 0)->{'data-vote'} = (user_votou_sim()) ? 1 : 0;
		}
	}

	
	if ($i % 2 == 0) { // SE STATUS LEI APROVADA...
		$content->find('h4[id=card-status]', 0)->innertext = '<span class="label label-success">Aprovado</span>';	
	}
	else {
		$content->find('h4[id=card-status]', 0)->innertext = '<span class="label label-danger">Reprovado</span>';
	}
	

	$cards[] = $content;
 }

foreach ($cards as $card) {
	echo($card);
}


?>