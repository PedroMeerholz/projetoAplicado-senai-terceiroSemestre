<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMEC | Consulta de Funcionários</title>
    <link rel="stylesheet" href="./app/views/css/reset.css">
    <link rel="stylesheet" href="./app/views/css/generico.css">
    <link rel="stylesheet" href="./app/views/css/consulta-generico.css">
</head>
<body>
    <h1>Consulta de Funcionários</h1>
    <div class="box-principal">
        <div class="box-secundario">
            <table class="tabela-consulta">
                <thead class="cabecalho-tabela-consulta">
                    <tr class="linha-cabecalho-tabela-consulta">
                        <td>Nome Completo</td>
                        <td>CPF</td>
                        <td>Nascimento</td>
                        <td>Cargo</td>
                        <td>Status</td>
                        <td>Ações</td>
                    </tr>
                </thead>
                <tbody class="conteudo-tabela-consulta">
                    <?php foreach($consulta as $registro):?>
                        <tr>
                            <td><?php echo $registro['nome']?></td>
                            <td><?php echo $registro['cpf']?></td>
                            <td><?php echo $registro['nascimento']?></td>
                            <td><?php echo $registro['cargo']?></td>
                            <td><?php echo $registro['status_funcionario']?></td>
                            <td><a href="?router=Pagina/editaFuncionario/&id=<?php echo base64_encode($registro['id_funcionario']);?>">Editar</a></td>
                            <td><a href="?router=Pagina/deletaFuncionario/&id=<?php echo base64_encode($registro['id_funcionario']);?>">Remover</a></td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>