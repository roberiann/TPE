<?php

require_once "app/views/user.view.php";
require_once "app/models/user.model.php";
require_once "app/helpers/auth.helper.php";

class UserAdminController
{

    private $view;
    private $model;
    private $authHelper;

    function __construct()
    {
        $this->view = new UserView();
        $this->model = new UserModel();
        $this->authHelper = new AuthHelper();

        $this->authHelper->checkAdminLogged();
    }

    function getUsers(){
        $id_user = $this->authHelper->getUserId();
        $users = $this->model->getUsers($id_user);
        $this->view->showUsers($users);
    }

    function editUser($params = null){
        $id_user = $params[':ID'];
        $user = $this->model->getUserById($id_user);
        $this->model->setAdmin($id_user, !($user->admin));    
        header("Location: " . USERS);
    }

    function deleteUser($params = null)
    {
        $id_user = $params[':ID'];
        $this->model->deleteUser($id_user);
        header("Location: " . USERS);
    }
}
