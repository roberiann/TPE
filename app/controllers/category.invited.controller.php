<?php

require_once 'app/views/category.view.php';
require_once 'app/models/category.model.php';

class CategoryInvitedController
{
    private $view;
    private $model;

    function __construct()
    {
        $this->view = new CategoryView();
        $this->model = new CategoryModel();
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
