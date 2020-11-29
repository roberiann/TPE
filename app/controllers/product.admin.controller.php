<?php

require_once 'app/views/product.admin.view.php';
require_once 'app/models/product.model.php';
require_once 'app/models/category.model.php';
require_once 'app/helpers/auth.helper.php';

class ProductAdminController
{
    private $view;
    private $model;
    private $modelCat;
    private $authHelper;

    function __construct()
    {
        $this->view = new ProductAdminView();
        $this->model = new ProductModel();
        $this->modelCat = new CategoryModel();

        $this->authHelper = new AuthHelper();
        // verifico que el usuario esté logueado siempre y sea admin
        $this->authHelper->checkAdminLogged();
    }

    function Products()
    {
        $products = $this->model->GetProducts();
        $categories = $this->modelCat->GetCategories();
        $this->view->ShowProducts($products, $categories);
    }

    function DeleteProduct($params = null)
    {
        $id_product = $params[':ID'];
        $this->model->Delete($id_product);
        header("Location: " . PRODUCT);
    }

    function uniqueSaveName($realName, $tempName) {
        $filePath = "images/" . uniqid("", true) . "." . strtolower(pathinfo($realName, PATHINFO_EXTENSION));
        move_uploaded_file($tempName, $filePath);
        return $filePath;
    }

    function addProduct()
    {
        $producto    = $_POST['input_producto'];
        $descripcion = $_POST['input_descripcion'];
        $precio   = $_POST['input_precio'];
        $stock       = $_POST['input_stock'];
        $categoria   = $_POST['input_categoria'];

        //Validar que un producto exista
        if (empty($producto)) {
            $this->view->showError('Por favor complete el nombre del producto.');
            die();
        }

        if($_FILES['input_name']['type'] == "image/jpg" || $_FILES['input_name']['type'] == "image/jpeg" || $_FILES['input_name']['type'] == "image/png" ) 
        {
            $realName = $this->uniqueSaveName($_FILES['input_name']['name'], $_FILES['input_name']['tmp_name']);
            $id = $this->model->insert($producto, $descripcion,  $precio, $stock, $categoria, $realName);
        }
        else {
            $id = $this->model->insert($producto, $descripcion,  $precio, $stock, $categoria);
        }
        header("Location: " . PRODUCT);
    }

    function Product($params = null)
    {
        $id_product = $params[':ID'];
        $product = $this->model->GetProduct($id_product);
        $categories = $this->modelCat->GetCategories();
        $this->view->ShowProductEdit($product, $categories);
    }

    function EditProduct()
    {
        $product  = $_POST['input_producto'];
             
        if (empty($product)) {
            $this->view->showError('Por favor complete el nombre del producto.');
            die();
        }
        
        $this->model->EditProduct($_POST['input_id-producto'], $_POST['input_producto'], $_POST['input_descripcion'], $_POST['input_precio'], $_POST['input_stock'], $_POST['input_categoria'], $_POST['input_imagen']);
        header("Location: " . PRODUCT);
    }

    function GetUsers(){
        $users = $this->model->GetUsers();
        $this->view->ShowUsers($users);
    }

    function EditUser($params = null){

        $id_user = $params[':ID'];
        $user = $this->model->GetUser($id_user);

        if ($user->admin == "Y"){
        $this->model->QuitAdmin($id_user);
        header("Location: " . USERS);
        }
        else{
            $this->model->GiveAdmin($id_user);
            header("Location: " . USERS);
        }
    }

    function DeleteUser($params = null)
    {
        $id_user = $params[':ID'];
        $this->model->DeleteUser($id_user);
        header("Location: " . USERS);
    }
}
