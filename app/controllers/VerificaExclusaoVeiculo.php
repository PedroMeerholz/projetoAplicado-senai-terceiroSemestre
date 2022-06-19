<?php

namespace app\controllers;

use app\models\Conexao;

class VerificaExclusaoVeiculo extends Conexao
{
    public function verificaVinculoComChamado($id_veiculo)
    {
        $conexao = $this->realizaConexao();
        $sql = 'SELECT count(id_chamado) as chamados FROM chamado WHERE veiculo=?;';

        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(1, $id_veiculo);
        $stmt->execute();

        $resultado = $stmt->fetch();
        if($resultado['chamados'] == 0)
        {
            return true;
        } else {
            return false;
        }
    }
}