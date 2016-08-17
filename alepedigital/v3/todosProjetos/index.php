<?php

include_once("../dominio/Usuario.php");
include_once("../common/tools/_tools.php");
include_once("../common/DB/conexaoDB.php");
include_once("../common/DB/loadDB.php");
include_once("../common/utils/Conversor.php");
include("../formater/TodosProjetosFormater.php");

if(!empty($_SESSION["usuario"])){
    $usuario = $_SESSION["usuario"];
}
else{
    $usuario = new Usuario();

}

$formater = new todosProjetosFormater($usuario);
$formater->formatarPagina();
$formater->gerarPagina();

?>
