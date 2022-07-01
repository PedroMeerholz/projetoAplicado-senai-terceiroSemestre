<?php
namespace app\controllers;

class Documentacao
{
    public function documentacao()
    {
        require_once __DIR__ . '/../views/manual-do-usuario.php';
    }
}