<?php 
session_set_cookie_params([
    'lifetime' => 3600,
    'path' => '/',
    'domain' => '',
    /*'secure' => true,*/
    'httponly' => true
]);

session_start();

function adminOnly()
{
    if (!isset($_SESSION['user'])) {
        header('location: ../index.php');
    }else if ($_SESSION['user']['role'] != 'admin') {
        header('location: ../user/index.php');
    }
}