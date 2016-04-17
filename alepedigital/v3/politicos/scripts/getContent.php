<?php

include_once("../../common/tools/_tools.php");


$page = (!empty($_POST["page"])) ? $_POST['page'] : 0;
$qt_cards = 9;
$start = $qt_cards * $page;
$cards = [];

for ($i=0; $i < $qt_cards; $i++) { // SUBSTITUIR ESTRUTURA DO FOR COM RETORNOS DO BANCO
	$CONTENT_HTML = file_get_html(HTML_POLITICOS."card_politico.html");

	$nome_politico = "Dilma Rouseff"; // FATOR DE BUSCA NO BANCO

	$CONTENT_HTML->find('img[id=card-img]', 0)->src = "https://pbs.twimg.com/profile_images/526853273546788864/xAkXA8V8.jpeg";	
	$CONTENT_HTML->find('h4[id=card-name]', 0)->innertext = $nome_politico;
	$CONTENT_HTML->find('div[id=card-pol-head-link] a', 0)->href = POLITICO . "?nome=". $nome_politico;
	
	$CONTENT_HTML->find('img[id=card-partido-img]', 0)->src = "http://www.ilheus24h.com.br/v1/wp-content/uploads/2013/10/logo_pt.gif";
	$CONTENT_HTML->find('p[id=card-partido-info] strong', 0)->innertext = "PT"; // SIGLA DO PARTIDO
	$CONTENT_HTML->find('p[id=card-partido-info] span', 0)->innertext = "Partido do Trabalhador"; // NOME DO PARTIDO
	$CONTENT_HTML->find('p[id=card-partido-info] strong', 1)->innertext = 2 . "º"; //MANDATO 
	$CONTENT_HTML->find('p[id=card-desc] span', 0)->innertext = 1034 . ""; // QT PROJETOS REGISTRADO
	$CONTENT_HTML->find('p[id=card-desc] span', 1)->innertext = 270 . ""; // QT PROJETOS APROVADOS
	$CONTENT_HTML->find('p[id=card-desc] span', 2)->innertext = 143 . ""; // QT PROJETOS REPORVADOS
	$CONTENT_HTML->find('p[id=card-desc-2] span', 0)->innertext = 43443 . ""; // QT TOTAL DE VOTOS EM PROJETOS
	$CONTENT_HTML->find('p[id=card-desc-2] span', 0)->innertext = 3213 . ""; // QT VOTOS POSITIVOS
	$CONTENT_HTML->find('p[id=card-desc-2] font', 0)->innertext = 1232 . ""; // QT VOTOS NEGATIVOS

	$cards[] = $CONTENT_HTML;
 }

foreach ($cards as $card) {
	echo($card);
}


?>