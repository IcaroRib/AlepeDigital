<?php 
	
include_once("simple_html_dom.php");
include_once("_defs.php");

session_start();

function user_logged() // REIMPLEMENTAR
{
	return (!empty($_SESSION["status"]) && $_SESSION["status"]) ? true : false;
}

function user_following_project() {
	return false;
}

function follow($id_usuario, $id_projeto) {
	if (empty($id_usuario) || empty($id_projeto)) {
		return false;
	}
	else {
		// IMPLEMENTAR INSERÇÃO NO BANCO em "usuario_projetoSeguido"
		return true;
	}
}

function unfollow($id_usuario, $id_projeto) {
	if (empty($id_usuario) || empty($id_projeto)) {
		return false;
	}
	else {
		// IMPLEMENTAR REMOÇÃO NO BANCO em "usuario_projetoSeguido"
		return true;
	}
}

function get_ages() { // CHECAR NO BANCO IDADE MAIS VELHA E MAIS NOVA
	$retorno = array();
	$retorno["min"] = 17;
	$retorno["max"] = 53;

	return $retorno;
}

function create_option_ages($min,$max) {
	$str_retorno = "";
	for ($i=$min; $i <= $max; $i++) { 
		$str_retorno .= "<option value='".$i."'>".$i."</option>";
	}
	return $str_retorno;
}

function kill_components($components)
{
	foreach ($components as $c) {
		$c->style .= "display:none;";
	}
}


function show_interesses($main)
{

	$interesses_divs = $main->find(".list-interesses");
	$interesses_input = $main->find("input[id=input-edit-interesses]", 0);
	$tags_qt = array();

	// para testes; verificar se está logado e pegar info de usuário do db
	for ($i=0; $i < 10; $i++) { 
		$tags_qt[] = array(
				    		"tag" => "tag".$i,
				    		"qt" => $i
				    	);
	}
	if (!empty($interesses_divs)) {
    	foreach ($interesses_divs as $i_d) {
			$i_d->innertext = (addTags($tags_qt)) ? addTags($tags_qt) : "Nenhuma tag registrada!" ;
		}
    }
	
	if (!empty($interesses_input)) {
		for ($i=0; $i < sizeof($tags_qt); $i++) { 
			$interesses_input->value .= $tags_qt[$i][0];
			if ($i !== sizeof($tags_qt) - 1) {
				$interesses_input->value .= ",";
			}
		}
	}

	/*
	$interesses_divs = $main->find(".list-interesses");
	$interesses_input = $main->find("input[id=input-edit-interesses]", 0);
	$tags_qt = array();
	$sql = "SELECT ...";
	$retorno = runQuery($sql);
	if ($retorno) {
	    while($row = mysql_fetch_assoc($retorno)) {
	    	$tags_qt[] = array(
					    		"tag" => $row["tag"],
					    		"qt" => $row["qt"]
					    	);
	    }
	    if (!empty($interesses_divs)) {
	    	foreach ($interesses_divs as $i_d) {
				$i_d->innertext = addTags($tags_qt);
			}
	    }
		
		if (!empty($interesses_input)) {
			for ($i=0; $i < sizeof($tags_qt); $i++) { 
				$interesses_input->value .= $tags_qt[$i][0];
				if ($i !== sizeof($tags_qt) - 1) {
					$interesses_input->value .= ",";
				}
			}
		}
	}

	else {		
		if (!empty($interesses_divs)) {
	    	foreach ($interesses_divs as $i_d) {
				$i_d->innertext = "Nenhum marcador adicionado";
			}
	    }
	}
	*/
}


function addTags($tags)
{
	if (!empty($tags)) {
		$retorno="";

		for ($i=0; $i < count($tags); $i++) {
			$retorno .= "<a style='display: inline-block; margin:3px;'>". $tags[$i]['tag'] ."(". $tags[$i]['qt'] .")</a>";
		}
			
		return $retorno;
	}

	else { return false; }
	
}

		

?>