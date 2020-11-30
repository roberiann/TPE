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

        $this->authHelper->checkSession();
    }

    function Products()
    {
        $products = $this->model->GetProducts();
        $this->view->ShowProducts($products);
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

    function productPagination($params = null)
    {
        $pageno = $params[':no'];

        if (!isset($pageno))
           $pageno = 1;
     
        $no_of_records_per_page = 3;
        $offset = ($pageno-1) * $no_of_records_per_page;   

        // $total_rows =  $this->model->countProducts();
        // $total_pages = ceil($total_rows / $no_of_records_per_page);

        $products =  $this->model->pageProducts($no_of_records_per_page, $offset);
        $this->view->ShowProducts($products);

    }
    
}
