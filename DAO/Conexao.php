<?php

class Conexao{


    private static function abrir(){

        //nome tem que ser igual a database criada no phpmyadmin
        $nomeDaBaseDeDados = "tarefas";
        //usuario  que foi configurado na criacao do banco (padrao USBWebserver  root)
        $usuario = "root";
        //usuario  que foi configurado na criacao do banco (padrao USBWebserver  root)
        $senha = "root";
        //endereço do banco, em aula utilizamos localhost para execucao local
        $endereco = "localhost";

        $conexao = mysqli_connect($endereco, $usuario, $senha, $nomeDaBaseDeDados);

        if($conexao){
            return $conexao;
        }else{
            return null;
        }
    }

    private static function fechar($conexao){
            mysqli_close($conexao);
    }

    public static function executar($sql){

        $conexao = self::abrir();
        if($conexao){
            mysqli_query($conexao,$sql);
            self::fechar($conexao);
        }
        
    }

    public static function consultar($sql){
        $conexao = self::abrir();

        if($conexao){
            $result = mysqli_query($conexao,$sql);
            self::fechar($conexao);
            return  $result;
        }else{
            return null;
        }


    }
    

}