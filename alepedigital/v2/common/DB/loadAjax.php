<?php
	//adiciono meu arquivo de functions
	require_once('includes/functions.php');
	//recebo via post minha variavel enviada pelo ajax
	$page = $_POST['page'];
	//defino a quantidade de registro trazidos a cada pesquisa
	$qntd = 45;
	//defino a partir de qual registro ele começa a buscar
	$inicio = $qntd * $page;
	//instacio minha classe
	$Wall = new Wall_Updates();
	//chamo meu método passando as variaveis de controle da query e guardo numa variavel
	$updatesarray = $Wall->UpdatesAjax($inicio,$qntd);
	//se houve registros retornados entra no if
	if(count($updatesarray)){
		foreach($updatesarray as $data){
		//percorre o array e joga na tela seu valor até seu final
?>
		<li><?php echo $data['nomeCidade'];?></li>
<?php
		}
	}else{
		//caso não haja mais registros retornados
		echo "Final de arquivo...";
	}
?>