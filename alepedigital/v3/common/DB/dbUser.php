<?php 

	require_once('conexaoDB.php');

	$conn = connect();
	
	if(isset($_POST["insert"])){

		$user = insert();
		echo json_encode($user);
		
	}

	elseif(isset($_POST["update"])){

		$user = update();
		echo json_encode($user);

	}

	desconnect($conn);


	function insert(){

		$user = array();
		if(isset($_POST['nativeProfile'])){
			$user = selectUserNativeEmail($_POST["email"]);
	    	if($user['idUsuario'] == 0){
	    		$params = array($_POST["nome"],$_POST["urlImage"],$_POST["email"]);
				$user = insertGmailProfile($params);
	    	}
		}
	    //if(isset($_POST['facebookProfile']){}
	    if(isset($_POST["gmailProfile"])){

	    	$user = selectUserGmailId($_POST["IDGmail"]);
	    	if($user['idUsuario'] == 0){
	    		$params = array($_POST["nome"],$_POST["urlImage"],$_POST["email"],$_POST["IDGmail"]);
				$user = insertGmailProfile($params);
	    	}
		}

		return $user;

	}
	
	function insertGmailProfile($params) {

		global $conn;
		$stringSQL = "INSERT INTO usuario(nomeUsuario,urlImage,email,gmailId) VALUES ('$params[0]', '$params[1]',  '$params[2]', '$params[3]')";
		mysqli_query($conn, $stringSQL);
		$user = selectUserGmailId($params[3]);
		return $user;

	}

	function insertNativeProfile($params) {

		global $conn;
		$stringSQL = "INSERT INTO usuario(nomeUsuario,urlImage,email) VALUES ('$params[0]', '$params[1]',  '$params[2]')";
		mysqli_query($conn, $stringSQL);
		$user = selectUserGmailId($params[3]);
		return $user;

	}

	function updateUserProfile() {
	    
	}

	function selectUserNativeEmail($email) {
	    
	    global $conn;
		$user = array();
		$user['idUsuario'] = 0;
 		$stringSQL = "SELECT * FROM usuario WHERE email = $email";
 		$result_query = mysqli_query($conn,$stringSQL);
 	    while($result = mysqli_fetch_assoc($result_query)){			
			$user = $result;
			break;
		}	

		return $user;			
	}

	function selectUserGmailId($IDGmail) {
	    
	    global $conn;
		$user = array();
		$user['idUsuario'] = 0;
 		$stringSQL = "SELECT * FROM usuario WHERE gmailId = $IDGmail";
 		$result_query = mysqli_query($conn,$stringSQL);
 	    while($result = mysqli_fetch_assoc($result_query)){			
			$user = $result;
			break;
		}	

		return $user;			
	}


?>