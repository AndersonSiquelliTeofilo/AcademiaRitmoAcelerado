<?php 
	class Usuario {		
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
		
		public function __construct($id, $nome, $email, $password, $foto, $statusCadastro) {
			if (strlen($id) < 1) {
				throw new Exception('O id do usuário não pode ser menor que 1');
			}
			$this->Id = $id;
			$this->setNome($nome);
			$this->setEmail($email);
			$this->setEmailConfirmado(true);
			$this->setPassword($password);
			$this->setFoto($foto);
			$this->setStatusCadastro($statusCadastro);
			$this->DataCriacao = date('c');
		}
		
		public function sqlQueryInsert() {
			return "insert into usuarios (Id, Nome, Email, EmailConfirmado, Password, Foto, StatusCadastro, DataCriacao) 
			values ('$this->Id', '$this->Nome', '$this->Email', $this->EmailConfirmado, '$this->Password', '$this->Foto', 
			$this->StatusCadastro, '$this->DataCriacao')";
		}
	}

	abstract class Status
	{
		const AguardandoAprovacao = 0;
		const Desativado = 1;
		const Aprovado = 2;
	}
?>