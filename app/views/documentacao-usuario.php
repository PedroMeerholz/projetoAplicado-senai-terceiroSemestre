<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./app/views/css/manual-usuario.css">
    <title>SMEC | Documentação de Usuário</title>
</head>
<body>
    <div class="documento">
        <div class="cabecalho">
            <fieldset class="titulos-iniciais">
                <h2>Manual do Usuário</h2>
                <h3>V1.0</h3>
            </fieldset>
        </div>
        <div class="sumario">
            <h2>Sumário</h2>
            <ol>
                <li>Introdução</li>
                <li>Primeiros Passos para Utilizar o Sistema</li>
                <li>Navegação do Sistema</li>
                <li>
                    Manter Funcionários
                </li>
                <ol>
                    <li>Criar Funcionário</li>
                    <li>Consultar Funcionários</li>
                    <li>Atualizar Funcionário</li>
                    <li>Excluir Funcionário</li>
                </ol>
                <li>Manter Veículos</li>
                <ol>
                    <li>Criar Veículo</li>
                    <li>Consultar Veículos</li>
                    <li>Atualizar Veículo</li>
                    <li>Excluir Veículo</li>
                </ol>
                <li>Manter Chamados</li>
                <ol>
                    <li>Abrir Chamado</li>
                    <li>Consultar Chamados</li>
                    <li>Atualizar Chamado</li>
                    <li>Excluir Chamado</li>
                </ol>
                <li>Gerar Relatório</li>
                <ol>
                    <li>Gerar Relatório</li>
                    <li>Obter Relatório</li>
                </ol>
            </ol>
            <hr>
        </div>
        <div class="introducao">
            <h2>Introdução</h2>
            <p>
                Este documento serve para auxiliar um usuário no processo de utilização do SMEC, o Sistema de Monitoramento de Emissões de Carbono.
                Dentro deste breve documento estarão instruções de como utilizar o sistema da forma planejada.
            </p>
            <hr>
        </div>
        <div class="primeiros-passos">
            <h2>Primeiros Passos</h2>
            <p>Esta seção tem como objetivo mostrar os primeiros passos para a utilização do sistema, ou seja, os recursos necessários para a utilização correta do sistema.</p>
            <h3>1° Passo</h3>
            <p>
                Para utilizar o sistema para a melhor experiência possível, é necessário utilizar as plataformas cujo o sistema foi feito para, que são os computadores e laptops.
                É possível utilizar o sistema em celulares e tablets, porém o uso dessa forma não é recomendado.
            </p>
            <h3>2° Passo</h3>
            <p>
                É necessário ter uma conta de usuário válida, caso contrário, não será possível acessar o sistema, então, antes de qualquer coisa, contate o(s) administrador(es)/equipe de TI e solicite acesso ao sistema.
            </p>
            <h3>3° Passo</h3>
            <p>
                Ter uma conexão com a internet.
                O sistema hospedado na internet, o que significa que para acessar o sistema, um URL (http://exemplo.com.br) será necessário.
            </p>
            <p>
                Caso siga corretamente os 3 passos, é só começar a utilizar o sistema.
                 Caso esteja ainda com dúvidas de como utilizar o sistema, continue lendo o documento.
            </p>
            <hr>
        </div>
        <div class="barra-navegacao">
            <h2>Navegação do Sistema e suas Páginas</h2>
            <p>
                A barra de navegação fica no topo da página. Caso não apareça, favor contatar a equipe de TI, mas caso ela apareça corretamente, ela deve conter esses botões… (Porém podem não estar presentes caso a empresa tenha decidido customizar a página.)
            </p>
            <h3>Botão Home</h3>
            <h4>Como usar…</h4>
            <p>
                <strong>Após o login ser realizado,</strong> o botão <strong>Home</strong> será a página inicial do sistema. Para utilizar esse botão, basta passar o mouse em cima dele e clicar em algum item no menu que aparece.
            </p>            
            <h4>Sobre o conteúdo da página…</h4>
            <p>
                Esta página contém algumas informações bem gerais, porém seu conteúdo pode variar dependendo da empresa, podendo ser customizado para ter outras informações.
            </p>
            <hr class="hr-interna">
            <h3>Botão de Funcionários</h3>
            <h4>Como usar…</h4>
            <p>
                O botão Funcionários funcionará de uma forma parecida com o botão de Home, ou seja, sua utilização é simples, basta passar o mouse sobre ele e um menu com opções aparecerá. O menu desta parte irá demonstrar todas as opções para manipulação de funcionários, ou seja, a parte de criar, consultar, atualizar* e excluir*.
                <strong>* Tanto a exclusão quanto a atualização ocorrem na seção de CONSULTA. Caso queira excluir ou atualizar um funcionário, utilize a Consulta.</strong>
            </p>
            <p>Sobre o conteúdo das páginas…</p>
            <h3>Página <i>'Cadastrar'</i></h3>
            <p>Contém uma página com um formulário com os seguintes campos…</p>
            <p>
                <strong>Nome Completo - </strong>Você deve preencher este campo com seu nome, ou o nome do funcionário que está sendo cadastrado.
                <strong>(Note que você deve colocar ao mínimo três letras. Caracteres especiais (*&%$#@!, etc) não serão aceitos.)</strong>
            </p>
            <p>
                <strong>Email - </strong>Você deve preencher este campo com um e-mail em um formato válido, ou seja, “Email@email.com”.
            </p>
            <p>
                <strong>CPF - </strong>Este campo deve ser preenchido com o seu CPF ou o CPF do funcionário sendo cadastrado, e ele deve ser somente preenchido com 11 números. Traços e pontos não são necessários.
                <strong>Ex de um CPF válido: 11922033002</strong>
            </p>
            <p>
                <strong>Nascimento - </strong>Aqui deve ser preenchido com o formato dentro do campo, e o formato da data de nascimento pode acabar variando…
            </p>
            <p>
                Caso seja<strong>dd/mm/yyyy</strong>, preencher com DIA, MÊS, ANO.
            </p>
            <p>
                Caso seja<strong>yyyy/mm/dd</strong>, preencher com ANO, MÊS, DIA.
            </p>
            <p>
                Caso seja<strong>mm/dd/yyyy</strong>, preencher com MÊS, DIA, ANO.
            </p>
            <p>Datas acima do dia atual não serão aceitas.</p>
            <p>
                <strong>Senha - </strong>Campo de texto para a senha. A senha deve ter no mínimo 6 caracteres.
            </p>
            <p>
                <strong>Repetir a senha - </strong>Campo de texto para confirmação de senha, garantindo que você não digitou algo de errado.
            </p>
            <p>
                <strong>Cargo - </strong>Essa é uma caixa de seleção, o que significa que você deve clicar nela e só aí que ela mostrará as opções disponíveis. Selecione uma das opções.
            </p>
            <h4>Botões na página.</h4>
            <p><strong>Cadastrar - </strong>Cadastra um funcionário caso todos os campos sejam preenchidos corretamente.</p>
            <p><strong>Limpar campos - </strong></p>Limpa os campos do formulário.

            <h3>Página <i>'Consultar'</i></h3>
            <p>
            Essa página será utilizada tanto para a consulta de funcionários, quanto para a edição e exclusão dos mesmos.
            O conteúdo da página é uma tabela contendo os funcionários, e no lado direto existem dois botões, que são de <strong>“Editar”</strong> e <strong>“Excluir”</strong>.
            A página de edição é similar a página de cadastro, e dessa forma, segue as mesmas regras que a página de cadastro. (Regras sendo 'mínimo de 6 letras’, sem caracteres especiais, etc.)
            O botão de exclusão lhe levará para uma página de confirmação.
            </p>
            <hr class="hr-interna">
            <h3>Botão de Veículos</h3>
            <h4><strong>Como usar...</strong></h4>
            <p>
                O botão veículos funciona de uma forma parecida com o botão de funcionários, ou seja, sua utilização é simples, basta passar o mouse sobre ele e um menu com opções aparecerá. O menu desta parte irá demonstrar todas as opções para manipulação de veículos, ou seja, a parte de criar, consultar, atualizar* e excluir*.
            </p>
            <p>
                <strong>* Tanto a exclusão quanto a atualização ocorrem na seção de CONSULTA. Caso queira excluir ou atualizar um veículo, utilize a Consulta.</strong>
            </p>
            <p>Sobre o conteúdo das páginas…</p>
            <h3>Página <i>'Cadastrar'</i></h3>
            <p><strong>Placa - </strong>Você deve preencher esse campo com a placa do veículo. Deve ser preenchido somente com os números e letras da placa.</p>
            <p><strong>Ano - </strong>Este campo representa o Ano do veículo. Deve ser preenchido somente com o ano, ou seja, 2001, 2002, etc.</p>
            <p><strong>Autonomia - </strong>Aqui deve ser colocado quantos quilômetros o veículo faz por litro de combustível. Deve ser colocado a média geral, e com somente uma casa decimal (9.9, 7.5, etc.)</p>
            <p><strong>Modelo - </strong>O modelo do veículo deve ser colocado aqui. Caso seja um Uno, escreva “Uno”, caso seja uma Strada, escreva “Strada”.</p>
            <p><strong>Status - </strong>Status do veículo, se ele está no momento disponível ou não.</p>
            <h4>Botões na página.</h4>
            <p><strong>Cadastrar - </strong>Cadastra um funcionário caso todos os campos sejam preenchidos corretamente.</p>
            <p><strong>Limpar campos - </strong></p>Limpa os campos do formulário.
            
            <h3>Página 'Consultar'</h3>
            <p>Essa página será utilizada tanto para a consulta de veículos, quanto para a edição e exclusão dos mesmos.</p>
            <p>O conteúdo da página é uma tabela contendo os veículos, e no lado direto, tem dois botões, que são de <strong>“Editar”</strong> e <strong>“Excluir”</strong>.</p>
            <p>
                A página de edição é similar a página de cadastro, e dessa forma, segue as mesmas regras que a página de cadastro. (Regras sendo 'mínimo de 6 letras', sem caracteres especiais, etc.)
                O botão Editar irá abrir uma página de edição com as informações do veículo selecionado, enquanto o botão de exclusão lhe levará para uma página de confirmação.
            </p>
            <hr class="hr-interna">
            <h3>Botão de Chamados</h3>
            <h4><strong>Como usar…</strong></h4>
            <p>
                O botão chamados funciona de uma forma parecida com o botão de veículos, ou seja, sua utilização é simples, basta passar o mouse sobre ele e um menu com opções aparecerá. O menu desta parte irá demonstrar todas as opções para manipulação de chamados, ou seja, a parte de criar, consultar, atualizar* e excluir*.
            </p>
            <p>
                <strong>* Tanto a exclusão quanto a atualização ocorrem na seção de CONSULTA. Caso queira excluir ou atualizar um chamado, utilize a Consulta.</strong>
            </p>
            <p>Sobre o conteúdo das páginas…</p>
            <h3>Página 'Cadastrar'</h3>
            <p>
                Diferentemente das duas páginas anteriores, a página de cadastro dos chamados contém uma página com duas tabelas.
            </p>
            <p>
                Sendo essas tabelas uma tabela com os funcionários DISPONÍVEIS e a outra com os veículos DISPONÍVEIS.
            </p>
            <p>
                A operação da página é mais simples comparada com as outras duas, é só clicar nos botões circulares para selecionar um funcionário e um veículo, e depois clicar no botão de <strong>Confirmar</strong>.
            </p>
            <h3>Página 'Consultar'</h3>
            <p>Essa página será utilizada tanto para a consulta de chamados, quanto para a edição e exclusão dos mesmos.</p>
            <p>O conteúdo da página é uma tabela contendo os chamados e algumas informações sobre eles, e no lado direto, tem dois botões, que são de <strong>“Editar”</strong> e <strong>“Excluir”</strong>.</p>
            <p>
                A página de edição vai servir para fechar o chamado.
            </p>
            <p>
                O botão de exclusão irá remover o chamado.
            </p>
            <hr class="hr-interna">
            <h3>Botão de Relatórios</h3>
            <h4>Como usar…</h4>
            <p>O botão de relatórios funcionará da mesma forma que todos os anteriores, em que, ao passar o mouse, ele revela opções. No caso do botão de relatório, só tem uma opção, que é a de gerar relatório.</p>
            <p>Para gerar um relatório, é necessário preencher os campos do formulário.</p>
            <p>Os campos existentes na página são…</p>
            <p><strong>Data de início -</strong> Deve ser preenchido com o período inicial.</p>
            <p><strong>Data final -</strong> Deve ser preenchido com o período final.</p>
            <p>Um relatório válido seria…</p>
            <p>Data de início - 30/06/2001 (DE)</p>
            <p>Data final - 05/08/2001 (ATÉ)</p>
        </div>
    </div>
</body>
</html>
