<?php

require_once './views/CategoriaView.php';
require_once './models/CategoriaModel.php';

class CategoriaController {
    private $view;
    private $model;

    function __construct(){
        $this->view = new CategoriaView();
        $this->model = new CategoriaModel();

    }

    private function checkLoggedIn(){
        session_start();
        
        if(!isset($_SESSION["EMAIL"])){
            header("Location: ". LOGIN);
            die();
        }else{
            if ( isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1000000)) { 
                header("Location: ". LOGOUT);
                die();
            } 
        
            $_SESSION['LAST_ACTIVITY'] = time();
        }
    }

    function Home() {
        $this->view->ShowHome();

    }   

    function Category() {

        session_start();
        $categories = $this->model->GetCategories();
        if(!isset($_SESSION["EMAIL"])){
            $this->view->ShowCategories($categories);
            die();
        }else{        
            $this->view->ShowCategoriesAdmin($categories);
            if ( isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1000000)) { 
                header("Location: ". LOGOUT);
                die();
            } 
            $_SESSION['LAST_ACTIVITY'] = time();
        }        
    }   


    function InsertCategory(){
        $this->model->InsertCategory($_POST['input_categoria'],$_POST['input_description']) ;
        header("Location: ". CATEGORY);
    }
    function DeleteCategory($params = null)
    {   
        //Necesitaríamos controlar que si borras una categoria no tenga productos.
        $id_categoria = $params[':ID'];
        $sentencia    = $this->model->DeleteCategory($id_categoria);
        header("Location: ". CATEGORY);
    }

    function ShowCategory($params = null){
        $id_categoria = $params[':ID'];
        $category = $this->model->GetCategory($id_categoria); 
        $this->view->ShowCategoryEdit($category);
        
    }

    function EditCategory(){
        $this->model->EditCategory($_POST['input_id-categoria'],$_POST['input_categoria'],$_POST['input_description']) ;
        header("Location: ". CATEGORY);    
    }


}   

?>