<?php

require_once "libs/smarty/Smarty.class.php";

class ProductView
{

    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
    }

    function showProducts($products, $product, $pricefrom, $priceto, $pageno, $no_of_pages)
    {
        $this->smarty->assign('titulo', 'LISTADO DE PRODUCTOS');
        $this->smarty->assign('products', $products);
        $this->smarty->assign('product', $product);
        $this->smarty->assign('pricefrom', $pricefrom);
        $this->smarty->assign('priceto', $priceto);
        $this->smarty->assign('pageno', $pageno);
        $this->smarty->assign('no_of_pages', $no_of_pages);
        $this->smarty->display('templates/productsUser.tpl');
    }

    function showProductDetail($product)
    {
        $this->smarty->assign('titulo', 'Detalle de producto');
        $this->smarty->assign('product', $product);
        $this->smarty->display('templates/productUserDetail.tpl');
    }

    function showProductsByCategory($products)
    {
        $this->smarty->assign('titulo', 'Detalle de producto');
        $this->smarty->assign('products', $products);
        $this->smarty->display('templates/productsbycategoryUser.tpl');
    }
    
}
