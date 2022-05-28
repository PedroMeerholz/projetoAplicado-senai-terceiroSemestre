<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMEC | Consulta de Chamados</title>
    <link rel="stylesheet" href="./app/views/css/reset.css">
    <link rel="stylesheet" href="./app/views/css/generico.css">
    <link rel="stylesheet" href="./app/views/css/consulta-generico.css">
</head>
<body>
    <h1>Consulta de Chamados</h1>
    <div class="box-principal">
        <div class="box-secundario">
            <input type="submit" value="Realizar Consulta" class="botao-operacao">
            <table class="tabela-consulta">
                <thead class="cabecalho-tabela-consulta">
                    <tr class="linha-cabecalho-tabela-consulta">
                        <td>ID</td>
                        <td>Data</td>
                        <td>Funcionário</td>
                        <td>Veículo</td>
                        <td>Distancia(Km)</td>
                        <td>Carbono(kg)</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody class="conteudo-tabela-consulta">
                    <tr>
                        <td>1</td>
                        <td>2022-03-30</td>
                        <td>João Silva</td>
                        <td>BRA29A12</td>
                        <td>52</td>
                        <td>5.8</td>
                        <td>Disponível</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>2022-03-31</td>
                        <td>João Silva</td>
                        <td>BRA29A12</td>
                        <td>25</td>
                        <td>3.47</td>
                        <td>Disponível</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>