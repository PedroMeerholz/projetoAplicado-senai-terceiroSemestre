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
        echo "<script type='text/javascript'>
            function mostraMensagem(){
                if(confirm('Chamado aberto com sucesso')){
                    window.location.href='?router=ManterChamado/aberturaChamado/';
                } else {
                    window.location.href='?router=ManterChamado/aberturaChamado/';
                }
            }
            mostraMensagem();
            </script>";
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
        $atualiza = $this->updateChamado();
        if($atualiza)
        {
            echo "<script type='text/javascript'>
            function mostraMensagem(){
                if(confirm('Chamado atualizado com sucesso')){
                    window.location.href='?router=ManterChamado/consultaChamado/';
                } else {
                    window.location.href='?router=ManterChamado/consultaChamado/';
                }
            }
            mostraMensagem();
            </script>";
        }
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