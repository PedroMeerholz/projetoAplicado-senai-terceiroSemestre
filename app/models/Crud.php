<?php

namespace app\models;

class Crud extends Conexao
{
    public function totalFuncionarios()
    {
        $conexao = $this->realizaConexao();
        $sql = 'SELECT COUNT(id_funcionario) AS total_funcionarios FROM funcionario';

        $stmt = $conexao->prepare($sql);
        $stmt->execute();

        $resultado = $stmt->fetch();
        $resultado = $resultado['total_funcionarios'];

        return $resultado;
    }

    public function funcionariosDisponiveis()
    {
        $conexao = $this->realizaConexao();
        $sql = 'SELECT COUNT(id_funcionario) AS funcionarios_disponiveis FROM funcionario WHERE status_funcionario=1';

        $stmt = $conexao->prepare($sql);
        $stmt->execute();

        $resultado = $stmt->fetch();
        $resultado = $resultado['funcionarios_disponiveis'];

        return $resultado;
    }

    public function funcionariosIndisponiveis()
    {
        $conexao = $this->realizaConexao();
        $sql = 'SELECT COUNT(id_funcionario) AS funcionarios_indisponiveis FROM funcionario WHERE status_funcionario=2';

        $stmt = $conexao->prepare($sql);
        $stmt->execute();

        $resultado = $stmt->fetch();
        $resultado = $resultado['funcionarios_indisponiveis'];

        return $resultado;
    }

    public function totalVeiculos()
    {
        $conexao = $this->realizaConexao();
        $sql = 'SELECT COUNT(id_veiculo) AS total_veiculos FROM veiculo;';

        $stmt = $conexao->prepare($sql);
        $stmt->execute();

        $resultado = $stmt->fetch();
        $resultado = $resultado['total_veiculos'];

        return $resultado;
    }

    public function veiculosDisponiveis()
    {
        $conexao = $this->realizaConexao();
        $sql = 'SELECT COUNT(id_veiculo) AS veiculos_disponiveis FROM veiculo WHERE status_veiculo=1;';

        $stmt = $conexao->prepare($sql);
        $stmt->execute();

        $resultado = $stmt->fetch();
        $resultado = $resultado['veiculos_disponiveis'];

        return $resultado;
    }

    public function veiculosIndisponiveis()
    {
        $conexao = $this->realizaConexao();
        $sql = 'SELECT COUNT(id_veiculo) AS veiculos_indisponiveis FROM veiculo WHERE status_veiculo=2;';

        $stmt = $conexao->prepare($sql);
        $stmt->execute();

        $resultado = $stmt->fetch();
        $resultado = $resultado['veiculos_indisponiveis'];

        return $resultado;
    }

    public function chamadosDisponiveis()
    {
        $conexao = $this->realizaConexao();
        $sql = 'SELECT COUNT(id_chamado) AS total_chamados FROM chamado;';

        $stmt = $conexao->prepare($sql);
        $stmt->execute();

        $resultado = $stmt->fetch();
        $resultado = $resultado['total_chamados'];

        return $resultado;
    }

    public function chamadosEmAberto()
    {
        $conexao = $this->realizaConexao();
        $sql = 'SELECT COUNT(id_chamado) AS chamados_abertos FROM chamado WHERE status_chamado=3';

        $stmt = $conexao->prepare($sql);
        $stmt->execute();

        $resultado = $stmt->fetch();
        $resultado = $resultado['chamados_abertos'];

        return $resultado;
    }

    public function chamadosFinalizados()
    {
        $conexao = $this->realizaConexao();
        $sql = 'SELECT COUNT(id_chamado) AS chamados_finalizados FROM chamado WHERE status_chamado=4';

        $stmt = $conexao->prepare($sql);
        $stmt->execute();

        $resultado = $stmt->fetch();
        $resultado = $resultado['chamados_finalizados'];

        return $resultado;   
    }

    public function carbonoEmitido()
    {
        $conexao = $this->realizaConexao();
        $sql = 'SELECT sum(carbono) as carbono from chamado;';

        $stmt = $conexao->prepare($sql);
        $stmt->execute();

        $resultado = $stmt->fetch();
        $resultado = $resultado['carbono'];

        return $resultado;
    }

    public function maiorVeiculoEmissor()
    {
        $conexao = $this->realizaConexao();
        $sql = 'SELECT veiculo.placa AS veiculo, sum(carbono) AS carbono FROM chamado 
        INNER JOIN veiculo ON veiculo.id_veiculo=chamado.veiculo 
        GROUP BY veiculo ORDER BY carbono DESC LIMIT 1;';

        $stmt = $conexao->prepare($sql);
        $stmt->execute();

        $resultado = $stmt->fetchAll();

        return $resultado;
    }

    public function maiorFuncionarioEmissor()
    {
        $conexao = $this->realizaConexao();
        $sql = 'SELECT funcionario.nome AS funcionario, sum(carbono) AS carbono FROM chamado 
        INNER JOIN funcionario ON funcionario.id_funcionario=chamado.funcionario 
        GROUP BY funcionario ORDER BY carbono DESC LIMIT 1;';

        $stmt = $conexao->prepare($sql);
        $stmt->execute();

        $resultado = $stmt->fetchAll();

        return $resultado;
    }
}