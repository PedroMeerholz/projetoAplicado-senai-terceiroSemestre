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

    public function createVeiculo()
    {
        $placa = filter_input(INPUT_POST, 'entradaPlacaVeiculo', FILTER_SANITIZE_SPECIAL_CHARS);
        $ano = filter_input(INPUT_POST, 'entradaAnoVeiculo', FILTER_SANITIZE_SPECIAL_CHARS);
        $autonomia = filter_input(INPUT_POST, 'entradaAutonomiaVeiculo', FILTER_SANITIZE_SPECIAL_CHARS);
        $modelo = filter_input(INPUT_POST, 'entradaModeloVeiculo', FILTER_SANITIZE_SPECIAL_CHARS);
        $status = filter_input(INPUT_POST, 'entradaStatusVeiculo', FILTER_SANITIZE_SPECIAL_CHARS);

        $conexao = $this->realizaConexao();
        $sql = 'INSERT INTO veiculo(placa, ano, autonomia, modelo, status_veiculo) values(?, ?, ?, ?, ?);';

        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(1, $placa);
        $stmt->bindValue(2, $ano);
        $stmt->bindValue(3, $autonomia);
        $stmt->bindValue(4, $modelo);
        $stmt->bindValue(5, $status);
        $stmt->execute();

        return $stmt;
    }

    public function readVeiculo()
    {
        $conexao = $this->realizaConexao();
        $sql = 'SELECT id_veiculo, placa, veiculo.modelo, ano, autonomia, status.nomenclatura as status_veiculo, caracteristicas_veiculo.modelo as modelo
        FROM veiculo INNER JOIN status ON status.id_status = veiculo.status_veiculo
        INNER JOIN caracteristicas_veiculo ON caracteristicas_veiculo.id_modelo = veiculo.modelo';

        $stmt = $conexao->prepare($sql);
        $stmt->execute();

        $resultado = $stmt->fetchAll();

        return $resultado;
    }

    public function deleteVeiculo()
    {
        $id = base64_decode(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS));

        $conexao = $this->realizaConexao();
        $sql = 'DELETE FROM veiculo where id_veiculo=?';

        $stmt = $conexao->prepare($sql);
        
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt;
    }
}