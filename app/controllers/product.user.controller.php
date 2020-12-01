<?php

require_once 'app/views/product.user.view.php';
require_once 'app/models/product.model.php';
require_once 'app/helpers/auth.helper.php';
require_once 'app/helpers/auth.helper.php';

class ProductUserController
{
    private $view;
    private $model;
    private $authHelper;
    
    function __construct()
    {
        $this->view = new ProductView();
        $this->model = new ProductModel();
        $this->authHelper = new AuthHelper();

    }

    function ProductsByCategory($params = null)
    {
        $id_category = $params[':ID'];
        $products = $this->model->GetProductsByCategory($id_category);
        $this->view->ShowProductsByCategory($products);                 
    }

    function ProductDetail($params = null)
    {
        $id_product = $params[':ID'];
        $product = $this->model->GetProduct($id_product);
        $this->view->ShowProductDetail($product);
    }

    function products($params = null)
    {
        if (isset($_GET['page']))
           $pageno = $_GET['page'];
        else 
           $pageno = 1;    

        $no_of_products = 3;
        $offset = ($pageno-1) * $no_of_products;   

        $total_rows = $this->model->countProducts();
        $no_of_pages = ceil($total_rows->no/$no_of_products);

        $products =  $this->model->getProducts($no_of_products, $offset);
        $this->view->ShowProducts($products, $pageno, $no_of_pages);

    }
    
}
