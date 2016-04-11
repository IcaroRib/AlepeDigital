<?php

	include_once("../../common/tools/_tools.php");

	$retorno = array();
	$retorno["success"] = false;
	$retorno["type"] = "0";
	$retorno["message"] = "";

	if (!empty($_POST)) {
//		if (user_logged()) {
			$id_projeto = $_POST["id"]; // id da postagem
			$type = $_POST["type"];
//			$id_usuario = $_SESSION["user_id"]; // id do usuario
			$id_usuario = "13123123"; // id do usuario

			$result = ($type === "0") ? follow($id_usuario,$id_projeto) : unfollow($id_usuario,$id_projeto);

			if ($result) {
				$retorno["success"] = true;
				$retorno["type"] = ($type === "0") ? "1" : "0";
			}
			else {
				$word = ($type === "0") ? "seguir" : "deixar de seguir";
				$retorno["message"] = "Falha ao tentar ".$word." este projeto! Tente novamente. || $id_projeto";
			}

//		}

//		else {
//			$retorno["message"] = "Faça login para poder seguir uma postagem!";
//		}
	}

	echo json_encode($retorno, JSON_UNESCAPED_UNICODE);



?>