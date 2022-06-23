<?php

namespace app\controllers;

use app\models\Relatorio;

class GeraRelatorio extends Relatorio
{
    public function montaRelatorio()
    {
        $dataHoraInicial = $this->informacoesRelatorio();
        $dataHoraFinal = $this->informacoesRelatorio();
        $dataHoraInicial = $dataHoraInicial['dataHoraInicial'];
        $dataHoraFinal = $dataHoraFinal['dataHoraFinal'];
        $totalDeChamados = $this->consultaTotalDeChamados();
        $distanciaTotalPercorrida = number_format($this->calculaDistanciaPercorrida(), 2);
        $carbonoTotalEmitido = number_format($this->calculaCarbonoEmitido(), 2);
        $mediaCarbonoEmitido = number_format($this->calculaMediaCarbonoEmitido(), 2);
        $mediaDistanciaPercorrida = number_format($this->calculaMediaDistanciaPercorrida(), 2);
        $dataRelatorio = date('d-m-Y');
        $usuario = $_SESSION['nome'];
        require_once __DIR__ . '/../views/relatorio/relatorio.php';
    }
}