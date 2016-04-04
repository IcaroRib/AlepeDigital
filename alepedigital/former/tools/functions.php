<?php 



	function addTags($tags) {

		$retorno="";

		for ($i=0;$i < count($tags);$i++) {
			$retorno.= "<a style='display: inline-block; margin:3px;'>".$tags[$i][0]."(".$tags[$i][1].")</a>";
		}
		
		return $retorno;
	}

		

?>