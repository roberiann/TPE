<?php

require_once "./libs/smarty/Smarty.class.php";

class CategoriaAdminView
{

    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
    }

    function ShowCategories($categories)
    {
        $this->smarty->assign('titulo', 'LISTADO DE CATEGORIAS');
        $this->smarty->assign('categories', $categories);
        $this->smarty->display('templates/categoriesAdmin.tpl');
    }

    function ShowCategoryEdit($category)
    {
        $this->smarty->assign('titulo', 'EDICION DE CATEGORIA');
        $this->smarty->assign('category', $category);
        $this->smarty->display('templates/categoryEdit.tpl');
    }
}
