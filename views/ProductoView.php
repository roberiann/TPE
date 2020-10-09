<?php

require_once "./libs/smarty/Smarty.class.php";

class ProductoView {

    function __construct(){
    }

    function ShowHome(){
        $smarty = new Smarty();
        $smarty->assign('titulo', 'Arte Sano');   
        $smarty->display('templates/home.tpl'); 
    }

    function ShowProducts($products){
        $smarty = new Smarty();
        $smarty->assign('titulo', 'LISTADO DE PRODUCTOS');
        $smarty->assign('products', $products);     
        $smarty->display('templates/products.tpl'); 
    }

    function ShowProductDetail($product){
        $smarty = new Smarty();
        $smarty->assign('titulo', 'Detalle de producto');
        $smarty->assign('product', $product);     
        $smarty->display('templates/productDetail.tpl'); 
    }

    function ShowProductsByCategory($products){
        $smarty = new Smarty();
        $smarty->assign('titulo', $products[0]->nombre_categoria);
        $smarty->assign('products', $products);     
        $smarty->display('templates/productsbycategory.tpl'); 
    }


    function ShowCategories($categories){

        $smarty = new Smarty();
        $smarty->assign('titulo', 'CATEGORIAS');
        $smarty->assign('categories', $categories);
      
        $smarty->display('templates/categories.tpl'); 
    }


    // function ShowEditTask($task){
    //     //TODO hacer con Smarty
      
    // }

    function ShowHomeLocation(){
        header("Location: ".BASE_URL."home");
    }


}


?>