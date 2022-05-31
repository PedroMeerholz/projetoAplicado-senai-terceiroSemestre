<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMEC | Consulta de Veículos</title>
    <link rel="stylesheet" href="./app/views/css/reset.css">
    <link rel="stylesheet" href="./app/views/css/generico.css">
    <link rel="stylesheet" href="./app/views/css/consulta-generico.css">
</head>
<body>
    <h1>Consulta de Veículos</h1>
    <div class="box-principal">
        <div class="box-secundario">
            <table class="tabela-consulta">
                <thead class="cabecalho-tabela-consulta">
                    <tr class="linha-cabecalho-tabela-consulta">
                        <td>Placa</td>
                        <td>Modelo</td>
                        <td>Ano</td>
                        <td>Autonomia</td>
                        <td>Status</td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>
                <tbody class="conteudo-tabela-consulta">
                    <?php foreach($consulta as $registro):?>
                        <tr>
                            <td><?php echo $registro['placa']?></td>
                            <td><?php echo $registro['modelo']?></td>
                            <td><?php echo $registro['ano']?></td>
                            <td><?php echo $registro['autonomia']?> Km/L</td>
                            <td><?php echo $registro['status_veiculo']?></td>
                            <td><a class="acoes-consulta" href="?router=Pagina/editaVeiculo/&id=<?php echo base64_encode($registro['id_veiculo']);?>">Editar</a></td>
                            <td><a class="acoes-consulta" href="?router=Pagina/deletaVeiculo/&id=<?php echo base64_encode($registro['id_veiculo']);?>&placa=<?php echo base64_encode($registro['placa'])?>">Remover</a></td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>