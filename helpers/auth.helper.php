<?php

class AuthHelper
{
    public function __construct()
    {
    }

    /**
     * Barrera de seguridad para usuario logueado
     */
    function checkLogged()
    {
        session_start();
        if (!isset($_SESSION['EMAIL'])) {
            header("Location: " . LOGIN);
            die();
        }
    }

    function logout()
    {
        session_start();
        session_destroy();
        header("Location: " . LOGIN);
    }

    function login($user)
    {
        session_start();
        $_SESSION["EMAIL"] = $user->email;
    }
}
