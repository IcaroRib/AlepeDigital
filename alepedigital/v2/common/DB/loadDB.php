<?php

	//require_once("db/conexaoDB.php");

	function selectLei($NUMERO_LEI){

		global $conn;
		global $CONTENT_HTML;

		$SQL = "SELECT numeroProposicao,resumo, sum(votosSim) as votosSim, sum(votosNao) as votosNao, nomePolitico, sigla
					FROM lei_ordinaria INNER JOIN proposicao on lei_ordinaria.Proposicao_idProposicao = proposicao.idProposicao
					INNER JOIN deputado ON deputado.idDeputado = proposicao.idDeputado
					INNER JOIN partido on deputado.idPartido = partido.idPartido
					WHERE numeroProposicao = $NUMERO_LEI";

		$RETORNO = mysqli_query($conn, $SQL);
		if ($RETORNO) {
		 	while($row = mysqli_fetch_assoc($RETORNO)) {

		 		$CONTENT_HTML->find('p[class=p-btn-yes-no]', 0)->id = $row['numeroProposicao'];
				$CONTENT_HTML->find('button[id=btn-lei-yes]', 0)->{'data-parent-id'} = $row['numeroProposicao'];
				$CONTENT_HTML->find('button[id=btn-lei-no]', 0)->{'data-parent-id'} = $row['numeroProposicao'];
		 	 	$CONTENT_HTML->find('a[id=a-nomePol]', 0)->{'data-card-id'} = $row['nomePolitico'];

 	 		break;
		 	}
		}
		unset($SQL,$RETORNO);
	}


	function selectPotico($NOME_POLITICO){

		global $conn;
		global $CONTENT_HTML;

 	 	$SQL = "SELECT nomePolitico, sigla, SUM(Proposicao_idProposicao) as qtdProjetos, SUM(votosSim) as votosSim, SUM(votosNao) as votosNao
					FROM deputado INNER JOIN partido ON deputado.idPartido = partido.idPartido 
					INNER JOIN proposicao ON proposicao.idDeputado = deputado.idDeputado
					INNER JOIN lei_ordinaria ON Proposicao_idProposicao = idProposicao
					WHERE nomePolitico = '$NOME_POLITICO'";
			$politico = array();
			$RETORNO = mysqli_query($conn, $SQL);
			if ($RETORNO) {
			 	while($row = mysqli_fetch_assoc($RETORNO)) {
			 		$politico = $row;
			 		break;
			    }
			}
			unset($SQL,$RETORNO);


 	 	$CONTENT_HTML->find('h2[id=nomePolitico]', 0)->innertext =  $politico['nomePolitico'];
 	 	$CONTENT_HTML->find('img[id=imageUrl]', 0)->src = '';
 	 	$CONTENT_HTML->find('strong[id=partido]', 0)->innertext =  $politico['sigla'];
 	 	$totalVotos =  $politico['votosNao'] + $politico['votosSim'];
 	 	$CONTENT_HTML->find('p[id=votosProjeto]', 0)->innertext =  "Votos em projetos: $totalVotos";
 	 	$CONTENT_HTML->find('p[id=qtdProjetos]', 0)->innertext =  'Projetos registrados: ' . $politico['qtdProjetos'];


 	 	$CONTENT_HTML->find('font[id=sim]', 0)->innertext = $politico['votosSim'] ." sim";
 	 	$CONTENT_HTML->find('font[id=nao]', 0)->innertext = $politico['votosNao'] ." nao";

	 }

	function selectPartidos($FILTER_PARTIDO){

		global $MAIN, $conn, $FILTERS_TOP, $FILTERS_SIDE;

		$SELECT_PARTIDOS = $MAIN->find("#selectPartido");
		$SQL = "SELECT sigla FROM partido ";

		///if($FILTER_PARTIDO != ""){
		// 	$SQL = $SQL."WHERE sigla = $FILTER_PARTIDO";
		// }

		$SQL = $SQL."ORDER BY sigla";
		$RETORNO = mysqli_query($conn, $SQL);
		if ($RETORNO) {
			while($row = mysqli_fetch_assoc($RETORNO)) {
				foreach ($FILTERS_TOP->find(".select-3") as $select) {
				 	$select->innertext .= '<option value="'.$row["sigla"].'">'.$row["sigla"].'</option>';
				 
				}
				foreach ($FILTERS_SIDE->find(".select-3") as $select) {
				 	$select->innertext .= '<option value="'.$row["sigla"].'">'.$row["sigla"].'</option>';
				 
				}
			}
		}
			unset($SQL,$RETORNO);
	}

	function selectLei_($NUMERO_LEI){

		global $MAIN_HTML;
		global $conn;

		$SELECT_PARTIDOS = $MAIN_HTML->find("#selectPartido");
		$SQL = "SELECT * FROM proposicao INNER JOIN lei_ordinaria ON Proposicao_idProposicao = idProposicao 
		WHERE numeroProposicao = $NUMERO_LEI ";

		$RETORNO = mysqli_query($conn, $SQL);
		if ($RETORNO) {
			 while($row = mysqli_fetch_assoc($RETORNO)) {
			 	foreach ($SELECT_PARTIDOS as $select) {
			 		$select->innertext .= '<option value="'.$row["sigla"].'">'.$row["sigla"].'</option>';
			 	}
			}
		}
			unset($SQL,$RETORNO);
	}

	function selectLeis($INICIO,$QT_CARDS){

		global $conn; 
	 		

			$SQL = "SELECT numeroProposicao,resumo, sum(votosSim) as votosSim, sum(votosNao) as votosNao, nomePolitico, sigla
					FROM lei_ordinaria INNER JOIN proposicao on lei_ordinaria.Proposicao_idProposicao = proposicao.idProposicao
					INNER JOIN deputado ON deputado.idDeputado = proposicao.idDeputado
					INNER JOIN partido on deputado.idPartido = partido.idPartido
					GROUP BY idProposicao
					ORDER BY votosSim+votosNao DESC 
					LIMIT $INICIO,$QT_CARDS";

			$RETORNO = mysqli_query($conn, $SQL);
			if ($RETORNO) {
			 	while($row = mysqli_fetch_assoc($RETORNO)) {

			 		$CONTENT_HTML = file_get_html(HTML_DIR."card.html");
			 		$totalVotos = $row["votosSim"] + $row["votosNao"];
			 		$CONTENT_HTML->find('img[id=card-img]', 0)->src = 'https://git.reviewboard.kde.org/media/uploaded/files/2015/07/18/a70d8ab6-1bbf-4dcc-b11f-524c2f56b14a__picture_default_cover.jpg';
					//$CONTENT_HTML->find('img[id=card-img]', 0)->src = $row["imageLei"];
					$CONTENT_HTML->find('img[id=card-img]', 0)->{'data-card-id'} = $row["numeroProposicao"];
					$CONTENT_HTML->find('h4[id=card-name]', 0)->innertext = '<span class="label label-default">' . $row["numeroProposicao"] . '</span>';
					//$CONTENT_HTML->find('h4[id=card-seg]', 0)->innertext = '<span class="label label-primary">Em breve</span>';
					$CONTENT_HTML->find('p[id=card-desc]', 0)->innertext = $row["resumo"];
					$CONTENT_HTML->find('p[id=card-desc]', 0)->{'data-val'}= "projeto:".$row["numeroProposicao"];
					$CONTENT_HTML->find('p[id=card-desc]', 0)->{'data-card-id'} = $row["numeroProposicao"];
					$CONTENT_HTML->find('img[id=card-politico-img]', 0)->src = '';
					//$CONTENT_HTML->find('img[id=card-politico-img]', 0)->src = $row["imagePolitico"];
					$CONTENT_HTML->find('p[id=card-politico-info]', 0)->innertext = 'Proposto pelo deputado<br/><a id="a-nomePol" class="altCursor formRef" data-name="div" data-val="politico:'. $row["nomePolitico"] . '">' . $row["nomePolitico"] . '</a> do <strong>'. $row["sigla"] .'</strong>';
					$CONTENT_HTML->find('p[id=card-footer]', 0)->innertext = 'Votação:'. $totalVotos. ', <font color="green">' . $row["votosSim"] . ' sim</font>, <font color="red">' . $row["votosNao"] . ' não.</font>';
					$CONTENT_HTML->find('p[class=p-btn-yes-no]', 0)->id = $row["numeroProposicao"];
					$CONTENT_HTML->find('button[class=btn-alt-yes]', 0)->{'data-parent-id'} = $row["numeroProposicao"];;
					$CONTENT_HTML->find('button[class=btn-alt-no]', 0)->{'data-parent-id'} = $row["numeroProposicao"];;

					$CARDS[] = $CONTENT_HTML;
			 	}
		 }

		 return $CARDS;

	}

	function selectPolitico($nomePolitico){

		global $CONTENT_HTML;
		global $conn;

		$SQL = "SELECT nomePolitico, sigla, count(proposicao.idProposicao) as projetos, sum(votosSim) as votosSim, sum(votosNao) as votosNao 
				FROM deputado INNER JOIN partido on deputado.idPartido = partido.idPartido 
				INNER JOIN proposicao on deputado.idDeputado = proposicao.idDeputado 
				INNER JOIN lei_ordinaria on lei_ordinaria.Proposicao_idProposicao = proposicao.idProposicao 
				WHERE sigla = $nomePolitico ";


		$RETORNO = mysqli_query($conn, $SQL);
			if ($RETORNO) {
			 	while($row = mysqli_fetch_assoc($RETORNO)) {

			 		$CONTENT_HTML->find('img[id=card-img]', 0)->src = 'https://pbs.twimg.com/profile_images/526853273546788864/xAkXA8V8.jpeg';
					//$CONTENT_HTML->find('img[id=card-img]', 0)->src = $row[imagePolitico];
					$CONTENT_HTML->find('div[id=card-pol-head-link]', 0)->{'data-card-id'} = $row["nomePolitico"];
					$CONTENT_HTML->find('h4[id=card-name]', 0)->innertext = $row["nomePolitico"];
					$CONTENT_HTML->find('img[id=card-partido-img]', 0)->src = 'http://www.ilheus24h.com.br/v1/wp-content/uploads/2013/10/logo_pt.gif';
					//$CONTENT_HTML->find('img[id=card-partido-img]', 0)->src = $row["imageSigla"];
					$CONTENT_HTML->find('p[id=card-partido-info]', 0)->innertext = '<strong>'. $row["sigla"] . '.</strong><br/><strong>';
					$CONTENT_HTML->find('p[id=card-desc]', 0)->innertext = 'Projetos registrados: 1034<br/><font color="green">740 aprovados</font>, <font color="red">294 reprovados</font>.';
					//$CONTENT_HTML->find('p[id=card-desc]', 0)->innertext = 'Projetos registrados: $row["projetos"]<br/><font color="green">740 aprovados</font>, <font color="red">294 reprovados</font>.';


			 		break;
			    }
			}
			unset($SQL,$RETORNO);

		/*
		$CONTENT_HTML->find('p[id=card-partido-info]', 0)->innertext = '<strong>PT</strong> - Partido do Trabalhador<br/><strong>2º</strong> mandato';
		
		*/
		$CARDS[] = $CONTENT_HTML;

	}

?>