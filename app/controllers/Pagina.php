<?php

namespace app\controllers;

class Pagina
{
    /**
     * @internal Renderiza a página inicial
     * @return void
     */
    public function home()
    {
        require_once __DIR__ . '/../views/home.php';
    }
}