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
            $this->procedureChamadoFinalizado($id);
            return true;
        } else if($status_chamado == 3) {
            return true;
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
        $this->procedureChamadoDeletado($id);
    }

    public function procedureChamadoFinalizado($id)
    {
        $conexao = $this->realizaConexao();

        $this->alteraStatusFuncionarioAlocado($id);
        $this->alteraStatusVeiculoAlocado($id);
                
        $stmt = $conexao->prepare('UPDATE chamado SET status_chamado=4 WHERE id_chamado=?;');
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }

    public function procedureChamadoDeletado($id)
    {
        $conexao = $this->realizaConexao();
        
        $this->alteraStatusFuncionarioAlocado($id);
        $this->alteraStatusVeiculoAlocado($id);

        $stmt = $conexao->prepare('DELETE FROM chamado WHERE id_chamado=?;');
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }

    private function alteraStatusFuncionarioAlocado($id)
    {
        $conexao = $this->realizaConexao();

        $sql_idFuncionario = 'SELECT funcionario FROM chamado WHERE id_chamado=?;';
        $stmt_idFuncionario = $conexao->prepare($sql_idFuncionario);
        $stmt_idFuncionario->bindValue(1, $id);
        $stmt_idFuncionario->execute();
        $id_funcionario = $stmt_idFuncionario->fetch();
        $id_funcionario = $id_funcionario['funcionario'];

        $sql_updateFuncionario = 'UPDATE funcionario SET status_funcionario=1 WHERE id_funcionario=?;';
        $stmt_idFuncionario = $conexao->prepare($sql_updateFuncionario);
        $stmt_idFuncionario->bindValue(1, $id_funcionario);
        $stmt_idFuncionario->execute();
    }

    private function alteraStatusVeiculoAlocado($id)
    {
        $conexao = $this->realizaConexao();

        $sql_idVeiculo = 'SELECT veiculo FROM chamado WHERE id_chamado=?;';
        $stmt_idVeiculo = $conexao->prepare($sql_idVeiculo);
        $stmt_idVeiculo->bindValue(1, $id);
        $stmt_idVeiculo->execute();
        $id_veiculo = $stmt_idVeiculo->fetch();
        $id_veiculo = $id_veiculo['veiculo'];

        $sql_updateVeiculo = 'UPDATE veiculo SET status_veiculo=1 WHERE id_veiculo=?;';
        $stmt_idFuncionario = $conexao->prepare($sql_updateVeiculo);
        $stmt_idFuncionario->bindValue(1, $id_veiculo);
        $stmt_idFuncionario->execute();
    }
}