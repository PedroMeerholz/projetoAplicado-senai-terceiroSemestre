<?php 
    session_start();
    if(isset($_SESSION['nome']))
    {
        require_once __DIR__ . '/../app/views/navbars/navbar-sistema.php';
    } else {
        require_once __DIR__ . '/../app/views/navbars/navbar-login.php';
    }
?>
