<?php 

session_start();

$_SESSION['logged'] = true;
$_SESSION['id'] = $_POST['IDGmail'];
$_SESSION['nome'] = $_POST['nome'];

echo "sucess";
?>