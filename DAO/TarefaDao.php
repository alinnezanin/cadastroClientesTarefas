<?php

include_once 'Conexao.php';
include_once '../model/TarefaModel.php';


class TarefaDao{


    public static function inserirTarefa($tarefa){

        $sql = "INSERT INTO tarefas "
        . "(descricao, tipo, cliente, valor, horasTrabalhadas, status, prioridade) VALUES"
        . " ('".$tarefa->getDescricao()."',"
        . "  '".$tarefa->getTipo()."' , "
        . "  '".$tarefa->getCliente()."' , "
        . "  '".$tarefa->getValor()."' , "
        . "  '".$tarefa->getHorasTrabalhadas()."' , "
        . "  '".$tarefa->getStatus()."',"
        . "  '".$tarefa->getPrioridade()."'"
        . "  ); ";

        echo $sql;
        Conexao::executar($sql);
    }

    public static function consultarTarefas(){
        $sql = "SELECT tarefas.descricao, tarefas.tipo, tarefas.valor, tarefas.horasTrabalhadas," 
        . "tarefas.status, tarefas.prioridade,tarefas.id, clientes.nome as cliente "
        . "FROM tarefas, clientes WHERE tarefas.cliente=clientes.id";      
        $result = Conexao::consultar($sql);
        $lista = new ArrayObject();
        if($result != null){
            while(list($_descricao, $_tipo,  $_valor,$_horastrabalhadas,
             $_status, $_prioridade, $_id,  $_cliente) = mysqli_fetch_row($result)){
                $tarefa = new Tarefa();
                $tarefa->setDescricao($_descricao);
                $tarefa->setTipo($_tipo);
                $tarefa->setValor($_valor);
                $tarefa->setHorastrabalhadas($_horastrabalhadas);
                $tarefa->setStatus($_status);
                $tarefa->setPrioridade($_prioridade);
                $tarefa->setId($_id);
                $tarefa->setCliente($_cliente);
                $lista->append($tarefa);
            }
        }
        return $lista;
    }

}