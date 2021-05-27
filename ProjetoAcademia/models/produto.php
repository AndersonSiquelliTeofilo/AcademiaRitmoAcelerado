<?php 
	class Produto {		
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
		
		private $Preco;
		public function setPreco($valor) {
			if ($valor < 1) {
				throw new Exception('O preço não pode ser vazio');
			}
			$this->Preco = $valor;
		}
		public function getPreco() {
			return $this->Preco;
		}
		
		private $DataInicio;
		public function setDataInicio($valor) {
			$mesAnoAtual = date('Y').'-'.date('m');
			$dataAtual = new DateTime(mesAnoAtual . '01');
			if ($valor < $dataAtual) {
				throw new Exception('A data não pode ser menor do que o mês e ano atual');
			}
			$this->DataInicio = $valor;
		}
		public function getDataInicio() {
			return $this->DataInicio;
		}
		
		private $DataFim;
		public function setDataFim($valor) {
			if ($valor < $this->DataInicio) {
				throw new Exception('A data fim não pode ser menor do que a data de início');
			}
			$this->DataFim = $valor;
		}
		public function getDataFim() {
			return $this->DataFim;
		}
		
		public function __construct($id, $nome, $preco, $dataInicio, $dataFim) {
			if (strlen($id) < 1) {
				throw new Exception('O id da função não pode ser menor que 1');
			}
			$this->Id = $id;
			$this->setNome($nome);
			$this->setPreco($preco);
			$this->setDataInicio($dataInicio);
			$this->setDataFim($dataFim);
		}
		
		public function sqlQueryInsert() {
			return "insert into funcoes (Id, Nome, Preco, DataInicio, DataFim) 
			values ('$this->Id', '$this->Nome', $this->Preco, '$this->DataInicio', '$this->DataFim')";
		}
	}
?>