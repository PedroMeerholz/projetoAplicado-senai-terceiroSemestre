<?php

namespace app\controllers;

use app\models\Funcionario;

class VerificacaoEdicaoFuncionario extends VerificacaoFuncionario
{
    public function verificaDadosEdicao()
    {
        if($this->verificaCamposEdicao())
        {
            return true;
        } else {
            return false;
        }
    }

    public function verificaCamposEdicao() {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data = [
            'nome' => trim($_POST['entradaNomeFuncionario']),
            'cpf' => trim($_POST['entradaCpfFuncionario']),
            'nascimento' => trim($_POST['entradaNascimentoFuncionario']),
            'cargo' => empty($_POST['entradaCargoFuncionario']) ? -1 : $_POST['entradaCargoFuncionario'],
            'status' => empty($_POST['entradaStatusFuncionario']) ? -1 : $_POST['entradaStatusFuncionario']
        ];

        $camposNaoVazios = $this->verificaCampos($data['nome'], $data['cpf'], $data['nascimento'], $data['cargo'], $data['status']);
        $nome = $this->verificaNome($data['nome']);
        $nascimento = $this->verificaNascimento($data['nascimento']);
        $cargo = $this->verificaCargo($data['cargo']);
        $status = $this->verificaStatus($data['status']);
        $cpf = $this->verificaFormatoCpf($data['cpf']);

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

        if($nascimento == false)
        {
            array_push($this->erros, 'Preencha o campo Nascimento corretamente\n\nVerifique se a data foi digita completamente\nA data precisa ser inferior a data atual');
        }

        if($cargo)
        {
            array_push($this->valores, $data['cargo']);
        } else {
            array_push($this->erros, 'Selecione o cargo do funcionário');
            array_push($this->valores, $data['cargo']);
        }

        if($status)
        {
            array_push($this->valores, $data['status']);
        } else {
            array_push($this->erros, 'Selecione o status do funcionário');   
            array_push($this->valores, $data['status']);
        }

        if(empty($this->erros))
        {
            return true;
        } else {
            $_SESSION['valores_edicao_funcionario'] = $this->valores;
            $_SESSION['erros'] = $this->erros;
            return false;
        }
    }

    private function verificaCampos($nome, $cpf, $nascimento, $cargo, $status)
    {
        if(empty($nome) || empty($cpf) || empty($nascimento) || empty($cargo) || empty($status))
        {
            return false;
        } else {
            return true;
        }
    }

    private function verificaFormatoCpf($cpf)
    {
        $funcionario = new Funcionario;
        //CHECAGEM DE CARACTERES ESPECIAIS DO CPF.
        if(!preg_match("/^[0-9]*$/", $cpf)) {
            return false;
        } else {
            //CHECAGEM DE TAMANHO DO CPF
            if(strlen($cpf) != 11) {
                return false;
            } else {
                if($funcionario->readCpfFuncionarioAtualizacao($cpf))
                {
                    return true;
                } else {
                    return false;
                }
            }
        }        
    }
}