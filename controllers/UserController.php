<?php

require_once "./views/UserView.php";
require_once "./models/UserModel.php";
include_once "./helpers/auth.helper.php";

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
                    header("Location: " . CATEGORY);
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
}
