<?php

    class db{

        private $host = 'localhost';
        private $usuario = 'root';
        private $senha = '';
        private $data_base = 'db_controle_pagamento';

        public function conecta_mysql(){

            $conexao = mysqli_connect($this->host, $this->usuario, $this->senha, $this->data_base);
    
            mysqli_set_charset($conexao, 'utf-8');
    
            if(mysqli_connect_errno()){
                echo 'Erro com a conexão ao banco de dados' . mysqli_conect_error();
            }
    
            return $conexao;
    
        }

    }

?>