<?php

require_once "./View/UserView.php";
require_once "./Model/UserModel.php";

class UserController{

    private $view;
    private $model;

    function __construct(){
        $this->view = new UserView();
        $this->model = new UserModel();

    }

    function Login(){

        $this->view->ShowLogin();

    }

    function Logout(){
        session_start();
        session_destroy();
        header("Location: ".LOGIN);

    }

    function VerifyUser(){
        $user = $_POST["input_user"];
        $pass = $_POST["input_pass"];

        if(isset($user)){
            $userFromDB = $this->model->GetUser($user);

            if(isset($userFromDB) && $userFromDB){
                // Existe el usuario

                if (password_verify($pass, $userFromDB->password)){

                    session_start();
                    $_SESSION["EMAIL"] = $userFromDB->email;
                    $_SESSION['LAST_ACTIVITY'] = time();

                    header("Location: ".BASE_URL."home");
                }else{
                    $this->view->ShowLogin("Contraseña incorrecta");
                }

            }else{
                // No existe el user en la DB
                $this->view->ShowLogin("El usuario no existe");
            }
        }
    }

}


?>