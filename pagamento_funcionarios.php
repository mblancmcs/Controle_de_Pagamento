<?php

    require_once('conexao_bd.php');

    session_start();

    $objDb = new db;
    $link = $objDb->conecta_mysql();

    $nome_funcionario = $_POST['nome_funcionario'];
    $gratificacao = $_POST['gratificacao'];
    $hora_extra = $_POST['hora_extra'];
    $valor_hora_extra = $_POST['valor_hora_extra'];
    $hora_entrada = $_POST['hora_entrada'];
    $hora_saida = $_POST['hora_saida'];
    $breve_descricao = $_POST['breve_descricao'];

    $sql = "SELECT salario_funcionario, id_funcionario FROM tb_funcionarios WHERE nome_funcionario = '$nome_funcionario' ";

    if($resultado_query = mysqli_query($link, $sql)){

        $registros = mysqli_fetch_array($resultado_query);

        $salario_funcionario = $registros['salario_funcionario'];
        $id_funcionario = $registros['id_funcionario'];

        if(!empty($valor_hora_extra) && !empty($hora_extra) ){

            $hora_extra = explode(':', $hora_extra);
            $hora_extra_minutos = ($hora_extra[0] * 60) + $hora_extra[1];

            $valor_minutos_extras = $valor_hora_extra / 60;

            $valor_hora_extra = $hora_extra_minutos * $valor_minutos_extras;

        }

        $salario_atual = $salario_funcionario + $valor_hora_extra + $gratificacao;

        //INCLUIR A GRATIFICAÇÃO E BREVE DESCRIÇÃO

        $sql = "INSERT INTO tb_historico_pagamentos(fk_id_funcionario, salario_funcionario, pagamento_recebido, gratificacao, descricao_pagamento, hora_entrada, hora_saida) VALUES($id_funcionario, $salario_funcionario, $salario_atual, $gratificacao, '$breve_descricao', '$hora_entrada', '$hora_saida') ";

        mysqli_query($link, $sql) or die(mysqli_error($link));

        header('Location: home.php');

    } else {
        die(mysqli_error($link));
    }

?>