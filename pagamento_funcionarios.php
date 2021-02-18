<?php

    require_once('conexao_bd.php');

    session_start();

    $objDb = new db;
    $link = $objDb->conecta_mysql();

    $nome_funcionario = $_POST['nome_funcionario'];
    $aumento_salario = $_POST['aumento_salario'];
    $hora_extra = $_POST['hora_extra'];
    $valor_hora_extra = $_POST['valor_hora_extra'];

    $sql = "SELECT salario_funcionario FROM tb_funcionarios WHERE nome_funcionario = '$nome_funcionario' ";

    if($resultado_query = mysqli_query($link, $sql)){

        $registros = mysqli_fetch_array($resultado_query);

        $salario_funcionario = $registros['salario_funcionario'];

        if(!empty($valor_hora_extra) && !empty($hora_extra) ){

            $hora_extra = explode(':', $hora_extra);
            $hora_extra_minutos = ($hora_extra[0] * 60) + $hora_extra[1];

            $valor_minutos_extras = $valor_hora_extra / 60;

            $valor_hora_extra = $hora_extra_minutos * $valor_minutos_extras;

        }

        header('Location: home.php');

    } else {
        die(mysqli_error($link));
    }

?>