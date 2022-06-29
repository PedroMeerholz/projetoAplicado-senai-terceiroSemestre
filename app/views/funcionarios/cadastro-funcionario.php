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
	<h1>Cadastro de Funcionários</h1>
	<div class="formulario-cadastro">
		<form action="?router=ManterFuncionario/registrarFuncionario/" method="post" class="cadastro" >
			<label for="entradaNomeFuncionario">Nome Completo:</label>
			<input type="text" name="entradaNomeFuncionario" id="entradaNomeFuncionario" placeholder="João da Silva" value="<?php echo empty($valores[0]) ? '' : $valores[0]?>" autofocus required>
			<br>
			<label for="entradaCpfFuncionario">CPF:</label>
			<input type="number" name="entradaCpfFuncionario" id="entradaCpfFuncionario" minlength="11" maxlength="11" placeholder="12345678910" value="<?php echo empty($valores[1]) ? '' : $valores[1]?>" required>
			<br>
			<label for="entradaSenhaFuncionario">Senha:</label>
			<input type="password" name="entradaSenhaFuncionario" id="entradaSenhaFuncionario" minlength="6">
			<br>
			<label for="entradaConfirmacaoSenhaFuncionario">Confirme a senha:</label>
			<input type="password" name="entradaConfirmacaoSenhaFuncionario" id="entradaConfirmacaoSenhaFuncionario" minlength="6">
			<br>
			<label for="entradaNascimentoFuncionario">Nascimento:</label>
			<input type="date" name="entradaNascimentoFuncionario" id="entradaNascimentoFuncionario" value="<?php echo empty($valores[3]) ? '' : $valores[3]?>">
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
				<input type="button" value="Cancelar" class="botao-operacao" onclick="location.href='?router=HomeDashboard/home/'">
			</div>
		</form>
	</div>
</body>
</html>