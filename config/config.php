<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMEC - Home</title>
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
                    <a href="?router=Pagina/home/">Informações Gerais</a>
                </div>
            </div>
            <div class="item-navegacao dropdown">
                <button class="dropbtn">Funcionários</button>
                <div class="dropdowncontent">
                    <a href="?router=Pagina/cadastroFuncionario/">Cadastrar</a>
                    <a href="?router=Pagina/consultaFuncionario/">Consultar</a>
                </div>
            </div>
            <div class="item-navegacao dropdown">
                <button class="dropbtn">Veículos</button>
                <div class="dropdowncontent">
                    <a href="?router=Pagina/cadastroVeiculo/">Cadastrar</a>
                    <a href="?router=Pagina/consultaVeiculo/">Consultar</a>
                </div>
            </div>
            <div class="item-navegacao dropdown">
                <button class="dropbtn">Chamados</button>
                <div class="dropdowncontent">
                    <a href="?router=Pagina/aberturaChamado/">Abrir Chamado</a>
                    <a href="?router=Pagina/consultaChamado/">Consultar</a>
                </div>
            </div>
			<div class="item-navegacao dropdown">
				<button class="dropbtn">Relatórios</button>
				<div class="dropdowncontent">
					<a href="/src/html/pagina-relatorios.html">Gerar Relatório</a>
				</div>
			</div>
            <div class="item-navegacao dropdown">
                <button class="dropbtn">Contato</button>
                <div class="dropdowncontent">
                    <a href="/src/html/pagina-contato.html">Contato</a>
                </div>
            </div>
            <div class="item-navegacao dropdown">
                <button class="dropbtn">Sobre</button>
                <div class="dropdowncontent">
                    <a href="/src/html/pagina-sobre.html">Sobre</a>
                </div>
            </div>
        </div>
    </nav>
</body>
</html>
