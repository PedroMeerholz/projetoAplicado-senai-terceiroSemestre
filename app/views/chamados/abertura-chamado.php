<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SMEC - Abertura de Chamados</title>
	<link rel="icon" type="image/x-icon" href="/src/img/logo.png">
	<link rel="stylesheet" href="./app/views/css/reset.css">
	<link rel="stylesheet" href="./app/views/css/generico.css">
	<link rel="stylesheet" href="./app/views/css/abertura-chamados.css">
</head>
<body>
	<h1>Abertura de Chamados</h1>
	<form action="?router=ManterChamado/registrarChamado/>" method="post" class="box-principal">
		<div class="box-secundario">
				<table class="tabela-funcionario">
					<thead>
						<tr>
							<td></td>
							<td class="titulo-coluna">Nome</td>
							<td class="titulo-coluna">Cargo</td>
						</tr>
					</thead>
					<tbody>
						<?php foreach($consultaFuncionario as $registro):?>
							<tr>
								<td><input type="radio" name="funcionarioSelecionado" value="<?php echo $registro['id_funcionario'];?>" checked></td>
								<td class="nome-funcionario"><?php echo $registro['nome']?></td>
								<td class="cargo-funcionario"><?php echo $registro['cargo']?></td>
							</tr>
						<?php endforeach;?>
					</tbody>
				</table>
			<br>
			<table class="tabela-veiculo">
				<thead>
					<tr>
						<td></td>
						<td class="titulo-coluna">Placa</td>
						<td class="titulo-coluna">Modelo</td>
						<td class="titulo-coluna">Autonomia</td>
					</tr>
				</thead>
				<tbody>
					<?php foreach($consultaVeiculo as $registro):?>
						<tr>
							<td><input type="radio" name="veiculoSelecionado" value="<?php echo $registro['id_veiculo']?>" checked></td>
							<td><?php echo $registro['placa']?></td>
							<td><?php echo $registro['modelo']?></td>
							<td><?php echo $registro['autonomia']?> Km/L</td>
						</tr>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
		<div class="botoes">
			<input type="submit" value="Confirmar" class="botao-operacao" name="enviaInformacoes">
		</div>
	</form>
</body>
</html>