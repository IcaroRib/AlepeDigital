<?php    
	
	function connect(){

		$servername = 'localhost';
		$username = 'root';
		$password = 'JME.megasin-02';
		$dbname = 'alepedigital';
		//echo json_encode($_POST);

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname) or die(mysqli_error());
		
		return $conn;

	}

	function desconnect($conn){

		mysqli_close($conn);

	}

?>