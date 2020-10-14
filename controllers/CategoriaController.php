<?php

require_once './views/CategoriaView.php';
require_once './models/CategoriaModel.php';

class CategoriaController
{
    private $view;
    private $model;

    function __construct()
    {
        $this->view = new CategoriaView();
        $this->model = new CategoriaModel();
    }

    function Home()
    {
        $this->view->ShowHome();
    }

    function Categories()
    {
        $categories = $this->model->GetCategories();
        $this->view->ShowCategories($categories);
    }
}
