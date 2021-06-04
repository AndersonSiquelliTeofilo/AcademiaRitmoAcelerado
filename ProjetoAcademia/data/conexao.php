<?php
class BancodeDados {
	
    // Dados do banco de dados
    private $host = "localhost"; 	// Nome ou IP do Servidor
    private $user = "root"; 		// Usu�rio do Servidor MySQL
    private $senha = "usbw"; 		// Senha do Usu�rio MySQL
    private $banco = "academia"; 	// Nome do seu Banco de Dados
    public $con;
	
	// Respons�vel para conex�o com base de dados
	function conecta(){
        $this->con = @mysqli_connect($this->host,$this->user,$this->senha, $this->banco);
	    // Conecta ao Banco de Dados
        if(!$this->con){
      		// Caso ocorra um erro, exibe uma mensagem com o erro
			die ("Problemas com a conex�o");
        }
    }
	
	// Rrespons�vel para fechar a conex�o
	function fechar(){
		mysqli_close($this->con);
		return;
	}
	
	// Devolve uma linha do banco de dados
	function sqlQuery($string) {
		$resultado = @mysqli_query($this->con, $string);
		if (!$resultado) {
			die('<b>Query Inv�lida:</b>' . @mysqli_error($this->con)); 
			return false;
		} else {
			$num = @mysqli_num_rows($resultado);
			if ($num==0){
				return false;
			} else {
				$dados=mysqli_fetch_array($resultado);
				return $dados;
			}
		}
	}
	
	// Devolve uma lista com base na query string
	// Precisa aplicar o While($dados=mysqli_fetch_array($resultado)) para listar
	function sqlQueryToList($string) {
		$resultado = @mysqli_query($this->con, $string);
		if (!$resultado) {
			die('<b>Query Inv�lida:</b>' . @mysqli_error($this->con)); 
			return false;
		} else {
			$num = @mysqli_num_rows($resultado);
			if ($num==0) {
				return false;
			} else{
				return $resultado;
			}
		}
	}
	
	// Respons�vel pelo CRUD do sistema
	// Queries de insert, update ou delete
	function sqlQueryCommand($string) {
		$resultado = @mysqli_query($this->con, $string);
		if (!$resultado) {
			die('<b>Query Inv�lida:</b>' . @mysqli_error($mysql->con));
			return false;
		} else {
			return true;
		}
	}
}
?>