<?php

require_once "libs/smarty/Smarty.class.php";

class CategoryAdminView
{

    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
    }


    function AdmHome()
    {
        $this->smarty->assign('titulo', 'ARTE SANO');
        $this->smarty->display('templates/homeAdmLogged.tpl');
    }
    function ShowCategories($categories)
    {
        $this->smarty->assign('titulo', 'Listado de Categorias');
        $this->smarty->assign('categories', $categories);
        $this->smarty->display('templates/categoriesAdmin.tpl');
    }

    function ShowCategoryEdit($category)
    {
        $this->smarty->assign('titulo', 'Edición de Categoría');
        $this->smarty->assign('category', $category);
        $this->smarty->display('templates/categoryEdit.tpl');
    }

    function showError($msg) {
        $this->smarty->assign('msg', $msg);
        $this->smarty->display('templates/error.tpl');
    }
}
