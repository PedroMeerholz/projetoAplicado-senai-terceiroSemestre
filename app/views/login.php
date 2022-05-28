<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>SMEC - Login</title>
    <link rel="shortcut icon" href="/src/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="./app/views/css/reset.css">
    <link rel="stylesheet" href="./app/views/css/login.css">
    <link rel="stylesheet" href="./app/views/css/sobre.css">
</head>
<body>
    <div id="divisao-superior">
        <div id="informacoes">
            <div class="detalhes">
                <h1>Sobre o Projeto</h1>
                <p><strong>Objetivo do Projeto</strong></p>
                <p>Este projeto tem como objetivo conciliar todas as matérias estudadas até o momento na graduação de Análise e Desenvolvimento de Sistemas.</p>
                <br>
                <br>
                <p><strong>Funcionalidade Principal do Projeto:</strong></p>
                <p> Calcular a emissão de carbono emitida pela frota da empresa cliente.</p>
                <br>
                <br>
                <p><strong>Oque mais o software te proporciona?</strong></p>
                <ul id="lista-funcionalidades">
                    <li class="item-lista-funcionalidade">Gestão de chamados</li>
                    <li class="item-lista-funcionalidade">Manipulação de funcionários e veículos</li>
                    <li class="item-lista-funcionalidade">Geração de relatório com período de tempo personalizado</li>      
                </ul>
                <br>
                <br>
                <p><strong>Desenvolvedores: </strong><a href="https://github.com/LucasSM3006" target="blank" class="link-externo">Lucas Machado</a> e <a href="https://github.com/PedroMeerholz" target="blank" class="link-externo">Pedro Meerholz</a></p>
            </div>
            <div class="detalhes">
                <h1>A Pegada de Carbono</h1>
                <p><strong>Oque é?</strong></p>
                <p>A pegada de carbono é uma metodologia criada para medir as emissões de gases estufa – todas elas, independente do tipo de gás emitido, são convertidas em carbono equivalente.</p>
                <br>
                <br>
                <p><strong>Para que serve?</strong></p>
                <ul id="lista-pegada-carbono">
                    <li class="item-lista-pegada-carbono">Calcular a emissão de carbono equivalente na atmosfera por uma pessoa, atividade, evento, empresa, organização ou governo</li>
                    <li class="item-lista-pegada-carbono">Analisar os impactos que causamos na atmosfera</li>
                    <li class="item-lista-pegada-carbono">Analisar as mudanças climáticas provocadas por cada produto, processo ou serviço que consumimos.</li>
                </ul>
                <br>
                <br>
                <p id="fonte"><a href="https://www.ecycle.com.br/pegada-carbono/" target="blank" class="link-externo">Fonte: ecycle.com.br</a></p>
            </div>
        </div>
        <div class="formulario-login">
            <form class="login">
                <div class="inputs-login">
                    <div class="input-row">
                        <label class="label" for="entradaLogin">CPF:</label>
                        <input type="text" name="entradaCpf">
                    </div>
                    <br>
                    <div class="input-row">
                        <lable class="label" for="entradaSenha">Senha:</lable>
                        <input type="password" name="entradaSenha">
                    </div>
                    <br>
                    <input type="submit" value="Entrar" class="botao-operacao">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
