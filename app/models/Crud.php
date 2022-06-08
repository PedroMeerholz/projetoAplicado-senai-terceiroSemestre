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

    public function consultaFuncionariosDisponiveis()
    {
        $conexao = $this->realizaConexao();
        
        $sql = 'SELECT id_funcionario, nome, cargo, cargo.nomenclatura as cargo FROM funcionario 
        INNER JOIN cargo ON id_cargo = funcionario.cargo WHERE status_funcionario = 1;';
        $stmt = $conexao->prepare($sql);
        $stmt->execute();

        $resultado = $stmt->fetchAll();
    
        return $resultado;
    }

    public function consultaVeiculosDisponiveis()
    {
        $conexao = $this->realizaConexao();

        $sql = 'SELECT id_veiculo, placa, autonomia, caracteristicas_veiculo.modelo as modelo FROM veiculo 
        INNER JOIN caracteristicas_veiculo ON caracteristicas_veiculo.id_modelo = veiculo.modelo 
        WHERE status_veiculo = 1;';

        $stmt = $conexao->prepare($sql);
        $stmt->execute();

        $resultado = $stmt->fetchAll();

        return $resultado;
    }

    public function createChamado()
    {
        $funcionario = filter_input(INPUT_POST, 'funcionarioSelecionado', FILTER_SANITIZE_SPECIAL_CHARS);
        $veiculo = filter_input(INPUT_POST, 'veiculoSelecionado', FILTER_SANITIZE_SPECIAL_CHARS);

        $conexao = $this->realizaConexao();
        $sql = 'INSERT INTO chamado(funcionario, veiculo, data_chamado, status_chamado) values(?, ?, now(), ?);';

        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(1, $funcionario);
        $stmt->bindValue(2, $veiculo);
        $stmt->bindValue(3, 3);
        $stmt->execute();

        return $stmt;
    }

    public function readChamado()
    {
        $conexao = $this->realizaConexao();
        $sql = 'SELECT id_chamado, data_chamado, funcionario.nome as funcionario, veiculo.placa as placa_veiculo, caracteristicas_veiculo.modelo as modelo_veiculo, status.nomenclatura as status_chamado, distancia, carbono 
        FROM chamado INNER JOIN funcionario ON funcionario.id_funcionario = chamado.funcionario 
        INNER JOIN veiculo ON veiculo.id_veiculo = chamado.veiculo
        INNER JOIN caracteristicas_veiculo ON caracteristicas_veiculo.id_modelo = veiculo.modelo 
        INNER JOIN status ON status.id_status = status_chamado;';

        $stmt = $conexao->prepare($sql);
        $stmt->execute();

        $resultado = $stmt->fetchAll();
        
        return $resultado;
    }

    public function readOnlyChamado()
    {
        $id = base64_decode(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS));
        $conexao = $this->realizaConexao();
        $sql = 'SELECT id_chamado, funcionario, veiculo, distancia, status.nomenclatura AS status_chamado FROM chamado 
        INNER JOIN status ON status.id_status=chamado.status_chamado WHERE id_chamado=?';

        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $resultado = $stmt->fetchAll();

        return $resultado;
    }

    public function updateChamado()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
        $distancia = filter_input(INPUT_POST, 'entradaDistanciaChamado', FILTER_SANITIZE_SPECIAL_CHARS);
        $status_chamado = filter_input(INPUT_POST, 'entradaStatusChamado', FILTER_SANITIZE_SPECIAL_CHARS);
        $sql_autonomia_veiculo = 'SELECT veiculo.autonomia FROM chamado INNER JOIN veiculo ON chamado.veiculo = id_veiculo WHERE id_chamado=?';
        
        $conexao = $this->realizaConexao();

        $stmt = $conexao->prepare($sql_autonomia_veiculo);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        $autonomia_veiculo = $stmt->fetch();
        $carbono = $this->calculaCarbono($distancia, $autonomia_veiculo['autonomia']);

        $sql_update = 'UPDATE chamado SET distancia=?, carbono=?, status_chamado=? WHERE id_chamado = ?';
        $stmt = $conexao->prepare($sql_update);
        $stmt->bindValue(1, $distancia);
        $stmt->bindValue(2, $carbono);
        $stmt->bindValue(3, $status_chamado);
        $stmt->bindValue(4, $id);
        $stmt->execute();
    }

    private function calculaCarbono($distancia, $autonomia)
    {
        $consumo_gasolina = $distancia / $autonomia;
        $emissao = $consumo_gasolina * 0.73 * 0.75 * 3.7;

        return $emissao;
    }

    public function deleteChamado()
    {
        $id = base64_decode(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS));

        $conexao = $this->realizaConexao();
        $sql = 'DELETE FROM chamado WHERE id_chamado = ?;';

        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt;
    }
}