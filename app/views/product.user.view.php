<?php

require_once "libs/smarty/Smarty.class.php";

class ProductView
{

    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
    }

    function ShowProducts($products)
    {
        $this->smarty->assign('titulo', 'LISTADO DE PRODUCTOS');
        $this->smarty->assign('products', $products);
        $this->smarty->display('templates/products.tpl');
    }

    function ShowProductDetail($product)
    {
        $this->smarty->assign('titulo', 'Detalle de producto');
        $this->smarty->assign('product', $product);
        $this->smarty->display('templates/productDetail.tpl');
    }

    function ShowProductsByCategory($products)
    {
        $this->smarty->assign('titulo', 'Detalle de producto');
        $this->smarty->assign('products', $products);
        $this->smarty->display('templates/productsbycategory.tpl');
    }
    
}
