<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SMEC - Cadastro de Funcionários</title>
	<link rel="icon" type="image/x-icon" href="/img/logo.png">
	<link rel="stylesheet" href="./app/views/css/reset.css">
	<link rel="stylesheet" href="./app/views/css/generico.css">
	<link rel="stylesheet" href="./app/views/css/edita-chamado.css">
</head>
<body>
    <h1>Editar Chamado</h1>
    <form action="?router=Pagina/alterarRegistroChamado/>" method="post" class="box-principal">
        <div class="campos-fechar-chamado">
            <?php foreach($edita as $registro_chamado):?>
                <input type="hidden" name="id" value="<?php echo $registro_chamado['id_chamado']?>">
                <label for="entradaDistanciaChamado">Distância:</label>
                <input type="number" name="entradaDistanciaChamado" id="entradaDistanciaChamado" placeholder="25.2" value="<?php echo $registro_chamado['distancia'];?>" autofocus required> Km
                <br>
                <label for="entradaStatusChamado">Status:</label>
                <select name="entradaStatusChamado" id="entradaStatusChamado" required>
                    <optgroup name="status">
                        <option value="" selected disabled></option>
                        <option value="1">Disponível</option>
                        <option value="2">Indisponível</option>
                    </optgroup>
                </select>
                Status Atual: <?php echo $registro_chamado['status_chamado']?>
            <?php endforeach;?>
        </div>
        <div class="botoes">
            <input type="submit" value="Confirmar" id="botao-confirmar" class="botao-operacao" name="enviaInformacoes">
            <input type="reset" value="Limpar Campos" class="botao-operacao" name="limpaCampos">
        </div>
	</form>
</body>
</html>