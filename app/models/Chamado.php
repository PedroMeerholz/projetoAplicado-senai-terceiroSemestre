<?php

namespace app\models;

class Chamado extends Conexao
{
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

        $atualizaFuncionario = new Funcionario;
        $atualizaFuncionario->updateStatusFuncionario(2, $funcionario);

        $atualizaVeiculo = new Veiculo;
        $atualizaVeiculo->updateStatusVeiculo(2, $veiculo);

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

        if($status_chamado == 4)
        {
            $this->chamaStoredProcedureChamadoFinalizado($id);
        }
    }

    public function verificaFuncionarioAlocado($id_chamado)
    {
        $sql = 'SELECT funcionario FROM chamado WHERE id_chamado=?;';
        $conexao = $this->realizaConexao();

        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(1, $id_chamado);
        $stmt->execute();

        $resultado = $stmt->fetch();
        return $resultado;
    }

    public function verificaVeiculoAlocado($id_chamado)
    {
        $sql = 'SELECT veiculo FROM chamado WHERE id_chamado=?;';
        $conexao = $this->realizaConexao();

        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(1, $id_chamado);
        $stmt->execute();

        $resultado = $stmt->fetch();
        return $resultado;
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
        $this->chamaStoredProcedureChamadoDeletado($id);
    }

    public function chamaStoredProcedureChamadoFinalizado($id)
    {
        $conexao = $this->realizaConexao();
        $stmt = $conexao->prepare('call `atualiza_status-chamado_finalizado`(?, ?);');
        $stmt->bindValue(1, $id);
        $stmt->bindValue(2, 1);
        $stmt->execute();
    }

    public function chamaStoredProcedureChamadoDeletado($id)
    {
        $conexao = $this->realizaConexao();
        $stmt = $conexao->prepare('call `atualiza_status-chamado_deletado`(?, ?);');
        $stmt->bindValue(1, $id);
        $stmt->bindValue(2, 1);
        $stmt->execute();
    }
}