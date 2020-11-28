<?php

require_once 'app/views/product.view.php';
require_once 'app/models/product.model.php';

class ProductInvitedController
{
    private $view;
    private $model;

    function __construct()
    {
        $this->view = new ProductView();
        $this->model = new ProductModel();
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
