<?php
	
	include_once("tools/simple_html_dom.php");
	include_once("tools/functions.php");

	/*
	 * Variáveis de suporte
	 */
	$DIV = (!empty($_POST["div"])) ? $_POST["div"] : "todosProjetos";	

	/*
	 * Carga e manipulação de conteúdo
	 */
	$FILTER_ODENAR_POR = (!empty($_POST["f-ordenarPor"])) ? $_POST["f-ordenarPor"] : "recentes";
	$FILTER_MINICIPIO = (!empty($_POST["f-municipio"])) ? $_POST["f-municipio"] : "";
	$FILTER_PARTIDO = (!empty($_POST["f-partido"])) ? $_POST["f-partido"] : "";
	$FILTER_STATUS_LEI = (!empty($_POST["f-status-lei"])) ? $_POST["f-status-lei"] : "";
	$FILTER_RANKING_ORDER = (!empty($_POST["f-ranking-order"])) ? $_POST["f-ranking-order"] : "aceitacaoGeral";
	// --------------------------------------------------------------------------------------------------------
	$LOGGED = 0;
	$USER_FULL_NAME = "";
	$USER_USERNAME = "";
	$USER_EMAIL = "";
	$USER_IMG_SCR = "";
	// --------------------------------------------------------------------------------------------------------
	$BUSCA = (!empty($_POST["busca"])) ? $_POST["busca"] : "";
	$DESTINATION = "#main-content-spot";
	$PAGE = (!empty($_POST["page"])) ? $_POST['page'] : 0;
	// --------------------------------------------------------------------------------------------------------
 	$QT_CARDS = 9;
 	$INICIO = $QT_CARDS * $PAGE;
 	$CARDS = [];


 	if ($PAGE == 0) {
 			$MAIN_HTML = file_get_html("html/main.html");

 			if ($LOGGED) {
				$not_logged_components = $MAIN_HTML->find(".not-logged");
				foreach ($not_logged_components as $nlc) {
					$nlc->style .= "display:none;";
				}

				/*

				$MAIN_HTML->find("img[id=user-pic]", 0)->src = $USER_IMG_SCR;

				
				// Altera nome de usuário em botões (se logado)				
				$to_erase = substr($USER_FULL_NAME, strpos($USER_FULL_NAME," ")); //parte do nome completo a ser apagada
				$USER_FIRST_NAME = str_replace($to_erase, "", $USER_FULL_NAME);
				$BTN_USER_OPT = $MAIN_HTML->find("button[class=btn-user-opt]");				
				foreach ($BTN_USER_OPT as $button) {
					$button->innertext .= $USER_FIRST_NAME ." <span class='caret'></span>";
				}

				// Adiciona os interesses (tags) do usuário à página (se logado)
				$DIV_TAGS = $MAIN_HTML->find(".list-interesses");
				$aux_array = array();
				$SQL = "SELECT marcador,COUNT(marcador) AS qtTags 
						FROM usuario_lei_tag
						INNER JOIN usuario ON usuario_lei_tag.usuario_idUsuario = usuario.idUsuario;";
				$RETORNO = runQuery($SQL);
				if ($RETORNO) {
					while($row = mysql_fetch_assoc($RETORNO)) {
				    		$array_toAppend = array();
				    		array_push($array_toAppend, $row["marcador"], $row["qtTags"]);
							array_push($aux_array, $array_toAppend);
				    }

				    foreach ($DIV_TAGS as $aTag) {
						$aTag->innertext = addTags(0,$aux_array);	
					}	
				} else 
				{
					foreach ($DIV_TAGS as $aTag) {
						$aTag->innertext = "Nenhum marcador adicionado";
					}
				}
				unset($SQL,$RETORNO);

				*/

			}

			else {
				$logged_components = $MAIN_HTML->find(".logged");
				foreach ($logged_components as $lc) {
					$lc->style .= "display:none;";
				}	
			}

			
			// Evento para personalizar menu no topo de acordo com a atual página (DIV)
			$BLOG_NAV_ITEM = $MAIN_HTML->find("a[class=blog-nav-item]");
			foreach ($BLOG_NAV_ITEM as $a) {
				if ($DIV == $a->{"data-val"}) {
					$a->class .= " active";
					break;	
				}
				
			}

			// Adiciona municípios às listas de filtros
			$SELECT_MUNICIPIOS = $MAIN_HTML->find(".select-2");
			foreach ($SELECT_MUNICIPIOS as $select) {
				$select->innertext .= '<option value="Paulista">Paulista</option>';
				$select->innertext .= '<option value="Jaboatao dos Guararapes">Jaboatao dos Guararapes</option>';	
			}

			/*
			$SELECT_MUNICIPIOS = $MAIN_HTML->find(".select-2");
			$SQL = "SELECT localizacao FROM status;";
			$RETORNO = runQuery($SQL);
			if ($RETORNO) {
			    while($row = mysql_fetch_assoc($RETORNO)) {
			    	foreach ($SELECT_MUNICIPIOS as $select) {

						$select->innertext .= '<option value="'. $row["localizacao"] .'">'. $row["localizacao"] .'</option>';	
					}
			    }
			}
			unset($SQL,$RETORNO);
			*/

			// Adiciona municípios às listas de filtros
			$SELECT_PARTIDOS = $MAIN_HTML->find(".select-3");
			foreach ($SELECT_PARTIDOS as $select) {
				$select->innertext .= '<option value="PT">PT</option>';
				$select->innertext .= '<option value="PSDB">PSDB</option>';
			}

			/*
			$SELECT_PARTIDOS = $MAIN_HTML->find(".select-3");
			$SQL = "SELECT sigla FROM partido;";
			$RETORNO = runQuery($SQL);
			if ($RETORNO) {
			 	while($row = mysql_fetch_assoc($RETORNO)) {
			 		foreach ($SELECT_PARTIDOS as $select) {
			 			$select->innertext .= '<option value="'.$row["sigla"].'">'.$row["sigla"].'</option>';
			 		}
			    }
			}
			unset($SQL,$RETORNO);
			*/


			if ($DIV == "politicos") {
				$filter_tag = "fpoliticos";
 			}
 			elseif (strpos($DIV, "politico:") === 0) {
				$filter_tag = "fcadastro";
				$MAIN_HTML->find("body",0)->{"data-chart"} = "1";
 	 			$MAIN_HTML->find("body",0)->{"data-loading"} = "0";
			}
			elseif ($DIV == "ranking") {
				$filter_tag = "franking";
				$DESTINATION = "#ranking-div-table";
				$MAIN_HTML->find("#ranking-table", 0)->style = "display: block;";
			 	$MAIN_HTML->find("body",0)->{"data-chart"} = "1";
			}
			elseif ($DIV == "perfil") {
				$filter_tag = "fperfil";
				$MAIN_HTML->find("body",0)->{"data-loading"} = "0";
			}
			elseif (strpos($DIV, "projeto:") === 0) {
				$filter_tag = "fcadastro";
				$MAIN_HTML->find("body",0)->{"data-loading"} = "0";
				$MAIN_HTML->find("body",0)->{"data-chart"} = "1";
			}
			elseif ($DIV == "cadastro") {
				$filter_tag = "fcadastro";
				$MAIN_HTML->find("body",0)->{"data-loading"} = "0";
			}
			elseif ($DIV == "editar-info") {
				$filter_tag = "fcadastro";
				$MAIN_HTML->find("body",0)->{"data-loading"} = "0";
			}
			else {
				$filter_tag = ($DIV == "arquivados") ? "farquivados" : "ftodosProjetos";

			}

			$MAIN_HTML->find("body",0)->{"data-div"} = $DIV;

 			$FILTERS = $MAIN_HTML->find(".".$filter_tag);
			foreach ($FILTERS as $filter) {
				$filter->style = "display: none;";	
			}


 	}

 	
	/*
	 * Modificações de conteúdo em função da página (DIV)
	 */
	
	if ($DIV == "politicos") {
		
		for ($i=0; $i < $QT_CARDS; $i++) { 

	 		$CONTENT_HTML = file_get_html("html/card_politico.html");

	 		$CONTENT_HTML->find('img[id=card-img]', 0)->src = 'https://pbs.twimg.com/profile_images/526853273546788864/xAkXA8V8.jpeg';
			$CONTENT_HTML->find('div[id=card-pol-head-link]', 0)->{'data-card-id'} = 'dilma-roulseff';
			$CONTENT_HTML->find('h4[id=card-name]', 0)->innertext = 'Dilma Rouseff';
			$CONTENT_HTML->find('img[id=card-partido-img]', 0)->src = 'http://www.ilheus24h.com.br/v1/wp-content/uploads/2013/10/logo_pt.gif';
			$CONTENT_HTML->find('p[id=card-partido-info]', 0)->innertext = '<strong>PT</strong> - Partido do Trabalhador<br/><strong>2º</strong> mandato';
			$CONTENT_HTML->find('p[id=card-desc]', 0)->innertext = 'Projetos registrados: 1034<br/><font color="green">740 aprovados</font>, <font color="red">294 reprovados</font>.';
			

			$CARDS[] = $CONTENT_HTML;
	 	}

	 	/*
		$SQL = "SELECT *
				FROM deputado
				LEFT JOIN partido ON deputado.idPartido = partido.idPartido
				UNION
				(
					SELECT *
					FROM deputado
					RIGHT JOIN partido ON deputado.idPartido = partido.idPartido
				)
				LIMIT $INICIO, $QT_CARDS;";
		$RETORNO = runQuery($SQL);
		if ($RETORNO) {
		 	while($row = mysql_fetch_assoc($RETORNO)) {
		 		$CONTENT_HTML = file_get_html("html/card_politico.html");

		 		$CONTENT_HTML->find('img[id=card-img]', 0)->src = $row['imgScr'];
				$CONTENT_HTML->find('div[id=card-pol-head-link]', 0)->{'data-card-id'} = str_replace(" ", '-', strtolower($row['nomePolitico']));
				$CONTENT_HTML->find('h4[id=card-name]', 0)->innertext = $row['nomePolitico'];
				$CONTENT_HTML->find('img[id=card-partido-img]', 0)->src = $row['partImgScr'];
				$CONTENT_HTML->find('p[id=card-partido-info]', 0)->innertext = '<strong>'. $row['sigla'] .'</strong> - <strong>1º</strong> mandato';
				$CONTENT_HTML->find('p[id=card-desc]', 0)->innertext = 'Projetos registrados: 1034<br/><font color="green">740 aprovados</font>, <font color="red">294 reprovados</font>.';
				

				$CARDS[] = $CONTENT_HTML;
			}
		}
		unset($SQL,$RETORNO);
	 	*/
	 	
	}

	elseif (strpos($DIV, "politico:") === 0) {
		
		$aux2 = strpos($DIV, ":");
 		$polName = substr($DIV, $aux2+1);

 	//  SELECT * FROM table WHERE name = $leiName;


 	 	$CONTENT_HTML = file_get_html("html/politico.html");

 	 	$CONTENT_HTML->find('canvas[id=polAceitacaoChart]', 0)->{'data-yes-percent'} = 70;
 	 	$CONTENT_HTML->find('canvas[id=polAceitacaoChart]', 0)->{'data-no-percent'} = 30;

 	 	for ($ops=0; $ops < 10; $ops++) { 
 	 		$CONTENT_HTML->find('div[id=page-pol-cards]', 0)->innertext .= file_get_html("html/card.html");
 	 	}

 	 	$CARDS[] = $CONTENT_HTML;

 	 	
 	}

	elseif ($DIV == "ranking") {
		
		for ($i=0; $i < $QT_CARDS; $i++) {
	 		$CONTENT_HTML = file_get_html("html/ranking_row.html");

	 		$CONTENT_HTML->find('td[id=posicao]', 0)->innertext = '1º';
	 		$CONTENT_HTML->find('img[id=politico-pic]', 0)->src = 'https://pbs.twimg.com/profile_images/526853273546788864/xAkXA8V8.jpeg';
			$CONTENT_HTML->find('a[id=a-nomePol]', 0)->innertext = 'Dilma Rouseff';
			$CONTENT_HTML->find('a[id=a-nomePol]', 0)->{"data-card-id"} = "Dilma Rouseff";
			$CONTENT_HTML->find('a[id=a-nomePol]', 0)->{"data-val"} .= "Dilma Rouseff";
			$CONTENT_HTML->find('strong[id=partido-short]', 0)->innertext = "PT";
			$CONTENT_HTML->find('em[id=n-projetos-cadastrados]', 0)->innertext = 14;
			$CONTENT_HTML->find('canvas[class=myChart]', 0)->id = "";
			$CONTENT_HTML->find('canvas[class=myChart]', 0)->{'data-yes-percent'} = 70;
			$CONTENT_HTML->find('canvas[class=myChart]', 0)->{'data-no-percent'} = 30;
			$CONTENT_HTML->find('td[id=media-votos]', 0)->innertext = 522;
			$CONTENT_HTML->find('td[id=votos]', 0)->innertext = '5200 total<br/><font color="green">3650 sim</font><br/><font color="red">1550 não</font>';
			
			$CARDS[] = $CONTENT_HTML;
 		
	 	}
	 	
		
	}

	elseif ($DIV == "perfil") {
		
		$CONTENT_HTML = file_get_html("html/perfil.html");

 		$CONTENT_HTML->find('img[id=user-perfil-pic]', 0)->src = 'https://scontent-gru2-1.xx.fbcdn.net/hphotos-xta1/v/t1.0-9/12119160_981882851873822_1042885828410420420_n.jpg?oh=d2e636f4e0402671f469d4b18c64bb9c&oe=5744D8D1';
		$CONTENT_HTML->find('h2[id=user-perfil-name]', 0)->innertext = 'Guilherme Matheus';
		$CONTENT_HTML->find('em[id=user-perfil-sex]', 0)->innertext = 'Masculino';
		$CONTENT_HTML->find('em[id=user-perfil-age]', 0)->innertext = '19 anos';
		$CONTENT_HTML->find('em[id=user-perfil-adress]', 0)->innertext = 'Paulista, Pernambuco';
		$CONTENT_HTML->find('strong[id=user-perfil-total-votos]', 0)->innertext = "1034";
		$CONTENT_HTML->find('font[id=user-perfil-votos-yes]', 0)->innertext = "740 sim";
		$CONTENT_HTML->find('font[id=user-perfil-votos-no]', 0)->innertext = "294 não";
		
		for ($ops=0; $ops < 10; $ops++) { 
			$CONTENT_HTML->find('div[id=perfil-cards]', 0)->innertext .= file_get_html("html/card.html");	
		}	

		$CARDS[] = $CONTENT_HTML;
	}

	elseif (strpos($DIV, "projeto:") === 0) {
		
		$aux1 = strpos($DIV, ":");
 		$leiName = substr($DIV, $aux1+1);

 		//SELECT * FROM table WHERE name = $leiName;

 	 	$CONTENT_HTML = file_get_html("html/lei.html");
 	 	$CONTENT_HTML->find('canvas[id=leiChart]', 0)->{'data-yes-percent'} = 70;
 	 	$CONTENT_HTML->find('canvas[id=leiChart]', 0)->{'data-no-percent'} = 30;
 	 	$CONTENT_HTML->find('p[class=p-btn-yes-no]', 0)->id = 'pls-452-1';
		$CONTENT_HTML->find('button[id=btn-lei-yes]', 0)->{'data-parent-id'} = 'pls-452-1';
		$CONTENT_HTML->find('button[id=btn-lei-no]', 0)->{'data-parent-id'} = 'pls-452-1';
 	 	$CONTENT_HTML->find('a[id=a-nomePol]', 0)->{'data-card-id'} = 'abel-salvador-mesquita-junior';


		if ($LOGGED) {
			foreach ($CONTENT_HTML->find('a[class=a-add-edit]') as $a) {
	 	 		$a->{'data-target'} = '#interesses-modal';
	 	 	}
			/*
 	 		

	 	 	// Adiciona os interesses (tags) do usuário à postagem (se logado)
			$DIV_TAGS_PROJETO = $MAIN_HTML->find(".list-interesses-projeto");
			$aux_array = array();
			$SQL = "SELECT marcador
					FROM usuario_lei_tag
					INNER JOIN proposicao ON usuario_lei_tag.proposicao_idProposicao = proposicao.idProposicao
					WHERE usuario_lei_tag.usuario_idUsuario IN (SELECT idUsuario 
																FROM usuario
																WHERE email = $USER_EMAIL)";
			$RETORNO = runQuery($SQL);
			if ($RETORNO) {
			    while($row = mysql_fetch_assoc($RETORNO)) {
			    	array_push($aux_array, $row["marcador"]);
			    }

			    foreach ($DIV_TAGS_PROJETO as $aTag) {
					$aTag->innertext = addTags(1,$aux_array);	
				}

				$INPUT_INTERESSES = $MAIN_HTML->find("input[id=input-edit-interesses]", 0);
				for ($i=0; $i < sizeof($aux_array); $i++) { 
					$INPUT_INTERESSES->value .= $aux_array[$i];
					if ($i !== sizeof($aux_array) - 1) {
						$INPUT_INTERESSES->value .= ",";
					}
				}
			}

			else {
				foreach ($DIV_TAGS_PROJETO as $aTag) {
					$aTag->innertext = "Nenhum marcador adicionado";
				}
			}
			*/
 	 	}
 	 	




 		$to10 = "#D3312E";
 		$to20 = "#DC6434";
 		$to30 = "#E58B38";
 		$to40 = "#EEB03D";
 		$to50 = "#F9D73F";
 		$to60 = "#F9D73F";
 		$to70 = "#CBC544";
 		$to80 = "#9BAF47";
 		$to90 = "#709A4D";
 		$to100 = "#408752";

 		//CALCULUS


 	 	$CONTENT_HTML->find('path[id=path14]', 0)->style = 'fill:'.$to10.';stroke:#97946b;stroke-width:0.1763;stroke-linecap:round;stroke-linejoin:round';
 		$CONTENT_HTML->find('path[id=path16]', 0)->style = 'fill:'.$to20.';stroke:#97946b;stroke-width:0.1763;stroke-linecap:round;stroke-linejoin:round';
 		$CONTENT_HTML->find('path[id=path18]', 0)->style = 'fill:'.$to30.';stroke:#97946b;stroke-width:0.1763;stroke-linecap:round;stroke-linejoin:round';
 		$CONTENT_HTML->find('path[id=path20]', 0)->style = 'fill:'.$to40.';stroke:#97946b;stroke-width:0.1763;stroke-linecap:round;stroke-linejoin:round';
 		$CONTENT_HTML->find('path[id=path22]', 0)->style = 'fill:'.$to50.';stroke:#97946b;stroke-width:0.1763;stroke-linecap:round;stroke-linejoin:round';
 		$CONTENT_HTML->find('path[id=path24]', 0)->style = 'fill:'.$to60.';stroke:#97946b;stroke-width:0.1763;stroke-linecap:round;stroke-linejoin:round';
 		$CONTENT_HTML->find('path[id=path26]', 0)->style = 'fill:'.$to70.';stroke:#97946b;stroke-width:0.1763;stroke-linecap:round;stroke-linejoin:round';
 		$CONTENT_HTML->find('path[id=path28]', 0)->style = 'fill:'.$to80.';stroke:#97946b;stroke-width:0.1763;stroke-linecap:round;stroke-linejoin:round';
 		$CONTENT_HTML->find('path[id=path30]', 0)->style = 'fill:'.$to90.';stroke:#97946b;stroke-width:0.1763;stroke-linecap:round;stroke-linejoin:round';
 		$CONTENT_HTML->find('path[id=path32]', 0)->style = 'fill:'.$to100.';stroke:#97946b;stroke-width:0.1763;stroke-linecap:round;stroke-linejoin:round';

 	 	$CARDS[] = $CONTENT_HTML;
	}

	elseif ($DIV == "cadastro") {
		
		$CONTENT_HTML = file_get_html("html/cadastro.html");
		$CARDS[] = $CONTENT_HTML;
	}

	elseif ($DIV == "editar-info") {
		
		$CONTENT_HTML = file_get_html("html/cadastro.html");
		$CONTENT_HTML->find("button[id=btn-cad-enviar]", 0)->innertext = "Atualizar";
		$CARDS[] = $CONTENT_HTML;
	}

	else {
		
		for ($i=0; $i < $QT_CARDS; $i++) { 

	 		$CONTENT_HTML = file_get_html("html/card.html");

			$CONTENT_HTML->find('img[id=card-img]', 0)->src = 'https://git.reviewboard.kde.org/media/uploaded/files/2015/07/18/a70d8ab6-1bbf-4dcc-b11f-524c2f56b14a__picture_default_cover.jpg';
			$CONTENT_HTML->find('img[id=card-img]', 0)->{'data-card-id'} = 'pls-452-' . $i;
			$CONTENT_HTML->find('h4[id=card-name]', 0)->innertext = '<span class="label label-default">pls-452-2015</span>';
			//$CONTENT_HTML->find('h4[id=card-seg]', 0)->innertext = '<span class="label label-primary">Em breve</span>';
			$CONTENT_HTML->find('p[id=card-desc]', 0)->innertext = 'Etiam porta <b>sem malesuada magna</b> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.';
			$CONTENT_HTML->find('p[id=card-desc]', 0)->{'data-card-id'} = 'pls-452-' . $i;
			$CONTENT_HTML->find('img[id=card-politico-img]', 0)->src = 'https://pbs.twimg.com/profile_images/526853273546788864/xAkXA8V8.jpeg';
			$CONTENT_HTML->find('p[id=card-politico-info]', 0)->innertext = 'Proposto pelo deputado<br/><a id="a-nomePol" class="altCursor formRef" data-name="div" data-val="politico:" data-card-id="dilma-roulseff">Dilma Rouseff</a> do <strong>PT</strong>';
			$CONTENT_HTML->find('p[id=card-footer]', 0)->innertext = 'Votação: 1034, <font color="green">740 sim</font>, <font color="red"> 294 não.</font>';
			$CONTENT_HTML->find('p[class=p-btn-yes-no]', 0)->id = 'pls-452-' . $i;
			$CONTENT_HTML->find('button[class=btn-alt-yes]', 0)->{'data-parent-id'} = 'pls-452-' . $i;
			$CONTENT_HTML->find('button[class=btn-alt-no]', 0)->{'data-parent-id'} = 'pls-452-' . $i;
			//$CONTENT_HTML->find('div[id=a-nomePol]', 0)->{'data-card-id'} = "dilma-roulseff";
			


			
			if ($DIV == "arquivados") {
				if ($i % 2 == 0) {
					$CONTENT_HTML->find('h4[id=card-status]', 0)->innertext = '<span class="label label-success">Aprovado</span>';	
				}
				else {
					$CONTENT_HTML->find('h4[id=card-status]', 0)->innertext = '<span class="label label-danger">Reprovado</span>';
				}
			}

			$CARDS[] = $CONTENT_HTML;
	 	}
	}

	// Adiciona conteúdo gerado na seção anterior
	if ($PAGE == 0) {
		foreach ($CARDS as $card) {
			$MAIN_HTML->find($DESTINATION, 0)->innertext .= $card;
		}

		echo($MAIN_HTML);
	}

	else {
		foreach ($CARDS as $card) {
			echo($card);
		}
	}
	


?>