<?php

    require_once('conexao_bd.php');

    session_start();

    $objDb = new db;
    $link = $objDb->conecta_mysql();
    
    $nome_adm = $_POST['nome_adm'];
    $senha_adm = $_POST['senha_adm'];

    $sql = "SELECT * FROM tb_adm WHERE nome_adm = '$nome_adm' AND senha_adm = '$senha_adm'";

    if($resultado_query = mysqli_query($link, $sql)){

        $dados_adm = mysqli_fetch_array($resultado_query);

        if(isset($dados_adm['nome_adm']) && isset($dados_adm['senha_adm'])){

            $_SESSION['nome_adm'] = $dados_adm['nome_adm'];
            $_SESSION['senha_adm'] = $dados_adm['senha_adm'];
            $_SESSION['email_adm'] = $dados_adm['email_adm'];

            header('Location: home.php');

        } else {
            header('Location: index.php?erro=usuario_invalido');
        }

    } else {
        die(mysqli_error($link));
    }

?>