<?php

namespace app\controllers;

class VerificacaoVeiculo
{
    protected $erros;
    protected $valores;
    protected $veiculo;

    public function verificaDadosCadastro()
    {
        if($this->verificaCamposCadastro())
        {
            return true;
        } else {
            return false;
        }
    }

    public function verificaCamposCadastro()
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $dados = [
            'placa' => trim($_POST['entradaPlacaVeiculo']),
            'ano' => trim($_POST['entradaAnoVeiculo']),
            'autonomia' => trim($_POST['entradaAutonomiaVeiculo']),
            'modelo' => empty($_POST['entradaModeloVeiculo']) ? -1 : $_POST['entradaModeloVeiculo'],
            'status' => empty(trim($_POST['entradaStatusVeiculo'])) ? -1 : trim($_POST['entradaStatusVeiculo'])
        ];

        $camposNaoVazios = $this->verificaCamposVazios($dados['placa'], $dados['ano'], $dados['autonomia'], $dados['modelo'], $dados['status']);
        $placa = $this->verificaPlaca($dados['placa']);
        $ano = $this->verificaAno($dados['ano']);
        $autonomia = $this->verificaAutonomia(['autonomia']);
        $modelo = $this->verificaModelo($dados['modelo']);
        $status = $this->verificaStatus($dados['status']);

        $this->erros = [];
        $this->valores = [];

        if(!$camposNaoVazios)
        {
            array_push($this->erros, 'Preencha todos os campos');
        }

        if($placa)
        {
            array_push($this->valores, $dados['placa']);
        } else {
            array_push($this->erros, 'Preencha corretamente a placa do veículo\n\nA placa deve estar no padrão ABC1D23');
            array_push($this->valores, $dados['placa']);
        }

        if($ano)
        {
            array_push($this->valores, $dados['ano']);
        } else {
            array_push($this->erros, 'Preencha corretamente o ano do veículo\n\nO ano do veículo deve ser igual ou inferior ao ano atual');
            array_push($this->valores, $dados['ano']);
        }

        if($autonomia)
        {
            array_push($this->valores, $dados['autonomia']);
        } else {
            array_push($this->erros, 'Preencha corretamente a autonomia do veículo\n\nA autonomia deve ser um valor entre 1 e 99.99');
            array_push($this->valores, $dados['autonomia']);
        }

        if($modelo == false)
        {
            array_push($this->erros, 'Selecione o modelo do veículo');
        }

        if($status == false)
        {
            array_push($this->erros, 'Selecione o status do veículo');
        }

        if(empty($this->erros))
        {
            return true;
        } else {
            $_SESSION['valoresVeiculo'] = $this->valores;
            $_SESSION['errosVeiculo'] = $this->erros;
            return false;
        }
    }

    private function verificaCamposVazios($placa, $ano, $autonomia, $modelo, $status)
    {
        if(empty($placa) || empty($ano) || empty($autonomia) || empty($modelo) || empty($status)){
            return false;
        } else {
            return true;
        }
    }

    private function verificaPlaca($placa)
    {
        if(strlen($placa) == 7)
        {
            return true;
        } else {
            return false;
        }
    }

    private function verificaAno($ano)
    {
        $anoAtual = date('Y');
        if(strtotime($ano) <= strtotime($anoAtual))
        {
            if($ano >= 2000)
            {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    private function verificaAutonomia($autonomia)
    {
        if(floatval($autonomia) >= 1 && floatval($autonomia) < 100)
        {
            return true;
        } else {
            return false;
        }
    }

    private function verificaModelo($modelo)
    {
        if($modelo >= 1 && $modelo <=5)
        {
            return true;
        } else {
            return false;
        }
    }

    private function verificaStatus($status)
    {
        if($status >= 1 && $status <= 2)
        {
            return true;
        } else {
            return false;
        }
    }
}