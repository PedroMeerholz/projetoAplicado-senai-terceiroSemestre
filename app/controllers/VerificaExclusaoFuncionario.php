<?php

namespace app\controllers;

use app\models\Conexao;

class VerificaExclusaoFuncionario extends Conexao
{
    public function verificaVinculoComChamado($id_funcionario)
    {
        $conexao = $this->realizaConexao();
        $sql = 'SELECT count(id_chamado) as chamados FROM chamado WHERE funcionario=?;';

        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(1, $id_funcionario);
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