<?php
    require_once './controllers/CategoriaController.php';
    require_once './controllers/ProductoController.php';
    require_once './controllers/UserController.php';
    require_once 'RouterClass.php';
    
    // CONSTANTES PARA RUTEO
    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
    define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
    define("LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');

    $r = new Router();

    // rutas
    $r->addRoute("home", "GET", "CategoriaController", "Home");    //A cual controller conviene?
    $r->addRoute("login", "GET", "UserController", "Login");
    $r->addRoute("logout", "GET", "UserController", "Logout");
    $r->addRoute("verifyUser", "POST", "UserController", "verifyUser");
    $r->addRoute("category", "GET", "CategoriaController", "Category");
    $r->addRoute("product", "GET", "ProductoController", "Products");
    $r->addRoute("category/:ID", "GET", "ProductoController", "ProductsByCategory");
    $r->addRoute("product/:ID", "GET", "ProductoController", "ShowProductDetail");
    $r->addRoute("delete/:ID", "GET", "ProductoController", "DeleteProduct");
    $r->addRoute("insert", "POST", "ProductoController", "InsertProduct");
    $r->addRoute("update", "POST", "ProductoController", "EditProduct");

    //Ruta por defecto.
    $r->setDefaultRoute("CategoriaController", "Home");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>