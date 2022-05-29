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

    public function consultaFuncionarioRegistrado()
    {
        $consulta = $this->readFuncionario();
    }

    public function cadastroVeiculo()
    {
        require_once __DIR__ . '/../views/veiculos/cadastro-veiculo.php';
    }

    public function consultaVeiculo()
    {
        require_once __DIR__ . '/../views/veiculos/consulta-veiculos.php';
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