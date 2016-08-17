<?php
	
	if(isset($_POST["insert"])){

		$user = insert();
		
		echo json_encode($user);
		
	}

	elseif(isset($_POST["update"])){

		$user = update();
		echo json_encode($user);

	}

	desconnect($conn);

?>