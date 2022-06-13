<?php

namespace app\controllers;

use app\models\Funcionario;

class VerificacaoFuncionario
{

    private $erros;
    private $valores;
    private $funcionario;

    public function verificaDadosCadastro()
    {
        if($this->verificaCamposCadastro())
        {
            return true;
        } else {
            return false;
        }
    }

    public function verificaDadosEdicao()
    {
        if($this->verificaCamposEdicao())
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
            array_push($this->erros, 'Preencha o campo Nascimento');
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

    public function verificaCamposEdicao() {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        $data = [
            'nome' => trim($_POST['entradaNomeFuncionario']),
            'cpf' => trim($_POST['entradaCpfFuncionario']),
            'nascimento' => trim($_POST['entradaNascimentoFuncionario']),
            'cargo' => empty($_POST['entradaCargoFuncionario']) ? -1 : $_POST['entradaCargoFuncionario'],
            'status' => empty($_POST['entradaStatusFuncionario']) ? -1 : $_POST['entradaStatusFuncionario']
        ];

        $camposVazios = $this->verificaCamposVazios($data['nome'], $data['cpf'], $data['nascimento'], $data['cargo'], $data['senha'], $data['confirmacaoSenha'], $data['status']);
        $nome = $this->verificaNome($data['nome']);
        $nascimento = $this->verificaNascimento($data['nascimento']);
        $cargo = $this->verificaCargo($data['cargo']);
        $status = $this->verificaStatus($data['status']);
        $cpf = $this->verificaCpf($data['cpf']);

        if($camposVazios && $nome && $nascimento && $cargo && $status && $cpf)
        {
            return true;
        } else {
            return false;
        }
    }

    private function verificaCamposVazios($nome, $cpf, $nascimento, $cargo, $senha, $confirmacaoSenha, $status)
    {
        if(empty($nome) || empty($cpf) || empty($nascimento) || empty($cargo) || empty($senha) || empty($confirmacaoSenha) || empty($status)){
            return false;
        } else {
            return true;
        }
    }
    
    private function verificaNome($nome)
    {
        if(strlen($nome) >= 3)
        {
            if(preg_match('/abcdef/', $nome))
            return true;
        } else {
            return false;
        }
    }
    
    private function verificaCpf($cpf)
    {
        $this->funcionario = new Funcionario;
        //CHECAGEM DE CARACTERES ESPECIAIS DO CPF.
        if(!preg_match("/^[0-9]*$/", $cpf)) {
            return false;
        } else {
            //CHECAGEM DE TAMANHO DO CPF
            if(strlen($cpf) != 11) {
                return false;
            } else {
                if($this->funcionario->readCpfFuncionario($cpf)){
                    return true;
                } else {
                    return false;
                }
            }
        }        
    }

    private function verificaNascimento($nascimento)
    {
        $hoje = date('Y-m-d');
        if(strtotime($nascimento) >= strtotime($hoje))
        {
            return false;
        } else {
            return true;
        }
    }

    private function verificaCargo($cargo)
    {
        if($cargo >= 1)
        {
            return true;
        } else {
            return false;
        }
    }

    private function verificaStatus($status)
    {
        if($status >= 1)
        {
            return true;
        } else {
            return false;
        }
    }

    private function verificaSenha($senha, $senhaConfirmacao)
    {
        //CHECAR PARA VER SE A SENHA ATENDE OS REQUERIMENTOS/E OU AS SENHAS NÃO SÃO IGUAIS.
        if(strlen($senha) >= 6) {
            if($senha == $senhaConfirmacao) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}