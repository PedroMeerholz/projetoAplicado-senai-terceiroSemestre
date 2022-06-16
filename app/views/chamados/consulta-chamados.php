<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMEC | Consulta de Chamados</title>
    <link rel="stylesheet" href="./app/views/css/reset.css">
    <link rel="stylesheet" href="./app/views/css/generico.css">
    <link rel="stylesheet" href="./app/views/css/consulta-generico.css">
</head>
<body>
    <h1>Consulta de Chamados</h1>
    <div class="box-principal">
        <div class="box-secundario">
            <table class="tabela-consulta">
                <thead class="cabecalho-tabela-consulta">
                    <tr class="linha-cabecalho-tabela-consulta">
                        <td>Data e Hora</td>
                        <td>Funcionário</td>
                        <td>Veículo</td>
                        <td>Distancia(Km)</td>
                        <td>Carbono(kg)</td>
                        <td>Status</td>
                        <td colspan="2">Ações</td>
                    </tr>
                </thead>
                <tbody class="conteudo-tabela-consulta">
                    <?php foreach($consulta as $registro):?>
                        <?php if($registro['status_chamado'] == 'Em Aberto'):?>
                            <tr>
                                <td><?php echo $registro['data_chamado'];?></td>
                                <td><?php echo $registro['funcionario'];?></td>
                                <td><?php echo $registro['modelo_veiculo'];?>(<?php echo $registro['placa_veiculo'];?>)</td>
                                <td><?php echo $registro['distancia'];?></td>
                                <td><?php echo $registro['carbono'];?></td>
                                <td><?php echo $registro['status_chamado'];?></td>
                                <td><a class="acoes-consulta" href="?router=ManterChamado/editaChamado/&id=<?php echo base64_encode($registro['id_chamado'])?>">Editar</a></td>
                                <td><a class="acoes-consulta" href="?router=ManterChamado/deletaChamado/&id=<?php echo base64_encode($registro['id_chamado'])?>">Remover</a></td>
                            </tr>
                        <?php endif;?>
                        <?php if($registro['status_chamado'] == 'Finalizado'):?>
                            <tr>
                                <td><?php echo $registro['data_chamado'];?></td>
                                <td><?php echo $registro['funcionario'];?></td>
                                <td><?php echo $registro['modelo_veiculo'];?>(<?php echo $registro['placa_veiculo'];?>)</td>
                                <td><?php echo $registro['distancia'];?></td>
                                <td><?php echo $registro['carbono'];?></td>
                                <td><?php echo $registro['status_chamado'];?></td>
                                <td colspan="2"></td>
                            </tr>
                        <?php endif;?>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>