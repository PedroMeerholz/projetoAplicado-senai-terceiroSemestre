<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório</title>
    <link rel="stylesheet" href="./app/views/css/reset.css">
    <link rel="stylesheet" href="./app/views/css/relatorio.css">
</head>
<body>
    <div id="pagina">
        <div id="impressao">
            <input class="botao-operacao" id="botao-impressao" type="button" value="Imprimir Relatório" onclick="printpage()"/>
        </div>
        <div id="informacoes-do-relatorio">
            <h1>Relatório de Chamados</h1>
            <p><b>Data e Hora Inicial:</b> <?php echo $dataHoraInicial;?></p>
            <p><b>Data e Hora Final:</b> <?php echo $dataHoraFinal;?></p>
        </div>
        <hr>
        <div id="informacoes-dos-chamados">
            <h1>Informações dos chamados<br>dentro do período especificado</h1>
            <p><b>Número Total de Chamados:</b> <?php echo $totalDeChamados?></p>
            <p><b>Distância Total Percorrida:</b> <?php echo $distanciaTotalPercorrida ?></p>
            <p><b>Média de Distância por Chamado:</b> <?php echo $mediaDistanciaPercorrida ?></p>
            <p><b>Total de CO2 emitido:</b> <?php echo $carbonoTotalEmitido ?></p>
            <p><b>Média de CO2 emitido por Chamado:</b> <?php echo $mediaCarbonoEmitido ?></p>
        </div>
        <hr>
        <p class="dados-geracao"><b>Relatório Gerado em:</b> <?php echo $dataRelatorio;?></p>
        <p class="dados-geracao"><b>Relatório Gerado por:</b> <?php echo $usuario;?></p>
    </div>
    <script>
    function printpage() {
        let printButton = document.getElementById("botao-impressao");
        let navbar = document.getElementById("barra-navegacao");
        navbar.style.visibility = 'hidden';
        printButton.style.display = 'none';
        window.print()
        navbar.style.visibility = 'visible';
        printButton.style.display = 'inline';
    }
    </script>
</body>
</html>