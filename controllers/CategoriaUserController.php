<?php

require_once './views/CategoriaView.php';
require_once './models/CategoriaModel.php';

class CategoriaUserController
{
    private $view;
    private $model;
    private $authHelper;


    function __construct()
    {
        $this->view = new CategoriaView();
        $this->model = new CategoriaModel();
        $this->authHelper = new AuthHelper();
        $this->authHelper->checkLogged();

    }

    function Home()
    {
        $this->view->LoggedHome();
    }

    function Categories()
    {
        $categories = $this->model->GetCategories();
        $this->view->LoggedCategories($categories);
    }
}
