<?php

require_once "./libs/smarty/Smarty.class.php";

class UserView
{

    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
        $this->smarty->assign('titulo', "¡Hola! Para ingresar, ingresá tu e-mail y password.");
    }

    function ShowLogin($error = null)
    {
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/login.tpl');
    }
}
