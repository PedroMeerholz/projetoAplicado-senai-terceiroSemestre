<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>SMEC - Gerar Relatório</title>
    <link rel="icon" type="image/x-icon" href="/src/img/logo.png">
    <link rel="stylesheet" href="./app/views/css/reset.css">
    <link rel="stylesheet" href="./app/views/css/generico.css">
    <link rel="stylesheet" href="./app/views/css/relatorios.css">
</head>
<body>
    <h1>Gerar Relatório de Chamados</h1>
    <form class="gera-relatorio">
        <label for="entradaDataInicial">Data de Início:</label>
        <input type="date" name="entradaDataInicial" autofocus required>
        <br>
        <label for="entradaHoraInicial">Horário de Início:</label>
        <input type="time" name="entradaHoraInicial" required>
        <br>
        <label for="entradaDataFinal">Data Final:</label>
        <input type="date" name="entradaDataFinal" required>
        <br>
        <label for="entradaHoraFinal">Hora Final:</label>
        <input type="time" name="entradaHoraFinal" required>
        <div class="botoes">
            <input type="submit" value="Confirmar" class="botao-operacao" name="enviaInformacoes">
            <input type="reset" value="Limpar Campos" class="botao-operacao" name="limpaCampos">
        </div>
    </form>
</body>
</html>