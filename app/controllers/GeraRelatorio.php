<?php

namespace app\controllers;

use app\models\Relatorio;

class GeraRelatorio extends Relatorio
{
    public function geraRelatorio()
    {
        require_once __DIR__ . '/../views/relatorio.php';
    }

    public function montaRelatorio()
    {
        $dataHoraInicial = $this->informacoesRelatorio();
        $dataHoraFinal = $this->informacoesRelatorio();
        $dataHoraInicial = $dataHoraInicial['dataHoraInicial'];
        $dataHoraFinal = $dataHoraFinal['dataHoraFinal'];

        if($this->verificaDatas(strtotime($dataHoraInicial), strtotime($dataHoraFinal)) == false)
        {
            echo "<script type='text/javascript'>
            function mostraMensagem(){
                if(confirm('Verifique as datas digitadas\\n\\nA data inicial não pode ser maior que a data final\\nA data final não pode ser menor que a data inicial')) {
                    window.location.href='?router=GeraRelatorio/geraRelatorio/';
                } else {
                    window.location.href='?router=GeraRelatorio/geraRelatorio/';
                }
            }
            mostraMensagem();
            </script>";
        }

        $totalDeChamados = $this->consultaTotalDeChamados();
        $distanciaTotalPercorrida = number_format($this->calculaDistanciaPercorrida(), 2);
        $carbonoTotalEmitido = number_format($this->calculaCarbonoEmitido(), 2);
        $mediaCarbonoEmitido = number_format($this->calculaMediaCarbonoEmitido(), 2);     
        $mediaDistanciaPercorrida = number_format($this->calculaMediaDistanciaPercorrida(), 2);
        $dataRelatorio = date('d-m-Y');
        $usuario = $_SESSION['nome'];
        require_once __DIR__ . '/../views/relatorio/relatorio.php';
    }

    private function verificaDatas($dataHoraInicial, $dataHoraFinal)
    {
        if($this->verificaDataHora($dataHoraInicial, $dataHoraFinal))
        {
            if($dataHoraInicial < $dataHoraFinal)
            {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    private function verificaDataHora($dataHoraInicial, $dataHoraFinal)
    {
        $hoje = date('Y-m-d h:i:s');
        if($dataHoraInicial >= strtotime($hoje) || $dataHoraFinal >= strtotime($hoje))
        {
            return false;
        } else {
            return true;
        }
    }
}