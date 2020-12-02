<?php

require_once "libs/smarty/Smarty.class.php";

class CategoryView
{

    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
    }

    function showHome()
    {
        $this->smarty->assign('titulo', 'ARTE SANO');
        $this->smarty->display('templates/home.tpl');
    }

    function showCategories($categories)
    {
        $this->smarty->assign('titulo', 'CATEGORIAS');
        $this->smarty->assign('categories', $categories);
        $this->smarty->display('templates/categoriesUser.tpl');
    }

}
