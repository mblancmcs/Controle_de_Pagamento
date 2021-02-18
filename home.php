<!doctype html>
<html>

    <head lang="pt-br">
        <meta charset="utf-8" />
        <title>Controle de Pagamento</title>
    </head>

    <body>
        <article>
            <section>
                <h2>Registro de Funcionários</h2>
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
            </section>

            <section>
                <h2>Data de entrada e saída</h2>
                <form method="post" action="entrada_saida.php">
                    
                    <label>Nome completo do funcionário:</label>
                    <input type="text" id="nome_funcionario2" name="nome_funcionario" required />
                    
                    <br />
                    <label>Data e hora de entrada</label>
                    <input type ="text" id="data_entrada" name="data_entrada" required placeholder="DD/MM/YYYY HH:mm:ss" />

                    <br />
                    <label>Data e hora de saída</label>
                    <input type="text" id="data_saida" name="data_saida" required placeholder="DD/MM/YYYY HH:mm:ss" />

                    <br />
                    <button type="submit" >Definir</button>

                </form>
            </section>

            <section>
                <h2>Alterar Pagamento</h2>
                <form method="post" action="alterar_pagamento.php" >

                    <label>Nome completo do funcionário:</label>
                    <input type="text" id="nome_funcionario" name="nome_funcionario" required />

                    <br />
                    <label for="novo_salario" >Novo Salário:</label>
                    <input type="number" id="novo_salario" name="novo_salario" />

                    <br />
                    <label for="aumento_salario">Aumento de Salário</label>
                    <input type="number" id="aumento_salario" name="aumento_salario" />

                    <br />
                    <label for="hora_extra" >Hora Extra</label>
                    <input type="number" id="hora_extra" name="hora_extra" />
                    
                    <br />
                    <button type="submit" >Alterar</button>

                </form>
            </section>
        </article>

        <article>
            <section>

                <h2>Pagamentos</h2>

            </section>
        </article>
        

    </body>

</html>