<?php

include_once 'Conexao.php';
include_once '../model/ClienteModel.php';


class ClienteDao{


    
    public static function inserirCliente($cliente){

        $sql = "INSERT INTO clientes "
        . "(nome, telefone, email, endereco, estado, cidade, foto) VALUES"
        . " ('".$cliente->getNome()."',"
        . "  '".$cliente->getTelefone()."' , "
        . "  '".$cliente->getEmail()."' , "
        . "  '".$cliente->getEndereco()."' , "
        . "  '".$cliente->getEstado()."' , "
        . "  '".$cliente->getCidade()."' ,"
        . "  '".$cliente->getFoto()."'"
        . "  ); ";

        Conexao::executar($sql);
    }

    public static function consultarClientes(){
        $sql = "SELECT * FROM clientes";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if($result != null){
            while(list($_nome, $_email, $_telefone,  
            $_endereco,$_cidade, $_estado,$_id, $_foto) = mysqli_fetch_row($result)){
                $cliente = new Cliente();
                $cliente->setNome($_nome);
                $cliente->setEmail($_email);
                $cliente->setTelefone($_telefone);
                $cliente->setEndereco($_endereco);
                $cliente->setCidade($_cidade);
                $cliente->setEstado($_estado);
                $cliente->setId($_id);
                $cliente->setFoto($_foto);
                $lista->append($cliente);
            }
        }
        return $lista;
    }

    public static function consultarClientesOrderBy($ordenacao){
        $sql = "SELECT * FROM clientes order by $ordenacao";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if($result != null){
            while(list($_nome, $_email, $_telefone,  
            $_endereco,$_cidade, $_estado,$_id, $_foto) = mysqli_fetch_row($result)){
                $cliente = new Cliente();
                $cliente->setNome($_nome);
                $cliente->setEmail($_email);
                $cliente->setTelefone($_telefone);
                $cliente->setEndereco($_endereco);
                $cliente->setCidade($_cidade);
                $cliente->setEstado($_estado);
                $cliente->setId($_id);
                $cliente->setFoto($_foto);
                $lista->append($cliente);
            }
        }
        return $lista;
    }

    public static function consultarClientesFilterByKey($campo, $valor){
        $sql = "SELECT * FROM clientes WHERE $campo like '%$valor%' order by $campo";
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if($result != null){
            while(list($_nome, $_email, $_telefone,  
            $_endereco,$_cidade, $_estado,$_id, $_foto) = mysqli_fetch_row($result)){
                $cliente = new Cliente();
                $cliente->setNome($_nome);
                $cliente->setEmail($_email);
                $cliente->setTelefone($_telefone);
                $cliente->setEndereco($_endereco);
                $cliente->setCidade($_cidade);
                $cliente->setEstado($_estado);
                $cliente->setId($_id);
                $cliente->setFoto($_foto);
                $lista->append($cliente);
            }
        }
        return $lista;
    }



    public static function consultarClientePorId($id){
        $sql = "SELECT * FROM clientes where id ={$id}";
        $result = Conexao::consultar($sql);
           list($_nome, $_email, $_telefone,  
            $_endereco,$_cidade, $_estado,$_id, $_foto) = mysqli_fetch_row($result);
                $cliente = new Cliente();
                $cliente->setNome($_nome);
                $cliente->setEmail($_email);
                $cliente->setTelefone($_telefone);
                $cliente->setEndereco($_endereco);
                $cliente->setCidade($_cidade);
                $cliente->setEstado($_estado);
                $cliente->setId($_id);
                $cliente->setFoto($_foto);
  
       return $cliente;
    }

    public static function excluirCliente($id){
        echo "batatinhas";
        $sql = "DELETE FROM clientes "
            . " where id='".$id."'";     
        Conexao::executar($sql);
    }

    public static function alterarCliente($cliente){

            $sql = "UPDATE clientes SET " 
             . "nome = '".$cliente->getNome()."',"
             . "telefone = '".$cliente->getTelefone()."',"
             . "foto = '".$cliente->getFoto()."',"
             . "estado = '".$cliente->getEstado()."',"
             . "endereco = '".$cliente->getEndereco()."',"
             . "email = '".$cliente->getEmail()."',"
             . "cidade = '".$cliente->getCidade()."'"
             . "WHERE id = '".$cliente->getId()."'";
             Conexao::executar($sql);

    }







}