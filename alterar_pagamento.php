<?php

    require_once('conexao_bd.php');

    session_start();

    $objDb = new db;
    $link = $objDb->conecta_mysql();

    $nome_funcionario = $_POST['nome_funcionario'];
    $aumento_salario = $_POST['aumento_salario'];
    $hora_extra = $_POST['hora_extra'];
    $novo_salario = $_POST['novo_salario'];

    $sql = "SELECT salario_funcionario FROM tb_funcionarios WHERE nome_funcionario = '$nome_funcionario' ";

    if($resultado_query = mysqli_query($link, $sql)){

        $registros = mysqli_fetch_array($resultado_query);

        if(isset($_POST['aumento_salario'])){

            $salario_novo = $registros['salario_funcionario'] + $aumento_salario;

            $sql = "UPDATE tb_funcionarios SET salario_funcionario = $salario_novo WHERE nome_funcionario = '$nome_funcionario' ";

            mysqli_query($link, $sql) or die(mysqli_error($link));

        }

        if(isset($_POST['hora_extra'])){
            
        }

        

        header('Location: home.php');

    } else {
        die(mysqli_error($link));
    }

    $sql = ""

?>