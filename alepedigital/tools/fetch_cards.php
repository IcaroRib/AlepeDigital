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
			$card->find('div[id=card-pol-head-link]', 0)->{'data-card-id'} = 'dilma-roulseff';
			$card->find('h4[id=card-name]', 0)->innertext = 'Dilma Rouseff';
			$card->find('img[id=card-partido-img]', 0)->src = 'http://www.ilheus24h.com.br/v1/wp-content/uploads/2013/10/logo_pt.gif';
			$card->find('p[id=card-partido-info]', 0)->innertext = '<strong>PT</strong> - Partido do Trabalhador<br/><strong>2º</strong> mandato';
			$card->find('p[id=card-desc]', 0)->innertext = 'Projetos registrados: 1034<br/><font color="green">740 aprovados</font>, <font color="red">294 reprovados</font>.';
			

			$cards[] = $card;
 		
	 	}
 		
 	}

 	elseif ($href == "#ranking") {
 		for ($i=0; $i < $qt_cards; $i++) { 

	 		$card = file_get_html("models/ranking_row.html");

	 		$card->find('td[id=posicao]', 0)->innertext = '1º';
	 		$card->find('img[id=politico-pic]', 0)->src = 'https://pbs.twimg.com/profile_images/526853273546788864/xAkXA8V8.jpeg';
			$card->find('p[id=politico-info]', 0)->innertext = '<strong><font size="3"><a id="a-nomePol" class="altCursor" data-div="politico-div" data-card-id="dilma-roulseff" onclick="showDiv(this)">Dilma Rouseff</a></font></strong><br/>Partido: <strong>PT</strong><br/>14 projetos cadastrados';
			$card->find('canvas[class=myChart]', 0)->id = '';
			$card->find('canvas[class=myChart]', 0)->{'data-yes-percent'} = 70;
			$card->find('canvas[class=myChart]', 0)->{'data-no-percent'} = 30;
			$card->find('td[id=media-votos]', 0)->innertext = 522;
			$card->find('td[id=votos]', 0)->innertext = '5200 total<br/><font color="green">3650 sim</font><br/><font color="red">1550 não</font>';
			
			

			$cards[] = $card;
 		
	 	}
 		
 	}

	elseif (strpos($href, "politico:")) {

 		$aux2 = strpos($href, ":");
 		$polName = substr($href, $aux2+1);

 	//  SELECT * FROM table WHERE name = $leiName;


 	 	$card = file_get_html("models/politico.html");
 	 	$card->find('canvas[id=polAceitacaoChart]', 0)->{'data-yes-percent'} = 70;
 	 	$card->find('canvas[id=polAceitacaoChart]', 0)->{'data-no-percent'} = 30;
 	 	$card->find('div[id=page-pol-cards]', 0)->innertext = file_get_html("models/card.html");
 	 	// concatenar com ".=" | todos projetos | lidar com status de projeto.

 	 	$cards[] = $card;

 	 } 	

 	elseif (strpos($href, "projeto:")) {

 		$aux1 = strpos($href, ":");
 		$leiName = substr($href, $aux1+1);

 	//  SELECT * FROM table WHERE name = $leiName;


 	 	$card = file_get_html("models/lei.html");
 	 	$card->find('canvas[id=leiChart]', 0)->{'data-yes-percent'} = 70;
 	 	$card->find('canvas[id=leiChart]', 0)->{'data-no-percent'} = 30;
 	 	$card->find('p[class=p-btn-yes-no]', 0)->id = 'pls-452-1';
		$card->find('button[id=btn-lei-yes]', 0)->{'data-parent-id'} = 'pls-452-1';
		$card->find('button[id=btn-lei-no]', 0)->{'data-parent-id'} = 'pls-452-1';
 	 	$card->find('a[id=a-nomePol]', 0)->{'data-card-id'} = 'abel-salvador-mesquita-junior';

 	// 	$to10 = "#D3312E"
 	// 	$to20 = "#DC6434"
 	// 	$to30 = "#E58B38"
 	// 	$to40 = "#EEB03D"
 	// 	$to50 = "#F9D73F"
 	// 	$to60 = "#F9D73F"
 	// 	$to70 = "#CBC544"
 	// 	$to80 = "#9BAF47"
 	// 	$to90 = "#709A4D"
 	// 	$to100 = "#408752"

 	// 	//CALCULUS


 	// 	$card->find('path[id=path14]', 0)->style = 'fill:'.$to10.';stroke:#97946b;stroke-width:0.1763;stroke-linecap:round;stroke-linejoin:round';
 	// 	$card->find('path[id=path16]', 0)->style = 'fill:'.$to20.';stroke:#97946b;stroke-width:0.1763;stroke-linecap:round;stroke-linejoin:round';
 	// 	$card->find('path[id=path18]', 0)->style = 'fill:'.$to30.';stroke:#97946b;stroke-width:0.1763;stroke-linecap:round;stroke-linejoin:round';
 	// 	$card->find('path[id=path20]', 0)->style = 'fill:'.$to40.';stroke:#97946b;stroke-width:0.1763;stroke-linecap:round;stroke-linejoin:round';
 	// 	$card->find('path[id=path22]', 0)->style = 'fill:'.$to50.';stroke:#97946b;stroke-width:0.1763;stroke-linecap:round;stroke-linejoin:round';
 	// 	$card->find('path[id=path24]', 0)->style = 'fill:'.$to60.';stroke:#97946b;stroke-width:0.1763;stroke-linecap:round;stroke-linejoin:round';
 	// 	$card->find('path[id=path26]', 0)->style = 'fill:'.$to70.';stroke:#97946b;stroke-width:0.1763;stroke-linecap:round;stroke-linejoin:round';
 	// 	$card->find('path[id=path28]', 0)->style = 'fill:'.$to80.';stroke:#97946b;stroke-width:0.1763;stroke-linecap:round;stroke-linejoin:round';
 	// 	$card->find('path[id=path30]', 0)->style = 'fill:'.$t090.';stroke:#97946b;stroke-width:0.1763;stroke-linecap:round;stroke-linejoin:round';
 	// 	$card->find('path[id=path32]', 0)->style = 'fill:'.$to100.';stroke:#97946b;stroke-width:0.1763;stroke-linecap:round;stroke-linejoin:round';

 	 	$cards[] = $card;

 	}

 	else {
 		for ($i=0; $i < $qt_cards; $i++) { 

	 		$card = file_get_html("models/card.html");

			$card->find('img[id=card-img]', 0)->src = 'https://git.reviewboard.kde.org/media/uploaded/files/2015/07/18/a70d8ab6-1bbf-4dcc-b11f-524c2f56b14a__picture_default_cover.jpg';
			$card->find('img[id=card-img]', 0)->{'data-card-id'} = 'pls-452-2015';
			$card->find('h4[id=card-name]', 0)->innertext = '<span class="label label-default">PLS 452-2015</span>';
			$card->find('h4[id=card-seg]', 0)->innertext = '<span class="label label-warning">Saúde</span>';
			$card->find('p[id=card-desc]', 0)->innertext = 'Etiam porta <b>sem malesuada magna</b> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.';
			$card->find('p[id=card-desc]', 0)->{'data-card-id'} = 'pls-452-2015';
			$card->find('img[id=card-politico-img]', 0)->src = 'https://pbs.twimg.com/profile_images/526853273546788864/xAkXA8V8.jpeg';
			$card->find('p[id=card-politico-info]', 0)->innertext = 'Proposto pelo deputado<br/><a id="a-nomePol" class="altCursor" data-div="politico-div" data-card-id="dilma-roulseff" onclick="showDiv(this)">Dilma Rouseff</a> do <strong>PT</strong>';
			$card->find('p[id=card-footer]', 0)->innertext = 'Votação: 1034, <font color="green">740 sim</font>, <font color="red"> 294 não.</font>';
			$card->find('p[class=p-btn-yes-no]', 0)->id = 'pls-452-' . $i;
			$card->find('button[class=btn-alt-yes]', 0)->{'data-parent-id'} = 'pls-452-' . $i;
			$card->find('button[class=btn-alt-no]', 0)->{'data-parent-id'} = 'pls-452-' . $i;
			//$card->find('div[id=a-nomePol]', 0)->{'data-card-id'} = "dilma-roulseff";
			


			
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
		
 	}


 	foreach ($cards as $value) {
		echo($value);
	}



 	
	
 
?>