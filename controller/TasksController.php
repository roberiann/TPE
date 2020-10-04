<?php

require_once "./View/TasksView.php";
require_once "./Model/TasksModel.php";

class TasksController{

    private $view;
    private $model;

    function __construct(){
        $this->view = new TasksView();
        $this->model = new TasksModel();

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

    function Home(){

        $this->checkLoggedIn();

        $tasks = $this->model->GetTasks();
        $this->view->ShowHome($tasks);
    }

    function InsertTask(){

        $completed = 0;
        if(isset($_POST['input_completed'])){
            $completed = 1;
        }

        $this->model->InsertTask($_POST['input_title'],$_POST['input_description'],$completed,$_POST['input_priority']);
        $this->view->ShowHomeLocation();
    }

    function EditTask($params = null){
        $task_id = $params[':ID'];
        $task = $this->model->GetTask($task_id);

         $this->view->ShowEditTask($task);
    }

    function BorrarLaTaskQueVienePorParametro($params = null){
        $task_id = $params[':ID'];
        $this->model->DeleteTaskDelModelo($task_id);
        $this->view->ShowHomeLocation();
    }

    function MarkAsCompletedTask($params = null){
        $task_id = $params[':ID'];
        $this->model->MarkAsCompletedTask($task_id);
        $this->view->ShowHomeLocation();
    }
}


?>