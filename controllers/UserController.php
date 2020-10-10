<?php

require_once "./views/UserView.php";
require_once "./models/UserModel.php";

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
        header("Location: ".BASE_URL."home");

    }

    function VerifyUser(){
        $user = $_POST["email"];
        $pass = $_POST["password"];

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