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
        // $this->checkLoggedIn();
        $this->view->ShowHome();

    }   

    function Category() {
        $categories = $this->model->GetCategories();
        $this->view->ShowCategories($categories);
    }   
  
}   