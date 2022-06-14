<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SMEC - Cadastro de Veículos</title>
	<link rel="icon" type="image/x-icon" href="/src/img/logo.png">
	<link rel="stylesheet" href="./app/views/css/reset.css">
	<link rel="stylesheet" href="./app/views/css/generico.css">
	<link rel="stylesheet" href="./app/views/css/formularios.css">
</head>
<body>
<h1>Cadastro de Veículos</h1>
	<div class="formulario-cadastro">
		<form action="?router=ManterVeiculo/registrarVeiculo/" method="post" class="cadastro">
			<label for="entradaPlacaVeiculo">Placa:</label>
			<input type="text" name="entradaPlacaVeiculo" id="entradaPlacaVeiculo" placeholder="BRA3R52" value="<?php echo empty($valores[0]) ? '' : $valores[0];?>" autofocus required>
			<br>
			<label for="entradaAnoVeiculo">Ano:</label>
			<input type="number" name="entradaAnoVeiculo" id="entradaAnoVeiculo" min="2000" placeholder="2000" value="<?php echo empty($valores[1]) ? '' : $valores[1];?>" required>
			<br>
			<label for="entradaAutonomiaVeiculo">Autonomia:</label>
			<input type="number" name="entradaAutonomiaVeiculo" id="entradaAutonomiaVeiculo" step="0.01" placeholder="9.9" value="<?php echo empty($valores[2]) ? '' : $valores[2];?>"required>
			<br>
			<label for="entradaModeloVeiculo">Modelo:</label>
			<select name="entradaModeloVeiculo" id="entradaModeloVeiculo" required>
				<optgroup name="modelo">
					<option value="" selected disabled></option>
					<option value="1">Strada</option>
					<option value="2">Fiorino</option>
					<option value="3">Uno</option>
					<option value="4">Pálio</option>
					<option value="5">Logan</option>
				</optgroup>
			</select>
			<br>
			<label for="entradaStatusVeiculo">Status:</label>
			<select name="entradaStatusVeiculo" id="entradaStatusVeiculo" required>
				<optgroup name="status">
					<option value="" selected disabled></option>
					<option value="1">Disponível</option>
					<option value="2">Indisponível</option>
				</optgroup>
			</select>
			<br>
			<div class="botoes">
				<input type="submit" value="Confirmar" class="botao-operacao" id="botao-confirmar" name="enviaInformacoes">
				<input type="button" value="Limpar Campos" class="botao-operacao" name="limpaCampos" onclick="location.reload()">
			</div>
		</form>
	</div>
	<script type="module" src="/src/js/veiculos/validacao-cadastro-veiculos.js"></script>
	<script type="module" src="/src/js/veiculos/confirmacao-dados.js"></script>
</body>
</html>