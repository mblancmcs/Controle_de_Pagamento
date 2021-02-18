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
                <h2>Alterar Pagamento</h2>
                <form method="post" action="alterar_pagamento.php" >

                    <label>Nome completo do funcionário:</label>
                    <input type="text" id="nome_funcionario" name="nome_funcionario" required />

                    <br />
                    <label for="novo_salario" >Novo Salário:</label>
                    <input type="number" id="novo_salario" name="novo_salario" />
                    
                    <br />
                    <button type="submit" >Alterar</button>

                </form>
            </section>

            <section>
                <h2>Pagar Funcionário</h2>
                <form method="post" action="pagamento_funcionarios.php">
                    
                    <label>Nome completo do funcionário:</label>
                    <input type="text" id="nome_funcionario2" name="nome_funcionario" required />

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
        </article>

        <article>
            <section>

                <h2>Pagamentos</h2>

            </section>
        </article>
        

    </body>

</html>