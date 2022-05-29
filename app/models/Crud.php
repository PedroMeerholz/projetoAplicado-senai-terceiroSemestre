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
}