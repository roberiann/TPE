<?php

require_once './views/CategoriaAdminView.php';
require_once './models/CategoriaModel.php';
include_once './helpers/auth.helper.php';

class CategoriaAdminController
{
    private $view;
    private $model;
    private $authHelper;

    function __construct()
    {
        $this->view = new CategoriaAdminView();
        $this->model = new CategoriaModel();
        $this->authHelper = new AuthHelper();
        // verifico que el usuario esté logueado siempre
        $this->authHelper->checkLogged();
    }

    function Categories()
    {
        $categories = $this->model->GetCategories();
        $this->view->ShowCategories($categories);
    }

    function InsertCategory()
    {
        $this->model->InsertCategory($_POST['input_categoria'], $_POST['input_description']);
        header("Location: " . CATEGORY);
    }

    function DeleteCategory($params = null)
    {
        //Necesitaríamos controlar que si borras una categoria no tenga productos.      
        $id_categoria = $params[':ID'];
        $sentencia    = $this->model->DeleteCategory($id_categoria);
        header("Location: " . CATEGORY);
    }

    function Category($params = null)
    {
        $id_categoria = $params[':ID'];
        $category = $this->model->GetCategory($id_categoria);
        $this->view->ShowCategoryEdit($category);
    }

    function EditCategory()
    {
        $this->model->EditCategory($_POST['input_id-categoria'], $_POST['input_categoria'], $_POST['input_description']);
        header("Location: " . CATEGORY);
    }
}
