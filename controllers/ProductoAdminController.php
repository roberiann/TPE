<?php

require_once './views/ProductoAdminView.php';
require_once './models/ProductoModel.php';
require_once './models/CategoriaModel.php';
include_once './helpers/auth.helper.php';

class ProductoAdminController
{
    private $view;
    private $model;
    private $modelCat;
    private $authHelper;

    function __construct()
    {
        $this->view = new ProductoAdminView();
        $this->model = new ProductoModel();
        $this->modelCat = new CategoriaModel();

        $this->authHelper = new AuthHelper();
        // verifico que el usuario esté logueado siempre
        $this->authHelper->checkLogged();
    }

    function Products()
    {
        $products = $this->model->GetProducts();
        $categories = $this->modelCat->GetCategories();
        $this->view->ShowProducts($products, $categories);
    }

    function DeleteProduct($params = null)
    {
        $id_producto = $params[':ID'];
        $this->model->Delete($id_producto);
        header("Location: " . PRODUCT);
    }

    function InsertProduct()
    {
        $producto  = $_POST['input_producto'];
             
        if (empty($producto)) {
            $this->view->showError('Por favor complete el nombre del producto.');
            die();
        }
        $this->model->InsertProduct($_POST['input_producto'], $_POST['input_description'], $_POST['input_precio'], $_POST['input_stock'], $_POST['input_categoria']);
        header("Location: " . PRODUCT);
    }


    function Product($params = null)
    {
        $id_producto = $params[':ID'];
        $product = $this->model->GetProduct($id_producto);
        $categories = $this->modelCat->GetCategories();
        $this->view->ShowProductEdit($product, $categories);
    }

    function EditProduct()
    {
        $producto  = $_POST['input_producto'];
             
        if (empty($producto)) {
            $this->view->showError('Por favor complete el nombre del producto.');
            die();
        }
        
        $this->model->EditProduct($_POST['input_id-producto'], $_POST['input_producto'], $_POST['input_description'], $_POST['input_precio'], $_POST['input_stock'], $_POST['input_categoria']);
        header("Location: " . PRODUCT);
    }
}
