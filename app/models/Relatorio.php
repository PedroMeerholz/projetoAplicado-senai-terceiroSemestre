<?php

namespace app\models;

use app\models\Conexao;

class Relatorio extends Conexao
{
    public function informacoesRelatorio()
    {
        $dataHoraInicial = $_POST['entradaDataInicial'];
        $dataHoraFinal = $_POST['entradaDataFinal'];

        $informacoes = array(
            'dataHoraInicial' => $dataHoraInicial,
            'dataHoraFinal' => $dataHoraFinal
        );

        return $informacoes;
    }

    public function consultaTotalDeChamados()
    {
        $dados = [
            'dataInicial' => $_POST['entradaDataInicial'],
            'dataFinal' => $_POST['entradaDataFinal']
        ];

        $conexao = $this->realizaConexao();
        $sql = "SELECT count(id_chamado) as total_chamados from chamado where status_chamado = 4 and data_chamado >= ? and data_chamado <= ?;";

        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(1, $dados['dataInicial']);
        $stmt->bindValue(2, $dados['dataFinal']);
        $stmt->execute();

        $resultado = $stmt->fetch();

        return $resultado['total_chamados'];
    }

    public function calculaDistanciaPercorrida()
    {
        $dados = [
            'dataInicial' => $_POST['entradaDataInicial'],
            'dataFinal' => $_POST['entradaDataFinal']
        ];

        $conexao = $this->realizaConexao();
        $sql = "SELECT sum(distancia) as distancia from chamado where status_chamado = 4 and data_chamado >= ? and data_chamado <= ?;";
        
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(1, $dados['dataInicial']);
        $stmt->bindValue(2, $dados['dataFinal']);
        $stmt->execute();

        $resultado = $stmt->fetch();

        return $resultado['distancia'];
    }

    public function calculaCarbonoEmitido()
    {
        $dados = [
            'dataInicial' => $_POST['entradaDataInicial'],
            'dataFinal' => $_POST['entradaDataFinal']
        ];

        $conexao = $this->realizaConexao();
        $sql = "SELECT sum(carbono) as carbono from chamado where status_chamado = 4 and data_chamado >= ? and data_chamado <= ?;";
    
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(1, $dados['dataInicial']);
        $stmt->bindValue(2, $dados['dataFinal']);
        $stmt->execute();

        $resultado = $stmt->fetch();

        return $resultado['carbono'];
    }

    public function calculaMediaCarbonoEmitido()
    {
        $carbono = $this->calculaCarbonoEmitido();
        $totalChamados = $this->consultaTotalDeChamados();
        $mediaCarbono =  $carbono / $totalChamados;

        return $mediaCarbono;
    }
    
    public function calculaMediaDistanciaPercorrida()
    {
        $mediaDistancia = $this->calculaDistanciaPercorrida() / $this->consultaTotalDeChamados();
        
        return $mediaDistancia;
    }
}