<?php

namespace app\controllers;

use app\models\Funcionario;

class ManterFuncionario extends Funcionario
{
    public function cadastroFuncionario()
    {
        $valores = [];
        $erros = [];
        if(isset($_SESSION['valores']))
        {
            $valores = $_SESSION['valores'];
            $erros = $_SESSION['erros'];
        }
        require_once __DIR__ . '/../views/funcionarios/cadastro-funcionario.php';
        unset($_SESSION['valores']);
        unset($_SESSION['erros']);
    }

    public function registrarFuncionario()
    {
        $verificacao = new VerificacaoFuncionario;
        $verifica = $verificacao->verificaDadosCadastro();
        if($verifica)
        {
            $registra = $this->createFuncionario();
            echo "<script type='text/javascript'>
            function mostraMensagem(){
                if(confirm('Funcionário cadastrado com sucesso')){
                    window.location.href='?router=ManterFuncionario/cadastroFuncionario/';
                } else {
                    window.location.href='?router=ManterFuncionario/cadastroFuncionario/';
                }
            }
            mostraMensagem();
            </script>";
            unset($_SESSION['valores']);
            unset($_SESSION['erros']);
        } else {
            $erro = $_SESSION['erros'][0];
            echo "<script type='text/javascript'>
            function mostraMensagem(){
                if(confirm('". $erro ."')){
                    window.location.href='?router=ManterFuncionario/cadastroFuncionario/';
                } else {
                    window.location.href='?router=ManterFuncionario/cadastroFuncionario/';
                }
            }
            mostraMensagem();
            </script>";
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
        $edita = $this->updateFuncionario();
        header('Location:?router=ManterFuncionario/consultaFuncionario');
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