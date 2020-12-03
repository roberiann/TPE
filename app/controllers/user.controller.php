<?php

require_once "app/views/user.view.php";
require_once "app/models/user.model.php";
require_once "app/helpers/auth.helper.php";

class UserController
{

    private $view;
    private $model;
    private $authHelper;

    function __construct()
    {
        $this->view = new UserView();
        $this->model = new UserModel();
        $this->authHelper = new AuthHelper();
    }

    function login()
    {
        $this->view->showLogin();
    }

    function logout()
    {
        $this->authHelper->logout();
    }

    function verifyUser()
    {
        $user = $_POST["email"];
        $pass = $_POST["password"];

        if (!empty($user) || !empty($pass)) {
            $userFromDB = $this->model->GetUser($user);

            if (!empty($userFromDB)) {
                if (password_verify($pass, $userFromDB->password)) {

                    $this->authHelper->login($userFromDB);
                    if ($userFromDB->admin == 1){
                        header("Location: " . CATEGORY);
                    }
                    else{
                        header("Location: " . BASE_URL . "home");
                    }
                } else {
                    $this->view->showLogin("Contraseña incorrecta");
                }
            } else {
                $this->view->showLogin("El usuario no existe");
            }
        } else {
            $this->view->showLogin("Por favor complete usuario y password");
        }
    }

    function register()
    {
        $this->view->showRegisterForm();
    }


    function registerUser()
    {   $name = $_POST["name"];
        $user = $_POST["email"];
        $pass = $_POST["password"];

        if ($pass && $user && $name) {
            $userFromDB = $this->model->getUser($user);
            if (!$userFromDB) {
                $hash = password_hash($pass, PASSWORD_DEFAULT);
                $this->model->insertUser($name, $user, $hash);   
                $newUser = $this->model->getUser($user);
                $this->authHelper->login($newUser);
                header("Location: " . BASE_URL . "home");
            
            } else {
                $this->view->showRegisterForm("El usuario ya existe");
            }               
        } else {
            $this->view->showRegisterForm("Por favor complete los datos");
        }        
    }
   
}
