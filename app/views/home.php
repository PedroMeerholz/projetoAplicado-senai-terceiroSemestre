<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMEC - Página Home</title>
    <link rel="icon" type="image/x-icon" href="../img/logo.png">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/generico.css">
    <link rel="stylesheet" href="/css/home.css">
</head>
<body>
    <div class="informacoes-gerais">
        <h1>Informações Gerais</h1>
        <div class="informacoes-especificas informacoes-especificas-esquerda">
            <h2>Funcionários</h2>
            <br>
            <p>N° de Funcionários: <?php echo $total_funcionarios?></p>
            <p>Funcionários Disponíveis: <?php echo $funcionarios_disponiveis?></p>
            <p>Funcionários Indisponíveis: <?php echo $funcionarios_indisponiveis?></p>
        </div>
        <div class="informacoes-especificas informacoes-especificas-direita">
            <h2>Veículos</h2>
            <br>
            <p>N° de Veículos: <?php echo $total_veiculos?></p>
            <p>Veículos Disponíveis: <?php echo $veiculos_disponiveis?></p>
            <p>Veículos Indisponíveis: <?php echo $veiculos_indisponiveis?></p>
        </div>
        <div class="informacoes-especificas informacoes-especificas-esquerda">
            <h2>Chamados</h2>
            <br>
            <p>N° de Chamados: <?php echo $total_chamados?></p>
            <p>Chamados Abertos: <?php echo $chamados_abertos?></p>
            <p>Chamados Fechados: <?php echo $chamados_finalizados?></p>
        </div>
        <div class="informacoes-especificas informacoes-especificas-direita">
            <h2>Carbono</h2>
            <br>
            <p>Carbono emitido(Kg): <?php echo $carbono_emitido?></p>
            <?php foreach($maior_veiculo_emissor as $resultado):?>
                <p>Veículo que mais emitiu: <?php echo $resultado['veiculo']?>(<?php echo $resultado['carbono']?> Kg)</p>
            <?php endforeach;?>
            <?php foreach($maior_funcionario_emissor as $resultado):?>
                <p>Funcionário que mais emitiu: <?php echo $resultado['funcionario']?>(<?php echo $resultado['carbono']?> Kg)</p>
            <?php endforeach;?>
        </div>
    </div>
</body>
</html>