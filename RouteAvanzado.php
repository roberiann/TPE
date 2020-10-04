<?php
    require_once 'controller/AlmacenController.php';
    require_once 'controller/UserController.php';
    require_once 'RouterClass.php';
    
    // CONSTANTES PARA RUTEO
    //define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
    define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
    define("LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');

    $r = new Router();

    // rutas
    $r->addRoute("home", "GET", "AlmacenController", "Home");
    $r->addRoute("login", "GET", "UserController", "Login");
    $r->addRoute("logout", "GET", "UserController", "Logout");
    $r->addRoute("verifyUser", "POST", "UserController", "verifyUser");
    $r->addRoute("category", "GET", "AlmacenController", "Category");
    $r->addRoute("product", "GET", "AlmacenController", "Product");
    $r->addRoute("category/:ID", "GET", "AlmacenController", "ProductsByCategory");
    
    
    //Esto lo veo en TasksView
    // $r->addRoute("insert", "POST", "TasksController", "InsertTask");
    // $r->addRoute("delete/:ID", "GET", "TasksController", "BorrarLaTaskQueVienePorParametro");
    // $r->addRoute("completar/:ID", "GET", "TasksController", "MarkAsCompletedTask");
    // $r->addRoute("edit/:ID", "GET", "TasksController", "EditTask");

    //Ruta por defecto.
    $r->setDefaultRoute("AlmacenController", "Home");

    // //Advance
    // $r->addRoute("autocompletar", "GET", "TasksAdvanceController", "AutoCompletar");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>