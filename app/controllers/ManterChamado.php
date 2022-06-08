<?php

namespace app\controllers;

use app\models\Chamado;

class ManterChamado extends Chamado
{
    public function aberturaChamado()
    {
        $consultaFuncionario = $this->consultaFuncionariosDisponiveis();
        $consultaVeiculo = $this->consultaVeiculosDisponiveis();
        require_once __DIR__ . '/../views/chamados/abertura-chamado.php';
    }

    public function registrarChamado()
    {
        $registra = $this->createChamado();
        header('Location:?router=ManterChamado/aberturaChamado/');
    }

    public function consultaChamado()
    {
        $consulta = $this->readChamado();
        require_once __DIR__ . '/../views/chamados/consulta-chamados.php';
    }

    public function editaChamado()
    {
        $edita = $this->readOnlyChamado();
        require_once __DIR__ . '/../views/chamados/edita-chamado.php';
    }

    public function alterarRegistroChamado()
    {
        $this->updateChamado();
        header('Location:?router=ManterChamado/consultaChamado/');
    }

    public function deletaChamado()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
        require_once __DIR__ . '/../views/chamados/deleta-chamado.php';
    }

    public function deletarRegistroChamado()
    {
        $deleta = $this->deleteChamado();
        header('Location:?router=ManterChamado/consultaChamado/');
    }
}