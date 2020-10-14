<?php
require_once './controllers/CategoriaAdminController.php';
require_once './controllers/ProductoAdminController.php';
require_once './controllers/CategoriaController.php';
require_once './controllers/ProductoController.php';
require_once './controllers/UserController.php';
require_once 'RouterClass.php';

// CONSTANTES PARA RUTEO
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
define("LOGIN", '//' . $_SERVER["SERVER_NAME"] . ':' . $_SERVER["SERVER_PORT"] . dirname($_SERVER["PHP_SELF"]) . '/login');
define("LOGOUT", '//' . $_SERVER["SERVER_NAME"] . ':' . $_SERVER["SERVER_PORT"] . dirname($_SERVER["PHP_SELF"]) . '/logout');
define("CATEGORY", '//' . $_SERVER["SERVER_NAME"] . ':' . $_SERVER["SERVER_PORT"] . dirname($_SERVER["PHP_SELF"]) . '/categories-admin');
define("PRODUCT", '//' . $_SERVER["SERVER_NAME"] . ':' . $_SERVER["SERVER_PORT"] . dirname($_SERVER["PHP_SELF"]) . '/products-admin');

$r = new Router();

// rutas
$r->addRoute("login", "GET", "UserController", "Login");
$r->addRoute("logout", "GET", "UserController", "Logout");
$r->addRoute("verifyUser", "POST", "UserController", "VerifyUser");

$r->addRoute("home", "GET", "CategoriaController", "Home");
$r->addRoute("categories", "GET", "CategoriaController", "Categories");


$r->addRoute("categories-admin", "GET", "CategoriaAdminController", "Categories");
$r->addRoute("insert-category", "POST", "CategoriaAdminController", "InsertCategory");
$r->addRoute("delete-category/:ID", "GET", "CategoriaAdminController", "DeleteCategory");
$r->addRoute("category-edit/:ID", "GET", "CategoriaAdminController", "Category");
$r->addRoute("edit-category", "POST", "CategoriaAdminController", "EditCategory");

$r->addRoute("products-admin", "GET", "ProductoAdminController", "Products");
$r->addRoute("delete-product/:ID", "GET", "ProductoAdminController", "DeleteProduct");
$r->addRoute("insert-product", "POST", "ProductoAdminController", "InsertProduct");
$r->addRoute("edit-product/:ID", "GET", "ProductoAdminController", "Product");
$r->addRoute("edit-product", "POST", "ProductoAdminController", "EditProduct");

$r->addRoute("products", "GET", "ProductoController", "Products");
$r->addRoute("category/:ID", "GET", "ProductoController", "ProductsByCategory");
$r->addRoute("product/:ID", "GET", "ProductoController", "ProductDetail");

//Ruta por defecto.
$r->setDefaultRoute("CategoriaController", "Home");


//run
$r->route($_GET['action'], $_SERVER['REQUEST_METHOD']);
