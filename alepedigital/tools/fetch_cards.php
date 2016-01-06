<?php
 	include_once('simple_html_dom.php');
 	//include_once('dbconnection.php');
 	$href = $_POST['href'];
 	$page = $_POST['page'];
 	$qt_cards = 9;
 	$inicio = $qt_cards * $page;

 	$cards = []; //Cleans the array.

 	
 	
 	if ($href == "#politicos") {
 		for ($i=0; $i < $qt_cards; $i++) { 

	 		$card = file_get_html("models/card_politico.html");

			$card->find('img[id=card-img]', 0)->src = 'https://pbs.twimg.com/profile_images/526853273546788864/xAkXA8V8.jpeg';
			$card->find('h4[id=card-name]', 0)->innertext = 'Dilma Rouseff';
			$card->find('img[id=card-partido-img]', 0)->src = 'http://www.ilheus24h.com.br/v1/wp-content/uploads/2013/10/logo_pt.gif';
			$card->find('p[id=card-partido-info]', 0)->innertext = '<strong>PT</strong> - Partido do Trabalhador<br/><strong>2º</strong> mandato';
			$card->find('p[id=card-desc]', 0)->innertext = 'Projetos registrados: 1034<br/><font color="green">740 aprovados</font>, <font color="red">294 reprovados</font>.';
			

			$cards[] = $card;
 		
	 	}
		

		foreach ($cards as $value) {
			echo($value);
		}
 		
 	}

 	elseif ($href == "#ranking") {
 		for ($i=0; $i < $qt_cards; $i++) { 

	 		$card = file_get_html("models/ranking_row.html");

	 		$card->find('td[id=posicao]', 0)->innertext = '1º';
	 		$card->find('img[id=politico-pic]', 0)->src = 'https://pbs.twimg.com/profile_images/526853273546788864/xAkXA8V8.jpeg';
			$card->find('p[id=politico-info]', 0)->innertext = '<strong><font size="3"><a href="#">Dilma Rouseff</a></font></strong><br/>Partido: <strong>PT</strong><br/>14 projetos cadastrados';
			$card->find('canvas[class=myChart]', 0)->id = '';
			$card->find('td[id=media-votos]', 0)->innertext = 522;
			$card->find('td[id=votos]', 0)->innertext = '5200 total<br/><font color="green">3650 sim</font><br/><font color="red">1550 não</font>';
			$card->find('p[class=graph-sim]', 0)->innertext = 70.19;
			$card->find('p[class=graph-nao]', 0)->innertext = 29.81;
			
			

			$cards[] = $card;
 		
	 	}
		

		foreach ($cards as $value) {
			echo($value);
		}
 		
 	}

 	else {
 		for ($i=0; $i < $qt_cards; $i++) { 

	 		$card = file_get_html("models/card.html");

			$card->find('img[id=card-img]', 0)->src = 'https://git.reviewboard.kde.org/media/uploaded/files/2015/07/18/a70d8ab6-1bbf-4dcc-b11f-524c2f56b14a__picture_default_cover.jpg';
			$card->find('h4[id=card-name]', 0)->innertext = '<span class="label label-default">PLS 452-2015</span>';
			$card->find('h4[id=card-seg]', 0)->innertext = '<span class="label label-warning">Saúde</span>';
			$card->find('p[id=card-desc]', 0)->innertext = 'Etiam porta <b>sem malesuada magna</b> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.';
			$card->find('img[id=card-politico-img]', 0)->src = 'https://pbs.twimg.com/profile_images/526853273546788864/xAkXA8V8.jpeg';
			$card->find('p[id=card-politico-info]', 0)->innertext = 'Proposto pelo deputado<br/><strong>Dilma Rouseff</strong> do <strong>PT</strong>';
			$card->find('p[id=card-footer]', 0)->innertext = 'Votação: 1034, <font color="green">740 sim</font>, <font color="red"> 294 não.</font>';

			
			if ($href == "#arquivados") {
				if ($i % 2 == 0) {
					$card->find('div[id=card-maker]', 0)->id = 'card-maker-a';
				}
				else {
					$card->find('div[id=card-maker]', 0)->id = 'card-maker-r';
				}
			}

			$cards[] = $card;
 		
	 	}
		

		foreach ($cards as $value) {
			echo($value);
		}
 	}



 	
	
 
?>