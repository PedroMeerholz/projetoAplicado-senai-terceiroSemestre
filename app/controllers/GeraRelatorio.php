<?php

namespace app\controllers;

use app\models\Relatorio;
use Dompdf\Dompdf;
use \Mpdf\Mpdf;

class GeraRelatorio extends Relatorio
{
    private $dataHoraInicial;
    private $dataHoraFinal;
    private $totalDeChamados;
    private $distanciaTotalPercorrida;
    private $carbonoTotalEmitido;
    private $mediaCarbonoEmitido;
    private $mediaDistanciaPercorrida;
    private $dataRelatorio;
    private $usuario;

    private function setInformacoes()
    {
        $dataHoraInicial = $this->informacoesRelatorio();
        $dataHoraFinal = $this->informacoesRelatorio();
        $this->dataHoraInicial = $dataHoraInicial['dataHoraInicial'];
        $this->dataHoraFinal = $dataHoraFinal['dataHoraFinal'];
        $this->totalDeChamados = $this->consultaTotalDeChamados();
        $this->distanciaTotalPercorrida = number_format($this->calculaDistanciaPercorrida(), 2);
        $this->carbonoTotalEmitido = number_format($this->calculaCarbonoEmitido(), 2);
        $this->mediaCarbonoEmitido = number_format($this->calculaMediaCarbonoEmitido(), 2);
        $this->mediaDistanciaPercorrida = number_format($this->calculaMediaDistanciaPercorrida(), 2);
        $this->dataRelatorio = date('d-m-Y');
        $this->usuario = $_SESSION['nome'];
    }

    public function montaRelatorio()
    {
        // $this->setInformacoes();
        
        $mpdf = new mPDF();
        $mpdf->WriteHTML(
        "hello");
        $mpdf->Output();
    }
}