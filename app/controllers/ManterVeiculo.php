<?php

namespace app\controllers;

use app\models\Veiculo;

class ManterVeiculo extends Veiculo
{
    public function cadastroVeiculo()
    {
        require_once __DIR__ . '/../views/veiculos/cadastro-veiculo.php';
    }

    public function registrarVeiculo()
    {
        $registra = $this->createVeiculo();
        header('Location:?router=ManterVeiculo/cadastroVeiculo');
    }

    public function consultaVeiculo()
    {
        $consulta = $this->readVeiculo();
        require_once __DIR__ . '/../views/veiculos/consulta-veiculos.php';
    }

    public function editaVeiculo()
    {
        $edita = $this->readOnlyVeiculo();
        require_once __DIR__ . '/../views/veiculos/edita-veiculo.php';
    }

    public function alterarRegistroVeiculo()
    {
        $this->updateVeiculo();
        header('Location:?router=ManterVeiculo/consultaVeiculo/');
    }

    public function deletaVeiculo()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
        $placa = filter_input(INPUT_GET, 'placa', FILTER_SANITIZE_SPECIAL_CHARS);
        require_once __DIR__ . '/../views/veiculos/deleta-veiculo.php';
    }

    public function deletarRegistroVeiculo()
    {
        $deleta = $this->deleteVeiculo();
        header('Location:?router=ManterVeiculo/consultaVeiculo');
    }
}