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
        require_once __DIR__ . '/../views/home.php';
    }

    public function cadastroFuncionario()
    {
        require_once __DIR__ . '/../views/funcionarios/cadastro-funcionario.php';
    }

    public function registrarFuncionario()
    {
        $registra = $this->createFuncionario();
        $this->cadastroFuncionario();
    }

    public function consultaFuncionario()
    {
        $consulta = $this->readFuncionario();
        require_once __DIR__ . '/../views/funcionarios/consulta-funcionario.php';
    }

    public function editaFuncionario()
    {
        $edita = $this->readOnlyFuncionario();
        require_once __DIR__ . '/../views/funcionarios/edita-funcionario.php';
    }

    public function alterarRegistroFuncionario()
    {
        $this->updateFuncionario();
        header('Location:?router=Pagina/consultaFuncionario/');
    }

    public function deletaFuncionario()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
        $nome = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        require_once __DIR__ . '/../views/funcionarios/deleta-funcionario.php';
    }

    public function deletarRegistroFuncionario()
    {
        $deleta = $this->deleteFuncionario();
        header('Location:?router=Pagina/consultaFuncionario/');
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
        require_once __DIR__ . '/../views/chamados/abertura-chamado.php';
    }

    public function consultaChamado()
    {
        require_once __DIR__ . '/../views/chamados/consulta-chamados.php';
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