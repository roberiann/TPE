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

    function ShowCategoriesAdmin($categories){
        $smarty = new Smarty();
        $smarty->assign('titulo', 'LISTADO DE CATEGORIAS');
        $smarty->assign('categories', $categories);     
        $smarty->display('templates/categoriesAdmin.tpl'); 
    }

    function ShowCategoryEdit($category){ 
        $smarty = new Smarty();
        $smarty->assign('titulo', 'Edición de Categoria');
        $smarty->assign('category', $category);     
        $smarty->display('templates/categoryEdit.tpl'); 
    }

    function ShowHomeLocation(){
        header("Location: ".BASE_URL."home");
    }


}


?>