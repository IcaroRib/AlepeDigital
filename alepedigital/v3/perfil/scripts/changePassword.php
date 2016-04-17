<?php 

// 	IMPORTANTE = ESTABELECER MEDIDAS DE SEGURANÇA PARA Q O SCRIPT NÃO POSSO SER ACESSADO PELO NAVEGADOR DIRETAMENTE

$response = array();
$response["success"] = false;


if (!empty($_POST["fp"]) &&
	!empty($_POST["np"])) {
	
	/* 
	 * VERIDICAR SE A SENHA ANTIGA (formerpass) CORRESPONDE A SENHA CORRETA DO USUÁRIO;
	 * EM SEGUIDA ALTERAR A SENHA PELA NOVA
	 * CASO FUNCIONE, SETAR $response["success"] = true, se não, não faça nada
	 */ 

//	if (/*conexão feita e formerpass corresponder a antiga no banco, faça ...*/) {
		$response["success"] = true;
//	}
	

}

return json_encode($response);


?>