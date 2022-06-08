<?php

namespace core;

class GerenciadorDeRotas
{
    private $controller = 'HomeDashboard';
    private $metodo = 'home';
    private $parametro = [];

    public function __construct()
    {
        $rota = explode('/', filter_input(INPUT_GET, 'router', FILTER_SANITIZE_SPECIAL_CHARS));

        if(file_exists('app/controllers/' . ucfirst($rota[0] . '.php')))
        {
            $this->controller = $rota[0];
            unset($rota[0]);
        }
        
        $classe = '\\app\\controllers\\' . ucfirst($this->controller);
        $objeto = new $classe;
        if(isset($rota[1]) and method_exists($classe, $rota[1]))
        {
            $this->metodo = $rota[1];
            unset($rota[2]);
        }

        $this->parametro = $rota ? array_values($rota) : [];
        call_user_func_array([$objeto, $this->metodo], $this->parametro);
    }

    /**
     * @internal Esse método tem o objetivo de dividir a url a cada / encontrada.
     *  Os parâmetro são recebidos via método GET e armazenados na variavel router, declarada
     *  no arquivo .htaccess na raiz do sistema. Também remove os caracteres especiais da url.
     * @return array
     */
    // public function divideUrl()
    // {
    //     $url = explode('/', filter_input(INPUT_GET, 'router', FILTER_SANITIZE_SPECIAL_CHARS));
    //     return $url;
    // }

    /**
     * @internal Esse método irá verificar se o controller passado como parâmetro via URL existe.
     * Caso exista, ele irá setar o valor do atributo controller como o valor do índice 0 do parâmetro rota.
     * @param string $rota
     * @return void
     */
    // public function setController($rota)
    // {
    //     if(file_exists('app/controller/' . ucfirst($rota[0] . '.php')))
    //     {
    //         $this->controller = $rota[0];
    //         unset($rota[0]);
    //     } else {
    //         $this->controller = 'Pagina';
    //     }
    // }

    /**
     * @internal Esse método verifica se existe algum método passado como parâmetro via URL e se esse método existe na classe passada como parâmetro.
     * Caso a condição seja veradeira, o valor do atributo metodo irá receber o valor do elemento de índice 1 do parâmetro rota.
     * @param string $rota
     * @param object $classe
     * @return void
     */
    // public function setMetodo($rota, $classe)
    // {
    //     if(isset($rota[1]) and method_exists($classe, $rota[1]))
    //     {
    //         $this->metodo = $rota[1];
    //         unset($rota[2]);
    //     } else {
    //         $this->metodo = 'home';
    //     }
    // }

    /**
     * @internal Esse método verifica se existe algum valor dentro do parâmetro rota. Caso tenha, o atributo parametro recebe esse valor.
     * Caso não tenha, ele recebe um array vazio.
     * @param array $rota
     * @param object $classe
     * @return void
     */
    // public function setParametro($rota, $objeto)
    // {
    //    $this->parametro = $rota ? array_values($rota) : [];
    //    call_user_func_array([$objeto, $this->metodo], $this->parametro);
    // }
}