<?php

require_once './views/CategoriaAdminView.php';
require_once './models/CategoriaModel.php';
require_once './helpers/auth.helper.php';

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
        
        // verifico que el usuario esté logueado siempre y sea admin
        $this->authHelper->checkAdminLogged();
    }


    function Home()
    {
        $this->view->AdmHome();
    }


    function Categories()
    {
        $categories = $this->model->GetCategories();
        $this->view->ShowCategories($categories);
    }

    function InsertCategory()
    {
        $categoria = $_POST['input_categoria'];
     
        if (empty($categoria)) {
            $this->view->showError('Por favor, complete el nombre de la categoría');
            die();
        }
        $this->model->InsertCategory($_POST['input_categoria'], $_POST['input_description']);
        header("Location: " . CATEGORY);
    }

    function DeleteCategory($params = null)
    {
        $id_categoria = $params[':ID'];
        $success    = $this->model->DeleteCategory($id_categoria);
        if ($success) {
            header("Location: " . CATEGORY);
        }else {
            $this->view->showError("No se puede borrar la categoria.");
        }    
    }

    function Category($params = null)
    {
        $id_categoria = $params[':ID'];
        $category = $this->model->GetCategory($id_categoria);
        $this->view->ShowCategoryEdit($category);
    }

    function EditCategory()
    {   
        $categoria = $_POST['input_categoria'];
     
        if (empty($categoria)) {
            $this->view->showError('Por favor, complete el nombre de la categoría');
            die();
        }
        $this->model->EditCategory($_POST['input_id-categoria'], $_POST['input_categoria'], $_POST['input_description']);
        header("Location: " . CATEGORY);
    }
}
