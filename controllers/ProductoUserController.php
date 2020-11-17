<?php

require_once './views/ProductoView.php';
require_once './models/ProductoModel.php';
require_once './helpers/auth.helper.php';

class ProductoUserController
{
    private $view;
    private $model;

    function __construct()
    {
        $this->view = new ProductoView();
        $this->model = new ProductoModel();
        $this->authHelper->checkAdminLogged();
    }

    function Products()
    {
        $products = $this->model->GetProducts();
        $this->view->ShowProducts($products);
    }


    function ProductsByCategory($params = null)
    {
        $id_categoria = $params[':ID'];
        $products = $this->model->GetProductsByCategory($id_categoria);
        $this->view->ShowProductsByCategory($products);
    }

    function ProductDetail($params = null)
    {
        $id_producto = $params[':ID'];
        $product = $this->model->GetProduct($id_producto);
        $this->view->ShowProductDetail($product);
    }
}
