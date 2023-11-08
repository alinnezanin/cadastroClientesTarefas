
<?php 
    include_once '../DAO/ClienteDao.php';
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Clientes</title>
</head>
<body>

    <?php 
        if(isset($_REQUEST['alterar'])){
            $action = 'alterar'; 
            $cliente =  ClienteDao::consultarClientePorId($_GET['id']);
            $nome = $cliente->getNome();
            $telefone = $cliente->getTelefone();
            $email = $cliente->getEmail();
            $endereco = $cliente->getEndereco();
            $estado = $cliente->getEstado();
            $cidade =  $cliente->getCidade();
            $foto =  $cliente->getFoto();
            $id = $_GET['id'];
        }else{
             $action = 'inserir';
             $nome = null; 
             $telefone = null;
             $email = null;
             $endereco =null;
             $estado = null;
             $cidade =null;
             $foto =null;
             $id = null;
        }

        if(isset($_REQUEST['ordenar'])){
            $listaClientes = ClienteDao::consultarClientesOrderBy($_GET['ordenar']);
        }else if(isset($_REQUEST['filtro'])){
            $listaClientes = ClienteDao::consultarClientesFilterByKey($_GET['campo'], $_GET['valor']);
        }else{
            $listaClientes = ClienteDao::consultarClientes();
        }

    ?>  


    <h1>Cadastro de Clientes</h1>
    <form action="../controller/ClienteController.php?<?php echo $action?>&id=<?php echo $id?>" method="POST"
        enctype="multipart/form-data">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>"required><br><br>

        <label for="telefone">Telefone:</label>
        <input type="tel" id="telefone" name="telefone" value="<?php echo $telefone; ?>"><br><br>

        <label for="endereco">Endereço:</label>
        <input id="endereco" name="endereco" value="<?php echo $endereco; ?>"><br><br>

        <label for="cidade">Cidade:</label>
        <input type="text" id="cidade" name="cidade" value="<?php echo $cidade; ?>"><br><br>

        <label for="estado">Estado:</label>
        <input type="text" id="estado" name="estado"  value="<?php echo $estado; ?>"><br><br>

        <label for="foto">Foto:</label>
        <input type="file" name="foto"  value="<?php echo $estado; ?>" /> <br><br>

        <input type="submit" value="Cadastrar">
    </form>


    <form action="?busca&" method=GET>
         <fieldset>
            <legend>Busca de Dados</legend>
            <label>Selecione o campo que deseja buscar:</label>
            <select name="campo">
               <option value="id">Id</option>
               <option value="nome">Nome</option>
               <option value="mail">Email</option>
               <option value="cidade">Cidade</option>
               <option value="estado">Estado</option>
            </select>
            <label>Selecione o valor a ser buscado:</label>
             <input type="text" name="valor" id="valor"/> 
             <input type="hidden" name="filtro" value ="true"/> 
             <input type="submit" value="Buscar"/>
             <input type="submit" value="Limpar Busca"/>
         </fieldset>
      </form>


    <table class="table table-striped">
        
            <tr>
                <th><a href="?ordenar=id">id</a></th>
                <th><a href="?ordenar=nome">Nome</a></th>
                <th><a href="?ordenar=email">E-mail</a></th>
                <th><a href="?ordenar=telefone">Telefone</a></th>
                <th><a href="?ordenar=endereco">Endereço</a></th>
                <th><a href="?ordenar=cidade">Cidade</a></th>
                <th><a href="?ordenar=estado">Estado</a></th>
                <th>Foto</th>
                <th>Alterar</th>
                <th>Excluir</th>
            </tr>
            <?php
            foreach($listaClientes as $cliente){
                echo '<tr>
                        <td>'.$cliente->getId().'</td>
                        <td>'.$cliente->getNome().'</td>
                        <td>'.$cliente->getEmail().'</td>
                        <td>'.$cliente->getTelefone().'</td>
                        <td>'.$cliente->getEndereco().'</td>
                        <td>'.$cliente->getCidade().'</td>
                        <td>'.$cliente->getEstado().'</td>
                        <td><img src="../fotos_clientes/'.$cliente->getFoto().'" width="50px" /></td>
                        <td> <a href="?alterar&id='.$cliente->getId().'"><button> Alterar</button>  </a> </td>
                        <td> <a href="../controller/ClienteController.php?excluir&id='.$cliente->getId().'"><button> Excluir </button> </a> </td>
                        <tr>';
            }
            ?>
        </table>
    
</body>
</html>
