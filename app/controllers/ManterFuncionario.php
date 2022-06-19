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
        $verificacao = new VerificacaoCadastroFuncionario;
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
        $verificacao = new VerificacaoEdicaoFuncionario;
        $verifica = $verificacao->verificaDadosEdicao();
        if($verifica)
        {
            $atualiza = $this->updateFuncionario();
            echo "<script type='text/javascript'>
            function mostraMensagem(){
                if(confirm('Funcionário atualizado com sucesso')){
                    window.location.href='?router=ManterFuncionario/consultaFuncionario/';
                } else {
                    window.location.href='?router=ManterFuncionario/consultaFuncionario/';
                }
            }
            mostraMensagem();
            </script>";
        } else {
            $erro = $_SESSION['erros'][0];
            echo "<script type='text/javascript'>
            function mostraMensagem(){
                if(confirm('". $erro ."')){
                    window.location.href='?router=ManterFuncionario/consultaFuncionario/';
                } else {
                    window.location.href='?router=ManterFuncionario/consultaFuncionario/';
                }
            }
            mostraMensagem();
            </script>";
        }
    }

    public function deletaFuncionario()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
        $nome = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        require_once __DIR__ . '/../views/funcionarios/deleta-funcionario.php';
    }

    public function deletarRegistroFuncionario()
    {
        $verificacao = new VerificaExclusaoFuncionario;
        $verifica = $verificacao->verificaVinculoComChamado(base64_decode(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS)));
        if($verifica)
        {
            $deleta = $this->deleteFuncionario();
            echo "<script type='text/javascript'>
            function mostraMensagem(){
                if(confirm('Funcionário deletado com sucesso')){
                    window.location.href='?router=ManterFuncionario/consultaFuncionario/';
                } else {
                    window.location.href='?router=ManterFuncionario/consultaFuncionario/';
                }
            }
            mostraMensagem();
            </script>";
        } else {
            echo "<script type='text/javascript'>
            function mostraMensagem(){
                if(confirm('O funcionário selecionado não pode ser excluído pois está vinculado a algum chamado')){
                    window.location.href='?router=ManterFuncionario/consultaFuncionario/';
                } else {
                    window.location.href='?router=ManterFuncionario/consultaFuncionario/';
                }
            }
            mostraMensagem();
            </script>";
        }
    }
}