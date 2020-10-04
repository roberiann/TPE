<?php

require_once "./libs/smarty/Smarty.class.php";

class AlmacenView {


    private $title;
    

    function __construct(){
        $this->title = "Lista de Productos";
    }

    function ShowHome(){

        $smarty = new Smarty();
        $smarty->assign('titulo', 'Arte Sano');   
        $smarty->display('templates/home.tpl'); 
    }

    function ShowProducts($products){
        $smarty = new Smarty();
        $smarty->assign('titulo', 'Productos');
        $smarty->assign('products', $products);
      
        $smarty->display('templates/products.tpl'); 
    }

    function ShowCategories($categories){

        $smarty = new Smarty();
        $smarty->assign('titulo', 'Categorias');
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