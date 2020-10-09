<?php

require_once "./libs/smarty/Smarty.class.php";

class CategoriaView {

    function __construct(){
    }

    function ShowHome(){
        $smarty = new Smarty();
        $smarty->assign('titulo', 'Arte Sano');   
        $smarty->display('templates/home.tpl'); 
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