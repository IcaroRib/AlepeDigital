<?php 

	require_once('conexaoDB.php');
	$conn = connect();

	if(function_exists($_POST['f'])) {
		$_POST["f"]($_POST["voto"],$_POST["lei"]);
	}

	function yesNoInsert($voto,$lei) {
	    
		global $conn;
		$lei = str_replace(" ","",$lei);
		$stringSQL = "UPDATE lei_ordinaria SET $voto = $voto+1 WHERE Proposicao_idProposicao in (
					SELECT idProposicao FROM proposicao WHERE numeroProposicao like '%$lei%')";
		mysqli_query($conn, $stringSQL);
		echo "sucesso";		
	}


?>