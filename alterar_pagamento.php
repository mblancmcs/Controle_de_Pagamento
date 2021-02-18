<?php

    require_once('conexao_bd.php');

    session_start();

    $objDb = new db;
    $link = $objDb->conecta_mysql();

    $nome_funcionario = $_POST['nome_funcionario'];
    $novo_salario = $_POST['novo_salario'];

    if(!empty($novo_salario) ){

        $sql = "UPDATE tb_funcionarios SET salario_funcionario = $novo_salario WHERE nome_funcionario = '$nome_funcionario' ";

        mysqli_query($link, $sql) or die(mysqli_error($link));

    }

    header('Location: home.php');

?>