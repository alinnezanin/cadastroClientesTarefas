<?php

include_once '../model/TarefaModel.php';
include_once '../DAO/TarefaDao.php';


if(isset($_REQUEST['inserir'])){
    $tarefa = new Tarefa();
        $tarefa->setDescricao($_POST['descricao']);
        $tarefa->setTipo($_POST['tipo']);
        $tarefa->setCliente($_POST['cliente']);
        $tarefa->setValor($_POST['valor']);
        $tarefa->setHorasTrabalhadas($_POST['horasTrabalhadas']);
        $tarefa->setStatus($_POST['status']);
        $tarefa->setPrioridade($_POST['prioridade']);

        TarefaDao::inserirTarefa($tarefa);
        header("Location: ../view/FrmClientes.php");

 
}
