<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SMEC | Cadastro de Funcionários</title>
	<link rel="icon" type="image/x-icon" href="/img/logo.png">
	<link rel="stylesheet" href="./app/views/css/reset.css">
	<link rel="stylesheet" href="./app/views/css/generico.css">
	<link rel="stylesheet" href="./app/views/css/edita-chamado.css">
</head>
<body>
    <h1>Editar Chamado</h1>
    <div class="formulario">
        <form action="?router=ManterChamado/alterarRegistroChamado/>" method="post" class="box-principal">
            <?php foreach($edita as $registro_chamado):?>
                <fieldset class="entrada-informacoes">
                    <input type="hidden" name="id" value="<?php echo $registro_chamado['id_chamado']?>">
                    <label for="entradaDistanciaChamado">Distância:</label>
                    <input type="number" name="entradaDistanciaChamado" id="entradaDistanciaChamado" placeholder="25.2" step="0.01" value="<?php echo $registro_chamado['distancia'];?>" autofocus required> Km
                    <br>
                    <br>
                    <label for="entradaStatusChamado">Status:</label>
                    <select name="entradaStatusChamado" id="entradaStatusChamado" required>
                        <?php if($registro_chamado['status_chamado'] == 'Em Aberto'):?>
                            <option value="" disabled></option>
                            <option value="3" selected>Em Aberto</option>
                            <option value="4">Finalizado</option>
                        <?php endif;?>
                        <?php if($registro_chamado['status_chamado'] == 'Finalizado'):?>
                            <option value="" disabled></option>
                            <option value="3">Em Aberto</option>
                            <option value="4" selected>Finalizado</option>
                        <?php endif;?>
                    </select>
                </fieldset>
            <?php endforeach;?>
            <div class="botoes">
                <input type="submit" value="Confirmar" id="botao-confirmar" class="botao-operacao" name="enviaInformacoes">
                <input type="reset" value="Limpar Campos" class="botao-operacao" name="limpaCampos">
            </div>
        </form>
    </div>
</body>
</html>