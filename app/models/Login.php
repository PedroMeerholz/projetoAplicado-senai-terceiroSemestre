<?php

namespace app\models;

class Login extends Conexao
{
    public function verificaLogin()
    {
        $cpf = filter_input(INPUT_POST, 'entradaCpf', FILTER_SANITIZE_SPECIAL_CHARS);
        $senha = filter_input(INPUT_POST, 'entradaSenha', FILTER_SANITIZE_SPECIAL_CHARS);

        if($this->verificaCpf($cpf))
        {
            if($this->verificaSenha($cpf, $senha))
            {
                $this->createSession($cpf);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }

        if($this->verificaCpf($cpf))
        {
            if($this->verificaSenha($cpf, $senha))
            {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    private function verificaCpf($cpf)
    {
        $sql = 'SELECT cpf FROM funcionario WHERE cpf=?;';

        $conexao = $this->realizaConexao();
        
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(1, $cpf);
        $stmt->execute();
        $resultado = $stmt->fetch();

        if($cpf == $resultado['cpf'])
        {
            return true;
        } else {
            return false;
        }
    }

    private function verificaSenha($cpf, $senha)
    {
        $sql = 'SELECT senha FROM funcionario WHERE cpf=?;';

        $conexao = $this->realizaConexao();

        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(1, $cpf);
        $stmt->execute();
        $resultado = $stmt->fetch();

        if(password_verify($senha, $resultado['senha']))
        {
            echo $resultado['senha'];
            return true;
        } else {
            return false;
        }
    }

    private function createSession($cpf) {
        $sql = 'SELECT nome FROM funcionario WHERE cpf=?;';
        
        $conexao = $this->realizaConexao();
        
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(1, $cpf);
        $stmt->execute();
        $resultado = $stmt->fetch();

        $_SESSION['nome'] = $resultado['nome'];
    }
}