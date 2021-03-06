<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SMEC | Cadastro de Funcionários</title>
	<link rel="icon" type="image/x-icon" href="/img/logo.png">
	<link rel="stylesheet" href="./app/views/css/reset.css">
	<link rel="stylesheet" href="./app/views/css/generico.css">
	<link rel="stylesheet" href="./app/views/css/formularios.css">
</head>
<body>
    <h1>Editar Funcionário</h1>
    <div class="formulario-cadastro">
        <form action="?router=ManterFuncionario/alterarRegistroFuncionario/" method="post" class="cadastro">
            <?php foreach($edita as $registro):?>
                <fieldset class="entrada-informacoes">
                    <input type="hidden" name="id" value="<?php echo $registro['id_funcionario']?>">
                    <label for="entradaNomeFuncionario">Nome Completo:</label>
                    <input type="text" name="entradaNomeFuncionario" id="entradaNomeFuncionario" placeholder="João da Silva" value="<?php echo $registro['nome'];?>" autofocus required>
                    <br>
                    <label for="entradaCpfFuncionario">CPF:</label>
                    <input type="number" name="entradaCpfFuncionario" id="entradaCpfFuncionario" minlength="11" maxlength="11" placeholder="12345678910" value="<?php echo $registro['cpf']?>" required>
                    <br>
                    <label for="entradaNascimentoFuncionario">Nascimento:</label>
                    <input type="date" name="entradaNascimentoFuncionario" id="entradaNascimentoFuncionario" placeholder="13//11/2003" value="<?php echo $registro['nascimento']?>" required>
                    <br>
                    <label for="entradaCargoFuncionario">Cargo:</label>
                    <select name="entradaCargoFuncionario" id="entradaCargoFuncionario">
                        <?php if($registro['cargo'] == 'Motorista'):?>
                            <option value="" disabled></option>
                            <option value="1" selected>Motorista</option>
                            <option value="2">Gerente</option>
                            <option value="3">Diretor</option>
                            <option value="4">Técnico</option>
                            <option value="5">Estagiário</option>
                        <?php endif;?>
                        <?php if($registro['cargo'] == 'Gerente'):?>
                            <option value="" disabled></option>
                            <option value="1">Motorista</option>
                            <option value="2" selected>Gerente</option>
                            <option value="3">Diretor</option>
                            <option value="4">Técnico</option>
                            <option value="5">Estagiário</option>
                        <?php endif;?>
                        <?php if($registro['cargo'] == 'Diretor'):?>
                            <option value="" disabled></option>
                            <option value="1">Motorista</option>
                            <option value="2">Gerente</option>
                            <option value="3" selected>Diretor</option>
                            <option value="4">Técnico</option>
                            <option value="5">Estagiário</option>
                        <?php endif;?>
                        <?php if($registro['cargo'] == 'Técnico'):?>
                            <option value="" disabled></option>
                            <option value="1">Motorista</option>
                            <option value="2">Gerente</option>
                            <option value="3">Diretor</option>
                            <option value="4" selected>Técnico</option>
                            <option value="5">Estagiário</option>
                        <?php endif;?>
                        <?php if($registro['cargo'] == 'Estagiário'):?>
                            <option value="" disabled></option>
                            <option value="1">Motorista</option>
                            <option value="2">Gerente</option>
                            <option value="3">Diretor</option>
                            <option value="4">Técnico</option>
                            <option value="5" selected>Estagiário</option>
                        <?php endif;?>                  
                    </select>
                    <br>
                    <label for="entradaStatusFuncionario">Status:</label>
                    <select name="entradaStatusFuncionario" id="entradaStatusFuncionario">
                        <?php if($registro['status_funcionario'] == 'Disponível'):?>
                            <option value="" disabled></option>
                            <option value="1" selected>Disponível</option>
                            <option value="2">Indisponível</option>
                        <?php endif;?>
                        <?php if($registro['status_funcionario'] == 'Indisponível'):?>
                            <option value="" disabled></option>
                            <option value="1">Disponível</option>
                            <option value="2" selected>Indisponível</option>
                        <?php endif;?>
                    </select>
                </fieldset>
            <?php endforeach;?>
            <div class="botoes">
                <input type="submit" value="Confirmar" id="botao-confirmar" class="botao-operacao" name="enviaInformacoes">
                <input type="reset" value="Cancelar" class="botao-operacao" onclick="location.href='?router=ManterFuncionario/consultaFuncionario/'">
            </div>
        </form>
    </div>
</body>
</html>