<?php

include_once("../../common/tools/_tools.php");


$page = (!empty($_POST["page"])) ? $_POST['page'] : 0;
$qt_cards = 9;
$start = $qt_cards * $page;
$cards = [];

for ($i=0; $i < $qt_cards; $i++) { // SUBSTITUIR ESTRUTURA DO FOR COM RETORNOS
	$CONTENT_HTML = file_get_html(HTML_DIR."card_politico.html");

	$CONTENT_HTML->find('img[id=card-img]', 0)->src = "https://pbs.twimg.com/profile_images/526853273546788864/xAkXA8V8.jpeg";
	$CONTENT_HTML->find('div[id=card-pol-head-link]', 0)->{'data-card-id'} = str_replace(" ", '-', strtolower("Dilma Rouseff"));
	$CONTENT_HTML->find('h4[id=card-name]', 0)->innertext = "Dilma Rouseff";
	$CONTENT_HTML->find('img[id=card-partido-img]', 0)->src = "http://www.ilheus24h.com.br/v1/wp-content/uploads/2013/10/logo_pt.gif";
	$CONTENT_HTML->find('p[id=card-partido-info]', 0)->innertext = '<strong>'. "PT" .'</strong> - <strong>1º</strong> mandato';
	$CONTENT_HTML->find('p[id=card-desc]', 0)->innertext = 'Projetos registrados: 1034<br/><font color="green">740 aprovados</font>, <font color="red">294 reprovados</font>.';

	$cards[] = $CONTENT_HTML;
 }

foreach ($cards as $card) {
	echo($card);
}


?>