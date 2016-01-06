<?php
require_once('Conexao.class.php');
class AlepeUpdates extends Conexao{
    
	public function updateAjax($inicio,$qntd){
		try{
			//verifica se há conexão com o banco de dados
			if(parent::getPDO() == null){
				//caso não tenha conecta-se com o banco de dados
				parent::conectar();
			}
		  
			//query a ser feita no banco de dados, usando PDO
			$retorno = $this->pdo->prepare("SELECT nomeCidade FROM cidade ORDER BY nomeCidade ASC LIMIT $inicio,$qntd");
			
			if($retorno->execute()){
				// preenche o combo
				$resultado = $retorno->fetchAll(PDO::FETCH_ASSOC);     
				//desconecta do banco de dados
				parent::desconectar();
				//retorna meu array
				return $resultado;
			}else{
				//caso haja erro na query deconecta do banco de dados
				parent::desconectar();
				//atribui um valor de erro para a variável    
				//retorna falso para a aplicação, houve algum tipo de erro
				return $this->erro = 'Erro ao atualizar, entre em contato com o administrador !';
			}
		  
		}catch ( PDOException $e ) {
			echo $e->getMessage ();
			return null;
		}
	}
}
?>