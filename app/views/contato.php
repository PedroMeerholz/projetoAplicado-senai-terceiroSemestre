<!DOCTYPE html>
<!DOCTYPE html>
<html lang="pt-br ">
<head>
    <meta charset="UTF-8">
    <title>SMEC - Contato</title>
    <link rel="shortcut icon" href="/src/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="./app/views/css/reset.css">
    <link rel="stylesheet" href="./app/views/css/generico.css">
    <link rel="stylesheet" href="./app/views/css/contato.css">
</head>
<body>
    <h1>Contato</h1>
    <div class="formulario-contato">
        <form class="contato">
            <label for="entradaNome">Nome Completo:</label>
            <input type="text" placeholder="João Silva">
            <br>
            <label for="entradaEmail">E-mail:</label>
            <input type="email" placeholder="seuemail@dominio.com">
            <br>
            <label for="entradaTelefone">Telefone:</label>
            <input type="tel" placeholder="48900000000">
            <br>
            <label for="entradaMensagem">Mensagem:</label>
            <textarea></textarea>
            <br>
			<div class="botoes">
				<input type="submit" value="Confirmar" class="botao-operacao" name="enviaInformacoes">
				<input type="reset" value="Limpar Campos" class="botao-operacao" name="limpaCampos">
			</div>
        </form>
    </div>
</body>
</html>