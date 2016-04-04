<?php

include_once("../../common/tools/_tools.php");


$page = (!empty($_POST["page"])) ? $_POST['page'] : 0;
$qt_cards = 9;
$start = $qt_cards * $page;
$cards = [];

for ($i=0; $i < $qt_cards; $i++) { // SUBSTITUIR ESTRUTURA DO FOR COM RETORNOS
	$content = file_get_html(HTML_DIR."card.html");

	$content->find('img[id=card-img]', 0)->src = 'https://git.reviewboard.kde.org/media/uploaded/files/2015/07/18/a70d8ab6-1bbf-4dcc-b11f-524c2f56b14a__picture_default_cover.jpg';
	$content->find('img[id=card-img]', 0)->{'data-card-id'} = 'pls-452-' . $i;
	$content->find('h4[id=card-name]', 0)->innertext = '<span class="label label-default">pls-452-2015</span>';
	//$content->find('h4[id=card-seg]', 0)->innertext = '<span class="label label-primary">Em breve</span>';
	$content->find('p[id=card-desc]', 0)->innertext = 'Etiam porta <b>sem malesuada magna</b> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.';
	$content->find('p[id=card-desc]', 0)->{'data-card-id'} = 'pls-452-' . $i;
	$content->find('img[id=card-politico-img]', 0)->src = 'https://pbs.twimg.com/profile_images/526853273546788864/xAkXA8V8.jpeg';
	$content->find('p[id=card-politico-info]', 0)->innertext = 'Proposto pelo deputado<br/><a id="a-nomePol" class="altCursor formRef" data-name="div" data-val="politico:" data-card-id="dilma-roulseff">Dilma Rouseff</a> do <strong>PT</strong>';
	$content->find('p[id=card-footer]', 0)->innertext = 'Votação: 1034, <font color="green">740 sim</font>, <font color="red"> 294 não.</font>';
	$content->find('p[class=p-btn-yes-no]', 0)->id = 'pls-452-' . $i;
	$content->find('button[class=btn-alt-yes]', 0)->{'data-parent-id'} = 'pls-452-' . $i;
	$content->find('button[class=btn-alt-no]', 0)->{'data-parent-id'} = 'pls-452-' . $i;
	//$content->find('div[id=a-nomePol]', 0)->{'data-card-id'} = "dilma-roulseff";	

	$cards[] = $content;
 }

foreach ($cards as $card) {
	echo($card);
}


?>