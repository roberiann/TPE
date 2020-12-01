<?php

require_once "libs/smarty/Smarty.class.php";

class ProductAdminView
{

    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
    }

    function ShowProducts($products, $categories)
    {
        $this->smarty->assign('titulo', 'LISTADO DE PRODUCTOS');
        $this->smarty->assign('categories', $categories);
        $this->smarty->assign('products', $products);
        $this->smarty->display('templates/productsAdmin.tpl');
    }

    function ShowProductEdit($product, $categories)
    {
        $this->smarty->assign('titulo', 'Edición de Producto');
        $this->smarty->assign('categories', $categories);
        $this->smarty->assign('product', $product);
        $this->smarty->display('templates/productAdminDetail.tpl');
    }

    function showError($msg) {
        $this->smarty->assign('msg', $msg);
        $this->smarty->display('templates/error.tpl');
    }

}
