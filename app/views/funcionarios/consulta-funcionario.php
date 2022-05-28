<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMEC | Consulta de Funcionários</title>
    <link rel="stylesheet" href="./app/views/css/reset.css">
    <link rel="stylesheet" href="./app/views/css/generico.css">
    <link rel="stylesheet" href="./app/views/css/consulta-generico.css">
</head>
<body>
    <h1>Consulta de Funcionários</h1>
    <div class="box-principal">
        <div class="box-secundario">
            <input type="submit" value="Realizar Consulta" class="botao-operacao">
            <table class="tabela-consulta">
                <thead class="cabecalho-tabela-consulta">
                    <tr class="linha-cabecalho-tabela-consulta">
                        <td>Nome Completo</td>
                        <td>CPF</td>
                        <td>Nascimento</td>
                        <td>Cargo</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody class="conteudo-tabela-consulta">
                    <tr>
                        <td>Pedro Vinícius Meerholz</td>
                        <td>12345678910</td>
                        <td>2003</td>
                        <td>Motorista</td>
                        <td>Disponível</td>
                    </tr>
                    <tr>
                        <td>João Silva</td>
                        <td>12345678910</td>
                        <td>2002</td>
                        <td>Motorista</td>
                        <td>Disponível</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>