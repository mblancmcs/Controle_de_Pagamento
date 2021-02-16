<?php

    require_once('conexao_bd.php');

    session_start();

    $objDb = new db;
    $link = $objDb->conecta_mysql();

    $nome_funcionario = $_POST['nome_funcionario'];
    $email_funcionario = $_POST['email_funcionario'];
    $salario_funcionario = $_POST['salario_funcionario'];

    $sql = "SELECT * FROM tb_funcionarios WHERE nome_funcionario = '$nome_funcionario'AND email_funcionario = '$email_funcionario' ";

    if($resultado_query = mysqli_query($link, $sql)){
        
        $dados_funcionario = mysqli_fetch_array($resultado_query);

        if(!isset($dados_funcionario['nome_funcionario']) && !isset($dados_funcionario['email_funcionario']) ){

            $sql = "INSERT INTO tb_funcionarios(nome_funcionario, email_funcionario, salario_funcionario) VALUES('$nome_funcionario', '$email_funcionario', $salario_funcionario) ";

            mysqli_query($link, $sql) or die(mysqli_error($link));

            header('Location: home.php');

        } else {

            echo 'Usuário já existe';

        }

    } else {
        die(mysqli_error($link));
    }

?>