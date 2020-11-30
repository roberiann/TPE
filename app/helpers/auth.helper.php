<?php

class AuthHelper
{
    public function __construct()
    {
    }

    function checkAdminLogged()
    {   
        session_start();
        if (!isset($_SESSION['EMAIL'])) {
            header("Location: " . LOGIN);
            die();
        }

        if (!isset($_SESSION['ADMIN']) || (isset($_SESSION['ADMIN']) && ($_SESSION['ADMIN'] == 0))) {
            header("Location: " . BASE_URL . "home");
            die();
        }
    }

    function checkSession()
    {   
        session_start();
    }

    function logout()
    {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL . "home");
    }

    function login($user)
    {
        session_start();
        $_SESSION["EMAIL"] = $user->email;
        $_SESSION["ADMIN"] = $user->admin;
        $_SESSION["USERID"] = $user->id;
    }

    function getUserId()
    {
        return $_SESSION["USERID"];
    }
}
