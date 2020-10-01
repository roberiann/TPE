<?php

require_once './view/AlmacenView.php';
require_once './model/AlmacenModel.php';

class AlmacenController {
    private $view;
    private $model;

    function __construct(){
        $this->view = new AlmacenView();
        $this->model = new AlmacenModel();

    }

    function Home() {
         $this->view->ShowHome();
    }   

    function Category() {
        $categories = $this->model->GetCategories();
        $this->view->ShowCategories($categories);
    }   

    function Product() {
        $products = $this->model->GetProducts();
        $this->view->ShowProducts($products);
    }   

    function ProductsByCategory($params=null) {
        $id_categoria = $params[':ID'];
        $products = $this->model->GetProductsByCategory($id_categoria);
        $this->view->ShowProducts($products);
        
    }   

}   