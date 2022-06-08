<?php

namespace app\controllers;

class Pagina
{
    public function login()
    {
        require_once __DIR__ . '/../views/login.php';
    }

    public function geraRelatorio()
    {
        require_once __DIR__ . '/../views/relatorio.php';
    }

    public function contato()
    {
        require_once __DIR__ . '/../views/contato.php';
    }
}