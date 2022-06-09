<?php

namespace app\controllers;

use app\models\Login;

class Sessao extends Login
{
    public function login()
    {
        require_once __DIR__ . '/../views/login.php';
    }

    public function verificaCredenciaisLogin()
    {
        $login = $this->verificaLogin();
        if($login)
        {
            header('Location:?router=HomeDashboard/home');
        } else {
            echo 'Credenciais Inválidas';
        }
    }

    public function encerrarSessao()
    {
        unset($_SESSION);
        session_destroy();
        header('Location:?router=Sessao/login');
    }
}