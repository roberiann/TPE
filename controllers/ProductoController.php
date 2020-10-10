<?php

require_once './views/ProductoView.php';
require_once './models/ProductoModel.php';

class ProductoController
{
    private $view;
    private $model;

    function __construct()
    {
        $this->view = new ProductoView();
        $this->model = new ProductoModel();
    }

    private function checkLoggedIn()
    {
        session_start();

        if (!isset($_SESSION["EMAIL"])) {
            header("Location: " . LOGIN);
            die();
        } else {
            if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1000000)) {
                header("Location: " . LOGOUT);
                die();
            }

            $_SESSION['LAST_ACTIVITY'] = time();
        }
    }

    function Home()
    {
        $this->checkLoggedIn();
        $this->view->ShowHome();
    }

    function Products()
    {
        // session_start();
        // if (!isset($_SESSION["EMAIL"])) {
            $products = $this->model->GetProducts();
            $this->view->ShowProductsAdmin($products);
        //     die();
        // } else  if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1000000)) {
        //     $products = $this->model->GetProducts();
        //     $this->view->ShowProducts($products);
        //     die();
        // }
        // $_SESSION['LAST_ACTIVITY'] = time();
    }


    function ProductsByCategory($params = null)
    {
        $id_categoria = $params[':ID'];
        $products = $this->model->GetProductsByCategory($id_categoria);
        $this->view->ShowProductsByCategory($products);
    }

    function ShowProductDetail($params = null)
    {
        $id_producto = $params[':ID'];
        $product = $this->model->GetProduct($id_producto);
        $this->view->ShowProductDetail($product);
    }

    function DeleteProduct($params = null)
    {
        $id_producto = $params[':ID'];
        $this->model->Delete($id_producto);
        $this->Products();
    }

    function InsertProduct(){
        $this->model->InsertProduct($_POST['input_producto'],$_POST['input_description'], $_POST['input_precio'],$_POST['input_stock'],$_POST['input_categoria']) ;
        $this->Products();
    }
    
    function EditProduct(){
        $this->model->EditProduct($_POST['input_producto'],$_POST['input_description'], $_POST['input_precio'],$_POST['input_stock'],$_POST['input_viejo']) ;
        $this->Products();
    }

}
