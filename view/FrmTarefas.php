
<?php
    include_once '../DAO/ClienteDao.php';
    include_once '../DAO/TarefaDao.php';
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Tarefas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

    <?php $action = 'inserir';?>

    <div class="container mt-3">
    <h1>Cadastro de Tarefas</h1>
    
    <div class="container">
    <form action="../controller/TarefasController.php?<?php echo $action?>" method="POST">
        
        <div class="form-group">
        <label for="nome" class="form-label">Descricao:</label>
        <input type="text" id="descricao" name="descricao"  class="form-control"  required><br><br>
        </div>

        <div class="form-group">
        <label for="tipo">Tipo:</label>       
        <select class="form-select" name="tipo" id="tipo">
        <option value="Nova Implementacao">Nova Implementação</option>
        <option value="Falha">Falha</option>
        <option value="Melhoria">Melhoria</option>
        </select><br><br>
        </div>

        <div class="form-group">
        <label for="cliente">Cliente:</label>       
        <select class="form-select"  name="cliente" id="Cliente">
         <option value="0"  >Selecione...</option>
         <?php
            $lista = ClienteDao::consultarClientes();
            foreach($lista as $cli){
                echo '<option value="'.$cli->getId().'">'.
                $cli->getNome().'</option>';
            }

         ?>
        </select><br><br>
        </div>

        <div class="form-group">
        <label for="tipo">Valor:</label> 
        <input type="text" id="valor" name="valor"   class="form-control"  required><br><br>
        </div>

        <div class="form-group">
        <label for="tipo">Horas Trabalhadas:</label>
        <input type="text" id="horasTrabalhadas" name="horasTrabalhadas"   class="form-control"  required><br><br>
        </div>

        <div class="form-group">
        <label for="status">Status:</label>       
        <select  class="form-select"  name="status" id="status">
        <option value="Em desenvolvimento">Em Desenvolvimento</option>
        <option value="Criado" selected>Criado</option>
        <option value="Concluido">Concluído</option>
        </select><br><br>
        </div>

        <div class="form-group">
        <label for="prioridade">Status:</label>       
        <select  class="form-select"  name="prioridade" id="prioridade">
        <option value="critico">Critico</option>
        <option value="alto">Alto</option>
        <option value="medio" selected>Médio</option>
        <option value="baixo">Baixo</option>
        </select><br><br>
        </div>
     
        <input type="submit" value="Cadastrar"  class="btn btn-primary">
    </form>
</div>
</div>
    <?php 
        $listaTarefas = TarefaDao::consultarTarefas();
    ?>

<div class="container">
<table class="table table-striped">
            <tr>
                <th>id</th>
                <th>Descrição</th>
                <th>Tipo</th>
                <th>Cliente</th>
                <th>Valor</th>
                <th>Horas Trabalhadas</th>
                <th>Status</th>
                <th>Prioridade</th>
                <th>Alterar</th>
                <th>Excluir</th>
            </tr>
            <?php
            foreach($listaTarefas as $tarefa){
                echo '<tr>
                        <td>'.$tarefa->getId().'</td>
                        <td>'.$tarefa->getDescricao().'</td>
                        <td>'.$tarefa->getTipo().'</td>
                        <td>'.$tarefa->getCliente().'</td>
                        <td>'.$tarefa->getValor().'</td>
                        <td>'.$tarefa->getHorasTrabalhadas().'</td>
                        <td>'.$tarefa->getStatus().'</td>
                        <td>'.$tarefa->getPrioridade().'</td>
                        <td> <a href="../controller/TarefasController.php?"> Alterar </a> </td>
                        <td> <a href="../controller/TarefasController.php?"> Excluir </a> </td>
                        <tr>';

            }
            ?>
        </table>
    
</body>
</html>
