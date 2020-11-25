<?php

require_once "libs/smarty/Smarty.class.php";

class CategoriaView
{

    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
    }

    function ShowHome()
    {
        $this->smarty->assign('titulo', 'ARTE SANO');
        $this->smarty->display('templates/home.tpl');
    }

    function ShowCategories($categories)
    {
        $this->smarty->assign('titulo', 'CATEGORIAS');
        $this->smarty->assign('categories', $categories);
        $this->smarty->display('templates/categories.tpl');
    }

    function LoggedHome()
    {
        $this->smarty->assign('titulo', 'ARTE SANO');
        $this->smarty->display('templates/homeLogged.tpl');
    }

    function LoggedCategories($categories)
    {
        $this->smarty->assign('titulo', 'CATEGORIAS');
        $this->smarty->assign('categories', $categories);
        $this->smarty->display('templates/categoriesLogged.tpl');
    }


}
