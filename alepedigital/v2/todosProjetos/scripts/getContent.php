<?php

include_once("../../common/tools/_tools.php");
include_once("../../common/DB/conexaoDB.php");
include_once("../../common/DB/loadDB.php");


$page = (!empty($_POST["page"])) ? $_POST['page'] : 0;
$qt_cards = 9;
$start = $qt_cards * $page;
$cards = [];


//Chamada do método que seleciona as leis
//	-----------------------------------------------------
$conn = connect();
$cards = selectLeis($start,$qt_cards);
desconnect($conn);

//	-----------------------------------------------------

foreach ($cards as $card) {
	echo($card);
}


?>