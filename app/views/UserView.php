<?php

require_once "libs/smarty/Smarty.class.php";

class UserView
{

    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
    }

    function ShowLogin($error = null)
    {   
        $this->smarty->assign('titulo', "¡Hola! Para ingresar, ingresá tu e-mail y password");
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/login.tpl');
    }

    function ShowRegisterForm($error = null) {        
        $this->smarty->assign('titulo', "Por favor ingresá los siguientes datos");
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/register.tpl');
    } 
}
