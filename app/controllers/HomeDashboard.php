<?php

namespace app\controllers;

use app\models\Home;

class HomeDashboard extends Home
{
    public function home()
    {
        $total_funcionarios = $this->totalFuncionarios();
        $funcionarios_disponiveis = $this->funcionariosDisponiveis();
        $funcionarios_indisponiveis = $this->funcionariosIndisponiveis();

        $total_veiculos = $this->totalVeiculos();
        $veiculos_disponiveis = $this->veiculosDisponiveis();
        $veiculos_indisponiveis = $this->veiculosIndisponiveis();

        $total_chamados = $this->chamadosDisponiveis();
        $chamados_abertos = $this->chamadosEmAberto();
        $chamados_finalizados = $this->chamadosFinalizados();

        $carbono_emitido = $this->carbonoEmitido();
        $maior_veiculo_emissor = $this->maiorVeiculoEmissor();
        $maior_funcionario_emissor = $this->maiorFuncionarioEmissor();

        require_once __DIR__ . '/../views/home.php';
    }
}