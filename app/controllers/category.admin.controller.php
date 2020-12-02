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

    function categories()
    {
        $categories = $this->model->getCategories();
        $this->view->showCategories($categories);
    }

    function insertCategory()
    {
        $category = $_POST['input_categoria'];

        if (empty($category)) {
            $this->view->showError('Por favor, complete el nombre de la categoría');
            die();
        }
        $this->model->insertCategory($_POST['input_categoria'], $_POST['input_descripcion']);
        header("Location: " . CATEGORY);
    }

    function deleteCategory($params = null)
    {
        $id_category = $params[':ID'];
        $success    = $this->model->deleteCategory($id_category);
        if ($success) {
            header("Location: " . CATEGORY);
        } else {
            $this->view->showError("No se puede borrar la categoria.");
        }
    }

    function category($params = null)
    {
        $id_category = $params[':ID'];
        $category = $this->model->getCategory($id_category);
        $this->view->showCategoryEdit($category);
    }

    function editCategory()
    {
        $category = $_POST['input_categoria'];

        if (empty($category)) {
            $this->view->showError('Por favor, complete el nombre de la categoría');
            die();
        }
        $this->model->editCategory($_POST['input_id-categoria'], $_POST['input_categoria'], $_POST['input_descripcion']);
        header("Location: " . CATEGORY);
    }
}
