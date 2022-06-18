<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>SMEC - Gerar Relatório</title>
    <link rel="stylesheet" href="./app/views/css/reset.css">
    <link rel="stylesheet" href="./app/views/css/generico.css">
    <link rel="stylesheet" href="./app/views/css/relatorios.css">
</head>
<body>
    <h1>Gerar Relatório de Chamados</h1>
    <form action="?router=GeraRelatorio/montaRelatorio/" method="post" class="gera-relatorio">
        <label for="entradaDataInicial">Data e Hora de Início:</label>
        <input type="datetime-local" name="entradaDataInicial" autofocus required>
        <br>
        <label for="entradaDataFinal">Data e Hora Final:</label>
        <input type="datetime-local" name="entradaDataFinal" required>
        <div class="botoes">
            <input type="submit" value="Confirmar" class="botao-operacao" name="enviaInformacoes">
            <input type="reset" value="Limpar Campos" class="botao-operacao" name="limpaCampos">
        </div>
    </form>
</body>
</html>