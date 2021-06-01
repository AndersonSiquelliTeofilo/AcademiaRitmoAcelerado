<?php 
	class Cliente {		
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
		
		private $Email;
		public function setEmail($valor) {
			if (strlen($valor) < 1) {
				throw new Exception('O Email não pode ser vazio');
			}
			$this->Email = $valor;
		}
		public function getEmail() {
			return $this->Email;
		}
		
		private $EmailConfirmado;
		public function setEmailConfirmado($valor) {
			$this->EmailConfirmado = $valor;
		}
		public function getEmailConfirmado() {
			return $this->EmailConfirmado;
		}
		
		private $Password;
		public function setPassword($valor) {
			if (strlen($valor) < 1) {
				throw new Exception('A senha não pode ser vazia');
			}
			$this->Password = $valor;
		}
		public function getPassword() {
			return $this->Password;
		}
		
		private $Foto;
		public function setFoto($valor) {
			if (strlen($valor) < 1) {
				throw new Exception('A foto precisa ser enviada');
			}
			$this->Foto = $valor;
		}
		public function getFoto() {
			return $this->Foto;
		}
		
		private $StatusCadastro;
		public function setStatusCadastro($valor) {
			if ($valor < 0) {
				throw new Exception('Este status de cadastro não existe');
			}
			$this->StatusCadastro = $valor;
		}
		public function getStatusCadastro() {
			return $this->StatusCadastro;
		}
		
		private $DataCriacao;
		
		private $DataNascimento;
		public function setDataNascimento($valor) {
			$mesAnoAtual = date('Y').'-'.date('m');
			$dataAtual = new DateTime(mesAnoAtual . '01');
			if ($valor > $dataAtual) {
				throw new Exception('Data de nascimento inválida');
			}
			$this->DataNascimento = $valor;
		}
		public function getDataNascimento() {
			return $this->DataNascimento;
		}
		
		private $Cpf;
		public function setCpf($valor) {
			if (strlen($valor) <> 11) {
				throw new Exception('Cpf inválido');
			}
			$this->Cpf = $valor;
		}
		public function getCpf() {
			return $this->Cpf;
		}
		
		private $Logradouro;
		public function setLogradouro($valor) {
			if (strlen($valor) < 1) {
				throw new Exception('Logradouro inválido');
			}
			$this->Logradouro = $valor;
		}
		public function getLogradouro() {
			return $this->Logradouro;
		}
		
		private $EnderecoNumero;
		public function setEnderecoNumero($valor) {
			if ($valor < 1) {
				throw new Exception('Endereço número inválido');
			}
			$this->EnderecoNumero = $valor;
		}
		public function getEnderecoNumero() {
			return $this->EnderecoNumero;
		}
		
		private $Cidade;
		public function setCidade($valor) {
			if (strlen($valor) < 1) {
				throw new Exception('Cidade inválida');
			}
			$this->Cidade = $valor;
		}
		public function getCidade() {
			return $this->Cidade;
		}
		
		private $Estado;
		public function setEstado($valor) {
			if (strlen($valor) <> 2) {
				throw new Exception('Estado inválida');
			}
			$this->Estado = $valor;
		}
		public function getEstado() {
			return $this->Estado;
		}
		
		private $Celular;
		public function setCelular($valor) {
			if ($valor !== ""){
				if (strlen($valor) < 1 or strlen($valor > 12)) {
					throw new Exception('Celular inválido');
				}
				$this->Celular = $valor;
			}
		}
		public function getCelular() {
			return $this->Celular;
		}
		
		private $Telefone;
		public function setTelefone($valor) {
			if ($valor !== ""){
				if (strlen($valor) < 1 or strlen($valor > 11)) {
				throw new Exception('Telefone inválido');
				}
				$this->Telefone = $valor;
			}
		}
		public function getTelefone() {
			return $this->Telefone;
		}
		
		private $ProdutoId;
		public function setProdutoId($valor) {
			$this->ProdutoId = $valor;
		}
		public function getProdutoId() {
			return $this->ProdutoId;
		}
		
		public function __construct($id, $nome, $email, $password, $foto, $statusCadastro,
		$dataNascimento, $cpf, $logradouro, $enderecoNumero, $cidade, $estado, $celular, $telefone, 
		$produtoId) {
			if (strlen($id) < 1) {
				throw new Exception('O id do usuário não pode ser menor que 1');
			}
			$this->Id = $id;
			$this->setNome($nome);
			$this->setEmail($email);
			$this->setEmailConfirmado(false);
			$this->setPassword($password);
			$this->setFoto($foto);
			$this->setStatusCadastro($statusCadastro);
			$this->DataCriacao = date('c');
			$this->setDataNascimento($dataNascimento);
			$this->setCpf($cpf);
			$this->setLogradouro($logradouro);
			$this->setEnderecoNumero($enderecoNumero);
			$this->setCidade($cidade);
			$this->setEstado($estado);
			$this->setCelular($celular);
			$this->setTelefone($telefone);
			$this->setProdutoId($produtoId);
		}
		
		public function sqlQueryInsert() {
			return "insert into clientes (Id, Nome, Email, EmailConfirmado, Password, Foto, StatusCadastro, DataCriacao, 
			DataNascimento, Cpf, Logradouro, EnderecoNumero, Cidade, Estado, Celular, Telefone, ProdutoId) 
			values ('$this->Id', '$this->Nome', '$this->Email', $this->EmailConfirmado, '$this->Password', '$this->Foto', 
			$this->StatusCadastro, '$this->DataCriacao', '$this->DataNascimento', '$this->Cpf', '$this->Logradouro',
			'$this->EnderecoNumero', '$this->Cidade', '$this->Estado', '$this->Celular', '$this->Telefone', '$this->ProdutoId')";
		}
	}

	abstract class Status
	{
		const AguardandoAprovacao = 0;
		const Desativado = 1;
		const Aprovado = 2;
	}
?>