<?php

class Tarefa{

   private $id;
   private $descricao;
   private $tipo;
   private $cliente;
   private $valor;
   private $horasTrabalhadas;
   private $status;
   private $prioridade;

   //Criar tabela no banco
   //Criar view 
   //Criar DAO
   //Criar Controller

   
   //dica util: para alterar o id para auto increment se você criou a tabela pelo modo grafico
   /*ALTER TABLE nome da tabela 
   MODIFY id INT NOT NULL AUTO_INCREMENT;*/

   /**
    * Get the value of descricao
    */ 
   public function getDescricao()
   {
      return $this->descricao;
   }

   /**
    * Set the value of descricao
    *
    * @return  self
    */ 
   public function setDescricao($descricao)
   {
      $this->descricao = $descricao;

      return $this;
   }

   /**
    * Get the value of tipo
    */ 
   public function getTipo()
   {
      return $this->tipo;
   }

   /**
    * Set the value of tipo
    *
    * @return  self
    */ 
   public function setTipo($tipo)
   {
      $this->tipo = $tipo;

      return $this;
   }

   /**
    * Get the value of cliente
    */ 
   public function getCliente()
   {
      return $this->cliente;
   }

   /**
    * Set the value of cliente
    *
    * @return  self
    */ 
   public function setCliente($cliente)
   {
      $this->cliente = $cliente;

      return $this;
   }

   /**
    * Get the value of valor
    */ 
   public function getValor()
   {
      return $this->valor;
   }

   /**
    * Set the value of valor
    *
    * @return  self
    */ 
   public function setValor($valor)
   {
      $this->valor = $valor;

      return $this;
   }

   /**
    * Get the value of horasTrabalhadas
    */ 
   public function getHorasTrabalhadas()
   {
      return $this->horasTrabalhadas;
   }

   /**
    * Set the value of horasTrabalhadas
    *
    * @return  self
    */ 
   public function setHorasTrabalhadas($horasTrabalhadas)
   {
      $this->horasTrabalhadas = $horasTrabalhadas;

      return $this;
   }

   /**
    * Get the value of status
    */ 
   public function getStatus()
   {
      return $this->status;
   }

   /**
    * Set the value of status
    *
    * @return  self
    */ 
   public function setStatus($status)
   {
      $this->status = $status;

      return $this;
   }

   /**
    * Get the value of prioridade
    */ 
   public function getPrioridade()
   {
      return $this->prioridade;
   }

   /**
    * Set the value of prioridade
    *
    * @return  self
    */ 
   public function setPrioridade($prioridade)
   {
      $this->prioridade = $prioridade;

      return $this;
   }

   public function getId()
   {
      return $this->id;
   }

   /**
    * Set the value of descricao
    *
    * @return  self
    */ 
   public function setId($id)
   {
      $this->id = $id;

      return $this;
   }
}