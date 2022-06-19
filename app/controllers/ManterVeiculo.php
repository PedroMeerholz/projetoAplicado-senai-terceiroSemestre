<?php

namespace app\controllers;

use app\models\Veiculo;

class ManterVeiculo extends Veiculo
{
    public function cadastroVeiculo()
    {
        $valores = [];
        $erros = [];
        if(isset($_SESSION['valoresVeiculo']))
        {
            $valores = $_SESSION['valoresVeiculo'];
            $erros = $_SESSION['errosVeiculo'];
        }
        require_once __DIR__ . '/../views/veiculos/cadastro-veiculo.php';
        unset($_SESSION['valoresVeiculo']);
        unset($_SESSION['errosVeiculo']);
    }

    public function registrarVeiculo()
    {
        $verificacao = new VerificacaoVeiculo;
        $verifica = $verificacao->verificaDados();
        if($verifica)
        {
            $registra = $this->createVeiculo();
            echo "<script type='text/javascript'>
            function mostraMensagem(){
                if(confirm('Veículo cadastrado com sucesso')){
                    window.location.href='?router=ManterVeiculo/cadastroVeiculo/';
                } else {
                    window.location.href='?router=ManterVeiculo/cadastroVeiculo/';
                }
            }
            mostraMensagem();
            </script>";
            unset($_SESSION['valoresVeiculo']);
            unset($_SESSION['errosVeiculo']);
        } else {
            $erro = $_SESSION['errosVeiculo'][0];
            echo "<script type='text/javascript'>
            function mostraMensagem(){
                if(confirm('". $erro ."')){
                    window.location.href='?router=ManterVeiculo/cadastroVeiculo/';
                } else {
                    window.location.href='?router=ManterVeiculo/cadastroVeiculo/';
                }
            }
            mostraMensagem();
            </script>";
        }
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
        $verificacao = new VerificacaoVeiculo;
        $verifica = $verificacao->verificaDados();
        if($verifica)
        {
            $registra = $this->updateVeiculo();
            echo "<script type='text/javascript'>
            function mostraMensagem(){
                if(confirm('Veículo atualizado com sucesso')){
                    window.location.href='?router=ManterVeiculo/consultaVeiculo/';
                } else {
                    window.location.href='?router=ManterVeiculo/consultaVeiculo/';
                }
            }
            mostraMensagem();
            </script>";
            unset($_SESSION['valoresVeiculoUpdate']);
            unset($_SESSION['errosVeiculoUpdate']);
        } else {
            $erro = $_SESSION['errosVeiculoUpdate'][0];
            echo "<script type='text/javascript'>
            function mostraMensagem(){
                if(confirm('". $erro ."')){
                    window.location.href='?router=ManterVeiculo/consultaVeiculo/';
                } else {
                    window.location.href='?router=ManterVeiculo/consultaVeiculo/';
                }
            }
            mostraMensagem();
            </script>";
        }
    }

    public function deletaVeiculo()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
        $placa = filter_input(INPUT_GET, 'placa', FILTER_SANITIZE_SPECIAL_CHARS);
        require_once __DIR__ . '/../views/veiculos/deleta-veiculo.php';
    }

    public function deletarRegistroVeiculo()
    {
        $verificacao = new VerificaExclusaoVeiculo;
        $verifica = $verificacao->verificaVinculoComChamado(base64_decode(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS)));
        if($verifica)
        {
            $deleta = $this->deleteVeiculo();
            echo "<script type='text/javascript'>
            function mostraMensagem(){
                if(confirm('Veículo deletado com sucesso')){
                    window.location.href='?router=ManterVeiculo/consultaVeiculo/';
                } else {
                    window.location.href='?router=ManterVeiculo/consultaVeiculo/';
                }
            }
            mostraMensagem();
            </script>";
        } else {
            echo "<script type='text/javascript'>
            function mostraMensagem(){
                if(confirm('O veículo selecionado não pode ser excluído pois está vinculado a algum chamado')){
                    window.location.href='?router=ManterVeiculo/consultaVeiculo/';
                } else {
                    window.location.href='?router=ManterVeiculo/consultaVeiculo/';
                }
            }
            mostraMensagem();
            </script>";
        }
    }
}