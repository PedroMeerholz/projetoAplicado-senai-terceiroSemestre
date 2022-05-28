<?php

namespace app\controllers;

class Pagina
{
    public function home()
    {
        require_once __DIR__ . '/../views/home.php';
    }
    
    public function cadastroFuncionario()
    {
        require_once __DIR__ . '/../views/funcionarios/cadastro-funcionario.php';
    }

    public function consultaFuncionario()
    {
        require_once __DIR__ . '/../views/funcionarios/consulta-funcionario.php';
    }
}