<?php 
	class Funcao {		
		private $Id;
		public function getId() {
			return $this->Id;
		}	
		
		private $Nome;
		public function setNome($valor) {
			if (strlen($valor) < 1) {
				throw new Exception('O nome não pode ser vazio');
			}
			$this->Nome = $valor;
		}		
		public function getNome() {
			return $this->Nome;
		}
		
		public function __construct($id, $nome) {
			if (strlen($id) < 1) {
				throw new Exception('O id do usuário não pode ser menor que 1');
			}
			$this->Id = $id;
			$this->setNome($nome);
		}
		
		public function sqlQueryInsert() {
			return "insert into usuarios (Id, Nome) values ('$this->Id', '$this->Nome')";
		}
	}
?>