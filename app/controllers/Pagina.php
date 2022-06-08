<?php

namespace app\controllers;

use app\models\Crud;

class Pagina extends Crud
{
    public function login()
    {
        require_once __DIR__ . '/../views/login.php';
    }

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

    public function cadastroVeiculo()
    {
        require_once __DIR__ . '/../views/veiculos/cadastro-veiculo.php';
    }

    public function registrarVeiculo()
    {
        $registra = $this->createVeiculo();
        header('Location:?router=Pagina/cadastroVeiculo');
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
        header('Location:?router=Pagina/consultaVeiculo/');
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
        header('Location:?router=Pagina/consultaVeiculo');
    }

    public function aberturaChamado()
    {
        $consultaFuncionario = $this->consultaFuncionariosDisponiveis();
        $consultaVeiculo = $this->consultaVeiculosDisponiveis();
        require_once __DIR__ . '/../views/chamados/abertura-chamado.php';
    }

    public function registrarChamado()
    {
        $registra = $this->createChamado();
        header('Location:?router=Pagina/aberturaChamado/');
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
        header('Location:?router=Pagina/consultaChamado/');
    }

    public function deletaChamado()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
        require_once __DIR__ . '/../views/chamados/deleta-chamado.php';
    }

    public function deletarRegistroChamado()
    {
        $deleta = $this->deleteChamado();
        header('Location:?router=Pagina/consultaChamado/');
    }

    public function geraRelatorio()
    {
        require_once __DIR__ . '/../views/relatorio.php';
    }

    public function contato()
    {
        require_once __DIR__ . '/../views/contato.php';
    }
}