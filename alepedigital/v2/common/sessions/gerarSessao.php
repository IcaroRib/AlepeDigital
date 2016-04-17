<?php 

session_start();

$_SESSION['logged'] = true;
$_SESSION['id'] = $_POST['idUsuario']; //(!empty($_POST['idUsuario'])) ? $_SESSION['id']: "";
$_SESSION['username'] = $_POST['username']; //(!empty($_POST['username'])) ? $_SESSION['username']: "";
$_SESSION['fullname'] =  $_POST['nomeUsuario'];//(!empty($_POST['nomeUsuario'])) ? $_SESSION['fullname']: "";
$_SESSION['sexo'] = $_POST['sexo'];
$_SESSION['image'] = $_POST['urlImage'];//(!empty($_POST['urlImage'])) ? $_SESSION['image']: "";
$_SESSION['email'] = $_POST['email'];//(!empty($_POST['email'])) ? $_SESSION['email']: "";
$_SESSION['senha'] = $_POST['senha'];//(!empty($_POST['senha'])) ? $_SESSION['senha']: "";
$_SESSION['cep'] = $_POST['cep'];//(!empty($_POST['cep'])) ? $_SESSION['cep']: "";
$_SESSION['cidade'] = $_POST['cidade'];//(!empty($_POST['cidade'])) ? $_SESSION['cidade']: "";
$_SESSION['estado'] = $_POST['estado'];//(!empty($_POST['estado'])) ? $_SESSION['estado']: "";
$_SESSION['bairro'] = $_POST['bairro'];//(!empty($_POST['bairro'])) ? $_SESSION['bairro']: "";
$_SESSION['logradouro'] = $_POST['logradouro'];//(!empty($_POST['logradouro'])) ? $_SESSION['logradouro']: "";

echo json_encode($_SESSION)	;
?>