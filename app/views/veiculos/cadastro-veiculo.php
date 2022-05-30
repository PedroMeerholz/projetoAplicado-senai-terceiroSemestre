<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SMEC - Cadastro de Veículos</title>
	<link rel="icon" type="image/x-icon" href="/src/img/logo.png">
	<link rel="stylesheet" href="./app/views/css/reset.css">
	<link rel="stylesheet" href="./app/views/css/generico.css">
	<link rel="stylesheet" href="./app/views/css/cadastro-veiculos.css">
</head>
<body>
<h1>Cadastro de Veículos</h1>
	<div class="formulario-cadastro-veiculo">
		<form action="?router=Pagina/registrarVeiculo/" method="post" class="cadastro-veiculo">
			<label for="entradaPlacaVeiculo">Placa:</label>
			<input type="text" name="entradaPlacaVeiculo" id="entradaPlacaVeiculo" placeholder="BRA3R52" autofocus required>
			<br>
			<label for="entradaAnoVeiculo">Ano:</label>
			<input type="number" name="entradaAnoVeiculo" id="entradaAnoVeiculo" min="2000" max="2022" placeholder="2000" required>
			<br>
			<label for="entradaAutonomiaVeiculo">Autonomia:</label>
			<input type="number" name="entradaAutonomiaVeiculo" id="entradaAutonomiaVeiculo" value="1" placeholder="9.9" required>
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
				<input type="reset" value="Limpar Campos" class="botao-operacao" name="limpaCampos">
			</div>
		</form>
	</div>
	<script type="module" src="/src/js/veiculos/validacao-cadastro-veiculos.js"></script>
	<script type="module" src="/src/js/veiculos/confirmacao-dados.js"></script>
</body>
</html>