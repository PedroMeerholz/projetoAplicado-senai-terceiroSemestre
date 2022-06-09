<?php

namespace core;

class GerenciadorDeRotas
{
    private $controller;
    private $metodo;
    private $parametro = [];

    public function __construct()
    {
        if(isset($_SESSION))
        {
            $rota = explode('/', filter_input(INPUT_GET, 'router', FILTER_SANITIZE_SPECIAL_CHARS));

            if(file_exists('app/controllers/' . ucfirst($rota[0] . '.php')))
            {
                $this->controller = $rota[0];
                unset($rota[0]);
            } else {
                $this->controller = 'HomeDashboard';
            }
            
            $classe = '\\app\\controllers\\' . ucfirst($this->controller);
            $objeto = new $classe;
            if(isset($rota[1]) and method_exists($classe, $rota[1]))
            {
                $this->metodo = $rota[1];
                unset($rota[2]);
            } else {
                $this->metodo = 'home';
            }

            $this->parametro = $rota ? array_values($rota) : [];
            call_user_func_array([$objeto, $this->metodo], $this->parametro);
        } else {
            header('Location:?router=Sessao/login/');
        }
    }
}