<?php

namespace app\controllers;

use app\models\Funcionario;

class VerificacaoFuncionario
{
    public function verificaDados()
    {
        if($this->verificaCampos())
        {
            return true;
        } else {
            return false;
        }
    }

    public function verificaCampos() {
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

        $camposVazios = $this->verificaCamposVazios($data['nome'], $data['cpf'], $data['nascimento'], $data['cargo'], $data['senha'], $data['confirmacaoSenha']);
        $nome = $this->verificaNome($data['nome']);
        $nascimento = $this->verificaNascimento($data['nascimento']);
        $cargo = $this->verificaCargo($data['cargo']);
        $status = $this->verificaStatus($data['status']);
        $cpf = $this->verificaCpf($data['cpf']);
        $senha = $this->verificaSenha($data['senha'], $data['confirmacaoSenha']);

        if($camposVazios && $nome && $nascimento && $cargo && $status && $cpf && $senha)
        {
            return true;
        } else {
            return false;
        }
    }

    private function verificaCamposVazios($nome, $cpf, $nascimento, $cargo, $senha, $senhaConfirmacao)
    {
        if(empty($nome) || empty($cpf) || empty($nascimento) || empty($cargo) || empty($senha) || empty($senhaConfirmacao)){
            return false;
        } else {
            return true;
        }
    }
    
    private function verificaNome($nome)
    {
        if(strlen($nome) > 3)
        { 
            return true;
        } else {
            return false;
        }
    }
    
    private function verificaCpf($cpf)
    {
        //CHECAGEM DE CARACTERES ESPECIAIS DO CPF.
        if(!preg_match("/^[0-9]*$/", $cpf)) {
            return false;
        } else {
            //CHECAGEM DE TAMANHO DO CPF
            if(strlen($cpf) != 11) {
                return false;
            }  else {
                return true;
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
        if(strlen($senha) < 6) {
            if($senha != $senhaConfirmacao) {
                return false;
            }
        } else {
            return true;
        }
    }
}