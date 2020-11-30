<?php

require_once 'app/views/category.admin.view.php';
require_once 'app/models/category.model.php';
require_once 'app/helpers/auth.helper.php';

class CategoryAdminController
{
    private $view;
    private $model;
    private $authHelper;

    function __construct()
    {
        $this->view = new CategoryAdminView();
        $this->model = new CategoryModel();
        $this->authHelper = new AuthHelper();

        // verifico que el usuario esté logueado y sea admin
        $this->authHelper->checkAdminLogged();
    }

    function Categories()
    {
        $categories = $this->model->GetCategories();
        $this->view->ShowCategories($categories);
    }

    function InsertCategory()
    {
        $category = $_POST['input_categoria'];

        if (empty($category)) {
            $this->view->showError('Por favor, complete el nombre de la categoría');
            die();
        }
        $this->model->InsertCategory($_POST['input_categoria'], $_POST['input_descripcion']);
        header("Location: " . CATEGORY);
    }

    function DeleteCategory($params = null)
    {
        $id_category = $params[':ID'];
        $success    = $this->model->DeleteCategory($id_category);
        if ($success) {
            header("Location: " . CATEGORY);
        } else {
            $this->view->showError("No se puede borrar la categoria.");
        }
    }

    function Category($params = null)
    {
        $id_category = $params[':ID'];
        $category = $this->model->GetCategory($id_category);
        $this->view->ShowCategoryEdit($category);
    }

    function EditCategory()
    {
        $category = $_POST['input_categoria'];

        if (empty($category)) {
            $this->view->showError('Por favor, complete el nombre de la categoría');
            die();
        }
        $this->model->EditCategory($_POST['input_id-categoria'], $_POST['input_categoria'], $_POST['input_descripcion']);
        header("Location: " . CATEGORY);
    }
}
