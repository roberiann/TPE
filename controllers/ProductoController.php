<?php

require_once './views/ProductoView.php';
require_once './models/ProductoModel.php';

class ProductoController {
    private $view;
    private $model;

    function __construct(){
        $this->view = new ProductoView();
        $this->model = new ProductoModel();
    }

    private function checkLoggedIn(){
        session_start();
        
        if(!isset($_SESSION["EMAIL"])){
            header("Location: ". LOGIN);
            die();
        }else{
            if ( isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1000000)) { 
                header("Location: ". LOGOUT);
                die();
            } 
        
            $_SESSION['LAST_ACTIVITY'] = time();
        }
    }

    function Home() {
        $this->checkLoggedIn();
        $this->view->ShowHome();

    }   

    function Products() {
        $products = $this->model->GetProducts();
        $this->view->ShowProducts($products);
    }   

    function ProductsByCategory($params=null) {
        $id_categoria = $params[':ID'];
        $products = $this->model->GetProductsByCategory($id_categoria);
        $this->view->ShowProductsByCategory($products);
    }   

    function ShowProductDetail($params=null) {
        $id_producto = $params[':ID'];
        $product = $this->model->GetProduct($id_producto);
        $this->view->ShowProductDetail($product);
    }   
    
  
}   