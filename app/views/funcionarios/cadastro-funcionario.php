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
		<form action="?router=Pagina/registrarFuncionario/" method="post" class="cadastro-funcionario" >
			<label for="entradaNomeFuncionario">Nome Completo:</label>
			<input type="text" name="entradaNomeFuncionario" id="entradaNomeFuncionario" placeholder="João da Silva" autofocus required>
			<br>
			<label for="entradaCpfFuncionario">CPF:</label>
			<input type="number" name="entradaCpfFuncionario" id="entradaCpfFuncionario" minlength="11" maxlength="11" placeholder="12345678910" required>
			<br>
			<label for="entradaNascimentoFuncionario">Nascimento:</label>
			<input type="date" name="entradaNascimentoFuncionario" id="entradaNascimentoFuncionario" placeholder="13//11/2003" required>
			<br>
			<label for="entradaCargoFuncionario">Cargo:</label>
			<select name="entradaCargoFuncionario" id="entradaCargoFuncionario">
				<option value="" selected disabled></option>
				<option value="1">Motorista</option>
				<option value="2">Gerente</option>
				<option value="3">Diretor</option>
				<option value="4">Técnico</option>
				<option value="5">Estagiário</option>
			</select>
			<br>
			<label for="entradaStatusFuncionario">Status:</label>
			<select name="entradaStatusFuncionario" id="entradaStatusFuncionario">
				<option value="" selected disabled></option>
				<option value="1">Disponível</option>
				<option value="2">Indisponível</option>
			</select>
			<br>
			<div class="botoes">
				<input type="submit" value="Confirmar" id="botao-confirmar" class="botao-operacao" name="enviaInformacoes">
				<input type="reset" value="Limpar Campos" class="botao-operacao" name="limpaCampos">
			</div>
		</form>
	</div>
</body>
</html>