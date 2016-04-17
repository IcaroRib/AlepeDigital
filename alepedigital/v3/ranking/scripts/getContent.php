<?php

include_once("../../common/tools/_tools.php");


$page = (!empty($_POST["page"])) ? $_POST['page'] : 0;
$qt_cards = 9;
$start = $qt_cards * $page;
$cards = [];

for ($i=0; $i < $qt_cards; $i++) { // SUBSTITUIR ESTRUTURA DO FOR COM RETORNOS
	$content = file_get_html(HTML_RANKING."ranking_row.html");
	$nome_candidato = 'Dilma Rouseff';

	$content->find('td[id=posicao]', 0)->innertext = 1 . 'º';
	$content->find('img[id=politico-pic]', 0)->src = 'https://pbs.twimg.com/profile_images/526853273546788864/xAkXA8V8.jpeg';
	$content->find('a[id=a-nomePol]', 0)->innertext = $nome_candidato;
	$content->find('a[id=a-nomePol]', 0)->href = POLITICO . "?nome=" . $nome_candidato;
	$content->find('strong[id=partido-short]', 0)->innertext = "PT";
	$content->find('em[id=n-projetos-cadastrados]', 0)->innertext = 14;
	$content->find('canvas[class=myChart]', 0)->id = "";
	$content->find('canvas[class=myChart]', 0)->{'data-yes-percent'} = 70;
	$content->find('canvas[class=myChart]', 0)->{'data-no-percent'} = 30;
	$content->find('td[id=media-votos]', 0)->innertext = 522;
	$content->find('span[id=total-votos]', 0)->innertext = 5200;
	$content->find('font[color=green]', 0)->innertext = 3650;
	$content->find('font[color=red]', 0)->innertext = 1550;
	
	$cards[] = $content;
 }

foreach ($cards as $card) {
	echo($card);
}


?>