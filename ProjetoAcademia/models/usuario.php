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
		
		public function __construct($id, $nome, $email, $password, $foto, $statusCadastro = 0, $emailConfirmado = true, $datacriacao = null) {
			if (strlen($id) < 1) {
				throw new Exception('O id do usuário não pode ser menor que 1');
			}
			$this->Id = $id;
			$this->setNome($nome);
			$this->setEmail($email);
			$this->setEmailConfirmado($emailConfirmado);
			$this->setPassword($password);
			$this->setFoto($foto);
			$this->setStatusCadastro($statusCadastro);
			if ($datacriacao == null) {
				$this->DataCriacao = date('c');
			} else {
				$this->DataCriacao = $datacriacao;
			}
		}
		
		public function sqlQueryInsert() {
			return "insert into usuarios (Id, Nome, Email, EmailConfirmado, Password, Foto, StatusCadastro, DataCriacao) 
			values ('$this->Id', '$this->Nome', '$this->Email', $this->EmailConfirmado, '$this->Password', '$this->Foto', 
			$this->StatusCadastro, '$this->DataCriacao')";
		}
		
		public function sqlQueryUpdate() {
			return "update usuarios set 
			Id='$this->Id', Nome='$this->Nome', Email='$this->Email', Password='$this->Password', Foto='$this->Foto'
			where Id='$this->Id'";
		}
	}

	function sqlQuerySelectAllUsers() {
		return "select * from usuarios order by DataCriacao desc";
	}
	
	function sqlQuerySelectUserById($id) {
		return "select * from usuarios where Id='$id'";
	}
	
	function sqlQuerySelectUserByEmail($email) {
		return "select Id, Nome, Password from usuarios where Email='$email' order by DataCriacao LIMIT 1";
	}
	
	function sqlQuerySelectFuncaoNomeUserById($id) {
		return "select F.Nome from usuariosfuncoes as UF inner join funcoes as F on UF.FuncaoId=F.Id where UF.UsuarioId='$id'";
	}
	
	function sqlQueryDeleteUserById($id) {
		return "delete from usuarios where Id='$id'";
	}
	
	function sqlQueryDeleteFuncaoByUserId($id) {
		return "delete from usuariosfuncoes where UsuarioId='$id'";
	}

	abstract class Status
	{
		const AguardandoAprovacao = 0;
		const Desativado = 1;
		const Aprovado = 2;
		
		public static function type($valor) {
			if ($valor == 0) {
				return "Aguardando Aprovação";
			}
			if ($valor == 1) {
				return "Desativado";
			}
			if ($valor == 2) {
				return "Aprovado";
			}
			return "Inválido";
		}
	}
?>