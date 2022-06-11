<?php

namespace app\controllers;

use app\models\Funcionario;

class ManterFuncionario extends Funcionario
{
    public function cadastroFuncionario()
    {
        require_once __DIR__ . '/../views/funcionarios/cadastro-funcionario.php';
    }

    public function registrarFuncionario()
    {
        $verificacao = new VerificacaoFuncionario;
        $verifica = $verificacao->verificaDados();
        if($verifica)
        {
            $registra = $this->createFuncionario();
            header('Location:?router=ManterFuncionario/cadastroFuncionario');
        } else {
            echo 'Erro funcionou';
        }
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
        header('Location:?router=ManterFuncionario/consultaFuncionario/');
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
        header('Location:?router=ManterFuncionario/consultaFuncionario/');
    }
}