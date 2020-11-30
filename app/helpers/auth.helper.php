<?php

class AuthHelper
{
    public function __construct()
    {
        // abre la sessión siempre para usar el helper
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    function checkAdminLogged()
    {   
        if (!isset($_SESSION['USERID']) || ($_SESSION['ADMIN'] == 0)) {
            header("Location: " . LOGIN);
            die();
        }
    }

    function logout()
    {
        session_destroy();
        header("Location: " . BASE_URL . "home");
    }

    function login($user)
    {
        $_SESSION["EMAIL"] = $user->email;
        $_SESSION["ADMIN"] = $user->admin;
        $_SESSION["USERID"] = $user->id;
    }

    function getUserId()
    {
        return $_SESSION["USERID"];
    }
}
