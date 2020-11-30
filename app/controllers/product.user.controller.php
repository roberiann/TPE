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
}
