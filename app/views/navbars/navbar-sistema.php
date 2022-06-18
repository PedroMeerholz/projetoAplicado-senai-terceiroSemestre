<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./app/views/css/reset.css">
    <link rel="stylesheet" href="./app/views/css/generico.css">
    <link rel="stylesheet" href="./app/views/css/home.css">
</head>
<body>
    <nav id="barra-navegacao">
        <div class="conteudo-navegacao">
            <div class="item-navegacao dropdown">
                <button class="dropbtn">Home</button>
                <div class="dropdowncontent">
                    <a href="?router=HomeDashboard/home/">Informações Gerais</a>
                </div>
            </div>
            <div class="item-navegacao dropdown">
                <button class="dropbtn">Funcionários</button>
                <div class="dropdowncontent">
                    <a href="?router=ManterFuncionario/cadastroFuncionario/">Cadastrar</a>
                    <a href="?router=ManterFuncionario/consultaFuncionario/">Consultar</a>
                </div>
            </div>
            <div class="item-navegacao dropdown">
                <button class="dropbtn">Veículos</button>
                <div class="dropdowncontent">
                    <a href="?router=ManterVeiculo/cadastroVeiculo/">Cadastrar</a>
                    <a href="?router=ManterVeiculo/consultaVeiculo/">Consultar</a>
                </div>
            </div>
            <div class="item-navegacao dropdown">
                <button class="dropbtn">Chamados</button>
                <div class="dropdowncontent">
                    <a href="?router=ManterChamado/aberturaChamado/">Abrir Chamado</a>
                    <a href="?router=ManterChamado/consultaChamado/">Consultar</a>
                </div>
            </div>
			<div class="item-navegacao dropdown">
				<button class="dropbtn">Relatórios</button>
				<div class="dropdowncontent">
					<a href="?router=Pagina/geraRelatorio">Gerar Relatório</a>
				</div>
			</div>
            <div class="item-navegacao dropdown">
                <button class="dropbtn">Sair</button>
                <div class="dropdowncontent">
                    <a href="?router=Sessao/encerrarSessao/">Encerrar Sessão</a>
                </div>
            </div>
        </div>
    </nav>
</body>
</html>
