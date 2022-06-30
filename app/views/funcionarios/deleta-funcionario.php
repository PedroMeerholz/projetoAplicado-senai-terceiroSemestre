<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMEC | Remover Registro</title>
    <link rel="stylesheet" href="./app/views/css/reset.css">
    <link rel="stylesheet" href="./app/views/css/remover-registro.css">
</head>
<body>
    <h1>Remover Registro</h1>
    <div class="informacoes-remocao">
        <h2>Deseja remover o funcionário <?php echo base64_decode($nome)?>?</h2>
        <div class="botoes">
            <button class="botao-operacao" onclick="location.href='?router=ManterFuncionario/deletarRegistroFuncionario/&id=<?php echo $id;?>'" type="button">Sim</button>
            <button class="botao-operacao" onclick="location.href='?router=ManterFuncionario/consultaFuncionario/'">Não</button>
        </div>
    </div>
</body>
</html>