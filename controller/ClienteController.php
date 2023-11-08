<?php

include_once '../model/ClienteModel.php';
include_once '../DAO/ClienteDao.php';

//isset verifica se uma informação existe, está setada
//$_REQUEST busca na URL se existe o valor que está entre['']
if(isset($_REQUEST['inserir'])){
    //Cliente faz referencia a ClienteModel.php
    $cliente = new Cliente();
    //$_POST vai buscar no FrmCliente o campo com id que está entre[''] 
    //para o POST funcionar no FrmCliente o method tem que ser POST
    $cliente->setNome($_POST['nome']);
    $cliente->setEmail($_POST['email']);
    $cliente->setTelefone($_POST['telefone']);
    $cliente->setEndereco($_POST['endereco']);
    $cliente->setCidade($_POST['cidade']);
    $cliente->setEstado($_POST['estado']);
    $cliente->setFoto(salvarFoto());

    ClienteDao::inserirCliente($cliente);
    header("Location: ../view/FrmClientes.php");

 
}
if(isset($_REQUEST['excluir'])){
    ClienteDao::excluirCliente($_GET['id']);
    header("Location: ../view/FrmClientes.php");

}

if(isset($_REQUEST['alterar'])){

    $cliente = new Cliente();
    $cliente->setNome($_POST['nome']);
    $cliente->setEmail($_POST['email']);
    $cliente->setTelefone($_POST['telefone']);
    $cliente->setEndereco($_POST['endereco']);
    $cliente->setCidade($_POST['cidade']);
    $cliente->setEstado($_POST['estado']);
    $cliente->setFoto(salvarFoto());
    $cliente->setId($_REQUEST['id']);

    ClienteDao::alterarCliente($cliente);
    header("Location: ../view/FrmClientes.php");

}


function salvarFoto(){
    $nome_arquivo = "";
    if(isset($_FILES['foto']['name']) && 
            $_FILES['foto']['name'] != "" ){
        $nome_arquivo = date('YmdHis').
              basename($_FILES['foto']['name']);
        $diretorio = "../fotos_clientes/";
        $caminho = $diretorio.$nome_arquivo;
        if( !move_uploaded_file( $_FILES['foto']['tmp_name'] ,
                $caminho ) ){
            $nome_arquivo = "sem_foto.png";
        }
        
    } else {
        $nome_arquivo = "sem_foto.png";
    }

   /* echo "Filename: " . $_FILES['foto']['name']."<br>";
    echo "Type : " . $_FILES['foto']['type'] ."<br>";
    echo "Size : " . $_FILES['foto']['size'] ."<br>";
    echo "Temp name: " . $_FILES['foto']['tmp_name'] ."<br>";
    echo "Error : " . $_FILES['foto']['error'] . "<br>";
    
    Sainda esperada do código acima
    Filename: foca.png
    Type : image/png
    Size : 202502
    Temp name: C:\Users\aline.zanin.ANIMAEDU\AppData\Local\Temp\php5DAE.tmp
    Error : 0
    */

    return $nome_arquivo;
}

