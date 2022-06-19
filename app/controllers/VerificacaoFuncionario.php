<?php

namespace app\controllers;

use app\models\Funcionario;

abstract class VerificacaoFuncionario
{

    private $erros;
    private $valores;
    private $funcionario;

    protected function verificaCamposVazios($nome, $cpf, $nascimento, $cargo, $senha, $confirmacaoSenha, $status)
    {
        if(empty($nome) || empty($cpf) || empty($nascimento) || empty($cargo) || empty($senha) || empty($confirmacaoSenha) || empty($status)){
            return false;
        } else {
            return true;
        }
    }
    
    protected function verificaNome($nome)
    {
        if(strlen($nome) >= 3)
        {
            if(filter_var($nome, FILTER_SANITIZE_NUMBER_INT) == '')
            {
                return true;
            }
        } else {
            return false;
        }
    }
    
    protected function verificaCpf($cpf)
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

    protected function verificaNascimento($nascimento)
    {
        $hoje = date('Y-m-d');
        if(strtotime($nascimento) >= strtotime($hoje))
        {
            return false;
        } else {
            return true;
        }
    }

    protected function verificaCargo($cargo)
    {
        if($cargo >= 1)
        {
            return true;
        } else {
            return false;
        }
    }

    protected function verificaStatus($status)
    {
        if($status >= 1)
        {
            return true;
        } else {
            return false;
        }
    }

    protected function verificaSenha($senha, $senhaConfirmacao)
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