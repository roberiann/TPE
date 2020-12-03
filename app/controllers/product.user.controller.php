<?php

require_once 'app/views/product.user.view.php';
require_once 'app/models/product.model.php';
require_once 'app/models/category.model.php';
require_once 'app/helpers/auth.helper.php';
require_once 'app/helpers/auth.helper.php';

class ProductUserController
{
    private $view;
    private $model;
    private $modelCat;
    private $authHelper;
    
    function __construct()
    {
        $this->view = new ProductView();
        $this->model = new ProductModel();
        $this->modelCat = new CategoryModel();
        $this->authHelper = new AuthHelper();
    }

    function productsByCategory($params = null)
    {
        $id_category = $params[':ID'];
        $products = $this->model->getProductsByCategory($id_category);
        $this->view->showProductsByCategory($products);                 
    }

    function productDetail($params = null)
    {
        $id_product = $params[':ID'];
        $product = $this->model->getProduct($id_product);
        $this->view->showProductDetail($product);
    }

    function products($params = null)
    {
        if (isset($_GET['product'])) {
           $product = $_GET['product'];
        } else {
           $product = "";    
        }
        
        if (isset($_GET['pricefrom'])) {
           $pricefrom = $_GET['pricefrom'];
        } else {
           $pricefrom = 0;    
        }
        
        if (isset($_GET['priceto'])) {
           $priceto = $_GET['priceto'];
        } else {
           $priceto = 10000;    
        }

        if (isset($_GET['page'])) {
           $pageno = $_GET['page'];
        } else { 
           $pageno = 1;    
        }

        if (isset($_GET['category']) && $_GET['category'] != "") {
            $category = $_GET['category'];
         } else {
            $category = "";    
        }


        $no_of_products = 3;
        $offset = ($pageno-1) * $no_of_products;   

        $categories = $this->modelCat->getCategories();

        $total_rows = $this->model->countProducts($product, $pricefrom, $priceto, $category);
        $no_of_pages = ceil($total_rows->no/$no_of_products);

        $products =  $this->model->getProducts($product, $pricefrom, $priceto, $category, $no_of_products, $offset);
        $this->view->showProducts($products, $product, $pricefrom, $priceto, $category, $pageno, $no_of_pages, $categories);
    }
    
}
