<?php

include_once("../../common/tools/_tools.php");


$page = (!empty($_POST["page"])) ? $_POST['page'] : 0;
$qt_cards = 9;
$start = $qt_cards * $page;
$cards = [];

for ($i=0; $i < $qt_cards; $i++) { // SUBSTITUIR ESTRUTURA DO FOR COM RETORNOS DO BANCO, PEDIR MINHA AJUDA!
	$content = file_get_html(HTML_DIR."card.html");

	$lei_id = "000001". $i;

	$content->find('img[id=card-img]', 0)->src = 'https://git.reviewboard.kde.org/media/uploaded/files/2015/07/18/a70d8ab6-1bbf-4dcc-b11f-524c2f56b14a__picture_default_cover.jpg';
	$content->find('div[class=card-img-spot] a', 0)->href = PROJETO."?id=". $lei_id;
	$content->find('h4[id=card-name] span', 0)->innertext = 'pls-452-2015';
	//$content->find('h4[id=card-seg]', 0)->innertext = '<span class="label label-primary">Em breve</span>';
	$content->find('p[id=card-desc]', 0)->innertext = 'Etiam porta <b>sem malesuada magna</b> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.';
	$content->find('p[id=card-desc] a', 0)->href = PROJETO."?id=". $lei_id;
	$content->find('img[id=card-politico-img]', 0)->src = 'https://pbs.twimg.com/profile_images/526853273546788864/xAkXA8V8.jpeg'; //IMAGEM POLÍTICO MINIATURA
	$content->find('p[id=card-politico-info] a', 0)->innertext = 'Dilma Rouseff'; //CANDIDATO
	$content->find('p[id=card-politico-info] strong', 0)->innertext = 'PT'; //SIGLA PARTIDO
	$content->find('p[id=card-footer] font[color=black]', 0)->innertext = 1034; //TOTAL DE VOTOS
	$content->find('p[id=card-footer] font[color=green]', 0)->innertext = 720; //VOTOS SIM
	$content->find('p[id=card-footer] font[color=red]', 0)->innertext = 294; //VOTOS NAO	
	$content->find('p[class=p-btn-yes-no]', 0)->id = $lei_id;
	$content->find('button[class=btn-alt-yes]', 0)->{'data-parent-id'} = $lei_id;
	$content->find('button[class=btn-alt-no]', 0)->{'data-parent-id'} = $lei_id;
	//$content->find('div[id=a-nomePol]', 0)->{'data-card-id'} = "dilma-roulseff";	

	$cards[] = $content;
 }

foreach ($cards as $card) {
	echo($card);
}


?>