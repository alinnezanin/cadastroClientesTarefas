<?php

class Cliente{

   private $nome;
   private $email;
   private $telefone;
   private $endereco;
   private $cidade;
   private $estado;
   private $id;
   private $foto;

   

   /**
    * Get the value of estado
    */ 
   public function getEstado()
   {
      return $this->estado;
   }

   /**
    * Set the value of estado
    *
    * @return  self
    */ 
   public function setEstado($estado)
   {
      $this->estado = $estado;

      return $this;
   }

   /**
    * Get the value of cidade
    */ 
   public function getCidade()
   {
      return $this->cidade;
   }

   /**
    * Set the value of cidade
    *
    * @return  self
    */ 
   public function setCidade($cidade)
   {
      $this->cidade = $cidade;

      return $this;
   }

   /**
    * Get the value of endereco
    */ 
   public function getEndereco()
   {
      return $this->endereco;
   }

   /**
    * Set the value of endereco
    *
    * @return  self
    */ 
   public function setEndereco($endereco)
   {
      $this->endereco = $endereco;

      return $this;
   }

   /**
    * Get the value of telefone
    */ 
   public function getTelefone()
   {
      return $this->telefone;
   }

   /**
    * Set the value of telefone
    *
    * @return  self
    */ 
   public function setTelefone($telefone)
   {
      $this->telefone = $telefone;

      return $this;
   }

   /**
    * Get the value of email
    */ 
   public function getEmail()
   {
      return $this->email;
   }

   /**
    * Set the value of email
    *
    * @return  self
    */ 
   public function setEmail($email)
   {
      $this->email = $email;

      return $this;
   }

   /**
    * Get the value of nome
    */ 
   public function getNome()
   {
      return $this->nome;
   }

   /**
    * Set the value of nome
    *
    * @return  self
    */ 
   public function setNome($nome)
   {
      $this->nome = $nome;

      return $this;
   }

   

   /**
    * Get the value of id
    */ 
   public function getId()
   {
      return $this->id;
   }

   /**
    * Set the value of id
    *
    * @return  self
    */ 
   public function setId($id)
   {
      $this->id = $id;

      return $this;
   }

   /**
    * Get the value of foto
    */ 
   public function getFoto()
   {
      return $this->foto;
   }

   /**
    * Set the value of foto
    *
    * @return  self
    */ 
   public function setFoto($foto)
   {
      $this->foto = $foto;

      return $this;
   }
}