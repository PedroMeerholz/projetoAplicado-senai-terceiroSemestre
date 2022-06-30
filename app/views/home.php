<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMEC | Página Home</title>
    <link rel="icon" type="image/x-icon" href="../img/logo.png">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/generico.css">
    <link rel="stylesheet" href="/css/home.css">
</head>
<body>
    <div class="bem-vindo">
        <h1>Seja Bem-Vindo, <?php echo $_SESSION['nome']?>!</h1>
    </div>
    <div class="informacoes-gerais">
        <h1>Informações Gerais</h1>
        <div class="informacoes-especificas informacoes-especificas-esquerda info-funcionarios">
            <h2>Funcionários</h2>
            <br>
            <p class="parametro-dashboard">N° de Funcionários: </p>
            <p class="dados-dashboard"><?php echo $total_funcionarios?></p>
            <p class="parametro-dashboard">Funcionários Disponíveis: </p>
            <p class="dados-dashboard"><?php echo $funcionarios_disponiveis?></p>
            <p class="parametro-dashboard">Funcionários Indisponíveis: </p>
            <p class="dados-dashboard"><?php echo $funcionarios_indisponiveis?></p>
        </div>
        <div class="informacoes-especificas informacoes-especificas-direita info-veiculos">
            <h2>Veículos</h2>
            <br>
            <p class="parametro-dashboard">N° de Veículos: </p>
            <p class="dados-dashboard"><?php echo $total_veiculos?></p>
            <p class="parametro-dashboard">Veículos Disponíveis: </p>
            <p class="dados-dashboard"><?php echo $veiculos_disponiveis?></p>
            <p class="parametro-dashboard">Veículos Indisponíveis: </p>
            <p class="dados-dashboard"><?php echo $veiculos_indisponiveis?></p>
        </div>
        <div class="informacoes-especificas informacoes-especificas-esquerda info-chamados">
            <h2>Chamados</h2>
            <br>
            <p class="parametro-dashboard">N° de Chamados: </p>
            <p class="dados-dashboard"><?php echo $total_chamados?></p>
            <p class="parametro-dashboard">Chamados Abertos: </p>
            <p class="dados-dashboard"><?php echo $chamados_abertos?></p>
            <p class="parametro-dashboard">Chamados Fechados: </p>
            <p class="dados-dashboard"><?php echo $chamados_finalizados?></p>
        </div>
        <div class="informacoes-especificas informacoes-especificas-direita info-carbono">
            <h2>Carbono</h2>
            <br>
            <p class="parametro-dashboard">Carbono emitido(Kg): </p>
            <p class="dados-dashboard"><?php echo $carbono_emitido?></p>
            <?php foreach($maior_veiculo_emissor as $resultado):?>
                <p class="parametro-dashboard">Veículo que mais emitiu: </p>
                <p class="dados-dashboard"><?php echo $resultado['veiculo']?></p>
            <?php endforeach;?>
            <?php foreach($maior_funcionario_emissor as $resultado):?>
                <p class="parametro-dashboard">Funcionário que mais emitiu: </p>
                <p class="dados-dashboard"><?php echo $resultado['funcionario']?></p>
            <?php endforeach;?>
        </div>
    </div>
</body>
</html>