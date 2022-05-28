<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SMEC - Cadastro de Funcionários</title>
	<link rel="icon" type="image/x-icon" href="/img/logo.png">
	<link rel="stylesheet" href="./app/views/css/reset.css">
	<link rel="stylesheet" href="./app/views/css/generico.css">
	<link rel="stylesheet" href="./app/views/css/cadastro-funcionario.css">
</head>
<body>
<h1>Cadastro de Funcionários</h1>
	<div class="formulario-cadastro-funcionario">
		<form class="cadastro-funcionario" >
			<label for="entradaNomeUsuario">Nome Completo:</label>
			<input type="text" name="entradaNomeUsuario" id="entradaNomeUsuario" placeholder="João da Silva" autofocus required>
			<br>
			<label for="entradaCpfUsuario">CPF:</label>
			<input type="number" name="entradaCpfUsuario" id="entradaCpfUsuario" minlength="11" maxlength="11" placeholder="12345678910" required>
			<br>
			<label for="entradaNascimentoUsuario">Nascimento:</label>
			<input type="date" name="entradaNascimentoUsuario" id="entradaNascimentoUsuario" placeholder="13//11/2003" required>
			<br>
			<label for="entradaCargoUsuario">Cargo:</label>
			<select name="entradaCargoUsuario" id="entradaCargoFuncionario">
				<option value="" selected disabled></option>
				<option value="Administrador de Redes">Administrador de Redes</option>
				<option value="Diretor">Diretor</option>
				<option value="Gerente">Gerente</option>
				<option value="Motorista">Motorista</option>
				<option value="Técnico de Infraestrutura">Técnico de Infraestrutura</option>
				<option value="Técnico em Redes">Técnico em Redes</option>
			</select>
			<br>
			<label for="entradaStatusFuncionario">Status:</label>
			<select name="entradaStatusFuncionario" id="entradaStatusFuncionario">
				<option value="" selected disabled></option>
				<option value="Disponível">Disponível</option>
				<option value="Indisponível">Indisponível</option>
			</select>
			<br>
			<div class="botoes">
				<input type="submit" value="Confirmar" id="botao-confirmar" class="botao-operacao" name="enviaInformacoes">
				<input type="reset" value="Limpar Campos" class="botao-operacao" name="limpaCampos">
			</div>
		</form>
	</div>
	<script type="module" src="/src/js/funcionarios/validacao-cadastro-funcionario.js"></script>
	<script type="module" src="/src/js/funcionarios/confirmacao-dados.js"></script>
</body>
</html>