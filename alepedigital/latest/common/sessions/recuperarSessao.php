<?php

	//---------------------------------------------------------------

	$LOGGED = (!empty($_SESSION["logged"])) ? $_SESSION["logged"] : false;
	$USER_FULL_NAME = (!empty($_SESSION["fullname"])) ? $_SESSION["fullname"] : "";
	$USER_USERNAME = (!empty($_SESSION["username"])) ? $_SESSION["username"] : "";
	$USER_EMAIL = (!empty($_SESSION["email"])) ? $_SESSION["email"] : "";
	$USER_IMG_SCR = (!empty($_SESSION["image"])) ? $_SESSION["image"] : "";

	//-----------------------------------------------------------------

	if ($LOGGED == 1) {
		$not_logged_components = $MAIN->find(".not-logged");
		foreach ($not_logged_components as $nlc) {
			$nlc->style .= "display:none;";
		}

		$MAIN -> find("img[id=user-pic]", 0) ->src = $USER_IMG_SCR;
		// Altera nome de usuário em botões (se logado)				
		$to_erase = substr($USER_FULL_NAME, strpos($USER_FULL_NAME, " ")); //parte do nome completo a ser apagada
		$USER_FIRST_NAME = str_replace($to_erase, "", $USER_FULL_NAME);
		$BTN_USER_OPT = $MAIN -> find("button[class=btn-user-opt]");
		foreach($BTN_USER_OPT as $button) {
		    $button ->innertext = $USER_FIRST_NAME. " <span class='caret'></span>";
		}

		// Adiciona os interesses (tags) do usuário à página (se logado)
		$DIV_TAGS = $MAIN -> find(".list-interesses");
		$aux_array = array();
		$SQL = "SELECT marcador,COUNT(marcador) AS qtTags 
		FROM usuario_lei_tag
		INNER JOIN usuario ON usuario_lei_tag.usuario_idUsuario = usuario.idUsuario;
		";
		// $RETORNO = runQuery($SQL);
		// if ($RETORNO) {
		// 	while($row = mysql_fetch_assoc($RETORNO)) {
		//     		$array_toAppend = array();
		//     		array_push($array_toAppend, $row["marcador"], $row["qtTags"]);
		// 			array_push($aux_array, $array_toAppend);
		//     }

		//     foreach ($DIV_TAGS as $aTag) {
		// 		$aTag->innertext = addTags(0,$aux_array);	
		// 	}	
		// } else 
		// {
		// 	foreach ($DIV_TAGS as $aTag) {
		// 		$aTag->innertext = "Nenhum marcador adicionado";
		// 	}
		// }
		unset($SQL, $RETORNO);
	}


?>