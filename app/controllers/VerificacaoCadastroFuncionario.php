<?php

namespace app\controllers;

class VerificacaoCadastroFuncionario extends VerificacaoFuncionario
{
    public function verificaDadosCadastro()
    {
        if($this->verificaCamposCadastro())
        {
            return true;
        } else {
            return false;
        }
    }

    public function verificaCamposCadastro() {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data = [
            'nome' => trim($_POST['entradaNomeFuncionario']),
            'cpf' => trim($_POST['entradaCpfFuncionario']),
            'nascimento' => trim($_POST['entradaNascimentoFuncionario']),
            'cargo' => empty($_POST['entradaCargoFuncionario']) ? -1 : $_POST['entradaCargoFuncionario'],
            'senha' => trim($_POST['entradaSenhaFuncionario']),
            'confirmacaoSenha' => trim($_POST['entradaConfirmacaoSenhaFuncionario']),
            'status' => empty($_POST['entradaStatusFuncionario']) ? -1 : $_POST['entradaStatusFuncionario']
        ];

        $camposNaoVazios = $this->verificaCamposVazios($data['nome'], $data['cpf'], $data['nascimento'], $data['cargo'], $data['senha'], $data['confirmacaoSenha'], $data['status']);
        $nome = $this->verificaNome($data['nome']);
        $nascimento = $this->verificaNascimento($data['nascimento']);
        $cargo = $this->verificaCargo($data['cargo']);
        $status = $this->verificaStatus($data['status']);
        $cpf = $this->verificaCpf($data['cpf']);
        $senha = $this->verificaSenha($data['senha'], $data['confirmacaoSenha']);

        $this->erros = [];
        $this->valores = [];

        if(!$camposNaoVazios)
        {
            array_push($this->erros, 'Preencha todos os campos');
        }

        if($nome)
        {
            array_push($this->valores, $data['nome']);
        } else {
            array_push($this->erros, 'Preencha corretamente o campo Nome Completo\n\nO nome deve conter ao menos três(3) letras\nO nome não pode conter números');
            array_push($this->valores, $data['nome']);
        }

        if($cpf)
        {
            array_push($this->valores, $data['cpf']);
        } else {
            array_push($this->erros, 'Preencha o CPF do funcionário corretamente\n\nO CPF deve conter exatos onze(11) números\nVerifique se esse CPF já está vinculado a outro funcionário');
            array_push($this->valores, $data['cpf']);
        }

        if($senha == false)
        {
            array_push($this->erros, 'Digite a senha corretamente\n\nA senha deve conter ao menos seis caracteres\nOs dois campos de senha devem ser iguais');
        }

        if($nascimento == false)
        {
            array_push($this->erros, 'Preencha o campo Nascimento corretamente\n\nVerifique se a data foi digita completamente\nA data precisa ser inferior a data atual');
        }

        if($cargo == false)
        {
            array_push($this->erros, 'Selecione o cargo do funcionário');
        }

        if($status == false)
        {
            array_push($this->erros, 'Selecione o status do funcionário');   
        }

        if(empty($this->erros))
        {
            return true;
        } else {
            $_SESSION['valores'] = $this->valores;
            $_SESSION['erros'] = $this->erros;
            return false;
        }
    }
}