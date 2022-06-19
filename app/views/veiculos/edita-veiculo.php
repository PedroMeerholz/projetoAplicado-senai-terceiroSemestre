<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SMEC - Cadastro de Funcionários</title>
	<link rel="icon" type="image/x-icon" href="/img/logo.png">
	<link rel="stylesheet" href="./app/views/css/reset.css">
	<link rel="stylesheet" href="./app/views/css/generico.css">
	<link rel="stylesheet" href="./app/views/css/formularios.css">
</head>
<body>
<h1>Editar Veículo</h1>
	<div class="formulario-cadastro">
		<form action="?router=ManterVeiculo/alterarRegistroVeiculo/" method="post" class="cadastro">
            <?php foreach($edita as $registro):?>
                <input type="hidden" name="id" value="<?php echo $registro['id_veiculo']?>">
                <label for="entradaPlacaVeiculo">Placa:</label>
                <input type="text" name="entradaPlacaVeiculo" id="entradaPlacaVeiculo" placeholder="João da Silva" value="<?php echo $registro['placa'];?>" autofocus required>
                <br>
                <label for="entradaAnoVeiculo">Ano:</label>
                <input type="number" name="entradaAnoVeiculo" id="entradaAnoVeiculo" min="2000" max="2022" placeholder="2000" value="<?php echo $registro['ano']?>" required>
                <br>
                <label for="entradaAutonomiaVeiculo">Autonomia:</label>
                <input type="number" name="entradaAutonomiaVeiculo" id="entradaAutonomiaVeiculo" placeholder="1" value="<?php echo $registro['autonomia']?>" required>
                <br>
                <label for="entradaModeloVeiculo">Modelo:</label>
                <select name="entradaModeloVeiculo" id="entradaModeloVeiculo">
                    <?php if($registro['modelo'] == 'Strada'):?>
                        <optgroup name="modelo">
                            <option value="1" selected>Strada</option>
                            <option value="2">Fiorino</option>
                            <option value="3">Uno</option>
                            <option value="4">Pálio</option>
                            <option value="5">Logan</option>
                        </optgroup>
                    <?php endif;?>
                    <?php if($registro['modelo'] == 'Fiorino'):?>
                        <optgroup name="modelo">
                            <option value="1">Strada</option>
                            <option value="2" selected>Fiorino</option>
                            <option value="3">Uno</option>
                            <option value="4">Pálio</option>
                            <option value="5">Logan</option>
                        </optgroup>
                    <?php endif;?>
                    <?php if($registro['modelo'] == 'Uno'):?>
                        <optgroup name="modelo">
                            <option value="1">Strada</option>
                            <option value="2">Fiorino</option>
                            <option value="3" selected>Uno</option>
                            <option value="4">Pálio</option>
                            <option value="5">Logan</option>
                        </optgroup>
                    <?php endif;?>
                    <?php if($registro['modelo'] == 'Pálio'):?>
                        <optgroup name="modelo">
                            <option value="1">Strada</option>
                            <option value="2">Fiorino</option>
                            <option value="3">Uno</option>
                            <option value="4" selected>Pálio</option>
                            <option value="5">Logan</option>
                        </optgroup>
                    <?php endif;?>
                    <?php if($registro['modelo'] == 'Logan'):?>
                        <optgroup name="modelo">
                            <option value="1">Strada</option>
                            <option value="2">Fiorino</option>
                            <option value="3">Uno</option>
                            <option value="4">Pálio</option>
                            <option value="5" selected>Logan</option>
                        </optgroup>
                    <?php endif;?>
                </select>
                <br>
                <label for="entradaStatusVeiculo">Status:</label>
                <select name="entradaStatusVeiculo" id="entradaStatusVeiculo" required>
                    <?php if($registro['status_veiculo'] == 'Disponível'):?>
                        <optgroup name="status">
                            <option value="1" selected>Disponível</option>
                            <option value="2">Indisponível</option>
                        </optgroup>
                    <?php endif;?>
                    <?php if($registro['status_veiculo'] == 'Indisponível'):?>
                        <optgroup name="status">
                            <option value="1">Disponível</option>
                            <option value="2" selected>Indisponível</option>
                        </optgroup>
                    <?php endif;?>
                </select>
                <br>
                <div class="botoes">
                    <input type="submit" value="Confirmar" id="botao-confirmar" class="botao-operacao" name="enviaInformacoes">
                    <input type="reset" value="Limpar Campos" class="botao-operacao" name="limpaCampos">
                </div>
            <?php endforeach;?>
		</form>
	</div>
</body>
</html>