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
            $erro = 'Credenciais inválidas\n\nO CPF deve conter onze(11) números\nA senha deve conter ao menos seis caracteres';
            echo "<script type='text/javascript'>
            function mostraMensagem(){
                if(confirm('". $erro ."')){
                    window.location.href='?router=Sessao/login';
                } else {
                    window.location.href='?router=Sessao/login';
                }
            }
            mostraMensagem();
            </script>";
        }
    }

    public function encerrarSessao()
    {
        unset($_SESSION);
        session_destroy();
        header('Location:?router=Sessao/login');
    }
}