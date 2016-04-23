<?php 

	require_once('conexaoDB.php');
	$conn = connect();

	if(!empty($_POST['f2'])) {
		$retorno = $_POST["f2"]($_POST["param1"],$_POST["param2"]);
		echo json_encode($retorno);
	}

	else if(!empty($_POST['f3'])) {
		$retorno = $_POST["f3"]($_POST["param1"],$_POST["param2"],$_POST["param3"]);
		echo json_encode($retorno);
	}

	elseif(!empty($_POST['f4'])) {
		$retorno = $_POST["f4"]($_POST["param1"],$_POST["param2"],$_POST["param3"],$_POST["param4"]);
		echo json_encode($retorno);
	}

	function yesNoSum($voto,$lei) {
	    
		global $conn;
		$lei = str_replace(" ","",$lei);
		$voto = 'votos'.$voto;
		$stringSQL = "UPDATE lei_ordinaria SET $voto = $voto+1 WHERE Proposicao_idProposicao in (
					SELECT idProposicao FROM proposicao WHERE numeroProposicao like '%$lei%')";
		echo $stringSQL;
		mysqli_query($conn, $stringSQL);
		return "sucesso";		
	}

	function yesNoUpdate($votoAntigo,$votoNovo,$lei) {
	    
		global $conn;
		$lei = str_replace(" ","",$lei);		
		$votoAntigo = 'votos'.$votoAntigo;
		$votoNovo = 'votos'.$votoNovo;
		$stringSQL = "UPDATE lei_ordinaria SET $votoNovo = $votoNovo+1, $votoAntigo = $votoAntigo-1
					WHERE Proposicao_idProposicao in (
					SELECT idProposicao FROM proposicao WHERE numeroProposicao like '%$lei%')";
		echo $stringSQL;
		mysqli_query($conn, $stringSQL);
		return "sucesso";		
	}

	function voto_usuario_Insert($idUsuario,$lei,$voto) {
	    
		global $conn;
		$lei = str_replace(" ","",$lei);
		$idLei = selectLei($lei);
		$stringSQL = "INSERT INTO usuario_voto VALUES($idUsuario,$idLei,'$voto')";
		echo $stringSQL;
		mysqli_query($conn, $stringSQL);
		yesNoSum($voto,$lei);
		return "sucesso";		
	}

	function voto_usuario_Update($idUsuario,$lei,$votoAntigo,$votoNovo) {
	    
		global $conn;
		$lei = str_replace(" ","",$lei);
		$idLei = selectLei($lei);
		$stringSQL = "UPDATE usuario_voto SET voto = '$votoNovo'";
		mysqli_query($conn, $stringSQL);
		yesNoUpdate($votoAntigo,$votoNovo,$lei);
		return "sucesso";		
	}

	function selectLei($lei){
		global $conn;
		$lei = str_replace(" ","",$lei);
		$stringSQL = "SELECT idProposicao
					FROM lei_ordinaria INNER JOIN proposicao on lei_ordinaria.Proposicao_idProposicao = proposicao.idProposicao
					WHERE numeroProposicao like '%$lei%'";
		$result_query = mysqli_query($conn,$stringSQL);
		$idLei = "";
 	    while($result = mysqli_fetch_assoc($result_query)){			
			$idLei = $result["idProposicao"];
			break;
		}			
		return $idLei;

	}

	function selectVoto($id_usuario,$lei){
		global $conn;
		$lei = str_replace(" ","",$lei);
		$stringSQL = "SELECT * FROM usuario_voto WHERE id_usuario = $id_usuario and id_lei in(
					  SELECT idProposicao FROM proposicao WHERE numeroProposicao like '%$lei%')";
		$result_query = mysqli_query($conn,$stringSQL);
		$voto = "";
 	    while($result = mysqli_fetch_assoc($result_query)){			
			$voto = $result["voto"];
			break;
		}			
		return $voto;

	}

?>