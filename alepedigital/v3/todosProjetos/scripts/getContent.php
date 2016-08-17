<?php

include_once("../../dominio/Usuario.php");
include_once("../../common/tools/_tools.php");
include_once("../../formater/LeiCardFormater.php");
include_once("../../DAO/leiDAO.php");
include_once("../../common/utils/Conversor.php");
include_once("../../dominio/LeiOrdinaria.php");
include_once("../../dominio/Status.php");
include_once("../../dominio/Deputado.php");
include_once("../../dominio/Partido.php");

$page = (!empty($_POST["page"])) ? $_POST['page'] : 0;

//	-----------------------------------------------------
$leiFormater = new LeiCardFormater($page);
$leiFormater->preencherCards();
$leiFormater->imprimirCards();

//	-----------------------------------------------------

?>