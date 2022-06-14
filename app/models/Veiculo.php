<?php

namespace app\models;

class Veiculo extends Conexao
{
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

    public function readPlacaVeiculo($placa)
    {
        $sql = 'SELECT placa FROM veiculo WHERE placa=?';
        $conexao = $this->realizaConexao();

        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(1, $placa);
        $stmt->execute();

        $resultado = $stmt->fetch();
        if(empty($resultado))
        {
            return true;
        } else {
            return false;
        }
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

    public function readOnlyVeiculo()
    {
        $id = base64_decode(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS));
        $conexao = $this->realizaConexao();
        $sql = 'SELECT * FROM veiculo WHERE id_veiculo=?';
        $sql = 'SELECT id_veiculo, placa, ano, autonomia, caracteristicas_veiculo.modelo as modelo, status.nomenclatura as status_veiculo
        FROM veiculo INNER JOIN caracteristicas_veiculo ON id_modelo = veiculo.modelo INNER JOIN status ON id_status = status_veiculo 
        WHERE id_veiculo = ?';

        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $resultado = $stmt->fetchAll();

        return $resultado;
    }

    public function updateVeiculo()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
        $placa = filter_input(INPUT_POST, 'entradaPlacaVeiculo', FILTER_SANITIZE_SPECIAL_CHARS);
        $ano = filter_input(INPUT_POST, 'entradaAnoVeiculo', FILTER_SANITIZE_SPECIAL_CHARS);
        $autonomia = filter_input(INPUT_POST, 'entradaAutonomiaVeiculo', FILTER_SANITIZE_SPECIAL_CHARS);
        $modelo = filter_input(INPUT_POST, 'entradaModeloVeiculo', FILTER_SANITIZE_SPECIAL_CHARS);
        $status = filter_input(INPUT_POST, 'entradaStatusVeiculo', FILTER_SANITIZE_SPECIAL_CHARS);

        $conexao = $this->realizaConexao(); 
        $sql = 'UPDATE veiculo SET placa=?, ano=?, autonomia=?, modelo=?, status_veiculo=? WHERE id_veiculo=?';

        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(1, $placa);
        $stmt->bindValue(2, $ano);
        $stmt->bindValue(3, $autonomia);
        $stmt->bindValue(4, $modelo);
        $stmt->bindValue(5, $status);
        $stmt->bindValue(6, $id);
        $stmt->execute();
    }

    public function updateStatusVeiculo($status, $id)
    {
        $sql = 'UPDATE veiculo SET status_veiculo=? WHERE id_veiculo=?;';
        $conexao = $this->realizaConexao();

        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(1, $status);
        $stmt->bindValue(2, $id);
        $stmt->execute();
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