<?php

require_once 'app/views/category.user.view.php';
require_once 'app/models/category.model.php';
require_once 'app/helpers/auth.helper.php';

class CategoryUserController
{
    private $view;
    private $model;
    private $authHelper;

    function __construct()
    {
        $this->view = new CategoryView();
        $this->model = new CategoryModel();
        $this->authHelper = new AuthHelper();

        $this->authHelper->checkLogged();
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
