<?php

require_once 'app/views/ProductoView.php';
require_once 'app/models/ProductoModel.php';
require_once 'app/helpers/auth.helper.php';

class ProductoUserController
{
    private $view;
    private $model;
    private $authHelper;


    function __construct()
    {
        $this->view = new ProductoView();
        $this->model = new ProductoModel();
        $this->authHelper = new AuthHelper();
        $this->authHelper->checkLogged();
    }

    function Products()
    {
        $products = $this->model->GetProducts();
        $this->view->LoggedProducts($products);
    }


    function ProductsByCategory($params = null)
    {
        $id_categoria = $params[':ID'];
        $products = $this->model->GetProductsByCategory($id_categoria);
        $this->view->LoggedProductsByCategory($products);
    }

    function ProductDetail($params = null)
    {
        $id_producto = $params[':ID'];
        $product = $this->model->GetProduct($id_producto);
        $this->view->LoggedProductDetail($product);
    }
}
