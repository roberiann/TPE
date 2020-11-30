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

    function Login()
    {
        $this->view->ShowLogin();
    }

    function Logout()
    {
        $this->authHelper->logout();
    }

    function VerifyUser()
    {
        $user = $_POST["email"];
        $pass = $_POST["password"];

        if (!empty($user) || !empty($pass)) {
            $userFromDB = $this->model->GetUser($user);

            if (!empty($userFromDB)) {
                if (password_verify($pass, $userFromDB->password)) {

                    $this->authHelper->login($userFromDB);
                    if ($userFromDB->admin == "Y"){
                        header("Location: " . CATEGORY);
                    }
                    else{
                        header("Location: " . BASE_URL . "home");
                    }
                } else {
                    $this->view->ShowLogin("Contraseña incorrecta");
                }
            } else {
                $this->view->ShowLogin("El usuario no existe");
            }
        } else {
            $this->view->ShowLogin("Por favor complete usuario y password");
        }
    }

    function Register()
    {
        $this->view->ShowRegisterForm();
    }


    function RegisterUser()
    {   $name = $_POST["name"];
        $user = $_POST["email"];
        $pass = $_POST["password"];

        if ($pass && $user && $name) {
            $userFromDB = $this->model->GetUser($user);
            if (!$userFromDB) {
                $hash = password_hash($pass, PASSWORD_DEFAULT);
                $this->model->InsertUser($name, $user, $hash);   
                $this->authHelper->login($user);
                header("Location: " . BASE_URL . "home");
            } else {
                $this->view->ShowRegisterForm("El usuario ya existe");
            }   
            
        } else {
            $this->view->ShowRegisterForm("Por favor complete los datos");
        }        
    }
    
    function GetUsers(){
        $users = $this->model->GetUsers();
        $this->view->ShowUsers($users);
    }

    function EditUser($params = null){

        $id_user = $params[':ID'];
        $user = $this->model->GetUserById($id_user);

        if ($user->admin == "Y"){
        $this->model->QuitAdmin($id_user);
        header("Location: " . USERS);
        }
        else{
            $this->model->GiveAdmin($id_user);
            header("Location: " . USERS);
        }
    }

    function DeleteUser($params = null)
    {
        $id_user = $params[':ID'];
        $this->model->DeleteUser($id_user);
        header("Location: " . USERS);
    }
}
