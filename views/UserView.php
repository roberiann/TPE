<?php

require_once "./libs/smarty/Smarty.class.php";

class UserView{

    private $title;
    

    function __construct(){
        $this->title = "Login";
    }

    function ShowLogin(){

        $smarty = new Smarty();
        $smarty->assign('titulo', $this->title);
        $smarty->display('templates/login.tpl'); // muestro el template 
    }

}


?>