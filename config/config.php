<?php 
    session_start();
    if(isset($_SESSION['nome']))
    {
        require_once __DIR__ . '/navbar.php';
    } else {
        
    }
?>
