<?php

	 require_once("Crud.php");


	 class Dadospessoais extends Crud{

		protected $tabela = 'dadospessoais';
		private $iddados;
		private $sexo;
		private $data_nascimento;
		private $estado_civil;
		private $email;
		private $senha;
		private $ano_ingresso;
		private $ano_conclusao;
		private $bairro;
		private $cidade;
		private $uf;
		private $pais;
		private $cpf;
		private $telefone;
		private $cidade_natal;
		private $estado_natal;
		private $nome;
		private $sobrenome;
		private $numero;
		private $rua;
		private $egresso_cpf;

		public function getIddados()
		{
			return $this->iddados;
		}

		public function setIddados($iddados)
		{
			$this->iddados = $iddados;
		}

         /**
          * @return mixed
          */
         public function getSexo()
         {
             return $this->sexo;
         }

         /**
          * @param mixed $sexo
          */
         public function setSexo($sexo)
         {
             $this->sexo = $sexo;
         }

         /**
          * @return mixed
          */
         public function getDataNascimento()
         {
             return $this->data_nascimento;
         }

         /**
          * @param mixed $data_nascimento
          */
         public function setDataNascimento($data_nascimento)
         {
             $this->data_nascimento = $data_nascimento;
         }

         /**
          * @return mixed
          */
         public function getEstadoCivil()
         {
             return $this->estado_civil;
         }

         /**
          * @param mixed $estado_civil
          */
         public function setEstadoCivil($estado_civil)
         {
             $this->estado_civil = $estado_civil;
         }

         /**
          * @return mixed
          */
         public function getEmail()
         {
             return $this->email;
         }

         /**
          * @param mixed $email
          */
         public function setEmail($email)
         {
             $this->email = $email;
         }

         /**
          * @return mixed
          */
         public function getSenha()
         {
             return $this->senha;
         }

         /**
          * @param mixed $senha
          */
         public function setSenha($senha)
         {
             $this->senha = $senha;
         }

         /**
          * @return mixed
          */
         public function getAnoIngresso()
         {
             return $this->ano_ingresso;
         }

         /**
          * @param mixed $ano_ingresso
          */
         public function setAnoIngresso($ano_ingresso)
         {
             $this->ano_ingresso = $ano_ingresso;
         }

         /**
          * @return mixed
          */
         public function getAnoConclusao()
         {
             return $this->ano_conclusao;
         }

         /**
          * @param mixed $ano_conclusao
          */
         public function setAnoConclusao($ano_conclusao)
         {
             $this->ano_conclusao = $ano_conclusao;
         }

         /**
          * @return mixed
          */
         public function getBairro()
         {
             return $this->bairro;
         }

         /**
          * @param mixed $bairro
          */
         public function setBairro($bairro)
         {
             $this->bairro = $bairro;
         }

         /**
          * @return mixed
          */
         public function getCidade()
         {
             return $this->cidade;
         }

         /**
          * @param mixed $cidade
          */
         public function setCidade($cidade)
         {
             $this->cidade = $cidade;
         }

         /**
          * @return mixed
          */
         public function getUf()
         {
             return $this->uf;
         }

         /**
          * @param mixed $uf
          */
         public function setUf($uf)
         {
             $this->uf = $uf;
         }

         /**
          * @return mixed
          */
         public function getPais()
         {
             return $this->pais;
         }

         /**
          * @param mixed $pais
          */
         public function setPais($pais)
         {
             $this->pais = $pais;
         }

         /**
          * @return mixed
          */
         public function getCpf()
         {
             return $this->cpf;
         }

         /**
          * @param mixed $cpf
          */
         public function setCpf($cpf)
         {
             $this->cpf = $cpf;
         }

         /**
          * @return mixed
          */
         public function getTelefone()
         {
             return $this->telefone;
         }

         /**
          * @param mixed $telefone
          */
         public function setTelefone($telefone)
         {
             $this->telefone = $telefone;
         }

         /**
          * @return mixed
          */
         public function getCidadeNatal()
         {
             return $this->cidade_natal;
         }

         /**
          * @param mixed $cidade_natal
          */
         public function setCidadeNatal($cidade_natal)
         {
             $this->cidade_natal = $cidade_natal;
         }

         /**
          * @return mixed
          */
         public function getEstadoNatal()
         {
             return $this->estado_natal;
         }

         /**
          * @param mixed $estado_natal
          */
         public function setEstadoNatal($estado_natal)
         {
             $this->estado_natal = $estado_natal;
         }

         /**
          * @return mixed
          */
         public function getNome()
         {
             return $this->nome;
         }

         /**
          * @param mixed $nome
          */
         public function setNome($nome)
         {
             $this->nome = $nome;
         }

         /**
          * @return mixed
          */
         public function getSobrenome()
         {
             return $this->sobrenome;
         }

         /**
          * @param mixed $sobrenome
          */
         public function setSobrenome($sobrenome)
         {
             $this->sobrenome = $sobrenome;
         }

         /**
          * @return mixed
          */
         public function getNumero()
         {
             return $this->numero;
         }

         /**
          * @param mixed $numero
          */
         public function setNumero($numero)
         {
             $this->numero = $numero;
         }

         /**
          * @return mixed
          */
         public function getRua()
         {
             return $this->rua;
         }

         /**
          * @param mixed $rua
          */
         public function setRua($rua)
         {
             $this->rua = $rua;
         }

         /**
          * @return mixed
          */
         public function getEgressoCpf()
         {
             return $this->egresso_cpf;
         }

         /**
          * @param mixed $egresso_cpf
          */
         public function setEgressoCpf($egresso_cpf)
         {
             $this->egresso_cpf = $egresso_cpf;
         }





		public function findUnit($id) {
		 $sql = "SELECT * FROM $this->tabela WHERE id=:iddadospessoais";
		 $stm = DB::prepare($sql);
		 $stm->bindParam(':iddadospessoais',$id, PDO::PARAM_INT);
		 $stm->execute();
		 return $stm->fetch();
		}
		public function findAll() {
		 $sql = "SELECT * FROM $this->tabela";
		 $stm = DB::prepare($sql);
		 $stm->execute();
		 return $stm->fetchAll();
		}

		public function mostrarCadastrados() {
		 $sql = "SELECT dadospessoais.ano_ingresso, dadospessoais.ano_conclusao, dadospessoais.nome, dadospessoais.sobrenome, trajetoria.curso FROM egresso INNER JOIN dadospessoais ON egresso.cpf = dadospessoais.Egresso_cpf INNER JOIN trajetoria ON egresso.cpf = trajetoria.Egresso_cpf";
		 $stm = DB::prepare($sql);
		 $stm->execute();
		 return $stm->fetchAll();
		}


		public function insert() {
		 $sql = "INSERT INTO $this->tabela (sexo,data_nascimento,estado_civil,email,senha,ano_ingresso,ano_conclusao,bairro,cidade_dp,uf,pais,telefone,cidade_natal,estado_natal,nome,sobrenome,numero,rua,egresso_cpf) VALUES(:sexo,:data_nascimento,:estado_civil,:email,:senha,:ano_ingresso,:ano_conclusao,:bairro,:cidade_dp,:uf,:pais,:telefone,:cidade_natal,:estado_natal,:nome,:sobrenome,:numero,:rua,:egresso_cpf)";
		 $stm = DB::prepare($sql);
		 $stm->bindParam(':sexo', $this->sexo);
		 $stm->bindParam(':data_nascimento', $this->data_nascimento);
		 $stm->bindParam(':estado_civil', $this->estado_civil);
		 $stm->bindParam(':email', $this->email);
		 $stm->bindParam(':senha', $this->senha);
		 $stm->bindParam(':ano_ingresso', $this->ano_ingresso);
		 $stm->bindParam(':ano_conclusao', $this->ano_conclusao);
		 $stm->bindParam(':bairro', $this->bairro);
		 $stm->bindParam(':cidade_dp', $this->cidade);
		 $stm->bindParam(':uf', $this->uf);
		 $stm->bindParam(':pais', $this->pais);
		 $stm->bindParam(':telefone', $this->telefone);
		 $stm->bindParam(':cidade_natal', $this->cidade_natal);
		 $stm->bindParam(':estado_natal', $this->estado_natal);
		 $stm->bindParam(':nome', $this->nome);
		 $stm->bindParam(':sobrenome', $this->sobrenome);
		 $stm->bindParam(':numero', $this->numero);
		 $stm->bindParam(':rua', $this->rua);
		 $stm->bindParam(':egresso_cpf', $this->egresso_cpf);
		 return $stm->execute();
		}
		public function update($id) {
		 $sql = "UPDATE $this->tabela SET sexo=:sexo,data_nascimento=:data_nascimento,estado_civil=:estado_civil,email=:email,senha=:senha,ano_ingresso=:ano_ingresso,ano_conclusao=:ano_conclusao,bairro=:bairro,cidade_dp=:cidade_dp,uf=:uf,pais=:pais,telefone=:telefone,cidade_natal=:cidade_natal,estado_natal=:estado_natal,nome=:nome,sobrenome=:sobrenome,numero=:numero,rua=:rua WHERE  iddados=:iddados";
		 $stm = DB::prepare($sql);
		 $stm->bindParam(':iddados',$id, PDO::PARAM_INT);
		 $stm->bindParam(':sexo', $this->sexo);
		 $stm->bindParam(':data_nascimento', $this->data_nascimento);
		 $stm->bindParam(':estado_civil', $this->estado_civil);
		 $stm->bindParam(':email', $this->email);
		 $stm->bindParam(':senha', $this->senha);
		 $stm->bindParam(':ano_ingresso', $this->ano_ingresso);
		 $stm->bindParam(':ano_conclusao', $this->ano_conclusao);
		 $stm->bindParam(':bairro', $this->bairro);
		 $stm->bindParam(':cidade_dp', $this->cidade);
		 $stm->bindParam(':uf', $this->uf);
		 $stm->bindParam(':pais', $this->pais);
		 $stm->bindParam(':telefone', $this->telefone);
		 $stm->bindParam(':cidade_natal', $this->cidade_natal);
		 $stm->bindParam(':estado_natal', $this->estado_natal);
		 $stm->bindParam(':nome', $this->nome);
		 $stm->bindParam(':sobrenome', $this->sobrenome);
		 $stm->bindParam(':numero', $this->numero);
		 $stm->bindParam(':rua', $this->rua);
		 return $stm->execute();
		}
		public function delete($cpf) {
		 $sql = "DELETE FROM $this->tabela WHERE Egresso_cpf=:$cpf";
		 $stm = DB::prepare($sql);
		 $stm->bindParam(':Egresso_cpf',$cpf, PDO::PARAM_INT);
		 return $stm->execute();
		}

	}