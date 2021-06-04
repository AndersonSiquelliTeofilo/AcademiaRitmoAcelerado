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
			$dataInicio = date_create($valor);
			$mesAnoAtual = date('Y').'-'.date('m');
			$dataAtual = date_create($mesAnoAtual . '-01');
			if ($dataInicio < $dataAtual) {
				throw new Exception('A data não pode ser menor do que o mês e ano atual');
			}
			$this->DataInicio = date_format($dataInicio, 'c');
		}
		public function getDataInicio() {
			return $this->DataInicio;
		}
		
		private $DataFim;
		public function setDataFim($valor) {
			$dataFim = date_create($valor);
			if ($dataFim < $this->DataInicio) {
				throw new Exception('A data fim não pode ser menor do que a data de início');
			}
			$this->DataFim = date_format($dataFim, 'c');
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
			return "insert into produtos (Id, Nome, Preco, DataInicio, DataFim) 
			values ('$this->Id', '$this->Nome', $this->Preco, '$this->DataInicio', '$this->DataFim')";
		}
	}
	
	function sqlQuerySelectAllProdutos() {
		return "select * from produtos where DataFim='9999-12-31 00:00:00'";
	}
	
	function sqlQuerySelectAllofAllProdutos() {
		return "select * from produtos order by DataFim desc";
	}	
?>