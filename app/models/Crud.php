<?php

namespace app\models;

class Crud extends Conexao
{
    public function createFuncionario()
    {
        $nome = filter_input(INPUT_POST, 'entradaNomeFuncionario', FILTER_SANITIZE_SPECIAL_CHARS);
        $cpf = filter_input(INPUT_POST, 'entradaCpfFuncionario', FILTER_SANITIZE_SPECIAL_CHARS);
        $nascimento = filter_input(INPUT_POST, 'entradaNascimentoFuncionario', FILTER_SANITIZE_SPECIAL_CHARS);
        $cargo = filter_input(INPUT_POST, 'entradaCargoFuncionario', FILTER_SANITIZE_SPECIAL_CHARS);
        $status = filter_input(INPUT_POST, 'entradaStatusFuncionario', FILTER_SANITIZE_SPECIAL_CHARS);

        $conexao = $this->realizaConexao();
        $sql = 'INSERT INTO funcionario(nome, cpf, nascimento, cargo, status_funcionario) values(?, ?, ?, ?, ?);';

        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(1, $nome);
        $stmt->bindValue(2, $cpf);
        $stmt->bindValue(3, $nascimento);
        $stmt->bindValue(4, $cargo);
        $stmt->bindValue(5, $status);
        $stmt->execute();

        return $stmt;
    }

    public function readFuncionario()
    {
        $conexao = $this->realizaConexao();
        $sql = 'SELECT id_funcionario, nome, cpf, nascimento, cargo.nomenclatura as cargo, status.nomenclatura as status_funcionario
        from funcionario 
        inner join cargo on cargo.id_cargo = funcionario.cargo 
        inner join status on status.id_status = funcionario.status_funcionario';

        $stmt = $conexao->prepare($sql);
        $stmt->execute();

        $resultado = $stmt->fetchAll();
        return $resultado;
    }

    public function readOnly()
    {
        $id = base64_decode(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS));
        $conexao = $this->realizaConexao();
        $sql = 'SELECT * FROM funcionario WHERE id_funcionario=?';
        
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
        $sql = 'UPDATE funcionario SET nome=:nome,
        cpf=:cpf, 
        nascimento=:nascimento, 
        cargo=:cargo, 
        status_funcionario=:status_funcionario 
        WHERE id_funcionario=:id;';

        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':nome', $nome, \PDO::PARAM_STR);
        $stmt->bindParam(':cpf', $cpf, \PDO::PARAM_STR);
        $stmt->bindParam(':nascimento', $nascimento, \PDO::PARAM_STR);
        $stmt->bindParam(':cargo', $cargo, \PDO::PARAM_INT);
        $stmt->bindParam(':status_funcionario', $status_funcionario, \PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);

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