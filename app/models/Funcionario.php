<?php

namespace app\models;

use app\models\Conexao;

class Funcionario extends Conexao
{
    public function createFuncionario()
    {
        $nome = filter_input(INPUT_POST, 'entradaNomeFuncionario', FILTER_SANITIZE_SPECIAL_CHARS);
        $cpf = filter_input(INPUT_POST, 'entradaCpfFuncionario', FILTER_SANITIZE_SPECIAL_CHARS);
        $nascimento = filter_input(INPUT_POST, 'entradaNascimentoFuncionario', FILTER_SANITIZE_SPECIAL_CHARS);
        $cargo = filter_input(INPUT_POST, 'entradaCargoFuncionario', FILTER_SANITIZE_SPECIAL_CHARS);
        $status = filter_input(INPUT_POST, 'entradaStatusFuncionario', FILTER_SANITIZE_SPECIAL_CHARS);

        $senha = filter_input(INPUT_POST, 'entradaSenhaFuncionario', FILTER_SANITIZE_SPECIAL_CHARS);
        $confirmacao_senha = filter_input(INPUT_POST, 'entradaConfirmacaoSenhaFuncionario', FILTER_SANITIZE_SPECIAL_CHARS);

        if($senha == $confirmacao_senha)
        {
            $senha = password_hash($senha, PASSWORD_DEFAULT);
            $conexao = $this->realizaConexao();
            $sql = 'INSERT INTO funcionario(nome, cpf, senha, nascimento, cargo, status_funcionario) values(?, ?, ?, ?, ?, ?);';

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(1, $nome);
            $stmt->bindValue(2, $cpf);
            $stmt->bindValue(3, $senha);
            $stmt->bindValue(4, $nascimento);
            $stmt->bindValue(5, $cargo);
            $stmt->bindValue(6, $status);
            $stmt->execute();

            return $stmt;
        } else {
            return false;
        }
    }

    public function readCpfFuncionario($cpf)
    {
        $sql = 'SELECT cpf FROM funcionario WHERE cpf=?;';
        $conexao = $this->realizaConexao();

        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(1, $cpf);
        $stmt->execute();
        
        $resultado = $stmt->fetch();
        if(empty($resultado))
        {
            return true;
        } else {
            return false;
        }
    }

    public function readCpfFuncionarioAtualizacao($cpf)
    {
        $sql = 'SELECT cpf FROM funcionario WHERE cpf=?;';
        $conexao = $this->realizaConexao();

        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(1, $cpf);
        $stmt->execute();
        
        $resultado = $stmt->fetch();
        if(empty($resultado) || $resultado['cpf'] == $cpf)
        {
            return true;
        } else {
            return false;
        }
    }

    public function readFuncionario()
    {
        $conexao = $this->realizaConexao();
        $sql = 'SELECT id_funcionario, nome, cpf, nascimento, cargo.nomenclatura as cargo, status.nomenclatura as status_funcionario
        from funcionario 
        inner join cargo on cargo.id_cargo = funcionario.cargo 
        inner join status on status.id_status = funcionario.status_funcionario order by nome';

        $stmt = $conexao->prepare($sql);
        $stmt->execute();

        $resultado = $stmt->fetchAll();
        return $resultado;
    }

    public function readOnlyFuncionario()
    {
        $id = base64_decode(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS));
        $conexao = $this->realizaConexao();
        $sql = 'SELECT id_funcionario, nome, cpf, nascimento, cargo.nomenclatura as cargo, status.nomenclatura as status_funcionario
        from funcionario 
        inner join cargo on cargo.id_cargo = funcionario.cargo 
        inner join status on status.id_status = funcionario.status_funcionario where id_funcionario=?';
        
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();

        $resultado = $stmt->fetchAll();
        return $resultado;
    }

    public function updateFuncionario()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
        $nome = filter_input(INPUT_POST, 'entradaNomeFuncionario', FILTER_SANITIZE_SPECIAL_CHARS);
        $cpf = filter_input(INPUT_POST, 'entradaCpfFuncionario', FILTER_SANITIZE_SPECIAL_CHARS);
        $nascimento = filter_input(INPUT_POST, 'entradaNascimentoFuncionario', FILTER_SANITIZE_SPECIAL_CHARS);
        $cargo = filter_input(INPUT_POST, 'entradaCargoFuncionario', FILTER_SANITIZE_SPECIAL_CHARS);
        $status_funcionario = filter_input(INPUT_POST, 'entradaStatusFuncionario', FILTER_SANITIZE_SPECIAL_CHARS);

        $conexao = $this->realizaConexao();
        $sql = 'UPDATE funcionario SET nome=?,
        cpf=?, 
        nascimento=?, 
        cargo=?, 
        status_funcionario=? 
        WHERE id_funcionario=?;';

        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(1, $nome);
        $stmt->bindValue(2, $cpf);
        $stmt->bindValue(3, $nascimento);
        $stmt->bindValue(4, $cargo);
        $stmt->bindValue(5, $status_funcionario);
        $stmt->bindValue(6, $id);

        $stmt->execute();
    }

    public function updateStatusFuncionario($status, $id)
    {
        $sql = 'UPDATE funcionario SET status_funcionario=? WHERE id_funcionario=?;';
        $conexao = $this->realizaConexao();

        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(1, $status);
        $stmt->bindValue(2, $id);
        $stmt->execute();
    }

    public function deleteFuncionario()
    {
        $id = base64_decode(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS));
        $conexao = $this->realizaConexao();
        $sql = 'DELETE FROM funcionario WHERE id_funcionario=?;';

        $stmt = $conexao->prepare($sql);

        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt;
    }
}