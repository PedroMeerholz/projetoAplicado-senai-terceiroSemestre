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