<?php

namespace app\controllers;

use app\models\Relatorio;
use Dompdf\Dompdf;

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
        $this->setInformacoes();

        $dompdf = new Dompdf();
    
        $dompdf->loadHtml(
            "<style>
                body {
                    margin-top: 5%; 
                    margin-right: 15%; 
                    margin-bottom: 5%; 
                    margin-left: 15%; 
                    text-align: center;
                }

                #informacoes-dos-chamados p {
                    margin-bottom: 2%; 
                    margin-left: 5%
                }

                hr {
                    margin-top: 10%; 
                    margin-bottom: 2%;
                }

                h1 {
                    text-align: center;
                    font-size: 28px;
                    font-weight: bolder;
                    margin-bottom: 4%;
                }

                #informacoes-dos-chamados {
                    margin-bottom: 10%;
                    text-align: center;
                }
            </style>
            <body>
                <div>
                    <h1>Relatório de Chamados</h1>
                    <p style='margin-left: 5%'>Data Inicial: $this->dataHoraInicial</p>
                    <p style='margin-left: 5%'>Data Final: $this->dataHoraFinal</p>
                </div>
                <hr>
                <div id='informacoes-dos-chamados'>
                    <h2>Informações dos chamados<br>dentro do período especificado</h2>
                    <p>Número Total de Chamados: $this->totalDeChamados</p>
                    <p>Distância Total Percorrida: $this->distanciaTotalPercorrida</p>
                    <p>Média de Distância por Chamado: $this->mediaDistanciaPercorrida</p>
                    <p>Total de CO2 emitido: $this->carbonoTotalEmitido</p>
                    <p>Média de CO2 emitido por Chamado: $this->mediaCarbonoEmitido</p>
                </div>
                <hr>
                <p>Relatório Gerado em: $this->dataRelatorio</p>
                <p>Relatório Gerado por: $this->usuario</p>
            </body>", 'UTF-8'
        );

        $dompdf->setPaper('A4');

        $dompdf->render();
        ob_clean();
        // header('Content-type: application/pdf');
        $dompdf->stream("Relatório - $this->dataRelatorio.pdf");
        // exit(0);
    }
}