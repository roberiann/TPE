<?php

class AuthHelper
{
    public function __construct()
    {
    }

    /**
     * Barrera de seguridad para usuario logueado
     */
    function checkAdminLogged()
    {   
        session_start();
        if (!isset($_SESSION['EMAIL'])) {
            header("Location: " . LOGIN);
            die();
        }
        if (!isset($_SESSION['ADMIN']) || (isset($_SESSION['ADMIN']) && ($_SESSION['ADMIN'] == 'N'))) {
            header("Location: ".LOGGED);
            die();
        }
    }

    function checkLogged()
    {   
        session_start();
        if (!isset($_SESSION['EMAIL'])||(isset($_SESSION['ADMIN']) && ($_SESSION['ADMIN'] !== 'N'))){
            header("Location: ".BASE_URL."home");
            die();
        }
    }
    function logout()
    {
        session_start();
        session_destroy();
        header("Location: ".BASE_URL."home");
    }

    function login($user)
    {
        session_start();
        $_SESSION["EMAIL"] = $user->email;
        $_SESSION["ADMIN"] = $user->admin;
    }
}
