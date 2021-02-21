
<?php

    require_once('conexao_bd.php');

    session_start();

    $objDb = new db;
    $link = $objDb->conecta_mysql();

    $nome_adm = $_SESSION['nome_adm'];
    $email_adm = $_SESSION['email_adm'];

    $sql = "SELECT nome_funcionario, id_funcionario FROM tb_funcionarios";

    $registros = array();

    if($resultado_query = mysqli_query($link, $sql)){

        while($linha = mysqli_fetch_array($resultado_query, MYSQLI_ASSOC)){

            $registros[] = $linha;

        }
        
    } else {
    
        die(mysqli_error($link));
    
    }

    $qnt_registros = count($registros);

    $sql = "SELECT * FROM tb_historico_pagamentos";

    $registros_pagamentos = array();
    $id_funcionario = array();

    if($resultado_query = mysqli_query($link, $sql)){

        while($linha = mysqli_fetch_array($resultado_query, MYSQLI_ASSOC)){

            $registros_pagamentos[] = $linha;

        }

    } else {
        die(mysqli_error($link));
    }

    $qnt_registros_pagamentos = count($registros_pagamentos);
/*
    for($i=0; $i < $qnt_registros; $i++){

        $nome_funcionario = $registro[$i]['nome_funcionario']

        $sql = "SELECT nome_funcionarios, id_funcionario FROM tb_funcionarios WHERE nome_funcionario = $nome_funcionario"

    }
*/
    

?>

<!doctype html>
<html>

    <head lang="pt-br">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <!--Bootstrap-->

        <!--Link CDN - Bootstrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <title>Controle de Pagamento</title>
    </head>

    <body>
        <article class="container">
            <div class="page-header">
                <h2 style="text-align: center; padding: 20px">Controle de Pagamento</h2>
            </div>

            <div class="row" >
                <div class="col-md-1"></div>
                <section class="col-md-5">
                    <h3>Registro de Funcionários</h3>
                    <form method="post" action="registro_funcionario.php" >

                        <label for="nome_funcionario" >Nome completo:</label>
                        <input type="text" id="nome_funcionario" name="nome_funcionario" required />
                        
                        <br />
                        <label for="email_funcionario" >E-mail:</label>
                        <input type="email" id="email_funcionario" name="email_funcionario" required />

                        <br />
                        <label>Salário</label>
                        <input type="number" id="salario_funcionario" name="salario_funcionario" required />

                        <br />
                        <button type="submit" >Registrar</button>

                    </form>

                    <h3>Alterar Salario</h3>
                    <form method="post" action="alterar_pagamento.php" >

                        <label>Selecione o funcionário</label>
                        <select name="nome_funcionario">

                        <?php
                            for($i=0; $i < $qnt_registros; $i++){
                        ?>

                            <option> <?= $registros[$i]['nome_funcionario'] ?></option>

                        <?php } ?>
                        
                        </select>

                        <br />
                        <label for="novo_salario" >Novo Salário:</label>
                        <input type="number" id="novo_salario" name="novo_salario" />
                        
                        <br />
                        <button type="submit" >Alterar</button>

                    </form>
                </section>

                <section class="col-md-5">
                    <h3>Pagar Funcionário</h3>
                    <form method="post" action="pagamento_funcionarios.php">
                        
                        <label>Selecione o funcionário</label>
                        <select name="nome_funcionario">

                        <?php
                            for($i=0; $i < $qnt_registros; $i++){
                        ?>

                            <option><?= $registros[$i]['nome_funcionario'] ?></option>

                        <?php } ?>
                        
                        </select>

                        <br />
                        <label for="gratificacao">Gratificação eventual</label>
                        <input type="number" id="gratificacao" name="gratificacao" />

                        <br />
                        <label for="valor_hora_extra" >Valor por hora extra:</label>
                        <input type="number" id="valor_hora_extra" name="valor_hora_extra" />

                        <br />
                        <label for="hora_extra" >Hora Extra </label>
                        <input type="time" id="hora_extra" name="hora_extra" />
                        
                        <br />
                        <label>Hora de entrada</label>
                        <input type ="time" id="hora_entrada" name="hora_entrada" />

                        <br />
                        <label>Hora de saída</label>
                        <input type="time" id="hora_saida" name="hora_saida"  />
                        
                        <br />
                        <textarea name="breve_descricao" >Breve Descrição</textarea>

                        <br />
                        <button type="submit" >Pagar</button>

                    </form>
                </section>
                <div class="col-md-1"></div>
            </div>
        </article>

        <article class="container">
            <section>

                <h3 class="page-header">Histórico de Pagamentos</h3>

                <table class="table table-striped table-bordered table-hover table-sm">

                    <thead>
                        <tr>
                            <th>Número do pagamento</th>
                            <th>Nome do funcionário</th>
                            <th>Salário do funcionário</th>
                            <th>Hora Extra</th>
                            <th>Valor da Hora Extra</th>
                            <th>Gratificação</th>
                            <th>Pagamento Recebido</th>
                            <th>Dia do pagamento</th>
                            <th>Descrição do Pagamento</th>
                            <th>Hora de Entrada</th>
                            <th>Hora de Saída</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php

                    for($i=0; $i < $qnt_registros_pagamentos; $i++){

                    ?>

                        <tr>
                            <td><?= $registros_pagamentos[$i]['id_historico_pagamento'] ?></td>
                            <td>
                                <?php

                                    for($j=0; $j<$qnt_registros; $j++){
                                        if($registros_pagamentos[$i]['fk_id_funcionario'] == $registros[$j]['id_funcionario'] ){
                                            echo $registros[$j]['nome_funcionario'];
                                        }
                                    }
                                
                                ?>
                            </td>
                            <td><?= $registros_pagamentos[$i]['salario_funcionario'] ?></td>
                            <td><?= $registros_pagamentos[$i]['hora_extra'] ?></td>
                            <td><?= $registros_pagamentos[$i]['valor_hora_extra'] ?></td>
                            <td><?= $registros_pagamentos[$i]['gratificacao'] ?></td>
                            <td><?= $registros_pagamentos[$i]['pagamento_recebido'] ?></td>
                            <td><?= $registros_pagamentos[$i]['dia_trabalho'] ?></td>
                            <td><?= $registros_pagamentos[$i]['descricao_pagamentos'] ?></td>
                            <td><?= $registros_pagamentos[$i]['hora_entrada'] ?></td>
                            <td><?= $registros_pagamentos[$i]['hora_saida'] ?></td>

                        </tr>

                    <?php } ?>

                    </tbody>

                </table>

            </section>
        </article>
        

    </body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</html>